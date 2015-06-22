
function modifyCover()
{
	var desc1 = document.getElementById("modifyCoverDescription1").value;
	var desc2 = document.getElementById("modifyCoverDescription2").value;
    var id = document.getElementById("coverId").value;
    var facts =  document.getElementById("modifyCoverFactsList");
    var selectedFact = facts.options[facts.selectedIndex];

    desc1=desc1.trim();
    desc2=desc2.trim();

    if(desc1.length > 0 && desc1.length > 0 && selectedFact.value > 0)
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
        xmlhttp.open("POST", "php/modifyCover.php?description1=" + desc1 + "&description2=" + desc2 + "&id=" + id +"&fkid=" + selectedFact.value, true);
        xmlhttp.send();
    }
    else
    {
        alert("Debe ingresar todos los datos");
    }

}