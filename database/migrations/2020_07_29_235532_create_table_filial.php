<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFilial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', '100');
            $table->string('endereco', '100');
            $table->string('inscricao_estadual', '12');
            $table->string('cnpj', '14');
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
        Schema::dropIfExists('filial');
    }
}
