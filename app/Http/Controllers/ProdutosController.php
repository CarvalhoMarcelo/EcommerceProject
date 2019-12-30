<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;


class ProdutosController extends Controller
{

    public function produtos()
    {
        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        $registros = Produto::where([
            'ativo' => 'S'
            ])->get();
        return view('carrinho.produtos', compact('registros'))->with('qtItens',$qtItens);
    }


    public function produtosProcura($id = null)
    {
        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        if( !empty($id) ) {
            $registros = Produto::where('nome', 'LIKE', '%$id%')->get();
            if( !empty($registros) ) {
                return view('carrinho.produtos', compact('registros'))->with('qtItens',$qtItens);
            }
        }
        return redirect()->route('carrinho.produtos');
    }


    public function produtoEspecifico($id = null)
    {
        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        if( !empty($id) ) {
            $registros = Produto::where([
                'tipo_produto' => $id
                ])->get();

            if( !empty($registros) ) {
                return view('carrinho.produtoespecifico', compact('registros'))->with('qtItens',$qtItens);
            }
        }
        return redirect()->route('carrinho.produtos');
    }

    public function produto($id = null)
    {

        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        if( !empty($id) ) {
            $registro = Produto::where([
                'id'    => $id,
                'ativo' => 'S'
                ])->first();

            if( !empty($registro) ) {
                return view('carrinho.produto', compact('registro'))->with('qtItens',$qtItens);
            }
        }
        return redirect()->route('carrinho.produtos');
        // return view('carrinho.produtos');
        // return redirect()->route('index');
    }
}
