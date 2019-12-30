<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupomDesconto extends Model
{
    protected $table = 'cupom_descontos';
    
    protected $fillable = [
        'nome',
        'localizador',
        'desconto',
        'modo_desconto',
        'limite',
        'modo_limite',
        'dthr_validade',
        'ativo'
    ];
}
