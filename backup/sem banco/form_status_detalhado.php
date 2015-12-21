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


<h2 align="center"> <font color="336699"> Status dos Equipamentos Detalhado</font></h2> 
<br>

<table cellpadding="0" border="1" width="80%" height="60" align="center">
<tr>
	<td class="simples_2" width="100"> MATRICULA </td>
	<td class="simples_2" width="600"> NOME </td>
	<td class="simples_2" width="100"> SETOR </td>
	<td class="simples_2" width="200"> COLT. </td>
	<td class="simples_2" width="100"> DATA </td>
	<td class="simples_2" width="100"> HORA </td>
</tr>
<tr>
	<td color="336699" align="center" width="100"> 99473 </td>
	<td color="336699" align="center" width="600"> Rafael Eduardo Lima dos Santos </td>
	<td color="336699" align="center" width="100"> Informatica </td>
	<td color="336699" align="center" width="200"> SB65 </td>
	<td color="336699" align="center" width="100"> 2015-12-16 </td>
	<td color="336699" align="center" width="100"> 15:20 </td>
</tr>
<table/>


</body>
</html>