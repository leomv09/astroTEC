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

function getPhoto($idPhoto)
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


function getMembers()
{
	global $conn;
	$sql = "SELECT idColaborador, nombre, apellido1, apellido2, comentario, fk_idFoto FROM Colaboradores";
	$result = $conn->query($sql);
	if($result)
	{
		if($result->num_rows > 0)
		{
			$i = 1;
			$class = "active";
			while ($row = $result->fetch_assoc()) 
			{
				$img = getPhoto($row["fk_idFoto"]);
				if($i > 1)
				{
					$class = "";
				}
				$memName = '#'.$row["nombre"].$row["apellido1"];
				echo "<li role='presentation' class=$class id=$row[idColaborador]>
						<a href=$memName role='tab' data-toggle='tab' onclick='changeMember($row[idColaborador])'>
							<img class='img-circle' src=$img height='100'width='100'/>
						</a>
					</li>";
			}

		}
		else
		{
			echo "<p> No hay miembros que mostrar </p>";
		}
	}
	else
	{
		echo "<p> No hay miembros que mostrar </p>";
	}
}

?>