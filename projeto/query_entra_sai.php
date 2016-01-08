<?php

include('conecta.php');


//uso/devolucao
$movimento_user1	= 	$_POST["movimento_post"];
$data_devolucao1	=   $_POST["data_devolucao"];
$hora_devolucao1	=   $_POST["hora_devolucao"];
$obs_devolucao1		=   $_POST["obs_devolucao"];
$id1				=	$_POST["id"];
$coletor_uso1		=	$_POST["coletor_uso"];

//Saida
$matricula1		=	$_POST["matricula"];
$coletor1		=	$_POST["coletor"];
$nome1			=	$_POST["nome"];
$setor1			=	$_POST["setor"];
$data_saida1	=	$_POST["data_saida"];
$hora_saida1	=	$_POST["hora_saida"];
$obs_saida1		=	$_POST["obs_saida"];

session_start();

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

if ($movimento_user1 == "USO"){

	$query = "update mov_coletores set data_devolucao = '$data_devolucao1', hora_devolucao = '$hora_devolucao1', obs_devolucao = '$obs_devolucao1', movimento = 'ENTREGUE' where id = '$id1' and filial = '$filial_usuario_logado'";
	if( mysql_query($query)) {} 
	else {
		echo 
		"<script>window.alert('Algo Errado no Query')
			window.location.replace('form_home.php');
		</script>";
	}
	
	$query1 = "insert into mov_coletores (coletor, movimento, filial) values ('$coletor_uso1', 'LIVRE', '$filial_usuario_logado')";
	if( mysql_query($query1)) {}
	else {
		echo 
		"<script>window.alert('Algo Errado no Query 1')
			window.location.replace('form_home.php');
		</script>";
	}
	
	$busca = mysql_query("select * from mov_coletores where coletor = '$coletor_uso1' and movimento = 'LIVRE' and filial = '$filial_usuario_logado' order by id desc limit 1");
	$dados_busca = mysql_fetch_array($busca);
	// salva em id_mov o id buscado
	$id2 = $dados_busca[id];
	
	// Na tabela COLETORES atualiza o ID_MOV com o id buscado na tabela MOV
	$query2 = "update coletores set id_mov = '$id2', status = 'CPD' where identificador = '$coletor_uso1' and filial = '$filial_usuario_logado'";
	if( mysql_query($query2)) {
		echo 
		"<script>window.alert(' Devolucao Realizada com sucesso ! ')
			window.location.replace('form_home.php');
		</script>";
	}
	else{
		echo 
		"<script>window.alert('Algo Errado no Query 2')
			window.location.replace('form_home.php');
		</script>";
	
	}

}
else{
	
	$query3 = "update mov_coletores set matricula_user = '$matricula1', nome_user = '$nome1', setor_user = '$setor1', data_saida = '$data_saida1', hora_saida = '$hora_saida1', obs_saida = '$obs_saida1', movimento = 'USO' where coletor = '$coletor1' and movimento = 'LIVRE' and filial = '$filial_usuario_logado'";
	if( mysql_query($query3)) {} 
	else {
		echo 
		"<script>window.alert('Algo Errado no Query 3')
			window.location.replace('form_home.php');
		</script>";
	}
	
	$query4 = "update coletores set status = '$setor1' where identificador = '$coletor1' and filial = '$filial_usuario_logado'";
	if( mysql_query($query4)) {
		echo 
		"<script>window.alert(' Entrega Realizada com sucesso ! ')
			window.location.replace('form_home.php');
		</script>";
	}
	else{
		echo 
		"<script>window.alert('Algo Errado no Query 4')
			window.location.replace('form_home.php');
		</script>";
	
	}
	
	
}









?>

