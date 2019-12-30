<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Produto;
use App\Http\Controllers\CarrinhoController;


class ProdutoController extends Controller
{

    function __construct(){
        $this->middleware('checklogin');
    }

    public function index()
    {
        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        $produtos = Produto::all();
        return view('produto.index', compact('produtos'))->with('qtItens',$qtItens);
    }

    public function adicionar()
    {
        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        return view('produto.adicionar')->with('qtItens',$qtItens);
    }

    public function editar($id)
    {
        $registro = Produto::find($id);
        if( empty($registro->id) ) {
            return redirect()->route('produtos.index');
        }

        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        return view('produto.editar', compact('registro'))->with('qtItens',$qtItens);
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        Produto::create($dados);

        $req->session()->flash('admin-mensagem-sucesso', 'Produto cadastrado com sucesso!');

        return redirect()->route('produtos.index');
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        Produto::find($id)->update($dados);

        $req->session()->flash('admin-mensagem-sucesso', 'Produto atualizado com sucesso!');

        return redirect()->route('produtos.index');
    }

    public function deletar(Request $req, $id)
    {

        Produto::find($id)->delete();

        $req->session()->flash('admin-mensagem-sucesso', 'Produto deletado com sucesso!');

        return redirect()->route('produtos.index');
    }
}
