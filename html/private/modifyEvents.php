<?php require( "../php/functions.php");?>
<?php 
require( "../php/events.php"); 
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
	<title>Modificar - Eventos</title>
	<link rel="stylesheet" type="text/css" href="../css/events.css">
	<script type="text/javascript" src="../js/events.js"></script>	
</head>

<body>
	<div class="container">
		<?php require('./../php/navbar.php'); ?>

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
              <div class="container">
					<div class="col-md-5">
					    <div class="form-area">  
					        <br style="clear:both">
			                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar evento</h3>
			    				<div class="form-group">
			    					Seleccione un evento:
									<select class="form-control col-sm-2" id="eventsList">
							          	<?php
							          		loadEvents();
							          	?>
							          </select>
								</div>
								<div class="form-group">
									Título del evento:
									<input type="text" id="modifyTitle" placeholder="Título">
								</div>
								<div class="form-group">
									Fecha:
									<input type="text" id="modifyDate" placeholder="Título">
								</div>
								<div class="form-group">
									Descripción:
									<textarea  id="modifyDescription" placeholder="Descripción (Máximo 200 caracteres)" maxlength="50">	</textarea>
								</div>
			                    <div class="form-group">
			                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>                   
			                    </div>
					        <button type="button" class="btn btn-default" onclick="modifyEvent()">Modificar</button>
					    </div>
					</div>			         
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
	<?php checkSession();?>
</body>

</html>