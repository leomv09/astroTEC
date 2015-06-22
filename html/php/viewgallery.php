<?php
require_once('db.php');

function getPictures()
{
	if (! isset($_GET["galeria"])){
		return;
	}
	global $conn;
	$idGaleria = $_GET["galeria"];
	$sql = $conn->prepare("SELECT F.titulo as titulo, F.descripcion as descripcion, F.idFoto as idFoto,
							   AA.url as urlImagen
								FROM Galerias G
									INNER JOIN FotosXGaleria FG
										ON FG.fk_idGaleria = G.idGaleria
									INNER JOIN Fotos F
										ON F.idFoto = FG.fk_idFoto
									INNER JOIN ArchivosAdjunto AA
										ON AA.idArchivo = F.fk_idArchivo
								WHERE G.idGaleria = ?;");
	$sql->bind_param("i", $idGaleria);
	$sql->execute();
	$result=$sql->get_result();

	if($result)
	{
		if($result->num_rows > 0)
		{
			$i = 0;
			while($row = $result->fetch_assoc())
			{
				echo 
				"<a name='f$row[idFoto]'></a>
					<div class='panel panel-default'>
						<div class='media'>
				        	<a class='pull-left' href='$row[urlImagen]'>
				            	<img src='$row[urlImagen]' class='media-object img-thumbnail focus' width='260' height='180' alt='A image'>
				        	</a>
					        <div class='media-body'>
					            <h4 class='media-heading'><strong>$row[titulo]</strong></h4>
					            <p>$row[descripcion]</p>
					        </div>
			    		</div>
				        <div class='fb-like' 
						        data-href='$_SERVER[SERVER_NAME]/viewgallery.php?galeria=$idGaleria#f$row[idFoto]'
						        data-layout='button_count' data-action='like' data-show-faces='false' data-share='true'></div>
					</div>
				";
			}

			$result->close();
		}
		else
		{
			header("location: gallery.php");
		}
	}
}

function showGalleryName()
{
	$galleryname = 'Galería no existente';
	if (isset($_GET["galeria"])){
		$idGaleria = $_GET["galeria"];
		global $conn;
		$sql = $conn->prepare("SELECT G.titulo AS titulo 
					FROM Galerias G
					WHERE G.idGaleria = ?;");
		$sql->bind_param("i", $idGaleria);
		$sql->execute();
		$result=$sql->get_result();
		if ($result) {
			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$galleryname = $row['titulo'];
			}
			$result->close();
		}
	}
	echo $galleryname;
	
}