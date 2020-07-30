<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncionarioModel extends Model
{
    protected $table = 'funcionario';
    protected $fillable = [
        'nome',
        'id_filial',
        'data_nascimento',
        'sexo',
        'cpf',
        'endereco',
        'cargo',
        'salario',
        'situacao',
        'password'];

    public function relFilial()
    {
        return $this->hasOne('App\Models\FilialModel', 'id', 'id_filial');
    }
}
