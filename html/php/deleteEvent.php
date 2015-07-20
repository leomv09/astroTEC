<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = $conn->prepare("UPDATE Eventos SET fk_idEstado = 3 WHERE idEvento = ?");
$sql->bind_param("i",$id);

if($sql->execute())
{
	echo 1;
}
else
{
	echo -1;
}

?>