
<?php 
require_once('db.php');
global $coon;
$timestamp = time();
$currentTime = DateTime::createFromFormat( 'U', $timestamp );

if($_FILES['userImage']['error'] > 0) 
{
	die('Error ' . $_FILES['file']['error']);
}

if(empty($_FILES['userImage']['name'])) 
{
	die('No file sent.');
}

$tmp = $_FILES['userImage']['tmp_name'];

if(is_uploaded_file($tmp))
{
	$newPath = "img/members/".$timestamp.$_FILES['userImage']['name'];
    if(!move_uploaded_file($tmp, '../img/members/'.$timestamp.$_FILES['userImage']['name'])) 
    {
    	echo 'error !';
    }
    else
    {
    	$sql = "INSERT INTO ArchivosAdjunto(url, nombre, fk_idTipoArchivo, fk_idEstado) VALUES($newPath, '$temp', 4, 1)";
    	$result = $conn->query($sql);
    	if($result)
    	{
    		echo $conn->insert_id;
    	}
    	else
    	{
    		echo "Query error: ".$conn->error;
    	}
    }
}
else echo 'Upload failed!';

 ?>
 
