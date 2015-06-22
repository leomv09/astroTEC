<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$description = $_REQUEST["description"];
$id = $_REQUEST["id"];

$sql = "UPDATE Galerias SET titulo = '$title', descripcion = '$description' WHERE idGaleria = $id";

$result = $conn->query($sql);

if($result)
{
	echo 1;
}
else
{
	echo -1;
}

?>