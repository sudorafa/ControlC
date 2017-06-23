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
	
	$usuario1		= $_POST["usuario"]; 
	$data_inicio1	= $_POST["data_inicio"]; 
	$data_fim1		= $_POST["data_fim"]; 
	
	$usuarios = mysql_query("select * from mov_coletores where data_saida >= '$data_inicio1' and data_saida <= '$data_fim1' and nome_user = '$usuario1' and filial = '$filial_usuario_logado'");
	$linhas_usuarios = mysql_num_rows($usuarios);
	$uso = $linhas_usuarios;
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
    <body>
		<div id="interface">
            <div id="Conteudo">
				<?php include('../menu.php'); ?>
				<div align="center">
					<br/>
					<label><a href="form_auditorias_movimentacao_usuarios.php " title="Voltar para Movimentação de Usuários"> <img src="/_imagens/btn_voltar.png"></a></label>
					<br/><br/>
					<?php 
					if ($uso == 0) { ?>
						<table cellpadding="0" border="1" width="100%" align="center">
						<tr>
							<td class="title" height="26"> NADA PARA EXIBIR PARA O USUARIO : <?php echo $usuario1 ?> </td>
							<br/>
							<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
						</tr>
						</table>
						<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
					<?php } else { ?>
				
					<h2 align="center"> <font color="336699"> <?php echo $usuario1 ?></font></h2> 
					<h5 align="center"> <font color="336699"> Data Inicio : <?php echo $data_inicio1 ?> Fim : <?php echo $data_fim1 ?> </font>
					<br/> <br/>
					
					<table cellpadding="0" border="1" width="100%" align="center">
					
					<?php 
						if ($uso == 0) { ?>
						<tr>
							<td class="title" height="26"> NADA PARA EXIBIR </td>
						<?php }
						else { ?>
							<td class="title" width="50" height="26"> COL </td>
							<td class="title" width="100" height="26"> DATA SAIDA </td>
							<td class="title" width="50" height="26"> HORA SAIDA </td>
							<td class="title" width="300" height="26"> OBS SAIDA </td>
							<td class="title" width="100" height="26"> DATA DEVOL </td>
							<td class="title" width="50" height="26"> HORA DEVOL </td>
							<td class="title" width="300" height="26"> OBS DEVOLUCAO </td>
					</tr>
						<?php }
							while ($dados_usuarios = mysql_fetch_array($usuarios)){
						?>
					<tr>
							<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios[coletor]?> </td>
							<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios[data_saida]?></a> </td>
							<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios[hora_saida]?> </td>
							<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios[obs_saida]?></a> </td>
							<td class="corpo" width="100" height="26" > <?php echo $dados_usuarios[data_devolucao]?></a> </td>
							<td class="corpo" width="50" height="26" > <?php echo $dados_usuarios[hora_devolucao]?> </td>
							<td class="corpo" width="300" height="26" > <?php echo $dados_usuarios[obs_devolucao]?></a> </td>
					</tr>
					
					<?php } };?>
					
					</table>
				</div>
                <br/>
				<?php include('../../rodape.php');?>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>