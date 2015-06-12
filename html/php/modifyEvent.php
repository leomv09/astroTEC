<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$date = $_REQUEST["date"];
$description = $_REQUEST["description"];
$id = $_REQUEST["id"];

$sql = "UPDATE Eventos SET titulo = '$title', fecha = NOW(), descripcion = '$description' WHERE idEvento = $id";

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