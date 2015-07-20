<?php
	require_once('db.php');
	$id = $_REQUEST["id"];

	$sql = $conn->prepare("UPDATE Eventos SET fk_idGaleria = NULL WHERE fk_idGaleria = $id");
	$sql->bind_param("i",$id);
	$sql->execute();

	$sql = $conn->prepare("DELETE FROM FotosXGaleria WHERE fk_idGaleria = $id");
	$sql->bind_param("i",$id);
	$sql->execute();

	$sql = $conn->prepare("DELETE FROM ComentariosXGaleria WHERE fk_idGaleria = $id");
	$sql->bind_param("i",$id);
	$sql->execute();

	$sql = $conn->prepare("DELETE FROM Galerias WHERE idGaleria = $id");
	$sql->bind_param("i",$id);

	if ($sql->execute()) {
		echo 1;
	}
	else {
		echo $conn->error;
	}
?>