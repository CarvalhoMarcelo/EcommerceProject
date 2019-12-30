{{-- 
    Equipe: <CODE></COM>

    Sprint: 5
    Desenvolvedor: Marcelo Carvalho
    Controle de Versao Sprint 5 - Layout Pagina Menu
    ******************************************
    Versão: 0.9 - Data: 2018-08-27 (Marcelo Carvalho)
--}}

@section('menu_bar')  

<nav class="navbar fixed-top navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark" style="background-color: #1b1b1b;">    
    <div class="logo_containers col-lg-2 col-md-2 col-sm-2" style="display:flex;align-items:center;">
        <a class="brand-logo" href="{{route('index')}}" >
            <img src="../../images/MEETAPPLES_logo_vs05-2.png" alt="Marca MeetApples" width="100%" height="100%" />
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbarXXX">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>

    <div class="col-lg-10 col-md-10 col-sm-10 collapse navbar-collapse" id="collapsibleNavbarXXX">        
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{route('index')}}">HOME</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('produtoEspecifico','M')}}">Mac</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('produtoEspecifico','I')}}">iPhone</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('produtoEspecifico','W')}}">Watch</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('produtos')}}">Todos</a></li>
            @if (Auth::guest())
                {{-- <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Entrar</a></li>
                <li class="nav-item"><a class="nav-link" href="html/cadastro.php">Registrar</a></li> --}}
            @else                
                <li class="nav-item">                
                    <a class="nav-link" href="{{ route('carrinho.index') }}">Carrinho
                        <span class="badge badge-pill badge-warning">{{$qtItens > 0 ? $qtItens : ''}}</span>                        
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('carrinho.compras') }}">Minhas Compras</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="/logout"><font color="red"> {{Auth::user()->nome . " (Sair)"}}</font></a></li> --}}                                     
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" >
                        <font color="red">{{Auth::user()->nome}}</font>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/logout"> Sair</a>
                    </div>                        
                </li>
                
            @endif
        </ul>
    </div>
</nav>
<br>
<div class="super_container">
        <header class="header">
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        {{-- @yield('pesquisa')                       --}}

                        <div class="col-lg-12 order-2 text-right">
                        <p></p><p></p><br><p></p>

                        @if(!isset(Auth::user()->email))
                            {{-- <div class="col-lg-12 order-2 text-right">
                                <p></p><p></p><br><p></p> --}}
                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="../../images/user.svg" alt=""></div>
                                    <div><a href="html/cadastro.php">Registrar</a></div>
                                    <div><a href="/login">Entrar</a></div>
                                </div>
                            {{-- </div> --}}
                        @else
                            {{-- <div class="col-lg-11 col-md-2 order-2 text-right">
                                <p></p><p></p><br><p></p><br>
                                <div class="top_bar_user">
                                    <div>Seja bem vindo <font color=blue>{{Auth::user()->nome ." ". Auth::user()->sobrenome}}</font></div>                                        
                                </div>    
                            </div>                                 --}}
                            {{-- <div class="col-lg-12 col-md-1 order-2 text-right">
                                <p></p><p></p><br><p></p>
                                <div class="top_bar_user">
                                    <div><a href="/logout">Sair</a></div>
                                </div>    
                            </div>         --}}
                        @endif
                        </div>

                        
                    </div>
                </div>
            </div>
            <!-- Menu Tablets e Smartphones -->
            <div class="page_menu">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="page_menu_content">
                                <div class="page_menu_search">
                                    <form action="#">
                                        <input type="search" required="required" class="page_menu_search_input" placeholder="Procurar produtos...">
                                    </form>
                                </div>
                                <ul class="page_menu_nav">
                                    <li class="page_menu_item"><a href="#">Home<i class="fa fa-angle-down"></i></a></li>
                                    <li class="page_menu_item has-children"><a href="#">Novidades<i class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Novidades<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item"><a href="#">blog<i class="fa fa-angle-down"></i></a></li>
                                    <li class="page_menu_item"><a href="#">contatos<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div><!-- super container --> 

@endsection
