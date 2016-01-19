<html>
    <head>
        <title></title>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <meta name = "description" content = "Inserir uma descrição para esta página"/>
        <meta name = "keywords" content = "Palavras,chaves,separadas,por,vírgulas"/>
        <meta charset = "UTF-8"/>
        <link type="text/css" rel="stylesheet" href="_css/style.css"/>
    </head>
    <body>
        <div id="interface">
            <?php
                ///////////////////////////////////////////////////////
                //////////////  validando acesso de usuário
                //////////////////////////////////////////////////////
                session_start();
                include('conecta.php');
                include('libera.php');
                include("ip.php");
                $idusuario = $_SESSION["idusuario"];
                $dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
                ////////////////////////////////////////////////////////
            ?>
            <header id="cabecalho">
                <a id="logoHeaderAtacadao" href="http://www.atacadao.com.br" target="_blank">
                    <image title="Logo do Controle de Coletores" alt="Logo Atacadão." src="_imagens/logo.png"/>
                </a>
                <section id="textoCabecalho">
                    <h1>
                        CONTROLE DE COLETORES
                    </h1>
                    <h2>
                        Informática - Filial Atacadão: <span><?php echo Strtoupper($dados_usuario_logado[filial]) ?></span>
                    </h2>
                    <h2>Bem Vindo(a): <span><?php echo Strtoupper($dados_usuario_logado[nomusuario]) ?></span> | <a href="logout.php"> SAIR </a></h2>
                    <h3>
                        <script language="JavaScript">
                            days = new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira",
                                                "Sexta-feira","Sábado");
                            months = new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho",
                                                "Agosto","Setembro","Outubro","Novembro","Dezembro");
                            today = new Date();
                            day = days[today.getDay()];
                            month = months[today.getMonth()];
                            date = today.getDate();
                            year = today.getYear() + 1900;
                            document.write (day + ", " + date + " de " + month + " de " + year + ".");
                        </script>
                    </h3>
                </section> <!-- /textoCabecalho -->
                <div id="clear"></div> <!-- /clear -->
            </header>
            <section id="menu">
                <ul>
                    <li><a href="form_home.php" title="Controle de Coletores | Home">HOME</a></li>
                    <li><a href="form_usuarios.php" title="Controle de Coletores | Usuários">USUÁRIOS</a></li>
                    <li><a href="form_coletores.php" title="Controle de Coletores | Coletores">COLETORES</a></li>
                    <li><a href="form_auditorias.php" title="Controle de Coletores | Auditorias">AUDITORIAS</a></li>
                    <li><a href="form_controles.php" title="Controle de Coletores | Controles">CONTROLES</a></li>
                    <li><a href="form_status_detalhado.php" title="Controle de Coletores | Status Detalhado">STATUS DETALHADO </a></li>
                </ul>
            </section> <!-- /menu -->
            <div id="conteudo">
                <br/><br/><br/>
                Ponha todo o conteúdo das respectivas páginas aqui!
                <!-- pode apagar tudo o que estiver dentro da DIV "conteudo". Pois escrevi os brs apenas apra ter uma noção 
                mesmo
                -->
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>                
            </div> <!-- /conteudo -->
            <footer id="rodape">
                <a href="http://www.carrefour.com/content/group" target="_blank">
                    <image id="logoFooterCarrefour" title="Logo Carrefour do Controle de Coletores" alt="Logo Carrefour."
                           src="_imagens/carrefour_footer.png"/>
                </a>
                <a href="http://www.atacadao.com.br" target="_blank">
                    <image id="logoFooterAtacadao" title="Logo Atacadão do Controle de Coletores" alt="Logo Atacadão."
                           src="_imagens/atacadao_footer.png"/>
                </a>
                <span>&copy; COPYRIGHT ATACADÃO
                    <script language="JavaScript">document.write (year + ".");</script>
                    TODOS OS DIREITOS RESERVADOS.
                </span>
            </footer>
        </div> <!--/interface -->
    </body>
</html>
