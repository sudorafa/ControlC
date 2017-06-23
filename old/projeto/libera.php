<?php
session_start();

if ($_SESSION[libera] <> "ok"){
		header("Location:login.php");
		
	}
	
	
?>