<?php
/*
	Form Criado para carregar o menu do Portal
	Rafael Eduardo L - @sudorafa
	Recife, 07 de Setembro de 2016
*/
	session_start();
?>

<html>
    <head>
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/_css/style.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=11"/>
		<script>
			//window.location.href='#foo';
		</script>
	</head>
    <body>
		<!--<a href="#" id="foo"></a>-->
		<!-- -------------------------------------------------------------------- -->
		<!-- ------------------------- Barra de Menu ---------------------------- -->
		<!-- -------------------------------------------------------------------- -->
			<section id="menu">
                <ul>
					<li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
						<li><a> | </a></li>
                    <li><a href="#" title="Descrição" target="_blank">MENU SYS</a></li>
				</ul>
			</section>
			<section id="menuLogado3">
				<ul>
					<li><a href="/controlc/home.php" title="Inicio - ControlC">HOME</a></li>
						<li><a> | </a></li>
					<li><a href="/controlc/view/form_coletores.php" title="Coletores">COLETORES</a></li>
						<li><a> | </a></li>
					<li><a href="/controlc/view/form_auditorias.php" title="Relatorios para Auditorias" >AUDITORIAS</a></li>
						<li><a> | </a></li>
					<li><a href="/controlc/view/form_controles.php" title="Controle e Gerenciamento dos Coletores">CONTROLES</a></li>
						<li><a> | </a></li>
					<li><a href="/controlc/view/form_status_detalhado.php" title="Status Detalhado dos Coletores">STATUS DETALHADO</a></li>
				</ul>
			</section>
		<!-- ---------------------------------------------------------------------- -->
		<!-- ----------------------- Barra de Menu Fim ---------------------------- -->
		<!-- ---------------------------------------------------------------------- -->
    </body>
</html>