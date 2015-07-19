<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL); ?>
<?php
	/*
	require("functions.php");
	if (!isset($_SESSION['USER_ID'])) {
		header("location: ../index.php");
		exit();
	}
	*/
 
	require_once('db.php');
	global $conn;
	$title = $_REQUEST['title'];
	$content = $_REQUEST['fact'];

	$title = htmlspecialchars($title);
	$content = htmlspecialchars($content);

	$sql = $conn->prepare("INSERT INTO datoscuriosos (contenido, titulo, fecha) VALUES (?, ?, localtimestamp())");
	$sql->bind_param("ss",$content,$title);
	$result = $sql->execute();

	if($result)
	{
		echo 1;
	}
	else
	{
		echo $conn->error;
	}


?>