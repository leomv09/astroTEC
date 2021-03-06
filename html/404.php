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
			<div class="col-md-6 col-md-offset-3" >
				<div class="panel semitransparent center">
					<h1> Página no encontrada </h1>
				</div>
			</div>			
		</div>
	</div>
	<?php include("./php/footer.php"); ?>
</body>

</html>