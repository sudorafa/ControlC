<?php
session_start();
//$codusuario = $_SESSION["codusuario"];
######################################
//include("ip.php");
include('conecta.php');


$user = $_POST[user];
$passwd = $_POST[passwd];

if ($user <> "" and  $passwd <> "" ){
					
					$sql = "select * from usuariosc where user = '$user' and senha = '$passwd' ";
					$sql_2 = mysql_fetch_array(mysql_query($sql));
			
					if ($sql_2[descsetor] == "CPD" or $sql_2[descsetor] == "GERENCIA"){
								$_SESSION[codusuario] = $sql_2[codusuario];
								$_SESSION[altoriza] = "ok";
								header("Location:form_home.php");

					}else{
 		
							echo "<script>window.alert('usuario ou senha invalida !')</script>";
							include("login.php");
						
					}


}
else{
	echo "<script>window.alert('Campos Vazios !')</script>";
	include("login.php");
	
				

}	
?>

	
