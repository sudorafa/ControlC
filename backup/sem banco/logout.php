<?php
session_start();

$_SESSION[altoriza] = "false";
$_SESSION["codusuario"] = "false";
header("Location:login.php");

?>