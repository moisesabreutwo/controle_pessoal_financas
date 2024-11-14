<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DespesasClassificacao extends Model
{
    use HasFactory;

    protected $table = 'CPF_despesasClassificacao';

    protected $fillable = [
        'codigoDespesasClassificacao',
        'descricaoDespesasClassificacao',
    ];

    public $timestamps = true;
}
