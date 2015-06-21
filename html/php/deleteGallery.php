<?php
	require_once('db.php');
	$id = $_REQUEST["id"];

	$sql = "UPDATE Eventos SET fk_idGaleria = NULL WHERE fk_idGaleria = $id";
	$conn->query($sql);

	$sql = "DELETE FROM FotosXGaleria WHERE fk_idGaleria = $id";
	$conn->query($sql);

	$sql = "DELETE FROM ComentariosXGaleria WHERE fk_idGaleria = $id";
	$conn->query($sql);

	$sql = "DELETE FROM Galerias WHERE idGaleria = $id";
	$result = $conn->query($sql);

	if ($result) {
		echo 1;
	}
	else {
		echo $conn->error;
	}
?>