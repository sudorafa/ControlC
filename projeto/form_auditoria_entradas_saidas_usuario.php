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
	
	$usuario1		= $_POST["usuario"]; 
	$data_inicio1	= $_POST["data_inicio"]; 
	$data_fim1		= $_POST["data_fim"]; 
	
	////////////////////////////////////////////////////
	$usuarios = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and nome_user = '$usuario1' and filial = '$filial_usuario_logado'");
	$linhas_usuarios = mysql_num_rows($usuarios);
	$uso = $linhas_usuarios;
	
?>

<table align = "center">
<tr>
	<form action="form_auditorias_movimentacao_usuarios.php">
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
		<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR PARA O USUARIO <?php echo $usuario1 ?> </td>
		<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
	</tr>
	</table>
	<?php } else { ?>
	
<h2 align="center"> <font color="336699"> <?php echo $usuario1 ?></font></h2> 
<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
<br> <br>
	
	<table cellpadding="0" border="1" width="90%" align="center">
	
	<?php 
		if ($uso == 0) { ?>
		<tr>
			<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<td class="simples_2" width="50" height="26"> COL </td>
			<td class="simples_2" width="100" height="26"> DATA SAIDA </td>
			<td class="simples_2" width="50" height="26"> HORA SAIDA </td>
			<td class="simples_2" width="100" height="26"> DATA DEVOL </td>
			<td class="simples_2" width="50" height="26"> HORA DEVOL </td>
			<td class="simples_2" width="300" height="26"> OBS SAIDA </td>
			<td class="simples_2" width="300" height="26"> OBS DEVOLUCAO </td>
	</tr>
		<?php }
			while ($dados_usuarios = mysql_fetch_array($usuarios)){
		?>
	<tr>
			<td color="336699" align="center" width="50" height="26" > <?php echo $dados_usuarios[coletor]?> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_usuarios[data_saida]?></a> </td>
			<td color="336699" align="center" width="50" height="26" > <?php echo $dados_usuarios[hora_saida]?> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_usuarios[data_devolucao]?></a> </td>
			<td color="336699" align="center" width="50" height="26" > <?php echo $dados_usuarios[hora_devolucao]?> </td>
			<td color="336699" align="center" width="300" height="26" > <?php echo $dados_usuarios[obs_saida]?></a> </td>
			<td color="336699" align="center" width="300" height="26" > <?php echo $dados_usuarios[obs_devolucao]?></a> </td>
	</tr>
	
	<?php } };?>
	
	</table>
	
	

	<br>  <br> 


</body>
</head>
</html>