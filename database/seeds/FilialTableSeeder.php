<?php

use Illuminate\Database\Seeder;
use App\Models\FilialModel;

class FilialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         FilialModel::create([
            'id' => 1,
            'nome' => 'Colibri Cars',
            'endereco' => 'Rua Colibri, Santa Teresa - ES',
            'inscricao_estadual' => '920502555',
            'cnpj' => '11233992000113',
        ]);
    }
}
