<div class="container footer-bottom">
		<div class="row">
			<div class="col-sm-1 col-sm-offset-5">
				<a href="https://www.facebook.com/AstroTEC.ITCR" class="thumbnail">
					<img src="./img/social-31-facebook.png" alt="Facebook">
				</a>
			</div>
			<div class="col-sm-1">
				<a href="#" class="thumbnail">
					<img src="./img/social-32-twitter.png" alt="Twitter">
				</a>
			</div>
		</div>
		<div class="row">
			<p class="text-muted">Icons from <a href="http://glyphicons.com">Glyphicons Free</a>, licensed under
			<a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.
			<?php
				if (isset($_SESSION['USER_TYPE'])	&& $_SESSION['USER_TYPE'] == "administrador") {
					echo "<a href='adminPage.php' class='pull-right'>Admin Site</a>";
				}
			?>
			</p>
		</div>
	</div>
	<script type="text/javascript" src="js/vendor/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>