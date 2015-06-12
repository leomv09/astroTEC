<?php
require_once('db.php');

$gallery = array();

function getEventsInfo()
{
	global $gallery, $conn;
	$sql = "SELECT titulo, DATE_FORMAT(fecha, '%Y') AS year, DATE_FORMAT(fecha, '%M') AS month, DATE_FORMAT(fecha, '%d') AS day, DATE_FORMAT(fecha, '%W') AS dayName, DATE_FORMAT(fecha, '%h:%i %p') AS hour, descripcion, fk_idGaleria FROM Eventos WHERE fk_idEstado = 1 limit 7";

	$result = $conn->query($sql);

	if($result)
	{
		if($result->num_rows > 0)
		{
			$i = 0;
			while($row = $result->fetch_assoc())
			{
				echo "<tr>
			        <td class='agenda-date' class='active' rowspan='1'>
			            <div class='dayofmonth'>$row[day]</div>
			            <div class='dayofweek'>$row[dayName]</div>
			            <div class='shortdate text-muted'>$row[month], $row[year]</div>
			        </td>
			        <td class='agenda-time'>
			            $row[hour]
			        </td>
			        <td class='agenda-events'>
			            <div class='agenda-event'>
			                $row[descripcion]
			            </div>
			        </td>
			    </tr>";
			    $gallery[$i] = $row["fk_idGaleria"];//add each gallery id to the array;
			}

			$result->close();
		}
		else
		{

		}
	}
}

function getImages()
{
	//show gallery of each event.

}


?>