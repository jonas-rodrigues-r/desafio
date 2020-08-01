<?php

use Illuminate\Database\Seeder;
use App\Models\CategoriaAutomovelModel;

class CategoriaAutomovelTableSeeder extends Seeder
{
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrCategorias = [
            'Strada',
            'Hatch Pequeno',
            'Hatch Médio',
            'Sedã Médio',
            'Sedã Grande',
            'SUV, Pick-ups',
        ];

        $cont = 0;
        foreach ($arrCategorias as $categoria) {
            $cont++;
            CategoriaAutomovelModel::create([
                'id' => $cont,
                'nome' => $categoria
            ]);
        }
    }
}
