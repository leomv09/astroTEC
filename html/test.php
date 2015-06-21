<?php
	require( "php/functions.php"); 
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
	<script type="text/javascript" src="js/vendor/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/uploadFile.js"></script>
	<script type="text/javascript" src="js/equipment.js"></script>
</head>

<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. 
		Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container">
		<?php require('./php/navbar.php'); ?>
		<div class="row">
			<div class="col-md-10">
				    <div class="form-area"> 
				    	<form id="frmUploadMember" action="" method="post" enctype="multipart/form-data">
		                    <h2 style="margin-bottom: 25px; text-align: center;">Agregar miembro</h2>
		                    <div class="form-group">
								<label>Nombre:</label>
								<input class="form-control" type="text" id="createEquipmentName" placeholder="Requerido">
							</div>
							<div class="form-group">
								<label>Apellido 1:</label>
								<input class="form-control" type="text" id="createEquipmentDetail1" placeholder="Requerido">
							</div>
							<div class="form-group">
								<label>Apellido 2:</label>
								<input class="form-control" type="text" id="createEquipmentDetail2" placeholder="Opcional">
							</div>
							<div class="form-group">
								<label>Fotografía:</label>
								<input class="form-control" type="file" id="createMemberPhoto2" name="userImage" placeholder="Requerido">
							</div>
					        <button id="createEquipmentButton" type="button" class="btn btn-default" onclick="">Crear</button>
					    </form>
				    </div>
				</div>	
		</div>
	</div>
	
	
	<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>