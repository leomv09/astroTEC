<?php 
	$acentos = $conn->query("SET NAMES 'utf8'");
	$sql_i="SELECT contenido FROM astrodb.datoscuriosos where fk_idEstado=1 order by rand() limit 1;" ;
	$result_i= $conn->query($sql_i);
	if ($result_i) 
	{
		if ($result_i->num_rows > 0) 
		{
			echo $result_i->fetch_assoc()["contenido"]; 
		}
		else 
		{
			echo "No hay datos curiosos"; 
		} 
	} 
	else 
	{ 
		die("Query failed: " . $conn->error); 
	} 
?>