<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpfIdentificacaoclienteTable extends Migration
{
    public function up()
    {
        Schema::create('CPF_identificacaoCliente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relacionamento com a tabela de usuários
            $table->string('nomeIdentificacaoCliente', 70);
            $table->date('dataNascimentoIdentificacaoCliente');
            $table->string('sexoIdentificacaoCliente', 1);
            $table->string('ufResidenciaIdentificacaoCliente', 2);
            $table->string('ddiIdentificacaoCliente', 4);
            $table->string('dddIdentificacaoCliente', 2);
            $table->string('telefoneCelularIdentificacaoCliente', 9);
            $table->string('cpfIdentificacaoCliente', 11);
            $table->string('envioMensagemIdentificacaoCliente', 1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('CPF_identificacaoCliente');
    }
}
