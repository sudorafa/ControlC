<?php
/*
	Form do Sistema de Controle de Coletores (Recuperado da migração do Intranet)
	Rafael Eduardo L - @sudorafa
	Recife, 24 de Setembro de 2016
*/
	session_start();
	$idusuario = $_SESSION["idusuario"];
	include('../../global/conecta.php');
	include('../../global/libera.php');
	
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
    <!---------------------------------------------------------------------------------->
	<script language="javascript">
	<!-- chama a função (alterar) -->
	function valida_dados_alterar (alterar)
	{
		if (alterar.nserie.value=="")
		{
			alert ("Por favor digite o numero de serie !");
			alterar.nserie.focus();
			return false;
		}
		
		if (alterar.descricao.value=="")
		{
			alert ("Por favor digite a descricao !");
			alterar.descricao.focus();
			return false;
		}
			
	return true;
	}
	</script>
	<!---------------------------------------------------------------------------------->
	<script language="javascript">
	<!-- chama a função (deletar)-->
	function valida_dados_deletar (deletar)
	{
		if (deletar.identificador1.value=="")
		{
			alert ("Por favor digite o identificador para deletar.");
			deletar.identificador1.focus();
			return false;
		}

	return true;
	}
	</script>
	<!------------------------------------------------------------------------------------------>
	<body>
		<br/>
		<div id="interface">
            <div id="Conteudo">
                </br>
				<h2 align="center"> <font color="336699"> Alterar / Excluir Coletor </font></h2> 
				</br>
				<div align="center">
					<table cellpadding="0" border="0" width="30%" align="center">
					<tr align="right">
					<form action="../controller/query_salvar_alteracao_coletor.php" method="post" name="alterar" onSubmit="return valida_dados_alterar(this)">
						<?php 
							$coletor = mysql_query("select * from coletores where identificador = '$identificador' and filial = '$filial_usuario_logado'");
							$dados_coletor = mysql_fetch_array($coletor)
						?>
						<td>
							<label> <font color="336699"> *Numero de Serie: </label> &nbsp;</br></br>
						</td>
						<td>
							<label> <input name="nserie" value="<?php echo $dados_coletor[nserie]?>" type="text" size="20" maxlength="20" </label></br></br>
						</td>
					</tr>
					<tr align="right">
						<td>
							<label> <font color="336699">  *Descricao: </label> &nbsp;</br></br>
						</td>
						<td>
							<label> <input name="descricao" value="<?php echo $dados_coletor[descricao]?>" type="text" size="20" maxlength="20" </label></br></br>
						</td>
					</tr>
					<tr align="right">
						<td>
							<label> <font color="336699">  Status: </label> &nbsp;</br></br>
						</td>
						<td>
							<label> <input name="status" value="<?php echo $dados_coletor[status]?>" type="text" size="20" maxlength="20" readonly="false" </label></br></br>
						</td>
					</tr>
					<input type="hidden" name="identificador1" value="<?php echo $dados_coletor[identificador]?>" >
					<tr>
						<td align="right"> 
							<input align="center" type="submit" name="salvar" value="salvar"> &nbsp;
						</td>
					</form>	
					<form action="../controller/query_deletar_coletor.php" method="post" name="deletar" align="center" onSubmit="return valida_dados_deletar(this)">
						<td >
							<input type="hidden" name="identificador1" value="<?php echo $dados_coletor[identificador]?>" >
							<input align="center" type="submit" name="deletar" value="deletar">  
						</td>
						</form>
					</tr>
					</table>
				</div>
				<br/> <br/>
				
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>