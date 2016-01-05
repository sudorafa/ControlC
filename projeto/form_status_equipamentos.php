<?php
session_start();
	$idusuario	= $_SESSION["idusuario"];
	$mensagem 	= $_SESSION["mensagem"];
			
	include('libera.php');
	
	include('conecta.php');
	
	/*if ( $_SESSION[libera] == "ok" ){
		include("index.php");
	
	}*/
	
	// filial usuario logado
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
	
	// dados qtdc
	$qtd = mysql_query("select * from qtdc where filial = '$filial_usuario_logado'");
	$dados_qtd = mysql_fetch_array($qtd);
	
	//quantidades de linhas com o uso pelos setores
	$loja = mysql_query("select * from coletores where status = 'LOJA' and filial = '$filial_usuario_logado'");
	$dados_loja = mysql_num_rows($loja);
	$uso_loja = $dados_loja;
	
	$prevencao = mysql_query("select * from coletores where status = 'PREVENCAO' and filial = '$filial_usuario_logado'");
	$dados_prevencao = mysql_num_rows($prevencao);
	$uso_prevencao = $dados_prevencao;
	
	$fcx = mysql_query("select * from coletores where status = 'F. CAIXA' and filial = '$filial_usuario_logado'");
	$dados_fcx = mysql_num_rows($fcx);
	$uso_fcx = $dados_fcx;
	
	$deposito = mysql_query("select * from coletores where status = 'DEPOSITO' and filial = '$filial_usuario_logado'");
	$dados_deposito = mysql_num_rows($deposito);
	$uso_deposito = $dados_deposito;
	
	$gerencia = mysql_query("select * from coletores where status = 'GERENCIA' and filial = '$filial_usuario_logado'");
	$dados_gerencia = mysql_num_rows($gerencia);
	$uso_gerencia = $dados_gerencia;
	
	$frios = mysql_query("select * from coletores where status = 'FRIOS' and filial = '$filial_usuario_logado'");
	$dados_frios = mysql_num_rows($frios);
	$uso_frios = $dados_frios;
	
	$conserto = mysql_query("select * from coletores where status = 'CONSERTO' and filial = '$filial_usuario_logado'");
	$dados_conserto = mysql_num_rows($conserto);
	$uso_conserto = $dados_conserto;
	//------------------------------
	
	//dados dos coletores em movimento pelos setores
	$lista_loja_manha = mysql_query("select * from mov_coletores where hora_saida >= '00:01' and hora_saida <='11:59' and movimento = 'USO' and setor_user = 'LOJA' and filial = '$filial_usuario_logado' order by coletor");
	$dados_loja_manha = mysql_num_rows($lista_loja_manha);
	$uso_loja_manha = $dados_loja_manha;
	
	$lista_loja_tarde_noite = mysql_query("select * from mov_coletores where hora_saida >= '12:00' and hora_saida <='23:59' and movimento = 'USO' and setor_user = 'LOJA' and filial = '$filial_usuario_logado' order by coletor");
	$dados_loja_tarde_noite = mysql_num_rows($lista_loja_tarde_noite);
	$uso_loja_tarde_noite = $dados_loja_tarde_noite;
	
	$lista_prevencao = mysql_query("select * from mov_coletores where movimento = 'USO' and setor_user = 'PREVENCAO' and filial = '$filial_usuario_logado' order by coletor");
	
	$lista_fcx = mysql_query("select * from mov_coletores where movimento = 'USO' and setor_user = 'F. CAIXA' and filial = '$filial_usuario_logado' order by coletor");
	
	$lista_deposito = mysql_query("select * from mov_coletores where movimento = 'USO' and setor_user = 'DEPOSITO' and filial = '$filial_usuario_logado' order by coletor");
	
	$lista_gerencia = mysql_query("select * from mov_coletores where movimento = 'USO' and setor_user = 'GERENCIA' and filial = '$filial_usuario_logado' order by coletor");
	
	$lista_frios = mysql_query("select * from mov_coletores where movimento = 'USO' and setor_user = 'FRIOS' and filial = '$filial_usuario_logado' order by coletor");
	
	$lista_conserto = mysql_query("select * from consertoc where situacao = 'conserto' and filial = '$filial_usuario_logado' order by identificador");
	$linhas_conserto = mysql_num_rows($lista_conserto);
	$uso_conserto = $linhas_conserto;
	
	$lista_coletores = mysql_query("select * from coletores where status = 'CONSERTO' and filial = '$filial_usuario_logado' order by identificador");
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



<br>
<h2 align="center"> <font color="336699"> Status dos Equipamentos </font></h2> 


