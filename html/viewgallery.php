<?php
	require( "php/viewgallery.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>AstroTEC - <?php showGalleryName() ?></title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/viewgallery.css">
</head>

<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.3";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div class="container">
		<?php require('./php/navbar.php'); ?>

		<div class="container">

			<h1 class="tittle"><?php showGalleryName() ?></h1>
			
			<div class="row">
				<?php getPictures(); ?>
			</div>
		</div>
	</div>
	<?php include("./php/footer.php"); ?>
</body>

</html>