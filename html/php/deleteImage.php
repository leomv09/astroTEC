<?php
require_once('db.php');

global $conn;

$id = $_REQUEST["id"];

$sql = "SELECT fk_idArchivo FROM Fotos WHERE idFoto = $id";


$result = $conn->query($sql);

if($result)
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$sql2 = "DELETE FROM Fotos WHERE idFoto = $id";
		$result2 = $conn->query($sql2);
		if($result2)
		{
			$sql3 = "DELETE FROM ArchivosAdjunto WHERE idArchivo = $row[fk_idArchivo]";
			$result3 = $conn->query($sql3);
			if($result3)
			{
				
				echo 1;
			}
			else
			{
				echo "Query error 1 ".$conn->error;
			}	
		}
		else
		{
			echo "Query error 2 ".$conn->error;
		}
	}
	else
	{
		echo "Query error 3 ".$conn->error;
	}	
}
else
{
	echo "Query error 4 ".$conn->error;
}

?>