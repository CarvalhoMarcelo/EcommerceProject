{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Index do Carrinho de Compras
******************************************
Versão: 0.9 - Data: 2018-08-17 (Marcelo Carvalho)

--}}


@extends('layout')
@extends('layouts.menu')
@extends('layouts.rodape')
@section('pagina_titulo', 'Carrinho' )

@section('pagina_conteudo')           
            
            <h3>Produtos do Carrinho</h3>                    
            {{-- <hr/>                     --}}
            {{-- <div class="container">
                <div class="row">   --}}
                    @if (Session::has('mensagem-sucesso'))
                        <div class="card-panel green">
                            <strong>{{ Session::get('mensagem-sucesso') }}</strong>
                        </div>
                    @endif
                    @if (Session::has('mensagem-falha'))
                        <div class="card-panel red">
                            <strong>{{ Session::get('mensagem-falha') }}</strong>
                        </div>
                    @endif

                <div class="divider"></div>                    
                <div class="row col s12 m12 l12">

                    @forelse ($pedidos as $pedido)
                        <h4 class="col l12 s12 m6"> Pedido: {{ $pedido->id }} </h5>
                        <h4 class="col l6 s12 m6"> Criado em: {{ $pedido->created_at->format('d/m/Y H:i') }} </h5>          
                        
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="text-align:center">Quantidade</th>
                                    <th>Produto</th>
                                    <th>Valor Unit.</th>
                                    <th>Desconto(s)</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_pedido = 0;
                                @endphp
                                @foreach ($pedido->pedido_produtos as $pedido_produto)                                    
                                <tr>
                                    <td>
                                        <img width="100" height="100" src="{{ $pedido_produto->produto->imagem }}">
                                    </td>
                                    <td class="center-align">
                                        <div class="center-align">
                                            <a class="col l4 m4 s4" href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 1 )">
                                                <i class="material-icons small">remove_circle_outline</i>
                                            </a>
                                            <span class="col l4 m4 s4"> {{ $pedido_produto->qtd }} </span>                                            
                                            <a class="col l4 m4 s4" href="#" onclick="carrinhoAdicionarProduto({{ $pedido_produto->produto_id }})">
                                                <i class="material-icons small">add_circle_outline</i>
                                            </a>
                                        </div>
                                        <a href="#" onclick="carrinhoRemoverProduto({{ $pedido->id }}, {{ $pedido_produto->produto_id }}, 0)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Retirar produto do carrinho?">Retirar produto</a>
                                    </td>
                                    <td> {{ $pedido_produto->produto->nome }} </td>
                                    <td>R$ {{ number_format($pedido_produto->produto->valor, 2, ',', '.') }}</td>
                                    <td>R$ {{ number_format($pedido_produto->descontos, 2, ',', '.') }}</td>
                                    @php
                                        $total_produto = $pedido_produto->valores - $pedido_produto->descontos;
                                        $total_pedido += $total_produto;
                                    @endphp
                                    <td>R$ {{ number_format($total_produto, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row w-100">
                            <div class="row w-50 col offset-l2 ">
                                <form method="POST" action="{{ route('carrinho.desconto') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                                        <strong class="col s4 m4 l4 right-align">Cupom de desconto: </strong>
                                        <input class="col s6 m6 l4" type="text" name="cupom">
                                        <button class="btn-flat btn-large cyan col s2 m2 l4 tooltipped"
                                                data-position="top" data-delay="50" 
                                                data-tooltip="Valide o seu cupom antes de continuar!">
                                            Validar
                                        </button>
                                </form>
                            </div>
                            {{-- <strong class="col offset-l5 offset-m6 offset-s6 l4 m4 s4 right-align">Total do pedido: </strong>
                            <span class="col l2 m2 s2">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span> --}}
                            <div class="row w-50">
                                <strong class="col l5 offset-l5 right-align">Total do pedido: </strong>
                                <span class="col">R$ {{ number_format($total_pedido, 2, ',', '.') }}</span>
                            </div>
                        </div>                        

                        <div class="row col offset-5 right-align">
                            <a class="btn-large l12 s12 m12 offset-l1 offset-s1 offset-m1 tooltipped" 
                               data-position="top" data-delay="50" 
                               data-tooltip="Voltar a página inicial para continuar comprando?" 
                               href="{{route('produtos')}}">
                               Continuar comprando
                            </a>

                            {{-- <form method="POST" action="{{ route('carrinho.concluir') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                                <button type="submit" 
                                        class="btn-large blue col l12 s12 m12 offset-l1 offset-s1 offset-m1 tooltipped" 
                                        data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?">
                                    Concluir compra
                                </button>   
                            </form> --}}

                            <button 
                                class="btn-large blue col l12 s12 m12 offset-l1 offset-s1 offset-m1 tooltipped" 
                                data-position="top" data-delay="50" data-tooltip="Adquirir os produtos concluindo a compra?" id="btnConcluir">
                                Concluir compra
                            </button>   

                            <div id="myModal" class="w3-modal">
                                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                                        <header class="w3-container w3-teal">
                                            <span class="close">&times;</span>
                                            <h2>Pagamento</h2>
                                        </header>
                                        <form method="POST" action="{{ route('carrinho.concluir') }}" id="payment-form" class="datpayment-form">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                                            <div class="w3-container">
                                                <p>Informe os dados para pagamento</p>                        
                                                <div class="dpf-title">
                                                    Cartões Aceitos
                                                    <div class="accepted-cards-logo"></div>
                                                </div>
                                                <div class="dpf-card-placeholder"></div>
                                                <div class="dpf-input-container">
                                                    <div class="dpf-input-row">
                                                        <label class="dpf-input-label">Número do Cartão</label>
                                                        <div class="dpf-input-container with-icon">
                                                            <span class="dpf-input-icon" style="width:0px"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                                            <input type="text" class="dpf-input" style="text-align:left;width:95%;padding-left: 50px;" size="20" data-type="number" required id="cartao">
                                                        </div>
                                                    </div>
                                                    <div class="dpf-input-row">
                                                        <div class="dpf-input-column">
                                                            <input type="hidden" size="2" data-type="exp_month" placeholder="MM">
                                                            <input type="hidden" size="2" data-type="exp_year" placeholder="YY">
                                                            <label class="dpf-input-label">Validade</label>
                                                            <div class="dpf-input-container">
                                                                <input type="text" class="dpf-input" data-type="expiry" required id="validade">
                                                            </div>
                                                        </div>
                                                        <div class="dpf-input-column">
                                                            <label class="dpf-input-label">CVV</label>
                                                                <div class="dpf-input-container">
                                                                <input type="text" class="dpf-input" size="4" data-type="cvc" required id="cvv">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dpf-input-row">
                                                        <label class="dpf-input-label">Nome no Cartão</label>
                                                        <div class="dpf-input-container">
                                                            <input type="text" size="4" class="dpf-input" data-type="name" id="nomecartao">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="w3-container w3-teal">
                                                <button class="btn-large col l12 m12 s12 red accent-4 tooltipped dpf-submit" id="btnFinalizar"
                                                    data-position="center" data-delay="50" 
                                                    data-tooltip="Concluir a compra">Concluir
                                                    {{-- <span class="btn-active-state">Concluir</span> --}}
                                                    {{-- <span class="btn-loading-state"><i class="fa fa-refresh "></i></span>   --}}
                                                </button>                               
                                            </footer>    
                                        </form>                        
                                    </div>
                                </div>

                        </div>
                    <hr/>
                    @empty
                        <h5>Não há nenhum pedido no carrinho</h5>
                    @endforelse
                </div>
            {{-- </div> --}}

<form id="form-remover-produto" method="POST" action="{{ route('carrinho.remover') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="hidden" name="pedido_id">
    <input type="hidden" name="produto_id">
    <input type="hidden" name="item">
</form>
<form id="form-adicionar-produto" method="POST" action="{{ route('carrinho.adicionar') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id">
</form>

{{-- Coloca o arquivo javascript no layout.blade  --}}
@push('scripts') 
    <script type="text/javascript" src="/js/carrinho.js"></script>


    <script src="https://js.stripe.com/v2/"></script>
    <script src="../../../js/dist/DatPayment.js"></script>
    
    <script type="text/javascript">
        var payment_form = new DatPayment({
            form_selector: '#payment-form',
            card_container_selector: '.dpf-card-placeholder',
    
            number_selector: '.dpf-input[data-type="number"]',
            date_selector: '.dpf-input[data-type="expiry"]',
            cvc_selector: '.dpf-input[data-type="cvc"]',
            name_selector: '.dpf-input[data-type="name"]',
    
            submit_button_selector: '.dpf-submit',
    
            placeholders: {
                number: '•••• •••• •••• ••••',
                expiry: '••/••',
                cvc: '•••',
                name: 'NOME NO CARTÃO'
            },
    
            validators: {
                number: function(number){
                    return Stripe.card.validateCardNumber(number);
                },
                expiry: function(expiry){
                    var expiry = expiry.split(' / ');
                    return Stripe.card.validateExpiry(expiry[0]||0,expiry[1]||0);
                },
                cvc: function(cvc){
                    return Stripe.card.validateCVC(cvc);
                },
                name: function(value){
                    return value.length > 0;
                }
            }
        });
    </script>
    
    <script>
    
        let btnConcluir = document.querySelector('#btnConcluir')
        btnConcluir.addEventListener('click',pagamento)
    
        function pagamento(event){
            // event.preventDefault()
    
            // Get the modal
            var modal = document.getElementById('myModal');
    
            // Get the button that opens the modal
            //var btn = document.getElementById("myBtn");
    
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];                    
    
            // When the user clicks the button, open the modal 
            modal.style.display = "block";      
    
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }    

            let formulario = document.querySelector('#payment-form')
            let btnFinalizar = document.getElementById("btnFinalizar");

            btnFinalizar.onclick = function(){
                let cartao = document.querySelector('#cartao')
                let validade = document.querySelector('#validade')
                let cvv = document.querySelector('#cvv')
                let nome = document.querySelector('#nomecartao')
    
                if(cartao.value == ''){
                    cartao.focus()
                }else{
                    if(validade.value == ''){
                    validade.focus();
                    }
                    else{
                        if(cvv.value == ''){
                            cvv.focus()
                        }else{
                            if(nome.value == ''){
                                nome.focus()
                            }else{
                                modal.style.display = "none"       
                                formulario.submit()
                            }
                        }
                    }
                }
            }
    
            // When the user clicks anywhere outside of the modal, close it
            // window.onclick = function(event) {
            //     if (event.target == modal) {
            //         modal.style.display = "none";
            //     }
            // }
        }
    </script>
 
@endpush

@endsection