
function changeVosibility()
{
	var select = document.getElementById("optionSelect");

	var selected = select.options[select.selectedIndex];

	switch(selected.value)
	{
		case 1:
			document.getElementById("modifyEvent").className = "active";
			document.getElementById("deleteEvent").className = "hidden";
			break;
		case 2: 
			document.getElementById("modifyEvent").className = "hidden";
			document.getElementById("deleteEvent").className = "active";
			break;
	}
}


function modifyEvent()
{
	var title = document.getElementById("modifyTitle").value;
	var date = document.getElementById("modifyDate").value;
	var description = document.getElementById("modifyDescription").value;
	var events =  document.getElementById("eventsList");
	var selectedEvent = events.options[events.selectedIndex];

	if(title.length > 0 && date.length > 0 && description.length > 0)
	{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
            	if(xmlhttp.responseText > 0)
            	{
            		alert("Datos modificados con éxito!");
				}
				console.log(xmlhttp.responseText);
            }
        }
        xmlhttp.open("POST", "php/modifyEvent.php?title=" + title +"&date=" + date +"&description=" + description+"&id=" + selectedEvent.value, true);
        xmlhttp.send();
	}
}

function showEdit()
{
	document.getElementById("editEvents").className = "active";
}