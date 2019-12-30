{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Pagina Inserir Produtos
******************************************
Versão: 0.9 - Data: 2018-08-30 (Marcelo Carvalho)

--}}


@extends('layout')
@extends('layouts.menu')
@extends('layouts.rodape')
@section('pagina_titulo', 'MeetApples - Produtos adicionar')

@section('pagina_conteudo')
	<div class="container">
		<hr/>
		<h3>Adicionar produto</h3>
		<hr/>
		<div class="row">
			<form method="POST" action="{{ route('produtos.salvar') }}">
				{{ csrf_field() }}
				@include('produto._form')

				<button type="submit" class="btn blue">Salvar</button>
				<div class='d-inline'><a href="{{route('produtos.index')}}" class="btn blue" style="float:right;">Voltar</a></div>
			</form>
		</div>
	</div>
	@include('produto._lib')
@endsection