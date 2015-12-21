<?php
session_start();

if ($_SESSION[altoriza] <> "ok"){
		header("Location:login.php");
		
	}
	
	
?>