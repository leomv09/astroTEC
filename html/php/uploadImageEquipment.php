
<?php 
require_once('db.php');
global $coon;
$timestamp = time();
$currentTime = DateTime::createFromFormat( 'U', $timestamp );

if($_FILES['equipmentImage']['error'] > 0) 
{
	die('Error ' . $_FILES['file']['error']);
}

if(empty($_FILES['equipmentImage']['name'])) 
{
	die('No file sent.');
}

$tmp = $_FILES['equipmentImage']['tmp_name'];

if(is_uploaded_file($tmp))
{
    $trim = preg_replace('/\s+/', '', $_FILES['equipmentImage']['name']); 
	$newPath = 'img/Equipment/'.$timestamp.$trim;
    if(!move_uploaded_file($tmp, '../img/Equipment/'.$timestamp.$trim)) 
    {
    	echo 'error !';
    }
    else
    {
    	$name = $_FILES['equipmentImage']['name'];
    	$sql = "INSERT INTO ArchivosAdjunto(url, nombre, fk_idTipoArchivo, fk_idEstado) VALUES('$newPath', '$name', 4, 1)";
    	$result = $conn->query($sql);
    	if($result)
    	{
    		$sql2 = "INSERT INTO Fotos(fk_idArchivo) VALUES ($conn->insert_id)";
    		$result2 = $conn->query($sql2);
    		if($result2)
    		{
    			echo $conn->insert_id;
    		}
    		else
    		{
    			echo "Query error: ".$conn->error;
    		}
    	}
    	else
    	{
    		echo "Query error: ".$conn->error;
    	}
    }
}
else echo 'Upload failed!';

 ?>
 
