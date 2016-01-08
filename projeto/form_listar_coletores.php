<?php
session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('libera.php');
	
	include('conecta.php');
	
	/*if ( $_SESSION[libera] == "ok" ){
		include("index.php");
	
	}*/
?>
						
<html>
<head>
<link href="estilo.css" rel="stylesheet" type="text/css">
<body onLoad="document.form_home.matricula.focus()"> 
<script language="javascript" src="script/ajax.js"></script> 
<script language="javascript" src="script/fmenu.js"></script>
<script language="javascript" src="script/fcampo.js"></script>

<table align = "center">
<tr>
	<form action="form_coletores.php">
	<td align = "center">
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input align = "center" type="submit" name="voltar" value="voltar">
	</td>
	</form>
</tr>
</table>

<h2 align="center"> <font color="336699"> Status e Informacoes dos Coletores </font></h2> 

<?php
		$idusuario = $_SESSION["idusuario"];
		$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
		$filial_usuario_logado = $dados_usuario_logado[filial];
	
			$coletores = mysql_query("select * from coletores where filial = '$filial_usuario_logado' order by identificador");
			$linhas_coletores = mysql_num_rows($coletores);
			$uso = $linhas_coletores;
		
	?>
			<table cellpadding="0" border="1" width="50%" align="center">
			
				<tr>
				<?php 
				if ($uso == 0) { ?>
					<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
				<?php }
				else { ?>
					<td class="simples_2" height="26"> DESCRICAO </td>
					<td class="simples_2" height="26"> IDENTIFICADOR </td>
					<td class="simples_2" height="26"> NUM SERIE </td>
					<td class="simples_2" height="26"> STATUS </td>
					</tr>
				<?php }
					while ($dados_coletores = mysql_fetch_array($coletores)){
				?>
				<tr>
					<td color="336699" align="center" height="26" > <?php echo $dados_coletores[descricao]?> </td>
					<td color="336699" align="center" height="26" > <?php echo $dados_coletores[identificador]?></a> </td>
					<td color="336699" align="center" height="26" > <?php echo $dados_coletores[nserie]?> </td>
					<td color="336699" align="center" height="26" > <?php echo $dados_coletores[status]?> </td>
				<?php };?>
				</tr>
			
			</table>
<br>

</body>
</head>
</html>