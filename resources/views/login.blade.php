<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- 
        Equipe: <CODE/><COM/>
        
		Sprint: 1
        Desenvolvedor: Denis Luz	        
        Controle de Versao Sprint 1
        ***************************
        Versão: 0.1 - Data: 06/06/2018 (Denis Luz)
        Versão: 0.2 - Data: 12/06/2018 (Denis Luz)

		Sprint: 3
        Desenvolvedor: Marcelo Carvalho        
        Controle de Versao Sprint 3
        ***************************
        Versão: 0.3 - Data: 18/07/2018 (Marcelo Carvalho)

		Sprint: 4
        Desenvolvedor: Marcelo Carvalho        
        Controle de Versao Sprint 3
        ***************************
        Versão: 0.4 - Data: 26/07/2018 (Marcelo Carvalho)

		Sprint: 5
        Desenvolvedor: Marcelo Carvalho        
        Controle de Versao Sprint 5
        ***************************
        Versão: 0.5 - Data: 17/08/2018 (Marcelo Carvalho)



    -->

    <title>MeetAplles - Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CODE_COM Projeto de e-commerce">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">

</head>

<body>
    <!-- Cabeçalho -->
    <header class="header">
        
        @yield('menu_bar')

    <div class = "header_main">
        <div class = "container">
            <div class = "row">
                <!-- Logo -->
                <div class = "col-lg-2 col-sm-3 col-3 order-1">
                    <div class = "logo_container">
                        <div class = "logo">
                            <a href    = "#">
                            <img src   = "images/MEETAPPLES_logo_vs03.png" width = "200px" alt = "logotipo" class = "logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>

    @if(isset(Auth::user()->email))
        <script>window.location="loginsucesso"</script>
        {{-- <script>window.location="logout"</script> --}}
    @endif

    @if($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <ul style="text-align:center;">
                <strong>{{$message}}</strong>
            </ul>
        </div>
    @endif

    @if(count($errors) > 0)
        <div id="footer" class="alert alert-danger alert-block">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <!-- Página Login -->

    <div class="container">
        <div class="row">
            <form method="post" id="formlogin" name="formlogin" class="logindiv" action="{{url('login')}}">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço de e-mail</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required placeholder="Informe seu e-mail aqui">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control" id="password" data-toggle="password" name="senha" required placeholder="Digite sua senha">
                        <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                         </div>
                    </div>
                </div>
                <div class="form-group esqueciminhasenha">
                    <a href=" ">Esqueci minha senha</a>
                </div>
                <div class="form-group form-check lembrardados">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class=" checkboxpadzero form-check-label" for="exampleCheck1">Lembrar-se do dados</label>
                </div>
                <button type="submit" class="btn btn-primary">Acessar</button>                                        
                <span></span>
                <div class='d-inline'><a href="/" class="btn btn-primary" style="float:right;">Voltar</a></div>
                
            </form>            
        </div>
    </div>

    @yield('footer_copyright')

    <script src="js/jquery-3.3.1.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
    </script>   

</body>
</html>