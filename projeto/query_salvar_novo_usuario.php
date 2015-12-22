<?php

include('conecta.php');

$nomeusuaruio1 	=	$_POST["nomeusuaruio"];
$datacadastro1 	=	$_POST["datacadastro"];  
$matricula1 	=	$_POST["matricula"];  
$senha1 		=	$_POST["senha"];  
$bloqueio1 		=	$_POST["bloqueio"];  
$setor1 		=	$_POST["setor"];  
$user1			=	$_POST["user"];

session_start();

$query = "insert into usuariosc values(null, '$nomeusuaruio1', '$datacadastro1', '$matricula1', '$user1', '$senha1', '$bloqueio1', '$setor1')";

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