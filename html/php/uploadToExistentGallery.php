<?php
require_once('db.php');
global $conn;

$galleryId = $_REQUEST["id"];
$upload_dir = "img/Galerias/";
$timestamp = time();
$resValue = "";

if (isset($_FILES["imgs"])) 
{
    $sql = "SELECT fk_idFoto FROM FotosXGaleria WHERE fk_idGaleria = $galleryId LIMIT 1";
    $result = $conn->query($sql);
    if(!$result)
    {
        die(-1);
    }
    if($result->num_rows <= 0)
    {
        die(-1);
    }
    $row = $result->fetch_assoc();
    $galleryPath = getPhotoPath($row["fk_idFoto"]);
    $num_files = count($_FILES["imgs"]['name']);
    $upload_dir.= $galleryPath."/";
    for ($i = 0; $i < $num_files; $i++) 
    {
        if ($_FILES["imgs"]["error"][$i] > 0) 
        {
            die(-1);
        } 
        else 
        {
        	$trim = preg_replace('/\s+/', '', $_FILES['imgs']['name'][$i]);
            $temp = explode(".", $_FILES["imgs"]["name"][$i]);
            $extension = end($temp);
            if(!move_uploaded_file($_FILES["imgs"]["tmp_name"][$i], '../img/Galerias/'.$galleryPath.'/'.$timestamp.$trim))
            {
            	die("cant move file");
            }
            else
            {
            	$name = $_FILES['imgs']['name'][$i];
            	$newPath = $upload_dir.$timestamp.$trim;
		    	$sql = "INSERT INTO ArchivosAdjunto(url, nombre, fk_idTipoArchivo, fk_idEstado) VALUES('$newPath', '$name', 4, 1)";
		    	$result = $conn->query($sql);
		    	if($result)
		    	{
		    		$sql2 = "INSERT INTO Fotos(fk_idArchivo) VALUES ($conn->insert_id)";
		    		$result2 = $conn->query($sql2);
		    		if($result2)
		    		{
                        insertToGallery($conn->insert_id);
		    		}
		    		else
		    		{
		    			die("Query error: ".$conn->error);
		    		}
		    	}
		    	else
		    	{
		    		die("Query error: ".$conn->error);
		    	}
            }           
        }
    }
    echo rtrim(1);
}
else
{
	echo "No files";
}


function getPhotoPath($photoId)
{
    global $conn;
    $sql = "SELECT fk_idArchivo FROM Fotos WHERE idFoto = $photoId";
    $result = $conn->query($sql);
    if($result)
    {
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $sql = "SELECT url FROM ArchivosAdjunto WHERE idArchivo = $row[fk_idArchivo]";
            $result = $conn->query($sql);
            if($result)
            {
                if($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    $array = explode("/", $row["url"]);
                    if(count($array) == 4)
                    {
                       return $array[2]; 
                    }
                }
            }
        }
    }
    die($conn->error);
}

function insertToGallery($photoId)
{
    global $conn, $galleryId;
    $sql = "INSERT INTO FotosXGaleria(fk_idGaleria, fk_idFoto) VALUES($galleryId, $photoId)";
    $result = $conn->query($sql);
    if($result)
    {
        return 1;
    }
    die($conn->error);
}

?>