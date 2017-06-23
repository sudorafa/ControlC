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


<h2 align="center"> <font color="336699"> Movimentacao Usuarios </font></h2> 

<table cellpadding="0" border="1" width="80%" align="center">
<tr align="center">
	<form action="form_auditoria_entradas_saidas_usuario.php" method="post" name="form_auditoria_entradas_saidas_usuario" align="center" onSubmit="return valida_dados(this)">
	<td >
	<br> <br>
	
	<?php 
		$usuario = mysql_query("select * from usuariosc where filial = '$filial_usuario_logado' order by nomusuario");
	?>
		
		&nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Nome: </label> &nbsp;
		<select size="1" name="usuario">
			<?php
				while ($dados_usuario = mysql_fetch_array($usuario)){
			?>
				<option value="<?php echo $dados_usuario[nomusuario]?>"> <?php echo $dados_usuario[nomusuario]?></option>
			<?php }?>
		</select> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
		<br> <br> <br> 
		<label> <font color="336699">  Data Inicio: </label> &nbsp;
		<input name="data_inicio" type="text"  value="<?php echo  date('Y-m-d')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
		<label> <font color="336699">  Data Fim: </label> &nbsp;
		<input name="data_fim" type="text"  value="<?php echo  date('Y-m-d')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp;
	<br> <br> <br>
	<center><input type="submit" value="gerar relatorio" name="gerar_relatorio"><center>
	<br> <br>	
	</td>
	</form>
	
	<form action="form_auditoria_entradas_saidas_setor.php" method="post" name="form_auditoria_entradas_saidas_setor" align="center" onSubmit="return valida_dados(this)">
	<td >
	<br> <br>
		&nbsp; &nbsp; &nbsp;
		
		<label> <font color="336699">  Usuarios por Setor: </label> &nbsp;
		<select size="1" name="setor">
		<option value="TODOS"> TODOS </option> 
		<?php
			$setor= mysql_query("select * from setorc where codsetor < '7'"); 
		?>
		<?php
			while ($setor_1 = mysql_fetch_array($setor)){
		?>
			<option value="<?php echo $setor_1[descsetor]?>"> <?php echo $setor_1[descsetor]?></option>
		<?php }?>	
		</select> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<br> <br> <br> 
		<label> <font color="336699">  Data Inicio: </label> &nbsp;
		<input name="data_inicio" type="text"  value="<?php echo  date('Y-m-d')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
		<label> <font color="336699">  Data Fim: </label> &nbsp;
		<input name="data_fim" type="text"  value="<?php echo  date('Y-m-d')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp;
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