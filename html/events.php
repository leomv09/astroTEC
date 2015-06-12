<?php require( "php/functions.php");?>
<?php 
require( "php/events.php"); 
function checkSession()
	{
		if(isset($_SESSION['USER_NAME']))
		{
			echo 
			" <script type='text/javascript'>
				showEdit();
				</script>
			";
		}
		
	}

?>

<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - Eventos</title>
	<?php require('./php/head.php'); checkSession(); getEvents();?>
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
		<div class="hidden" id="editEvents">
			<h2> Modificar Evento </h2>
			<select class="form-control col-sm-2" id="optionSelect" onchange="changeVisibility()">
				<option value="1"> Modificar </option>
				<option value="2"> Eliminar </option>
              </select>
              <div class="hidden" id="modifyEvent">
              		<label> Seleccione el evento:</label>
		          	<select class="form-control col-sm-2" id="eventsList">
			          	<?php
			          		loadEvents();
			          	?>
		          </select>

		          <label> Título del evento:</label>
		          <div class="col-sm-9">
		          		<input type="text" id="modifyTitle" placeholder="Título">
		        	</div>
		        	<label> Fecha:</label>
		          <div class="col-sm-9">
		          		<input type="text" id="modifyDate" placeholder="Título">
		        	</div>
		        	<label> Descripción:</label>
		          <div class="col-sm-9">
		          		<input type="text" id="modifyDescription" placeholder="Descripción">
		        	</div>
		          <button type="button" class="btn btn-default" onclick="modifyEvent()">Modificar</button>
              </div>

              <div class="hidden" id="deleteEvent">
              		<label> Seleccione el evento:</label>
		          	<select class="form-control col-sm-2" id="eventsList">
		          	<?php
		          		loadEvents();
		          	?>
		          </select>
		          <button type="button" class="btn btn-default" onclick="deleteEvent()">Eliminar</button>
              </div>

		</div>

	</div>

</body>

</html>