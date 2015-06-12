<?php require( "php/functions.php");?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
	<title>AstroTEC - Acerca de</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/contact.css">
</head>

<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. 
		Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container">
		<?php require('./php/navbar.php'); ?>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<form action="#" method="post">
					<fieldset>
						<legend> Información del emisor</legend>
						<div class="form-group">
							<label for="iname">Nombre</label> 
							<input type="text" id="iname" class="form-control" required> 
						</div>
						<div class="form-group">
							<label for="iemail">Correo</label> 
							<input type="email" id="iemail" class="form-control" required> 
						</div>
					</fieldset>
					<fieldset>
						<legend> Mensaje</legend>
						<div class="form-group">
							<label for="ititle">Titulo</label> 
							<input type="text" id="ititle" class="form-control" required> 
						</div>
						<div class="form-group">
							<label for="itext">Mensaje</label> 
							<textarea id="itext" class="form-control" required></textarea>
						</div>
					</fieldset>
					<div class="form-group submit">
						<input type="submit"  name="scontact" value="Enviar">
					</div>
				</form>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="js/vendor/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>