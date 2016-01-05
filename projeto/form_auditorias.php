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


<h2 align="center"> <font color="336699"> Relatorios para Auditorias </font></h2> 

<table cellpadding="0" border="1" width="40%" align="center">

<tr height="30">
	<td class="simples_2" > <a href="form_auditorias_movimentacao_usuarios.php"><u> MOVIMENTACAO USUARIOS </u> </a> </td>
</tr>

<tr height="30">
	<td class="simples_2" > <a href="form_auditorias_movimentacao_coletores.php"><u> MOVIMENTACAO COLETORES </u> </a> </td>
</tr>

<tr height="30"> 
	<td class="simples_2" > <a href="form_auditorias_coletores_conserto.php"><u>COLETORES NO CONSERTO</u></a> </td>
</tr>

<table/>


</body>
</html>