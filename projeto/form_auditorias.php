<?php
session_start();
	$codusuario = $_SESSION["codusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('altoriza.php');
	
	include('../conecta.php');
	
	if ( $_SESSION[altoriza] == "ok" ){
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


<h2 align="center"> <font color="336699"> Geracao de Relatorios para Auditoroas </font></h2> 
<br>

<table cellpadding="0" border="1" width="80%" align="center">
<tr height="30">
	<td class="simples_2" > ENTRADAS E SAIDAS DE COLETORES POR <u>USUARIOS</u> ou <u>SETORES</u> </td>
</tr>
<tr height="30">
	<td class="simples_2" > <u>USUARIOS CADASTRADOS</u> </td>
</tr>
<tr height="30">
	<td class="simples_2" > <u>COLETORES CADASTRADOS</u> </td>
</tr>
<tr height="30">
	<td class="simples_2" > <u>COLETORES NO CONSERTO</u> </td>
</tr>
<tr height="30">
	<td class="simples_2" > <u>STATUS DOS COLETORES</u> </td>
</tr>

<table/>


</body>
</html>