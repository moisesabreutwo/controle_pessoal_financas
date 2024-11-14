<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DespesasGrupo extends Model
{
    use HasFactory;

    protected $table = 'CPF_despesasGrupo';

    protected $fillable = [
        'codigoDespesasGrupo',
        'descricaoDespesasGrupo',
    ];

    public $timestamps = true;
}
