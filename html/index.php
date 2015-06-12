<?php require( "php/functions.php"); check_login(); ?>
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
				<div class="panel panel-default panel-head">
					<div class="panel-heading">
						<h1 class="panel-title">Dato Curioso</h1>
					</div>
					<div class="panel-body">
						<p>
							<?php require( "./php/index-add.php"); ?>
						</p>
					</div>
					<div class="panel-footer">
						<a href="./funfacts.php">Ver más datos</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">Equipo Astronómico</h1>
					</div>
					<div class="panel-body">
						<p>
							aaaaaaaaaaaaaaaaaaaaaaaa
						</p>
					</div>
					<div class="panel-footer">
						<a href="equipment.php">Ver equipo</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">Grupo astroTEC</h1>
					</div>
					<div class="panel-body">
						<p>
							<?php $test="Núñez" ; echo $test; ?>
						</p>
					</div>
					<div class="panel-footer">
						<a href="./aboutUs.php">Ver más</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1 col-sm-offset-5">
				<a href="https://www.facebook.com/AstroTEC.ITCR" class="thumbnail">
					<img src="./img/social-31-facebook.png" alt="Facebook">
				</a>
			</div>
			<div class="col-sm-1">
				<a href="#" class="thumbnail">
					<img src="./img/social-32-twitter.png" alt="Twitter">
				</a>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<p class="text-muted">Icons from <a href="http://glyphicons.com">Glyphicons Free</a>, licensed under
				<a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
		</div>
	</footer>
	<script type="text/javascript" src="js/vendor/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>