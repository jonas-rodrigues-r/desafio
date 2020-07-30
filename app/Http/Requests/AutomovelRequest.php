<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutomovelRequest extends FormRequest
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
            'ano' => 'required|min:4|max:4',
            'modelo' => 'required',
            'cor' => 'required',
            'n_chassi' => 'required|17',
            'id_filial' => 'required',
            'id_categoria_automovel' => 'required'
        ];
    }
}
