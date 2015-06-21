function createMember(photoId)
{
    var name = document.getElementById("createMemberName").value;
    var lastName1 = document.getElementById("createMemberLastName1").value;
    var lastName2 = document.getElementById("createMemberLastName2").value;
    var description = document.getElementById("createMemmberDescription").value;

    if(name.length > 0 && description.length > 0 && lastName2.length > 0)
    {
        var xmlhttp = new XMLHttpRequest();
        var request = "php/createMember.php?name="+name + "&lastName1=" + lastName1 + "&description=" + description + "&photoId=" + photoId;;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                if(xmlhttp.responseText >= 0)
                {
                    alert("Miembro agregado con éxito!");
                    //location.reload();
                }
                console.log(xmlhttp.responseText);
            }
        }

        if(lastName2.length > 0)
        {
            request = "php/createMember.php?name="+name + "&lastName1=" + lastName1 + "&lastName2=" + lastName2 + "&description=" + description + "&photoId=" + photoId;
        }
        xmlhttp.open("POST", request, true);
        xmlhttp.send();
    }
    else
    {
        alert("Debe ingresar todos los datos.");
    }
        
}


