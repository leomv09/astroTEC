<?php
require_once('db.php');

global $conn;
$title = $_REQUEST["title"];
$answer = $_REQUEST["description"];
  


$sql = "INSERT INTO faqs(faq, respuesta) VALUES ('$title', '$answer')";

$result = $conn->query($sql);

if($result)
{
	echo $conn->insert_id;
}
else
{
	echo -1;
}

?>