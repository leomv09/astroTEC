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
	document.getElementById('hidden9').className = "hidden";
	document.getElementById('hidden10').className = "hidden";
	document.getElementById('hidden11').className = "hidden";
	document.getElementById('hidden14').className = "hidden";
	document.getElementById('hidden15').className = "hidden";
	document.getElementById('hidden18').className = "hidden";
	document.getElementById('hidden19').className = "hidden";
	document.getElementById('hidden20').className = "hidden";
	document.getElementById('hidden23').className = "hidden";
	document.getElementById('hidden24').className = "hidden";
	document.getElementById('hidden29').className = "hidden";
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
		document.getElementById("hidden12").className = "active";
		document.getElementById("hidden13").className = "hidden";
	}
	else
	{
		document.getElementById("hidden2").className = "hidden";
		document.getElementById("hidden3").className = "active";
		document.getElementById("hidden12").className = "hidden";
		document.getElementById("hidden13").className = "active";
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

function changeBlogVisibility()
{
	var select = document.getElementById("optionBlogSelect");

	var selected = select.options[select.selectedIndex];


	if(selected.value == 1)
	{
		document.getElementById("hidden12").className = "active";
		document.getElementById("hidden13").className = "hidden";
	}
	else
	{
		document.getElementById("hidden12").className = "hidden";
		document.getElementById("hidden13").className = "active";
	}
}

function changeFaqVisibility()
{
	var select = document.getElementById("optionFaqSelect");

	var selected = select.options[select.selectedIndex];


	if(selected.value == 1)
	{
		document.getElementById("hidden16").className = "active";
		document.getElementById("hidden17").className = "hidden";
	}
	else
	{
		document.getElementById("hidden16").className = "hidden";
		document.getElementById("hidden17").className = "active";
	}
}


function changeMemberVisibility()
{
	var select = document.getElementById("optionMemberSelect");

	var selected = select.options[select.selectedIndex];


	if(selected.value == 1)
	{
		document.getElementById("hidden21").className = "active";
		document.getElementById("hidden22").className = "hidden";
	}
	else
	{
		document.getElementById("hidden21").className = "hidden";
		document.getElementById("hidden22").className = "active";
	}
}

function changeEquipmentVisibility()
{
	var select = document.getElementById("optionEquipmentSelect");

	var selected = select.options[select.selectedIndex];


	if(selected.value == 1)
	{
		document.getElementById("hidden25").className = "active";
		document.getElementById("hidden26").className = "hidden";
	}
	else
	{
		document.getElementById("hidden25").className = "hidden";
		document.getElementById("hidden26").className = "active";
	}
}

function changeGalleryVisibility()
{
	var select = document.getElementById("optionGallerySelect");

	var selected = select.options[select.selectedIndex];


	if(selected.value == 1)
	{
		document.getElementById("hidden27").className = "active";
		document.getElementById("hidden28").className = "hidden";
		document.getElementById("hidden30").className = "hidden";
		document.getElementById("hidden31").className = "hidden";
	}
	else if (selected.value == 2)
	{
		document.getElementById("hidden27").className = "hidden";
		document.getElementById("hidden28").className = "active";
		document.getElementById("hidden30").className = "hidden";
		document.getElementById("hidden31").className = "hidden";
	}
	else if (selected.value == 3)
	{
		document.getElementById("hidden27").className = "hidden";
		document.getElementById("hidden28").className = "hidden";
		document.getElementById("hidden30").className = "active";
		document.getElementById("hidden31").className = "hidden";
	} 
	else
	{
		document.getElementById("hidden27").className = "hidden";
		document.getElementById("hidden28").className = "hidden";
		document.getElementById("hidden30").className = "hidden";
		document.getElementById("hidden31").className = "active";
	}
}

