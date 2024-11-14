<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceitasClassificacao extends Model
{
    use HasFactory;

    protected $table = 'CPF_receitasClassificacao';

    protected $fillable = [
        'codigoReceitasClassificacao',
        'descricaoReceitasClassificacao',
    ];

    public $timestamps = true;
}
