<?php
	session_start();
	/*
	Form Home do sistema ControlC (Recuperado da integridade)
	Rafael Eduardo L - @sudorafa
	Recife, 21 de Setembro de 2016
	*/
	include('../global/libera.php');
	include('cabecalho.php');
	//include("/controller/ip.php");
	//include('../menu.php');
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>		
	</head>
	<!---------------------------------------------------------------------------------->
	<script language="javascript">
	<!-- chama a função (buscar) -->
	function valida_dados (entra_sai)
	{
		if (entra_sai.matricula.value=="")
		{
			alert ("Por favor digite o usuario para buscar.");
			entra_sai.matricula.focus();
			return false;
		}
	return true;
	}
	</script>
	<!---------------------------------------------------------------------------------->
	<body onLoad="document.entra_sai.matricula.focus()"> 
		<div id="interface">
			<?php include('menu.php'); ?>
			<div id="Conteudo" align="center">
				<br/> 
				<h2 align="center"> <font color="336699"> Registrar Entrada/Saída </font></h2>	
				<br/><br/>
                <table border ="1" width="95%" height="100" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td	class="corpo" width="49%" align="center" > 
						<h2> <font color="336699"> Entrada e Saída (matrícula/identificador) </font></h2> 
						<br/>
						<form name="entra_sai" action="view/form_entra_sai.php" method="post" onSubmit="return valida_dados(this)">
							<label> <font color="336699"> Matrícula : &nbsp; </label> 		
							<label>
								<input name="matricula" value="<?php echo $_POST["matricula"]; ?>" type="text" size="15" maxlength="10" autofocus="">
							</label> 
						<?php 
							$consulta = mysql_query("select * from usuariosc where matricula = '$matricula' and filial = '$filial_usuario_logado'");
							$linha = mysql_num_rows($consulta);
							$linha_mat = $linha;		
						?>
							&nbsp; &nbsp; <input type="submit" name="ok" value="ok">
						</form>
					</td>
					<td/>
					<td class="corpo" width="49%" align="center" > <h2> <font color="336699"> Baixa Direta (identificador)</font></h2>
					<br/>
						<form name="form_baixa" action="controller/query_baixa_por_identificador.php"  method="post">
							<label> <font color="336699"> Coletor : &nbsp; </label> 		
							<label>
								<input name="coletor" value="SB" type="text" size="10" maxlength="6" >
							</label>
							&nbsp; &nbsp; <input type="submit" name="ok" value="ok">
						</form>
					</td>
				</tr>
				</table> 
			<br/><br/>
			<?php 
				include("view/form_status_equipamentos.php");
				include('../rodape.php');
			?>
			</div> <!--/conteudo -->
        </div> <!--/interface -->
		
    </body>
</html>