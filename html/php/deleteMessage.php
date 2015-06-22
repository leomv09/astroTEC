<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "DELETE FROM Messages WHERE idMessages = $id";

$result = $conn->query($sql);

if($result)
{
	echo 1;
}
else
{
	echo $conn->error;
}

?>