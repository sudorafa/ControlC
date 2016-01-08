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
<body onLoad="document.entra_sai.matricula.focus()"> 
<script language="javascript" src="script/ajax.js"></script> 
<script language="javascript" src="script/fmenu.js"></script>
<script language="javascript" src="script/fcampo.js"></script>

<!---------------------------------------------------------------------------------->
<script language="javascript">
<!-- chama a função (buscar) -->
function valida_dados (entra_sai)
{
    if (entra_sai.matricula.value=="")
    {
        alert ("Por favor digite o usuario para buscar.");	
        return false;
    }
return true;
}
</script>

<!---------------------------------------------------------------------------------->


<table border ="1" width="80%" height="100" align="center" cellpadding="0" cellspacing="0">
	<tr>
	
	<td	width="40%" height="100" align="center" > 
		<h2> <font color="336699"> Entrada / Saida (por matricula) </font></h2> 
		<form name="entra_sai" action="form_entra_sai.php" method="post" onSubmit="return valida_dados(this)">
			<label> <font color="336699"> Matricula : &nbsp; </label> 		
			<label>
				<input name="matricula" value="<?php echo $_POST["matricula"]; ?>" type="text" size="10" maxlength="10" >
			</label> 
			
		<?php 
				$consulta = mysql_query("select * from usuariosc where matricula = '$matricula' and filial = '$filial_usuario_logado'");
				$linha = mysql_num_rows($consulta);
				
				$linha_mat = $linha
		?>
			
			&nbsp; &nbsp; <input type="submit" name="ok" value="ok">
				
		</form>
	
	</td>
	
	<td width="40%" height="100" align="center" > <h2> <font color="336699"> Baixa (por identificador)</font></h2>
	<form name="form_baixa" action="query_baixa_por_identificador.php"  method="post">
		<label> <font color="336699"> Coletor : &nbsp; </label> 		
		<label>
			<input name="coletor" type="text" size="6" maxlength="6" >
		</label> 
		&nbsp; &nbsp; <input type="submit" name="ok" value="ok">
	</form>
	</td>
	</tr>
</table> 

<?php include("form_status_equipamentos.php"); ?>

</body>
</html>