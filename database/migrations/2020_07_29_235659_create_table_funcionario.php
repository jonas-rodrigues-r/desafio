<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFuncionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_filial')->unsigned();
            $table->foreign('id_filial')->references('id')
            ->on('filial')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nome','100');
            $table->date('data_nascimento');
            $table->string('sexo','1');
            $table->string('cpf','11');
            $table->string('endereco','100');
            $table->string('cargo','50');
            $table->double('salario', 10, 3);
            $table->boolean('situacao');
            $table->string('password');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
}
