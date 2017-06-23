<?php
session_start();
//$idusuario = $_SESSION["idusuario"];
######################################
//include("ip.php");
include('conecta.php');


$user = $_POST[user];
$passwd = $_POST[passwd];

if ($user <> "" and  $passwd <> "" ){
					
	$sql = "select * from usuariosc where user = '$user' and senha = '$passwd' ";
	$sql_2 = mysql_fetch_array(mysql_query($sql));

	if ($sql_2[descsetor] == "CPD" and $sql_2[bloqueio] == "nao"){
		$_SESSION[idusuario] = $sql_2[idusuario];
		$_SESSION[libera] = "ok";
		header("Location:form_home.php");

	}
	else{
		echo 
		"<script>window.alert('Acesso negado !')
			window.location.replace('login.php');
		</script>";	
	}

}
else{
	echo 
	"<script>window.alert('Campos Vazios !')
		window.location.replace('login.php');
	</script>";	
}	
?>

	
