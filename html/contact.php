<?php require( "php/functions.php");?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
	<title>AstroTEC - Contacto</title>
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
				<form action="./php/contact-sub.php" method="post">
					<fieldset>
						<div class="form-group">
							<input type="text" id="iname" name="iname" class="form-control" placeholder="Nombre" required> 
						</div>
						<div class="form-group">
							<input type="email" id="iemail" name="iemail" class="form-control" placeholder="Email" required> 
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<input type="text" id="ititle" name="ititle" class="form-control" placeholder="Asunto" required> 
						</div>
						<div class="form-group">
							<textarea id="itext" name="itext" class="form-control" placeholder="Mensaje" required></textarea>
						</div>
					</fieldset>
					<div class="form-group submit">
						<input type="hidden" name="save" value="contact">
						<input class="btn btn-success" type="submit"  name="scontact" value="Enviar">
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