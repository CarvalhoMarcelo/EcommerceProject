<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        return view('index')->with('qtItens',$qtItens);
    }

    public function faq(){

        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        return view('faq')->with('qtItens',$qtItens);
    }
    


}
