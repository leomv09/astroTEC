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
		die("Query failed [Cannot get the numbers of users with email = $email]: " . $conn->error);
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
		die("Query failed [Cannot get the ACTIVE state ID]: " . $conn->error);
	}

	// Get the normal user type id.
	$sql = "SELECT idTipoUsuario AS id FROM TipoUsuario WHERE tipo='normal'";
	$result = $conn->query($sql);
	$type = 0;
	
	if ($result) {
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$type = $row['id'];
			$result->close();
		}
		else {
			die ("Cannot get the NORMAL type ID.");
		}
	}
	else {
		die("Query failed [Cannot get the NORMAL type ID]: " . $conn->error);
	}

	// Create the user.
	$sql = "INSERT INTO Usuarios (fk_idEstado, fk_idTipoUsuario, nombre, correo, password) 
		VALUES ($state, $type, '$name', '$email', '$hashed_password')";
	$result = $conn->query($sql);
	
	if ($result) {
		session_regenerate_id();
		$_SESSION['USER_ID'] =  $conn->insert_id;
		$_SESSION['USER_EMAIL'] = $email;
		$_SESSION['USER_NAME'] = $name;
		$_SESSION['USER_TYPE'] = $type;
		unset($_SESSION['SIGNUP_ERRMSG']);
		session_write_close();
		header("location: ../index.php");
		exit();
	}
	else {
		die("Query failed: [INSERT USER] [$result]" . $conn->errno);
	}
?>