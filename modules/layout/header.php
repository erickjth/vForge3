<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ejemplo</title>
        <?php Assets::print_css(); ?>
        <?php Assets::print_js(); ?>
        <?php Assets::print_external(); ?>
    </head>
    <body>
        <header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo BASE_URL ?>">VForge v3.0</a></h1>
			<h2 class="section_title">Dashboard</h2>
		</hgroup>
	</header> <!-- end of header bar -->
        
        <section id="secondary_bar">
		<div class="user">
			<p>Erick Torres (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo BASE_URL ?>">Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Tareas</a></article>
		</div>
	</section><!-- end of secondary bar -->
        
        <aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Busqueda" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Dashboard</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">Inicio</a></li>
			<li class="icn_edit_article"><a href="#">Configuración de proyecto</a></li>
			<li class="icn_categories"><a href="#">Listado de proyectos</a></li>
			<li class="icn_tags"><a href="#">Tags</a></li>
		</ul>
                <h3>Modulo: Tareas</h3>
		<ul class="toggle">
                    <li class="icn_tags"><a href="#">Visión general</a></li>
                    <li class="icn_tags"><a href="#">Diagrama de Gantt</a></li>
                    <li class="icn_tags"><a href="#">Reportes</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="#">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2011 Website Admin</strong></p>
			<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
		</footer>
	</aside><!-- end of sidebar -->
        
        <section id="main" class="column">
