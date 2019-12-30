<?php

use Illuminate\Database\Seeder;
use App\Login;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Login::create([
            'email' => 'jose@jose.com',
            'nome' => 'jose',
            'sobrenome' => 'jose',
            'senha' => Hash::make('123')
        ]);
    }
}
