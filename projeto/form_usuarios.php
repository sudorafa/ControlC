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

<h2 align="center"> <font color="336699"> Cadastrar / Alterar Dados dos Usuarios </font></h2> 

<table cellpadding="0" border="1" width="80%" align="center">
    <tr>

	<td	align="center"> 
		<br>
		&nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Usuario: </label> &nbsp;
		<label> <input name="usuario" type="text" size="15" maxlength="15" </label> &nbsp; 
		<input type="submit" name="buscar" value="buscar"> &nbsp; &nbsp; &nbsp;
		<br> <br> <br>
		<tr> 
			<td	align="center">
			<br> <br>
				<label> <font color="336699"> Nome: </label> &nbsp;
				<label> <input name="nomusuario" type="text" size="50" maxlength="50"> </label> &nbsp;  &nbsp; &nbsp;
				<label> <font color="336699">  Setor: </label> &nbsp;
				<select size="1" name="setor">
				<option value="informatica"> Informatica </option>
				</select> &nbsp;  &nbsp; &nbsp;
				<label> <font color="336699">  Data Cadastro: </label> &nbsp;
				<label> <input name="data_entrada" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y/m/d') ?>"> &nbsp; &nbsp; &nbsp;
			<br> <br> <br>
				<label> <font color="336699">  Senha (Para ter acesso ao Portal): </label> &nbsp;
				<label> <input name="senha" type="password" size="20" maxlength="20"> </label> &nbsp; &nbsp; &nbsp;
				<label> <font color="336699">  Bloqueio: </label> &nbsp;
				<select size="1" name="bloqueio"> <option value="n"> Nao </option> </select> &nbsp; &nbsp; &nbsp;
				<label> <font color="336699">  Matricula (Bipar o Cracha): </label> &nbsp;
				<label> <input name="matricula" type="text" size="12" maxlength="12"> </label> &nbsp;  &nbsp; &nbsp;
			<br> <br> <br> <br>
			<input align="center" type="submit" name="atualizar" value="atualizar/cadastrar">
			<br> <br>
			</td>
		</tr>	
		<br> <br>
	</td>
	
	</tr>
</table> 


</body>
</html>