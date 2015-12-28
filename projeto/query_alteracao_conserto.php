<?php

include('conecta.php');

$ident_post1			=	$_POST["ident_post"];
$situacao1				= 	$_POST["situacao"];
$data_atualizacao1		= 	$_POST["data_atualizacao"];
$rma1					= 	$_POST["rma"];
$nfe1					= 	$_POST["nfe"];
$defeito1				= 	$_POST["defeito"];
$data_almox1			= 	$_POST["data_almox"];
$situacao_banco1		=	$_POST["situacao_banco"];
$id1					=	$_POST["id"];

session_start();

if($situacao1 == "filial")
			{
				if($situacao1 == $situacao_banco1)
				{
					echo "<script>window.alert('Status do Coletor ( filial ) Nada Salvo !')</script>";
					include("form_controles.php"); 
				}
				else
				{
					
					$query = "insert into consertoc (identificador, situacao) values ('$ident_post1', 'filial')";
					if( mysql_query($query))
					{
						echo "<script>window.alert('Finalizado Atualizacao de Status nos Registros deste Conserto !')</script>";
						include("form_controles.php"); 
						
					}
					else
					{
							echo "<script>window.alert('Algo Errado no Query ! ')</script>";
							include("form_controles.php"); 
						
					}
				}
			}
			else
			{
				$query = "update consertoc set situacao = '$situacao1',  atualizacao = '$data_atualizacao1', rma = '$rma1',  nfe = '$nfe1',  defeito = '$defeito1', almox = '$data_almox1' where identificador = '$ident_post1' and id = '$id1'"; 
				
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

