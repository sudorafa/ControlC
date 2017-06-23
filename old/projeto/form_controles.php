<?php

session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
				
	include('libera.php');
	
	include('conecta.php');
	
	if ( $_SESSION[libera] == "ok" ){
	
		include('conecta.php');
		include("index.php");
	}
	
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
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

<!---------------------------------------------------------------------------------->

<script language="javascript">
<!-- chama a função (deletar)-->
function valida_dados (buscar_conserto)
{
    if (buscar_conserto.ident.value=="")
    {
        alert ("Por favor digite o Identificador para buscar !");
        return false;
    }

return true;
}
</script>

<!---------------------------------------------------------------------------------->

<script language="javascript">
<!-- chama a função (deletar)-->
function valida_dados_salvar (conserto)
{
    if (conserto.ident_post.value=="")
    {
        alert ("Por favor digite o Identificador para buscar !");
        return false;
    }

return true;
}
</script>


<!--
<script> 
function soma() 
{
	qtd.qtd_total_geral.value = (qtd.qtd_loja.value*1) + (qtd.qtd_prev.value*1) + (qtd.qtd_fcx.value*1) + (qtd.qtd_deposito.value*1) + (qtd.qtd_gerencia.value*1) + (qtd.qtd_frios.value*1) + (qtd.qtd_conserto.value*1)
}
</script>
-->

<h2 align="center"> <font color="336699"> Controle dos Coletores (Setores / Conserto) </font></h2> 

