<?php
/*
	Query do Sistema de Controle de Coletores (Recuperado da migração do Intranet)
	Rafael Eduardo L - @sudorafa
	Recife, 22 de Setembro de 2016
*/
session_start();
include('../../global/conecta.php');
include('../../global/libera.php');

$idusuario = $_SESSION["idusuario"];
$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
$filial_usuario_logado = $dados_usuario_logado[filial];

$busca_coletores = mysql_query("select * from coletores where filial = '$filial_usuario_logado' order by id desc limit 1");
$dados_busca_coletores = mysql_fetch_array($busca_coletores);
$ultimo_id = $dados_busca_coletores[id];

$i = 1;

while ($i <= $ultimo_id){
	$busca = mysql_query("select * from coletores where id = '$i' and filial = '$filial_usuario_logado'");
	$dados_busca = mysql_fetch_array($busca);
	$id1 = $dados_busca[id];
	
	$query = "update coletores set id_mov = '$i' where id = '$id1' and filial = '$filial_usuario_logado'";
	if( mysql_query($query)) {} 
	else {
		echo 
		"<script>window.alert('Algo Errado no Query')
			window.location.replace('../view/form_coletores.php');
		</script>";
	}
	$i = $i + 1;
	
}
echo 
"<script>window.alert('Redefinido com Sucesso !')
	window.location.replace('../home.php');
</script>";


?>

