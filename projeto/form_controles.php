<?php

session_start();
	$codusuario = $_SESSION["codusuario"];
	$mensagem = $_SESSION["mensagem"];
				
	include('altoriza.php');
	
	include('conecta.php');
	
	if ( $_SESSION[altoriza] == "ok" ){
	
		include('conecta.php');
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
		
		<td width="39%" align="center" height="100">
		
			<table cellpadding="0" border="0" width="60%" height="100" align="center" >
			<tr>
				<h2> <font color="336699"> Gerenciamento </font></h2> 
			
			<?php
				$setorc = mysql_query("select * from setorc");
															
				if($setorc)
				{
				
					while ($dados_setorc = mysql_fetch_array($setorc))
					{
			?>
						
					<tr height="30" >
						<td align="right">
							<label> <font color="336699"> <?php echo $dados_setorc[descsetor]?> </label> &nbsp;
						</td>
						<td>
							<label> <input name="qtd_loja_total" value="<?php echo $dados_setorc[qtdtotal]?>" type="text" size="2" maxlength="2" </label> &nbsp;
						</td>
					</tr>
			<?php
					}
				};
			?>
				
			</tr>
			<tr>
				<td height="30" width="50%" align="right">
					<label> <font color="336699"> Total </label> &nbsp;
				</td>
				<td>
					<label> <input name="qtd_loja_total" type="text" size="2" maxlength="2" readonly="false" </label> &nbsp;
				</td>
			
			</tr>	
			</table>
			
				<br> <br>
					 &nbsp; &nbsp; &nbsp;
					 <input align="center" type="submit" name="salvar" value="salvar">
				<br> <br> <br>
				
			</td>
		
		</td>
	
	<td width="50%" height="100" align="center" >
		<br>
		<h2> <font color="336699"> Alterar Status Conserto </font></h2>
			<form method="post" name="alterar" >
			
			<label> <font color="336699"> Identificador : &nbsp; </label>
			<input name="ident" type="text" size="4" maxlength="4" value="<?php echo $_POST["ident"]?>" > &nbsp; &nbsp;
			
			<input align="center" type="submit" name="buscar" value="buscar">
			
			<?php 		
				$coletor = mysql_query("select * from coletores where identificador = '$ident'");
				$dados_coletor = mysql_fetch_array($coletor)
			?>
			
			<br> <br> <br> <br>
			
		<table cellpadding="0" border="0" width="99%" height="100" align="center" >
			<tr>
			<td	align="center">
				<br>
				<label> <font color="336699"> Num Serie: </label> 
				<input name="nserie" value="<?php echo $dados_coletor[nserie] ?>" type="text" size="20" maxlength="20" readonly="false"> &nbsp; 
				
				<label> <font color="336699">  Descricao: </label> 
				<label> <input name="descricao" value="<?php echo $dados_coletor[descricao]?>" type="text" size="10" maxlength="10" readonly="false"> </label> &nbsp; 
				
			<br> <br>
			
				<?php 		
					$consertoc = mysql_query("select * from consertoc where identificador = '$ident'");
					$dados_consertoc = mysql_fetch_array($consertoc)
				?>

				<label> <font color="336699">  Atualizacao: </label> &nbsp;
				<input name="data_cadastro" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y-m-d') ?>"> &nbsp; &nbsp; &nbsp; 
				
				<label> <font color="336699">  RMA: </label> 
				<label> <input name="rma" value="<?php echo $dados_consertoc[rma]?>" type="text" size=7" maxlength="7" </label> &nbsp; 
				
				<label> <font color="336699">  NFe: </label> 
				<label> <input name="nfe" value="<?php echo $dados_consertoc[nfe]?>" type="text" size="11" maxlength="11" </label> &nbsp; 
			<br> <br>
				<label> <font color="336699">  Defeito: </label> 
				<label> <input name="defeito" value="<?php echo $dados_consertoc[defeito]?>" type="text" size="25" maxlength="25" </label> &nbsp;
				
				<label> <font color="336699">  Almox </label> 
				<label> <input name="data_almox" value="<?php echo $dados_consertoc[almox]?>" type="text"  size=10 maxlength="10" > </label> &nbsp;
			<br> <br> <br> <br> <br> <br> <br>
			</td> 
				<tr>
					<td	align="center">
						<input align="center" type="submit" name="salvar" value="salvar">
						<br> <br> <br>
					</td>
				</tr>
			</form>
		</tr>	
		</table>
			
	</td>
	</tr>
</table> 

<br> <br> <br>

</body>
</html> 