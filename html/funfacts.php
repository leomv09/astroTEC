<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL); ?>
<?php require( "php/funfacts.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - Datos curiosos</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/funfacts.css">
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">AstroTEC</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="events.php">Eventos</a>
						</li>
						<li><a href="#">Galería</a>
						</li>
						<li><a href="funfacts.php">Datos Curiosos</a>
						</li>
						<li><a href="#">Blog</a>
						</li>
						<li><a href="#">Contacto</a>
						</li>
						<li><a href="#">FAQs</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">

			<h1 class="tittle">Datos curiosos</h1>
			
			<div class="row">
			
			<?php getFunFacts(); ?>
			
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