<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = $conn->prepare("DELETE FROM equipo WHERE idEquipo = ?");
$sql->bind_param("i",$id);

if($sql->execute())
{
	echo 1;
}
else
{
	echo $conn->error;
}

?>