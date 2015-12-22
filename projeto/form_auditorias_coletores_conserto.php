<?php
session_start();
	$codusuario = $_SESSION["codusuario"];
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


<h2 align="center"> <font color="336699"> Coletores no Conserto</font></h2> 
<br>
<table cellpadding="0" border="1" width="80%" height="60" align="center">

<tr>
	<td class="simples_2" width="90"> DESCRICAO </td>
	<td class="simples_2" width="90"> IDENT. </td>
	<td class="simples_2" width="150"> NUM SERIE </td>
	<td class="simples_2" width="90"> RMA </td>
	<td class="simples_2" width="90"> NFE </td>
	<td class="simples_2" width="300"> DEFEITO </td>
	<td class="simples_2" width="90"> ALMOX. </td>
</tr>
<tr>
	<td color="336699" align="center" width="90"> SB01 </td>
	<td color="336699" align="center" width="90"> SB60 </td>
	<td color="336699" align="center" width="150"> S13318521120282 </td>
	<td color="336699" align="center" width="90"> 1234567 </td>
	<td color="336699" align="center" width="90"> 000.000.000 </td>
	<td color="336699" align="center" width="300"> defeito do equipamento </td>
	<td color="336699" align="center" width="90"> 20/12/2015 </td>
</tr>

<table/>

</body>
</html>