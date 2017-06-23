<?php
/*
	Form do Sistema de Controle de Coletores (Recuperado da migração do Intranet)
	Rafael Eduardo L - @sudorafa
	Recife, 22 de Setembro de 2016
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
    <body onLoad="document.alterar.cadastrar.focus()"> 
	<?php
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
		$bloqueio	= $dados_usuario[bloqueio];

		$usuario_mov = mysql_query("select * from mov_coletores where matricula_user = '$matricula' and movimento = 'USO' and filial = '$filial_usuario_logado'");
		$dados_usuario_mov = mysql_fetch_array($usuario_mov);
		
		$coletor_mov = mysql_query("select * from mov_coletores where coletor = '$matricula' and movimento = 'USO' and filial = '$filial_usuario_logado'");
		$dados_coletor_mov = mysql_fetch_array($coletor_mov);
		
		$movimento_coletor 	= $dados_coletor_mov[movimento];
		$user_coletor 		= $dados_coletor_mov[nome_user];
		$descSetor_coletor 	= $dados_coletor_mov[setor_user];
		$matricula_coletor  = $dados_coletor_mov[matricula_user];
		
		if ($movimento_coletor == "USO") {
			$setor_user = $descSetor_coletor;
		}
		
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
				window.location.replace('../home.php');
			</script>";
		}
		
		if(($_POST[matricula]) or ($_POST[matricula] <> "") or ($_POST[matricula] <> 0)){
			
			if($linha == 1)
			{
				if($setor_user == "CPD"){
					echo 
					"<script>window.alert(' CPD ! ')
						window.location.replace('../home.php');
					</script>";
				}
				
				if($setor_user == "GERENTE"){
					echo 
					"<script>window.alert(' GERENTE ! ')
						window.location.replace('../home.php');
					</script>";
				}
				
				if($setor_user == "CADASTRO"){
					echo 
					"<script>window.alert(' CADASTRO ! ')
						window.location.replace('../home.php');
					</script>";
				}
				
				if($bloqueio == "sim"){
					echo 
					"<script>window.alert(' USUARIO BLOQUEADO ! ')
						window.location.replace('../home.php');
					</script>";
				}
				
				
				if ($movimento_user == "USO"){
					echo "<script>window.alert(' Usuario falta entregar coletor $coletor_user !')</script>";
				}
				else{
					
					if ($qtd_loja == $na_loja and $setor_user == "LOJA"){
						echo 
						"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
							window.location.replace('../home.php');
						</script>";
					}
					
					if ($qtd_prev == $na_prev and $setor_user == "PREVENCAO"){
						echo 
						"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
							window.location.replace('../home.php');
						</script>";
					}
					
					if ($qtd_fcx == $na_fcx and $setor_user == "F. CAIXA"){
						echo 
						"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
							window.location.replace('../home.php');
						</script>";
					}
					
					if ($qtd_deposito == $no_deposito and $setor_user == "DEPOSITO"){
						echo 
						"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
							window.location.replace('../home.php');
						</script>";
					}
					
					if ($qtd_gerencia == $na_gerencia and $setor_user == "GERENCIA"){
						echo 
						"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
							window.location.replace('../home.php');
						</script>";
					}
					
					if ($qtd_frios == $no_frios and $setor_user == "FRIOS"){
						echo 
						"<script>window.alert(' Sem equipamento disponivel para este setor ! ')
							window.location.replace('../home.php');
						</script>";
					}
				}	
			}
			else if ($movimento_coletor == "USO")
			{
				echo "<script>window.alert(' Coletor $matricula com $user_coletor !')</script>";
			}
			
			else
			{
				// o usuário não existe;
				echo 
				"<script>window.alert('Nenhum Resultado para $matricula !')
					window.location.replace('../home.php');
				</script>";
			}
		}
	?>
		<div id="interface">
			<?php include('../menu.php'); ?>
            <div id="Conteudo">
				<br/>
                <?php if ($movimento_coletor == "USO") { ?>
					<h2 align="center"> <font color="336699"> Registrando Entradas / Saidas </font></h2> 
					<br/>
					<form action="../controller/query_entra_sai.php" method="post" name="alterar">
						<table border ="1" width="100%" height="250" align="center" cellpadding="0" cellspacing="0">
							<tr>
									
							<td	align="center"> 
								<br/>
								&nbsp; &nbsp; &nbsp;
								<label> <font color="336699"> Matricula: </label> &nbsp;
								<label> <input name="matricula" type="text" size="10" maxlength="10" value="<?php echo $dados_coletor_mov[matricula_user]?>" readonly="false"></label> &nbsp; &nbsp;
							
							<!-- -->
								<label> <font color="336699"> Coletor: </label> &nbsp;
								<label> <input name="coletor_uso" type="text" size="5" maxlength="3" value="<?php echo $dados_coletor_mov[coletor] ?>" readonly="false"> </label>&nbsp; &nbsp; &nbsp; &nbsp;
							
								<label> <font color="336699"> Restam para este setor: </label> &nbsp;
								<label> <input name="setor" type="text" size="3" value="<?php echo $rest ?>" readonly="false"> </label> &nbsp; &nbsp; &nbsp;
								
								<label> <font color="336699"> Capinha: </label> &nbsp;
								<?php
								$capa= mysql_query("select * from usuariosc where matricula = '$matricula_coletor'");
								$dados_capa = mysql_fetch_array($capa);
								?>
								<select size="1" name="capa">
									<option value="<?php echo $dados_capa[capa]?>"> <?php echo $dados_capa[capa]?></option>
									<option value="----">----</option>
									<option value="sim">sim</option>
									<option value="nao">nao</option>
									<option value="perdeu">perdeu</option>
									<option value="velha">velha</option>
								</select> &nbsp; &nbsp;
								
							<br/> <br/>
								<label> <font color="336699"> Nome: </label> &nbsp; 
								<label> <input name="nome" value="<?php echo $dados_coletor_mov[nome_user]?>" type="text" size="50" readonly="false"> </label> &nbsp; &nbsp; &nbsp;
							
								<label> <font color="336699"> Setor: </label> &nbsp; 		
								<label> <input name="setor" type="text" size="20" value="<?php echo $dados_coletor_mov[setor_user]?>" readonly="false"> </label>&nbsp; &nbsp; &nbsp;
								
								<label> <font color="336699"> Termo: </label> &nbsp;
								<?php
								$termo= mysql_query("select * from usuariosc where matricula = '$matricula_coletor'");
								$dados_termo = mysql_fetch_array($termo);
								?>
								<select size="1" name="termo">
									<option value="<?php echo $dados_termo[termo]?>"> <?php echo $dados_termo[termo]?></option>
									<option value="----">----</option>
									<option value="sim">sim</option>
									<option value="nao">nao</option>
								</select> &nbsp; &nbsp;
								
							<br/> <br/>
							<!-- -->
								<label> Data Saida : </label> &nbsp; 
								<input name="data_saida" value="<?php echo $dados_coletor_mov[data_saida] ?>" type="text" size="10" maxlength="10" readonly="false"> &nbsp; &nbsp; &nbsp;
								
								<label> Hora Saida : </label> &nbsp; 
								<input name="hora_saida" value="<?php echo $dados_coletor_mov[hora_saida] ?>" type="text" size="10" maxlength="10" readonly="false">
							<br/> <br/>	
							
								<label> Data Devol: </label> &nbsp; 
								<input name="data_devolucao" value="<?php echo date('Y-m-d') ?>" type="text" size="10" maxlength="10" readonly="false"> &nbsp; &nbsp; &nbsp;
								
								<label> Hora Devol: </label> &nbsp;
								<input name="hora_devolucao" value="<?php echo date('H:i') ?>" type="text" size="10" maxlength="10" readonly="false">
							
							<!-- -->
							
							<br/> <br/>	
								<label> OBS: </label> <br/>
								<input name="obs_devolucao" align="center" size="70" maxlength="70" type="text" value="<?php echo $dados_coletor_mov[obs_saida] ?>" > <br/> <br/>
								<input type="submit" name="cadastrar" value="CONFIRMA">
							
							<input type="hidden" name="id" value="<?php echo $dados_coletor_mov[id]?>" >
							<input type="hidden" name="movimento_post" value="<?php echo $dados_coletor_mov[movimento]?>" >
										
							<br/> <br/>
							</td>
							
							</tr>
						</table> 
					</form> 
						
					<?php } else { ?>

					<h2 align="center"> <font color="336699"> Registrando Entradas / Saidas </font></h2> 
					<br/>
					<form action="../controller/query_entra_sai.php" method="post" name="alterar">
						<table border ="1" width="100%" height="250" align="center" cellpadding="0" cellspacing="0">
							<tr>
							
							
							<?php
								
								$coletores = mysql_query("select * from coletores where status = 'CPD' and filial = '$filial_usuario_logado' order by id_mov limit 1");
								$dados_coletores = mysql_fetch_array($coletores);
							?>
									
							<td	align="center"> 
								<br/>
								&nbsp; &nbsp; &nbsp;
								<label> <font color="336699"> Matricula: </label> &nbsp;
								<label> <input name="matricula" type="text" size="10" maxlength="10" value="<?php echo $_POST[matricula]?>" readonly="false"></label> &nbsp; &nbsp;
							
							<!-- -->
							<?php if ($movimento_user == "USO"){ ?>
								<label> <font color="336699"> Coletor: </label> &nbsp;
								<label> <input name="coletor_uso" type="text" size="5" maxlength="3" value="<?php echo $dados_usuario_mov[coletor] ?>" readonly="false"> </label>&nbsp; &nbsp; &nbsp; &nbsp;
							<?php } else { ?>
								<label> <font color="336699"> Coletor: </label> &nbsp;
								<label> <input name="coletor" type="text" size="5" maxlength="3" value="<?php echo $dados_coletores[identificador]?>" readonly="false"> </label>&nbsp; &nbsp; &nbsp; &nbsp;
							<?php } ?>
							
								<label> <font color="336699"> Restam para este setor: </label> &nbsp;
								<label> <input name="setor" type="text" size="3" value="<?php echo $rest ?>" readonly="false"> </label> &nbsp; &nbsp; &nbsp;
								
								<label> <font color="336699"> Capinha: </label> &nbsp;
								<?php
									$capa= mysql_query("select * from usuariosc where matricula = '$matricula'");
									$dados_capa = mysql_fetch_array($capa);
								?>
								<select size="1" name="capa">
									<option value="<?php echo $dados_capa[capa]?>"> <?php echo $dados_capa[capa]?></option>
									<option value="----">----</option>
									<option value="sim">sim</option>
									<option value="nao">nao</option>
									<option value="perdeu">perdeu</option>
									<option value="velha">velha</option>
								</select> &nbsp; &nbsp;
								
							<br/> <br/>
								<label> <font color="336699"> Nome: </label> &nbsp; 
								<label> <input name="nome" value="<?php echo $dados_usuario[nomusuario]?>" type="text" size="50" readonly="false"> </label> &nbsp; &nbsp; &nbsp;
							
								<label> <font color="336699"> Setor: </label> &nbsp; 		
								<label> <input name="setor" type="text" size="20" value="<?php echo $dados_usuario[descsetor]?>" readonly="false"> </label>&nbsp; &nbsp; &nbsp;
								
								<label> <font color="336699"> Termo: </label> &nbsp;
								<?php
								$termo= mysql_query("select * from usuariosc where matricula = '$matricula'");
								$dados_termo = mysql_fetch_array($termo);
								?>
								<select size="1" name="termo">
									<option value="<?php echo $dados_termo[termo]?>"> <?php echo $dados_termo[termo]?></option>
									<option value="----">----</option>
									<option value="sim">sim</option>
									<option value="nao">nao</option>
								</select> &nbsp; &nbsp;
								
							<br/> <br/>
							<!-- -->
							<?php if ($movimento_user == "USO"){ ?>
							<label> Data Saida : </label> &nbsp; 
								<input name="data_saida" value="<?php echo $dados_usuario_mov[data_saida] ?>" type="text" size="10" maxlength="10" readonly="false"> &nbsp; &nbsp; &nbsp;
								
								<label> Hora Saida : </label> &nbsp; 
								<input name="hora_saida" value="<?php echo $dados_usuario_mov[hora_saida] ?>" type="text" size="10" maxlength="10" readonly="false">
							<br/> <br/>	
							
								<label> Data Devol: </label> &nbsp; 
								<input name="data_devolucao" value="<?php echo date('Y-m-d') ?>" type="text" size="10" maxlength="10" readonly="false"> &nbsp; &nbsp; &nbsp;
								
								<label> Hora Devol: </label> &nbsp;
								<input name="hora_devolucao" value="<?php echo date('H:i') ?>" type="text" size="10" maxlength="10" readonly="false">
							<?php } else { ?>
								<label> Data Saida : </label> &nbsp; 
								<input name="data_saida" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('Y-m-d')?>"> &nbsp; &nbsp; &nbsp;
								
								<label> Hora Saida : </label> &nbsp; 
								<input name="hora_saida" type="text" size="10" maxlength="10" readonly="false" value="<?php echo date('H:i')?>">
							<br/> <br/>	
							<?php } ?>
							
							<!-- -->
							
							<?php if ($movimento_user == "USO"){ ?>
							<br/> <br/>	
								<label> OBS: </label> <br/>
								<input name="obs_devolucao" align="center" size="70" maxlength="70" type="text" value="<?php echo $dados_usuario_mov[obs_saida] ?>" > <br/> <br/>
								<input type="submit" name="cadastrar" value="CONFIRMA">
							<?php } else { ?>
							<br/> <br/>	
								<label> OBS: </label> <br/>
								<input name="obs_saida"  align="center" size="70" maxlength="70" type="text" > <br/> <br/>
								<input type="submit" name="cadastrar" value="CONFIRMA">
							<?php } ?>
							
							<input type="hidden" name="id" value="<?php echo $dados_usuario_mov[id]?>" >
							<input type="hidden" name="movimento_post" value="<?php echo $dados_usuario_mov[movimento]?>" >
										
							<br/> <br/>
							</td>
							
							</tr>
						</table> 
					</form> 
					<br/><br/>
					<?php } 
					include('../../rodape.php');
					?>
				
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>