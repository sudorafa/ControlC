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

$query = "update qtdc set id = '1', qtd_loja = '$qtd_loja_atual1',  qtd_prev = '$qtd_prev_atual1',  qtd_fcx = '$qtd_fcx_atual1',  qtd_deposito = '$qtd_deposito_atual1',  qtd_gerencia = '$qtd_gerencia_atual1', qtd_frios = '$qtd_frios_atual1', qtd_conserto = '$qtd_conserto_atual1'"; 

if( mysql_query($query))
{
	echo "<script>window.alert('Quantidades salvas com Sucesso !')</script>";
	include("form_controles.php"); 
	
}
else
{
		echo "<script>window.alert('Algo Errado no Query ! ')</script>";
		include("form_controles.php"); 
	
}

?>

