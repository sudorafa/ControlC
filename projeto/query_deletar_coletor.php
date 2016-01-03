<?php

include('conecta.php');

$identificador = $_POST["identificador1"];

session_start();

$codusuario = $_SESSION["codusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where codusuario = '$codusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];


$query = "delete from coletores where identificador = '$identificador' and filial = '$filial_usuario_logado'"; 

if( mysql_query($query)){}
else
{
	echo "<script>window.alert('Algo Errado  no Query ! ')</script>";
	include("form_coletores.php");  
	
}

$query2 = "delete from consertoc where identificador = '$identificador' and situacao = 'filial'"; 
if( mysql_query($query2)){}
else
{
	echo "<script>window.alert('Algo Errado  no Query 2! ')</script>";
	include("form_coletores.php");  
	
}

$query3 = "delete from mov_coletores where coletor = '$identificador' and movimento = 'LIVRE'"; 
if( mysql_query($query3))
{
	echo "<script>window.alert('Deletado com Sucesso !')</script>";
	include("form_coletores.php"); 

}
else
{
	echo "<script>window.alert('Algo Errado  no Query 3! ')</script>";
	include("form_coletores.php");  
}

?>

