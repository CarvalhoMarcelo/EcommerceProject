{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Listagem das Compras Efetuadas/Canceladas
******************************************
Versão: 0.9 - Data: 2018-08-17 (Marcelo Carvalho)

--}}



@extends('layout')
@extends('layouts.menu')
@extends('layouts.rodape')
@section('pagina_titulo', 'COMPRAS' )

@section('pagina_conteudo')

<br><p></p>

{{-- <div class="container">
    <div class="row"> --}}

       <h3>Minhas compras</h3>

        @if (Session::has('mensagem-sucesso'))
            <div class="card-panel green">{{ Session::get('mensagem-sucesso') }}</div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card-panel red">{{ Session::get('mensagem-falha') }}</div>
        @endif

        <div class="divider"></div>
        <h4>Compras concluídas</h4>
        <div class="row col s12 m12 l12">
            @forelse ($compras as $pedido)
                <div class="card-panel cyan col l12 row">                
                        <h5 class="col l6 s12 m6"> Pedido: {{ $pedido->id }} </h5>
                        <h5 class="col l6 s12 m6"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                </div>              
                    <table>
                    <form method="POST" action="{{ route('carrinho.cancelar') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                        <thead>
                            <tr>
                                <th colspan="2"></th>
                                <th>Produto</th>
                                <th>Valor</th>
                                <th>Desconto</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $total_pedido = 0;
                        @endphp

                        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                            @php
                                $total_produto = $pedido_produto->valor - $pedido_produto->desconto;
                                $total_pedido += $total_produto;
                            @endphp
                            <tr>
                                <td class="center">
                                    @if($pedido_produto->status == 'PA')
                                        <p class="center">
                                            <input type="checkbox" id="item-{{ $pedido_produto->id }}" name="id[]" value="{{ $pedido_produto->id }}" />
                                            <label for="item-{{ $pedido_produto->id }}">Selecionar</label>
                                        </p>
                                    @else
                                        <strong class="red-text">CANCELADO</strong>
                                    @endif
                                </td>
                                <td>
                                    <img width="100" height="100" src="{{ $pedido_produto->produto->imagem }}">
                                </td>
                                <td>{{ $pedido_produto->produto->nome }}</td>
                                <td>R$ {{ number_format($pedido_produto->valor, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($pedido_produto->desconto, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td><strong>Total do pedido</strong></td>
                                <td>R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn-large red col l12 s12 m12 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Cancelar itens selecionados">
                                        Cancelar
                                    </button>   
                                </td>
                                <td colspan="3"></td>
                            </tr>
                        </tfoot>
                    </form>
                    </table>    
            @empty
                <h5 class="center">
                    @if ($cancelados->count() > 0)
                        Neste momento não há nenhuma compra valida.
                    @else
                        <div class="card-panel red">Você não fez nenhuma compra.</div>                        
                    @endif
                </h5>
            @endforelse
        </div>
        <div class="divider"></div>
        <h4>Compras canceladas</h4>
        <div class="row col s12 m12 l12">            
            @forelse ($cancelados as $pedido)                                
                <div class="card-panel yellow col l12 row">
                    <h5 class="col l2 s12 m2"> Pedido: {{ $pedido->id }} </h5>
                    <h5 class="col l5 s12 m5"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>
                    <h5 class="col l5 s12 m5"> Cancelado em: {{ $pedido->updated_at->format('d/m/Y H:i') }} </h5>
                </div>                        
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Produto</th>
                            <th>Valor</th>
                            <th>Desconto</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_pedido = 0;
                        @endphp
                        @foreach ($pedido->pedido_produtos_itens as $pedido_produto)
                            @php
                                $total_produto = $pedido_produto->valor - $pedido_produto->desconto;
                                $total_pedido += $total_produto;
                            @endphp
                        <tr>
                            <td>
                                <img width="100" height="100" src="{{ $pedido_produto->produto->imagem }}">
                            </td>
                            <td>{{ $pedido_produto->produto->nome }}</td>
                            <td>R$ {{ number_format($pedido_produto->valor, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($pedido_produto->desconto, 2, ',', '.') }}</td>
                            
                            <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Total do pedido</strong></td>
                            <td>R$ {{ number_format($total_pedido, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            @empty
            <div class="card-panel red"><h5 class="center">Nenhuma compra foi cancelada ainda.</h5></div>                        
                
            @endforelse
        </div>
    {{-- </div>
</div> --}}

@endsection