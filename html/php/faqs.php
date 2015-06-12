<?php
require_once('db.php');

function getFaqs()
{
	global $conn;
	$sql = "SELECT faq, respuesta FROM faqs";

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
							<h1 class='panel-title'>$row[faq]</h1>
						</div>
						<div class='panel-body'>
							<p>
								$row[respuesta]
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