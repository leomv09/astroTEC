<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$date = $_REQUEST["date"];
$hour = $_REQUEST["hour"];
$description = $_REQUEST["description"];

$title = htmlspecialchars($title);
$description = htmlspecialchars($description);  

$date2 = DateTime::createFromFormat('d/m/Y H:i', $date.' '.$hour);
$finalDate = $date2->format('Y-m-d H:i');

$sql = $conn->prepare("INSERT INTO Eventos(titulo, descripcion, fecha, fk_idEstado) VALUES (?, ?, ?, 1)");
$sql->bind_param("sss",$title, $description, $finalDate);

if($sql->execute())
{
	echo $conn->insert_id;
}
else
{
	echo -1;
}

?>