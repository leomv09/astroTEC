var currentActiveId = -1;

function createMember(photoId)
{
    var name = document.getElementById("createMemberName").value;
    var lastName1 = document.getElementById("createMemberLastName1").value;
    var lastName2 = document.getElementById("createMemberLastName2").value;
    var description = document.getElementById("createMemmberDescription").value;

    if(name.length > 0 && description.length > 0 && lastName2.length > 0)
    {
        var xmlhttp = new XMLHttpRequest();
        var request = "php/createMember.php?name="+name + "&lastName1=" + lastName1 + "&description=" + description + "&photoId=" + photoId;
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                if(xmlhttp.responseText >= 0)
                {
                    alert("Miembro agregado con éxito!");
                    location.reload();
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


function getSelectedMember()
{
    var members = document.getElementById("modifyMemberList");
    var selectedMembers = members.options[members.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    if(selectedMembers.value > 0)
    {
        xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                if(xmlhttp.responseText != -1)
                {
                    var data = xmlhttp.responseText.split(";");
                    if(data.length == 5)
                    {
                        document.getElementById("modifyMemberName").value = data[0];
                        document.getElementById("modifyMemberLastName1").value = data[1];
                        document.getElementById("modifyMemberLastName2").value = data[2];
                        document.getElementById("modifyMemberDescription").value = data[3];
                        document.getElementById("memberPhotoId").value = data[4];
                    }
                    else
                    {
                        alert("Error al obtener datos.");
                    }
                }
                console.log(xmlhttp.responseText);
            }
        }
        xmlhttp.open("POST", "php/getMember.php?id="+ selectedMembers.value, true);
        xmlhttp.send();
    }     
}


function modifyMember(photoId)
{
    var name = document.getElementById("modifyMemberName").value;
    var lastName1 = document.getElementById("modifyMemberLastName1").value;
    var lastName2 = document.getElementById("modifyMemberLastName2").value;
    var description = document.getElementById("modifyMemberDescription").value;
    var members = document.getElementById("modifyMemberList");
    var selectedMember = members.options[members.selectedIndex];
    if(name.length > 0 && lastName1.length > 0 && lastName2.length > 0 && description.length > 0)
    {
        var request = "php/modifyMember.php?name=" + name +"&lastName1=" + lastName1 + "&lastName2=" + lastName2 + "&description=" + description+ "&id=" + selectedMember.value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                if(xmlhttp.responseText >= 0)
                {
                    if(photoId > 0)
                    {
                        deleteImageFromMember();
                        alert("Datos modificados con éxito!");
                    }
                    location.reload();
                }
                console.log(xmlhttp.responseText);
            }
        }
        if(photoId > 0)
        {
            request = "php/modifyMember.php?name=" + name +"&lastName1=" + lastName1 + "&lastName2=" + lastName2 + "&description=" + description+ "&id=" + selectedMember.value + "&photoId="+photoId;
        }
        xmlhttp.open("POST", request, true);
        xmlhttp.send();
    }
    else
    {
        alert("Formato de fecha incorrecto");
    }
}

function deleteImageFromMember()
{
    var id = document.getElementById("memberPhotoId").value;
    console.log("Old photo id: "+id);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText >= 0)
            {
                alert("Imagen Eliminada");
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/deleteImage.php?id=" + id, true);
    xmlhttp.send();
}

function deleteMember()
{
    var member = document.getElementById("deleteMemberList");
    var selectedMember = member.options[member.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText >= 0)
            {
                alert("Miembro eliminado con éxito!");
            }
            console.log(xmlhttp.responseText);
            location.reload();
        }
    }
    xmlhttp.open("POST", "php/deleteMember.php?id=" + selectedMember.value, true);
    xmlhttp.send();
}


function changeMember(elementId)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText != -1)
            {
                var data = xmlhttp.responseText.split(";");
                if(data.length == 5)
                {
                    document.getElementById("memberName").innerHTML = data[0] + ' ' + data[1] + ' ' +data[2];
                    document.getElementById("memberDescription").innerHTML = data[3];
                    if(currentActiveId >= 0)
                    {
                        document.getElementById(currentActiveId).setAttribute("class", "");
                    }
                    currentActiveId = elementId;
                    document.getElementById(elementId).setAttribute("class", "active");
                }
                else
                {
                    alert("Error al obtener datos.");
                }
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/getMember.php?id="+ elementId, true);
    xmlhttp.send();
}