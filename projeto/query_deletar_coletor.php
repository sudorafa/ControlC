<?php

include('conecta.php');

session_start();

$query = "delete from coletores where identificador = '$identificador1' and filial = '$filial_usuario_logado'"; 

if( mysql_query($query))
{
	echo "<script>window.alert('Deletado com Sucesso !')</script>";
	include("form_coletores.php"); 
	
}
else
{
		echo "<script>window.alert('Algo Errado  no Query ! ')</script>";
		include("form_coletores.php");  
	
}

?>

