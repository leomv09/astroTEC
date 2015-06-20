<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$date = $_REQUEST["date"];
$hour = $_REQUEST["hour"];
$description = $_REQUEST["description"];
  

$date2 = DateTime::createFromFormat('d/m/Y H:i:s', $date.' '.$hour);
$finalDate = $date2->format('Y-m-d H:i:s');

$sql = "INSERT INTO Eventos(titulo, descripcion, fecha, fk_idEstado) VALUES ('$title', '$description', '$finalDate', 1)";

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