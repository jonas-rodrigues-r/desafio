<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilialModel extends Model
{
    protected $table = 'filial';

    protected $fillable = [
        'nome',
        'endereco',
        'inscricao_estadual',
        'cnpj'
    ];

    public function relFuncionario()
    {
        return $this->hasMany('App\Models\FuncionarioModel', 'id_filial');
    }

    public function relAutomovel()
    {
        return $this->hasMany('App\Models\AutomovelModel', 'id_filial');
    }
}
