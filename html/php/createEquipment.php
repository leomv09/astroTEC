<?php
require_once('db.php');
		
$Name = $_REQUEST["name"];
$detail1 = $_REQUEST["detail1"];
$detail2 = $_REQUEST["detail2"];
$idFoto = $_REQUEST["idfoto"];						 

				
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