{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Mostra Produto Individual
******************************************
Versão: 0.9 - Data: 2018-08-23 (Marcelo Carvalho)

--}}


@extends('layout')
@extends('layouts.menu')
{{-- @extends('layouts.pesquisa') --}}
@extends('layouts.rodape')
@section('pagina_titulo', $registro->nome )

@section('pagina_conteudo')

<div class="container">
    <div class="row">
        {{-- <h3>{{ $registro->nome }}</h3> --}}
        <div class="divider"></div>
        <div class="section col s12 m6 l4">
            <div class="card small">
                <img class="materialboxed" width="300px" data-caption="{{ $registro->nome }}" 
                     src="{{ $registro->imagem }}" alt="{{ $registro->nome }}" title="{{ $registro->nome }}"
                     style="object-fit:contain">      
            </div>
        </div>
        <div class="section col s12 m6 l6">
            <h3>{{ $registro->nome }}</h3>
            <h4 class="left col l6"> R$ {{ number_format($registro->valor, 2, ',', '.') }} </h4>
            <br><p></p>
            {{-- <div class="section col s12 m6 l6"> --}}
             <div class="left">
                {!! $registro->descricao !!}
            </div>            
            <br><p></p><br>
            <form method="POST" action="{{ route('carrinho.adicionar') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $registro->id }}">
                    <br><p></p>
                    <button class="btn-large col l6 m6 s6 green accent-4 tooltipped"
                            data-position="bottom" data-delay="50" 
                            data-tooltip="O produto será adicionado ao seu carrinho">
                            Comprar
                    </button>   
                </form>
        </div>
    </div>
</div>
@endsection