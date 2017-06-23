<?php
/*
	Query do Sistema de Controle de Coletores (Recuperado da migração do Intranet)
	Rafael Eduardo L - @sudorafa
	Recife, 22 de Setembro de 2016
*/
session_start();
include('../../global/conecta.php');
include('../../global/libera.php');

$identificador = $_POST["identificador1"];

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];


$query = "delete from coletores where identificador = '$identificador' and filial = '$filial_usuario_logado'"; 

if( mysql_query($query)){}
else
{
	echo 
	"<script>window.alert('Algo Errado  no Query !')
		window.location.replace('../view/form_coletores.php');
	</script>";	
}

$query2 = "delete from consertoc where identificador = '$identificador' and situacao = 'filial' and filial = '$filial_usuario_logado'";
if( mysql_query($query2)){}
else
{
	echo 
	"<script>window.alert('lgo Errado  no Query 2 !')
		window.location.replace('../view/form_coletores.php');
	</script>";	
}

$query3 = "delete from mov_coletores where coletor = '$identificador' and movimento = 'LIVRE' and filial = '$filial_usuario_logado'";
if( mysql_query($query3))
{
	echo 
	"<script>window.alert('Deletado com Sucesso !')
		window.location.replace('../view/form_coletores.php');
	</script>";	
}
else
{
	echo 
	"<script>window.alert('Algo Errado  no Query 3 !')
		window.location.replace('../view/form_coletores.php');
	</script>";	 
}

?>

