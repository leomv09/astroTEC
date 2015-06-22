<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "SELECT F.idFoto, F.titulo, F.descripcion, AA.url
FROM Fotos F 
INNER JOIN FotosXGaleria FG 
	ON FG.fk_idFoto = F.idFoto
INNER JOIN ArchivosAdjunto AA
	ON AA.idArchivo = F.fk_idArchivo
WHERE FG.fk_idGaleria = $id;";

$result = $conn->query($sql);

if($result)
{
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()){
			echo $row["idFoto"].";".$row["url"].";".$row["titulo"].";".$row["descripcion"];
		}
		
	}
	else
	{
		echo -1;
	}
	$result->close();
}
else
{
	echo $conn->error;
}

?>