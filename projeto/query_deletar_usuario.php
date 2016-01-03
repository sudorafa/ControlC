<?php

include('conecta.php');

session_start();

$codusuario = $_SESSION["codusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where codusuario = '$codusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$query = "delete from usuariosc where matricula = '$matricula1' and filial = '$filial_usuario_logado'";

if( mysql_query($query))
{
	echo "<script>window.alert('Deletado com Sucesso !')</script>";
	include("form_usuarios.php"); 
	
}
else
{
		echo "<script>window.alert('Algo Errado  no Query ! ')</script>";
		include("form_usuarios.php");  
	
}

?>

