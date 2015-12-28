<?php

session_start();
	$codusuario = $_SESSION["codusuario"];
	$mensagem = $_SESSION["mensagem"];
	$username = $_POST["username"];
			
	include('altoriza.php');
	
	include('conecta.php');
	
	if ( $_SESSION[altoriza] == "ok" ){
		
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
function valida_dados_alterar (alterar)
{
    if (alterar.nomeusuaruio.value=="")
    {
        alert ("Por favor digite o nome do usuario.");
        return false;
    }
		
	/*if (alterar.senha.value=="")
    {
        alert ("Por favor digite a senha do usuario.");
        return false;
    }*/
	
	if (alterar.matricula.value=="")
    {
        alert ("Por favor digite a matricula do usuario.");
        return false;
    }
	
return true;
}
</script>

<!---------------------------------------------------------------------------------->

<script language="javascript">
<!-- chama a função (deletar)-->
function valida_dados_deletar (deletar)
{
    if (deletar.matricula1.value=="")
    {
        alert ("Por favor digite o usuario para deletar.");
        return false;
    }

return true;
}
</script>

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
	<h2 align="center"> <font color="336699"> Alterar / Excluir Coletor </font></h2> 
	<form action="query_salvar_alteracao_usuario.php" method="post" name="alterar" onSubmit="return valida_dados_alterar(this)">
		<?php 
		
		
			$usuario = mysql_query("select * from usuariosc where user = '$username'");
			$dados_usuario = mysql_fetch_array($usuario)
		
		?>
		<tr> 
			<td	align="center">
			<br> <br>
				<label> <font color="336699"> Numero de Serie: </label> &nbsp;
				<label> <input name="nserie" type="text" size="20" maxlength="20" </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				<br> <br>
				<label> <font color="336699">  Descricao: </label> &nbsp;
				<label> <input name="descricao" type="text" size="20" maxlength="20" </label> &nbsp; 
				<br> <br> &nbsp; &nbsp; &nbsp; 
				<label> <font color="336699">  Status: </label> &nbsp;
				<label> <input name="status" type="text" size="20" maxlength="20" readonly="false" </label> &nbsp; 
				<br> <br>

			<input type="hidden" name="user1" value="<?php echo $dados_usuario[user]?>" >
			
			<table cellpadding="0" border="0" width="30%" align="center">
			<tr align="center">
				<td align="center"> 
					<input align="center" type="submit" name="salvar" value="salvar"> 
				</td>
				
	</form>
				<form action="query_deletar_coletor.php" method="post" name="deletar" align="center" onSubmit="return valida_dados_deletar(this)">
				<td >
					<input type="hidden" name="matricula1" value="<?php echo $dados_usuario[matricula]?>" >
					<input align="center" type="submit" name="deletar" value="deletar">  
				</td>
				</form>
				<form action="form_coletores.php" method="post" name="voltar" align="center">
				<td >	
					<input align="center" type="submit" name="voltar" value="voltar">  
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