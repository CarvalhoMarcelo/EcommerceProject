{{-- 
Equipe: <CODE></COM>
Sprint: 1
Desenvolvedor: Marcelo Carvalho		
Controle de Versao Sprint 1 - Pagina FAQ
****************************************
Versão: 0.1 - Data: 14/06/2018

Equipe: <CODE></COM>
Sprint: 5
Desenvolvedor: Marcelo Carvalho
Controle de Versao Sprint 5
******************************************
Versão: 0.9 - Data: 2018-09-11 (Marcelo Carvalho)
 --}}

 @extends('layout')
 @extends('layouts.menu')
 {{-- @extends('layouts.pesquisa') --}}
 @extends('layouts.rodape')
 @section('pagina_titulo', 'Produtos')
 
 @section('pagina_conteudo')

    <div class="container">
        <div class="page-header">
            <h1>FAQ | MeetApples <small> Perguntas e Respostas frequentes</small></h1>
        </div>
        <div class="container">
            <br/>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Fechar</span>
                </button> 
                 Esta seção contém perguntas e respostas relacionadas a loja e seu funcionamento. 
                 Se você não encontrar a resposta para suas dúvidas aqui, entre em contato conosco, e teremos prazer em lhe ajudar.
            </div>
            <br />
            <div><h4>COMO FUNCIONA O MEETAPPLES</h4></div>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">contact_support</i>O que é o MeetApples?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            O MeetApples é uma plataforma de compra, venda e troca dedicada ao mundo Apple. 
                            Ela tem como maior princípio a segurança de negócio entre usuários Apple de equipamentos em bom estado de uso ou semi-novos.                                                  
                        </span>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">contact_support</i>O que preciso para cadastrar um equipamento que quero vender ou trocar?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            Para garantir ainda mais segurança, todo equipamento precisa atender os seguintes requisitos especificados na 
                            página de cadastro de equipamentos:
                            <ul>
                                <li>- SerialNumber</li>
                                <li>- Dados técnicos de cada equipamento</li>
                                <li>- Nota Fiscal do equipamento via foto ou número de compra</li>
                            </ul>
                        </span>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">contact_support</i>Quais as formas de pagamento oferecidas pela MeetApples?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            O MeetApples oferece a plataforma PayPal como forma segura de pagamento entre usuários. 
                            Não nos responsabilizamos por quaisquer outras formas de negociação fora de nosso sistema, 
                            bem como também neste caso, não nos responsabilizamos pela garantia de entrega e troca que forem 
                            acertados entre usualios fora da plataformarma MeetApples.
                        </span>
                    </div>
                </li>
            </ul> 
            <br>

            <div><h4>REFERENTE AO USUÁRIO</h4></div>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">assignment_ind</i>Quem pode se cadastrar na MeetApples?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            Todo usuário Apple que tenha o seu Apple ID pode acessar a plataforma do MeetApples. 
                            Portanto, para se cadastrar na MeetApples, basta fazer o seu cadastro com os seus dados Apple, 
                            pois o nosso sistema de cadastro funciona diretamente conectado ao Apple ID.
                        </span>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">assignment_ind</i>O meu cadastro na MeetApples é vitalício?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            O cadastro na MeetApples será válido enquanto o seu Apple ID for válido, 
                            já que todo o nosso cadastro está vinculado ao sistema oficial da Apple.
                        </span>
                    </div>                                
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">assignment_ind</i>Posso transferir a titularidade do meu perfil na MeetApples?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            A titularidade do seu perfil na MeetApples é intransferível. Infelizmente, não podemos transferir titularidades. Cada usuário possui um perfil único e exclusivo para realizar suas operações dentro de nossa plataforma.
                        </span>
                    </div>                                                            
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">assignment_ind</i>Meu perfil da foi MeetApples desconfigurado. Foram vocês?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            A MeetApples não modifica dados dos usuários. Seus dados estarão seguros conosco exatamente como formam fornecidos. Entretanto, a MeetApples não se responsabiliza por acessos ao seu perfil que aconteçam por login aberto e disponível em computadores publico
                            ou pessoais. Portanto, fique atento e cuide da sua conta. Verifique sempre se, após uma troca, troca ou visita no site, o seu login foi encerrado devidamente. Cuide da sua segurança.
                        </span>
                    </div>                                                            
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">assignment_ind</i>Vocês vão fornecer meus dados para outras empresas?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            A MeetApples não cederá - em nenhuma hipótese - os seus dados para quaisquer empresas, pessoas físicas, instituições comerciais ou sem fins lucrativos. Nossa plataforma preza pelo sigilo de dados, já que estes estão ligados ao banco de dados da Apple.
                            Verifique a política de segurança de dados da Apple para informações complementares "aqui".
                        </span>
                    </div>                                                         
                </li>
            </ul>
            <br>

            <div><h4>REFERENTE AOS PRODUTOS</h4></div>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">devices_other</i>Como é avaliado o preço do equipamento que quero vender ou comprar?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            O preço do equipamento cadastrado varia de acordo com as características do modelo que o usuário venderá:
                            <ul>
                                <li>- Ano de fabricação</li>
                                <li>- Modelo do equipamento</li>
                                <li>- Estado de conservação</li>
                            </ul>
                            Ao término dessa avaliação, e de acordo com o preço de mercado, o vendedor e o comprador estão livres para negociar o preço sugerido pela MeetApples, bem como as condições de pagamento.
                        </span>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">devices_other</i>Quando verei meu equipamento disponível na MeetApples?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            O equipamento que você cadastrar só estará disponível depois de passar por todas as etapas de aprovação e certificação, como por exemplo verificação de nota fiscal de compra. Veja o nosso procedimento de verificação de equipamento em "O que preciso para
                            cadastrar um equipamento que quero vender ou trocar?".
                                </span>
                    </div>                                
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">devices_other</i>É seguro comprar qualquer equipamento pela MeetApples?</div>
                    <div class="collapsible-body" style="background-color:#E5E7E9;">
                        <span>
                            Sim, é seguro. Nosso sistema funciona através de cadastro criptografado do SerialNumber de cada eletrônico Apple. Pelo número de série podemos rastrear a situação do equipamento, saber se ele foi roubado ou não, se é um equipamento original ou não, entre
                            vários outros detalhes. Pra você ter certeza de que não haverá falhas, nós somente cadastramos equipamentos em situação regular. E como sabemos disso? A MeetApples também é uma plataforma que integra dados diretamente do sistema
                            Apple e o banco de dados de furtos e roubos da Polícia Federal do Brasil. em terceiro lugar, todos os equipamentos só serão cadastrados diante apresentação de nota fiscal de compra, representando um terceiro filtro de segurança.
                            Essa integração tripla garante a boa procedência do equipamento que mais lhe agradar.       
                        </span>
                    </div>                                                            
                </li>
            </ul>
        </div>
    </div>

@endsection