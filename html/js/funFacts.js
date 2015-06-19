function addFunFact()
{
	var description = document.getElementById("funFactDescription").value;

	if(description.length > 0)
	{
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
            	if(xmlhttp.responseText >= 0)
            	{
            		alert("Dato curioso creado con éxito!");
				}
				console.log(xmlhttp.responseText);
            }
        }
        xmlhttp.open("POST", "php/addfunfact.php?fact=" + description, true);
        xmlhttp.send();
	}
}