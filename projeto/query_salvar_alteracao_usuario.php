<?php

include('conecta.php');

$nomeusuaruio1	= 	$_POST["nomeusuaruio"];
$datacadastro1	= 	$_POST["datacadastro"];
$matricula1		= 	$_POST["matricula"];
$senha1			= 	$_POST["senha"];
$bloqueio1		= 	$_POST["bloqueio"];
$setor1			= 	$_POST["setor"];
$user			=	$_POST["user1"];

session_start();

$query = "update usuariosc set nomusuario = '$nomeusuaruio1', datacadastro = '$datacadastro1',  matricula = '$matricula1',  senha = '$senha1',  bloqueio = '$bloqueio1',  descsetor = '$setor1' where user = '$user'"; 

if( mysql_query($query))
{
	echo "<script>window.alert('Salvo com Sucesso !')</script>";
	include("form_usuarios.php"); 
	
}
else
{
		echo "<script>window.alert('Algo Errado no Query ! ')</script>";
		include("form_usuarios.php"); 
	
}

?>

