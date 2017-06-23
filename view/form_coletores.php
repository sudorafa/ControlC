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
	
	include('../cabecalho.php');
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
    <body onLoad="document.buscar.identificador.focus()"> 
	<!---------------------------------------------------------------------------------->
	<script language="javascript">
	<!-- chama a função (buscar) -->
	function valida_dados (buscar)
	{
		if (buscar.identificador.value=="")
		{
			alert ("Por favor digite o coletor para buscar !");
			return false;
		}
	return true;
	}
	</script>
	<!---------------------------------------------------------------------------------->
		
		<div id="interface">
			<?php include('../menu.php'); ?>
            <div id="Conteudo">
				<div align="center">
					<br/> 
					<h2 align="center"> <font color="336699"> Buscar Coletor </font></h2>	
					<br/><br/>
					<table cellpadding="0" border="1" width="95%" align="center">
					<tr>
					<form action="form_coletores.php" method="post" name="buscar" align="center" onSubmit="return valida_dados(this)">
						<td	class="corpo" width="49%" align="center"> 
							<br/>	
							&nbsp; &nbsp; &nbsp;
							<label> <font color="336699"> Identificador: </label> &nbsp;
							<label> <input name="identificador" value="<?php echo $_POST["identificador"]; ?>" type="text" size="6" maxlength="6" </label> &nbsp; 
							<input type="submit" name="buscar" value="buscar"> &nbsp; &nbsp; &nbsp;
							<br/> <br/>
						</td>
					</form>
					<td/>
					<form action="form_coletores.php" method="post" name="listar_coletores" align="center">
						<td	class="corpo" width="49%" align="center"> 
							<br/>	
								<class="simples_2" > <input name="listar" type="submit" value="LISTAR TODOS COLETORES DA FILIAL" /> </a>
							<br/> <br/>
								<class="simples_2" > <a href="../controller/query_redefinir_sequencia.php"><u> REDEFINIR SEQUENCIA DE ENTREGAS </u> </a>
							<br/> <br/>
						</td>
					</form>
					</tr>
					</table>
						<?php 
						
							$idusuario = $_SESSION["idusuario"];
							$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
							$filial_usuario_logado = $dados_usuario_logado[filial];
							
							$identificador = $_POST['identificador'];
					 
							$consulta = mysql_query("select * from coletores where identificador = '$identificador' and filial = '$filial_usuario_logado'");
							$linha = mysql_num_rows($consulta);
					 
							if(($_POST[identificador]) or ($_POST[identificador] <> "") or ($_POST[identificador] <> 0)){
								
								if($linha >= 1)
								{
									// o coletor existe;
									include("form_alterar_deletar_coletor.php");
								}
								else
								{
									// o usuário não existe;
									echo "<script>window.alert('Coletor nao existe, cadastre e salve !')</script>";
									include("form_cad_coletor.php");
								}
							} else { ?>
						<br/>
						<div align="center">
							<label> <font color="336699">  Digite o Coletor para Cadastrar ou Alterar ! </label> &nbsp; 
						</div>
						<br/><br/><br/><br/>
					<br/>
							<?php }
							
							$listar1 = $_POST["listar"];
							if(isset($listar1)){
								include("form_listar_coletores.php");
							}
						?>
					</div>
				<?php include('../../rodape.php');?>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>