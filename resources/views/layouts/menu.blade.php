{{-- 
    Equipe: <CODE></COM>

    Sprint: 5
    Desenvolvedor: Marcelo Carvalho
    Controle de Versao Sprint 5 - Layout Pagina Menu
    ******************************************
    Versão: 0.9 - Data: 2018-08-27 (Marcelo Carvalho)
--}}

@section('menu_bar')  

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    @if (!Auth::guest())
        <li><a href="/logout">Sair</a></li>
    @endif
</ul>
<ul id="dropdown2" class="dropdown-content">
        @if (!Auth::guest())
            <li><a href="/logout">Sair</a></li>
        @endif
</ul>

<div class="navbar-fixed">
    <nav style="background-color: #1b1b1b;">
        <div class="nav-wrapper">
            <a class="brand-logo" href="{{route('index')}}" >
                    <img src="../../../images/MEETAPPLES_logo_vs05-2.png" alt="Marca MeetApples" width="100%" height="100%" />
            </a>      
            <a href="#" data-activates="menu-mobile" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>

            <ul class="right hide-on-med-and-down">
                <li><a href="{{route('index')}}">HOME</a></li>
                <li><a href="{{route('produtoEspecifico','M')}}">Mac</a></li>
                <li><a href="{{route('produtoEspecifico','I')}}">iPhone</a></li>
                <li><a href="{{route('produtoEspecifico','W')}}">Watch</a></li>
                <li><a href="{{route('produtos')}}">Todos</a></li>    
                @if (!Auth::guest())
                    <li>                
                        <a href="{{ route('carrinho.index') }}">Carrinho
                            <span class="badge badge-pill badge-warning">{{$qtItens > 0 ? $qtItens : ''}}</span>                        
                        </a>
                    </li>
                    <li><a href="{{ route('carrinho.compras') }}">Minhas Compras</a></li>

                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" data-beloworigin="true" data-hover="true"  href="#!" data-activates="dropdown1"><font color="red">{{Auth::user()->nome}}</font><i class="material-icons right">arrow_drop_down</i></a></li>                         

                @endif
            </ul>          
        </div>
    </nav>
</div>

<ul class="side-nav right" id="menu-mobile">

    @if (!Auth::guest())
    <li>
        <div class="user-view">
            <a href="#user"><img class="circle" src="../../../images/marcelo.png"></a>        
            <li style="color:white;">.</li>
            <li style="color:white;">.</li>
            <li style="color:white;">.</li>
            <li><div class="divider"></div></li>
            <li>{{Auth::user()->nome . " " . Auth::user()->sobrenome}} </li>
        </div>
    </li>
    @endif

    <li><div class="divider"></div></li>

    <li><a href="{{route('index')}}"><i class="material-icons">home</i>HOME</a></li>
    <li><a href="{{route('produtoEspecifico','M')}}"><i class="material-icons">laptop_mac</i>Mac</a></li>
    <li><a href="{{route('produtoEspecifico','I')}}"><i class="material-icons">phone_iphone</i>iPhone</a></li>
    <li><a href="{{route('produtoEspecifico','W')}}"><i class="material-icons">watch</i>Watch</a></li>
    <li><a href="{{route('produtos')}}"><i class="material-icons">devices_other</i>Todos</a></li>        

    @if (!Auth::guest())
        <li>                
            <a href="{{ route('carrinho.index') }}">
                <i class="material-icons">shopping_cart</i>                
                Carrinho
                <span class="badge badge-pill badge-warning">{{$qtItens > 0 ? $qtItens : ''}}</span>                        
            </a>
        </li>
        <li>
            <a href="{{ route('carrinho.compras') }}">
                <i class="material-icons">shopping_basket</i>                
                Minhas Compras
            </a>
        </li>

        <!-- Dropdown Trigger -->
        <li><a class="dropdown-trigger" data-beloworigin="true" data-hover="true" href="#!" data-activates="dropdown2">
            <i class="material-icons">person</i>
            <font color="red">{{Auth::user()->nome}}</font><i class="material-icons right">arrow_drop_down</i></a></li>                         
    @endif        
</ul>

<br>

<div class="super_container">
        <header class="header">
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 order-2 text-right">                        
                        @if(!isset(Auth::user()->email))
                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="../../../images/user.svg" alt=""></div>                                    
                                    <div><a href="/cadastro">Registrar</a></div>
                                    <div><a href="/login">Entrar</a></div>
                                </div>
                        @else
                            {{-- <div class="col-lg-11 col-md-2 order-2 text-right">
                                <p></p><p></p><br><p></p><br>
                                <div class="top_bar_user">
                                    <div>Seja bem vindo <font color=blue>{{Auth::user()->nome ." ". Auth::user()->sobrenome}}</font></div>                                        
                                </div>    
                            </div>                                 --}}
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div><!-- super container --> 

@endsection
