<?php
	require_once('db.php');

	$title = $_REQUEST['title'];
	$description = $_REQUEST['description'];

	$sql = "INSERT INTO Galerias (fecha, titulo, descripcion) VALUES (NOW(), '$title', '$description')";
	$result = $conn->query($sql);

	if ($result) {
		echo 1;
	}
	else {
		echo $conn->error;
	}
?>