{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Index do Cumpom de Desconto
******************************************
Versão: 0.9 - Data: 2018-08-28 (Marcelo Carvalho)

--}}



@extends('layout')
@extends('layouts.menu')
@extends('layouts.rodape')

@section('pagina_titulo', 'Cupons de desconto')

@section('pagina_conteudo')

	<div class="container">
		@if (Session::has('admin-mensagem-sucesso'))
			<div class="card-panel green"><strong>{{ Session::get('admin-mensagem-sucesso') }}<strong></div>
		@endif							

		<div class="row">
			<h3>Lista de cupons de desconto</h3>
			<table>
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
						<th>Nome</th>
						<th>Localizador</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($cupons as $cupom)
					<tr>
						<td>
							<a class="btn-flat tooltipped" href="{{ route('admin.cupons.editar', $cupom->id) }}" class="btn-flat tooltipped" data-position="right" data-delay="50" data-tooltip="Editar cupom?">
								<i class="material-icons black-text">mode_edit</i>
							</a>
							<a class="btn-flat tooltipped" href="{{ route('admin.cupons.deletar', $cupom->id) }}" class="btn-flat tooltipped" data-position="right" data-delay="50" data-tooltip="Deletar cupom?">
								<i class="material-icons black-text">delete</i>
								</a>
						</td>
						<td>{{ $cupom->id }}</td>
						<td>{{ $cupom->nome }}</td>
						<td>{{ $cupom->localizador }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
			<a class="btn-floating btn-large blue tooltipped" href="{{ route('admin.cupons.adicionar') }}" title="Adicionar" data-position="top" data-delay="50" data-tooltip="Adicionar cupom?">
				<i class="material-icons">add</i>
			</a>
		</div>
	</div>

@endsection