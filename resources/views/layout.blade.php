{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5 - Layout Master
******************************************
Versão: 0.9 - Data: 2018-08-17 (Marcelo Carvalho)

--}}


<!DOCTYPE html>
<html>
<head>
    <title>MeetApples - @yield('pagina_titulo')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CODE_COM Projeto de e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--Import Google Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->    
    <link rel="stylesheet" href="../../../materialize/css/materialize-0.97.8.min.css" media="screen,projection">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" type="text/css" href="../../../styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../../../styles/main_styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../../../styles/DatPayment.css">


</head>
<body>
    <header>        
        @yield('menu_bar')
    </header>
    <main>
        @yield('pagina_conteudo')
        @if(!Auth::guest())
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hide">
                {{ csrf_field() }}
            </form>
        @endif
    </main>    

    @yield('footer_copyright')

    <script type="text/javascript" src="../../../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../../../materialize/js/materialize-0.97.8.min.js"></script>  

    @stack('scripts')
    <script type="text/javascript">

        $( document ).ready(function(){
            $(".button-collapse").sideNav();
            $('.tooltipped').tooltip();
            $('select').material_select();                                    
            $(".dropdown-trigger").dropdown();
            $('.collapsible').collapsible();
        });

    </script>
</body>
</html>