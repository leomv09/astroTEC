<?php
    error_reporting(E_ALL);
    ini_set('display_errors', True);

	// Start session.
	session_start();
 
	// Include database connection details.
	require_once('db.php');
 
 	// Get the input values.
	$email = $_POST['email'];
	$password = $_POST['password'];
	$remember = $_POST['remember'];
	$hashed_password = hash("sha256", $password);

	$sql = $conn->prepare("SELECT U.idUsuario AS id, U.correo, U.nombre, TU.tipo
			FROM Usuarios AS U
			INNER JOIN TipoUsuario AS TU ON U.fk_idTipoUsuario = TU.idTipoUsuario
			WHERE correo=? AND password=?");
	$sql->bind_param("ss",$email,$hashed_password);
	$sql->execute();
	$result=$sql->get_result();
	
	if ($result) {
		if ($result->num_rows > 0) {
			session_regenerate_id();
			$user = $result->fetch_assoc();
			$_SESSION['USER_ID'] = $user['id'];
			$_SESSION['USER_EMAIL'] = $user['correo'];
			$_SESSION['USER_NAME'] = $user['nombre'];
			$_SESSION['USER_TYPE'] = $user['tipo'];
			if ($remember) {
				setcookie('USER_ID', $user['id'], time() + (3600*24*365), "/");
			}
			else {
				setcookie('USER_ID', "", time() - 1, "/");
			}
			$result->close();
			unset($_SESSION['LOGIN_ERRMSG']);
			session_write_close();
			header("location: ../index.php");
			exit();
		}
		else {
			$_SESSION['LOGIN_ERRMSG'] = "Credenciales inválidos";
			session_write_close();
			header("location: ../login.php#login");
			exit();
		}
	}
	else {
		die("Query failed: " . $conn->error);
	}
?>