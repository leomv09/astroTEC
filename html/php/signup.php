<?php
	// Start session
	session_start();
 
	// Include database connection details
	require_once('db.php');

	// Get input values
 	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm-password'];
	$hashed_password = hash("sha256", $password);

	// Check if passwords are the same.
	if ($password !== $confirm_password) {
		$_SESSION['SIGNUP_ERRMSG'] = "Las contraseñas no coinciden";
		session_write_close();
		header("location: ../login.php#signup");
		exit();
	}

	$sql = $conn->prepare("SELECT COUNT(*) AS cnt FROM Usuarios WHERE correo= ?");
	$sql->bind_param("s",$email);
	$sql->execute();
	$result=$sql->get_result();

	if ($result) {
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$count = $row['cnt'];
			if ($count != 0) {
				$_SESSION['SIGNUP_ERRMSG'] = "Ya existe un usuario con el correo $email";
				session_write_close();
				header("location: ../login.php#signup");
				exit();
			}
			$result->close();
		}
		else {
			die ("Cannot get the numbers of users with email = $email");
		}
	}
	else {
		die("Query failed: " . $conn->error);
	}

	// Get the active user state id.
	$sql = "SELECT idEstado FROM EstadoUsuario WHERE estado='activo'";
	$result = $conn->query($sql);
	$state = 0;
	
	if ($result) {
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$state = $row['idEstado'];
			$result->close();
		}
		else {
			die ("Cannot get the ACTIVE state ID.");
		}
	}
	else {
		die("Query failed: " . $conn->error);
	}

	// Create the user.

	$sql = $conn->prepare(
		"INSERT INTO Usuarios (fk_idEstado, nombre, correo, password) 
		VALUES ($state, ?, ?, '$hashed_password')");
	$sql->bind_param("ss",$name,$email);
	$sql->execute();
	$result=$sql->get_result();
	
	if ($result) {
		session_regenerate_id();
		$_SESSION['USER_ID'] =  $conn->insert_id;
		$_SESSION['USER_EMAIL'] = $email;
		$_SESSION['USER_NAME'] = $name;
		unset($_SESSION['SIGNUP_ERRMSG']);
		session_write_close();
		header("location: ../index.php");
		exit();
	}
	else {
		die("Query failed: " . $conn->error);
	}
?>