{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Lista produtos especificos por linha
******************************************
Versão: 0.9 - Data: 2018-08-30 (Marcelo Carvalho)

--}}


@extends('layout')
@extends('layouts.menu')
{{-- @extends('layouts.pesquisa') --}}
@extends('layouts.rodape')
@section('pagina_titulo', 'Produtos')

@section('pagina_conteudo')

<div class="container">
	<div class="row">
	@foreach($registros as $registro)
		<div class="col s12 m6 l1">
			<a href="{{ route('produto', $registro->id) }}">
				<div class="card small">
					{{-- <div class="container" > --}}
						<img src="{{ $registro->imagem }}" style="max-width:100%;max-height:100%;object-fit:contain">
					{{-- </div> --}}
				</div>    
			</a>			
			<div class="card-content">
				<span class="card-title grey-text text-darken-4 truncate" title="{{ $registro->nome }}">{{ $registro->nome }}</span>
				<p>R$ {{ number_format($registro->valor, 2, ',', '.') }}</p>
			</div>
			<div class="card-action">
				<a class="blue-text" href="{{ route('produto', $registro->id) }}">Veja mais informações</a>
			</div>
		</div>
	@endforeach
	</div>
</div>
@endsection

