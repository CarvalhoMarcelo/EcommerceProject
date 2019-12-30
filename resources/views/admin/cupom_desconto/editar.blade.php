{{-- 

    Equipe: <CODE></COM>

	Sprint: 5
	Desenvolvedor: Marcelo Carvalho
	Controle de Versao Sprint 5 - Editar o Cumpom de Desconto
	******************************************
	Versão: 0.9 - Data: 2018-08-30 (Marcelo Carvalho)

--}}

@extends('layout')
@extends('layouts.menu')
@extends('layouts.rodape')
@section('pagina_titulo', 'Editar cupom')

@section('pagina_conteudo')
	<div class="container">
		<div class="row">
			<h3>Editar cupom "{{ $registro->nome }}"</h3>
			<form method="POST" action="{{ route('admin.cupons.atualizar', $registro->id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				@include('admin.cupom_desconto._form')

				{{-- <button type="submit" class="btn blue">Atualizar</button> --}}
				<button type="submit" class="btn blue" style="float:left;">Atualizar</button>
				<div class='d-inline col col-1 offset-1'><a href="{{route('admin.cupons')}}" class="btn blue" style="float:left;">Voltar</a></div>				




			</form>
		</div>
	</div>
@endsection