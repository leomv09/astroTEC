<?php
	require( "php/functions.php");
	require("php/db.php");

	$id = $_GET["id"];

	if ($id) {
		$sql = "SELECT P.idPublicacion AS id, P.titulo, P.contenido, 
						P.fecha, CONCAT(U.nombre, ' ', U.apellido1) AS autor
						FROM Publicaciones AS P
						INNER JOIN Usuarios AS U ON U.idUsuario = P.fk_idCreador
						WHERE P.idPublicacion = $id";
		
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$post = $result->fetch_assoc();
		}
		
		$sql = "SELECT C.contenido, C.fecha, CONCAT(U.nombre, ' ', U.apellido1) AS autor
						FROM Comentarios AS C
						INNER JOIN Usuarios AS U ON U.idUsuario = C.fk_idUsuario
						INNER JOIN ComentariosXPublicacion AS CP ON C.idComentario = CP.fk_idComentario
						WHERE CP.fk_idPublicacion = $id
						ORDER BY C.fecha ASC";
		
		$result = $conn->query($sql);
		$comments = array();
			
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($comments, $row);
			}
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
	<link rel="stylesheet" type="text/css" href="css/post.css">
</head>

<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser.
		Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container">
		<?php require('./php/navbar.php'); ?>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 post">
				<h2><?php echo $post["titulo"] ?></h2>
				<p><?php echo $post["contenido"] ?></p>
				<span><i class='fa fa-user'></i> <?php echo $post["autor"]; ?></span>
				<br>
				<span><i class='fa fa-calendar'></i> <?php echo $post["fecha"]; ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 post">
				<form class="comment-form" action="#">
			<div class="form-group">
				<textarea class="form-control" id="comment-content" name="comment-content" placeholder="Comment something here..."></textarea>
			</div>
			<div class="form-group">
				<input type="number" id="post-id" name="post-id" value="<?php echo $id; ?>" style="visibility:hidden;display:none;">
			</div>
			<div class="form-group">
				<input type="text" id="autor-name" name="autor-name" value="Jhon Doe" style="visibility:hidden;display:none;">
			</div>
			<button type="button" class="btn btn-success" onclick="create_comment()">Comment</button>
		</form>
			</div>
		</div>
		<div id="comment-list">
			<?php
				foreach ($comments as $comment) {
					echo "<div class='row'>";
					echo "	<div class='col-md-8 col-md-offset-2 comment'>";
					echo "		<div class='panel panel-default'>";
					echo "			<div class='panel-heading'>";
					echo "				<span class='panel-title'><i class='fa fa-user'></i> $comment[autor]</span>";
					echo "				<span class='panel-title pull-right'><i class='fa fa-calendar'></i> $comment[fecha]</span>";
					echo "			</div>";
					echo "			<div class='panel-body'>";
					echo "				<p>$comment[contenido]</p>";
					echo "			</div>";
					echo "		</div>";
					echo "	</div>";
					echo "</div>";
				}
			?>
		</div>
	</div>

	<script type="text/javascript" src="js/vendor/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/post.js"></script>
</body>

</html>
