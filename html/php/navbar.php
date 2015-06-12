<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">AstroTEC</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="./events.php">Eventos</a>
				</li>
				<li><a href="./gallery.php">Galería</a>
				</li>
				<li><a href="./funfacts.php">Datos Curiosos</a>
				</li>
				<li><a href="#">Blog</a>
				</li>
				<li><a href="#">Contacto</a>
				</li>
				<li><a href="./faqs.php">FAQs</a>
				</li>
		<?php
			if (!isset($_SESSION['USER_ID'])) 
			{
		?>
				<li><a href="./login.php">Login</a>
				</li>
		<?php	
			}
			else
			{
		?>
				<li><a href="./php/logout.php">Logout</a>
				</li>
		<?php
			}
		?>
			</ul>
		</div>
	</div>
</nav>