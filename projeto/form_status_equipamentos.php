<?php
session_start();
	$codusuario = $_SESSION["codusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('altoriza.php');
	
	include('conecta.php');
	
	/*if ( $_SESSION[altoriza] == "ok" ){
		include("index.php");
	
	}*/
?>
						
<html>
<head>

<link href="estilo.css" rel="stylesheet" type="text/css">
</head>
</head>
<body onLoad="document.form_home.matricula.focus()"> 
<script language="javascript" src="script/ajax.js"></script> 
<script language="javascript" src="script/fmenu.js"></script>
<script language="javascript" src="script/fcampo.js"></script>



<br>
<h2 align="center"> <font color="336699"> Status dos Equipamentos </font></h2> 


<table cellpadding="0" border="0" width="80%" align="center">
	<td> 
		<table cellpadding="0" border="1" width="99%" height="26" >
			<tr>
				<td align="center" > SETOR LOJA (4 / 22) </td>
			</tr>
		</table >
		<table cellpadding="0" border="1" width="49%" height="80" align="center" style="float:left;">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SAIDAS DA MANHA </td>
		</tr>
		<tr>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
		</tr>

		<tr>
			<td color="336699" align="center" width="90" height="26"> 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26"> Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		<tr>
			<td color="336699" align="center" width="90" height="26" > 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26" > Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>		
		
		<tr>
			<td color="336699" align="center" width="90" height="26" > 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26" > Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		</table>
		
		<table cellpadding="0" border="1" width="49%" height="80" align="center">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SAIDAS DA TARDE </td>
		</tr>
		<tr>
			<td class="simples_2" width="90" height="26" height="26" > DATA</td>
			<td class="simples_2" width="300" height="26" > NOME </td>
			<td class="simples_2" width="50" height="26" > COLT. </td>
		</tr>

		<tr>
			<td color="336699" align="center" width="90" height="26" > 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26" > Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		</table>
		<br>
	</td>
</tr>
</table>

<br>

<table cellpadding="0" border="0" width="80%" align="center">
<tr> 
	<td> 
		<table cellpadding="0" border="1" width="49%" height="80" align="center" style="float:left;">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR PREVENCAO (3 / 4) </td>
		</tr>
		<tr>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
		</tr>

		<tr>
			<td color="336699" align="center" width="90" height="26"> 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26"> Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		<tr>
			<td color="336699" align="center" width="90" height="26" > 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26" > Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>		
		
		<tr>
			<td color="336699" align="center" width="90" height="26" > 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26" > Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		</table>
		
		<table cellpadding="0" border="1" width="49%" height="80" align="center">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR FRIOS (1 / 4) </td>
		</tr>
		<tr>
			<td class="simples_2" width="90" height="26" height="26" > DATA</td>
			<td class="simples_2" width="300" height="26" > NOME </td>
			<td class="simples_2" width="50" height="26" > COLT. </td>
		</tr>

		<tr>
			<td color="336699" align="center" width="90" height="26" > 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26" > Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		</table>
		<br>
	</td>
</tr>
</table>

<br>

<table cellpadding="0" border="0" width="80%" align="center">
<tr> 
	<td>
		<table cellpadding="0" border="1" width="49%" height="80" align="center" style="float:left;">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR F. CAIXA (3 / 3) </td>
		</tr>
		<tr>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
		</tr>

		<tr>
			<td color="336699" align="center" width="90" height="26"> 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26"> Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		<tr>
			<td color="336699" align="center" width="90" height="26" > 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26" > Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>		
		
		<tr>
			<td color="336699" align="center" width="90" height="26" > 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26" > Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		</table>
		
		<table cellpadding="0" border="1" width="49%" height="80" align="center">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR DEPOSITO (1 / 6) </td>
		</tr>
		<tr>
			<td class="simples_2" width="90" height="26" height="26" > DATA</td>
			<td class="simples_2" width="300" height="26" > NOME </td>
			<td class="simples_2" width="50" height="26" > COLT. </td>
		</tr>

		<tr>
			<td color="336699" align="center" width="90" height="26" > 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26" > Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		</table>
		<br>
	</td>
</tr>
</table>

<br>

<table cellpadding="0" border="0" width="80%" align="center" >
<tr> 
	<td>
		<table cellpadding="0" border="1" width="49%" height="80" align="center"style="float:left;">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR GERENCIA (1 / 1) </td>
		</tr>
		<tr>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
		</tr>

		<tr>
			<td color="336699" align="center" width="90" height="26"> 2015-12-16 </td>
			<td color="336699" align="center" width="300" height="26"> Rafael Eduardo Lima dos Santos</td>
			<td color="336699" align="center" width="50" height="26" > SB52 </td>
		</tr>
		</table>
		
		<table cellpadding="0" border="1" width="49%" height="80" align="center">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; CONSERTO (1) </td>
		</tr>
		<tr>
			<td class="simples_2" width="90" height="26" > N. SERIE </td>
			<td class="simples_2" width="300" height="26" > DEFEITO </td>
			<td class="simples_2" width="50" height="26" > COLT. </td>
		</tr>

		<tr>
			<td color="336699" align="center" width="90" height="26" > 445151518541 </td>
			<td color="336699" align="center" width="300" height="26" > SHVBDWYAVBDSA </td>
			<td color="336699" align="center" width="50" height="26" > SBXX </td>
		</tr>
		</table>
		<br>
	</td>
</tr>
</table>
