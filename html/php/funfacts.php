<?php
require_once('db.php');

$facts = array();

function getFunFacts()
{
	global $facts, $conn;
	$sql = "SELECT contenido, DATE_FORMAT(fecha, '%Y') AS year, DATE_FORMAT(fecha, '%M') AS month, DATE_FORMAT(fecha, '%d') AS day, DATE_FORMAT(fecha, '%W') AS dayName,  contenido FROM datoscuriosos";

	$result = $conn->query($sql);

	if($result)
	{
		if($result->num_rows > 0)
		{
			$i = 0;
			while($row = $result->fetch_assoc())
			{
				echo 
				"<div class='col-md-4'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<h1 class='panel-title'>$row[day]-$row[month]-$row[year]</h1>
						</div>
						<div class='panel-body'>
							<p>
								$row[contenido]
							</p>
						</div>
					</div>
				</div>";
			}

			$result->close();
		}
		else
		{

		}
	}
}