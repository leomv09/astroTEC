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

	if (!isset($_POST['faqTitle']) || !isset($_POST['faqAnswer']) ){
		header("location: ../index.php");
		exit();
	}

	$title = $_POST['faqTitle'];
	$content = $_POST['faqAnswer'];

	if (trim($title) == false || trim($content) == false){
		header("location: ../index.php");
		exit();
	}

	$sql = $conn->prepare("INSERT INTO faqs (faq,respuesta) VALUES (?,?);");
	$sql->bind_param("ss",$title,$content);
	$sql->execute();

	header("location: ../adminfaqs.php");

?>