<table border ="1" width="80%" height="100" align="center" cellpadding="0" >
	<tr>
		
		<td width="30%" align="center" >
		 
			<table cellpadding="0" border="0" width="260" height="100" align="center" >
			<tr >
			
			<form method="post" name="qtd" action="query_alteracao_qtdc.php">
				
			<?php 		
				$qtd = mysql_query("select * from qtdc where filial = '$filial_usuario_logado'");
				$dados_qtd = mysql_fetch_array($qtd);
				
				$consulta_coletores = mysql_query("select * from coletores where filial = '$filial_usuario_logado'");
				$linha_coletores = mysql_num_rows($consulta_coletores);
				
				$consulta_conserto = mysql_query("select * from consertoc where situacao = 'conserto' and filial = '$filial_usuario_logado'");
				$linha_conserto = mysql_num_rows($consulta_conserto);
				
				$result_qtd_conserto = $linha_conserto;
			
				$pesquisa = mysql_query("select sum(qtd_loja+qtd_prev+qtd_fcx+qtd_deposito+qtd_gerencia+qtd_frios+$result_qtd_conserto) as soma from qtdc where filial = '$filial_usuario_logado'");
				$count = mysql_fetch_array($pesquisa);
				
				$total = $count[soma];
				
			?>
				
				<h2> <font color="336699"> Gerenciamento (<?php echo $total?> / <?php echo $linha_coletores?>) </font></h2>  <br> 
				<tr>
					<td align="right"> <br> 
						<label> <font color="336699"> LOJA: </label> &nbsp;
						<label> <input value="<?php echo $dados_qtd[qtd_loja]?>" name="qtd_loja_atual" type="text" size="2" maxlength="2" </label> &nbsp; 
					</td>
					<td align="right"> <br> 
						<label> <font color="336699"> PREVENCAO: </label> &nbsp;
						<label> <input value="<?php echo $dados_qtd[qtd_prev]?>" name="qtd_prev_atual" type="text" size="2" maxlength="2" </label> &nbsp; 
					</td>
				</tr>
				<tr>
					<td align="right"> <br>
						<label> <font color="336699"> F. CAIXA: </label> &nbsp;
						<label> <input value="<?php echo $dados_qtd[qtd_fcx]?>" name="qtd_fcx_atual" type="text" size="2" maxlength="2" </label> &nbsp; 
					</td>
					<td align="right"> <br>
						<label> <font color="336699"> DEPOSITO: </label> &nbsp;
						<label> <input value="<?php echo $dados_qtd[qtd_deposito]?>" name="qtd_deposito_atual" type="text" size="2" maxlength="2" </label> &nbsp; 
					</td>
				</tr>
				<tr>
					<td align="right"> <br>
						<label> <font color="336699"> GERENCIA: </label> &nbsp;
						<label> <input value="<?php echo $dados_qtd[qtd_gerencia]?>" name="qtd_gerencia_atual" type="text" size="2" maxlength="2" </label> &nbsp; 
					</td>
					<td align="right"> <br>
						<label> <font color="336699"> FRIOS: </label> &nbsp;
						<label> <input value="<?php echo $dados_qtd[qtd_frios]?>" name="qtd_frios_atual" type="text" size="2" maxlength="2" </label> &nbsp; 
					</td>
				</tr>
				<tr>
					<td align="right"> <br>
						<label> <font color="336699"> CONSERTO: </label> &nbsp;
						<label> <input readonly="false" value="<?php echo $result_qtd_conserto?>" name="qtd_conserto_atual" type="text" size="2" maxlength="2" </label> &nbsp; 
					</td>
				</tr>
			
			</table>
			<table>
				<tr>
					<td> <br> <br> <br> <br>
						<input align="center" type="submit" name="salvar" value="salvar">
					</td> 
				</tr>
			</form>
			</tr>	
			</table>
			
		</td>
	
	<td width="50%" height="100" align="center" >
		<br> 
		<h2> <font color="336699"> Status Conserto </font></h2> <br> <br> <br> 
			<form method="post" name="buscar_conserto" action="form_controles.php" onSubmit="return valida_dados(this)">
			
			<label> <font color="336699"> Identificador : &nbsp; </label>
			<input name="ident" type="text" size="4" maxlength="4" value="<?php echo $_POST["ident"]?>" > &nbsp; &nbsp;
			
			<input align="center" type="submit" name="buscar" value="buscar"> <br> <br> <br>
			
			<?php 		
				$coletor = mysql_query("select * from coletores where identificador = '$ident' and filial = '$filial_usuario_logado'");
				$dados_coletor = mysql_fetch_array($coletor);
				$linha1 = mysql_num_rows($coletor);
			?>
			
			</form>      
			
		<table cellpadding="0" border="0" width="99%" height="100" align="center" >
		<tr>
			<form method="post" name="conserto" action="query_alteracao_conserto.php" onSubmit="return valida_dados_salvar(this)">
			<td	align="center">
			
				<?php 		
					$consertoc = mysql_query("select * from consertoc where identificador = '$ident' and filial = '$filial_usuario_logado' order by id desc limit 1");
					$dados_consertoc = mysql_fetch_array($consertoc)
				?>
				 
				<input type="hidden" name="ident_post" type="text" size="4" maxlength="4" value="<?php echo $_POST["ident"]?>" > 
				 
				<label> <font color="336699"> Nm Serie: </label> 
				<input name="nserie" value="<?php echo $dados_coletor[nserie] ?>" type="text" size="20" maxlength="20" readonly="false"> &nbsp; 
				
				<label> <font color="336699">  Desc: </label> 
				<label> <input name="descricao" value="<?php echo $dados_coletor[descricao]?>" type="text" size="6" maxlength="6" readonly="false"> </label> &nbsp; 
				<label> <font color="336699">  Situacao: </label> 
				<select size="1" name="situacao">
					<option value="<?php echo $dados_consertoc[situacao]?>"> <?php echo $dados_consertoc[situacao]?> </option>
					<option value="nada">-----</option>
					<option value="conserto">conserto</option>
					<option value="filial">filial</option>
				</select> &nbsp; &nbsp; &nbsp; 
			   
			   <br> <br>
			
				<label> <font color="336699">  Atualizacao: </label> &nbsp;
				<input name="data_banco" type="text" size="10" maxlength="10" readonly="false" value="<?php echo $dados_consertoc[atualizacao] ?>"> &nbsp; &nbsp; 
				
				<input type="hidden" name="situacao_banco" type="text" size="11" maxlength="11" readonly="false" value="<?php echo $dados_consertoc[situacao] ?>">
				
				<!-- data de hoje para salvar -->
				<input type="hidden" name="data_atualizacao" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y-m-d') ?>">
				<!-- id para salvar -->
				<input type="hidden" name="id" type="text" size="11" maxlength="11" readonly="false" value="<?php echo $dados_consertoc[id] ?>">
				
				
				<label> <font color="336699">  RMA: </label> &nbsp; 
				<label> <input name="rma" value="<?php echo $dados_consertoc[rma]?>" type="text" size=7" maxlength="7" </label> &nbsp; &nbsp; &nbsp; 
				
				<label> <font color="336699">  NFe: </label> &nbsp; 
				<label> <input name="nfe" value="<?php echo $dados_consertoc[nfe]?>" type="text" size="11" maxlength="11" </label> &nbsp; &nbsp;&nbsp;  
				
				<br> <br> 
				
				<label> <font color="336699">  Defeito: </label> &nbsp; 
				<label> <input name="defeito" value="<?php echo $dados_consertoc[defeito]?>" type="text" size="25" maxlength="25" </label> &nbsp;&nbsp; &nbsp; 
				
				<label> <font color="336699">  Almox </label> &nbsp; 
				<label> <input name="data_almox" value="<?php echo $dados_consertoc[almox]?>" type="text" size=10 maxlength="10" > </label> &nbsp;&nbsp; &nbsp;
				
				<br> 
			</td> 
				<tr>
					<td	align="center"> <br> <br>
						<input align="center" type="submit" name="salvar" value="salvar">
						     <br><br>
					</td>
				</tr>
			<?php
			if(($_POST[ident]) or ($_POST[ident] <> "") or ($_POST[ident] <> 0)){
				if ($linha1 == 0){
					echo 
					"<script>window.alert('Coletor nao encontrado !') </script>";
				}
			}
			?>
			</form>
		</tr>	
		</table>
			
	</td>
	</tr>
</table> 

     

</body>
</html> 