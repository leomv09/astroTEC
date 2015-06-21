<?php
require_once('db.php');
global $conn;

$upload_dir = "img/Galerias/";
$timestamp = time();
$resValue = "";

if (isset($_FILES["imgs"])) 
{
    $num_files = count($_FILES["imgs"]['name']);
    mkdir('../img/Galerias/'.$timestamp);//Creates the gallery directory.
    $upload_dir.= $timestamp."/";
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
            if(!move_uploaded_file($_FILES["imgs"]["tmp_name"][$i], '../img/Galerias/'.$timestamp.'/'.$timestamp.$trim))
            {
            	die(-1);
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
		    			$resValue.=$conn->insert_id.";";
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
    echo rtrim($resValue, ";");
}
else
{
	echo "No files";
}

?>