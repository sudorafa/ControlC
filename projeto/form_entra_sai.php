<?php
session_start();
	$idusuario = $_SESSION["idusuario"];
	$mensagem = $_SESSION["mensagem"];
			
	include('libera.php');
	
	include('conecta.php');
	
	if ( $_SESSION[libera] == "ok" ){
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
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];

	$dados_qtdc	= mysql_fetch_array(mysql_query("select * from qtdc where filial = '$filial_usuario_logado'"));
	
	$qtd_loja 		= $dados_qtdc[qtd_loja];
	$qtd_prev 		= $dados_qtdc[qtd_prev];
	$qtd_fcx 		= $dados_qtdc[qtd_fcx];
	$qtd_deposito 	= $dados_qtdc[qtd_deposito];
	$qtd_gerencia 	= $dados_qtdc[qtd_gerencia];
	$qtd_frios 		= $dados_qtdc[qtd_frios];		

	$usuario = mysql_query("select * from usuariosc where matricula = '$matricula' and filial = '$filial_usuario_logado'");
	$dados_usuario = mysql_fetch_array($usuario);

	$setor_user = $dados_usuario[descsetor];

	$usuario_mov = mysql_query("select * from mov_coletores where matricula_user = '$matricula' and movimento = 'USO' and filial = '$filial_usuario_logado'");
	$dados_usuario_mov = mysql_fetch_array($usuario_mov);
	
	$movimento_user = $dados_usuario_mov[movimento];
	$coletor_user 	= $dados_usuario_mov[coletor];


	$matricula = $_POST['matricula'];
	
		$consulta1 = mysql_query("select * from coletores");
		$linha1 = mysql_num_rows($consulta1);
		
		$consulta = mysql_query("select * from usuariosc where matricula = '$matricula' and filial = '$filial_usuario_logado'");
		$linha = mysql_num_rows($consulta);
	
		$setor_coletores_loja = mysql_query("select * from coletores where status = 'LOJA' and filial = '$filial_usuario_logado'");
		$linha_loja = mysql_num_rows($setor_coletores_loja);
		$na_loja = $linha_loja;
		
		$setor_coletores_prev = mysql_query("select * from coletores where status = 'PREVENCAO' and filial = '$filial_usuario_logado'");
		$linha_prev = mysql_num_rows($setor_coletores_prev);
		$na_prev = $linha_prev;
		
		$setor_coletores_fcx = mysql_query("select * from coletores where status = 'F. CAIXA' and filial = '$filial_usuario_logado'");
		$linha_fcx = mysql_num_rows($setor_coletores_fcx);
		$na_fcx = $linha_fcx;
		
		$setor_coletores_deposito = mysql_query("select * from coletores where status = 'DEPOSITO' and filial = '$filial_usuario_logado'");
		$linha_deposito = mysql_num_rows($setor_coletores_deposito);
		$no_deposito = $linha_deposito;
		
		$setor_coletores_gerencia = mysql_query("select * from coletores where status = 'GERENCIA' and filial = '$filial_usuario_logado'");
		$linha_gerencia = mysql_num_rows($setor_coletores_gerencia);
		$na_gerencia = $linha_gerencia;
		
		$setor_coletores_frios = mysql_query("select * from coletores where status = 'FRIOS' and filial = '$filial_usuario_logado'");
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

		if($linha1 == 0){
			echo 
			"<script>window.alert(' NENHUM COLETOR CADASTRADO ! ')
				window.location.replace('form_home.php');
			</script>";
		}
		
		if(($_POST[matricula]) or ($_POST[matricula] <> "") or ($_POST[matricula] <> 0)){
			
			if($linha == 1)
			{
				if($setor_user == "CPD"){
					echo 
					"<script>window.alert(' CPD ! ')
						window.location.replace('form_home.php');
					</script>";
				}
				
				if ($movimento_user == "USO"){
					echo "<script>window.alert(' Usuario falta entregar coletor $coletor_user !')</script>";
				}
				else{
					
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
			
			$coletores = mysql_query("select * from coletores where status = 'CPD' and filial = '$filial_usuario_logado' order by id_mov desc limit 1");
			$dados_coletores = mysql_fetch_array($coletores);
		?>
				
		<td	align="center"> 
			<br>
			&nbsp; &nbsp; &nbsp;
			<label> <font color="336699"> Matricula: </label> &nbsp;
			<label> <input name="matricula" type="text" size="10" maxlength="10" value="<?php echo $_POST[matricula]?>" readonly="false"></label> &nbsp; 
		
		<?php if ($movimento_user == "USO"){ ?>
			<label> <font color="336699"> Coletor: </label> &nbsp;
			<label> <input name="coletor_uso" type="text" size="5" maxlength="3" value="<?php echo $dados_usuario_mov[coletor] ?>" readonly="false"> </label>&nbsp; &nbsp; &nbsp;
		<?php } else { ?>
			<label> <font color="336699"> Coletor: </label> &nbsp;
			<label> <input name="coletor" type="text" size="5" maxlength="3" value="<?php echo $dados_coletores[identificador]?>" readonly="false"> </label>&nbsp; &nbsp; &nbsp;
		<?php } ?>
		
			<label> <font color="336699"> Restam para este setor: </label> &nbsp;
			<label> <input name="setor" type="text" size="3" value="<?php echo $rest ?>" readonly="false"> </label> 
		<br> <br>
			<label> <font color="336699"> Nome: </label> &nbsp; 
			<label> <input name="nome" value="<?php echo $dados_usuario[nomusuario]?>" type="text" size="50" readonly="false"> </label> &nbsp; &nbsp; &nbsp;
		
			<label> <font color="336699"> Setor: </label> &nbsp; 		
			<label> <input name="setor" type="text" size="20" value="<?php echo $dados_usuario[descsetor]?>" readonly="false"> </label>
		<br> <br>
		
		<?php if ($movimento_user == "USO"){ ?>
		<label> Data Saida : </label> &nbsp; 
			<input name="data_saida" value="<?php echo $dados_usuario_mov[data_saida] ?>" type="text" size="10" maxlength="10" readonly="false"> &nbsp; &nbsp; &nbsp;
			
			<label> Hora Saida : </label> &nbsp; 
			<input name="hora_saida" value="<?php echo $dados_usuario_mov[hora_saida] ?>" type="text" size="10" maxlength="10" readonly="false">
		<br> <br>	
		
			<label> Data Devol: </label> &nbsp; 
			<input name="data_devolucao" value="<?php echo date('Y-m-d') ?>" type="text" size="10" maxlength="10" readonly="false"> &nbsp; &nbsp; &nbsp;
			
			<label> Hora Devol: </label> &nbsp;
			<input name="hora_devolucao" value="<?php echo date('H:i') ?>" type="text" size="10" maxlength="10" readonly="false">
		<?php } else { ?>
			<label> Data Saida : </label> &nbsp; 
			<input name="data_saida" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y-m-d')?>"> &nbsp; &nbsp; &nbsp;
			
			<label> Hora Saida : </label> &nbsp; 
			<input name="hora_saida" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('H:i')?>">
		<br> <br>	
		<?php } ?>
		
		<?php if ($movimento_user == "USO"){ ?>
		<br> <br>	
			<label> OBS: </label> <br>
			<input name="obs_devolucao" align="center" size="70" maxlength="70" type="text" value="<?php echo $dados_usuario_mov[obs_saida] ?>" > <br> <br>
			<input type="submit" name="cadastrar" value="CONFIRMA">
		<?php } else { ?>
		<br> <br>	
			<label> OBS: </label> <br>
			<input name="obs_saida" align="center" size="70" maxlength="70" type="text" > <br> <br>
			<input type="submit" name="cadastrar" value="CONFIRMA">
		<?php } ?>
		
		<input type="hidden" name="id" value="<?php echo $dados_usuario_mov[id]?>" >
		<input type="hidden" name="movimento_post" value="<?php echo $dados_usuario_mov[movimento]?>" >
					
		<br> <br>
		</td>
		
		</tr>
	</table> 
</form> 

</body>
</html>