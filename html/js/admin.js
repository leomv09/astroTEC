var state;

function show(id, panelName)
{
	hide();
	if(id > 0)
	{
		document.getElementById('hidden' + id).className = "active";
	}
	setHeading(panelName);
}

function setHeading(panel)
{
	document.getElementById('panelheading').innerHTML = panel;
}

function hide()
{
	document.getElementById('hidden1').className = "hidden";
	document.getElementById('hidden4').className = "hidden";
	document.getElementById('hidden5').className = "hidden";
	document.getElementById('hidden8').className = "hidden";
}

function showAdminName(name)
{
	document.getElementById('adminName').innerHTML = name;
}


function changeVisibility()
{
	var select = document.getElementById("optionSelect");

	var selected = select.options[select.selectedIndex];


	if(selected.value == 1)
	{
		document.getElementById("hidden2").className = "active";
		document.getElementById("hidden3").className = "hidden";
		document.getElementById("hidden6").className = "active";
		document.getElementById("hidden7").className = "hidden";
	}
	else
	{
		document.getElementById("hidden2").className = "hidden";
		document.getElementById("hidden3").className = "active";
		document.getElementById("hidden6").className = "hidden";
		document.getElementById("hidden7").className = "active";
	}
}

function changeFactsVisibility()
{
	var select = document.getElementById("optionFactsSelect");

	var selected = select.options[select.selectedIndex];


	if(selected.value == 1)
	{
		document.getElementById("hidden6").className = "active";
		document.getElementById("hidden7").className = "hidden";
	}
	else
	{
		document.getElementById("hidden6").className = "hidden";
		document.getElementById("hidden7").className = "active";
	}
}
