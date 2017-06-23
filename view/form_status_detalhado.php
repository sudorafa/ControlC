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
	include('../../_script/data.php');
	
	include('../cabecalho.php');
	
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
	
	$lista_mov_coletores = mysql_query("select * from mov_coletores where movimento = 'USO' and filial = '$filial_usuario_logado' order by coletor");
	$linhas_mov_coletores = mysql_num_rows($lista_mov_coletores);
	$uso_mov = $linhas_mov_coletores;
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
					<h2 align="center"> <font color="336699"> Status dos Equipamentos Detalhado</font></h2> 
					<br/><br/>
					<table cellpadding="0" border="1" width="100%" height="26" align="center">
					<tr height="26">
						<?php 
						if ($uso_mov == 0) { ?>
							<td class="title" height="26"> NADA PARA EXIBIR </td>
						<?php }
						else { ?>
						<td class="title" height="26"> MATRICULA </td>
						<td class="title" height="26"> NOME </td>
						<td class="title" height="26"> SETOR </td>
						<td class="title" height="26"> COLT. </td>
						<td class="title" height="26"> DATA </td>
						<td class="title" height="26"> HORA </td>
						<?php } ?>
					</tr height="26">
						<?php
							while ($lista_mov_coletores2 = mysql_fetch_array($lista_mov_coletores)){
						?>
						<tr>
							<td class="corpo" height="26" > <?php echo $lista_mov_coletores2[matricula_user]?> </td>
							<td class="corpo" height="26" > <?php echo $lista_mov_coletores2[nome_user]?> </td>
							<td class="corpo" height="26" > <?php echo $lista_mov_coletores2[setor_user]?> </td>
							<td class="corpo" height="26" > <a href="/controlc/controller/query_baixa_por_identificador.php?coletor=<?php echo $lista_mov_coletores2[coletor] ?>&movimento=USO&tipo=lista"><?php echo Strtoupper($lista_mov_coletores2[coletor])?></a> </td>
							<td class="corpo" height="26" > <?php echo doBd($lista_mov_coletores2[data_saida])?> </td>
							<td class="corpo" height="26" > <?php echo $lista_mov_coletores2[hora_saida]?> </td>
						<?php };?>
						</tr>
					</tr>
					</table>
					<br/><br/>
					<?php include('../../rodape.php');?>
				</div>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>