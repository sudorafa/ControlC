<?php
$dbname="atacadao";
$usuario="filial47";
$password="senhafilial";

//1� passo - Conecta ao servidor MySQL

if(!($id = mysql_connect("localhost",$usuario,$password))) {

echo "<p align=\"center\"><big><strong>N�o foi poss�vel
estabelecer uma conex�o com o gerenciador MySQL. Favor
Contactar o Administrador.
</strong></big></p>";
exit;
}

//2� passo - Seleciona o Banco de Dados

if(!($con=mysql_select_db($dbname,$id))) {

echo " <p align=\"center\"><big><strong>N�o foi poss�vel
estabelecer uma conex�o com o gerenciador MySQL. Favor
Contactar o Administrador.
</strong></big></p>";
exit;
}
?>
