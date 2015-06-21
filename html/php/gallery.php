<?php
require_once('db.php');

$galleries = array();

function loadGalleries() {
	global $conn;
	$sql = "SELECT G.idGaleria AS id, G.titulo FROM Galerias AS G";
	$result = $conn->query($sql);
	
	if ($result) {
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "<option value='$row[id]'>$row[titulo]</option>";
			}
		}
	}
}

function getGalleries()
{
	global $galleries, $conn;
	$sql = "SELECT DATE_FORMAT(fecha, '%Y') AS year, DATE_FORMAT(fecha, '%M') AS month, DATE_FORMAT(fecha, '%d') AS day, titulo, idGaleria, descripcion FROM Galerias";

	$result = $conn->query($sql);


	if($result)
	{

		if($result->num_rows > 0)
		{
			$i = 0;
			while ($row = $result->fetch_assoc())
			{
				$urlPreview = getPreviewImage($row['idGaleria']);
				
				if ($i % 3 == 0) {
					echo "<div class='row'>";
				}
				
				echo
				"<div class='col-md-4'>
					<div class='panel panel-success'>
						<div class='panel-heading'><a href='viewgallery.php?galeria=$row[idGaleria]'><strong>$row[titulo]</strong></a><small><i> Creada el $row[day] de $row[month] $row[year]</i></small></div>
						<div class='panel-body'>
							<a href='viewgallery.php?galeria=$row[idGaleria]' class='text-center'>
								<img src='$urlPreview' class='media-object img-thumbnail' width='320' height='180' alt='A album'>
							</a>
						</div>
					</div>
				</div>";
				
				if ($i % 3 == 2) {
					echo "</div>";
				}
				
				$i = ($i + 1) % 3;	
			}
			
			if ($i % 3 != 0) {
				echo "</div>";
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
					FROM Galerias AS G 
					INNER JOIN FotosXGaleria AS FG ON FG.fk_idGaleria = G.idGaleria
					INNER JOIN Fotos AS F ON F.idFoto = FG.fk_idFoto
					INNER JOIN ArchivosAdjunto AS AA ON AA.idArchivo = F.fk_idArchivo
					WHERE G.idGaleria = $idGaleria LIMIT 1;";
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