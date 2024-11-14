<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceitasDetalhe extends Model
{
    use HasFactory;

    protected $table = 'CPF_receitasDetalhe';

    protected $fillable = [
        'codigoReceitasGrupo',
        'codigoReceitasDetalhe',
        'descricaoReceitasDetalhe',
    ];

    public $timestamps = true;

    // Relação com ReceitasGrupo
    public function grupo()
    {
        return $this->belongsTo(ReceitasGrupo::class, 'codigoReceitasGrupo', 'codigoReceitasGrupo');
    }
}
