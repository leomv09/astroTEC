function show(id, panelName)
{
	hide();
	document.getElementById('hidden' + id).className = "active";
	setHeading(panelName)
}

function setHeading(panel)
{
	document.getElementById('panelheading').innerHTML = panel;
}

function hide()
{
	document.getElementById('hidden1').className = "hidden";
	document.getElementById('hidden4').className = "hidden";
}

function showAdminName(name)
{
	document.getElementById('adminName').innerHTML = name;
}


function changeVisibility()
{
	var select = document.getElementById("optionSelect");

	var selected = select.options[select.selectedIndex];
	console.log(selected.value);
	if(selected.value == 1)
	{
		document.getElementById("hidden2").className = "active";
		document.getElementById("hidden3").className = "hidden";
	}
	else
	{
		document.getElementById("hidden2").className = "hidden";
		document.getElementById("hidden3").className = "active";
	}
}
