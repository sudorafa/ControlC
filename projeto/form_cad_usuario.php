<?php

session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
	$filialusuario = $_SESSION["filial"];
			
	include('libera.php');
	
	include('conecta.php');
	
	if ( $_SESSION[libera] == "ok" ){
		
/*if ( $_POST[salvar_novo] == "salvar novo" ){
	header("Location:salvar_novo_usuario.php");
} */
include('conecta.php');
//include("index.php");
	
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
<!-- chama a função (cadastro) -->
function valida_dados (cadastro)
{
    if (cadastro.nomeusuaruio.value=="")
    {
        alert ("Por favor digite o nome do usuarios.");
        return false;
    }
	
	if (cadastro.filial.selectedIndex ==0)
    {
        alert ("Por favor selecione a filial.");
        return false;
    }
    
    if (cadastro.user.value=="")
    {
        alert ("Por favor digite o usuario.");
        return false;
    }

    /*if (cadastro.senha.value=="")
    {
        alert ("Por favor digite a senha.");
        return false;
    }*/

	if (cadastro.bloqueio.selectedIndex ==0)
    {
        alert ("Por favor selecione o bloqueio.");
        return false;
    }
	
    if (cadastro.matricula.value=="")
    {
        alert ("Por favor digite a matricula.");
        return false;
    }
    
return true;
}
</script>
<!---------------------------------------------------------------------------------->

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
	<form action="query_salvar_novo_usuario.php" method="post" name="cadastro" onSubmit="return valida_dados(this)">
		<h2 align="center"> <font color="336699"> Cadastrar Novo Usuario </font></h2>	
		<tr> 
			<td	align="center">
			<br> <br>
				<label> <font color="336699"> *Nome: </label> &nbsp;
				<input name="nomeusuaruio" type="text" size="50" maxlength="50" > &nbsp; &nbsp; &nbsp;
				
				<label> <font color="336699">  *Setor: </label> &nbsp;
				<?php
					$setor= mysql_query("select * from setorc where codsetor < '7'");
				?>
				<select size="1" name="setor">
				<option value="0"> - </option>
				<?php
					while ($setor_1 = mysql_fetch_array($setor)){
				?>
					<option value="<?php echo $setor_1[descsetor]?>"> <?php echo $setor_1[descsetor]?></option>
				<?php }?>	
				</select> &nbsp; &nbsp;
				
				<!--
				<label> <font color="336699">  *Filial: </label> &nbsp;
				<?php
					$busca_filial= mysql_query("select * from filialc"); 
				?>
				<select size="1" name="filial">
				<option value="999" align = "center"> - </option>
				<?php
					while ($dados_filial = mysql_fetch_array($busca_filial)){
				?>
					<option value="<?php echo $dados_filial[filial]?>"> <?php echo $dados_filial[filial]?></option>
				<?php }?>	
				</select> &nbsp; &nbsp;
				-->
				
			<br> <br> <br>
				<label> <font color="336699"> *Usuario: </label> &nbsp;
				<label> <input name="user" readonly="false" value="<?php echo $_POST["username"]; ?>" type="text" size="15" maxlength="15" </label> &nbsp; &nbsp;
				
				<label> <font color="336699">  *Data Cadastro: </label> &nbsp;
				<input name="datacadastro" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y-m-d') ?>"> &nbsp; &nbsp; 
				
			<br> <br> <br>
				<label> <font color="336699">  Senha (Acesso ao Portal): </label> &nbsp;
				<input name="senha" type="password" size="10" maxlength="10" > &nbsp; &nbsp;
				
				<label> <font color="336699">  *Bloqueio: </label> &nbsp;
				<select size="1" name="bloqueio">
					<option> </option>
					<option value="nao">nao</option>
					<option value="sim">sim</option>
				</select> &nbsp; &nbsp;
				
				<label> <font color="336699">  *Matricula (Bipar o Cracha): </label> &nbsp;
				<input name="matricula" type="text" size="10" maxlength="10" > &nbsp; &nbsp;
			<br> <br> <br> <br>
			
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