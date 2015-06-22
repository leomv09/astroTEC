function getSelectedMessage()
{
    var messages =  document.getElementById("messagesList");
    var selectedMessage = messages.options[messages.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    if(selectedMessage.value > 0)
    {
       xmlhttp.onreadystatechange = function() 
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
            {
                if(xmlhttp.responseText != -1)
                {
                    var data = xmlhttp.responseText.split(";");
                    if(data.length == 3)
                    {
                        document.getElementById("messageContent").value = data[0];
                        document.getElementById("emaiLabel").value = data[1];
                        document.getElementById("authorLabel").value = data[2];
                    }
                    else
                    {
                        alert("Error al obtener datos.");
                    }
                }
                console.log(xmlhttp.responseText);
            }
        }
        xmlhttp.open("POST", "php/getMessage.php?id="+ selectedMessage.value, true);
        xmlhttp.send(); 
    }     
}

function deleteMessage()
{
    var messages =  document.getElementById("messagesList");
    var selectedMessage = messages.options[messages.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText >= 0)
            {
                alert("Mensaje eliminado con éxito!");
                location.reload();
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/deleteMessage.php?id=" + selectedMessage.value, true);
    xmlhttp.send();
}