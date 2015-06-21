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