<table cellpadding="0" border="0" width="80%" align="center">
	<td> 
		<table cellpadding="0" border="1" width="99%" height="26" >
			<tr>
				<td align="center" height="26"> SETOR LOJA (<?php echo $uso_loja ?> / <?php echo $dados_qtd[qtd_loja] ?>) </td>
			</tr>
		</table >
		<table cellpadding="0" border="1" width="49%" height="26" align="center" style="float:left;">
		<tr height="26">
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SAIDAS DA MANHA (<?php echo $uso_loja_manha ?>)</td>
		</tr>
		<tr>
			<?php if ($uso_loja_manha == 0) { ?>
				<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
			<?php }
				else { ?>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
			<?php } ?>
		</tr>
		<?php
			while ($lista_loja_manha2 = mysql_fetch_array($lista_loja_manha)){
		?>
		<tr>
			<td color="336699" align="center" width="90" height="26"><?php echo $lista_loja_manha2[data_saida]?></td>
			<td color="336699" align="center" width="300" height="26"><?php echo $lista_loja_manha2[nome_user]?></td>
			<td color="336699" align="center" width="50" height="26" > <a href="query_baixa_por_identificador.php?coletor=<?php echo $lista_loja_manha2[coletor] ?>&movimento=USO&tipo=lista"><?php echo Strtoupper($lista_loja_manha2[coletor])?></a> </td>
		<?php };?>
		</tr>
		</table>
		
		<table cellpadding="0" border="1" width="49%" height="26" align="center">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SAIDAS DA TARDE / NOITE (<?php echo $uso_loja_tarde_noite ?>)</td>
		</tr>
		<tr>
			<?php if ($uso_loja_tarde_noite == 0) { ?>
				<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
			<?php }
				else { ?>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
			<?php } ?>
		</tr>
		<?php
			while ($lista_loja_tarde_noite2 = mysql_fetch_array($lista_loja_tarde_noite)){
		?>
		<tr>
			<td color="336699" align="center" width="90" height="26"><?php echo $lista_loja_tarde_noite2[data_saida]?></td>
			<td color="336699" align="center" width="300" height="26"><?php echo $lista_loja_tarde_noite2[nome_user]?></td>
			<td color="336699" align="center" width="50" height="26" > <a href="query_baixa_por_identificador.php?coletor=<?php echo $lista_loja_tarde_noite2[coletor] ?>&movimento=USO&tipo=lista"><?php echo Strtoupper($lista_loja_tarde_noite2[coletor])?></a> </td>
		<?php };?>
		</tr>
		</table>
		<br>
	</td>
</tr>
</table>

<br>

<table cellpadding="0" border="0" width="80%" align="center">
<tr> 
	<td> 
		<table cellpadding="0" border="1" width="49%" height="26" align="center" style="float:left;">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR PREVENCAO (<?php echo $uso_prevencao ?> / <?php echo $dados_qtd[qtd_prev] ?>) </td>
		</tr>
		<tr>
			<?php if ($uso_prevencao == 0) { ?>
				<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
			<?php }
				else { ?>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
			<?php } ?>
		</tr>
		<?php
			while ($lista_prevencao2 = mysql_fetch_array($lista_prevencao)){
		?>
		<tr>
			<td color="336699" align="center" width="90" height="26"><?php echo $lista_prevencao2[data_saida]?></td>
			<td color="336699" align="center" width="300" height="26"><?php echo $lista_prevencao2[nome_user]?></td>
			<td color="336699" align="center" width="50" height="26" > <a href="query_baixa_por_identificador.php?coletor=<?php echo $lista_prevencao2[coletor] ?>&movimento=USO&tipo=lista"><?php echo Strtoupper($lista_prevencao2[coletor])?></a> </td>
		<?php };?>
		</tr>
		</table>
		
		<table cellpadding="0" border="1" width="49%" height="26" align="center">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR F. CAIXA (<?php echo $uso_fcx ?> / <?php echo $dados_qtd[qtd_fcx] ?>) </td>
		</tr>
		<tr>
			<?php if ($uso_fcx == 0) { ?>
				<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
			<?php }
				else { ?>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
			<?php } ?>
		</tr>
		<?php
			while ($lista_fcx2 = mysql_fetch_array($lista_fcx)){
		?>
		<tr>
			<td color="336699" align="center" width="90" height="26"><?php echo $lista_fcx2[data_saida]?></td>
			<td color="336699" align="center" width="300" height="26"><?php echo $lista_fcx2[nome_user]?></td>
			<td color="336699" align="center" width="50" height="26" > <a href="query_baixa_por_identificador.php?coletor=<?php echo $lista_fcx2[coletor] ?>&movimento=USO&tipo=lista"><?php echo Strtoupper($lista_fcx2[coletor])?></a> </td>
		<?php };?>
		</tr>
		</table>
		<br>
	</td>
</tr>
</table>

<br>

