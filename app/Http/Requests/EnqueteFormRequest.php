<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnqueteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|string',
            'question'=>'required|string',
            'dt_start'=>'date',
            'dt_end'=>'date',
            'n_options'=>'integer|min:3'
        ];
    }

    public function messages() {
        return [
            'title.required' => "A enquete deve possuir um título",
            'question.required' => "A enquete deve possuir uma pergunta",
            'required' => "O dev esqueceu algo, entre em contato com o suporte",
            'integer'=> "O campos de quantidade deve ser um número",
            'dt_start.date'=> "A data proposta para inicio está inválida",
            'dt_end.date'=> "A data proposta para fim está inválida",
            'n_options.min'=> "A enquete deve conter ao menos 3 opções",
            'string'=> "Os campos devem ser linhas de texto! O que você está tentando fazer?",
        ];
    }
}