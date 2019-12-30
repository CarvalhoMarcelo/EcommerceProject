<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CupomDesconto;
use App\Http\Controllers\CarrinhoController;

class CupomDescontoController extends Controller
{
    public function index()
    {
        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        $cupons = CupomDesconto::all();
        return view('admin.cupom_desconto.index', compact('cupons'))->with('qtItens',$qtItens);
    }

    public function adicionar()
    {
        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        return view('admin.cupom_desconto.adicionar')->with('qtItens',$qtItens);
    }

    public function editar($id)
    {
        $car = new CarrinhoController();
        $qtItens = $car->contaItens();

        $registro = CupomDesconto::find($id);
        if( empty($registro->id) ) {
            return redirect()->route('admin.cupons');
        }
        return view('admin.cupom_desconto.editar', compact('registro'))->with('qtItens',$qtItens);
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        CupomDesconto::create($dados);

        $req->session()->flash('admin-mensagem-sucesso', 'Cupom de desconto criado com sucesso!');

        return redirect()->route('admin.cupons');
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        CupomDesconto::find($id)->update($dados);

        $req->session()->flash('admin-mensagem-sucesso', 'Cupom de desconto atualizado com sucesso!');

        return redirect()->route('admin.cupons');
    }

    public function deletar($id)
    {

        CupomDesconto::find($id)->delete();

        $req->session()->flash('admin-mensagem-sucesso', 'Cupom de desconto deletado com sucesso!');

        return redirect()->route('admin.cupons');
    }
}
