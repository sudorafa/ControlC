<?php
/*
	Form do Sistema de Controle de Coletores (Recuperado da migração do Intranet)
	Rafael Eduardo L - @sudorafa
	Recife, 24 de Setembro de 2016
*/
	session_start();
	$idusuario = $_SESSION["idusuario"];
	include('../../global/conecta.php');
	include('../../global/libera.php');
	
	include('../cabecalho.php');
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
    <body>
		<div id="interface">
			<?php include('../menu.php'); ?>
            <div id="Conteudo">
				<div align="center">
					<br/>
					<h2 align="center"> <font color="336699"> Relatorios para Auditorias </font></h2> 
					<br/>
					<hr width="60%">
					<br/>
					<table cellpadding="0" border="1" width="80%" align="center">
					<tr height="30" align="center">
						<td> <a href="form_auditorias_movimentacao_usuarios.php"><u> MOVIMENTAÇÃO USUARIOS </u> </a> </td>
					</tr>
					<tr height="30" align="center">
						<td> <a href="form_auditorias_movimentacao_coletores.php"><u> MOVIMENTAÇÃO COLETORES </u> </a> </td>
					</tr>
					<tr height="30" align="center"> 
						<td> <a href="form_auditorias_coletores_conserto.php"><u>COLETORES NO CONSERTO</u></a> </td>
					</tr>
					<table/>
					<br/>
					<hr width="60%">
                </div>
				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				<?php include('../../rodape.php');?>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>