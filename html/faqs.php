<?php require( "php/functions.php");?>
<?php require( "php/faqs.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - FAQs</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/faqs.css">
</head>

<body>
	<div class="container">
		<?php require('./php/navbar.php'); ?>

		<div class="container">
			<h1 class="tittle">Preguntas frecuentes</h1>
				<?php getFaqs(); ?>
		</div>
	</div>
	<?php include("./php/footer.php"); ?>
</body>

</html>