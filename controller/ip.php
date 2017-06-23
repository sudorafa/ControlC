<?php
//session_start();
include('conecta.php');
$idusuario = $_SESSION["idusuario_etiq"];
$dia = date('d/m/Y');
$hora = date('H:i');
$ip = $_SERVER['REMOTE_ADDR'];
$nome = gethostbyaddr($ip);
$espaco = " &nbsp &nbsp &nbsp &nbsp ";

$nomusuario = mysql_fetch_array(mysql_query("select nomusuario from usuariosc where idusuario = '$idusuario'"));
// Abre conexão com o arquivo 
    $fp = fopen("rafa.html", "at");

    // Escreve no arquivo a string montada 
    fwrite($fp,  $dia .$espaco .$hora .  $espaco .$ip . $espaco . $nome .  $espaco . $idusuario . $espaco . $nomusuario[nomusuario] .   "<br>");
    
     // fwrite($fp,  $dia .$espaco .$hora .  $espaco .$ip . $espaco . $nome .  "<br>");

    // fecha conexão 
    fclose($fp);
	
	

?>

