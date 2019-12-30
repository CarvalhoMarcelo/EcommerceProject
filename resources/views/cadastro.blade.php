<!DOCTYPE html>
<html lang="pt">

<head>

    <!--
		Equipe: <CODE/><COM/>
		Sprint: 1
        Desenvolvedor: Denis Luz / Lika	
        
        Controle de Versao Sprint 1
        ***************************
        Versão: 0.1 - Data: 2018-06-06 (Denis) CSS - HTML
        Versão: 0.2 - Data: 2018-06-12 (Denis) CSS - HTML
        Versão: 0.3 - Data: 2018-06-28 (Lika) HTML - PHP
        Versão: 0.4 - Data: 2018-07-23 (Lika) PDO - PHP
        
		Sprint: 5
        Desenvolvedor: Marcelo Carvalho        
        Controle de Versao Sprint 5
        ***************************
        Versão: 0.5 - Data: 13/09/2018 (Marcelo Carvalho)
        Versão: 1.0 - Data: 17/09/2018 (Marcelo Carvalho)

    -->

    <title>MeetApples - Cadastro</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="CODE_COM Projeto de e-commerce MeetApples">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">

</head>
    <body>


        @if(isset(Auth::user()->email))
            <script>window.location="loginsucesso"</script>
        @endif    

        @if (Session::has('mensagem-sucesso'))
            <div class="card text-center text-white bg-success mb-3">
                <div class="card-header">
                    <strong>{{ Session::get('mensagem-sucesso') }}</strong>
                </div>
            </div>
        @endif
        @if (Session::has('mensagem-falha'))
            <div class="card text-center text-white bg-danger mb-3">
                <div class="card-header">
                    <strong>{{ Session::get('mensagem-falha') }}</strong>
                </div>
            </div>
        @endif

        <!-- Cabeçalho -->
        <header class="header">
            {{-- @yield('menu_bar') --}}
            <div class="header_main">
                <div class="container">
                    <div class="row">
                    <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <a href="/"><img src="images/MEETAPPLES_logo_vs03.png" width="100%" height="100%" alt="logotipo" class="logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
           
        <!-- Página Cadastro -->
        <form class="cadastrodiv order-2" 
              style="margin-left:auto;margin-right:auto;" 
              action="{{route('cadastro')}}" method="post" 
              name="form1"
              onsubmit="soNumeros();">

            {{csrf_field()}}

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control is-valid" id="nome" name="nome"
                    value= "" required placeholder="Informe seu nome">                            
                </div>
                <div class="form-group col-sm-6">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control is-valid" id="sobrenome" name="sobrenome"
                    value="" required placeholder="Informe seu sobrenome">                            
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control is-valid" id="cpf" name="cpf" maxlength="14"
                    value= "" required placeholder="Informe seu CPF" 
                    {{-- onkeydown="javascript: fMasc( this, mCPF );" --}}
                    onBlur="ValidarCPF(form1.cpf);" 
                    onKeyPress="MascaraCPF(form1.cpf);" maxlength="14">
                    
                    <input type="hidden" id="cpfNum" name="cpfNum">
                </div>
                <div class="form-group col-sm-6">
                    <label for="nascimento">Dt.Nascimento</label>
                    <input type="date" class="form-control is-valid" id="nascimento" name="nascimento"
                    value="" required placeholder="Informe sua Data de Nascimento">                            
                </div>
            </div>

            {{-- <div class="row">
                <div class="form-group col-sm-4 col-lg-4">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control is-valid" id="cep" name="cep"
                           value= "" required placeholder="Informe seu CEP">                            
                </div>
            </div> --}}

            <div class="row">
                <div class="form-group col-sm-4 col-lg-4">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control is-valid" id="cep" name="cep"
                            value= "" required placeholder="Informe seu CEP">                            
                </div>
        
                <div class="form-group col-sm-8 col-lg-8">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control is-valid" id="endereco" name="endereco"
                           value= "" required placeholder="Informe seu endereço">                            
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control is-valid" id="validationServer03" name="email_user" 
                    value="" required placeholder="Insira um e-mail">                       
                </div>
                <div class="form-group col-sm-6">
                    <label for="email-confirm">Confirmar e-mail</label>
                    <input type="email" class="form-control is-valid" id="email-confirm validationServer04" name="email_confirm" 
                    value="" required placeholder="Confirme seu e-mail">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control is-valid" id="senha validationServer05" name="senha" 
                    value="" required placeholder="Insira uma senha">                        
                </div>
                <div class="form-group col-sm-6">
                    <label for="senha-confirm">Confirmar senha</label>
                    <input type="password" class="form-control is-valid" id="senha-confirm validationServer06" name="senha_confirm"
                    value="" required placeholder="Confirme sua senha">
                </div>
            </div>
            <div class="form-group">
                <div class="termosecondicoes form-check">
                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                    <label class="simple_text" for="invalidCheck3">
                        Concordo com os Termos e Condições.
                    </label>
                    <div class="invalid-feedback">
                        Concorde com os Termos e Condições para concluir cadastro.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Cadastrar</button>
            <span></span>
            <div class='d-inline'><a href="/" class="btn btn-primary" style="float:right;">Voltar</a></div>
        </form>

        {{-- @yield('footer_copyright') --}}

        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="plugins/slick-1.8.0/slick.js"></script>

        <script src="../js/cpf.js"></script>
        <script src="../js/cep.js"></script>


        {{-- <script type="text/javascript">
            function fMasc(objeto,mascara) {
                obj=objeto
                masc=mascara
                setTimeout("fMascEx()",1)
            }
            function fMascEx() {
                obj.value=masc(obj.value)
            }
            function mTel(tel) {
                tel=tel.replace(/\D/g,"")
                tel=tel.replace(/^(\d)/,"($1")
                tel=tel.replace(/(.{3})(\d)/,"$1)$2")
                if(tel.length == 9) {
                    tel=tel.replace(/(.{1})$/,"-$1")
                } else if (tel.length == 10) {
                    tel=tel.replace(/(.{2})$/,"-$1")
                } else if (tel.length == 11) {
                    tel=tel.replace(/(.{3})$/,"-$1")
                } else if (tel.length == 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                } else if (tel.length > 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                }
                return tel;
            }
            function mCNPJ(cnpj){
                cnpj=cnpj.replace(/\D/g,"")
                cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
                cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
                cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
                cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
                return cnpj
            }
            function mCPF(cpf){
                cpf=cpf.replace(/\D/g,"")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
                return cpf
            }
            function mCEP(cep){
                cep=cep.replace(/\D/g,"")
                cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
                cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
                return cep
            }
            function mNum(num){
                num=num.replace(/\D/g,"")
                return num
            }
        </script> --}}
    </body>
</html>