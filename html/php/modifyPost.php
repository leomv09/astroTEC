<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$description = $_REQUEST["description"];
$id = $_REQUEST["id"];

$sql = "UPDATE Publicaciones SET titulo = '$title', contenido = '$description' WHERE idPublicacion = $id";

$result = $conn->query($sql);

if($result)
{
	echo $conn->insert_id;
}
else
{
	echo -1;
}

?>