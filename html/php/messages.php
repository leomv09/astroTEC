<?php
require("db.php");



function loadMessages()
{
	global $conn;
	$sql = "SELECT idMessages, Title FROM Messages";
	$result = $conn->query($sql);

	if($result)
	{
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "<option value=$row[idMessages]> $row[Title] </option>";
			}
		}
	}
}

?>