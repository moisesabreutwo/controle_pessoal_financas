<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificacaoCliente extends Model
{
    use HasFactory;

    protected $table = 'CPF_identificacaoCliente';

    protected $fillable = [
        'nomeIdentificacaoCliente',
        'dataNascimentoIdentificacaoCliente',
        'sexoIdentificacaoCliente',
        'ufResidenciaIdentificacaoCliente',
        'ddiIdentificacaoCliente',
        'dddIdentificacaoCliente',
        'telefoneCelularIdentificacaoCliente',
        'cpfIdentificacaoCliente',
        'envioMensagemIdentificacaoCliente',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

