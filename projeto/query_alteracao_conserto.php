<?php

include('conecta.php');

$ident_post1			=	$_POST["ident_post"];
$situacao1				= 	$_POST["situacao"];
$data_atualizacao1		= 	$_POST["data_atualizacao"];
$rma1					= 	$_POST["rma"];
$nfe1					= 	$_POST["nfe"];
$defeito1				= 	$_POST["defeito"];
$data_almox1			= 	$_POST["data_almox"];

session_start();

if($situacao1 == "filial")
			{
				$query = "update consertoc set situacao = 'filial',  atualizacao = '', rma = '',  nfe = '',  defeito = '', almox = '' where identificador = '$ident_post1'"; 
				if( mysql_query($query))
				{
					echo "<script>window.alert('Status Deste Coletor Zerado !')</script>";
					include("form_controles.php"); 
					
				}
				else
				{
						echo "<script>window.alert('Algo Errado no Query ! ')</script>";
						include("form_controles.php"); 
					
				}
			}
			else
			{
				$query = "update consertoc set situacao = '$situacao1',  atualizacao = '$data_atualizacao1', rma = '$rma1',  nfe = '$nfe1',  defeito = '$defeito1', almox = '$data_almox1' where identificador = '$ident_post1'"; 

				if( mysql_query($query))
				{
					echo "<script>window.alert('Status Conserto Atualizados com Sucesso !')</script>";
					include("form_controles.php"); 
					
				}
				else
				{
						echo "<script>window.alert('Algo Errado no Query ! ')</script>";
						include("form_controles.php"); 
					
				}
			}




?>

