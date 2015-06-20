
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
            	if(xmlhttp.responseText >= 0)
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


function createEvents()
{
	var title = document.getElementById("createTitle").value;
	var date = document.getElementById("createDate").value;
	var description = document.getElementById("createDescription").value;

    if(isValidDate(date))
    {
        if(title.length > 0 && description.length > 0)
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                {
                    if(xmlhttp.responseText >= 0)
                    {
                        alert("Evento creado con éxito!");
                    }
                    console.log(xmlhttp.responseText);
                }
            }
            xmlhttp.open("POST", "php/createEvent.php?title=" + title +"&date=" + date +"&description=" + description, true);
            xmlhttp.send();
        }
        else
        {
            alert("Debe ingresar todos los datos.");
        }
    }
    else
    {
        alert("Error en fecha");
    }
    	
}

function deleteEvent()
{
	var events =  document.getElementById("deleteList");
	var selectedEvent = events.options[events.selectedIndex];
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
        	if(xmlhttp.responseText >= 0)
        	{
        		alert("Evento eliminado con éxito!");
			}
			console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/deleteEvent.php?id=" + selectedEvent.value, true);
    xmlhttp.send();
}

function isValidDate(date)
{
    var dateArray = date.split("/");
    if(dateArray.length == 3)
    {
        var day = dateArray[0];
        var month = dateArray[1];
        var year = dateArray[2];
        if(day > 0 && month > 0 && year >0)
        {
            if(day >= 1 && day <= 31)
            {
                if(year >= new Date().getFullYear())
                {
                    return true;
                }
            }
        }
    }

    return false;
}

