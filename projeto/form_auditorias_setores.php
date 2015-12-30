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


<h2 align="center"> <font color="336699"> Entradas e Saidas de Coletores por Setores </font></h2> 
<br>

<table cellpadding="0" border="1" width="80%" align="center">
<tr align="center">
	<td >
	<br> <br>
		&nbsp; &nbsp; &nbsp;
		
		<label> <font color="336699">  Setor: </label> &nbsp;
		<select size="1" name="setor">
		<option value="*"> TODOS </option> 
		<option value="-"> - </option> 
		<?php
			$setor= mysql_query("select * from setorc where codsetor < '8'"); 
		?>
		<?php
			while ($setor_1 = mysql_fetch_array($setor)){
		?>
			<option value="<?php echo $setor_1[descsetor]?>"> <?php echo $setor_1[descsetor]?></option>
		<?php }?>	
		</select> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<label> <font color="336699">  Data Inicio: </label> &nbsp;
		<input name="data_inicio" type="text"  value="<?php echo  date('d/m/Y')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
		<label> <font color="336699">  Data Fim: </label> &nbsp;
		<input name="data_fim" type="text"  value="<?php echo  date('d/m/Y')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp;
	<br> <br> <br>
	<center><input type="submit" value="gerar relatorio" name="gerar_relatorio"><center>
	<br> <br>
	</td>
</tr>
<table/>


</body>
</html>