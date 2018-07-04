<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasJuridicasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pessoas_juridicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj');
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('cep');
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('estado');
            $table->string('cidade');
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pessoas_juridicas');
    }
}
