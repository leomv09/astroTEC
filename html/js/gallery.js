var imageCount = 1;

function deleteGallery() {
		var galleries =  document.getElementById("deleteGalleryList");
    var selected = galleries.options[galleries.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText >= 0)
            {
                alert("Galería eliminada con éxito!");
                location.reload();
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/deleteGallery.php?id=" + selected.value, true);
    xmlhttp.send();
}

function createGallery(photosId) {
	var description = document.getElementById("galleryDescription").value;
	var title = document.getElementById("galleryCreateTittle").value;

	description = description.trim();
	title = title.trim();

	if (description.length > 0 && title.length > 0) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					if (xmlhttp.responseText >= 0) {
							alert("Galería creada con éxito!");
							location.reload();
					}
					console.log(xmlhttp.responseText);
				}
		}
		console.log("Request:  "+"php/addGallery.php?=description" + description + "&title=" + title+"&photos="+photosId);
		xmlhttp.open("POST", "php/addGallery.php?description=" + description + "&title=" + title+"&photos="+photosId, true);
		xmlhttp.send();
	}
	else {
			alert("Debe ingresar todos los datos");
	}
}

function modGallery()
{
	var title = document.getElementById("modifyGalleryTitle").value;
	var description = document.getElementById("modifyGalleryDescription").value;
	var galleries =  document.getElementById("modifyGalleryList");
	var selectedGallery = galleries.options[galleries.selectedIndex];

	title=title.trim();
	description=description.trim();

	if(title.length > 0 && description.length > 0)
	{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
            	if(xmlhttp.responseText >= 0)
            	{
            		alert("Datos modificados con éxito!");
            		location.reload();
				}
				console.log(xmlhttp.responseText);
            }
        }
        xmlhttp.open("POST", "php/modifyGallery.php?title=" + title +"&description=" + description+"&id=" + selectedGallery.value, true);
        xmlhttp.send();
	}
}

function getSelectedGallery()
{
    var galleries =  document.getElementById("modifyGalleryList");
	var selectedGallery = galleries.options[galleries.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText != -1)
            {
                var data = xmlhttp.responseText.split(";");
                if(data.length == 2)
                {
                    document.getElementById("modifyGalleryTitle").value = data[0];
                    document.getElementById("modifyGalleryDescription").value = data[1];
                }
                else
                {
                    alert("Error al obtener datos.");
                }
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/getGallery.php?id="+ selectedGallery.value, true);
    xmlhttp.send();
}


function addMoreImages()
{
	var divContent = document.getElementById("moreImages");
	var input = document.createElement("INPUT");
	input.setAttribute("type", "file");
	input.setAttribute("id", "imageInput" + imageCount + 1);
	input.setAttribute("name", "imgs[]");
	divContent.appendChild(input);
}

function addMoreModifyImages()
{
	var divContent = document.getElementById("moreImages2");
	var input = document.createElement("INPUT");
	input.setAttribute("type", "file");
	input.setAttribute("id", "imageInput" + imageCount + 1);
	input.setAttribute("name", "imgs[]");
	divContent.appendChild(input);
}

function getSelectedGalleryImagesForDelete()
{
    var galleries =  document.getElementById("deleteGalleryImageList");
    var selectedGallery = galleries.options[galleries.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText != -1)
            {
                var data = xmlhttp.responseText;
                var currentSelect =  document.getElementById("deleteGalleryImageImagesList");
                makeEmptySelect(currentSelect);

                var defaultOpt = document.createElement("option");
                   defaultOpt.value= -1;
                   defaultOpt.innerHTML = "Seleccione una imagen...";
                   defaultOpt.setAttribute("selected","selected");
                   defaultOpt.setAttribute("disabled","disabled");

                   currentSelect.appendChild(defaultOpt);

                var images = data.split("%%%%%");
                for (var i = 0; i < images.length; i++){
                    var image = images[i];
                    var elements = image.split(";");
                    var idImage = elements[0];
                    var urlImage = elements[1];
                    
                   var opt = document.createElement("option");
                   opt.value= idImage;
                   opt.innerHTML = urlImage;
                   currentSelect.appendChild(opt);


                }

            }
        }
    }
    xmlhttp.open("POST", "php/getImageDescriptionGallery.php?id="+ selectedGallery.value, true);
    xmlhttp.send();
}

function deleteGalleryImage() {
    var images =  document.getElementById("deleteGalleryImageImagesList");
    var selected = images.options[images.selectedIndex];

    var galleries =  document.getElementById("deleteGalleryImageList");
    var selected2 = galleries.options[galleries.selectedIndex];

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText >= 0)
            {
                alert("Galería eliminada con éxito!");
                location.reload();
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/deleteImageFromGallery.php?idFoto=" + selected.value + "&idGaleria=" + selected2.value, true);
    console.log(selected.value + " " + selected2.value);
    xmlhttp.send();
}

function updateGalleryImagePreview(){
    console.log("Here I am");
    var images =  document.getElementById("deleteGalleryImageImagesList");
    var selected = images.options[images.selectedIndex];
    var preview =  document.getElementById("deleteGalleryImagePreview");
    preview.setAttribute("src",selected.innerHTML);
}

function makeEmptySelect(dropdown){
    while(dropdown.options.length > 0){                
        dropdown.remove(0);
    }
}