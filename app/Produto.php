<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'imagem',
        'valor',
        'ativo'
    ];

    use SearchableTrait;
    protected $searchable = [
        'columns' => [
            'produtos.id' => 10,
            'produtos.nome' => 5,
            'produtos.image' => 3,
            'produtos.valor' => 2
        ]
    ];

    public function procura()
    {
        // return $this->hasOne(Profile::class);

        return $this->hasOne(Produto::class);

        // $registros = Produto::where([
        //     'ativo' => 'S'
        //     ])->get();
        // return $registros;    
    }









}
