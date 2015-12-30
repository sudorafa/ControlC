<?php

include('conecta.php');

$nserie1 		=	$_POST["nserie"];
$descricao1 	=	$_POST["descricao"];  
$identificador	=	$_POST["identificador1"];

session_start();

$codusuario = $_SESSION["codusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where codusuario = '$codusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$query = "insert into coletores (filial, nserie, descricao, identificador) values ('$filial_usuario_logado', '$nserie1', '$descricao1', '$identificador')";

if( mysql_query($query))
{
	echo "<script>window.alert('Salvo com Sucesso !')</script>";
	include("form_coletores.php"); 
	
}
else
{
		echo "<script>window.alert('Algo Errado no Query ! ')</script>";
		include("form_coletores.php"); 
	
}

?>