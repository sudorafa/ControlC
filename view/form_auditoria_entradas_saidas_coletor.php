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
	
	$coletor1		= $_POST["coletor"]; 
	$data_inicio1	= $_POST["data_inicio"]; 
	$data_fim1		= $_POST["data_fim"]; 
	
	$coletor = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and coletor = '$coletor1' and filial = '$filial_usuario_logado' order by data_saida");
	$linhas_coletor = mysql_num_rows($coletor);
	$uso = $linhas_coletor;
	
	$todos_coletores = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and filial = '$filial_usuario_logado' order by data_saida");
	$linhas_todos_coletor = mysql_num_rows($todos_coletores);
	$uso_todos = $linhas_todos_coletor;
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
				<?php
					if ($coletor1 == "TODOS") { ?>
						<br/>
						<label><a href="form_auditorias_movimentacao_coletores.php " title="Voltar para Movimentação de Usuários"> <img src="/_imagens/btn_voltar.png"></a></label>
						<br/><br/>

						<?php 
						if ($uso_todos == 0) { ?>
						<table cellpadding="0" border="1" width="50%" align="center">
						<tr>
							<td class="title" height="26"> NADA PARA EXIBIR </td>
							<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
						</tr>
						</table>
						<?php } else { ?>
						
						<h2 align="center"> <font color="336699"> Coletor : <?php echo $coletor1 ?> </font></h2> 
						<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
						<br/> <br/>
						
						<table cellpadding="0" border="1" width="100%" align="center">
						
						<?php 
							if ($uso_todos == 0) { ?>
							<tr>
								<td class="title" height="26"> NADA PARA EXIBIR </td>
							<?php }
							else { ?>
								<td class="title" width="100" height="26"> COL. </td>
								<td class="title" width="100" height="26"> MAT </td>
								<td class="title" width="300" height="26"> NOME </td>
								<td class="title" width="100" height="26"> DATA SAIDA </td>
								<td class="title" width="50" height="26"> HORA SAIDA </td>
								<td class="title" width="300" height="26"> OBS SAIDA </td>
								<td class="title" width="100" height="26"> DATA DEVOL </td>
								<td class="title" width="50" height="26"> HORA DEVOL </td>
								<td class="title" width="300" height="26"> OBS DEVOLUCAO </td>
						</tr>
							<?php }
								while ($dados_todos_coletores = mysql_fetch_array($todos_coletores)){
							?>
						<tr>
								<td class="corpo" width="100" height="26" > <?php echo $dados_todos_coletores[coletor]?> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_todos_coletores[matricula_user]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_todos_coletores[nome_user]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_todos_coletores[data_saida]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_todos_coletores[hora_saida]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_todos_coletores[obs_saida]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_todos_coletores[data_devolucao]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_todos_coletores[hora_devolucao]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_todos_coletores[obs_devolucao]?></a> </td>
						</tr>
						
						<?php } };?>
						
						</table>
						
						

						<br/>  <br/>
						

						<?php
					} else {

					?>



						<br/>
						<label><a href="form_auditorias_movimentacao_coletores.php " title="Voltar para Movimentação de Usuários"> <img src="/_imagens/btn_voltar.png"></a></label>
						<br/><br/>

						<?php 
						if ($uso == 0) { ?>
						<table cellpadding="0" border="1" width="50%" align="center">
						<tr>
							<td class="title" height="26"> NADA PARA EXIBIR PARA O COLETOR <?php echo $coletor1 ?> </td>
							<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
						</tr>
						</table>
						<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
						<?php } else { ?>
						
					<h2 align="center"> <font color="336699"> Coletor : <?php echo $coletor1 ?> </font></h2> 
					<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
					<br/> <br/>
						
						<table cellpadding="0" border="1" width="100%" align="center">
						
						<?php 
							if ($uso == 0) { ?>
							<tr>
								<td class="title" width="100" height="26"> NADA PARA EXIBIR </td>
								<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
							<?php }
							else { ?>
								<td class="title" width="100" height="26"> MAT </td>
								<td class="title" width="300" height="26"> NOME </td>
								<td class="title" width="100" height="26"> DATA SAIDA </td>
								<td class="title" width="50" height="26"> HORA SAIDA </td>
								<td class="title" width="300" height="26"> OBS SAIDA </td>
								<td class="title" width="100" height="26"> DATA DEVOL </td>
								<td class="title" width="50" height="26"> HORA DEVOL </td>
								<td class="title" width="300" height="26"> OBS DEVOLUCAO </td>
						</tr>
							<?php }
								while ($dados_coletor = mysql_fetch_array($coletor)){
							?>
						<tr>
								<td class="corpo" width="100" height="26" > <?php echo $dados_coletor[matricula_user]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_coletor[nome_user]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_coletor[data_saida]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_coletor[hora_saida]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_coletor[obs_saida]?></a> </td>
								<td class="corpo" width="100" height="26" > <?php echo $dados_coletor[data_devolucao]?></a> </td>
								<td class="corpo" width="50" height="26" > <?php echo $dados_coletor[hora_devolucao]?> </td>
								<td class="corpo" width="300" height="26" > <?php echo $dados_coletor[obs_devolucao]?></a> </td>
						</tr>
						
						<?php } };?>
						
						</table>
						
						<br/>


					<?php } ;
					include('../../rodape.php');?>
				</div>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>