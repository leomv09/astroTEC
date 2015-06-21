<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "SELECT fk_idFoto FROM Colaboradores WHERE idColaborador = $id";

$result = $conn->query($sql);

if($result)
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$sql2 = "SELECT fk_idArchivo FROM Fotos WHERE idFoto = $row[fk_idFoto]";
		$result2 = $conn->query($sql2);
		if($result2)
		{
			if($result2->num_rows > 0)
			{
				$row2 = $result2->fetch_assoc();
				$sql3 = "DELETE FROM Colaboradores WHERE idColaborador = $id";
				$result3 = $conn->query($sql3);
				if($result3)
				{
					$sql4 = "DELETE FROM Fotos WHERE idFoto = $row[fk_idFoto]";
					$result4 = $conn->query($sql4);
					if($result4)
					{
						$sql5 = "DELETE FROM ArchivosAdjunto WHERE idArchivo = $row2[fk_idArchivo]";
						$result5 = $conn->query($sql5);
						if($result5)
						{
							echo 1;
						}
						else
						{
							echo "Query 1: ".$conn->error;
						}
					}
					else
					{
						echo "Query 2: ".$conn->error;
					}
				}
				else
				{
					echo "Query 3: ".$conn->error;
				}
			}
			else
			{
				echo "Query 4: ".$conn->error;
			}
		}else
		{
			echo "Query 5: ".$conn->error;
		}
	}
	else
	{
		echo "Query 6: ".$conn->error;
	}
}
else
{
	echo "Query 7: ".$conn->error;
}

?>