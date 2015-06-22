<?php
require_once('db.php');

function loadCover()
{
	global $conn;

	$sql = "SELECT idPortada, descripcionEquipo, descripcionMiembros FROM Portadas";
	$result = $conn->query($sql);
	if($result)
	{
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			echo "<div class='form-group'>
						<label>Equipo astronómico:</label>
						<textarea class='form-control' id='modifyCoverDescription1' placeholder='Máx 300 caracteres' maxlength='300' rows='7'>$row[descripcionEquipo]</textarea> 
					</div>
					<div class='form-group'>
						<label>Grupo astroTEC</label>
						<textarea class='form-control' id='modifyCoverDescription2' placeholder='Máx 300 caracteres' maxlength='300' rows='7'>$row[descripcionMiembros]</textarea> 
						<input type='hidden' id='coverId' value=$row[idPortada]>
					</div>";
		}
	}
}

function loadEquipment()
{
	global $conn;

	$sql = "SELECT descripcionEquipo FROM Portadas";
	$result = $conn->query($sql);
	if($result)
	{
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			echo "<div class='panel-body'>
						<p>
							$row[descripcionEquipo]
						</p>
					</div>";
		}
	}
}

function loadMembers()
{
	global $conn;

	$sql = "SELECT descripcionMiembros FROM Portadas";
	$result = $conn->query($sql);
	if($result)
	{
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			echo "<div class='panel-body'>
						<p>
							$row[descripcionMiembros]
						</p>
					</div>";
		}
	}
}

function loadFact()
{
	global $conn;

	$sql = "SELECT fk_idDatoCurioso FROM Portadas";
	$result = $conn->query($sql);
	if($result)
	{
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$sql2 = "SELECT contenido FROM DatosCuriosos WHERE idDatoCurioso = $row[fk_idDatoCurioso]";
			$result2 = $conn->query($sql2);
			if($result2)
			{
				if($result->num_rows > 0)
				{
					$row2 = $result2->fetch_assoc();
					echo "<div class='panel-body'>
						<p>
							$row2[contenido]
						</p>
					</div>";
				}
				else
				{
					echo "<div class='panel-body'>
						<p>
							No hay dato a mostrar.
						</p>
					</div>";
				}
			}
			else
			{
				echo "<div class='panel-body'>
					<p>
						No hay dato a mostrar.
					</p>
				</div>";
			}
		}
		else
		{
			echo "<div class='panel-body'>
				<p>
					No hay dato a mostrar.
				</p>
			</div>";
		}
	}
	else
	{
		echo "<div class='panel-body'>
			<p>
				No hay dato a mostrar.
			</p>
		</div>";
	}
}


?>