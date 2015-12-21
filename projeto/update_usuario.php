<?php
include('conecta.php');
session_start();
$_SESSION["matricula"];	
$cod = $_SESSION["id_usuario"]; 	
$setor = $_SESSION["codsetor"];
$data = $data[2]."/".$data[1]."/".$data[0];
$bloqueio = $_SESSION["bloqueio"];
$perfil = $_SESSION["perfil"];
$senha = $_SESSION["senha"];
$_SESSION["datacadastro"] 	= $_POST[datacadastro];

//mysql_query("update usuarios set matricula = '$matricula', codsetor = '$codsetor',  datanasc = '$data',  cargo = '$cargo',  bloqueio = '$bloqueio',  perfil = '$perfil',  senha = '$senha' where codusuario = '$cod' ") or die( "alteração não realizada");

$query = "update usuariosc set nomusuario = '$nomusuario', codsetor = '$codsetor', perfil = '$perfil', senha = '$senha', bloqueio = '$bloqueio', matricula = '$matricula', datacadastro = '$datacadastro' where codusuario = '$cod'"; 

if( mysql_query($query))
{
	echo "<script>window.alert('SALVO COM SUCESSO !!!! ')</script>";
	
	
}
else
{
		echo "<script>window.alert('ALGO INCORRETO !!!! ')</script>";
	
}
?>

<a href="form_usuarios.php"><h1>VOLTAR</h1></a>

	