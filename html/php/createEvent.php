<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$date = $_REQUEST["date"];
$description = $_REQUEST["description"];

$sql = "INSERT INTO Eventos(titulo, descripcion, fecha, fk_idEstado) VALUES ('$title', '$description', NOW(), 1)";

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