{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Layout Master para a secção do Rodape
******************************************
Versão: 0.9 - Data: 2018-08-17 (Marcelo Carvalho)

--}}

@section('footer_copyright')
    
    <!-- Rodapé -->
    <footer class="footer">
    {{-- <footer class="page-footer blue">         --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="footer_title">Dúvidas? Ligue-nos 24/7</div>
                        <div class="footer_phone">+55 (11)98888-9999</div>
                        <div class="footer_contact_text">
                            <p>Rua sem nome,999 - Vila algum lugar</p>
                            <p>São Paulo, BR</p>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Localize o que precisa</div>
                        <ul class="footer_list">
                            <li><a href="{{route('produtoEspecifico','M')}}">Laptops</a></li>
                            <li><a href="{{route('produtoEspecifico','I')}}">Telefones</a></li>
                            <li><a href="{{route('produtoEspecifico','W')}}">Relogios</a></li>
                            <li><a href="{{route('produtos')}}">Destaques</a></li>
                            {{-- <li><a href="#">Contatos</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Atendimento ao Cliente</div>
                        <ul class="footer_list">
                            <li><a href="#" id="emconstrucao">Minha Conta</a></li>
                            <li><a href="#" id="emconstrucao">Rastrear Pedido</a></li>
                            <li><a href="#" id="emconstrucao">Favoritos</a></li>
                            <li><a href="#" id="emconstrucao">Serviços ao Cliente</a></li>
                            <li><a href="#" id="emconstrucao">Devoluções / Trocas</a></li>
                            <li><a href="{{route('faq')}}">FAQs</a></li>
                            <li><a href="#" id="emconstrucao">Suporte</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content">
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> 
                            Todos os direitos reservados | Criado por &ltCODE&gt&lt/COM&gt
                        </div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="../../images/logos_1.png" alt=""></a></li>
                                <li><a href="#"><img src="../../images/logos_2.png" alt=""></a></li>
                                <li><a href="#"><img src="../../images/logos_3.png" alt=""></a></li>
                                <li><a href="#"><img src="../../images/logos_4.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            

    <div id="myModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom w3-card-4">
            <header class="w3-container w3-teal">
                <span class="close">&times;</span>
                <h2>Desculpe AppleManiaco!!!</h2>
            </header>
            <div class="w3-container">
                <p>Desculpe o transtorno, mas estamos trabalhando para tornar essa página mais eficiente!</p>                        
            </div>
            <footer class="w3-container w3-teal">
                Volte em breve!
            </footer>    
        </div>
    </div>
    
    <script>
        $('a#emconstrucao').click(function(){
            // Get the modal
            var modal = document.getElementById('myModal');
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];                    
            // When the user clicks the button, open the modal 
            modal.style.display = "block";      
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }    
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }       
            return false; });
    </script>

    @show
    