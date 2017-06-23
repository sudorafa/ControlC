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
	function valida_dados_alterar (cadastrar)
	{
		if (cadastrar.nserie.value=="")
		{
			alert ("Por favor digite o numero de serie !");
			cadastrar.nserie.focus();
			return false;
		}
		
		if (cadastrar.descricao.value=="")
		{
			alert ("Por favor digite a descricao !");
			cadastrar.descricao.focus();
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
				<h2 align="center"> <font color="336699"> Cadastrar Novo Coletor </font></h2> 
				</br>
				<div align="center">
					<table cellpadding="0" border="0" width="30%" align="center">
					<tr align="right">
					<form action="../controller/query_salvar_novo_coletor.php" method="post" name="cadastrar" onSubmit="return valida_dados_alterar(this)">
						<td>
							<label> <font color="336699"> *Numero de Serie: </label> &nbsp;</br></br>
						</td>
						<td>
							<label> <input name="nserie" type="text" size="20" maxlength="20" </label></br></br>
						</td>
					</tr>
					<tr align="right">
						<td>
							<label> <font color="336699">  *Descricao: </label> &nbsp;</br></br>
						</td>
						<td>
							<label> <input name="descricao"  type="text" size="20" maxlength="20" </label></br></br>
						</td>
					</tr>
					<tr align="right">
						<td>
							<label> <font color="336699"> *Identificador: </label> &nbsp;</br></br>
						</td>
						<td>
							<label> <input name="identificador1" readonly="false" value="<?php echo $_POST["identificador"]; ?>" type="text" size="15" maxlength="15" </label></br></br>
						</td>
					</tr>
					<tr align="right">
						<td colspan="2"> 
							<input align="center" type="submit" name="salvar" value="salvar"> 
						</td>
					</tr>
					</form>		
					</table>
				</div>
				<br/> <br/>
				
				
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>