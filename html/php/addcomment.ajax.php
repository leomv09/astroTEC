<?php
	include("db.php");

	$content = $_REQUEST["content"];
	$post = $_REQUEST["post"];

	$sql = "INSERT INTO Comentarios (contenido, fecha, fk_idEstado, fk_idUsuario) VALUES 
					('$content', NOW(), 1, 2)";

	if ($conn->query($sql)) {
		$id = $conn->insert_id;
		$sql = "INSERT INTO ComentariosXPublicacion (fk_idComentario, fk_idPublicacion) VALUES ($id, $post)";
		$conn->query($sql);
	}
?> 