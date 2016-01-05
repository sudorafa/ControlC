<?php
session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('libera.php');
	
	include('conecta.php');
	
	if ( $_SESSION[libera] == "ok" ){
		include("index.php");
	
	}
?>
						
<html>
<head>
<link href="estilo.css" rel="stylesheet" type="text/css">
</head>
</head>
<body onLoad="document.form_home.matricula.focus()"> 
<script language="javascript" src="script/ajax.js"></script> 
<script language="javascript" src="script/fmenu.js"></script>
<script language="javascript" src="script/fcampo.js"></script>

<?php

	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
	
	$conserto = mysql_query("select * from coletores where status = 'CONSERTO' and filial = '$filial_usuario_logado'");
	$dados_conserto = mysql_num_rows($conserto);
	$uso_conserto = $dados_conserto;
	
	$lista_conserto = mysql_query("select * from consertoc where situacao = 'conserto' and filial = '$filial_usuario_logado' order by identificador");
	
	$lista_coletores = mysql_query("select * from coletores where status = 'CONSERTO' and filial = '$filial_usuario_logado' order by identificador");

?>

<h2 align="center"> <font color="336699"> Coletores no Conserto</font></h2> 
<br>
<table cellpadding="0" border="1" width="70%" height="26" align="center">
	<tr>
	<?php 
	if ($uso_conserto == 0) { ?>
		<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
	<?php }
	else { ?>
		<td class="simples_2" width="50"> DESCRICAO </td>
		<td class="simples_2" width="50"> IDENT. </td>
		<td class="simples_2" width="50"> NUM SERIE </td>
		<td class="simples_2" width="50"> RMA </td>
		<td class="simples_2" width="50"> NFE </td>
		<td class="simples_2" width="200"> DEFEITO </td>
		<td class="simples_2" width="50"> ALMOX. </td>
	<?php } ?>
	</tr>
	<?php
		while ($lista_coletores2 = mysql_fetch_array($lista_coletores)){
		while ($lista_conserto2 = mysql_fetch_array($lista_conserto)){
	?>
	<tr>
		<td color="336699" align="center" height="26"><?php echo $lista_coletores2[descricao]?></td>
		<td color="336699" align="center" height="26"><?php echo $lista_coletores2[identificador]?></td>
		<td color="336699" align="center" height="26"><?php echo $lista_coletores2[nserie]?></td>
		<td color="336699" align="center" height="26"><?php echo $lista_conserto2[rma]?></td>
		<td color="336699" align="center" height="26"><?php echo $lista_conserto2[nfe]?></td>
		<td color="336699" align="center" height="26"><?php echo $lista_conserto2[defeito]?></td>
		<td color="336699" align="center" height="26"><?php echo $lista_conserto2[almox]?></td>
	</tr>
	<?php };?>
	<?php };?>
</table>

<br>

<table align = "center">
<tr>
	<form action="form_auditorias.php">
	<td align = "center">
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input align = "v" type="submit" name="voltar" value="voltar">
	</td>
	</form>
</tr>
</table>

</body>
</html>