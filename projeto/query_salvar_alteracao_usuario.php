<?php

include('conecta.php');

session_start();

$query = "update usuariosc set nomusuario = '$nomeusuaruio', datacadastro = '$datacadastro',  matricula = '$matricula',  senha = '$senha',  bloqueio = '$bloqueio',  descsetor = '$setor' where user = '$user1'"; 

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

