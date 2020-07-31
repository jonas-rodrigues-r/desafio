<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\FuncionarioModel;

class FuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuncionarioModel::create([
            'id' => 1,
            'nome' => 'Adminitrador Filial',
            'data_nascimento' => '1991-02-08',
            'sexo' => 'M',
            'cpf' => '38222419030',
            'endereco' => 'Rua 25 de Março - Santa Teresa - ES',
            'cargo' => 'Supervisor',
            'salario' => '5000.00',
            'situacao' => 1,
            'password' => Hash::make('#Adm91!'),
            'id_filial' => 1
        ]);
    }
}
