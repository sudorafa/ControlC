<?php

session_start();
	$codusuario = $_SESSION["codusuario"];
	$filialusuario = $_SESSION["filial"];
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
	<h2 align="center"> <font color="336699"> Alterar / Excluir Usuarios </font></h2> 
	<form action="query_salvar_alteracao_usuario.php" method="post" name="alterar" onSubmit="return valida_dados_alterar(this)">
		<?php 
		
		
			$usuario = mysql_query("select * from usuariosc where user = '$username'");
			$dados_usuario = mysql_fetch_array($usuario)
		
		?>
		<tr> 
			<td	align="center">
			<br> <br>
				<label> <font color="336699"> *Nome: </label> &nbsp;
				<input name="nomeusuaruio" type="text" size="50" maxlength="50" value="<?php echo $dados_usuario[nomusuario]?>"> &nbsp; &nbsp; &nbsp;
				
				<label> <font color="336699">  *Setor: </label> &nbsp;
				<?php
					$setor= mysql_query("select * from setorc where codsetor < '8'"); 
				?>
				<select size="1" name="setor">
				<option value="<?php echo $dados_usuario[descsetor]?>"> <?php echo $dados_usuario[descsetor]?></option>
				<option value="999"> - </option>
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
				<option value="<?php echo $dados_usuario[filial]?>"> <?php echo $dados_usuario[filial]?></option>
				<option value="999" align = "center"> - </option>
				<?php
					while ($dados_filial = mysql_fetch_array($busca_filial)){
				?>
					<option value="<?php echo $dados_filial[filial]?>"> <?php echo $dados_filial[filial]?></option>
				<?php }?>	
				</select> &nbsp; &nbsp;
				-->
				
			<br> <br> <br>
			
				<label> <font color="336699">  Data Desta Atualizacao: </label> &nbsp;
				<input name="datacadastro" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y-m-d') ?>"> &nbsp; &nbsp; 
				
				<label> <font color="336699">  Data Ultima Atualizacao: </label> &nbsp;
				<input name="data_cadastro" type="text" size="10" maxlength="10" readonly="false" value="<?php echo $dados_usuario[datacadastro] ?>"> &nbsp; &nbsp; 
				
			<br> <br> <br>
				<label> <font color="336699">  Senha (Acesso ao Portal): </label> &nbsp;
				<input name="senha" type="password" size="10" maxlength="10" value="<?php echo $dados_usuario[senha] ?>"> &nbsp; &nbsp;
				
				<label> <font color="336699">  *Bloqueio: </label> &nbsp;
				<select size="1" name="bloqueio">
					<option value="<?php echo $dados_usuario[bloqueio]?>"><?php echo $dados_usuario[bloqueio]?></option>
					<option value="nada">-----</option>
					<option value="nao">nao</option>
					<option value="sim">sim</option>
				</select> &nbsp; &nbsp;
				
				<label> <font color="336699">  *Matricula (Bipar o Cracha): </label> &nbsp;
				<input name="matricula" type="text" size="10" maxlength="10" value="<?php echo $dados_usuario[matricula] ?>"> &nbsp; &nbsp;
			<br> <br> <br> <br>
			

			<input type="hidden" name="user1" value="<?php echo $dados_usuario[user]?>" >
			
			<table cellpadding="0" border="0" width="30%" align="center">
			<tr align="center">
				<td align="center"> 
					<input align="center" type="submit" name="salvar" value="salvar"> 
				</td>
				
	</form>
				<form action="query_deletar_usuario.php" method="post" name="deletar" align="center" onSubmit="return valida_dados_deletar(this)">
				<td >
					<input type="hidden" name="matricula1" value="<?php echo $dados_usuario[matricula]?>" >
					<input align="center" type="submit" name="deletar" value="deletar">  
				</td>
				</form>
				<form action="form_usuarios.php" method="post" name="voltar" align="center">
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