<!doctype html>

<html lang="es">
<head>
	<meta charset="utf-8">

	<link rel="icon" href="/<?php echo SYSTEM_NAME; ?>/assets/icon/favicon.svg" type="image/svg+xml">
	<title>Museo<?php if(isset($page)) { echo " - " . RegionsHelper::REGIONS[$page]["name"]; } ?></title>
	
	<!-- Bootstrap CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<!-- Base JS -->
	<script src="/<?php echo SYSTEM_NAME; ?>/assets/js/master.js"></script>
	<script src="/<?php echo SYSTEM_NAME; ?>/assets/js/Ensambler.js"></script>
	
	<?php
		$basepath = "/" . SYSTEM_NAME. "/assets/js/";
		if(isset($js))
		{
			foreach($js as $j)
			{
				echo '<script src="' . $basepath . $j . '.js"></script>';
			}
		}
	?>
	
	<!-- General CSS -->
	<link rel="stylesheet" href="/<?php echo SYSTEM_NAME; ?>/assets/css/generic.css">
	<?php
		$basepath = "/" . SYSTEM_NAME. "/assets/css/";
		if(isset($css))
		{
			foreach($css as $c)
			{
				echo '<link rel="stylesheet" href="' . $basepath . $c . '.css">';
			}
		}
	?>
</head>
<body>
	<nav class="navbar navbar-dark navbar-expand-lg">
		<div class="container-fluid">
			<a class="navbar-brand" href="/<?php echo SYSTEM_NAME; ?>">
				<img src="/<?php echo SYSTEM_NAME; ?>/assets/icon/favicon.svg" alt="">
				<?php echo SYSTEM_NAME; ?>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Menu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="mainmenu">
				<div class="navbar-nav">
					<?php 
						HTMLHelper::mainMenu($page ?? '');
					?>
				</div>
			</div>
		</div>
	</nav>
	<div class="container">