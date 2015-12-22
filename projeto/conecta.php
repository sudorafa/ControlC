<?php
$dbname="atacadao";
$usuario="filial47";
$password="senhafilial";

//1º passo - Conecta ao servidor MySQL

if(!($id = mysql_connect("localhost",$usuario,$password))) {

echo "<p align=\"center\"><big><strong>Não foi possível
estabelecer uma conexão com o gerenciador MySQL. Favor
Contactar o Administrador.
</strong></big></p>";
exit;
}

//2º passo - Seleciona o Banco de Dados

if(!($con=mysql_select_db($dbname,$id))) {

echo " <p align=\"center\"><big><strong>Não foi possível
estabelecer uma conexão com o gerenciador MySQL. Favor
Contactar o Administrador.
</strong></big></p>";
exit;
}
?>
