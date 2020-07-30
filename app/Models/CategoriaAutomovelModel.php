<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaAutomovelModel extends Model
{
    protected $table = 'categoria_automovel';

    protected $fillable = ['nome'];

    public function relAutomovel()
    {
        return $this->hasMany('App\Models\AutomovelModel', 'id_categoria_automovel');
    }
}
