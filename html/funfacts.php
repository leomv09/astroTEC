<?php require( "php/functions.php");?>
<?php require( "php/funfacts.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - Datos curiosos</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/funfacts.css">
</head>

<body>
	<div class="container">
		<?php require('./php/navbar.php'); ?>
		<div class="container"> 
			<h1 class="tittle">Datos curiosos</h1>
			<div class="row">
				<?php getFunFacts(); ?>
			</div>
		</div>
	</div>
	<?php include("./php/footer.php"); ?>
</body>

</html>