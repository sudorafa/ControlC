<?php

include('conecta.php');

$tipo1		= $_GET[tipo];
if ($tipo == "lista"){
	$movimento	= $_GET[movimento];
	$coletor1	= $_GET[coletor];
}
else{
	$coletor1 	= $_POST["coletor"];
}


session_start();

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$data = date('Y/m/d');
$hora = date('H:i');

// busca dados do coletor
$busca = mysql_query("select * from mov_coletores where coletor = '$coletor1' and movimento = 'USO' and filial = '$filial_usuario_logado' order by id desc limit 1");
$dados_busca = mysql_fetch_array($busca);

$movimento 	= $dados_busca[movimento];
$user		= $dados_busca[nome_user];
$ncoletor	= $dados_busca[coletor];

if ($movimento == "USO"){
		
	$query = "update mov_coletores set data_devolucao = '$data', hora_devolucao = '$hora', movimento = 'ENTREGUE' where coletor = '$coletor1' and filial = '$filial_usuario_logado'";
	if( mysql_query($query)) {} 
	else {
		echo 
		"<script>window.alert('Algo Errado no Query')
			window.location.replace('form_home.php');
		</script>";
	}
	
	$query1 = "insert into mov_coletores (coletor, movimento, filial) values ('$coletor1', 'LIVRE', '$filial_usuario_logado')";
	if( mysql_query($query1)) {}
	else {
		echo 
		"<script>window.alert('Algo Errado no Query 1')
			window.location.replace('form_home.php');
		</script>";
	}
	
	$busca = mysql_query("select * from mov_coletores where coletor = '$coletor1' and movimento = 'LIVRE' and filial = '$filial_usuario_logado' order by id desc limit 1");
	$dados_busca = mysql_fetch_array($busca);
	// salva em id_mov o id buscado
	$id1 = $dados_busca[id];
	
	// Na tabela COLETORES atualiza o ID_MOV com o id buscado na tabela MOV
	$query2 = "update coletores set id_mov = '$id1', status = 'CPD' where identificador = '$coletor1' and filial = '$filial_usuario_logado'";
	if( mysql_query($query2)) {
		echo 
		"<script>window.alert(' Devolucao Coletor: $ncoletor - $user - Realizada com sucesso ! ')
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
	echo 
	"<script>window.alert('Não existe pendencia para este coletor !')
		window.location.replace('form_home.php');
	</script>";
}


?>