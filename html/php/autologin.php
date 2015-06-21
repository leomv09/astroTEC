<?php
	// Include database connection details.
	require_once('db.php');

	function autologin() {
		$id = $_COOKIE['USER_ID'];
		global $conn;

		if ($id) {
			$sql = "SELECT U.correo, U.nombre, TU.tipo
							FROM Usuarios AS U
							INNER JOIN TipoUsuario AS TU ON U.fk_idTipoUsuario = TU.idTipoUsuario
							WHERE idUsuario = $id";
			$result = $conn->query($sql);
			
			if ($result) {
				if ($result->num_rows > 0) {
					session_regenerate_id();
					$user = $result->fetch_assoc();
					$_SESSION['USER_ID'] = $id;
					$_SESSION['USER_EMAIL'] = $user['correo'];
					$_SESSION['USER_NAME'] = $user['nombre'];
					$_SESSION['USER_TYPE'] = $user['tipo'];
					$result->close();
					session_write_close();
				}
			}
			else {
				die("Query failed: " . $conn->error);
			}
		}
	}
?>