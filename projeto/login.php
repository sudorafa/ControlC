<?php
session_start();

//$codusuario = $_SESSION["codusuario"];


######################################

include('conecta.php');


?>

<html>
<head>
<link href="estilo.css" rel="stylesheet" type="text/css">
<title></title>
</head>
<body>
<table border="0"  width="800" align="center">
	<tr>
		<td rowspan="2">
		
		</td>
		</tr>
		<td width="60%" align="right" valign="baseline" >
		<font color="#006600" size="+3"> CONTROLE DE COLETORES </font><br>
		<font color="#006600" size="-1"> <b> Informatica Atacadao Recife - Filial 47 <br>
		
	
		<script language="JavaScript">

 // -- made by A1javascripts.com, please keep these credits when using this script
    days = new Array(7)
    days[1] = "Domingo";
    days[2] = "Segunda-feira";
    days[3] = "Terca-feira"; 
    days[4] = "Quarta-feira";
    days[5] = "Quinta-feira";
    days[6] = "Sexta-feira";
    days[7] = "Sabado";
    months = new Array(12)
    months[1] = "Janeiro";
    months[2] = "Fevereiro";
    months[3] = "Março";
    months[4] = "Abril";
    months[5] = "Maio";
    months[6] = "Junho";
    months[7] = "Julho";
    months[8] = "Agosto";
    months[9] = "Setembro";
    months[10] = "Outubro"; 
    months[11] = "Novembro";
    months[12] = "Dezembro";
    today = new Date(); day = days[today.getDay() + 1]
    month = months[today.getMonth() + 1]
    date = today.getDate()
    year=today.getYear(); 
if (year < 2005)
year = year + 1900;
    document.write ("<font size=-1 color=ff6600> "+ day +
    ", " + date + " " + month + ", " + year + "</font>")
    // -- end hiding 
    	
	</script>
	
		
	<br>
		
	</td>
	</tr>
	
	<table border ="5" width="80%" height="40" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<br>
		<td align="center" colspan="3" bgcolor="#ffcc99">
			<font color="#006600"> <b> Bem Vindo ! </b><font color="#006600"> 
		</td>
	</tr>	
	</table>
	<br>

</table>
	
	<br>

<table border="0" align="center">
	<tr>
		<form action="query_login.php" name="cadastro" method="post">
		<td align="right">Login:
		<td><input type="text" name="user" size="15">
	<tr>
		<td align="right">Passwd: &nbsp;
		<td><input type="password" name="passwd" size="15">
	<tr align="center">
		<td colspan="2"> <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <input type="submit"  value=" entrar ">
		</form>
	</tr>
</table>


</body>
</html>
