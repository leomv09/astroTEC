
<?php 
require_once('db.php');
global $coon;
$timestamp = time();
$currentTime = DateTime::createFromFormat( 'U', $timestamp );

if($_FILES['userImage']['error'] > 0) 
{
	die(-1);
}

if(empty($_FILES['userImage']['name'])) 
{
	die(-1);
}

$tmp = $_FILES['userImage']['tmp_name'];

if(is_uploaded_file($tmp))
{
	$newPath = 'img/members/'.$timestamp.$_FILES['userImage']['name'];
    if(!move_uploaded_file($tmp, '../img/members/'.$timestamp.$_FILES['userImage']['name'])) 
    {
    	echo 'error !';
    }
    else
    {
    	$name = $_FILES['userImage']['name'];
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
 
