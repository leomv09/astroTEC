<?php require( "php/functions.php");?>
<?php require( "php/equipment.php");?>
<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - Equipo</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/equipment.css">
</head>

<body>
	<div class="container">
		<?php require('./php/navbar.php'); ?>

		<h1 class="tittle"> Equipo </h1>
		<?php getEquipment();?>

	</div>
	<?php include("./php/footer.php"); ?>
</body>

</html>