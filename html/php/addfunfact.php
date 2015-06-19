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
	$content = $_REQUEST['fact'];



	$sql = "INSERT INTO datoscuriosos (contenido,fecha) VALUES ($content, localtimestamp());";
	$result = $conn->query($sql);

	if($result)
	{
		echo 1;
	}
	else
	{
		echo -1;
	}


?>