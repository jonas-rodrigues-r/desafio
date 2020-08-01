<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutomovelModel extends Model
{
    protected $table = 'automovel';
    protected $fillable = [
        'nome',
        'id_filial',
        'nome',
        'ano',
        'modelo',
        'cor',
        'n_chassi',
        'id_categoria_automovel'
    ];

    public function relFilial()
    {
        return $this->hasOne('App\Models\FilialModel', 'id', 'id_filial');
    }

    public function relCategoria_Automovel()
    {
        return $this->hasOne('App\Models\CategoriaAutomovelModel', 'id', 'id_categoria_automovel');
    }
}
