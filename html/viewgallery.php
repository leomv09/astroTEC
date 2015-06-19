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