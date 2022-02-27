<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquete;
use App\Option;
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

    public function answer(Request $request) {
        $option = Option::find($request->answer);
        $option->n_answers++;
        $option->update();
        return redirect()->back();
        // return view('enquete',[
        //     'title' => $enquete->title,
        //     'question' => $enquete->question,
        //     'options' => $enquete->options,
        // ]);
    }

    public function create(Request $request) {
        $enquete = new Enquete();
        return view('form',[
            'enquete' => $enquete,
            'title' => 'Criar Enquete',
            'message' => $request->session()->get('message'),
            'n_options'=> 3,
        ]);
    }

    public function store(EnqueteFormRequest $request) {
        $msg = (object)[];
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

    public function read(Request $request) {
        $enquete = Enquete::find($request->id);
        return view('enquete',[
            'title' => $enquete->title,
            'question' => $enquete->question,
            'options' => $enquete->options,
        ]);
    }

    public function editForm(Request $request) {
        $enquete = Enquete::find($request->id);
        $n_options = count($enquete->options);
        return view('form',[
            'enquete' => $enquete,
            'title' => 'Editar Enquete',
            'message' => $request->session()->get('message'),
            'n_options'=> $n_options,
        ]);
    }

    public function update(EnqueteFormRequest $request) {
        $request->session()->put("info", [
            'title'=>$request->title,
            'question'=>$request->question,
            'dt_start'=>$request->dt_start,
            'dt_end'=>$request->dt_end
        ]);
        return redirect("/editar-enquete/options/$request->id");
    }

    public function destroy(Request $request) {
        $enquete = Enquete::find($request->id);
        $nome_enquete = $enquete->title;
        $enquete->options->each(function ($temporada) {
            $temporada->delete();
        });
        $enquete->delete();

        $msg = (object)[];
        $msg->color = 'green';
        $msg->text = "Enquete $nome_enquete removida com sucesso!";
        $request->session()->flash("message", $msg);
        return redirect('/');
    }
}