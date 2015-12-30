<?php
session_start();
	$codusuario = $_SESSION["codusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('altoriza.php');
	
	include('conecta.php');
	
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

<?php
	$codusuario = $_SESSION["codusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where codusuario = '$codusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
?>

<?php
	$dados_qtdc	= mysql_fetch_array(mysql_query("select * from qtdc where filial = '$filial_usuario_logado'"));
	
	$qtd_loja 		= $dados_qtdc[qtd_loja];
	$qtd_prev 		= $dados_qtdc[qtd_prev];
	$qtd_fcx 		= $dados_qtdc[qtd_fcx];
	$qtd_deposito 	= $dados_qtdc[qtd_deposito];
	$qtd_gerencia 	= $dados_qtdc[qtd_gerencia];
	$qtd_frios 		= $dados_qtdc[qtd_frios];		
?>

<?php 
	$usuario = mysql_query("select * from usuariosc where matricula = '$matricula' and filial = '$filial_usuario_logado'");
	$dados_usuario = mysql_fetch_array($usuario)
	
?>

<?php	
	$setor_user = $dados_usuario[descsetor];
?>

<?php 

	$matricula = $_POST['matricula'];

		$consulta = mysql_query("select * from usuariosc where matricula = '$matricula' and filial = '$filial_usuario_logado'");
		$linha = mysql_num_rows($consulta);
	
		$setor_coletores_loja = mysql_query("select * from coletores where status = 'NA LOJA' and filial = '$filial_usuario_logado'");
		$linha_loja = mysql_num_rows($setor_coletores_loja);
		$na_loja = $linha_loja;
		
		$setor_coletores_prev = mysql_query("select * from coletores where status = 'NA PREV' and filial = '$filial_usuario_logado'");
		$linha_prev = mysql_num_rows($setor_coletores_prev);
		$na_prev = $linha_prev;
		
		$setor_coletores_fcx = mysql_query("select * from coletores where status = 'NA FCX' and filial = '$filial_usuario_logado'");
		$linha_fcx = mysql_num_rows($setor_coletores_fcx);
		$na_fcx = $linha_fcx;
		
		$setor_coletores_deposito = mysql_query("select * from coletores where status = 'NO DEPOSITO' and filial = '$filial_usuario_logado'");
		$linha_deposito = mysql_num_rows($setor_coletores_deposito);
		$no_deposito = $linha_deposito;
		
		$setor_coletores_gerencia = mysql_query("select * from coletores where status = 'NA GERENCIA' and filial = '$filial_usuario_logado'");
		$linha_gerencia = mysql_num_rows($setor_coletores_gerencia);
		$na_gerencia = $linha_gerencia;
		
		$setor_coletores_frios = mysql_query("select * from coletores where status = 'NO FRIOS' and filial = '$filial_usuario_logado'");
		$linha_frios = mysql_num_rows($setor_coletores_frios);
		$no_frios = $linha_frios;
		
		
		if ($setor_user == "LOJA"){
			$rest = $qtd_loja - $na_loja;
		}
		
		if ($setor_user == "PREVENCAO"){
			$rest = $qtd_prev - $na_prev;
		}
		
		if ($setor_user == "F. CAIXA"){
			$rest = $qtd_fcx - $na_fcx;
		}
		
		if ($setor_user == "DEPOSITO"){
			$rest = $qtd_deposito - $no_deposito;
		}
		
		if ($setor_user == "GERENCIA"){
			$rest = $qtd_gerencia - $na_gerencia;
		}
		
		if ($setor_user == "FRIOS"){
			$rest = $qtd_frios - $no_frios;
		}

		if(($_POST[matricula]) or ($_POST[matricula] <> "") or ($_POST[matricula] <> 0)){
			
			if($linha == 1)
			{
				
				
				
				if ($qtd_loja == $na_loja){
					echo 
					"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
						window.location.replace('form_home.php');
					</script>";
				}
				
				if ($qtd_prev == $na_prev){
					echo 
					"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
						window.location.replace('form_home.php');
					</script>";
				}
				
				if ($qtd_fcx == $na_fcx){
					echo 
					"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
						window.location.replace('form_home.php');
					</script>";
				}
				
				if ($qtd_deposito == $no_deposito){
					echo 
					"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
						window.location.replace('form_home.php');
					</script>";
				}
				
				if ($qtd_gerencia == $na_gerencia){
					echo 
					"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
						window.location.replace('form_home.php');
					</script>";
				}
				
				if ($qtd_frios == $no_frios){
					echo 
					"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
						window.location.replace('form_home.php');
					</script>";
				}
				
			}
			else
			{
				// o usuário não existe;
				echo 
				"<script>window.alert('Matricula Invalida !')
					window.location.replace('form_home.php');
				</script>";
				//include("form_home.php");
				//header("Location:form_home.php");
			}
		}
	
?>

<h2 align="center"> <font color="336699"> Registrando Entradas / Saidas </font></h2> 
<br>
<form action="query_entra_sai.php" method="post" name="alterar">
	<table border ="1" width="80%" height="250" align="center" cellpadding="0" cellspacing="0">
		<tr>
		
		
		<?php
			
			$coletores = mysql_query("select * from coletores where status = 'NO CPD' and filial = '$filial_usuario_logado' order by id limit 1");
			$dados_coletores = mysql_fetch_array($coletores);
		?>
				
		<td	align="center"> 
			<br>
			&nbsp; &nbsp; &nbsp;
			<label> <font color="336699"> Matricula: </label> &nbsp;
			<label> <input name="matricula" type="text" size="10" maxlength="10" value="<?php echo $_POST[matricula]?>" readonly="false"></label> &nbsp; 
			
			<label> <font color="336699"> Coletor: </label> &nbsp;
			<label> <input name="coletor" type="text" size="5" maxlength="3" value="<?php echo $dados_coletores[identificador]?>" readonly="false"> </label>&nbsp; &nbsp; &nbsp;
			
			<label> <font color="336699"> Restam para este setor: </label> &nbsp;
			<label> <input name="setor" type="text" size="3" value="<?php echo $rest ?>" readonly="false"> </label> 
		<br> <br>
			<label> <font color="336699"> Nome: </label> &nbsp; 
			<label> <input name="nome" value="<?php echo $dados_usuario[nomusuario]?>" type="text" size="50" readonly="false"> </label> &nbsp; &nbsp; &nbsp;
		
			<label> <font color="336699"> Setor: </label> &nbsp; 		
			<label> <input name="setor" type="text" size="20" value="<?php echo $dados_usuario[descsetor]?>" readonly="false"> </label>
		<br> <br>
			<label> Data entrada: </label> &nbsp; 
			<input name="data_entrada" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y-m-d') ?>"> &nbsp; &nbsp; &nbsp;
			
			<label> Hora entrada: </label> &nbsp;
			<input name="hora_entrada" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('H:i') ?>">
		<br> <br>	
			<label> OBS: </label> <br>
			<textarea name="obs" cols="40" rows="4"></textarea> <br> <br>
			<input type="submit" name="cadastrar" value="CONFIRMA">
		<br> <br>
		</td>
		
		</tr>
	</table> 
</form> 

</body>
</html>