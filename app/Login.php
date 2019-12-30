<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    protected $table = 'usuario';
    protected $fillable = ['email','senha','nome','sobrenome','cpf','nasc','endereco'];

    public function getAuthPassword() {
        return $this->senha;
    }

}
