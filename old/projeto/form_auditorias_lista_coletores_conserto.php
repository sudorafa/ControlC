<?php
session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('libera.php');
	
	include('conecta.php');
	
/*	if ( $_SESSION[libera] == "ok" ){
		include("index.php");
	
	}*/
?>
						
<html>
<head>
<link href="estilo.css" rel="stylesheet" type="text/css">
<body onLoad="document.form_home.matricula.focus()"> 
<script language="javascript" src="script/ajax.js"></script> 
<script language="javascript" src="script/fmenu.js"></script>
<script language="javascript" src="script/fcampo.js"></script>

<?php 
	
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
	
	$coletor1		= $_POST["coletor"]; 
	$data_inicio1	= $_POST["data_inicio"]; 
	$data_fim1		= $_POST["data_fim"]; 
	
	////////////////////////////////////////////////////
	$coletor = mysql_query("select * from consertoc where situacao <> 'filial' and identificador = '$coletor1' and filial = '$filial_usuario_logado' order by atualizacao");
	$linhas_coletor = mysql_num_rows($coletor);
	$uso = $linhas_coletor;
	
	$todos_coletores = mysql_query("select * from consertoc where situacao <> 'filial' and filial = '$filial_usuario_logado' order by identificador");
	$linhas_todos_coletor = mysql_num_rows($todos_coletores);
	$uso_todos = $linhas_todos_coletor;
	


if ($coletor1 == "TODOS") { ?>
	
	<table align = "center">
<tr>
	<form action="form_auditorias_coletores_conserto.php">
	<td align = "center">
		<input align = "center" type="submit" name="voltar" value="voltar">
	</td>
	</form>
</tr>
</table>

	<?php 
	if ($uso_todos == 0) { ?>
	<table cellpadding="0" border="1" width="50%" align="center">
	<tr>
		<td class="simples_2" height="26"> NADA PARA EXIBIR PARA O COLETOR <?php echo $coletor1 ?> </td>
	</tr>
	</table>
	<?php } else { ?>
	
<h2 align="center"> <font color="336699"> Coletor : <?php echo $coletor1 ?> </font></h2> 

<br> <br>
	
	<table cellpadding="0" border="1" width="70%" align="center">
	
	<?php 
		if ($uso_todos == 0) { ?>
		<tr>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
	else { ?>
		<td class="simples_2" height="26"> COL. </td>
		<td class="simples_2" height="26"> ATUALIZACAO </td>
		<td class="simples_2" height="26"> RMA </td>
		<td class="simples_2" height="26"> NFE SAIDA </td>
		<td class="simples_2" height="26"> DEFEITO </td>
		<td class="simples_2" height="26"> ALMOX </td>
		<td class="simples_2" height="26"> SITUACAO </td>
	</tr>
		<?php }
			while ($dados_todos_coletores = mysql_fetch_array($todos_coletores)){
		?>
	<tr>
		<td color="336699" align="center" height="26" > <?php echo $dados_todos_coletores[identificador]?> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_todos_coletores[atualizacao]?> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_todos_coletores[rma]?></a> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_todos_coletores[nfe]?></a> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_todos_coletores[defeito]?> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_todos_coletores[almox]?></a> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_todos_coletores[situacao]?></a> </td>
	</tr>
	
	<?php } };?>
	
	</table>
	
	

	<br>  <br>
	

	<?php
} else {

?>



<table align = "center">
<tr>
	<form action="form_auditorias_coletores_conserto.php">
	<td align = "center">
		<input align = "center" type="submit" name="voltar" value="voltar">
	</td>
	</form>
</tr>

</table>
<br>
	<?php 
	if ($uso == 0) { ?>
	<table cellpadding="0" border="1" width="50%" align="center">
	<tr>
		<td class="simples_2"  height="26"> NADA PARA EXIBIR PARA O COLETOR <?php echo $coletor1 ?> </td>
	</tr>
	</table>
	<?php } else { ?>
	
<h2 align="center"> <font color="336699"> Coletor : <?php echo $coletor1 ?> </font></h2> 

<br> <br>
	
	<table cellpadding="0" border="1" width="70%" align="center">
	
	<?php 
		if ($uso == 0) { ?>
		<tr>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<td class="simples_2" height="26"> ATUALIZACAO </td>
			<td class="simples_2" height="26"> RMA </td>
			<td class="simples_2" eight="26"> NFE SAIDA </td>
			<td class="simples_2" height="26"> DEFEITO </td>
			<td class="simples_2" height="26"> ALMOX </td>
			<td class="simples_2" height="26"> SITUACAO </td>
	</tr>
		<?php }
			while ($dados_coletor = mysql_fetch_array($coletor)){
		?>
	<tr>
		<td color="336699" align="center" height="26" > <?php echo $dados_coletor[atualizacao]?> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_coletor[rma]?></a> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_coletor[nfe]?></a> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_coletor[defeito]?> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_coletor[almox]?></a> </td>
		<td color="336699" align="center" height="26" > <?php echo $dados_coletor[situacao]?></a> </td>
	</tr>
	
	<?php } };?>
	
	</table>
	
	

	<br>  <br> 

<?php } ;?>	

</body>
</head>
</html>