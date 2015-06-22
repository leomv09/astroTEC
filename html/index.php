<?php
	require( "php/functions.php"); 
	require( "php/cover.php");
	check_login(); 
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
	<title>AstroTEC</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. 
		Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container">
		<?php require('./php/navbar.php'); ?>
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default semitransparent">
					<div class="panel-heading">
						<h1 class="panel-title">Dato Curioso</h1>
					</div>
						<?php loadFact(); ?>
					<div class="panel-footer rigth-alig">
						<a href="./funfacts.php">Ver más datos</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default semitransparent">
					<div class="panel-heading">
						<h1 class="panel-title">Equipo Astronómico</h1>
					</div>
						<?php loadEquipment(); ?>						
					<div class="panel-footer rigth-alig">
						<a href="equipment.php">Ver equipo</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default semitransparent">
					<div class="panel-heading">
						<h1 class="panel-title">Grupo astroTEC</h1>
					</div>
						<?php loadMembers(); ?>
					<div class="panel-footer rigth-alig">
						<a href="./aboutUs.php">Ver más</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("./php/footer.php"); ?>
</body>

</html>