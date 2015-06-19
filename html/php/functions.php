<?php
	require('autologin.php');
	session_start();

	function check_login() {
		if (!isset($_SESSION['USER_ID']) and isset($_COOKIE['USER_ID'])) {
			autologin();
		}
	}

	function redirect_if_not_logged($url) {
		if (!isset($_SESSION['USER_ID'])) {
			header("location: $url");
			exit();
		}
	}

	function redirect_if_logged($url) {
		if (isset($_SESSION['USER_ID'])) {
			header("location: $url");
			exit();
		}
	}

	function redirect_if_not_admin($url) {
		if (!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != "administrador") {
			header("location: $url");
			exit();
		}
	}
?>