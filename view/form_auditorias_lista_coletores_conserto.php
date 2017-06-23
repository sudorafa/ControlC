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
	
	$coletor = mysql_query("select * from consertoc where situacao <> 'filial' and identificador = '$coletor1' and filial = '$filial_usuario_logado' order by atualizacao");
	$linhas_coletor = mysql_num_rows($coletor);
	$uso = $linhas_coletor;
	
	$todos_coletores = mysql_query("select * from consertoc where situacao <> 'filial' and filial = '$filial_usuario_logado' order by identificador");
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
						<label><a href="form_auditorias_coletores_conserto.php " title="Voltar para Movimentação de Usuários"> <img src="/_imagens/btn_voltar.png"></a></label>
						<br/><br/>
						<?php 
						if ($uso_todos == 0) { ?>
						<table cellpadding="0" border="1" width="50%" align="center">
						<tr>
							<td class="title" height="26"> NADA PARA EXIBIR PARA O COLETOR <?php echo $coletor1 ?> </td>
						</tr>
						</table>
						<?php } else { ?>
							
						<h2 align="center"> <font color="336699"> Coletor : <?php echo $coletor1 ?> </font></h2> 

						<br/><br>
							
							<table cellpadding="0" border="1" width="70%" align="center">
							
							<?php 
								if ($uso_todos == 0) { ?>
								<tr>
									<td class="title" height="26"> NADA PARA EXIBIR </td>
								<?php }
							else { ?>
								<td class="title" height="26"> COL. </td>
								<td class="title" height="26"> ATUALIZACAO </td>
								<td class="title" height="26"> RMA </td>
								<td class="title" height="26"> NFE SAIDA </td>
								<td class="title" height="26"> DEFEITO </td>
								<td class="title" height="26"> ALMOX </td>
								<td class="title" height="26"> SITUACAO </td>
							</tr>
								<?php }
									while ($dados_todos_coletores = mysql_fetch_array($todos_coletores)){
								?>
							<tr>
								<td class="corpo" height="26" > <?php echo $dados_todos_coletores[identificador]?> </td>
								<td class="corpo" height="26" > <?php echo $dados_todos_coletores[atualizacao]?> </td>
								<td class="corpo" height="26" > <?php echo $dados_todos_coletores[rma]?></a> </td>
								<td class="corpo" height="26" > <?php echo $dados_todos_coletores[nfe]?></a> </td>
								<td class="corpo" height="26" > <?php echo $dados_todos_coletores[defeito]?> </td>
								<td class="corpo" height="26" > <?php echo $dados_todos_coletores[almox]?></a> </td>
								<td class="corpo" height="26" > <?php echo $dados_todos_coletores[situacao]?></a> </td>
							</tr>
							
							<?php } };?>
							
							</table>
							
							

							<br/> <br>
							

							<?php
						} else {

						?>



						<br/>
						<label><a href="form_auditorias_coletores_conserto.php " title="Voltar para Movimentação de Usuários"> <img src="/_imagens/btn_voltar.png"></a></label>
						<br/><br/>
							<?php 
							if ($uso == 0) { ?>
							<table cellpadding="0" border="1" width="50%" align="center">
							<tr>
								<td class="title"  height="26"> NADA PARA EXIBIR PARA O COLETOR <?php echo $coletor1 ?> </td>
							</tr>
							</table>
							<?php } else { ?>
							
						<h2 align="center"> <font color="336699"> Coletor : <?php echo $coletor1 ?> </font></h2> 

						<br/><br>
							
							<table cellpadding="0" border="1" width="70%" align="center">
							
							<?php 
								if ($uso == 0) { ?>
								<tr>
									<td class="title" height="26"> NADA PARA EXIBIR </td>
								<?php }
								else { ?>
									<td class="title" height="26"> ATUALIZACAO </td>
									<td class="title" height="26"> RMA </td>
									<td class="title" height="26"> NFE SAIDA </td>
									<td class="title" height="26"> DEFEITO </td>
									<td class="title" height="26"> ALMOX </td>
									<td class="title" height="26"> SITUACAO </td>
							</tr>
								<?php }
									while ($dados_coletor = mysql_fetch_array($coletor)){
								?>
							<tr>
								<td class="corpo" height="26" > <?php echo $dados_coletor[atualizacao]?> </td>
								<td class="corpo" height="26" > <?php echo $dados_coletor[rma]?></a> </td>
								<td class="corpo" height="26" > <?php echo $dados_coletor[nfe]?></a> </td>
								<td class="corpo" height="26" > <?php echo $dados_coletor[defeito]?> </td>
								<td class="corpo" height="26" > <?php echo $dados_coletor[almox]?></a> </td>
								<td class="corpo" height="26" > <?php echo $dados_coletor[situacao]?></a> </td>
							</tr>
							
							<?php } };?>
							
							</table>
							
							

							<br/> <br/>

						<?php } ;
						include('../../rodape.php');?>
		
				</div>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>