<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$answer = $_REQUEST["description"];
  
$title = htmlspecialchars($title);
$answer = htmlspecialchars($answer);

$sql = $conn->prepare("INSERT INTO faqs(faq, respuesta) VALUES (?, ?)");
$sql->bind_param("ss",$title,$answer);

if($sql->execute())
{
	echo $conn->insert_id;
}
else
{
	echo -1;
}

?>