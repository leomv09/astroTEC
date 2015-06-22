<?php
	require_once('db.php');
	$idGaleria = $_REQUEST["idGaleria"];
	$idFoto = $_REQUEST["idFoto"];

	$sql = "DELETE FROM FotosXGaleria WHERE fk_idGaleria = $idGaleria AND fk_idFoto = $idFoto";
	$conn->query($sql);

	if ($result) {
		echo 1;
	}
	else {
		echo $conn->error;
	}
?>