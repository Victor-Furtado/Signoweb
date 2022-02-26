<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquete;
use App\Http\Requests\EnqueteFormRequest;

class EnqueteController extends Controller
{
    public function index(Request $request) {
        $enquetes = Enquete::query()->orderBy('title')->get();

        return view('index',[
            'enquetes' => $enquetes,
            'title' => 'Enquete App',
            'message' => $request->session()->get('message'),
        ]);
    }

    public function create(Request $request) {
        $enquete = new Enquete();
        return view('form',[
            'enquete' => $enquete,
            'title' => 'Criar Enquete',
            'message' => $request->session()->get('message'),
        ]);
    }

    public function store(EnqueteFormRequest $request) {
        if(strtotime($request->dt_start) < strtotime('now' . "-1 days")) {
            $msg->color = 'red';
            $msg->text = 'Não é possível inserir enquetes retroativamente, contate o suporte';
            return redirect()->back()->with('message', $msg);
        }
        if(!date_diff(date_create($request->dt_end),date_create($request->dt_start))->invert) {
            $msg->color = 'red';
            $msg->text = 'A data de inicio deve ser menor que a data final';
            return redirect()->back()->with('message', $msg);
        }
        $enquete = Enquete::create([
            "title" => $request->title,
            "question" => $request->question,
            "dt_start" => $request->dt_start,
            "dt_end" => $request->dt_end
        ]);
        $request->session()->flash("title", $enquete->title);
        $request->session()->put("n_options", $request->n_options);
        return redirect("/nova-enquete/$enquete->id");
    }

    public function read() {
        return view('enquete',[
            'title' => 'Enquete App'
        ]);
    }

    public function editForm(Request $request) {
        $enquete = Enquete::find($request->id);
        $options = [];
        return view('form',[
            'options'=>$options,
            'enquete' => $enquete,
            'title' => 'Editar Enquete',
            'message' => $request->session()->get('message'),
        ]);
    }

    public function update(EnqueteFormRequest $request) {
        $msg = (object)[];

        $enquete = Enquete::find($request->id);
        $enquete->title = $request->title;
        $enquete->question = $request->question;
        $enquete->dt_start = $request->dt_start;
        $enquete->dt_end = $request->dt_end;
        $enquete->options = '{}';
        $enquete->update();

        $msg->color = 'green';
        $msg->text = "Enquete {$enquete->title} editada com sucesso!";
        $request->session()->flash("message", $msg);
        return redirect('/');
    }

    public function destroy(Request $request) {
        $msg = (object)[];
        Enquete::destroy($request->id);
        $msg = (object)[];
        $msg->color = 'green';
        $msg->text = "Enquete removida com sucesso!";
        $request->session()->flash("message", $msg);
        return redirect('/');
    }
}