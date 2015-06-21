
function modifyEvent()
{
	var title = document.getElementById("modifyTitle").value;
	var date = document.getElementById("modifyDate").value;
	var description = document.getElementById("modifyDescription").value;
    var hour = document.getElementById("modifyHour").value;
	var events =  document.getElementById("eventsList");
	var selectedEvent = events.options[events.selectedIndex];
    console.log("Title "+title +", date "+date+", hour "+hour+", desc "+description);

    title = title.trim();
    description = description.trim();
    date = date.trim();
    hour = hour.trim();

    if(isValidDate(date))
    {
        if(isValidHour(hour))
        {
            if(title.length > 0 && date.length > 0 && description.length > 0)
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
                xmlhttp.open("POST", "php/modifyEvent.php?title=" + title +"&date=" + date + "&hour=" + hour + "&description=" + description+"&id=" + selectedEvent.value, true);
                xmlhttp.send();
            }
            else
            {
                alert("Debe ingresar todos los datos");
            }
        }
        else
        {
            alert("Formato de hora incorrecto");
        }
    }
    else
    {
        alert("Formato de fecha incorrecto");
    }
}


function getSelectedEvent()
{
    var events =  document.getElementById("eventsList");
    var selectedEvent = events.options[events.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText != -1)
            {
                var data = xmlhttp.responseText.split(";");
                if(data.length == 3)
                {
                    document.getElementById("modifyTitle").value = data[0];
                    document.getElementById("modifyDescription").value = data[1];
                    console.log(data[1]);
                    var bits = data[2].split(/\D/);
                    var date = new Date(bits[0], --bits[1], bits[2], bits[3], bits[4]);
                    document.getElementById("modifyDate").value = (date.getDay() + 1 ) + "/" + (date.getMonth() + 1) + "/" +date.getFullYear();
                    document.getElementById("modifyHour").value = date.getHours() + ":"+date.getMinutes()+":"+date.getSeconds();
                }
                else
                {
                    alert("Error al obtener datos.");
                }
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/getEvent.php?id="+ selectedEvent.value, true);
    xmlhttp.send();
}

function createEvents()
{
	var title = document.getElementById("createTitle").value;
	var date = document.getElementById("createDate").value;
    var hour = document.getElementById("createHour").value;
	var description = document.getElementById("createDescription").value;

    title = title.trim();
    description = description.trim();
    date = date.trim();
    hour = hour.trim();

    if(isValidDate(date))
    {
        if(isValidHour(date,hour))
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
                            location.reload();
                        }
                        console.log(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("POST", "php/createEvent.php?title=" + title +"&date=" + date + "&hour=" + hour +"&description=" + description, true);
                xmlhttp.send();
            }
            else
            {
                alert("Debe ingresar todos los datos.");
            }
        }
        else
        {
            alert("Error en hora");
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
                location.reload();
			}
			console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/deleteEvent.php?id=" + selectedEvent.value, true);
    xmlhttp.send();
}

function isValidDate(date)
{
    //http://stackoverflow.com/questions/1353684/detecting-an-invalid-date-date-instance-in-javascript
    if ( Object.prototype.toString.call(date) === "[object Date]" ) {
        if ( isNaN( date.getTime() ) ) { 
            return false;
        }
        else {
            var today = (new Date());
            today.setHours(0,0,0,0);
            return date >= today;
        }
    }
    else {
      return false;
    }

}

function isValidHour(date,hour)
{
    var hourArray = hour.split(":");
    if(hourArray.length == 3)
    {
        var hour = hourArray[0];
        var min = hourArray[1];
        if(hour >= 0 && hour <= 23)
        {
            if(min >= 0 && min < 60)
            {
                return true;
            }
        }
    }

    return false;
}

