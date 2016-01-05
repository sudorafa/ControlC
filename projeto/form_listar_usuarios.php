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
<body onLoad="document.form_home.matricula.focus()"> 
<script language="javascript" src="script/ajax.js"></script> 
<script language="javascript" src="script/fmenu.js"></script>
<script language="javascript" src="script/fcampo.js"></script>

<?php $setor1	= 	$_POST["setor"]; ?>

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
	<table cellpadding="0" border="1" width="65%" align="center">
	
	<?php if ($setor1 == "TODOS" or $setor1 == "LOJA") {
		if ($uso_loja == 0) { ?><tr>
			<h3 align="center"> <font color="336699"> CPD </font></h3> 
			<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<h3 align="center"> <font color="336699"> LOJA </font></h3> 
			<td class="simples_2" width="100" height="26"> MATRICULA </td>
			<td class="simples_2" width="600" height="26"> NOME </td>
			<td class="simples_2" width="200" height="26"> USUARIO </td>
			<td class="simples_2" width="100" height="26"> BLOQUEIO </td>
			<td class="simples_2" width="100" height="26"> DATA CADASTRO </td>
	</tr>
		<?php }
			while ($dados_usuarios_loja = mysql_fetch_array($usuarios_loja)){
		?>
	<tr>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_usuarios_loja[matricula]?> </td>
			<td color="336699" align="center" width="200" height="26" > <?php echo $dados_usuarios_loja[nomusuario]?></a> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo Strtoupper($dados_usuarios_loja[user])?> </td>					
			<td color="336699" align="center" width="100" height="26" > <?php echo Strtoupper($dados_usuarios_loja[bloqueio])?> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_usuarios_loja[datacadastro]?> </td>
	</tr>
	<?php } };?>
	
	</table>
<br>
	<table cellpadding="0" border="1" width="65%" align="center">
	
	<?php if ($setor1 == "TODOS" or $setor1 == "CPD") {
		if ($uso_cpd == 0) { ?>
		<tr>
			<h3 align="center"> <font color="336699"> CPD </font></h3> 
			<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<h3 align="center"> <font color="336699"> CPD </font></h3> 
			<td class="simples_2" width="100" height="26"> MATRICULA </td>
			<td class="simples_2" width="600" height="26"> NOME </td>
			<td class="simples_2" width="200" height="26"> USUARIO </td>
			<td class="simples_2" width="100" height="26"> BLOQUEIO </td>
			<td class="simples_2" width="100" height="26"> DATA CADASTRO </td>
	</tr>
		<?php }
			while ($dados_usuarios_cpd = mysql_fetch_array($usuarios_cpd)){
		?>
	<tr>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_usuarios_cpd[matricula]?> </td>
			<td color="336699" align="center" width="200" height="26" > <?php echo $dados_usuarios_cpd[nomusuario]?></a> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo Strtoupper($dados_usuarios_cpd[user])?> </td>					
			<td color="336699" align="center" width="100" height="26" > <?php echo Strtoupper($dados_usuarios_cpd[bloqueio])?> </td>
			<td color="336699" align="center" width="100" height="26" > <?php echo $dados_usuarios_cpd[datacadastro]?> </td>
	</tr>
	<?php } };?>
	
	</table>
<br>

<table align = "center">
<tr>
	<form action="form_usuarios.php">
	<td align = "center">
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input align = "center" type="submit" name="voltar" value="voltar">
	</td>
	</form>
</tr>
</table>



</body>
</head>
</html>