{{-- 

    Equipe: <CODE></COM>

Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5
******************************************
Versão: 0.8 - Data: 2018-08-08 (Marcelo Carvalho)         
Versão: 0.9 - Data: 2018-08-17 (Marcelo Carvalho)

--}}


@extends('layouts.rodape')

<!DOCTYPE html>
<html lang="pt">
<head>

    <!-- 
        Equipe: <CODE></COM>
        
		Sprint: 2
        Desenvolvedor: Lika Nóbrega		        
        Controle de Versao Sprint 2 - página "cadastro_sucesso"
        ******************************************
        Versão: 0.1 - Data: 2018-07-02 (Lika Nóbrega)

		Sprint: 3
        Desenvolvedor: Marcelo Carvalho
        Controle de Versao Sprint 3
        ******************************************
        Versão: 0.1 - Data: 2018-07-18 (Marcelo Carvalho)
        Versão: 0.2 - Data: 2018-07-23 (Lika Nóbrega)
        Versão: 0.3 - Data: 2018-07-26 (Marcelo Carvalho)

		Sprint: 4
        Desenvolvedor: Marcelo Carvalho
        Controle de Versao Sprint 4
        ******************************************
        Versão: 0.4 - Data: 2018-07-29 (Marcelo Carvalho)

		Sprint: 5
        Desenvolvedor: Marcelo Carvalho        
        Controle de Versao Sprint 5
        ***************************
        Versão: 0.5 - Data: 17/08/2018 (Marcelo Carvalho)



    -->

    <title>Login realizado com sucesso - MeetApples</title>
    <meta charset="utf-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta http-equiv="refresh" content="1;url=/" />
    <meta name="description" content="CODE_COM Projeto de e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

</head>

<body>
    <div class="card text-center">
        <div class="card-header">
            <img src="images/MEETAPPLES_logo_vs04.png" alt="Marca CodeCom" width="30%" height="" />
        </div>
        <div class="card-body">
            @if(isset(Auth::user()->email))
                <h4 class="card-title">Bem vindo <font color=blue> {{Auth::user()->nome ." ". Auth::user()->sobrenome}} </font>. Login realizado com sucesso!</h4>
                <p class="card-text"></p>            
                <h5><font color=red>Voce sera redirecionado para a pagina principal em 2 segundos!</font><h5>    
            @else
                <h4 class="card-title"><font color=red>Ops!! Algo deu errado!! </font></h4>
                <h5><font color=red>Voce sera redirecionado para a pagina principal em 5 segundos!</font><h5>    
                {{-- <script>window.location="/login";</script> --}}

            @endif
        </div>
        <div class="card-footer text-muted"></div>
    </div>

    @yield('footer_copyrigth')


</body>
</html>
