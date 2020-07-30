<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAutomovel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automovel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_filial')->unsigned();
            $table->foreign('id_filial')->references('id')
            ->on('filial')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('nome','80');
            $table->integer('ano');
            $table->string('modelo','50');
            $table->string('cor','50');
            $table->string('n_chassi','17');
            $table->integer('id_categoria_automovel')->unsigned();
            $table->foreign('id_categoria_automovel')
            ->references('id')->on('automovel')->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('automovel');
    }
}
