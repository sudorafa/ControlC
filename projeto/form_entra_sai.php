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

<h2 align="center"> <font color="336699"> Registrando Entradas / Saidas </font></h2> 
<br>

<table border ="1" width="80%" height="250" align="center" cellpadding="0" cellspacing="0">
    <tr>
	
	<td	align="center"> 
		<br>
		&nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Matricula: </label> &nbsp;
		<label> <input name="matricula" type="text" size="10" maxlength="10" value="<?php echo $_POST[matricula]?>"></label> &nbsp; 
		<input type="submit" name="ok" value="ok"> &nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Coletor: </label> &nbsp;
		<label> <input name="coletor" type="text" size="5" maxlength="3" value="<?php echo $_POST[coletor]?>" readonly="false"> </label>&nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Restam: </label> &nbsp;
		<label> <input name="setor" type="text" size="3" value="<?php echo $restamsetor[restamsetor]?>" readonly="false"> </label> 
		<br> <br>
		<label> <font color="336699"> Nome: </label> &nbsp; 
		<label> <input name="nome" type="text" size="50" value="<?php echo $usuario[nomusuario]?>" readonly="false"> </label> &nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Setor: </label> &nbsp; 		
		<label> <input name="setor" type="text" size="20" value="<?php echo $setor[setorusuario]?>" readonly="false"> </label> <br> <br>
		<label> Data entrada: </label> &nbsp; 
		<input name="data_entrada" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y/m/d') ?>"> &nbsp; &nbsp; &nbsp;
		<label> Hora entrada: </label> &nbsp;
		<input name="hora_entrada" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('H:i') ?>"> <br> <br>
		<label> OBS: </label> <br>
		<textarea name="obs" cols="40" rows="4"></textarea> <br> <br>
		<input type="submit" name="cadastrar" value="CONFIRMA">
		<br> <br>
	</td>
	
	</tr>
</table> 


</body>
</html>