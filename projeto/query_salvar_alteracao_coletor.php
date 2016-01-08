<?php

include('conecta.php');

$nserie1			= 	$_POST["nserie"];
$descricao1			= 	$_POST["descricao"];
$status1			= 	$_POST["status"];
$identificador		=	$_POST["identificador1"];

session_start();

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$query = "update coletores set nserie = '$nserie1', descricao = '$descricao1',  status = '$status1' where identificador = '$identificador' and filial = '$filial_usuario_logado'";

if( mysql_query($query))
{
	echo 
	"<script>window.alert('Salvo com Sucesso !')
		window.location.replace('form_coletores.php');
	</script>";	
}
else
{
	echo 
	"<script>window.alert('Algo Errado no Query !')
		window.location.replace('form_coletores.php');
	</script>";	
}

?>

