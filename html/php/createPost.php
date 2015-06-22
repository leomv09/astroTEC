<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$description = $_REQUEST["description"];
  $user = 1;
if(isset($_SESSION["USER_ID"]))
{
	$user = $_SESSION["USER_ID"];
}


$sql = "INSERT INTO Publicaciones(titulo, contenido, fecha, fk_idCreador) VALUES ('$title', '$description', NOW(), $user)";

$result = $conn->query($sql);

if($result)
{
	echo $conn->insert_id;
}
else
{
	echo $conn->error;
}

?>