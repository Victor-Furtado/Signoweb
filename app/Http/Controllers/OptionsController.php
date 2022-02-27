<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquete;
use App\Option;

class OptionsController extends Controller
{
    public function create(Request $request) {
        $n_options = $request->session()->get('n_options');
        $options = [];
        for($i=1;$i<$n_options+1;$i++) {
            $option = [
                "name"=>"_$i",
                "option"=>""
            ];
            array_push($options,$option);
        }
        return view('optionsForm',[
            'title' => 'Criar Enquete',
            'message' => $request->session()->get('message'),
            'options'=> $options
        ]);
    }

    public function store(Request $request) {
        $n_options = $request->session()->get('n_options');
        for ($i=1; $i < $n_options+1; $i++) { 
            $option = Option::create([
                "option"=>$request["_$i"],
                "enquete_id"=>$request->id
            ]);
        }
        $enquete = Enquete::find($request->id);
        $msg = (object)[];
        $msg->color = 'green';
        $msg->text = "Enquete {$enquete->title} criada com sucesso!";
        $request->session()->flash("message", $msg);
        return redirect("/");
    }

    public function cancel(Request $request) {
        Enquete::destroy($request->id);
        return redirect('/');
    }

    public function editForm(Request $request) {
        $enquete = Enquete::find($request->id);
        $e_options = $enquete->options;
        $options = [];
        for($i=1;$i<count($e_options)+1;$i++) {
            $option = [
                "name"=>"_$i",
                "option"=>$e_options[$i-1]->option,
            ];
            array_push($options,$option);
        }
        $request->session()->put("info", $request->session()->get('info'));
        return view('optionsForm',[
            'title' => 'Editar Enquete',
            'message' => $request->session()->get('message'),
            'options'=> $options
        ]);
    }

    public function update(Request $request) {
        $enquete = Enquete::find($request->id);
        $info = $request->session()->get('info');
        $enquete->title = $info['title'];
        $enquete->question = $info['question'];
        $enquete->dt_start = $info['dt_start'];
        $enquete->dt_end = $info['dt_end'];
        $enquete->update();
        
        $aux = 200;

        $options = $enquete->options;
        for ($i=1; $i < count($options)+1; $i++) { 
            // error_log($option[$i]->option);
            $options[$i-1]->option = $request["_$i"];
            $options[$i-1]->update();
        };

        $msg = (object)[];
        $msg->color = 'green';
        $msg->text = "Enquete {$enquete->title} editada com sucesso!";
        $request->session()->flash("message", $msg);
        return redirect("/");
    }

    public function cancelUpdate() {
        return redirect('/');
    }
}