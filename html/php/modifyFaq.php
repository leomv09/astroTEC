<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$description = $_REQUEST["description"];
$id = $_REQUEST["id"];



$sql = "UPDATE faqs SET faq = '$title', respuesta = '$description' WHERE idFaq = $id";

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