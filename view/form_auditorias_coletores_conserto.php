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
    <body>
		<div id="interface">
			<?php include('../menu.php'); ?>
            <div id="Conteudo">
                <div align="center">
					<br/>
					<h2 align="center"> <font color="336699"> Coletores Conserto </font></h2> 
					<br/><br/>
					<table cellpadding="0" border="1" width="40%" align="center">
					<tr align="center">
						<form action="form_auditorias_lista_coletores_conserto.php" method="post" name="form_auditorias_lista_coletores_conserto" align="center" onSubmit="return valida_dados(this)">
						<td class="corpo">
						<br/> <br/>
						<?php 
							$coletor = mysql_query("select * from coletores where filial = '$filial_usuario_logado' order by identificador");
						?>
							
							&nbsp; &nbsp; &nbsp;
							<label> <font color="336699"> Coletores: </label> &nbsp;
							<select size="1" name="coletor">
								<option value="TODOS"> TODOS </option>
								<?php
									while ($dados_coletor = mysql_fetch_array($coletor)){
								?>
									<option value="<?php echo $dados_coletor[identificador]?>"> <?php echo $dados_coletor[identificador]?></option>
								<?php }?>
							</select> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
							<br/> <br/> <br/> 
						<center><input type="submit" value="gerar relatorio" name="gerar_relatorio"><center>
						<br/> <br/>	
						</td>
						</form>
						
					</tr>
					</table>

					<br/><br/><br/>
					<label><a href="form_auditorias.php " title="Voltar para Movimentação de Usuários"> <img src="/_imagens/btn_voltar.png"></a></label>
					<br/><br/><br/><br/>
					<?php include('../../rodape.php');?>
				<div>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>