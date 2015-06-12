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

	if (!isset($_POST['fact'])){
		header("location: ../index.php");
		exit();
	}

	$content = $_POST['fact'];

	if (trim($content) == false){
		header("location: ../index.php");
		exit();
	}

	$sql = $conn->prepare("INSERT INTO datoscuriosos (contenido,fecha) VALUES (?,localtimestamp());");
	$sql->bind_param("s",$content);
	$sql->execute();

	header("location: ../adminfunfacts.php");

?>