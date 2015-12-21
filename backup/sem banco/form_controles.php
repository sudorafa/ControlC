<?php
session_start();
	$codusuario = $_SESSION["codusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('altoriza.php');
	
	include('../conecta.php');
	
	if ( $_SESSION[altoriza] == "ok" ){
		include("index.php");
	
	}
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

<h2 align="center"> <font color="336699"> Controle dos Coletores (Setores / Conserto) </font></h2> 

<table border ="1" width="80%" height="100" align="center" cellpadding="0" >
	<tr>
		
		<td width="40%" align="center" >
		<br>
			<table cellpadding="0" border="0" width="270" height="100" align="center" >
			<tr >
				<h2> <font color="336699"> Gerenciamento </font></h2> 
				<td	colspan="2" align="right" >
					<label> <font color="336699"> LOJA: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" </label> &nbsp;
					<label> <font color="336699"> Qtd Atual: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" readonly="false" </label> &nbsp; 
				<br> <br>
					<label> <font color="336699"> PREVENCAO: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" </label> &nbsp;
					<label> <font color="336699"> Qtd Atual: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" readonly="false" </label> &nbsp; 
				<br> <br>
					<label> <font color="336699"> F. CAIXA: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" </label> &nbsp;
					<label> <font color="336699"> Qtd Atual: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" readonly="false" </label> &nbsp; 
				<br> <br>
					<label> <font color="336699"> DEPOSITO: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" </label> &nbsp;
					<label> <font color="336699"> Qtd Atual: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" readonly="false" </label> &nbsp; 
				<br> <br>
					<label> <font color="336699"> GERENCIA: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" </label> &nbsp;
					<label> <font color="336699"> Qtd Atual: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" readonly="false" </label> &nbsp; 
				<br> <br>
					<label> <font color="336699"> CONSERTO: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" readonly="false" </label> &nbsp;
					<label> <font color="336699"> Qtd Atual: </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" readonly="false" </label> &nbsp; 
				<br> <br>
					<label> <font color="336699"> Total : </label> &nbsp;
					<label> <input name="nserie" type="text" size="2" maxlength="2" readonly="false" </label> &nbsp; 
				<tr input align="center">
				<td>
				<br> 
					<input align="center" type="submit" name="atualizar" value="atualizar">
					<br> <br> <br>
				</td>
				</tr>
			</tr>	
			</table>
			</td>
		
		</td>
	
	<td width="40%" height="100" align="center" >
		<br>
		<h2> <font color="336699"> Alterar Status Conserto </font></h2>
			<label> <font color="336699"> Coletor : &nbsp; </label> 		
			<label>	<input name="coletor" type="text" size="4" maxlength="4" > </label> 
			&nbsp; &nbsp; <input type="submit" name="buscar" value="buscar">
			<br> <br> <br> <br>
		<table cellpadding="0" border="0" width="99%" height="100" align="center" >
			<tr>
			<td	align="right">
				<br>
				<label> <font color="336699"> Num Serie: </label> 
				<label> <input name="nserie" type="text" size="20" maxlength="20" readonly="false" </label> &nbsp; 
				<label> <font color="336699">  Descricao: </label> 
				<label> <input name="descricao" type="text" size="10" maxlength="10" readonly="false" </label> &nbsp; 
			<br> <br>
				<label> <font color="336699">  Status: </label> 
				<select size="1" name="status">
				<option value="cons/bom"> cons/bom </option>
				</select> &nbsp; 
				<label> <font color="336699">  RMA: </label> 
				<label> <input name="rma" type="text" size=7" maxlength="7" </label> &nbsp; &nbsp; 
				<label> <font color="336699">  NFe: </label> 
				<label> <input name="nfe" type="text" size="11" maxlength="11" </label> &nbsp; 
			<br> <br>
				<label> <font color="336699">  Defeito: </label> 
				<label> <input name="defeito" type="text" size="25" maxlength="25" </label> &nbsp;
				<label> <font color="336699">  Almox </label> 
				<label> <input name="data_almox" type="text"  value="<?php echo  date('d/m/Y')?>" size=10 maxlength="10" > </label> &nbsp;
			<br> <br> <br> <br> <br> <br>
			</td>
				<tr>
					<td	align="center">
						<input align="center" type="submit" name="atualizar" value="atualizar">
						<br> <br> <br>
					</td>
				</tr>
			</tr>	
			</table>
			
	</td>
	</tr>
</table> 

<br> <br> <br>

</body>
</html>