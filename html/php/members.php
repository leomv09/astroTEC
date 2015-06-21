<?php

require_once('db.php');

function getMembersOptions()
{
	global $conn;
	$sql = "SELECT idColaborador, nombre, apellido1 FROM Colaboradores";
	$result = $conn->query($sql);

	if($result)
	{
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$name = $row["nombre"]." ".$row["apellido1"];
				echo "<option value=$row[idColaborador]> $name </option>";
			}
		}
		else
		{
			echo "No results";
		}
	}
	else
	{
		echo $conn->error;
	}
}

?>