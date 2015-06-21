<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "SELECT nombre, apellido1, apellido2, comentario, fk_idFoto FROM Colaboradores WHERE idColaborador = $id";

$result = $conn->query($sql);

if($result)
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		echo $row["nombre"].";".$row["apellido1"].";".$row["apellido2"].";".$row["comentario"].";".$row["fk_idFoto"];
	}
	else
	{
		echo -1;
	}
}
else
{
	echo -1;
}

?>