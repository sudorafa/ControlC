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
				<br/>
				<h2 align="center"> <font color="336699"> Movimentação Usuários </font></h2> 
                <br/>
				<div align="center">
					<table cellpadding="0" border="1" width="100%" align="center">
						<tr align="center">
							<form action="form_auditoria_entradas_saidas_usuario.php" method="post" name="form_auditoria_entradas_saidas_usuario" align="center" onSubmit="return valida_dados(this)">
							<td class="corpo">
							<br/> <br/>
							
							<?php 
								$usuario = mysql_query("select * from usuariosc where filial = '$filial_usuario_logado' order by nomusuario");
							?>
								
								&nbsp; &nbsp; &nbsp;
								<label> <font color="336699"> Nome: </label> &nbsp;
								<select size="1" name="usuario">
									<?php
										while ($dados_usuario = mysql_fetch_array($usuario)){
									?>
										<option value="<?php echo $dados_usuario[nomusuario]?>"> <?php echo $dados_usuario[nomusuario]?></option>
									<?php }?>
								</select> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
								<br/> <br/> <br/> 
								<label> <font color="336699">  Data Inicio: </label> &nbsp;
								<input name="data_inicio" type="text"  value="<?php echo  date('Y-m-d')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
								<label> <font color="336699">  Data Fim: </label> &nbsp;
								<input name="data_fim" type="text"  value="<?php echo  date('Y-m-d')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp;
							<br/> <br/> <br/>
							<center><input type="submit" value="gerar relatorio" name="gerar_relatorio"><center>
							<br/> <br/>	
							</td>
							</form>
							<td/>
							<form action="form_auditoria_entradas_saidas_setor.php" method="post" name="form_auditoria_entradas_saidas_setor" align="center" onSubmit="return valida_dados(this)">
							<td class="corpo">
							<br/> <br/>
								&nbsp; &nbsp; &nbsp;
								
								<label> <font color="336699">  Usuários por Setor: </label> &nbsp;
								<select size="1" name="setor">
								<option value="TODOS"> TODOS </option> 
								<?php
									$setor= mysql_query("select * from setorc where codsetor < '7'"); 
								?>
								<?php
									while ($setor_1 = mysql_fetch_array($setor)){
								?>
									<option value="<?php echo $setor_1[descsetor]?>"> <?php echo $setor_1[descsetor]?></option>
								<?php }?>	
								</select> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								<br/> <br/> <br/> 
								<label> <font color="336699">  Data Inicio: </label> &nbsp;
								<input name="data_inicio" type="text"  value="<?php echo  date('Y-m-d')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
								<label> <font color="336699">  Data Fim: </label> &nbsp;
								<input name="data_fim" type="text"  value="<?php echo  date('Y-m-d')?>" size=10 maxlength="10" > &nbsp; &nbsp; &nbsp;
							<br/> <br/> <br/>
							<center><input type="submit" value="gerar relatorio" name="gerar_relatorio"><center>
							<br/> <br/>
							</td>
							</form>
					</tr>
					</table>
					<br/>

					<label><a href="form_auditorias.php " title="Voltar para Auditorias"> <img src="/_imagens/btn_voltar.png"></a></label>
				</div>
				<br/><br/>
					<?php include('../../rodape.php');?>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>