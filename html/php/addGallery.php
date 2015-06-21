<?php
	require_once('db.php');

	$description = $_REQUEST['description'];
	$title = $_REQUEST['title'];
	$photos = $_REQUEST['photos'];
	$photosArray = array();
	array_push($photosArray, $photos);
	if (strpos($photos, ';') !== false)
	{
		$photosArray = explode(";", $photos);
	}


	$sql = "INSERT INTO Galerias (fecha, titulo, descripcion) VALUES (NOW(), '$title', '$description')";
	$result = $conn->query($sql);

	if ($result) {
		$galleryId = $conn->insert_id;
		$cant = count($photosArray);
		for($i = 0; $i < $cant; $i++)
		{
			$sql2 = "INSERT INTO fotosxgaleria(fk_idGaleria, fk_idFoto) VALUES ($galleryId, $photosArray[$i])";
			$result2 = $conn->query($sql2);
			if(!$result2)
			{
				die($conn->error);
			}
		}
		echo 1;
	}
	else 
	{
		echo $conn->error;
	}
?>