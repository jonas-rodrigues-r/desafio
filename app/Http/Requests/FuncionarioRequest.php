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
            'nome' => 'required',
            'id_filial' => 'required',
            'sexo' => 'required',
            'cpf' => 'required',
            'endereco' => 'required',
            'cargo' => 'required',
            'salario' => 'required',
            'situacao' => 'required',
            'password' => 'required'
        ];
    }
}
