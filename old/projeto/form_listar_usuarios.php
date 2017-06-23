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

<?php $setor1	= 	$_POST["setor"]; ?>

<table align = "center">
<tr>
	<form action="form_usuarios.php">
	<td align = "center">
		<input align = "center" type="submit" name="voltar" value="voltar">
	</td>
	</form>
</tr>
</table>

<h2 align="center"> <font color="336699"> Usuarios Setor : <?php echo $setor1 ?> </font></h2> 

	
	<?php
		$idusuario = $_SESSION["idusuario"];
		$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
		$filial_usuario_logado = $dados_usuario_logado[filial];
	
		$usuarios_loja = mysql_query("select * from usuariosc where descsetor = 'LOJA' and filial = '$filial_usuario_logado' order by nomusuario");
		$linhas_usuarios_loja = mysql_num_rows($usuarios_loja);
		$uso_loja = $linhas_usuarios_loja;
		
		$usuarios_prevencao = mysql_query("select * from usuariosc where descsetor = 'PREVENCAO' and filial = '$filial_usuario_logado' order by nomusuario");
		$linhas_usuarios_prevencao = mysql_num_rows($usuarios_prevencao);
		$uso_prevencao = $linhas_usuarios_prevencao;
		
		$usuarios_fcx = mysql_query("select * from usuariosc where descsetor = 'F. CAIXA' and filial = '$filial_usuario_logado' order by nomusuario");
		$linhas_usuarios_fcx = mysql_num_rows($usuarios_fcx);
		$uso_fcx = $linhas_usuarios_fcx;
		
		$usuarios_deposito = mysql_query("select * from usuariosc where descsetor = 'DEPOSITO' and filial = '$filial_usuario_logado' order by nomusuario");
		$linhas_usuarios_deposito = mysql_num_rows($usuarios_deposito);
		$uso_deposito = $linhas_usuarios_deposito;
		
		$usuarios_gerencia = mysql_query("select * from usuariosc where descsetor = 'GERENCIA' and filial = '$filial_usuario_logado' order by nomusuario");
		$linhas_usuarios_gerencia = mysql_num_rows($usuarios_gerencia);
		$uso_gerencia = $linhas_usuarios_gerencia;
		
		$usuarios_frios = mysql_query("select * from usuariosc where descsetor = 'FRIOS' and filial = '$filial_usuario_logado' order by nomusuario");
		$linhas_usuarios_frios = mysql_num_rows($usuarios_frios);
		$uso_frios = $linhas_usuarios_frios;
		
		$usuarios_cpd = mysql_query("select * from usuariosc where descsetor = 'CPD' and filial = '$filial_usuario_logado' order by nomusuario");
		$linhas_usuarios_cpd = mysql_num_rows($usuarios_cpd);
		$uso_cpd = $linhas_usuarios_cpd;
		
	?>
	
	<?php if ($setor1 == "TODOS" or $setor1 == "LOJA") { ?>
	<table cellpadding="0" border="1" width="65%" align="center">
	
	<?php 
		if ($uso_loja == 0) { ?>
		<?php if ($setor1 == "TODOS") { ?>
			<br>
			<h3 align="center"> <font color="336699"> LOJA </font></h3> 
	<tr>
		<?php } else {} ?>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> LOJA </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> MATRICULA </td>
			<td class="simples_2" height="26"> NOME </td>
			<td class="simples_2" height="26"> USUARIO </td>
			<td class="simples_2" height="26"> BLOQUEIO </td>
			<td class="simples_2" height="26"> DATA CADASTRO </td>
	</tr>
		<?php }
			while ($dados_usuarios_loja = mysql_fetch_array($usuarios_loja)){
		?>
	<tr>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_loja[matricula]?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_loja[nomusuario]?></a> </td>
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_loja[user])?> </td>					
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_loja[bloqueio])?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_loja[datacadastro]?> </td>
	</tr>
	<?php };?>
	</table>
	<?php };?>

	<?php if ($setor1 == "TODOS" or $setor1 == "PREVENCAO") { ?>
	<table cellpadding="0" border="1" width="65%" align="center">
	
	<?php 
		if ($uso_prevencao == 0) { ?>
		<tr>
		<?php if ($setor1 == "TODOS") { ?>
			<br>
			<h3 align="center"> <font color="336699"> PREVENCAO </font></h3> 
		<?php } else {} ?>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> PREVENCAO </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> MATRICULA </td>
			<td class="simples_2" height="26"> NOME </td>
			<td class="simples_2" height="26"> USUARIO </td>
			<td class="simples_2" height="26"> BLOQUEIO </td>
			<td class="simples_2" height="26"> DATA CADASTRO </td>
	</tr>
		<?php }
			while ($dados_usuarios_prevencao = mysql_fetch_array($usuarios_prevencao)){
		?>
	<tr>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_prevencao[matricula]?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_prevencao[nomusuario]?></a> </td>
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_prevencao[user])?> </td>					
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_prevencao[bloqueio])?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_prevencao[datacadastro]?> </td>
	</tr>
	<?php };?>
	</table>
	<?php };?>

	<?php if ($setor1 == "TODOS" or $setor1 == "F. CAIXA") { ?>
	<table cellpadding="0" border="1" width="65%" align="center">
	
	<?php
		if ($uso_fcx == 0) { ?>
		<tr>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> F. CAIXA </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> F. CAIXA </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> MATRICULA </td>
			<td class="simples_2" height="26"> NOME </td>
			<td class="simples_2" height="26"> USUARIO </td>
			<td class="simples_2" height="26"> BLOQUEIO </td>
			<td class="simples_2" height="26"> DATA CADASTRO </td>
	</tr>
	
		<?php }
			while ($dados_usuarios_fcx = mysql_fetch_array($usuarios_fcx)){
		?>
	<tr>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_fcx[matricula]?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_fcx[nomusuario]?></a> </td>
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_fcx[user])?> </td>					
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_fcx[bloqueio])?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_fcx[datacadastro]?> </td>
	</tr>
	<?php };?>
	</table>
	<?php };?>

	<?php if ($setor1 == "TODOS" or $setor1 == "DEPOSITO") { ?>
	<table cellpadding="0" border="1" width="65%" align="center">
	
	<?php
		if ($uso_deposito == 0) { ?>
		<tr>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> DEPOSITO </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> DEPOSITO </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> MATRICULA </td>
			<td class="simples_2" height="26"> NOME </td>
			<td class="simples_2" height="26"> USUARIO </td>
			<td class="simples_2" height="26"> BLOQUEIO </td>
			<td class="simples_2" height="26"> DATA CADASTRO </td>
			
	</tr>
		<?php }
			while ($dados_usuarios_deposito = mysql_fetch_array($usuarios_deposito)){
		?>
	<tr>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_deposito[matricula]?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_deposito[nomusuario]?></a> </td>
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_deposito[user])?> </td>					
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_deposito[bloqueio])?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_deposito[datacadastro]?> </td>
	</tr>
	<?php };?>
	</table>
	<?php };?>

	<?php if ($setor1 == "TODOS" or $setor1 == "GERENCIA") { ?>
	<table cellpadding="0" border="1" width="65%" align="center">
	
	<?php
		if ($uso_gerencia == 0) { ?>
		<tr>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> GERENCIA </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> GERENCIA </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> MATRICULA </td>
			<td class="simples_2" height="26"> NOME </td>
			<td class="simples_2" height="26"> USUARIO </td>
			<td class="simples_2" height="26"> BLOQUEIO </td>
			<td class="simples_2" height="26"> DATA CADASTRO </td>
	</tr>
		<?php }
			while ($dados_usuarios_gerencia = mysql_fetch_array($usuarios_gerencia)){
		?>
	<tr>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_gerencia[matricula]?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_gerencia[nomusuario]?></a> </td>
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_gerencia[user])?> </td>					
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_gerencia[bloqueio])?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_gerencia[datacadastro]?> </td>
	</tr>
	<?php };?>
	</table>
	<?php };?>

	<?php if ($setor1 == "TODOS" or $setor1 == "FRIOS") { ?>
	<table cellpadding="0" border="1" width="65%" align="center">
	
	<?php
		if ($uso_frios == 0) { ?>
		<tr>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> FRIOS </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> FRIOS </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> MATRICULA </td>
			<td class="simples_2" height="26"> NOME </td>
			<td class="simples_2" height="26"> USUARIO </td>
			<td class="simples_2" height="26"> BLOQUEIO </td>
			<td class="simples_2" height="26"> DATA CADASTRO </td>
	</tr>
		<?php }
			while ($dados_usuarios_frios = mysql_fetch_array($usuarios_frios)){
		?>
	<tr>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_frios[matricula]?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_frios[nomusuario]?></a> </td>
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_frios[user])?> </td>					
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_frios[bloqueio])?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_frios[datacadastro]?> </td>
	</tr>
	<?php };?>
	</table>
	<?php };?>

	<?php if ($setor1 == "TODOS" or $setor1 == "CPD") { ?>
	<table cellpadding="0" border="1" width="65%" align="center">
	
	<?php
		if ($uso_cpd == 0) { ?>
		<tr>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> CPD </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<?php if ($setor1 == "TODOS") { ?>
				<br>
				<h3 align="center"> <font color="336699"> CPD </font></h3> 
			<?php } else {} ?>
			<td class="simples_2" height="26"> MATRICULA </td>
			<td class="simples_2" height="26"> NOME </td>
			<td class="simples_2" height="26"> USUARIO </td>
			<td class="simples_2" height="26"> BLOQUEIO </td>
			<td class="simples_2" height="26"> DATA CADASTRO </td>
	</tr>
		<?php }
			while ($dados_usuarios_cpd = mysql_fetch_array($usuarios_cpd)){
		?>
	<tr>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_cpd[matricula]?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_cpd[nomusuario]?></a> </td>
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_cpd[user])?> </td>					
			<td color="336699" align="center" height="26" > <?php echo Strtoupper($dados_usuarios_cpd[bloqueio])?> </td>
			<td color="336699" align="center" height="26" > <?php echo $dados_usuarios_cpd[datacadastro]?> </td>
	</tr>
	<?php };?>
	</table>
	<?php };?>
	
	<br> <br> 


</body>
</head>
</html>