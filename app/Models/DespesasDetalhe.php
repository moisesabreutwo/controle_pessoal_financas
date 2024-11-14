<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DespesasDetalhe extends Model
{
    use HasFactory;

    protected $table = 'CPF_despesasDetalhe';

    protected $fillable = [
        'codigoDespesasGrupo',
        'codigoDespesasDetalhe',
        'descricaoDespesasDetalhe',
    ];

    public $timestamps = true;

    // Relação com DespesasGrupo
    public function grupo()
    {
        return $this->belongsTo(DespesasGrupo::class, 'codigoDespesasGrupo', 'codigoDespesasGrupo');
    }
}
