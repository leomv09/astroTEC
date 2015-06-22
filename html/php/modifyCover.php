<?php
require_once('db.php');

global $conn;
$desc1 = $_REQUEST["description1"];
$desc2 = $_REQUEST["description2"];
$fkid = $_REQUEST["fkid"];
$id = $_REQUEST["id"];

$sql = "UPDATE Portadas SET descripcionEquipo = '$desc1', descripcionMiembros = '$desc2', fk_idDatoCurioso = $fkid WHERE idPortada = $id";

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