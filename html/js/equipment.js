/* jshint browser: true */


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
				if (xmlhttp.responseText >= 0) {
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

function getSelectedEquipment() {
	var Equipment = document.getElementById("modifyEquipmentList");
	var selectedEquipment = Equipment.options[Equipment.selectedIndex];
	if (selectedEquipment.value > 0) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if (xmlhttp.responseText != -1) {
					var data = xmlhttp.responseText.split(";");
					if (data.length == 4) {
						document.getElementById("modifyEquipmentName").value = data[0];
						document.getElementById("modifyEquipmentDetail1").value = data[1];
						document.getElementById("modifyEquipmentDetail2").value = data[2];
						document.getElementById("EquipmentPhotoId").value = data[4];
					} else {
						alert("Error al obtener datos.");
					}
				}
				console.log(xmlhttp.responseText);
			}
		};
		xmlhttp.open("POST", "php/getEquipment.php?id=" + selectedEquipment.value, true);
		xmlhttp.send();
	}
}

function modifyEquipment(idFoto) {

	var formD = new FormData();

	var Name = document.getElementById("modifyEquipmentName").value;
	formD.append("name", Name);

	var Detail1 = document.getElementById("modifyEquipmentDetail1").value;
	formD.append("detail1", Detail1);

	var Detail2 = document.getElementById("modifyEquipmentDetail2").value;
	formD.append("detail2", Detail2);
	
	var Equipments = document.getElementById("modifyEquipmentList");
    var selectedEquipment = Equipments.options[Equipments.selectedIndex];
	formD.append("id",selectedEquipment);
	
	if (idFoto > 0) {
		formD.append("idfoto", idFoto);
	}

	if (Name.length > 0 && Detail1.length > 0 && Detail2.length > 0) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if (xmlhttp.responseText >= 0) {
					if (idFoto > 0) {
						deleteImageFromEquipment();
					}

					alert("Miembro agregado con éxito!");
					location.reload();
				}
				console.log(xmlhttp.responseText);
			}
		};
		xmlhttp.open("POST", "php/modifyEquipment.php", true);
		xmlhttp.send(formD);
	} else {
		alert("Debe ingresar todos los datos.");
	}

}

function deleteImageFromEquipment() {
	var id = document.getElementById("EquipmentPhotoId").value;
	console.log("Old photo id: " + id);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			if (xmlhttp.responseText >= 0) {
				alert("Imagen Eliminada");
			}
			console.log(xmlhttp.responseText);
		}
	};
	xmlhttp.open("POST", "php/deleteImage.php?id=" + id, true);
	xmlhttp.send();
}

function deleteEquipment()
{
    var Equipment =  document.getElementById("deleteEquipmentList");
    var selectedEquipment = Equipment.options[Equipment.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText >= 0)
            {
                alert("Equipment eliminada con éxito!");
                location.reload();
            }
            console.log(xmlhttp.responseText);
        }
    };
    xmlhttp.open("POST", "php/deleteEquipment.php?id=" + selectedEquipment.value, true);
    xmlhttp.send();
}