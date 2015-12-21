<?php
session_start();
//$codusuario = $_SESSION["codusuario"];
######################################
//include("ip.php");
include('../conecta.php');


$login = $_POST[login];
$passwd = $_POST[passwd];

if ($login <> "" and  $passwd <> "" ){
					
					$sql = "select * from usuarios where login = '$login' and senha = '$passwd' ";
					$sql_2 = mysql_fetch_array(mysql_query($sql));
			
					if ($sql_2[perfil] == 4 or $sql_2[perfil] == 3){
								$_SESSION[codusuario] = $sql_2[codusuario];
								$_SESSION[altoriza] = "ok";
								header("Location:index.php");

					}else{
 		
						echo
						"<script>
							window.alert('Usuario ou senha invalidos ou sem permissão !!!');
						</script>";
						header("Location:login.php");						
						
					}


}
else{
	echo 
	"<script>
		window.alert('Usuario ou senha invalidos ou sem permissão !!!');
	</script>";
	header("Location:login.php");						
				

}	
?>

	
