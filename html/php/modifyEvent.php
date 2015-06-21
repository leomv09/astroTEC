<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$date = $_REQUEST["date"];
$hour = $_REQUEST["hour"];
$description = $_REQUEST["description"];
$id = $_REQUEST["id"];

$date2 = $date. ' '.$hour;

$sql = "UPDATE Eventos SET titulo = '$title', fecha = STR_TO_DATE('$date2', '%d/%m/%Y %H:%i'), descripcion = '$description' WHERE idEvento = $id";

$result = $conn->query($sql);

if($result)
{
	echo $conn->insert_id;
}
else
{
	echo $conn->error;
}

?>