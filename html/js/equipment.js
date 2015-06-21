/* jshint browser: true */
/*
function getSelectedFaq()
{
    var faq =  document.getElementById("modifyFaqList");
    var selectedFaq = faq.options[faq.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    if(selectedFaq.value > 0)
    {
       xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                if(xmlhttp.responseText != -1)
                {
                    var data = xmlhttp.responseText.split(";");
                    if(data.length == 2)
                    {
                        document.getElementById("modifyFaqTitle").value = data[0];
                        document.getElementById("modifyFaqDescription").value = data[1];
                    }
                    else
                    {
                        alert("Error al obtener datos.");
                    }
                }
                console.log(xmlhttp.responseText);
            }
        }
        xmlhttp.open("POST", "php/getFaq.php?id="+ selectedFaq.value, true);
        xmlhttp.send(); 
    }     
}
*/
function createEquipment(idFoto) {
	
	var formD = new FormData();
	
	var Name = document.getElementById("createEquipmentName").value;
	formD.append("name", Name);

	var Detail1 = document.getElementById("createEquipmentDetail1").value;
	formD.append("detail1", Detail1);

	var Detail2 = document.getElementById("createEquipmentDetail2").value;
	formD.append("detail2", Detail2);

	formD.append("idfoto", idFoto);

	if (Name.length > 0 && Detail1.length > 0 && Detail2.length > 0) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if(xmlhttp.responseText >= 0)
                {
                    alert("Miembro agregado con éxito!");
                    location.reload();
                }
                console.log(xmlhttp.responseText);
			}
		};
		xmlhttp.open("POST", "php/createEquipment.php", true);
		xmlhttp.send(formD);
	} else {
		alert("Debe ingresar todos los datos.");
	}

}

/*
function modFaq()
{
    var title = document.getElementById("modifyFaqTitle").value;
    var description = document.getElementById("modifyFaqDescription").value;
    var faq =  document.getElementById("modifyFaqList");
    var selectedFaq = faq.options[faq.selectedIndex];
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
        xmlhttp.open("POST", "php/modifyFaq.php?title=" + title + "&description=" + description+"&id=" + selectedFaq.value, true);
        xmlhttp.send();
    }
    else
    {
        alert("Debe ingresar todos los datos");
    }

}

function deleteFaq()
{
    var faq =  document.getElementById("deleteFaqList");
    var selectedFaq = faq.options[faq.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText >= 0)
            {
                alert("Faq eliminada con éxito!");
                location.reload();
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/deleteFaq.php?id=" + selectedFaq.value, true);
    xmlhttp.send();
}
*/