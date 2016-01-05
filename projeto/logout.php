<?php
session_start();

$_SESSION[libera] = "false";
$_SESSION["idusuario"] = "false";
header("Location:login.php");

?>