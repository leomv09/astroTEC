function insert_comment(content, date, autor) {
	var list = document.getElementById('comment-list'); 
	var comment = document.createElement('div');
	comment.className = "row";
	var html = "";
	html += "<div class='col-md-8 col-md-offset-2 comment'>";
	html += "	<div class='panel panel-default'>";
	html += "		<div class='panel-heading'>";
	html += "			<span class='panel-title'><i class='fa fa-user'></i> ";
	html += autor;
	html += "			</span><span class='panel-title pull-right'><i class='fa fa-calendar'></i> ";
	html += date.getFullYear() + "-" + date.getMonth() + "-" + date.getDay() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
	html += "			</span></div><div class='panel-body'><p>"
	html += content;
	html += "</p></div></div></div>";
	console.log(html);
	comment.innerHTML = html;
	list.appendChild(comment);
}

function create_comment() {
	var content = document.getElementById("comment-content").value;
	var post = document.getElementById("post-id").value;
	var autor = document.getElementById("autor-id").value;
	var autorName = document.getElementById("autor-name").value;

	content = content.trim();
	
	if (content && post) {
		var url = "./php/addcomment.ajax.php";
		var params = "post=" + post + "&user=" + autor + "&content=" + encodeURIComponent(content);
		var http = new XMLHttpRequest();
		
		http.onreadystatechange = function() {
			if(http.readyState == 4 && http.status == 200) {
				insert_comment(content, new Date(), autorName);
				document.getElementById("comment-content").value = "";
			}
		}
		
		http.open("POST", url, true);
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Content-length", params.length);
		http.send(params);
	}
}

function modPost()
{
	var title = document.getElementById("modifyPostTitle").value;
	var description = document.getElementById("modifyPostDescription").value;
	var posts =  document.getElementById("modifyPostList");
	var selectedPost = posts.options[posts.selectedIndex];

	title=title.trim();
	description=description.trim();

	if(title.length > 0 && description.length > 0)
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
        xmlhttp.open("POST", "php/modifyPost.php?title=" + title +"&description=" + description+"&id=" + selectedPost.value, true);
        xmlhttp.send();
	}
}

function getSelectedPost()
{
    var posts =  document.getElementById("modifyPostList");
	var selectedPost = posts.options[posts.selectedIndex];
    var xmlhttp = new XMLHttpRequest();
    console.log("id: "+selectedPost.value);
    xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            if(xmlhttp.responseText != -1)
            {
                var data = xmlhttp.responseText.split(";");
                if(data.length == 2)
                {
                    document.getElementById("modifyPostTitle").value = data[0];
                    document.getElementById("modifyPostDescription").value = data[1];
                }
                else
                {
                    alert("Error al obtener datos.");
                }
            }
            console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/getPost.php?id="+ selectedPost.value, true);
    xmlhttp.send();
}

function deletePost()
{
	var posts =  document.getElementById("deletePostList");
	var selectedPost = posts.options[posts.selectedIndex];
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
        	if(xmlhttp.responseText >= 0)
        	{
        		alert("Publicación eliminada con éxito!");
                location.reload();
			}
			console.log(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "php/deletePost.php?id=" + selectedPost.value, true);
    xmlhttp.send();
}