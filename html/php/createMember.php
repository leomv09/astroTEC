<?php
require_once('db.php');

global $conn;
$name = $_REQUEST["name"];
$lastName1 = $_REQUEST["lastName1"];
$description = $_REQUEST["description"];
$photoId = $_REQUEST["photoId"];
$lastName2 = "";
if(isset($_REQUEST["lastName2"]))
{
	$lastName2 = $_REQUEST["lastName2"];
}


$sql = "INSERT INTO Colaboradores(nombre, apellido1, apellido2, comentario, fk_idFoto) VALUES ('$name', '$lastName1', '$lastName2', '$description', $photoId)";

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