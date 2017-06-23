<?php
/*
	Form do Sistema de Controle de Coletores (Recuperado da migração do Intranet)
	Rafael Eduardo L - @sudorafa
	Recife, 24 de Setembro de 2016
*/
	session_start();
	
	$idusuario = $_SESSION["idusuario"];
	$dados_usuario_logado = mysql_fetch_array(mysql_query("select * from usuariosc where idusuario = '$idusuario'"));
	$filial_usuario_logado = $dados_usuario_logado[filial];
	
	$coletores = mysql_query("select * from coletores where filial = '$filial_usuario_logado' order by identificador");
	$linhas_coletores = mysql_num_rows($coletores);
	$uso = $linhas_coletores;
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
    </head>
	<script language="javascript">
		window.location.href='#listaColetores';
	</script>
    <body>
		<a name="listaColetores" id="listaColetores"></a> 
		</br>
		<div id="interface">
            <div id="Conteudo">
				<br/>
				<h2 align="center"> <font color="336699"> Status e Informações dos Coletores </font></h2> 
				<br/>
				<div align="center">
					<table cellpadding="0" border="1" width="70%" align="center">
					<tr>
						<?php 
						if ($uso == 0) { ?>
							<td class="simples_2" height="26"> NADA PARA EXIBIR </td>
						<?php }
						else { ?>
							<td class="title" height="26"> DESCRICAO </td>
							<td class="title" height="26"> IDENTIFICADOR </td>
							<td class="title" height="26"> NUM SERIE </td>
							<td class="title" height="26"> STATUS </td>
							</tr>
						<?php }
							while ($dados_coletores = mysql_fetch_array($coletores)){
						?>
						<tr>
							<td class="corpo" height="26" > <?php echo $dados_coletores[descricao]?> </td>
							<td class="corpo" height="26" > <?php echo $dados_coletores[identificador]?></a> </td>
							<td class="corpo" height="26" > <?php echo $dados_coletores[nserie]?> </td>
							<td class="corpo" height="26" > <?php echo $dados_coletores[status]?> </td>
						<?php };?>
					</tr>
					</table>
				</div>
			<br/>
            </div> <!--/conteudo -->
        </div> <!--/interface -->

    </body>
</html>