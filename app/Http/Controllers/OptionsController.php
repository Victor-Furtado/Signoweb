<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function create(Request $request) {
        return view('optionsForm',[
            'title' => 'Criar Enquete',
            'message' => $request->session()->get('message'),
            "n_options"=> $request->session()->get('n_options')
        ]);
    }
}
