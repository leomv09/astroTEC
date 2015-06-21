<?php
require_once('db.php');

global $conn;
$name = $_REQUEST["name"];
$lastName1 = $_REQUEST["lastName1"];
$description = $_REQUEST["description"];
$lastName2 = $_REQUEST["lastName2"];
$id = $_REQUEST["id"];

$sql = "UPDATE Colaboradores SET nombre = '$name', apellido1 = '$lastName1', apellido2 = '$lastName2', comentario = '$description' WHERE idColaborador = $id";

if(isset($_REQUEST["photoId"]))
{
	$sql = "UPDATE Colaboradores SET nombre = '$name', apellido1 = '$lastName1', apellido2 = '$lastName2', comentario = '$description', fk_idFoto = $_REQUEST[photoId] WHERE idColaborador = $id";
}

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