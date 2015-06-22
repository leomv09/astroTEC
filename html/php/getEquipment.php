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
		$name = str_replace(";", " ", $row["nombre"]);
		$detail1 = str_replace(";", " ", $row["detalle1"]);
		$detail2 = str_replace(";", " ", $row["detalle2"]);
		echo $name.";".$detail1.";".$detail2.";".$row["fk_idFoto"];
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