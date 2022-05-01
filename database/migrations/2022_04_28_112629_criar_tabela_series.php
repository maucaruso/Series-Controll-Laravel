<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // O Schema abaixo cria uma base chamada series e insere uma coluna "nome" do tipo string dentro dela
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // O comando abaixo deleta a tabela "series", criada anteriormente
        Schema::drop('series');
    }
}
