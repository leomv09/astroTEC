<?php
require_once('db.php');
		
$Name = $_REQUEST["name"];
$detail1 = $_REQUEST["detail1"];
$detail2 = $_REQUEST["detail2"];
$id = $_REQUEST["id"];
				
$sql = "UPDATE equipo SET nombre = '$Name', detalle1 = '$detail1', detalle2 = '$detail2'":
if(isset($_REQUEST["idfoto"]))
{
	$idFoto = $_REQUEST["idfoto"];						 
	$sql.= ",fk_idFoto = '$idFoto";
}
$sql .= "WHERE idEquipo = $id"
$result = $conn->query($sql);
if($result)
{
	echo 1
}
else
{
	echo -1;
}
?>