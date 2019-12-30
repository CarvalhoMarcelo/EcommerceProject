{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Pagina Index Cadastro de Produtos
******************************************
Versão: 0.9 - Data: 2018-08-30 (Marcelo Carvalho)

--}}


@extends('layout')
@extends('layouts.menu')
@extends('layouts.rodape')
@section('pagina_titulo', 'MeetApples - Produtos')

@section('pagina_conteudo')

	<div class="container">
		@if (Session::has('admin-mensagem-sucesso'))
			<div class="card-panel green"><strong>{{ Session::get('admin-mensagem-sucesso') }}<strong></div>
		@endif		

		<div class="row">
			<a class="btn-floating btn-large blue tooltipped" href="{{ route('produtos.adicionar') }}" title="Adicionar" data-position="top" data-delay="50" data-tooltip="Adicionar produto?">
				<i class="material-icons">add</i>
			</a>
			Click aqui para cadastrar seus produtos
		</div>


		<div class="row">
			<h3>Lista de produtos cadastrados</h3>
			<table>
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
						<th>Nome</th>
						<th>Valor</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($produtos as $produto)
					<tr>
						<td>
							<a class="btn-flat tooltipped" href="{{ route('produtos.editar', $produto->id) }}" class="btn-flat tooltipped" data-position="right" data-delay="50" data-tooltip="Editar produto?">
								<i class="material-icons black-text">mode_edit</i>
							</a>
							<a class="btn-flat tooltipped" href="{{ route('produtos.deletar', $produto->id) }}" class="btn-flat tooltipped" data-position="right" data-delay="50" data-tooltip="Deletar produto?">
								<i class="material-icons black-text">delete</i>
								</a>
						</td>
						<td>{{ $produto->id }}</td>
						<td>{{ $produto->nome }}</td>
						<td>R$ {{ $produto->valor }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection