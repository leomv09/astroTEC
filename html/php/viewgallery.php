<?php
require_once('db.php');

function getPictures()
{
	if (! isset($_GET["galeria"])){
		return;
	}
	global $conn;
	$idGaleria = (int)$_GET["galeria"];
	$sql = $conn->prepare("SELECT F.titulo as titulo, F.descripcion as descripcion,
							   AA.url as urlImagen
								FROM galerias G
									INNER JOIN fotosxgaleria FG
										ON FG.fk_idGaleria = G.idGaleria
									INNER JOIN fotos F
										ON F.idFoto = FG.fk_idFoto
									INNER JOIN archivosadjunto AA
										ON AA.idArchivo = F.fk_idArchivo
								WHERE G.idGaleria = ?;");
	$sql->bind_param("i",$idGaleria);
	$sql->execute();
	$result=$sql->get_result();

	if($result)
	{
		if($result->num_rows > 0)
		{

		echo "Yolo";
			$i = 0;
			while($row = $result->fetch_assoc())
			{
				echo 
				"<div class='ultraduper'>
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

function showGalleryName()
{
	$galleryname = 'Galería no existente';
	if (isset($_GET["galeria"])){
		$idGaleria = $_GET["galeria"];
		global $conn;
		$sql = $conn->prepare("SELECT G.titulo AS titulo 
					FROM galerias G
					WHERE G.idGaleria = ?;");
		$sql->bind_param("i",$idGaleria);
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