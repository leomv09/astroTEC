<?php require( "php/functions.php");?>
<?php require( "php/gallery.php"); ?>
<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - Galería</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/gallery.css">
</head>

<body>
	<div class="container">
		<?php require('./php/navbar.php'); ?>
		<div class="container">

			<!-- <h1 class="tittle">FAQs</h1> -->
			
		<?php getGalleries(); ?>

	<?php include("./php/footer.php"); ?>
</body>

</html>