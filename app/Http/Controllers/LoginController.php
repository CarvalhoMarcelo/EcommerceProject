<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Login;
use Validator;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        return view('login');
    }

    public function checklogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'senha' => 'required|alphaNum|min:3'
            ]
        );

        $email = $request->input('email');
        $senha = $request->get('senha');

        $user_data = array(
            'email' => $email,
            'password' => $senha
        );

        // dd($user_data);
        // exit;

        if (Auth::attempt($user_data)) {
            return redirect('loginsucesso');
        } else {
            return back()->with('error', 'Usuario ou Senha inválido!!!');
        }

    }
    public function loginsucesso() {
        return view ('login_sucesso');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function cadastro(Request $req){

        // dd($req);
        // exit;
        return view('cadastro');
    }

    public function checkcadastro(Request $req){

        // $this->validate($req, [            
        //     'email_user' => 'required|email',
        //     'email_confirm' => 'required|email',
        //     'senha' => 'required|alphaNum|min:3',
        //     'senha_confirm' => 'required|alphaNum|min:3',
        //     'primeironome' => 'required',
        //     'sobrenome' => 'required',
        //     'cpf' => 'required',
        //     'endereco' => 'required',
        //     'nascimento' => 'required'
        // ]);        

        $email = $req->input('email_user');
        $senha = $req->input('senha');

        $nome = $req->input('nome');
        $sobrenome = $req->input('sobrenome');
        // $cpf = $req->input('cpf');
        $cpfNum = $req->input('cpfNum');
        $endereco = $req->input('endereco');
        $nascimento = $req->input('nascimento');
        
        $usuario = Login::where('email', '=', $email)->get();      

        if(count($usuario) > 0){
            $req->session()->flash('mensagem-falha', 'Esse e-mail já existe em nosso sistema! Por favor faça Login!');
            return view('cadastro');        }
        else{
            $req->session()->flash('mensagem-sucesso', 'Usuario cadastrado com sucesso! Clique em Voltar para fazer Login ! ');

            // dd($req);
            // exit;

            Login::create([
                'email'  => $email,
                'senha'  => Hash::make($senha),
                'nome'   => $nome,
                'sobrenome' => $sobrenome,
                'cpf' => $cpfNum,
                'endereco' => $endereco,
                'nasc' => $nascimento
                ]);     
            return view('cadastro');
        }
    }





}
