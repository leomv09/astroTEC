<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "SELECT nombre, detalle1, detalle2, fk_idFoto FROM equipo WHERE idEquipo = $id";

$result = $conn->query($sql);

if($result)
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		echo $row["nombre"].";".$row["detalle1"].";".$row["detalle2"].";".$row["fk_idFoto"];
	}
	else
	{
		echo -1;
	}
}
else
{
	echo $conn->error;
}
?>