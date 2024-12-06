<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ReceitasDetalhe;

class UniqueReceitasDetalhe implements Rule
{
    protected $codigoReceitasGrupo;

    public function __construct($codigoReceitasGrupo)
    {
        $this->codigoReceitasGrupo = $codigoReceitasGrupo;
    }

    public function passes($attribute, $value): bool
    {
        // Verifica se já existe uma combinação de codigoReceitasGrupo e codigoReceitasDetalhe
        return !ReceitasDetalhe::where('codigoReceitasGrupo', $this->codigoReceitasGrupo)
            ->where('codigoReceitasDetalhe', $value)
            ->exists();
    }

    public function message(): string
    {
        return 'A combinação de Código de Grupo e Código de Detalhe já existe.';
    }
}
