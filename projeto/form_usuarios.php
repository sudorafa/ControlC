<?php
session_start();
	$codusuario = $_SESSION["codusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('altoriza.php');
	
	include('../conecta.php');
	
	if ( $_SESSION[altoriza] == "ok" ){
		

if ( $_POST[upar] == "CADASTRAR" ){
 header("Location:update_usuario.php");
}
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

<h2 align="center"> <font color="336699"> Cadastrar / Alterar Dados dos Usuarios </font></h2> 

<table cellpadding="0" border="1" width="80%" align="center">

    <tr>
	<form action="form_usuarios.php" method="post" name="cadastro" >
	<td	align="center"> 
		<br>
		&nbsp; &nbsp; &nbsp;
		<label> <font color="336699"> Usuario: </label> &nbsp;
		<label> <input name="user" value="<?php echo $_POST["user"]; ?>" type="text" size="15" maxlength="15" </label> &nbsp; 
		<input type="submit" name="buscar" value="buscar"> &nbsp; &nbsp; &nbsp;
		<?php 
			$usuario = mysql_query("select * from usuariosc where login = '$user'");
			$dados_usuario = mysql_fetch_array($usuario)
		?>
		<br> <br> <br>
		<tr> 
			<td	align="center">
			<br> <br>
				<label> <font color="336699"> Nome: </label> &nbsp;
				<input name="nomeusuaruio" type="text" size="50" maxlength="40" value="<?php echo $dados_usuario[nomusuario]?>	"> &nbsp; &nbsp; &nbsp;
				
				<label> <font color="336699">  Setor: </label> &nbsp;
				<?php
					$setor= mysql_query("select * from setor"); 
				?>
				<select size="1" name="setor">
				<option value="999">--------------------</option>
				<?php
					while ($setor_1 = mysql_fetch_array($setor)){
				?>
					<option value="<?php echo $setor_1[codsetor]?>"> <?php echo $setor_1[descsetor]?></option>
				<?php }?>	
				</select> &nbsp; &nbsp;
				
				<label> <font color="336699">  Data Cadastro: </label> &nbsp;
				<input name="data_entrada" type="text" size="10" maxlength="10" readonly="false" value="<?php echo $dados_usuario[datacadastro] ?>"> &nbsp; &nbsp; 
				
			<br> <br> <br>
				<label> <font color="336699">  Senha (Acesso ao Portal): </label> &nbsp;
				<input name="senha" type="password" size="10" maxlength="10" value="<?php echo $dados_usuario[senha] ?>"> &nbsp; &nbsp;
				
				<label> <font color="336699">  Bloqueio: </label> &nbsp;
				<select size="1" name="bloqueio"> <option value="n">nao</option> <option value="s">sim</option> </select> &nbsp; &nbsp;
				
				<label> <font color="336699">  Matricula (Bipar o Cracha): </label> &nbsp;
				<input name="matricula" type="text" size="10" maxlength="10" value="<?php echo $dados_usuario[matricula] ?>"> &nbsp; &nbsp;
			<br> <br> <br> <br>
			<input align="center" type="submit" name="upar" value="cadastrar">
			<br> <br>
			</td>
			
			
		</tr>	
		<br> <br>
	</td>
	</form>
	</tr>	
</table> 


</body>
</html>