<table cellpadding="0" border="0" width="80%" align="center">
<tr> 
	<td>
		<table cellpadding="0" border="1" width="49%" height="26" align="center" style="float:left;">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR DEPOSITO (<?php echo $uso_deposito ?> / <?php echo $dados_qtd[qtd_deposito] ?>) </td>
		</tr>
		<tr>
			<?php if ($uso_deposito == 0) { ?>
				<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
			<?php }
				else { ?>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
			<?php } ?>
		</tr>
		<?php
			while ($lista_deposito2 = mysql_fetch_array($lista_deposito)){
		?>
		<tr>
			<td color="336699" align="center" width="90" height="26"><?php echo $lista_deposito2[data_saida]?></td>
			<td color="336699" align="center" width="300" height="26"><?php echo $lista_deposito2[nome_user]?></td>
			<td color="336699" align="center" width="50" height="26" > <a href="query_baixa_por_identificador.php?coletor=<?php echo $lista_deposito2[coletor] ?>&movimento=USO&tipo=lista"><?php echo Strtoupper($lista_deposito2[coletor])?></a> </td>
		<?php };?>
		</tr>
		</table>
		
		<table cellpadding="0" border="1" width="49%" height="26" align="center">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR FRIOS (<?php echo $uso_frios ?> / <?php echo $dados_qtd[qtd_frios] ?>) </td>
		</tr>
		<tr>
			<?php if ($uso_frios == 0) { ?>
				<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
			<?php }
				else { ?>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
			<?php } ?>
		</tr>
		<?php
			while ($lista_frios2 = mysql_fetch_array($lista_frios)){
		?>
		<tr>
			<td color="336699" align="center" width="90" height="26"><?php echo $lista_frios2[data_saida]?></td>
			<td color="336699" align="center" width="300" height="26"><?php echo $lista_frios2[nome_user]?></td>
			<td color="336699" align="center" width="50" height="26" > <a href="query_baixa_por_identificador.php?coletor=<?php echo $lista_frios2[coletor] ?>&movimento=USO&tipo=lista"><?php echo Strtoupper($lista_frios2[coletor])?></a> </td>
		<?php };?>
		</tr>
		</table>
		<br>
	</td>
</tr>
</table>

<br>

<table cellpadding="0" border="0" width="80%" align="center">
<tr> 
	<td>
		<table cellpadding="0" border="1" width="49%" height="26" align="center" style="float:left;">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; SETOR GERENCIA (<?php echo $uso_gerencia ?> / <?php echo $dados_qtd[qtd_gerencia] ?>) </td>
		</tr>
		<tr>
			<?php if ($uso_gerencia == 0) { ?>
				<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
			<?php }
			else { ?>
			<td class="simples_2" width="90" height="26"> DATA</td>
			<td class="simples_2" width="300" height="26"> NOME </td>
			<td class="simples_2" width="50" height="26"> COLT. </td>
			<?php } ?>
		</tr>
		<?php
			while ($lista_gerencia2 = mysql_fetch_array($lista_gerencia)){
		?>
		<tr>
			<td color="336699" align="center" width="90" height="26"><?php echo $lista_gerencia2[data_saida]?></td>
			<td color="336699" align="center" width="300" height="26"><?php echo $lista_gerencia2[nome_user]?></td>
			<td color="336699" align="center" width="50" height="26" > <a href="query_baixa_por_identificador.php?coletor=<?php echo $lista_gerencia2[coletor] ?>&movimento=USO&tipo=lista"><?php echo Strtoupper($lista_gerencia2[coletor])?></a> </td>
		<?php };?>
		</tr>
		</table>
		
		<table cellpadding="0" border="1" width="49%" height="26" align="center">
		<tr>
			<td align="center" colspan="3" height="26" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; CONSERTO (<?php echo $uso_conserto ?>) </td>
		</tr>
		<tr>
		<?php 
		if ($uso_conserto == 0) { ?>
			<td class="simples_2" width="100" height="26"> NADA PARA EXIBIR </td>
		<?php }
		else { ?>
			<td class="simples_2" width="90" height="26" > N. SERIE </td>
			<td class="simples_2" width="300" height="26" > DEFEITO </td>
			<td class="simples_2" width="50" height="26" > COLT. </td>
		<?php } ?>
		</tr>
		<tr>
		<?php
			while ($lista_coletores2 = mysql_fetch_array($lista_coletores)){
			while ($lista_conserto2 = mysql_fetch_array($lista_conserto)){
		?>
		<tr>
			<td color="336699" align="center" width="100" height="26"><?php echo $lista_coletores2[nserie]?></td>
			<td color="336699" align="center" width="400" height="26"><?php echo $lista_conserto2[defeito]?></td>
			<td color="336699" align="center" width="40" height="26"><?php echo Strtoupper($lista_conserto2[identificador])?></td>
		</tr>
		<?php };?>
		<?php };?>
		</tr>
		</table>
		<br>
	</td>
</tr>
</table>


</head>
</html>