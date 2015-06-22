
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
        if(isValidHour(date,hour))
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
            alert("Hora incorrecta");
        }
    }
    else
    {
        alert("Fecha no válida");
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
                    var bits = data[2].split(/\D/);
                    var date = new Date(bits[0], --bits[1], bits[2], bits[3], bits[4]);

                    //var day =  (date.getDay() + 1 ).toString();
                    var day = bits[2].toString();
                    if (day.length == 1){
                        day = '0' + day;
                    }
                    var month = (bits[1] +1 ).toString();
                    if (month.length == 1){
                        month = '0' + month;
                    }
                    var year = bits[0].toString();
                    var hours = bits[3].toString();
                    if (hours.length == 1){
                        hours = '0' + hours;
                    }
                    var minutes = bits[4].toString();
                    if (minutes.length == 1){
                        minutes = '0' + minutes;
                    }

                    document.getElementById("modifyDate").value = day + "/" + month + "/" + year;
                    document.getElementById("modifyHour").value = hours + ":"+ minutes;
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

function getFormattedDateObject(date){
    var dateElements = date.split('/');
    if (dateElements.length != 3){
        return null;
    }
    if (dateElements[1].length == 1){
        dateElements[1]='0'+dateElements[1];
    }
    if (dateElements[0].length == 1){
        dateElements[0]='0'+dateElements[0];
    }
    var today = new Date();
    console.log(dateElements[2]+"-"+dateElements[1]+"-"+dateElements[0]);
    return new Date(dateElements[2],dateElements[1] -1,dateElements[0],23,59,59);
}

function isValidDate(date)
{
    var current = getFormattedDateObject(date);
    if (!current){
        return false;
    }
    //http://stackoverflow.com/questions/1353684/detecting-an-invalid-date-date-instance-in-javascript
    if ( Object.prototype.toString.call(current) === "[object Date]" ) {
        if ( isNaN( current.getTime() ) ) {
            return false;
        }
        else {
            var today = new Date();
            today.setHours(0,0,0,0);
            console.log(current);
            console.log(today);
            console.log(current >= today);
            return current >= today;
        }
    }
    else {
      return false;
    }

}

function isValidHour(date,hour)
{
    var hourArray = hour.split(":");
    if(hourArray.length == 2)
    {
        var hour = hourArray[0];
        var min = hourArray[1];
        if(hour >= 0 && hour <= 23)
        {
            if(min >= 0 && min < 60)
            {
                var today = (new Date());
                var current = new Date(getFormattedDateObject(date).getTime());
                today.setHours(0,0,0,0);
                current.setHours(0,0,0,0);

                var thisMoment = (new Date());
                current.setHours(hour);
                current.setMinutes(min);

                return current != today || (current > thisMoment);
            }
        }
    }


    return false;
}

