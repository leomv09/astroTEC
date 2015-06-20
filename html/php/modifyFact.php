<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$content = $_REQUEST["content"];
$id = $_REQUEST["id"];


$sql = "UPDATE DatosCuriosos SET titulo = '$title', contenido = '$content' WHERE idDatoCurioso = $id";

$result = $conn->query($sql);

if($result)
{
	echo 1;
}
else
{
	echo $conn->error;
}

?>