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

$name = htmlspecialchars($name);
$lastName1 = htmlspecialchars($lastName1);
$description = htmlspecialchars($description);
$lastName2 = htmlspecialchars($lastName2);


$sql = $conn->prepare("INSERT INTO Colaboradores(nombre, apellido1, apellido2, comentario, fk_idFoto) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("ssssi",$name,$lastName1,$lastName2,$description,$photoId);

if($sql->execute())
{
	echo $conn->insert_id;
}
else
{
	echo $conn->error;
}

?>