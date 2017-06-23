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
	
	include('../cabecalho.php');
	
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
	
	$setor1			= $_POST["setor"]; 
	$data_inicio1	= $_POST["data_inicio"]; 
	$data_fim1		= $_POST["data_fim"]; 
	
	$usuarios_loja = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and setor_user = 'LOJA' and filial = '$filial_usuario_logado' order by nome_user");
	$linhas_usuarios_loja = mysql_num_rows($usuarios_loja);
	$uso_loja = $linhas_usuarios_loja;
	
	$usuarios_prevencao = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and setor_user = 'PREVENCAO' and filial = '$filial_usuario_logado' order by nome_user");
	$linhas_usuarios_prevencao = mysql_num_rows($usuarios_prevencao);
	$uso_prevencao = $linhas_usuarios_prevencao;
	
	$usuarios_fcx = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and setor_user = 'F. CAIXA' and filial = '$filial_usuario_logado' order by nome_user");
	$linhas_usuarios_fcx = mysql_num_rows($usuarios_fcx);
	$uso_fcx = $linhas_usuarios_fcx;
	
	$usuarios_deposito = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and setor_user = 'DEPOSITO' and filial = '$filial_usuario_logado' order by nome_user");
	$linhas_usuarios_deposito = mysql_num_rows($usuarios_deposito);
	$uso_deposito = $linhas_usuarios_deposito;
	
	$usuarios_gerencia = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and setor_user = 'GERENCIA' and filial = '$filial_usuario_logado' order by nome_user");
	$linhas_usuarios_gerencia = mysql_num_rows($usuarios_gerencia);
	$uso_gerencia = $linhas_usuarios_gerencia;
	
	$usuarios_frios = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and setor_user = 'FRIOS' and filial = '$filial_usuario_logado' order by nome_user");
	$linhas_usuarios_frios = mysql_num_rows($usuarios_frios);
	$uso_frios = $linhas_usuarios_frios;
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
    <body>
		<div id="interface">
			<?php include('../menu.php'); ?>
            <div id="Conteudo">
				<div align="center">
					<br/>
					<label><a href="form_auditorias_movimentacao_usuarios.php " title="Voltar para Movimentação de Usuários"> <img src="/_imagens/btn_voltar.png"></a></label>
					<br/><br/>
					<h2 align="center"> <font color="336699"> Usuarios Setor : <?php echo $setor1 ?> </font></h2> 
					<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
					<br/>
					<?php if ($setor1 == "TODOS" or $setor1 == "LOJA") { ?>
						<table cellpadding="0" border="1" width="100%" align="center">
						<?php
							if ($uso_loja == 0) { ?>
							<tr>
							<?php if ($setor1 == "TODOS") { ?>
								<br>
								<h3 align="center"> <font color="336699"> LOJA </font></h3> 
							<?php } else {} ?>
								<td class="title" height="26"> NADA PARA EXIBIR </td>
							<?php }
							else { ?>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> LOJA </font></h3> 
								<?php } else {} ?>
								<td class="title" width="100" height="26"> MAT </td>
								<td class="title" width="300" height="26"> NOME </td>
								<td class="title" width="50" height="26"> COL </td>
								<td class="title" width="100" height="26"> DATA SAIDA </td>
								<td class="title" width="50" height="26"> HORA SAIDA </td>
								<td class="title" width="300" height="26"> OBS SAIDA </td>
								<td class="title" width="100" height="26"> DATA DEVOL </td>
								<td class="title" width="50" height="26"> HORA DEVOL </td>
								<td class="title" width="300" height="26"> OBS DEVOLUCAO </td>
						</tr>
							<?php }
								while ($dados_usuarios_loja = mysql_fetch_array($usuarios_loja)){
							?>
						<tr>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_loja[matricula_user]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_loja[nome_user]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_loja[coletor]?> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_loja[data_saida]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_loja[hora_saida]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_loja[obs_saida]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_loja[data_devolucao]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_loja[hora_devolucao]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_loja[obs_devolucao]?></a> </td>
						<?php };?>
						</tr>
						<?php };?>
						
						</table>

						<?php if ($setor1 == "TODOS" or $setor1 == "PREVENCAO") { ?>
						<table cellpadding="0" border="1" width="100%" align="center">
						<?php 
							if ($uso_prevencao == 0) { ?>
							<tr>
							<?php if ($setor1 == "TODOS") { ?>
								<br>
								<h3 align="center"> <font color="336699"> PREVENCAO </font></h3> 
							<?php } else {} ?>
								<td class="title" height="26"> NADA PARA EXIBIR </td>
							<?php }
							else { ?>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> PREVENCAO </font></h3> 
								<?php } else {} ?>
								<td class="title" width="100" height="26"> MAT </td>
								<td class="title" width="300" height="26"> NOME </td>
								<td class="title" width="50" height="26"> COL </td>
								<td class="title" width="100" height="26"> DATA SAIDA </td>
								<td class="title" width="50" height="26"> HORA SAIDA </td>
								<td class="title" width="300" height="26"> OBS SAIDA </td>
								<td class="title" width="100" height="26"> DATA DEVOL </td>
								<td class="title" width="50" height="26"> HORA DEVOL </td>
								<td class="title" width="300" height="26"> OBS DEVOLUCAO </td>
						</tr>
							<?php }
								while ($dados_usuarios_prevencao = mysql_fetch_array($usuarios_prevencao)){
							?>
						<tr>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_prevencao[matricula_user]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_prevencao[nome_user]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_prevencao[coletor]?> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_prevencao[data_saida]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_prevencao[hora_saida]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_prevencao[obs_saida]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_prevencao[data_devolucao]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_prevencao[hora_devolucao]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_prevencao[obs_devolucao]?></a> </td>
						</tr>
						
						<?php };?>
						</table>
						<?php };?>

						<?php if ($setor1 == "TODOS" or $setor1 == "F. CAIXA") { ?>
						<table cellpadding="0" border="1" width="100%" align="center">
						
						<?php
							if ($uso_fcx == 0) { ?>
							<tr>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> F. CAIXA </font></h3> 
								<?php } else {} ?>
								<td class="title" height="26"> NADA PARA EXIBIR </td>
							<?php }
							else { ?>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> F. CAIXA </font></h3> 
								<?php } else {} ?>
								<td class="title" width="100" height="26"> MAT </td>
								<td class="title" width="300" height="26"> NOME </td>
								<td class="title" width="50" height="26"> COL </td>
								<td class="title" width="100" height="26"> DATA SAIDA </td>
								<td class="title" width="50" height="26"> HORA SAIDA </td>
								<td class="title" width="300" height="26"> OBS SAIDA </td>
								<td class="title" width="100" height="26"> DATA DEVOL </td>
								<td class="title" width="50" height="26"> HORA DEVOL </td>
								<td class="title" width="300" height="26"> OBS DEVOLUCAO </td>
						</tr>
						
							<?php }
								while ($dados_usuarios_fcx = mysql_fetch_array($usuarios_fcx)){
							?>
						<tr>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_fcx[matricula_user]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_fcx[nome_user]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_fcx[coletor]?> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_fcx[data_saida]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_fcx[hora_saida]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_fcx[obs_saida]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_fcx[data_devolucao]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_fcx[hora_devolucao]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_fcx[obs_devolucao]?></a> </td>
						</tr>
						
						<?php };?>
						</table>
						<?php };?>

						<?php if ($setor1 == "TODOS" or $setor1 == "DEPOSITO") { ?>
						<table cellpadding="0" border="1" width="100%" align="center">
						<?php 
							if ($uso_deposito == 0) { ?>
							<tr>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> DEPOSITO </font></h3> 
								<?php } else {} ?>
								<td class="title" height="26"> NADA PARA EXIBIR </td>
							<?php }
							else { ?>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> DEPOSITO </font></h3> 
								<?php } else {} ?>
								<td class="title" width="100" height="26"> MAT </td>
								<td class="title" width="300" height="26"> NOME </td>
								<td class="title" width="50" height="26"> COL </td>
								<td class="title" width="100" height="26"> DATA SAIDA </td>
								<td class="title" width="50" height="26"> HORA SAIDA </td>
								<td class="title" width="300" height="26"> OBS SAIDA </td>
								<td class="title" width="100" height="26"> DATA DEVOL </td>
								<td class="title" width="50" height="26"> HORA DEVOL </td>
								<td class="title" width="300" height="26"> OBS DEVOLUCAO </td>
								
						</tr>
							<?php }
								while ($dados_usuarios_deposito = mysql_fetch_array($usuarios_deposito)){
							?>
						<tr>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_deposito[matricula_user]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_deposito[nome_user]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_deposito[coletor]?> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_deposito[data_saida]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_deposito[hora_saida]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_deposito[obs_saida]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_deposito[data_devolucao]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_deposito[hora_devolucao]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_deposito[obs_devolucao]?></a> </td>
						</tr>
						<?php };?>
						</table>
						<?php };?>
						
						<?php if ($setor1 == "TODOS" or $setor1 == "GERENCIA") { ?>
						<table cellpadding="0" border="1" width="100%" align="center">
						<?php
							if ($uso_gerencia == 0) { ?>
							<tr>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> GERENCIA </font></h3> 
								<?php } else {} ?>
								<td class="title" height="26"> NADA PARA EXIBIR </td>
							<?php }
							else { ?>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> GERENCIA </font></h3> 
								<?php } else {} ?>
								<td class="title" width="100" height="26"> MAT </td>
								<td class="title" width="300" height="26"> NOME </td>
								<td class="title" width="50" height="26"> COL </td>
								<td class="title" width="100" height="26"> DATA SAIDA </td>
								<td class="title" width="50" height="26"> HORA SAIDA </td>
								<td class="title" width="300" height="26"> OBS SAIDA </td>
								<td class="title" width="100" height="26"> DATA DEVOL </td>
								<td class="title" width="50" height="26"> HORA DEVOL </td>
								<td class="title" width="300" height="26"> OBS DEVOLUCAO </td>
						</tr>
							<?php }
								while ($dados_usuarios_gerencia = mysql_fetch_array($usuarios_gerencia)){
							?>
						<tr>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_gerencia[matricula_user]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_gerencia[nome_user]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_gerencia[coletor]?> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_gerencia[data_saida]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_gerencia[hora_saida]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_gerencia[obs_saida]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_gerencia[data_devolucao]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_gerencia[hora_devolucao]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_gerencia[obs_devolucao]?></a> </td>
						</tr>
						<?php };?>
						</table>
						<?php };?>

						<?php if ($setor1 == "TODOS" or $setor1 == "FRIOS") { ?>
						<table cellpadding="0" border="1" width="100%" align="center">
						<?php
							if ($uso_frios == 0) { ?>
							<tr>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> FRIOS </font></h3> 
								<?php } else {} ?>
								<td class="title" height="26"> NADA PARA EXIBIR </td>
							<?php }
							else { ?>
								<?php if ($setor1 == "TODOS") { ?>
									<br>
									<h3 align="center"> <font color="336699"> FRIOS </font></h3> 
								<?php } else {} ?>
								<td class="title" width="100" height="26"> MAT </td>
								<td class="title" width="300" height="26"> NOME </td>
								<td class="title" width="50" height="26"> COL </td>
								<td class="title" width="100" height="26"> DATA SAIDA </td>
								<td class="title" width="50" height="26"> HORA SAIDA </td>
								<td class="title" width="300" height="26"> OBS SAIDA </td>
								<td class="title" width="100" height="26"> DATA DEVOL </td>
								<td class="title" width="50" height="26"> HORA DEVOL </td>
								<td class="title" width="300" height="26"> OBS DEVOLUCAO </td>
						</tr>
							<?php }
								while ($dados_usuarios_frios = mysql_fetch_array($usuarios_frios)){
							?>
						<tr>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_frios[matricula_user]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_frios[nome_user]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_frios[coletor]?> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_frios[data_saida]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_frios[hora_saida]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_frios[obs_saida]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios_frios[data_devolucao]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios_frios[hora_devolucao]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios_frios[obs_devolucao]?></a> </td>
						</tr>
						
						<?php } ;?>
						</table>
						<?php } ;?>
				</div>
				<br/>
				<?php include('../../rodape.php');?>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>