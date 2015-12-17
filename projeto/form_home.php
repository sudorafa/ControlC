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

<table border ="1" width="80%" height="100" align="center" cellpadding="0" cellspacing="0">
	<tr>
	
	<td	width="40%" height="100" align="center" > 
		<h2> <font color="336699"> Entrada / Saida (por matricula) </font></h2> 
		<form name="form_entra_sai" action="form_entra_sai.php"  method="post">
			<label> <font color="336699"> Matricula : &nbsp; </label> 		
			<label>
				<input name="matricula" type="text" size="10" maxlength="10" >
			</label> 
			&nbsp; &nbsp; <input type="submit" name="ok" value="ok">
		</form>
	</td>
	
	<td width="40%" height="100" align="center" > <h2> <font color="336699"> Baixa (por numero)</font></h2>
	<form name="form_baixa" action="form_baixa.php"  method="post">
		<label> <font color="336699"> Coletor : &nbsp; </label> 		
		<label>
			<input name="coletor" type="text" size="2" maxlength="2" >
		</label> 
		&nbsp; &nbsp; <input type="submit" name="ok" value="ok">
	</form>
	</td>
	</tr>
</table> 
<br>
<h2 align="center"> <font color="336699"> Status dos Equipamentos </font></h2> 

<table cellpadding="0" border="1" width="40%" height="60" align="center">
<tr>
	<td class="simples_2" width="90"> MATRICULA </td>
	<td class="simples_2" width="300"> NOME </td>
	<td class="simples_2" width="50"> COLT. </td>
</tr>

<tr>
	<td color="336699" align="center" width="90"> 047000619 </td>
	<td color="336699" align="center" width="300"> Rafael Eduardo Lima dos Santos</td>
	<td color="336699" align="center" width="50"> SB52 </td>
</tr>
</table>

</body>
</html>