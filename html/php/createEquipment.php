<?php
require_once('db.php');
		
$Name = $_REQUEST["name"];
$detail1 = $_REQUEST["detail1"];
$detail2 = $_REQUEST["detail2"];
$idFoto = $_REQUEST["idfoto"];

$Name = htmlspecialchars($Name);
$detail1 = htmlspecialchars($detail1);
$detail2 = htmlspecialchars($detail2);						 

				
$sql = $conn->prepare("INSERT INTO equipo (nombre, detalle1, detalle2, fk_idFoto) VALUES (?, ?, ?, ?)");
$sql->bind_param("sssi",$Name, $detail1, $detail2, $idFoto);
if($sql->execute())
{
	echo $conn->insert_id;
}
else
{
	echo -1;
}
?>