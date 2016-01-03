<?php
session_start();

$_SESSION[altoriza] = "false";
$_SESSION["idusuario"] = "false";
header("Location:login.php");

?>