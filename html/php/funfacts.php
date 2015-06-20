<?php
require_once('db.php');

$facts = array(); 

function getFunFacts()
{
	global $facts, $conn;
	$sql = "SELECT contenido 
	        FROM DatosCuriosos
					ORDER BY RAND() LIMIT 3";

	$result = $conn->query($sql);

		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo 
				"<div class='col-md-4 funfact'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<h1 class='panel-title'></h1>
						</div>
						<div class='panel-body'>
							<p>
								$row[contenido]
							</p>
						</div>
					</div>
				</div>";
			}
		}

	}

function getFactsOptions()
{
	global $facts, $conn;
	$sql = "SELECT idDatoCurioso, titulo FROM DatosCuriosos";

	$result = $conn->query($sql);
	if($result)
	{
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "<option value=$row[idDatoCurioso]> $row[titulo] </option>";
			}
		}
	}
}

?>