<?php
session_start();

//$codusuario = $_SESSION["codusuario"];


######################################

include('../conecta.php');


?>
<table border="0" align="center">
	<tr>
		<form action="login_2.php" name="cadastro" method="post">
		<td align="right">Login:
		<td><input type="text" name="login" size="15">
	<tr>
		<td align="right">Passwd: &nbsp;
		<td><input type="password" name="passwd" size="15">
	<tr>
		<td colspan="2" align="center"><BR><input type="submit"  value=" entrar ">
		</form>
	</tr>
</table>