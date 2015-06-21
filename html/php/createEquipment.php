<?php
require_once('db.php');
		
$Name = $_REQUEST["name"];
$detail1 = $_REQUEST["detail1"];
$detail2 = $_REQUEST["detail2"];
$idFoto = $_REQUEST["idfoto"];						 

				
$sql = "INSERT INTO equipo (nombre, detalle1, detalle2, fk_idFoto) VALUES ('$Name', '$detail1', '$detail2', $idFoto )";
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