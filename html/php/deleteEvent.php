<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "UPDATE Eventos SET fk_idEstado = 3 WHERE idEvento = $id";

$result = $conn->query($sql);

if($result)
{
	echo 1;
}
else
{
	echo -1;
}

?>