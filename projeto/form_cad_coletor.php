<?php

session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
	$username = $_POST["username"];
			
	include('libera.php');
	
	include('conecta.php');
	
	if ( $_SESSION[libera] == "ok" ){
		
/*if ( $_POST[salvar_novo] == "salvar novo" ){
	header("Location:salvar_novo_usuario.php");
} */
include('conecta.php');
//include("index.php");
	
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
<!-- chama a função (alterar) -->
function valida_dados_alterar (cadastrar)
{
    if (cadastrar.nserie.value=="")
    {
        alert ("Por favor digite o numero de serie !");
        return false;
    }
	
	if (cadastrar.descricao.value=="")
    {
        alert ("Por favor digite a descricao !");
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

<table cellpadding="0" border="1" width="80%" align="center">

    <tr>
	<h2 align="center"> <font color="336699"> Cadastrar Novo Coletor </font></h2> 
	<form action="query_salvar_novo_coletor.php" method="post" name="cadastrar" onSubmit="return valida_dados_alterar(this)">
		
		<tr> 
			<td	align="center">
			<br> <br>
				<label> <font color="336699"> *Numero de Serie: </label> &nbsp;
				<label> <input name="nserie" type="text" size="20" maxlength="20" </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				
				<br> <br>
				
				<label> <font color="336699">  *Descricao: </label> &nbsp;
				<label> <input name="descricao"  type="text" size="20" maxlength="20" </label> &nbsp; 
				
				<br> <br> &nbsp; &nbsp; &nbsp; 
				
				<label> <font color="336699"> *Identificador: </label> &nbsp;
				<label> <input name="identificador1" readonly="false" value="<?php echo $_POST["identificador"]; ?>" type="text" size="15" maxlength="15" </label> &nbsp; &nbsp;
				
				<br> <br> &nbsp; &nbsp; &nbsp; 
				
			<table cellpadding="0" border="0" width="20%" align="center">
			<tr align="center">
				<td align="center"> 
					<input align="center" type="submit" name="salvar" value="salvar"> 
				</td>
				
	</form>
				
			</tr>
			</table>
			<br> <br>
	</td>
	
</tr>
</table> 

</body>
</html>