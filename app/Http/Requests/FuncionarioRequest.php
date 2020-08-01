<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'nome' => 'required|min:7',
            'data_nascimento' => 'required|date',
            'id_filial' => 'required',
            'sexo' => 'required',
            'cpf' => 'required|min:14',
            'endereco' => 'required',
            'cargo' => 'required',
            'salario' => 'required',
            'situacao' => 'required',
            'password' => 'required'
        ];
    }
}
