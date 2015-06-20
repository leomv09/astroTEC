<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "SELECT titulo, contenido FROM datoscuriosos WHERE idDatoCurioso = $id";

$result = $conn->query($sql);

if($result)
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		echo $row["titulo"].";".$row["contenido"];
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