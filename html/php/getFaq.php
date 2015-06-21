<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "SELECT faq, respuesta FROM faqs WHERE idFaq = $id";

$result = $conn->query($sql);

if($result)
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		echo $row["faq"].";".$row["respuesta"];
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