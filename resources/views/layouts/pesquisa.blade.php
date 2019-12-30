{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Layout Pagina de Pesquisa
******************************************
Versão: 0.9 - Data: 2018-08-17 (Marcelo Carvalho)

--}}

@section('pesquisa')

    <!-- Pesquisa -->
    <div class="col-lg-7 col-md-5 col-12 order-lg-2 order-2 text-lg-left text-right">
            <div class="header_search">
                <div class="header_search_content">
                    <div class="header_search_form_container">
                        <form action="#" class="header_search_form clearfix">
                            <input type="search" required="required" class="header_search_input" placeholder="Procurar Produtos...">
                            <div class="custom_dropdown">
                                <div class="custom_dropdown_list">
                                    <span class="custom_dropdown_placeholder clc">Todas as Categorias</span>
                                    <i class="fas fa-chevron-down"></i>
                                    <ul class="custom_list clc">
                                        <li><a class="clc" href="#">Todas as Categorias</a></li>
                                        <li><a class="clc" href="#">Laptops</a></li>
                                        <li><a class="clc" href="#">Smartphones</a></li>
                                        <li><a class="clc" href="#">Relogios</a></li>
                                    </ul>
                                </div>
                            </div>
                            <button type="submit" class="header_search_button trans_300" value="Submit">
                                <a href="{{route('produtos')}}">
                                    <img src="../images/search.png" alt="Pesquisar">
                                </a>    
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection