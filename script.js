function CheckPass()
{
	if (document.getElementById("pass2").value!=document.getElementById("pass1").value)
	{
		document.getElementById("passerror2").style.visibility = "visible";
		document.getElementById("register").disabled = true;
	}
	else
	{
		document.getElementById("passerror2").style.visibility = "hidden";
		document.getElementById("register").disabled = false;
	}
}

function CheckLength()
{
		if (document.getElementById("pass1").value.length<6)
	{
		document.getElementById("passerror1").style.visibility = "visible";
		document.getElementById("register").disabled = true;
	}
	else
	{
		document.getElementById("passerror1").style.visibility = "hidden";
	}
}

function ClearPass()
{
	if (document.getElementById("pass2").value!="")
	{
	document.getElementById("pass2").value="";
	}
	document.getElementById("passerror2").style.visibility = "hidden";
}

function DeleteError()
{
	document.getElementById("logerror").style.visibility = "hidden";
}