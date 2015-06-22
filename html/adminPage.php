<?php
	require( "php/functions.php");
	require( "php/events.php"); 
	require( "php/funfacts.php");
	require( "php/blog.php");
	require( "php/faqs.php");
	require( "php/members.php");
	require( "php/equipment.php");
	require( "php/gallery.php");
	require( "php/cover.php");

	function checkSession() {
		redirect_if_not_admin("index.php");
		echo "<script type='text/javascript'>showAdminName('$_SESSION[USER_NAME]');</script>";
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
	<link rel="stylesheet" type="text/css" href="css/buttonAnimation.css">
	<script type="text/javascript" src="js/vendor/jquery-2.1.4.min.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<script type="text/javascript" src="js/admin.js"></script>	
	<script type="text/javascript" src="js/events.js"></script>
	<script type="text/javascript" src="js/post.js"></script>		
	<script type="text/javascript" src="js/funfacts.js"></script>
	<script type="text/javascript" src="js/faqs.js"></script>
	<script type="text/javascript" src="js/uploadFile.js"></script>
	<script type="text/javascript" src="js/members.js"></script>
	<script type="text/javascript" src="js/equipment.js"></script>
	<script type="text/javascript" src="js/gallery.js"></script>
	<script type="text/javascript" src="js/cover.js"></script>
	<?php
  		checkSession();
  	?>
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
				<a id="adminName" class="navbar-brand" href="index.php">AstroTEC</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown ">
						<a href="./php/logout.php" role="button" aria-expanded="false">Log Out</a>
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
						<li><a href="#Modify" onclick="show(29, 'Modificar portada')"> Modificar portada </a></li>

						<li><a href="#CreateEvents" onclick="show(4, 'Crear evento')"><span ></span> Crear eventos </a></li>
						<li><a href="#ModifyEvents" onclick="show(1, 'Modificar eventos')"><span> </span> Modificar eventos </a></li>

						<li><a href="#CreateGallery" onclick="show(9, 'Crear galería')"><span ></span> Crear galería </a></li>
						<li><a href="#ModifyGallery" onclick="show(10, 'Modificar galerías')"><span ></span> Modificar galería </a></li>

						<li><a href="#CreatePost" onclick="show(14, 'Crear blog')"><span ></span> Crear publicación </a></li>
						<li><a href="#ModifyPost" onclick="show(11, 'Modificar blogs')"><span ></span> Modificar publicación </a></li>

						<li><a href="#CreateFunFact" onclick="show(8, 'Crear dato curioso')"><span ></span> Crear dato curioso</a></li>
						<li><a href="#ModifyFunFact" onclick="show(5, 'Modificar datos curiosos')"><span ></span> Modificar datos curiosos</a></li>

						<li><a href="#CreateFaq" onclick="show(18, 'Crear pregunta frecuente')"><span ></span> Crear pregunta frecuente </a></li>
						<li><a href="#ModifyFaq" onclick="show(15, 'Modificar preguntas frecuentes')"><span ></span> Modificar pregunta frecuente </a></li>

						<li><a href="#CreateMember" onclick="show(19, 'Agregar miembro')"><span ></span> Agregar miembro a la organización </a></li>
						<li><a href="#ModifyFaq" onclick="show(20, 'Modificar miembro')"><span ></span> Modificar miembro de la organización </a></li>

						<li><a href="#CreateEquipment" onclick="show(23, 'Agregar equipo')"><span ></span> Agregar nuevo equipo </a></li>
						<li><a href="#ModifyEquipment" onclick="show(24, 'Modificar equipo')"><span ></span> Modificar equipo </a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>  		
</div>
 <div class="col-md-10 content">
  	<div class="panel panel-default">
		<div class="panel-heading" id="panelheading">
		</div>

	<div class="hidden" id="hidden29">
      	<div class="container">
			<div class="col-md-10">
			    <div class="form-area">
                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					<?php
		          		loadCover();
		          	?> 
					<div class="form-group">
						<label>Dato curioso:</label>
	    				<select class="form-control col-sm-2" id="modifyCoverFactsList" autocomplete="off">
	    					<option value="-1" selected disabled>Seleccione un dato curioso...</option>
				          	<?php
				          		getFactsOptions();
				          	?>
				        </select>
					</div>
			        <button type="button" class="btn btn-default" onclick="modifyCover()">Modificar</button>
			    </div>
			</div>			         
      	</div>
  	</div>


	<div class="hidden" id="hidden1">
			<h2 style="margin-bottom: 25px; text-align: center;"> Modificar Evento </h2>
			<select class="form-control col-sm-5" id="optionSelect" onchange="changeVisibility()" autocomplete="off">
				<option value="0" selected disabled> Seleccione una opción... </option>
				<option value="1"> Modificar </option>
				<option value="2"> Eliminar </option>
              </select>
              <div class="hidden" id="hidden2">
	              <div class="container">
						<div class="col-md-10">
						    <div class="form-area"> 
				                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
				    				<div class="form-group">
				    					<label>Evento:</label>
										<select class="form-control col-sm-2" id="eventsList" onchange="getSelectedEvent()" autocomplete="off">
											<option value="-1" selected disabled>Seleccione un evento...</option>
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
										<input class="form-control" type="text" id="modifyHour" placeholder="HH:MM">
									</div>
				                    <div class="form-group">
				                    	<label>Descripción:</label>
				                    <textarea class="form-control" id="modifyDescription" placeholder="Descripción"  rows="7"></textarea>                   
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
			              		<label> Evento:</label>
					          	<select class="form-control col-sm-2" id="deleteList" autocomplete="off">
					          	<option value="-1" selected disabled>Seleccione un evento...</option>
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
										<input class="form-control" type="text" id="createHour" placeholder="HH:MM">
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
				<select class="form-control col-sm-5" id="optionFactsSelect" onchange="changeFactsVisibility()" autocomplete="off">
					<option value="0" selected disabled> Seleccione una opción... </option>
					<option value="1"> Modificar </option>
					<option value="2"> Eliminar </option>
              	</select>
	            <div class="hidden" id="hidden6">
		              <div class="container">
							<div class="col-md-10">
							    <div class="form-area"> 
					                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					    				<div class="form-group">
					    					<label>Dato curioso:</label>
						    				<select class="form-control col-sm-2" id="modifyFunFactsList" onchange="getSelectedFact()" autocomplete="off">
						    					<option value="-1" selected disabled>Seleccione un dato curioso...</option>
									          	<?php
									          		getFactsOptions();
									          	?>
									        </select>
											</div>
										<div class="form-group">
											<label>Título:</label>
											<input class="form-control" type="text" id="funFactModifyTitle" placeholder="Título">
										</div>
					                    <div class="form-group">
					                    	<label>Contenido:</label>
					                    <textarea class="form-control" id="funFactModifyDescription" placeholder="Descripción" maxlength="800" rows="7"></textarea>                   
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
			              		<label> Dato curioso:</label>
					          	<select class="form-control col-sm-2" id="deleteFunFactsList" autocomplete="off">
					          	<option value="-1" selected disabled>Seleccione un dato curioso...</option>
					          	<?php
					          		getFactsOptions();
					          	?>
					          	</select>
					        </div> 	
				          <button type="button" class="btn btn-default" onclick="deleteFact()">Eliminar</button>
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
				    	<form method="post" id="frmCreateGalleryUpload" enctype="multipart/form-data">
		                    <h2 style="margin-bottom: 25px; text-align: center;">Crear Galería</h2>
		                    <div class="form-group">
								<label>Título:</label>
								<input class="form-control" type="text" id="galleryCreateTittle" placeholder="Título">
							</div>
		                    <div class="form-group">
		                    	<label>Descripción:</label>
		                    	<textarea class="form-control" id="galleryDescription" placeholder="Descripción (Máximo 200 caracteres)" maxlength="200" rows="7"></textarea>                   
		                    </div>
		                    <div class="form-group">
			                    <label id="images"> Cargar Archivo </label>
							 	<div id="moreImages">
							 		<input id="imageInput1" type="file" name="imgs[]">
							 	</div>
							 	<button type="button" onclick="addMoreImages()">+</button>
						 	</div>
						 	<button type="button" id="createGalleryButton" class="btn btn-default" onclick="">Crear</button>
				        </form>
				    </div>
				</div>			         
	          </div>
	      </div>

	      <div class="hidden" id="hidden10">
				<h2 style="margin-bottom: 25px; text-align: center;"> Modificar Galería </h2>
				<select class="form-control col-sm-5" id="optionGallerySelect" onchange="changeGalleryVisibility()" autocomplete="off">
					<option value="0" selected disabled> Seleccione una opción... </option>
					<option value="1"> Modificar </option>
					<option value="2"> Eliminar </option>
              	</select>
	            <div class="hidden" id="hidden27">
		              <div class="container">
							<div class="col-md-10">
							    <div class="form-area"> 
					                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					    				<div class="form-group">
					    				<label> Publicación:</label>
								          	<select class="form-control col-sm-2" id="modifyGalleryList" onchange="getSelectedGallery()" autocomplete = "off"> 
								          	<option value="-1" selected disabled>Seleccione una galería...</option>
								          	<?php
								          		loadGalleries(); 
								          	?>
								          	</select>
										</div>
										<div class="form-group">
											<label>Título:</label>
											<input class="form-control" type="text" id="modifyGalleryTitle" placeholder="Título">
										</div>
					                    <div class="form-group">
					                    	<label>Descripción:</label>
					                    <textarea class="form-control" id="modifyGalleryDescription" placeholder="Descripción" rows="7"></textarea>                   
					                    </div>
							        <button type="button" class="btn btn-default" onclick="modGallery()">Modificar</button>
							    </div>
							</div>			         
		              </div>
	            </div>
              <div class="hidden" id="hidden28">
              	<div class="container">
					<div class="col-md-10">
					    <div class="form-area"> 
		                    <h3 style="margin-bottom: 25px; text-align: center;">Eliminar</h3>
		                    <div class="form-group">
			              		<label> Publicación:</label>
					          	<select class="form-control col-sm-2" id="deleteGalleryList" autocomplete="off">
					          	<option value="-1" selected disabled>Seleccione una galería...</option>
						          	<?php
						          		loadGalleries(); 
						          	?>
					          	</select>
					        </div> 	
				          <button type="button" class="btn btn-default" onclick="deleteGallery()">Eliminar</button>
			            </div>
				    </div>
				</div>
			</div>
		</div>
			
			<div class="hidden" id="hidden11">
				<h2 style="margin-bottom: 25px; text-align: center;"> Modificar Blog </h2>
				<select class="form-control col-sm-5" id="optionBlogSelect" onchange="changeBlogVisibility()" autocomplete="off">
					<option value="0" selected disabled> Seleccione una opción... </option>
					<option value="1"> Modificar </option>
					<option value="2"> Eliminar </option>
              	</select>
	            <div class="hidden" id="hidden12">
		              <div class="container">
							<div class="col-md-10">
							    <div class="form-area"> 
					                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					    				<div class="form-group">
					    				<label> Publicación:</label>
								          	<select class="form-control col-sm-2" id="modifyPostList" onchange="getSelectedPost()" autocomplete = "off"> 
								          	<option value="-1" selected disabled>Seleccione una publicación...</option>
								          	<?php
								          		getPostsOptions(); 
								          	?>
								          	</select>
										</div>
										<div class="form-group">
											<label>Título:</label>
											<input class="form-control" type="text" id="modifyPostTitle" placeholder="Título">
										</div>
					                    <div class="form-group">
					                    	<label>Contenido:</label>
					                    <textarea class="form-control" id="modifyPostDescription" placeholder="Descripción" rows="7"></textarea>                   
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
			              		<label> Publicación:</label>
					          	<select class="form-control col-sm-2" id="deletePostList" autocomplete="off">
					          	<option value="-1" selected disabled>Seleccione una publicación...</option>
						          	<?php
						          		getPostsOptions(); 
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
				<select class="form-control col-sm-5" id="optionFaqSelect" onchange="changeFaqVisibility()" autocomplete="off">
					<option value="0" selected disabled> Seleccione una opción... </option>
					<option value="1"> Modificar </option>
					<option value="2"> Eliminar </option>
              	</select>
	            <div class="hidden" id="hidden16">
		              <div class="container">
							<div class="col-md-10">
							    <div class="form-area"> 
					                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					    				<div class="form-group">
					    				<label> Pregunta:</label>
								          	<select class="form-control col-sm-2" id="modifyFaqList" onchange="getSelectedFaq()"> 
								          	<option value="-1" selected disabled> Seleccione una pregunta... </option>
									          	<?php
									          		getFaqsOptions(); 
									          	?>
								          	</select>
										</div>
										<div class="form-group">
											<label>Pregunta:</label>
											<input class="form-control" type="text" id="modifyFaqTitle" placeholder="Título">
										</div>
					                    <div class="form-group">
					                    	<label>Respuesta:</label>
					                    <textarea class="form-control" id="modifyFaqDescription" placeholder="Descripción" maxlength="300" rows="7"></textarea>                   
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
			              		<label> Pregunta:</label>
					          	<select class="form-control col-sm-2" id="deleteFaqList">
					          	<option value="-1" selected disabled>Seleccione una pregunta...</option>
					          	<?php
					          		getFaqsOptions(); 
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
							<label>Pregunta:</label>
							<input class="form-control" type="text" id="createFaqTitle" placeholder="Título">
						</div>
	                    <div class="form-group">
	                    	<label>Respuesta:</label>
	                    <textarea class="form-control" id="createFaqDescription" placeholder="Descripción" maxlength="300" rows="7"></textarea>                   
	                    </div>
				        <button type="button" class="btn btn-default" onclick="createFaq()">Crear</button>
				    </div>
				</div>			         
	          </div>
	      </div>


	      <div class="hidden" id="hidden19">
	        <div class="container">
				<div class="col-md-10">
				    <div class="form-area"> 
				    	<form id="frmUpload" action="" method="post" enctype="multipart/form-data">
		                    <h2 style="margin-bottom: 25px; text-align: center;">Agregar miembro</h2>
		                    <div class="form-group">
								<label>Nombre:</label>
								<input class="form-control" type="text" id="createMemberName" placeholder="Requerido">
							</div>
							<div class="form-group">
								<label>Apellido 1:</label>
								<input class="form-control" type="text" id="createMemberLastName1" placeholder="Requerido">
							</div>
							<div class="form-group">
								<label>Apellido 2:</label>
								<input class="form-control" type="text" id="createMemberLastName2" placeholder="Opcional">
							</div>
							<div class="form-group">
								<label>Fotografía:</label>
								<input class="form-control" type="file" id="createMemberPhoto2" name="userImage" placeholder="Requerido">
							</div>
		                    <div class="form-group">
		                    	<label>Comentario:</label>
		                    <textarea class="form-control" id="createMemmberDescription" placeholder="Requerido (Máximo 400 caracteres)" maxlength="400" rows="7"></textarea>                   
		                    </div>
					        <button id="createMemberButton" type="button" class="btn btn-default" onclick="">Crear</button>
					    </form>
				    </div>
				</div>			         
	          </div>
	      </div>
	      <div class="hidden" id="hidden20">
				<h2 style="margin-bottom: 25px; text-align: center;"> Modificar Miembro </h2>
				<select class="form-control col-sm-5" id="optionMemberSelect" onchange="changeMemberVisibility()" autocomplete="off">
					<option value="0" selected disabled> Seleccione una opción... </option>
					<option value="1"> Modificar </option>
					<option value="2"> Eliminar </option>
              	</select>
	            <div class="hidden" id="hidden21">
		              <div class="container">
							<div class="col-md-10">
							    <div class="form-area"> 
							    	<form id="frmModifyUpload" method="post" action="" enctype="multipart/form-data">
					                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					    				<div class="form-group">
					    				<label> Miembro:</label>
								          	<select class="form-control col-sm-2" id="modifyMemberList" onchange="getSelectedMember()" autocomplete="off"> 
								          	<option value="-1" selected disabled> Seleccione un miembro... </option>
									          	<?php
									          		getMembersOptions(); 
									          	?>
								          	</select>
										</div>
										<div class="form-group">
											<label>Nombre:</label>
											<input class="form-control" type="text" id="modifyMemberName" placeholder="Requerido">
										</div>
										<div class="form-group">
											<label>Apellido 1:</label>
											<input class="form-control" type="text" id="modifyMemberLastName1" placeholder="Requerido">
										</div>
										<div class="form-group">
											<label>Apellido 2:</label>
											<input class="form-control" type="text" id="modifyMemberLastName2" placeholder="Opcional">
										</div>
										<div class="form-group">
											<label>Fotografía:</label>
											<input class="form-control" type="file" id="modifyMemberPhoto" name="userImage" placeholder="Requerido">
											<input class="form-control" type="hidden" id="memberPhotoId">
										</div>
					                    <div class="form-group">
					                    	<label>Comentario:</label>
					                    <textarea class="form-control" id="modifyMemberDescription" placeholder="Requerido (Máximo 400 caracteres)" maxlength="400" rows="7"></textarea>                   
					                    </div>
							        <button type="button" id="modifyMemberButton" class="btn btn-default" onclick="">Modificar</button>
							    </form>
							</div>
						</div>			         
		            </div>
	            </div>
              <div class="hidden" id="hidden22">
              	<div class="container">
					<div class="col-md-10">
					    <div class="form-area"> 
		                    <h3 style="margin-bottom: 25px; text-align: center;">Eliminar</h3>
		                    <div class="form-group">
			              		<label> Miembro:</label>
					          	<select class="form-control col-sm-2" id="deleteMemberList" autocomplete="off">
					          	<option value="-1" selected disabled>Seleccione un miembro...</option>
					          	<?php
					          		getMembersOptions(); 
					          	?>
					          	</select>
					        </div> 	
				          <button type="button" class="btn btn-default" onclick="deleteMember()">Eliminar</button>
			            </div>
				    </div>
				</div>
			</div>
		</div>

		<div class="hidden" id="hidden23">
	        <div class="container">
				<div class="col-md-10">
				    <div class="form-area"> 
				    	<form id="frmUploadEquipment" action="" method="post" enctype="multipart/form-data">
		                    <h2 style="margin-bottom: 25px; text-align: center;">Agregar Equipo</h2>
		                    <div class="form-group">
								<label>Nombre:</label>
								<input class="form-control" type="text" id="createEquipmentName" placeholder="Requerido">
							</div>
							<div class="form-group">
								<label>Detalle 1:</label>
								<input class="form-control" type="text" id="createEquipmentDetail1" placeholder="Requerido">
							</div>
							<div class="form-group">
								<label>Detalle 2:</label>
								<input class="form-control" type="text" id="createEquipmentDetail2" placeholder="Requerido">
							</div>
							<div class="form-group">
								<label>Fotografía:</label>
								<input class="form-control" type="file" id="createEquipmentPhoto" name="equipmentImage" placeholder="Requerido">
							</div>
					        <button id="createEquipmentButton" type="button" class="btn btn-default" onclick="">Crear</button>
					    </form>
				    </div>
				</div>			         
	          </div>
	      </div>

	      <div class="hidden" id="hidden24">
				<h2 style="margin-bottom: 25px; text-align: center;"> Modificar Equipo </h2>
				<select class="form-control col-sm-5" id="optionEquipmentSelect" onchange="changeEquipmentVisibility()" autocomplete="off">
					<option value="0" selected disabled> Seleccione una opción... </option>
					<option value="1"> Modificar </option>
					<option value="2"> Eliminar </option>
              	</select>
	            <div class="hidden" id="hidden25">
		              <div class="container">
							<div class="col-md-10">
							    <div class="form-area"> 
							    	<form id="frmModifyUploadEquipment" method="post" action="" enctype="multipart/form-data">
					                    <h3 style="margin-bottom: 25px; text-align: center;">Modificar</h3>
					    				<div class="form-group">
					    				<label> Equipo:</label>
								          	<select class="form-control col-sm-2" id="modifyEquipmentList" onchange="getSelectedEquipment()" autocomplete="off"> 
								          	<option value="-1" selected disabled> Seleccione un equipo... </option>
									          	<?php
									          		getEquipmentsOptions(); 
									          	?>
								          	</select>
										</div>
										<div class="form-group">
											<label>Nombre:</label>
											<input class="form-control" type="text" id="modifyEquipmentName" placeholder="Requerido">
										</div>
										<div class="form-group">
											<label>Detalle 1:</label>
											<input class="form-control" type="text" id="modifyEquipmentDetail1" placeholder="Requerido">
										</div>
										<div class="form-group">
											<label>Detalle 2:</label>
											<input class="form-control" type="text" id="modifyEquipmentDetail2" placeholder="Requerido">
										</div>
										<div class="form-group">
											<label>Fotografía:</label>
											<input class="form-control" type="file" id="modifyEquipmentPhoto" name="equipmentImage" placeholder="Requerido">
											<input class="form-control" type="hidden" id="equipmentPhotoId">
										</div>
								        <button id="modifyEquipmentButton" type="button" class="btn btn-default" onclick="">Modificar</button>
							    </form>
							</div>
						</div>			         
		            </div>
	            </div>
              <div class="hidden" id="hidden26">
              	<div class="container">
					<div class="col-md-10">
					    <div class="form-area"> 
		                    <h3 style="margin-bottom: 25px; text-align: center;">Eliminar</h3>
		                    <div class="form-group">
			              		<label> Miembro:</label>
					          	<select class="form-control col-sm-2" id="deleteEquipmentList" autocomplete="off">
					          	<option value="-1" selected disabled>Seleccione un equipo...</option>
					          	<?php
					          		getEquipmentsOptions(); 
					          	?>
					          	</select>
					        </div> 	
				          <button type="button" class="btn btn-default" onclick="deleteEquipment()">Eliminar</button>
			            </div>
				    </div>
				</div>
			</div>
		</div>

    	</div>    
	</div>
	<script type="text/javascript">
	(function() {
		var hash = window.location.hash.substring(1);

		switch (hash) {
			case "Modify":
				show(0, 'Modificar portada');
				break;
			case "CreateEvents":
				show(4, 'Crear evento');
				break;
			case "ModifyEvents":
				show(1, 'Modificar eventos');
				break;
			case "CreateGallery":
				show(9, 'Crear galería');
				break;
			case "ModifyGallery":
				show(10, 'Modificar galerías');
				break;
			case "CreatePost":
				show(14, 'Crear blog');
				break;
			case "ModifyPost":
				show(11, 'Modificar blogs');
				break;
			case "CreateFunFact":
				show(8, 'Crear dato curioso');
				break;
			case "ModifyFunFact":
				show(5, 'Modificar datos curiosos');
				break;
			case "CreateFaq":
				show(18, 'Crear pregunta frecuente')
				break;
			case "ModifyFaq":
				show(15, 'Modificar preguntas frecuentes');
				break;
			case "CreateMember":
				show(19, 'Agregar miembro');
				break;
			case "ModifyFaq":
				show(20, 'Modificar miembro');
				break;
			case "CreateEquipment":
				show(23, 'Agregar equipo');
				break;
			case "ModifyEquipment":
				show(24, 'Modificar equipo')
				break;
			case "Modify":
				show(29, 'Modificar portada')
				break;
		}
	})();
</script>
</body>
</html>