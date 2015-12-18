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

<h2 align="center"> <font color="336699"> Cadastrar / Alterar Dados dos Coletrores </font></h2> 

<table cellpadding="0" border="1" width="80%" align="center">
    <tr>

	<td	align="center"> 
		<br>
		&nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Identificador: </label> &nbsp;
		<label> <input name="identificacao" type="text" size="5" maxlength="5" </label> &nbsp; 
		<input type="submit" name="buscar" value="buscar"> &nbsp; &nbsp; &nbsp;
		<br> <br>
		<tr>
			<td	align="center"> 
			<table cellpadding="0" border="0" width="270" height="100" align="center" >
			<tr>
				<td	align="right">
				<br> 
				<label> <font color="336699"> Numero de Serie: </label> &nbsp;
				<label> <input name="nserie" type="text" size="20" maxlength="20" </label> &nbsp; 
				<br> <br>
				<label> <font color="336699">  Descricao: </label> &nbsp;
				<label> <input name="descricao" type="text" size="20" maxlength="20" </label> &nbsp; 
				<br> <br>
				<label> <font color="336699">  Status: </label> &nbsp;
				<label> <input name="status" type="text" size="20" maxlength="20" readonly="false" </label> &nbsp; 
				<br> <br>
				</td>
				<tr>
					<td	align="center">
						<input align="center" type="submit" name="atualizar" value="atualizar/cadastrar">
						<br> <br>
					</td>
				</tr>
			</tr>	
			</table>
			</td>
		</tr>
		<br> <br>
	</td>
	
	</tr>
</table> 


</body>
</html>