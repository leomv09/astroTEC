<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$date = $_REQUEST["date"];
$description = $_REQUEST["description"];
$id = $_REQUEST["id"];

$date2 = DateTime::createFromFormat('d/m/Y H:i:s', $date.' '.$hour);
$finalDate = $date2->format('Y-m-d H:i:s');

$sql = "UPDATE Eventos SET titulo = '$title', '$finalDate', descripcion = '$description' WHERE idEvento = $id";

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