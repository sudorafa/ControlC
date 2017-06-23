<?php
/*
	Query do Sistema de Controle de Coletores (Recuperado da migração do Intranet)
	Rafael Eduardo L - @sudorafa
	Recife, 22 de Setembro de 2016
*/
session_start();
include('../../global/conecta.php');
include('../../global/libera.php');

$coletorM = strtoupper($_POST["identificador1"]);

$nserie1 		=	$_POST["nserie"];
$descricao1 	=	$_POST["descricao"];  
$identificador	=	$coletorM;

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$query = "insert into coletores (filial, nserie, descricao, identificador, status, id_mov) values ('$filial_usuario_logado', '$nserie1', '$descricao1', '$identificador', 'CPD', '1')";
if( mysql_query($query)){}
else
{
	echo 
	"<script>window.alert('Algo Errado no Query !')
		window.location.replace('../view/form_coletores.php');
	</script>";
}

$query1 = "insert into mov_coletores (coletor, movimento, filial) values ('$identificador', 'LIVRE', '$filial_usuario_logado')";
if( mysql_query($query1)) {}
else {
	echo 
	"<script>window.alert('Algo Errado no Query 1')
		window.location.replace('../view/form_coletores.php');
	</script>";
}

$query2 = "insert into consertoc (identificador, situacao, filial) values ('$identificador', 'filial', '$filial_usuario_logado')";
if( mysql_query($query2)) {
	echo 
	"<script>window.alert('Salvo com Sucesso !')
		window.location.replace('../view/form_coletores.php');
	</script>";
}
else
{
	echo 
	"<script>window.alert('Algo Errado no Query 2')
		window.location.replace('../view/form_coletores.php');
	</script>";
	
}

?>