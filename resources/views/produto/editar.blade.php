{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Pagina Alteração de Produtos
******************************************
Versão: 0.9 - Data: 2018-08-30 (Marcelo Carvalho)

--}}



@extends('layout')
@extends('layouts.menu')
@extends('layouts.rodape')
@section('pagina_titulo', 'MeetApples - Produtos editar')

@section('pagina_conteudo')

	<div class="container">
		<hr/>
		<h3>Editar produto "{{ $registro->nome }}"</h3>
		<hr/>
		<div class="row">
			<form method="POST" action="{{ route('produtos.atualizar', $registro->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				@include('produto._form')

				<button type="submit" class="btn blue">Atualizar</button>
				<div class='d-inline'><a href="{{route('produtos.index')}}" class="btn blue" style="float:right;">Voltar</a></div>				
			</form>
		</div>
	</div>
	@include('produto._lib')
@endsection