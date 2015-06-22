<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "SELECT titulo, fecha, descripcion FROM Eventos WHERE idEvento = $id";

$result = $conn->query($sql);

if($result)
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$title  = str_replace(";", " ", $row["titulo"]);
		$description  = str_replace(";", " ", $row["descripcion"]);
		echo $title.";".$description.";".$row["fecha"];
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