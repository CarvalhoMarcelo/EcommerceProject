<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//   Route::get('/', function () {
//       return view('welcome');
//   });     


Route::get('/', 'IndexController@index')->name('index'); 

Route::get('/faq', 'IndexController@faq')->name('faq'); 

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@checklogin');
Route::get('/loginsucesso', 'LoginController@loginsucesso');
Route::get('/logout', 'LoginController@logout');

Route::get('/cadastro', 'LoginController@cadastro')->name('cadastro');
Route::post('/cadastro', 'LoginController@checkcadastro');

Route::get('find', 'SearchController@find');

//******************************************************************************************************** */

Route::get('/produtos', 'ProdutosController@produtos')->name('produtos');
Route::get('/produtoEspecifico/{id}', 'ProdutosController@produtoEspecifico')->name('produtoEspecifico');
Route::get('/produto/{id}', 'ProdutosController@produto')->name('produto');

Route::get('/produtos/procura/{id}', 'ProdutosController@produtos')->name('produtosProcura');



Route::get('/produtos/produtos', 'ProdutoController@index')->name('produtos.index');
Route::get('/produtos/adicionar', 'ProdutoController@adicionar')->name('produtos.adicionar');
Route::post('/produtos/salvar', 'ProdutoController@salvar')->name('produtos.salvar');
Route::get('/produtos/editar/{id}', 'ProdutoController@editar')->name('produtos.editar');
Route::put('/produtos/atualizar/{id}', 'ProdutoController@atualizar')->name('produtos.atualizar');
Route::get('/produtos/deletar/{id}', 'ProdutoController@deletar')->name('produtos.deletar');


//******************************************************************************************************** */

Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');
Route::get('/carrinho/adicionar', function () {
    return redirect()->route('index');
});
Route::get('/carrinho/remover', function () {
    return redirect()->route('index');
});
Route::get('/carrinho/concluir', function () {
    return redirect()->route('index');
});
Route::get('/carrinho/cancelar', function () {
    return redirect()->route('index');
});
Route::get('/carrinho/desconto', function () {
    return redirect()->route('index');
});
Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');
Route::delete('/carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');
Route::post('/carrinho/concluir', 'CarrinhoController@concluir')->name('carrinho.concluir');
Route::get('/carrinho/compras', 'CarrinhoController@compras')->name('carrinho.compras');
Route::post('/carrinho/cancelar', 'CarrinhoController@cancelar')->name('carrinho.cancelar');
Route::post('/carrinho/desconto', 'CarrinhoController@desconto')->name('carrinho.desconto');

//******************************************************************************************************** */


// rotas do admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('cupons', 'Admin\CupomDescontoController@index')->name('admin.cupons');
    Route::get('cupons/adicionar', 'Admin\CupomDescontoController@adicionar')->name('admin.cupons.adicionar');
    Route::post('cupons/salvar', 'Admin\CupomDescontoController@salvar')->name('admin.cupons.salvar');
    Route::get('cupons/editar/{id}', 'Admin\CupomDescontoController@editar')->name('admin.cupons.editar');
    Route::put('cupons/atualizar/{id}', 'Admin\CupomDescontoController@atualizar')->name('admin.cupons.atualizar');
    Route::get('cupons/deletar/{id}', 'Admin\CupomDescontoController@deletar')->name('admin.cupons.deletar');
});


?>