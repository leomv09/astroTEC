<?php
	require_once('db.php');

	$description = $_REQUEST['description'];
	$title = $_REQUEST['title'];
	$photos = $_REQUEST['photos'];

	$title = htmlspecialchars($title);
	$description = htmlspecialchars($description);

	$photosArray = array();
	array_push($photosArray, $photos);
	if (strpos($photos, ';') !== false)
	{
		$photosArray = explode(";", $photos);
	}

	$sql = $conn->prepare("INSERT INTO Galerias (fecha, titulo, descripcion) VALUES (NOW(), ?, ?)");
	$sql->bind_param("ss",$title,$description);
	$result = $sql->execute();

	if ($result) {
		$galleryId = $conn->insert_id;
		$cant = count($photosArray);
		for($i = 0; $i < $cant; $i++)
		{
			$currentPhoto = $photosArray[$i];
			$sql2 = $conn->prepare("INSERT INTO FotosxGaleria(fk_idGaleria, fk_idFoto) VALUES (?, ?)");
			$sql2->bind_param("ii",$galleryId,$currentPhoto);
			$result2 = $sql2->execute();
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