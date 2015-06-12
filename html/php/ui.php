<?php
require_once('db.php');

function getSimplifiedList($selectQuery,$titles,$deleteIdentifier,$operationColumn,$postAction){

	echo "<form action = '$postAction' method = 'POST'>
			<div class='table-responsive'>
			<table class='table table-condensed table-bordered'>
			 <thead>
				<tr>";

	for ($ind = 0; $ind < count($titles); $ind++) {
		echo "<th>$titles[$ind]</th>";
	}
		echo "<th>$operationColumn</th>";
		echo "</tr>
				</thead>
						<tbody>";
							getSimplifiedListRows($selectQuery,$titles,$deleteIdentifier,$postAction);
						echo "</tbody>
		</table>
		</div>";

}

function getSimplifiedListRows($selectQuery,$titles,$deleteIdentifier,$postAction){
	global $conn;
	$sql = $selectQuery;

	$result = $conn->query($sql);

	if($result)
	{
		if($result->num_rows > 0)
		{
			$i = 0;
			while($row = $result->fetch_assoc())
			{
				echo "<tr>";

			    for ($ind = 0; $ind < count($titles); $ind++) {
			    	$name = $titles[$ind];
					echo "<td>$row[$name]</td>";
				}

			    echo
			        "<td>
			            <input type='submit' name='parameter' value='$row[$deleteIdentifier]'>
			        </td>
			    </tr>";
			}

			$result->close();
		}
		else
		{

		}
	}
}

?>