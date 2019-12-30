@extends('layouts.rodape')

<!DOCTYPE html>
<html lang="pt">
<head>
    <!-- 
		Equipe: <CODE></COM>

        Sprint: 1
        Desenvolvedor: Marcelo Carvalho
        Controle de Versao Sprint 1 - pagina index
        ******************************************
        Versão: 0.1 - Data: 06/06/2018 (Marcelo Carvalho)
        Versão: 0.2 - Data: 12/06/2018 (Marcelo Carvalho)
        Versão: 0.3 - Data: 14/06/2018 (Marcelo Carvalho)

		Sprint: 2
        Desenvolvedor: Lika Nóbrega		     
        Controle de Versao Sprint 2 - pagina index
        ******************************************
        Versão: 0.4 - Data: 2018-06-29 (Lika Nóbrega)
        Versão: 0.5 - Data: 2018-07-07 (Marcelo Carvalho)

		Sprint: 3
        Desenvolvedor: Marcelo Carvalho
        Controle de Versao Sprint 3 - pagina index
        ******************************************
        Versão: 0.6 - Data: 2018-07-18 (Marcelo Carvalho)

	    Sprint: 4
        Desenvolvedor: Marcelo Carvalho
        Controle de Versao Sprint 4 - pagina index
        ******************************************
        Versão: 0.7 - Data: 2018-07-29 (Marcelo Carvalho)        

	    Sprint: 5
        Desenvolvedor: Marcelo Carvalho
        Controle de Versao Sprint 5 - pagina index
        ******************************************
        Versão: 0.8 - Data: 2018-08-08 (Marcelo Carvalho)        
        Versão: 0.9 - Data: 2018-08-15 (Marcelo Carvalho)        
        Versão: 1.0 - Data: 2018-09-17 (Marcelo Carvalho)        

    -->

    <title>MeetApples - index.html</title>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CODE_COM Projeto de e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="styles/bootstrap4/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

    <!--Import Google Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">   

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>
    <header>
        <!-- Barra de Menu -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark" style="background-color: #1b1b1b;">
            <div class="logo_containers col-lg-2 col-md-2 col-sm-2" style="display:flex;align-items:center;">
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                </button>                
                <a  href="{{route('index')}}">
                    <img src="../images/MEETAPPLES_logo_vs05-2.png" alt="Marca MeetApples" width="100%" height="100%" />
                </a>
            </div>

            <div class="col-lg-10 col-md-10 col-sm-10 collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">                         
                    <li class="nav-item"><a class="nav-link" href="#"><i class="material-icons">home</i> HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('produtoEspecifico','M')}}"><i class="material-icons">laptop_mac</i> Mac</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('produtoEspecifico','I')}}"><i class="material-icons">phone_iphone</i>iPhone</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('produtoEspecifico','W')}}"><i class="material-icons">watch</i>Watch</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('produtos')}}"><i class="material-icons">devices_other</i>Todos</a></li>
                    @if(!Auth::guest())
                    <li class="nav-item">                
                        <a class="nav-link" href="{{ route('carrinho.index') }}">
                            <i class="material-icons">shopping_cart</i>                                 
                            Carrinho
                            <span class="badge badge-pill badge-warning">{{$qtItens > 0 ? $qtItens : ''}}</span>                        
                        </a>
                    </li>        
                    <li class="nav-item"><a class="nav-link" href="{{ route('carrinho.compras') }}">
                            <i class="material-icons">shopping_basket</i>
                        Minhas Compras</a></li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="super_container">
            <header class="header">
                <div class="header_main">
                    <div class="container">
                        <div class="row">
                            <!-- Pesquisa -->                            
                            <div class="col-lg-8">    

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
                                                    <a href="#">
                                                        <img src="images/search.png" alt="Pesquisar">
                                                    </a>    
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4 order-2 text-right">
                                    <p></p><p></p><br><p></p>
                            @if(!isset(Auth::user()->email))
                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="images/user.svg" alt=""></div>
                                    <div><a href="/cadastro">Registrar</a></div>
                                    <div><a href="/login">Entrar</a></div>
                                </div>
                            @else
                                <div class="top_bar_user">
                                    <div>Seja bem vindo <font color=blue>{{Auth::user()->nome ." ". Auth::user()->sobrenome}}</font></div>                                        
                                    <div></div>
                                    <div><a href="/logout">Sair</a></div>
                                </div>    
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Botoes na navegacao principal -->
                <nav class="main_nav">
                    <div class="container">
                        <div class="row">
                            <h2 class="col-12" 
                                style="
                                    text-align: center;                                    
                                    color:white;
                                    font-weight: 400;
                                    src: url('https://applesocial.s3.amazonaws.com/assets/styles/fonts/sanfrancisco/sanfranciscodisplay-regular-webfont.woff');
                                    background-color:#ada397">
                                Encontre um novo dono para o seu Apple
                            </h2>
                            <div class="button_menu_comprar col-5" style="background-color:dodgerblue"><a href="{{route('produtos')}}">Clique aqui para COMPRAR</a></div>
                            <div class="button_menu_vender col-5 offset-2" style="background-color:steelblue"><a href="{{route('produtos.index')}}">Clique aqui para VENDER</a></div>
                        </div>
                    </div>
                </nav>
            </header>
        </div><!-- super container --> 
    </header>    

    <!-- Banner principal, para navegação slide lateralmente -->
    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>

            <!-- Banner Slider -->
            <div class="owl-carousel owl-theme banner_2_slider">

                <!-- Banner slider do item 1 -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Categoria</div>
                                        <div class="banner_2_title">Laptops</div>
                                        <div class="banner_2_text">            
                                            MacBook Pro Touch Bar e Touch ID 13,3", Intel Core i5 quad core 2,3 GHz, 512GB SSD, 8GB, Cinza Espacial - MR9R2LL/A                                        
                                        </div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="{{route('produtoEspecifico','M')}}">Detalhes</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="images/banner_2_product.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner slider do item 2 -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Categoria</div>
                                        <div class="banner_2_title">Telefones</div>
                                        <div class="banner_2_text">Apple Iphone X 256gb Original + Nota Fiscal</div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="{{route('produtoEspecifico','I')}}">Detalhes</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="images/banner_product.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner slider do item 3 -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Categoria</div>
                                        <div class="banner_2_title">Relogios</div>
                                        <div class="banner_2_text">            
                                            Apple Watch Series 3 42mm Gps Prova D´água                                        
                                        </div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="{{route('produtoEspecifico','W')}}">Detalhes</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="images/banner_3_product.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Destaques Pagos -->
    <div class="trends">
        <div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <!-- Descricao das destaques pagos -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Destaques 2018</h2>
                        <div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- slider do destaque pago -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- slider -->
                        <div class="owl-carousel owl-theme trends_slider">

                            <!-- slider do Item -->
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/apple-macbook.png" alt=""></div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">Laptop</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{route('produtoEspecifico','M')}}">MacBook</a></div>
                                            <div class="trends_price">$900</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new">novo</li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>

                            <!-- slider do Item -->
                            <div class="owl-item">
                                    <div class="trends_item is_new">
                                        <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/apple-watch.png" alt=""></div>
                                        <div class="trends_content">
                                            <div class="trends_category"><a href="#">Watch</a></div>
                                            <div class="trends_info clearfix">
                                                <div class="trends_name"><a href="{{route('produtoEspecifico','W')}}">Apple Watch</a></div>
                                                <div class="trends_price">$679</div>
                                            </div>
                                        </div>
                                        <ul class="trends_marks">
                                            <li class="trends_mark trends_discount">-25%</li>
                                            <li class="trends_mark trends_new">2019</li>
                                        </ul>
                                        <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                    </div>
                                </div>

                            <!-- slider do Item -->
                            <div class="owl-item">
                                <div class="trends_item">
                                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/single_4.jpg" alt=""></div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">Laptop</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{route('produtoEspecifico','M')}}">MacBook</a></div>
                                            <div class="trends_price">$850</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new">novo</li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>

                            <!-- slider do Item -->
                            <div class="owl-item">
                                    <div class="trends_item">
                                        <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/banner_3_product.png" alt=""></div>
                                        <div class="trends_content">
                                            <div class="trends_category"><a href="#">Watch</a></div>
                                            <div class="trends_info clearfix">
                                                <div class="trends_name"><a href="{{route('produtoEspecifico','W')}}">Apple Watch</a></div>
                                                <div class="trends_price">$779</div>
                                            </div>
                                        </div>
                                        <ul class="trends_marks">
                                            <li class="trends_mark trends_discount">-25%</li>
                                            <li class="trends_mark trends_new">Ultimo</li>
                                        </ul>
                                        <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                    </div>
                                </div>


                            <!-- slider do Item -->
                            <div class="owl-item">
                                    <div class="trends_item is_new">
                                        <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/single_2.jpg" alt=""></div>
                                        <div class="trends_content">
                                            <div class="trends_category"><a href="#">Laptop</a></div>
                                            <div class="trends_info clearfix">
                                                <div class="trends_name"><a href="{{route('produtoEspecifico','M')}}">MacBook</a></div>
                                                <div class="trends_price">$700</div>
                                            </div>
                                        </div>
                                        <ul class="trends_marks">
                                            <li class="trends_mark trends_discount">-25%</li>
                                            <li class="trends_mark trends_new"></li>
                                        </ul>
                                        <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                    </div>
                                </div>

                            <!-- slider do Item -->
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/apple-watch_2x.png" alt=""></div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">Watch</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{route('produtoEspecifico','W')}}">Apple Watch</a></div>
                                            <div class="trends_price">$879</div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        <li class="trends_mark trends_discount">-25%</li>
                                        <li class="trends_mark trends_new"></li>
                                    </ul>
                                    <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comentários dos compradores -->
    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="reviews_title_container">
                        <h3 class="reviews_title">Últimos comentários</h3>
                        <div class="reviews_all ml-auto"><a href="#">Ver todos <span>comentários</span></a></div>
                    </div>
                    <div class="reviews_slider_container">
                        <!-- slider dos comentários -->
                        <div class="owl-carousel owl-theme reviews_slider">
                            <!-- slider do comentario -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/apple-watch_2x.png" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Fulano de Tal</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 dias atrás</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- slider do comentario -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/single_2.jpg" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Ciclano de Tal</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 dias atrás</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- slider do comentario -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/iphonelemon.jpg" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">Beltrano de Tal</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">3 dias atrás</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- slider do comentario -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/CAPA-iPhone-X.png" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">João Ninguém</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">3 meses atrás</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- slider do comentario -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div class="review_image"><img src="images/capa-capinha-iphone-8-plus.jpg" alt=""></div>
                                    </div>
                                    <div class="review_content">
                                        <div class="review_name">João Alguém</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">4 meses atrás</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews_dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>           
    {{-- <hr/> --}}


    {{-- @section('footer_copyright')
        @parent
    @endsection --}}


    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="js/custom.js"></script>
    <script src="styles/bootstrap4/js/bootstrap-4.1.3.min.js"></script>    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>   
    <script>
        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        return '<a href="' + data.profile.username + '" class="list-group-item">' + data.name + ' - @' + data.profile.username + '</a>'
              }
                }
            });
        });
    </script>         


    


</body>
</html>