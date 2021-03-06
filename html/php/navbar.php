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
				<li><a href="./equipment.php">Equipo</a>
				</li>
				<li><a href="./funfacts.php">Datos Curiosos</a>
				</li>
				<li><a href="./blog.php">Blog</a>
				</li>
				<li><a href="./contact.php">Contacto</a>
				</li>
				<li><a href="./faqs.php">FAQs</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
					if (!isset($_SESSION['USER_ID']))  {
						echo "<li class='pull-right'>";
						echo "	<a href='./login.php'>Log In</a>";
						echo "</li>";
					}
					else {
						echo "<li class='dropdown'>";
          	echo "	<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>$_SESSION[USER_NAME] <span class='caret'></span></a>";
          	echo "	<ul class='dropdown-menu'>";
            echo "		<li><a href='./php/logout.php'>Log Out</a></li>";
          	echo "	</ul>";
        		echo "</li>";
					}
				?>
      </ul>
		</div>
	</div>
</nav>