<?php

include('conecta.php');

session_start();

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$query = "delete from usuariosc where matricula = '$matricula1' and filial = '$filial_usuario_logado'";

if( mysql_query($query))
{
	echo 
	"<script>window.alert('Deletado com Sucesso !')
		window.location.replace('form_usuarios.php');
	</script>";	
}
else
{
	echo 
	"<script>window.alert('Algo Errado no Query !')
		window.location.replace('form_usuarios.php');
	</script>";	
}

?>

