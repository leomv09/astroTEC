<?php require( "php/functions.php");?>
<?php require( "php/members.php");?>
<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - Miembros</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/team.css">
	<script type="text/javascript" src="js/members.js"></script>
</head>

<body>
	<div class="container">
		<?php require('./php/navbar.php'); ?>
		
		<h1 class="tittle">Miembros</h1>
		<div class="container text-center">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" role="tabpanel">
					<div class="col-xs-4 col-sm-12">
						<!-- Nav tabs -->
						<ul class="nav nav-justified" id="nav-tabs" role="tablist">
							<?php
								getMembers();
							?>
						</ul>
					</div>
					<div class="col-xs-8 col-sm-12">
						<div class="tab-content" id="tabs-collapse">
							<div role="tabpanel" class="tab-pane fade in active">
								<div class="tab-inner" id="memberInfo">
									<p class="lead" id="memberDescription"></p>
									<hr>
									<p><strong class="text-uppercase" id="memberName"></strong>
									</p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("./php/footer.php"); ?>
</body>

</html>