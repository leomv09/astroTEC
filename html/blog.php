<?php
	require("php/functions.php");
	require("php/db.php");

	$sql = "SELECT P.idPublicacion AS id, P.titulo, 
					CONCAT (SUBSTRING(P.contenido, 1, 700), '...') AS contenido, 
					P.fecha, CONCAT(U.nombre, ' ', U.apellido1) AS autor
					FROM Publicaciones AS P
					INNER JOIN Usuarios AS U ON U.idUsuario = P.fk_idCreador";
	$result = $conn->query($sql);
	$posts = array();
	
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			array_push($posts, $row);
    }
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
	<title>AstroTEC - Blog</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/blog.css">
</head>

<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. 
		Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container">
		<?php require('./php/navbar.php'); ?>
		<?php 
			foreach ($posts as $post) {
				echo "<div class='row'>";
				echo "	<div class='col-md-2'></div>";
				echo "	<div class='col-md-8 post'>";
				echo "		<a href='post.php?id=$post[id]'";
				echo "			<h2 class='title'>$post[titulo]</h2>";
				echo "		</a>";
				echo "		<p>$post[contenido]</p>";
				echo "    <div class='pull-left'>";
				echo "			<i class='fa fa-calendar'></i> <time>$post[fecha]</time>";
				echo "			<i class='fa fa-user'></i> <span>$post[autor]</span>";
				echo "		</div>";
				echo "		<a href='post.php?id=$post[id]' class='btn btn-success pull-right'>Leer más</a>";
				echo "	</div>";
				echo "</div>";
			}
		?>
	</div>
	<?php include("./php/footer.php"); ?>
</body>

</html>
