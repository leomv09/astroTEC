<?php require( "php/functions.php");?>
<?php require( "php/events.php"); 
	require( "php/funfacts.php");
function checkSession()
{
	if(isset($_SESSION['USER_NAME']))
	{
		redirect_if_not_admin("index.php");
		echo " <script type='text/javascript'>
				showAdminName('$_SESSION[USER_NAME]');
				</script>
			";
	}
	else
	{
		redirect_if_not_admin("index.php");
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>AstroTEC - Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script type="text/javascript" src="js/admin.js"></script>	
	<script type="text/javascript" src="js/events.js"></script>	
	<script type="text/javascript" src="js/funfacts.js"></script>	
</head>

<body>
 	<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a id="adminName" class="navbar-brand" href="#">
				Administrator
			</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown ">
				<?php
					if (!isset($_SESSION['USER_ID'])) 
					{
						?>
							<a href="./login.php" role="button" aria-expanded="false">
								Login</a>
						<?php	
							}
							else
							{
						?>
							<a href="./php/logout.php" role="button" aria-expanded="false">
								Logout</a>
						<?php
							}
						?>
					</li>
				</ul>
			</div>
		</div>
	</nav>  	
	<div class="container-fluid main-container">
  		<div class="col-md-2 sidebar">
  			<div class="row">
				<div class="absolute-wrapper"> </div>
		<!-- Menu -->
		<div class="side-menu">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Main Menu -->
				<div class="side-menu-container">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>

						<li><a href="#Modify" onclick="show(0, 'Modificar portada')"> Modificar portada </a><hr></li>

						<li><a href="#CreateEvents" onclick="show(4, 'Crear evento')"><span ></span> Crear eventos </a></li>
						<li><a href="#ModifyEvents" onclick="show(1, 'Modificar eventos')"><span> </span> Modificar eventos </a><hr></li>

						<li><a href="#CreateGallery" onclick="show(9, 'Crear galería')"><span ></span> Crear galería </a></li>
						<li><a href="#ModifyGallery" onclick="show(10, 'Modificar galerías')"><span ></span> Modificar galería </a><hr></li>

						<li><a href="#CreatePost" onclick="show(14, 'Crear blog')"><span ></span> Crear publicación </a></li>
						<li><a href="#ModifyPost" onclick="show(11, 'Modificar blogs')"><span ></span> Modificar publicación </a><hr></li>

						<li><a href="#CreateFunFact" onclick="show(8, 'Crear dato curioso')"><span ></span> Crear dato curioso</a></li>
						<li><a href="#ModifyFunFact" onclick="show(5, 'Modificar datos curiosos')"><span ></span> Modificar datos curiosos</a><hr></li>

						<li><a href="#CreateFaq" onclick="show(18, 'Crear pregunta frecuente')"><span ></span> Crear pregunta frecuente </a></li>
						<li><a href="#ModifyFaq" onclick="show(15, 'Modificar preguntas frecuentes')"><span ></span> Modificar pregunta frecuente </a><hr></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>  		
</div>
 <div class="col-md-10 content">
  	<div class="panel panel-default">
		<div class="panel-heading" id="panelheading">
			Panel
		</div>
	<div class="hidden" id="hidden1">
			<h2 style="margin-bottom: 25px; text-align: center;"> Modificar Evento </h2>
			<select class="form-control col-sm-5" id="optionSelect" onchange="changeVisibility()">
				<option value="1"> Modificar </option>
				<option value="2"> Eliminar </option>
              </select>
              <div class="hidden" id="hidden2">
	              <div class="container">
						<div class="col-md-10">
						    <div class="form-area"> 
				                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
				    				<div class="form-group">
				    					<label>Seleccione un evento:</label>
										<select class="form-control col-sm-2" id="eventsList" onchange="getSelectedEvent()">
								          	<?php
								          		getEvents();
								          		loadEvents();
								          	?>
								          </select>
									</div>
									<div class="form-group">
										<label>Título del evento:</label>
										<input class="form-control" type="text" id="modifyTitle" placeholder="Título">
									</div>
									<div class="form-group">
										<label>Fecha:</label>
										<input class="form-control" type="text" id="modifyDate" placeholder="DD/MM/AAAA">
									</div>
									<div class="form-group">
										<label>Hora:</label>
										<input class="form-control" type="text" id="modifyHour" placeholder="HH:MM:SS">
									</div>
				                    <div class="form-group">
				                    	<label>Descripción:</label>
				                    <textarea class="form-control" id="modifyDescription" placeholder="Descripción (Máximo 200 caracteres)" maxlength="200" rows="7"></textarea>                   
				                    </div>
						        <button type="button" class="btn btn-default" onclick="modifyEvent()">Modificar</button>
						    </div>
						</div>			         
	              </div>
              </div>
              <div class="hidden" id="hidden3">
              	<div class="container">
					<div class="col-md-10">
					    <div class="form-area"> 
		                    <h3 style="margin-bottom: 25px; text-align: center;">Eliminar</h3>
		                    <div class="form-group">
			              		<label> Seleccione el evento:</label>
					          	<select class="form-control col-sm-2" id="deleteList">
					          	<?php
					          		getEvents();
					          		loadEvents();
					          	?>
					          	</select>
					        </div> 	
				          <button type="button" class="btn btn-default" onclick="deleteEvent()">Eliminar</button>
			            </div>
				    </div>
				</div>
			</div>
		</div>

		<div class="hidden" id="hidden4">
	              <div class="container">
						<div class="col-md-10">
						    <div class="form-area"> 
				                    <h2 style="margin-bottom: 25px; text-align: center;">Crear</h2>
									<div class="form-group">
										<label>Título del evento:</label>
										<input class="form-control" type="text" id="createTitle" placeholder="Título">
									</div>
									<div class="form-group">
										<label>Fecha:</label>
										<input class="form-control" type="text" id="createDate" placeholder="DD/MM/AAAA">
									</div>
									<div class="form-group">
										<label>Hora:</label>
										<input class="form-control" type="text" id="createHour" placeholder="HH:MM:SS">
									</div>
				                    <div class="form-group">
				                    	<label>Descripción:</label>
				                    <textarea class="form-control" id="createDescription" placeholder="Descripción (Máximo 200 caracteres)" maxlength="200" rows="7"></textarea>                   
				                    </div>
						        <button type="button" class="btn btn-default" onclick="createEvents()">Crear</button>
						    </div>
						</div>			         
	              </div>
              </div>

           <div class="hidden" id="hidden5">
				<h2 style="margin-bottom: 25px; text-align: center;"> Modificar Datos Curiosos </h2>
				<select class="form-control col-sm-5" id="optionFactsSelect" onchange="changeFactsVisibility()">
					<option value="1"> Modificar </option>
					<option value="2"> Eliminar </option>
              	</select>
	            <div class="hidden" id="hidden6">
		              <div class="container">
							<div class="col-md-10">
							    <div class="form-area"> 
					                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					    				<div class="form-group">
										</div>
					                    <div class="form-group">
					                    	<label>Contenido:</label>
					                    <textarea class="form-control" id="funFactDescription" placeholder="Descripción" maxlength="800" rows="7"></textarea>                   
					                    </div>
							        <button type="button" class="btn btn-default" onclick="modFunFact()">Modificar</button>
							    </div>
							</div>			         
		              </div>
	            </div>
              <div class="hidden" id="hidden7">
              	<div class="container">
					<div class="col-md-10">
					    <div class="form-area"> 
		                    <h3 style="margin-bottom: 25px; text-align: center;">Eliminar</h3>
		                    <div class="form-group">
			              		<label> Seleccione el dato curioso:</label>
					          	<select class="form-control col-sm-2" id="deleteFunFactsList">
					          	<?php
					          		getFactsOptions();
					          	?>
					          	</select>
					        </div> 	
				          <button type="button" class="btn btn-default" onclick="deleteFunFact()">Eliminar</button>
			            </div>
				    </div>
				</div>
			</div>
		</div>
	    <div class="hidden" id="hidden8">
	        <div class="container">
				<div class="col-md-10">
				    <div class="form-area"> 
		                    <h2 style="margin-bottom: 25px; text-align: center;">Crear</h2>
		                    <div class="form-group">
								<label>Título:</label>
								<input class="form-control" type="text" id="funFactCreateTitle" placeholder="Título">
							</div>
		                    <div class="form-group">
		                    	<label>Descripción:</label>
		                    <textarea class="form-control" id="createFunFactDescription" placeholder="Descripción (Máximo 200 caracteres)" maxlength="200" rows="7"></textarea>                   
		                    </div>
				        <button type="button" class="btn btn-default" onclick="createFunFact()">Crear</button>
				    </div>
				</div>			         
	          </div>
	      </div>

	      <div class="hidden" id="hidden9">
	        <div class="container">
				<div class="col-md-10">
				    <div class="form-area"> 
		                    <h2 style="margin-bottom: 25px; text-align: center;">Crear Galería</h2>
		                    <div class="form-group">
								<label>Título:</label>
								<input class="form-control" type="text" id="galleryCreateTittle" placeholder="Título">
							</div>
		                    <div class="form-group">
		                    	<label>Descripción:</label>
		                    <textarea class="form-control" id="galleryDescription" placeholder="Descripción (Máximo 200 caracteres)" maxlength="200" rows="7"></textarea>                   
		                    </div>
				        <button type="button" class="btn btn-default" onclick="createGallery()">Crear</button>
				    </div>
				</div>			         
	          </div>
	      </div>

	      <div class="hidden" id="hidden10">
              	<div class="container">
					<div class="col-md-10">
					    <div class="form-area"> 
		                    <h3 style="margin-bottom: 25px; text-align: center;">Eliminar Galería</h3>
		                    <div class="form-group">
			              		<label> Seleccione la galería a eliminar:</label>
					          	<select class="form-control col-sm-2" id="deleteFunFactsList">
					          	<?php
					          		//getFactsOptions(); load gallery names and id's
					          	?>
					          	</select>
					        </div> 	
				          <button type="button" class="btn btn-default" onclick="deleteGallery()">Eliminar</button>
			            </div>
				    </div>
				</div>
			</div>
			<div class="hidden" id="hidden11">
				<h2 style="margin-bottom: 25px; text-align: center;"> Modificar Blog </h2>
				<select class="form-control col-sm-5" id="optionBlogSelect" onchange="changeBlogVisibility()">
					<option value="1"> Modificar </option>
					<option value="2"> Eliminar </option>
              	</select>
	            <div class="hidden" id="hidden12">
		              <div class="container">
							<div class="col-md-10">
							    <div class="form-area"> 
					                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					    				<div class="form-group">
					    				<label> Seleccione la publicación:</label>
								          	<select class="form-control col-sm-2" id="deletePostList1"> 
								          	<?php
								          		//getFactsOptions(); load posts titles
								          	?>
								          	</select>
										</div>
					                    <div class="form-group">
					                    	<label>Contenido:</label>
					                    <textarea class="form-control" id="funFactDescription" placeholder="Descripción" maxlength="800" rows="7"></textarea>                   
					                    </div>
							        <button type="button" class="btn btn-default" onclick="modPost()">Modificar</button>
							    </div>
							</div>			         
		              </div>
	            </div>
              <div class="hidden" id="hidden13">
              	<div class="container">
					<div class="col-md-10">
					    <div class="form-area"> 
		                    <h3 style="margin-bottom: 25px; text-align: center;">Eliminar</h3>
		                    <div class="form-group">
			              		<label> Seleccione la publicación:</label>
					          	<select class="form-control col-sm-2" id="deletePostList2">
					          	<?php
					          		//getFactsOptions(); load posts titles
					          	?>
					          	</select>
					        </div> 	
				          <button type="button" class="btn btn-default" onclick="deletePost()">Eliminar</button>
			            </div>
				    </div>
				</div>
			</div>
		</div>
	    <div class="hidden" id="hidden14">
	        <div class="container">
				<div class="col-md-10">
				    <div class="form-area"> 
		                    <h2 style="margin-bottom: 25px; text-align: center;">Crear</h2>
		                    <div class="form-group">
								<label>Título:</label>
								<input class="form-control" type="text" id="newPostTitle" placeholder="Título">
							</div>
		                    <div class="form-group">
		                    	<label>Contenido:</label>
		                    <textarea class="form-control" id="newPostDescription" placeholder="Descripción" rows="7"></textarea>                   
		                    </div>
				        <button type="button" class="btn btn-default" onclick="createPost()">Crear</button>
				    </div>
				</div>			         
	          </div>
	      </div>

	      <div class="hidden" id="hidden15">
				<h2 style="margin-bottom: 25px; text-align: center;"> Modificar FAQ </h2>
				<select class="form-control col-sm-5" id="optionFaqSelect" onchange="changeFaqVisibility()">
					<option value="1"> Modificar </option>
					<option value="2"> Eliminar </option>
              	</select>
	            <div class="hidden" id="hidden16">
		              <div class="container">
							<div class="col-md-10">
							    <div class="form-area"> 
					                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					    				<div class="form-group">
					    				<label> Seleccione la publicación:</label>
								          	<select class="form-control col-sm-2" id="modifyFaqList"> 
								          	<?php
								          		//getFactsOptions(); load posts titles
								          	?>
								          	</select>
										</div>
					                    <div class="form-group">
					                    	<label>Contenido:</label>
					                    <textarea class="form-control" id="funFactDescription" placeholder="Descripción" maxlength="800" rows="7"></textarea>                   
					                    </div>
							        <button type="button" class="btn btn-default" onclick="modFaq()">Modificar</button>
							    </div>
							</div>			         
		              </div>
	            </div>
              <div class="hidden" id="hidden17">
              	<div class="container">
					<div class="col-md-10">
					    <div class="form-area"> 
		                    <h3 style="margin-bottom: 25px; text-align: center;">Eliminar</h3>
		                    <div class="form-group">
			              		<label> Seleccione la publicación:</label>
					          	<select class="form-control col-sm-2" id="deleteFaqList">
					          	<?php
					          		//getFactsOptions(); load posts titles
					          	?>
					          	</select>
					        </div> 	
				          <button type="button" class="btn btn-default" onclick="deleteFaq()">Eliminar</button>
			            </div>
				    </div>
				</div>
			</div>
		</div>
	    <div class="hidden" id="hidden18">
	        <div class="container">
				<div class="col-md-10">
				    <div class="form-area"> 
		                    <h2 style="margin-bottom: 25px; text-align: center;">Crear FAQ</h2>
		                    <div class="form-group">
								<label>Título:</label>
								<input class="form-control" type="text" id="newFaqTitle" placeholder="Título">
							</div>
		                    <div class="form-group">
		                    	<label>Contenido:</label>
		                    <textarea class="form-control" id="newFaqDescription" placeholder="Descripción" rows="7"></textarea>                   
		                    </div>
				        <button type="button" class="btn btn-default" onclick="createFaq()">Crear</button>
				    </div>
				</div>			         
	          </div>
	      </div>


    	</div>    
	</div>
</body>
</html>