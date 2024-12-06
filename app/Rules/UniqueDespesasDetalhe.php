<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\DespesasDetalhe;

class UniqueDespesasDetalhe implements Rule
{
    protected $codigoDespesasGrupo;

    public function __construct($codigoDespesasGrupo)
    {
        $this->codigoDespesasGrupo = $codigoDespesasGrupo;
    }

    public function passes($attribute, $value): bool
    {
        // Verifica se a combinação de codigoDespesasGrupo e codigoDespesasDetalhe já existe
        return !DespesasDetalhe::where('codigoDespesasGrupo', $this->codigoDespesasGrupo)
            ->where('codigoDespesasDetalhe', $value)
            ->exists();
    }

    public function message(): string
    {
        return 'A combinação de Código de Grupo e Código de Detalhe já existe.';
    }
}
