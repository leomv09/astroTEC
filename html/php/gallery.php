<?php
require_once('db.php');

$galleries = array();

function getGalleries()
{
	global $galleries, $conn;
	$sql = "SELECT DATE_FORMAT(fecha, '%Y') AS year, DATE_FORMAT(fecha, '%M') AS month, DATE_FORMAT(fecha, '%d') AS day, titulo, idGaleria, descripcion FROM galerias";

	$result = $conn->query($sql);


	if($result)
	{

		if($result->num_rows > 0)
		{
			$i = 0;
			while($row = $result->fetch_assoc())
			{
				
				$urlPreview = getPreviewImage($row['idGaleria']);
				echo 
				"<div>
					<div class='panel panel-default'>
						<div class='media'>
				        	<a href='viewgallery.php?galeria=$row[idGaleria]' class='pull-left'>
				            	<img src='$urlPreview' class='media-object img-thumbnail' width='260' height='180' alt='A album'>
				        	</a>
					        <div class='media-body'>
					            <h4 class='media-heading'><strong>$row[titulo]</strong><small><i> Creada el 
					            	$row[day] de $row[month] $row[year]</i></small></h4>
					            <p>$row[descripcion]</p>
					        </div>

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

function getPreviewImage($idGaleria)
{
	global $conn;
	$imageurl = '';
	$sql = "SELECT AA.url AS urlImagen 
		FROM galerias G 
				INNER JOIN fotosxgaleria FG
					ON FG.fk_idGaleria = G.idGaleria
				INNER JOIN fotos F
					ON F.idFoto = FG.fk_idFoto
				INNER JOIN archivosadjunto AA
					ON AA.idArchivo = F.fk_idArchivo
		WHERE G.idGaleria = 1 LIMIT 1;";
	$result = $conn->query($sql);
	if ($result) {
		if ($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$imageurl = $row['urlImagen'];
		}
		$result->close();
	}
	return $imageurl;
}