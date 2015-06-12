<?php require( "php/functions.php");?>
<?php 
require( "php/events.php");?>
<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - Eventos</title>
	<?php require('./php/head.php'); getEvents();?>
	<link rel="stylesheet" type="text/css" href="css/events.css">
	<script type="text/javascript" src="js/events.js"></script>	
</head>

<body>
	<div class="container">
		<?php require('./php/navbar.php'); ?>

		<div class="container">

			<h1 class="tittle">Calendario</h1>
			<hr />
			<div class="agenda">
				<div class="table-responsive">
					<table class="table table-condensed table-bordered">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Evento</th>
							</tr>
						</thead>
						<tbody>
							<?php getEventsInfo(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>

</html>