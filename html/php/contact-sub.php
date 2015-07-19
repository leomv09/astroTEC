<?php

	require('db.php');

	if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
		header('Location: ../contact.php'); exit;
	}

	
	$name = $_POST['iname'];
	$email_address = $_POST['iemail'];
	$title = $_POST['ititle'];
	$message = $_POST['itext'];

	$name = htmlspecialchars($name);

	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email_address))
		$error = 'Debe ingresar un email valido';

	$email_address = htmlspecialchars($email_address);
	$title = htmlspecialchars($title);
	$message = htmlspecialchars($message);
	
	/*
	
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8";
	$headers .= "From: $email_address\r\n"; 
	$headers .= "Reply-To: $email_address\r\n";
	$headers .= "Subject: $title\r\n";
	$headers .= "X-Mailer: PHP/".phpversion()."\r\n";

	$email_content = "Nombre: $name\n";
	$email_content .= "Correo electrónico: $email_address\n";
	$email_content .= "Mensaje:\n\n$message";

	$result = $conn->query("select correo from Usuarios where fk_idTipoUsuario = 2");
	if($result->num_rows < 1){
		$error = "Imposible contactar a los Administradores";
	}
	$to = array();
	while($row = $result->fetch_assoc()) 
	{
		$to[] = $row["correo"];
	}

	$ok = mail (implode(',',$to), 'TecBasica Formulario de Contacto', $email_content, $headers);
	echo implode(',',$to);
	*/
	$sql = $conn->prepare("insert into Messages (Name,Email,Title,Message) values(?,?,?,?)");
	$sql->bind_param("ssss",$name, $email_address, $title, $message);
	$sql->execute();
	if(1>$sql->affected_rows)
	{
		$error = "Error al insertar";
	}
	if (isset($error)) {
		header('Location: ../contact.php?e='.urlencode($error)); exit;
	}
	header('Location: ../contact.php?s='.urlencode('Gracias por su mensaje')); exit;

?>