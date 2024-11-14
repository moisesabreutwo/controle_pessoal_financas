<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosExcepcionais extends Model
{
    use HasFactory;

    protected $table = 'CPF_dadosExcepcionais';

    protected $fillable = [
        'enderecoLogo',
        'conteudoTela',
        'nomeEmpresa',
        'nomeFantasiaEmpresa',
        'mensagemPositiva',
        'valorDeposito',
        'chavePix',
        'valorDepositoExtenso',
        'moedaReferencia',
        'cnpjEmpresa',
        'emailContato',
        'conteudoFoto',
    ];

    public $timestamps = true;
}
