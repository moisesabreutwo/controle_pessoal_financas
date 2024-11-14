<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('CPF_receitasClassificacao', function (Blueprint $table) {
            $table->id();
            $table->string('codigoReceitasClassificacao', 2)->unique();
            $table->string('descricaoReceitasClassificacao', 40);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CPF_receitasClassificacao');
    }
};
