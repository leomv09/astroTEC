<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql1 = "DELETE FROM comentariosxpublicacion WHERE fk_idPublicacion = $id";
$sql = "DELETE FROM Publicaciones WHERE idPublicacion = $id";

$result1 = $conn->query($sql1);
$result = $conn->query($sql);

if($result && $result1)
{
	echo 1;
}
else
{
	echo $conn->error;
}

?>