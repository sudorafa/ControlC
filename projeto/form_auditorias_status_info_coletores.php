<?php
session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('altoriza.php');
	
	include('conecta.php');
	
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


<h2 align="center"> <font color="336699"> Status e Informacoes dos Coletores </font></h2> 
<br>
<table cellpadding="0" border="0" width="80%" height="60" align="center">
<tr>
	<td>
	<table cellpadding="0" border="1" width="70%" height="60" align="center">
		<tr>
			<td class="simples_2" width="100"> DESCRICAO </td>
			<td class="simples_2" width="100"> IDENTIFICADOR </td>
			<td class="simples_2" width="500"> NUM SERIE </td>
			<td class="simples_2" width="200"> STATUS </td>
		</tr>
		<tr>
			<td color="336699" align="center" width="100"> SB01 </td>
			<td color="336699" align="center" width="100"> SB60 </td>
			<td color="336699" align="center" width="500"> S13318521120282 </td>
			<td color="336699" align="center" width="200"> NO CPD </td>
		</tr>
	<table/>
	</td>
</tr>
<table/>

</body>
</html>