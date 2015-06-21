<?php  

require_once('db.php');


function getEquipmentsOptions()
{
	global $conn;
	$sql = "SELECT idEquipo, nombre FROM Equipo";
	$result = $conn->query($sql);
	if($result)
	{
		if($result->num_rows > 0)
		{
			while ($row = $result->fetch_assoc()) 
			{
				echo "<option value=$row[idEquipo]> $row[nombre] </option>";
			}
		}
	}
}

function getEquipmentPhoto($idPhoto)
{
	global $conn;
	$sql = "SELECT fk_idArchivo FROM Fotos WHERE idFoto = $idPhoto";
	$result = $conn->query($sql);
	if($result)
	{
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$sql2 = "SELECT url FROM ArchivosAdjunto WHERE idArchivo = $row[fk_idArchivo]";
			$result2 = $conn->query($sql2);
			if($result2)
			{
				if($result2->num_rows > 0)
				{
					$row2 = $result2->fetch_assoc();
					return $row2["url"];
				}
					
			}
		}
	}
	return "";
}

function getEquipment()
{
	global $conn;
	$sql = "SELECT idEquipo, nombre, detalle1, detalle2, fk_idFoto FROM Equipo";
	$result = $conn->query($sql);
	if($result)
	{
		if($result->num_rows > 0)
		{
			while ($row = $result->fetch_assoc()) 
			{
				$image = getEquipmentPhoto($row["fk_idFoto"]);
				echo "<div class='row'>
					<div class='col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8'>
						<div class='panel panel-default'>
							<div class='equipment-heading'>
								<div class='row'>
									<div class='col-lg-12'>
										<div class='col-xs-12 col-sm-4'>
											<figure>
												<img class='img-circle img-responsive' alt='' src=$image height='300'width='300' />
											</figure>
										</div>
										<div class='col-xs-12 col-sm-8'>
											<div class='space'>
												<ul class='list-group'>
													<li class='list-group-item'>$row[nombre]</li>
													<li class='list-group-item'>$row[detalle1] </li>
													<li class='list-group-item'>$row[detalle2] </li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>";
			}
		}
		else
		{
			echo "<div> <p> No hay equipo para mostrar </p> </div>";
		}
	}
		
}


?>