<?php
session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('libera.php');
	
	include('conecta.php');
	
	if ( $_SESSION[libera] == "ok" ){
		include("index.php");
	
	}
	
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
	
	$lista_mov_coletores = mysql_query("select * from mov_coletores where movimento = 'USO' and filial = '$filial_usuario_logado' order by coletor and setor_user");
	$linhas_mov_coletores = mysql_num_rows($lista_mov_coletores);
	$uso_mov = $linhas_mov_coletores;
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


<h2 align="center"> <font color="336699"> Status dos Equipamentos Detalhado</font></h2> 
<br>

<table cellpadding="0" border="1" width="70%" height="26" align="center">
<tr height="26">
	<?php 
	if ($uso_mov == 0) { ?>
		<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
	<?php }
	else { ?>
	<td class="simples_2" width="100" height="26"> MATRICULA </td>
	<td class="simples_2" width="600" height="26"> NOME </td>
	<td class="simples_2" width="100" height="26"> SETOR </td>
	<td class="simples_2" width="200" height="26"> COLT. </td>
	<td class="simples_2" width="100" height="26"> DATA </td>
	<td class="simples_2" width="100" height="26"> HORA </td>
	<?php } ?>
</tr height="26">
	<?php
		while ($lista_mov_coletores2 = mysql_fetch_array($lista_mov_coletores)){
	?>
	<tr>
		<td color="336699" align="center" width="100" height="26" > <?php echo $lista_mov_coletores2[matricula_user]?> </td>
		<td color="336699" align="center" width="600" height="26" > <?php echo $lista_mov_coletores2[nome_user]?> </td>
		<td color="336699" align="center" width="100" height="26" > <?php echo $lista_mov_coletores2[setor_user]?> </td>
		<td color="336699" align="center" width="200" height="26" > <a href="query_baixa_por_identificador.php?coletor=<?php echo $lista_mov_coletores2[coletor] ?>&movimento=USO&tipo=lista"><?php echo Strtoupper($lista_mov_coletores2[coletor])?></a> </td>
		<td color="336699" align="center" width="100" height="26" > <?php echo $lista_mov_coletores2[data_saida]?> </td>
		<td color="336699" align="center" width="100" height="26" > <?php echo $lista_mov_coletores2[hora_saida]?> </td>
	<?php };?>
	</tr>
</tr>
</table>


</body>
</html>