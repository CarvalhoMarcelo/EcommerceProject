{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Adicionar Cumpom de Desconto
******************************************
Versão: 0.9 - Data: 2018-08-30 (Marcelo Carvalho)

--}}


@extends('layout')
@extends('layouts.menu')
@extends('layouts.rodape')
@section('pagina_titulo', 'Adicionar cupom')

@section('pagina_conteudo')
	<div class="container">
		<hr/>
		<h3>Adicionar cupom</h3>
		<hr/>
		<div class="row">
			<form method="POST" action="{{ route('admin.cupons.salvar') }}">
				{{ csrf_field() }}
				@include('admin.cupom_desconto._form')

				<button type="submit" class="btn blue" style="float:left;">Salvar</button>
				<div class='d-inline col col-2 offset-2'><a href="{{route('admin.cupons')}}" class="btn blue" style="float:right;">Voltar</a></div>				
			</form>
		</div>
	</div>
@endsection