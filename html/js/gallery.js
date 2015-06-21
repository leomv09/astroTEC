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

function createGallery() {
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
		xmlhttp.open("POST", "php/addGallery.php?=description" + description + "&title=" + title, true);
		xmlhttp.send();
	}
	else {
			alert("Debe ingresar todos los datos");
	}
}