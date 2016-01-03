<?php

session_start();
	$idusuario = $_SESSION["idusuario"];
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

<h2 align="center"> <font color="336699"> Buscar Usuario </font></h2>	

<table cellpadding="0" border="1" width="80%" align="center">
<tr>
	<form action="form_usuarios.php" method="post" name="buscar" align="center" onSubmit="return valida_dados(this)">
	<td	align="center"> 
		<br>	
		
		&nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Usuario: </label> &nbsp;
		<label> <input name="username" value="<?php echo $_POST["username"]; ?>" type="text" size="15" maxlength="15" </label> &nbsp; 
		<input type="submit" name="buscar" value="buscar"> &nbsp; &nbsp; &nbsp;
		
		<br> <br>
	</td>
	</form>
	
	<?php 
		
		$username = $_POST['username'];
 
		$consulta = mysql_query("select * from usuariosc where user = '$username' and filial = '$filial_usuario_logado'");
		$linha = mysql_num_rows($consulta);
 
		if(($_POST[username]) or ($_POST[username] <> "") or ($_POST[username] <> 0)){
			
			if($linha == 1)
			{
				// o usuário existe;
				include("form_alterar_deletar_usuario.php");
			}
			else
			{
				// o usuário não existe;
				echo "<script>window.alert('Usuario nao existe, cadastre e salve !')</script>";
				include("form_cad_usuario.php");
			}
		}
		
		?>
</tr>
</table>

</body>
</html>