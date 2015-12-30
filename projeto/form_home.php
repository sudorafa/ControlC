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
				$consulta = mysql_query("select * from usuariosc where matricula = '$matricula'");
				$linha = mysql_num_rows($consulta);
				
				$linha_mat = $linha
		?>
			
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

<?php include("form_status_equipamentos.php"); ?>

</body>
</html>