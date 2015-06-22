<?php
require_once('db.php');

global $conn;
$id = $_REQUEST["id"];

$sql = "SELECT Name, Email, Message FROM Messages WHERE idMessages = $id";

$result = $conn->query($sql);

if($result)
{
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$message = str_replace(";", " ", $row["Message"]);
		echo $message.";".$row["Email"].";".$row["Name"];
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