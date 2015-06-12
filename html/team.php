<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - Miembros</title>
	<?php require('./php/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/team.css">
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
							<li role="presentation" class="active" id="member1">
								<a href="#member1" role="tab" data-toggle="tab" onclick="changeMember('member1')">
									<img class="img-circle" src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" />
								</a>
							</li>
							<li role="presentation" class="" id="member2">
								<a href="#member2" role="tab" data-toggle="tab" onclick="changeMember('member2')">
									<img class="img-circle" src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" />
								</a>
							</li>
							<li role="presentation" class="" id="member3">
								<a href="#member3" role="tab" data-toggle="tab" onclick="changeMember('member3')">
									<img class="img-circle" src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" />
								</a>
							</li>
							<li role="presentation" class="" id="member4">
								<a href="#member4" role="tab" data-toggle="tab" onclick="changeMember('member4')">
									<img class="img-circle" src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" />
								</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-8 col-sm-12">
						<div class="tab-content" id="tabs-collapse">
							<div role="tabpanel" class="tab-pane fade in active">
								<div class="tab-inner" id="memberInfo">
									<p class="lead" id="memberDescription">Me gusta practicar deportes. Estudio ingeniería en computación.</p>
									<hr>
									<p><strong class="text-uppercase" id="memberName">Leonardo Madrigal</strong>
									</p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/team.js"></script>
</body>

</html>