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
            <div class="section col s12 m12 l12">
                    {!! $registro->descricao !!}
            </div>            
            <br><p></p><br>

            <div id="myModal" class="w3-modal">
                <div class="w3-modal-content w3-animate-zoom w3-card-4">
                    <header class="w3-container w3-teal">
                        <span class="close">&times;</span>
                        <h2>Pagamento</h2>
                    </header>
                    <form method="POST" action="{{ route('carrinho.adicionar') }}" id="payment-form" class="datpayment-form">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $registro->id }}">            
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
                            <button class="btn-large col l12 m12 s12 red accent-4 tooltipped dpf-submit" id="btnConcluir"
                                data-position="center" data-delay="50" 
                                data-tooltip="Concluir a compra">Concluir
                                {{-- <span class="btn-active-state">Concluir</span> --}}
                                {{-- <span class="btn-loading-state"><i class="fa fa-refresh "></i></span>   --}}
                            </button>                               
                        </footer>    
                    </form>                        
                </div>
            </div>

            {{-- <form action=""> --}}
                {{-- {{ csrf_field() }} --}}
                {{-- <input type="hidden" name="id" value="{{ $registro->id }}"> --}}
                <button class="btn-large col l6 m6 s6 green accent-4 tooltipped" id="adiciona"
                        data-position="bottom" data-delay="50" 
                        data-tooltip="O produto será adicionado ao seu carrinho">
                        Comprar
                </button>   
            {{-- </form> --}}
        </div>
    </div>
</div>

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

    let btnAdicionar = document.querySelector('#adiciona')
    btnAdicionar.addEventListener('click',pagamento)

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

        let btnConcluir = document.getElementById("btnConcluir");
        let formulario = document.querySelector('#payment-form')
    
        btnConcluir.onclick = function(){
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







@endsection