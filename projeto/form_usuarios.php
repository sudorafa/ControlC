<?php

session_start();
	$codusuario = $_SESSION["codusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('altoriza.php');
	
	include('conecta.php');
	
	if ( $_SESSION[altoriza] == "ok" ){
		
/*if ( $_POST[salvar_novo] == "salvar novo" ){
	header("Location:salvar_novo_usuario.php");
} */
include('conecta.php');
include("index.php");
	
	}
?>
						
<html>
<head>
<link href="estilo.css" rel="stylesheet" type="text/css">
</head>
</head>
<body onLoad="document.form_home.matricula.focus()"> 

<!---------------------------------------------------------------------------------->
<script language="javascript">
<!-- chama a função (buscar) -->
function valida_dados (buscar)
{
    if (buscar.username.value=="")
    {
        alert ("Por favor digite o usuario para buscar.");
        return false;
    }
return true;
}
</script>

<!---------------------------------------------------------------------------------->


<SCRIPT language=javascript> 
function Mascara (formato, keypress, objeto){ 
campo = eval (objeto); 
// CEP 
if (formato=='CEP'){ 
separador = '-'; 
conjunto1 = 5; 
if (campo.value.length == conjunto1){ 
campo.value = campo.value + separador; 
} 
} 

// HORA 
if (formato=='novahora'){ 
separador = ':'; 
conjunto1 = 2; 
if (campo.value.length == conjunto1){ 
campo.value = campo.value + separador; 
} 
} 

// DATA 
if (formato=='novadata'){ 
separador = '/'; 
conjunto1 = 2; 
conjunto2 = 5; 
if (campo.value.length == conjunto2)
{ 
campo.value = campo.value + separador; 
} 
if ( campo.value.length == conjunto1)
{ 
campo.value = campo.value + separador; 
}

} 

// TELEFONE 
if (formato=='TELEFONE'){ 
separador = '-'; 
conjunto1 = 4; 
if (campo.value.length == conjunto1){ 
campo.value = campo.value + separador; 
} 
} 
} 
</SCRIPT> 

<!------------------------------------------------------------------------------------------>
<script language="javascript" src="script/ajax.js"></script> 
<script language="javascript" src="script/fmenu.js"></script>
<script language="javascript" src="script/fcampo.js"></script>

<table cellpadding="0" border="0" width="80%" align="center">
<tr align="center">
	<td align="center">
		<form action="form_cad_usuario.php" method="post" name="cadastrar" align="center" >
			<input align="center" type="submit" name="novo" value="Cadastrar Novo Usuario">  
		</form>
	</td>
</tr>
</table>

<h2 align="center"> <font color="336699"> Alterar / Excluir Usuarios </font></h2> 

<table cellpadding="0" border="1" width="80%" align="center">
<tr>
	<form action="form_alterar_deletar_usuario.php" method="post" name="buscar" align="center" onSubmit="return valida_dados(this)">
	<td	align="center"> 
		<br>	
		&nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Usuario: </label> &nbsp;
		<label> <input name="username" value="<?php echo $_POST["username"]; ?>" type="text" size="15" maxlength="15" </label> &nbsp; 
		<input type="submit" name="buscar" value="buscar"> &nbsp; &nbsp; &nbsp;
		
		<?php 
		
			$usuario = mysql_query("select * from usuariosc where user = '$username'");
			$dados_usuario = mysql_fetch_array($usuario)
		
		?>
		
		<br> <br>
	</td>
	</form>
</tr>
</table>

</body>
</html>