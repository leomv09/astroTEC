var imageCount = 1;

function deleteGallery() {
		var galleries =  document.getElementById("modifyGalleryList");
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

function addMoreImages()
{
	var divContent = document.getElementById("moreImages");
	var input = document.createElement("INPUT");
	input.setAttribute("type", "file");
	input.setAttribute("id", "imageInput" + imageCount + 1);
	input.setAttribute("name", "imgs[]");
	divContent.appendChild(input);
}