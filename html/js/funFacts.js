function createFunFact()
{
	var description = document.getElementById("createFunFactDescription").value;
    var title = document.getElementById("funFactCreateTitle").value;

    description = description.trim();
    title = title.trim();

	if(description.length > 0 && title.length > 0)
	{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
            	if(xmlhttp.responseText >= 0)
            	{
            		alert("Dato curioso creado con éxito!");
                    location.reload();
				}
				console.log(xmlhttp.responseText);
            }
        }
        xmlhttp.open("POST", "php/addfunfact.php?fact=" + description+"&title="+title, true);
        xmlhttp.send();
	}
    else
    {
        alert("Debe ingresar todos los datos");
    }
}

function getSelectedFact()
{
    var facts =  document.getElementById("modifyFunFactsList");
    var selectedFact = facts.options[facts.selectedIndex];
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
                    document.getElementById("funFactModifyTitle").value = data[0];
                    document.getElementById("funFactModifyDescription").value = data[1];
                }
                else
                {
                    alert("Error al obtener datos.");
                }
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/getFact.php?id="+ selectedFact.value, true);
    xmlhttp.send();
}

function modFunFact()
{
    var title = document.getElementById("funFactModifyTitle").value;
    var content = document.getElementById("funFactModifyDescription").value;
    var facts =  document.getElementById("modifyFunFactsList");
    var selectedFact = facts.options[facts.selectedIndex];

    title = title.trim();
    content = content.trim();

    if(title.length > 0 && content.length > 0)
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
        xmlhttp.open("POST", "php/modifyFact.php?title=" + title + "&content=" + content+"&id=" + selectedFact.value, true);
        xmlhttp.send();
    }
    else
    {
        alert("Debe ingresar todos los datos");
    }
}


function deleteFact()
{
    var fact =  document.getElementById("deleteFunFactsList");
    var selectedFact = fact.options[fact.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText >= 0)
            {
                alert("Dato curioso eliminado con éxito!");
                location.reload();
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/deleteFact.php?id=" + selectedFact.value, true);
    xmlhttp.send();
}