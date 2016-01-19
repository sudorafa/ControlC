<?php

session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('libera.php');
	
	include('conecta.php');
	
	if ( $_SESSION[libera] == "ok" ){
		
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
<body onLoad="document.buscar.username.focus()"> 

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

<!------------------------------------------------------------------------------------------>
<script language="javascript" src="script/ajax.js"></script> 
<script language="javascript" src="script/fmenu.js"></script>
<script language="javascript" src="script/fcampo.js"></script>

<h2 align="center"> <font color="336699"> Buscar Usuarios </font></h2>	

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
	
	<form action="form_listar_usuarios.php" method="post" name="listar_usuarios" align="center">
	<td	align="center"> 
		<br>	
		
		<label> <font color="336699">  Usuarios por Setor: </label> &nbsp;
		<?php
			$setor= mysql_query("select * from setorc where codsetor < '8'");
		?>
		<select size="1" name="setor">
		<option value="TODOS">TODOS</option>
		<?php
			while ($setor_1 = mysql_fetch_array($setor)){
		?>
			<option value="<?php echo $setor_1[descsetor]?>"> <?php echo $setor_1[descsetor]?></option>
		<?php } ?>	
		</select> &nbsp; &nbsp;
				
		<input type="submit" name="listar" value="listar"> &nbsp; &nbsp; &nbsp;
		
		<br> <br>
	</td>
	
	</form>
	
</tr>
</table>
	
	<?php 
		
		$username 	= $_POST['username'];
		 
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


<br>

</body>
</html>