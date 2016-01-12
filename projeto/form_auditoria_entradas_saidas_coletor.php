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
	$coletor = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and coletor = '$coletor1' and filial = '$filial_usuario_logado' order by data_saida");
	$linhas_coletor = mysql_num_rows($coletor);
	$uso = $linhas_coletor;
	
	$todos_coletores = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and filial = '$filial_usuario_logado' order by coletor");
	$linhas_todos_coletor = mysql_num_rows($todos_coletores);
	$uso_todos = $linhas_todos_coletor;
	


if ($coletor1 == "TODOS") { ?>
	
	<table align = "center">
<tr>
	<form action="form_auditorias_movimentacao_coletores.php">
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
		<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
	</tr>
	</table>
	<?php } else { ?>
	
<h2 align="center"> <font color="336699"> Coletor : <?php echo $coletor1 ?> </font></h2> 
<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
<br> <br>
	
	<table cellpadding="0" border="1" width="90%" align="center">
	
	<?php 
		if ($uso_todos == 0) { ?>
		<tr>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<td class="simples_2" width="100" height="26"> COL. </td>
			<td class="simples_2" width="100" height="26"> MAT </td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="100" height="26"> DATA SAIDA </td>
			<td class="simples_2" width="50" height="26"> HORA SAIDA </td>
			<td class="simples_2" width="300" height="26"> OBS SAIDA </td>
			<td class="simples_2" width="100" height="26"> DATA DEVOL </td>
			<td class="simples_2" width="50" height="26"> HORA DEVOL </td>
			<td class="simples_2" width="300" height="26"> OBS DEVOLUCAO </td>
	</tr>
		<?php }
			while ($dados_todos_coletores = mysql_fetch_array($todos_coletores)){
		?>
	<tr>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_todos_coletores[coletor]?> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_todos_coletores[matricula_user]?> </td>
			<td color="336699" align="center" width="300" height="26" > <?php echo $dados_todos_coletores[nome_user]?></a> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_todos_coletores[data_saida]?></a> </td>
			<td color="336699" align="center" width="50" height="26" > <?php echo $dados_todos_coletores[hora_saida]?> </td>
			<td color="336699" align="center" width="300" height="26" > <?php echo $dados_todos_coletores[obs_saida]?></a> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_todos_coletores[data_devolucao]?></a> </td>
			<td color="336699" align="center" width="50" height="26" > <?php echo $dados_todos_coletores[hora_devolucao]?> </td>
			<td color="336699" align="center" width="300" height="26" > <?php echo $dados_todos_coletores[obs_devolucao]?></a> </td>
	</tr>
	
	<?php } };?>
	
	</table>
	
	

	<br>  <br>
	

	<?php
} else {

?>



<table align = "center">
<tr>
	<form action="form_auditorias_movimentacao_coletores.php">
	<td align = "center">
		<input align = "center" type="submit" name="voltar" value="voltar">
	</td>
	</form>
</tr>
</table>

	<?php 
	if ($uso == 0) { ?>
	<table cellpadding="0" border="1" width="50%" align="center">
	<tr>
		<td class="simples_2" height="26"> NADA PARA EXIBIR PARA O COLETOR <?php echo $coletor1 ?> </td>
		<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
	</tr>
	</table>
	<?php } else { ?>
	
<h2 align="center"> <font color="336699"> Coletor : <?php echo $coletor1 ?> </font></h2> 
<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
<br> <br>
	
	<table cellpadding="0" border="1" width="90%" align="center">
	
	<?php 
		if ($uso == 0) { ?>
		<tr>
			<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<td class="simples_2" width="100" height="26"> MAT </td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="100" height="26"> DATA SAIDA </td>
			<td class="simples_2" width="50" height="26"> HORA SAIDA </td>
			<td class="simples_2" width="300" height="26"> OBS SAIDA </td>
			<td class="simples_2" width="100" height="26"> DATA DEVOL </td>
			<td class="simples_2" width="50" height="26"> HORA DEVOL </td>
			<td class="simples_2" width="300" height="26"> OBS DEVOLUCAO </td>
	</tr>
		<?php }
			while ($dados_coletor = mysql_fetch_array($coletor)){
		?>
	<tr>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_coletor[matricula_user]?> </td>
			<td color="336699" align="center" width="300" height="26" > <?php echo $dados_coletor[nome_user]?></a> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_coletor[data_saida]?></a> </td>
			<td color="336699" align="center" width="50" height="26" > <?php echo $dados_coletor[hora_saida]?> </td>
			<td color="336699" align="center" width="300" height="26" > <?php echo $dados_coletor[obs_saida]?></a> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_coletor[data_devolucao]?></a> </td>
			<td color="336699" align="center" width="50" height="26" > <?php echo $dados_coletor[hora_devolucao]?> </td>
			<td color="336699" align="center" width="300" height="26" > <?php echo $dados_coletor[obs_devolucao]?></a> </td>
	</tr>
	
	<?php } };?>
	
	</table>
	
	

	<br>  <br> 

<?php } ;?>	

</body>
</head>
</html>