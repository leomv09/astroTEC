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
	
	if (content && post) {
		var url = "./../php/addcomment.ajax.php";
		var params = "post=" + post + "&user=" + autor + "&content=" + content;//encodeURIComponent(content);
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