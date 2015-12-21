<?php
//session_start();
include('../conecta.php');
$codusuario = $_SESSION["codusuario"];
$dia = date('d/m/Y');
$hora = date('H:i');
$ip = $_SERVER['REMOTE_ADDR'];
$nome = gethostbyaddr($ip);
$espaco = " &nbsp &nbsp &nbsp &nbsp ";

$nomusuario = mysql_fetch_array(mysql_query("select nomusuario from usuarios where codusuario = '$codusuario'"));
// Abre conexão com o arquivo 
    $fp = fopen("log_ca50.html", "at");

    // Escreve no arquivo a string montada 
    fwrite($fp,  $dia .$espaco .$hora .  $espaco .$ip . $espaco . $nome .  $espaco . $codusuario . $espaco . $nomusuario[nomusuario] .   "<br>");
    
     // fwrite($fp,  $dia .$espaco .$hora .  $espaco .$ip . $espaco . $nome .  "<br>");

    // fecha conexão 
    fclose($fp);
	
	

?>

