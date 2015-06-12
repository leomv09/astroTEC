<?php

	/*
	require("functions.php");
	if (!isset($_SESSION['USER_ID'])) {
		header("location: ../index.php");
		exit();
	}
	*/
 
	require_once('db.php');

	if (! isset($_POST['simpleListParameter']) ){
		header("location: ../index.php");
		exit();
	}

	$sql = $conn->prepare("DELETE FROM faqs WHERE idFaq = ? ");
	$sql->bind_param("i",$_POST['simpleListParameter']);
	$sql->execute();

	header("location: ../adminfaqs.php");

?>