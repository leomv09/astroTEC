<?php
	require("php/functions.php");
	check_login();
	redirect_if_logged("index.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
	<title>AstroTEC - Login</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. 
		Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="container">
		<?php require('./php/navbar.php'); ?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#login" id="login-form-link" onclick="showLogin(100)">Iniciar Sesión</a>
							</div>
							<div class="col-xs-6">
								<a href="#signup" id="register-form-link" onclick="showRegister(100)">Registrarme</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="php/login.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña" required>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Recuerdame</label>
									</div>
									<?php
										if (isset($_SESSION['LOGIN_ERRMSG']) && !empty($_SESSION['LOGIN_ERRMSG'])) {
											$content = "<div class='alert alert-danger alert-dismissible' role='alert'>";
											$content .= "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
											$content .= "<span aria-hidden='true'>&times;</span></button>";
											$content .= "<strong>Error!</strong>  ";
											$content .= $_SESSION['LOGIN_ERRMSG'];
											$content .= "</div>";
											echo $content;
											unset($_SESSION['LOGIN_ERRMSG']);
										}
									?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Iniciar Sesión">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="php/signup.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Nombre" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Repetir Contraseña" required>
									</div>
									<?php
										if (isset($_SESSION['SIGNUP_ERRMSG']) && !empty($_SESSION['SIGNUP_ERRMSG'])) {
											$content = "<div class='alert alert-danger alert-dismissible' role='alert'>";
											$content .= "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
											$content .= "<span aria-hidden='true'>&times;</span></button>";
											$content .= "<strong>Error!</strong>  ";
											$content .= $_SESSION['SIGNUP_ERRMSG'];
											$content .= "</div>";
											echo $content;
											unset($_SESSION['SIGNUP_ERRMSG']);
										}
									?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-success" value="Registrar">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("./php/footer.php"); ?>
	<script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript">
		(function() {
			var hash = window.location.hash.substring(1);
			if (hash == "signup") {
				showRegister(0);
			}
			else {
				showLogin(0);
			}
		})();
	</script>
</body>
</html>
