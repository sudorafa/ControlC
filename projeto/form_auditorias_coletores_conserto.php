<?php
session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('libera.php');
	
	include('conecta.php');
	
	if ( $_SESSION[libera] == "ok" ){
		include("index.php");
	
	}
	
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
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


<h2 align="center"> <font color="336699"> Coletores Conserto </font></h2> 

<table cellpadding="0" border="1" width="40%" align="center">
<tr align="center">
	<form action="form_auditorias_lista_coletores_conserto.php" method="post" name="form_auditorias_lista_coletores_conserto" align="center" onSubmit="return valida_dados(this)">
	<td >
	<br> <br>
	
	<?php 
		$coletor = mysql_query("select * from coletores where filial = '$filial_usuario_logado' order by identificador");
	?>
		
		&nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Coletores: </label> &nbsp;
		<select size="1" name="coletor">
			<option value="TODOS"> TODOS </option>
			<?php
				while ($dados_coletor = mysql_fetch_array($coletor)){
			?>
				<option value="<?php echo $dados_coletor[identificador]?>"> <?php echo $dados_coletor[identificador]?></option>
			<?php }?>
		</select> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
		<br> <br> <br> 
	<center><input type="submit" value="gerar relatorio" name="gerar_relatorio"><center>
	<br> <br>	
	</td>
	</form>
	
</tr>
</table>

<br>

<table align = "center">
<tr>
	<form action="form_auditorias.php">
	<td align = "center">
		<input align = "center" type="submit" name="voltar" value="voltar">
	</td>
	</form>
</tr>
</table>

</body>
</html>