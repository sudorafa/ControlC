<?php
///////////////////////////////////////////////////////
//////////////  validando acesso de usuário
//////////////////////////////////////////////////////
session_start();
include('../conecta.php');
include('altoriza.php');
include("ip.php");

$codusuario = $_SESSION["codusuario"];
$nomusuario = mysql_fetch_array(mysql_query("select nomusuario from usuarios where codusuario = '$codusuario'"));

////////////////////////////////////////////////////////
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
		<font color="#006600"> <B> Bem Vindo: <font color="#006600"> <u> <?php echo Strtoupper($nomusuario[nomusuario]) ?>  </font> | <a href="logout.php"> SAIR </a>	<br>
	
		<script language="JavaScript">

 // -- made by A1javascripts.com, please keep these credits when using this script
    days = new Array(7)
    days[1] = "Domingo";
    days[2] = "Segunda-feira";
    days[3] = "Terça-feira"; 
    days[4] = "Quarta-feira";
    days[5] = "Quinta-feira";
    days[6] = "Sexta-feira";
    days[7] = "Sábado";
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
		<font size="-1" color="#ffffff">
		&nbsp; &nbsp;<b><a class="linkbanner" href="form_home.php">HOME</a>&nbsp; &nbsp; | 
		&nbsp; &nbsp;<b><a class="linkbanner" href="form_coletores.php">COLETORES</a>&nbsp; &nbsp; | 
		&nbsp; &nbsp;<b><a class="linkbanner" href="form_usuarios.php">USUARIOS</a>&nbsp; &nbsp;|
		&nbsp; &nbsp;<b><a class="linkbanner" href="form_auditorias.php">AUDITORIAS</a>&nbsp; &nbsp; |
		&nbsp; &nbsp;<b><a class="linkbanner" href="form_controles.php">CONTROLES</a>&nbsp; &nbsp; |
		&nbsp; &nbsp;<b><a class="linkbanner" href="form_status_detalhado.php"> STATUS DETALHADO </a>&nbsp; &nbsp;
		</td>
	</tr>	
	</table>
	<br>

</table>

</body>
</html>
