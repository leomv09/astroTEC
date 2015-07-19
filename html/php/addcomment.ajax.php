<?php
	include("db.php");

	$content = $_REQUEST["content"];
	$post = $_REQUEST["post"];
	$user = $_REQUEST["user"];

	$content = htmlspecialchars($content);

	$sql =  $conn->prepare("INSERT INTO Comentarios (contenido, fecha, fk_idEstado, fk_idUsuario) VALUES 
					(?, NOW(), 1, ?)");

	$sql->bind_param("si", $content,  $user);
	$result=$sql->execute();

	if ($result) {
		$id = $conn->insert_id;
		$sql = $conn->prepare("INSERT INTO ComentariosXPublicacion (fk_idComentario, fk_idPublicacion) VALUES (?, ?)");
		$sql->bind_param("ii", $id,  $post);
		$sql->execute();
	}

	echo $content;
?> 