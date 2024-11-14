<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('CPF_dadosExcepcionais', function (Blueprint $table) {
            $table->id();
            $table->string('enderecoLogo', 100);
            $table->string('conteudoTela', 30);
            $table->string('nomeEmpresa', 40);
            $table->string('nomeFantasiaEmpresa', 40);
            $table->string('mensagemPositiva', 256);
            $table->decimal('valorDeposito', 10, 2);
            $table->string('chavePix', 50);
            $table->string('valorDepositoExtenso', 40);
            $table->string('moedaReferencia', 2);
            $table->string('cnpjEmpresa', 14);
            $table->string('emailContato', 50);
            $table->string('conteudoFoto', 30);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CPF_dadosExcepcionais');
    }
};
