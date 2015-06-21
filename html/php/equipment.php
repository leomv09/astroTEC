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





?>