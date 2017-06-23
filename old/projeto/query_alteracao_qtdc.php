<?php

include('conecta.php');

$qtd_loja_atual1		= 	$_POST["qtd_loja_atual"];
$qtd_prev_atual1		= 	$_POST["qtd_prev_atual"];
$qtd_fcx_atual1			= 	$_POST["qtd_fcx_atual"];
$qtd_deposito_atual1	= 	$_POST["qtd_deposito_atual"];
$qtd_gerencia_atual1	= 	$_POST["qtd_gerencia_atual"];
$qtd_frios_atual1		= 	$_POST["qtd_frios_atual"];
$qtd_conserto_atual1	=	$_POST["qtd_conserto_atual"];

session_start();

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$query = "update qtdc set qtd_loja = '$qtd_loja_atual1',  qtd_prev = '$qtd_prev_atual1',  qtd_fcx = '$qtd_fcx_atual1',  qtd_deposito = '$qtd_deposito_atual1',  qtd_gerencia = '$qtd_gerencia_atual1', qtd_frios = '$qtd_frios_atual1', qtd_conserto = '$qtd_conserto_atual1' where filial = '$filial_usuario_logado'"; 

if( mysql_query($query))
{
	echo 
	"<script>window.alert('Quantidades salvas com Sucesso !')
		window.location.replace('form_controles.php');
	</script>";	
	
}
else
{
	echo 
	"<script>window.alert('Algo Errado no Query !')
		window.location.replace('form_controles.php');
	</script>";	
}

?>

