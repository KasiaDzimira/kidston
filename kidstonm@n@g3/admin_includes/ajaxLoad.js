// JavaScript Document
var xmlHttpuser,xmlHttpPg;

function checkUsername()
{
	if(document.getElementById("username").value == "")
	{
		prmt("Please enter the Username");
		//document.getElementById("username").focus();
		return false;
	}
	t = document.getElementById("username").value;
	xmlHttpuser=GetXmlHttpObject()
	if (xmlHttpuser==null)
	{
	alert ("Browser does not support HTTP Request")
	return
	} 
	var url="admin_process/check_user.php?usname="+t;
	xmlHttpuser.onreadystatechange=stateChangeduser
	xmlHttpuser.open("GET",url,true)
	xmlHttpuser.send(null)

}
function stateChangeduser() 
{ 
	if (xmlHttpuser.readyState==4 || xmlHttpuser.readyState=="complete")
	{ 
		sp=xmlHttpuser.responseText;
		//sp = trimString(xmlHttpuser.responseText);
		if(sp == 1)
		{
			document.getElementById("statusDiv").innerHTML =  "&nbsp;<img src='admin_image/tick-icon.gif' width=21 height=19>";
			document.getElementById("btsave").style.display = "block";
		}
		if(sp == 2)
		{
			document.getElementById("statusDiv").innerHTML =  "&nbsp;<img src='admin_image/close.gif' width=24 height=24>";
			document.getElementById("btsave").style.display = "none";
		}
	}
	if (xmlHttpuser.readyState==1)
	{
		document.getElementById("statusDiv").innerHTML = "&nbsp;<img src='admin_image/ajax-loader.gif'>";
	}
}


function create_pg(ac)
{
	var numi = document.getElementById('theValue').value;
	
	xmlHttpPg = GetXmlHttpObject()
	if (xmlHttpPg == null)
	{
	alert ("Browser does not support HTTP Request")
	return
	} 
	var url="admin_support/create_pg.php?thevalue="+numi+"&act="+ac;
	xmlHttpPg.onreadystatechange=stateChangedPg
	xmlHttpPg.open("GET",url,true)
	xmlHttpPg.send(null)

}
function stateChangedPg() 
{ 
	if (xmlHttpPg.readyState==4 || xmlHttpPg.readyState=="complete")
	{ 
		sp = xmlHttpPg.responseText.split("^@^");
		//sp = trimString(xmlHttpuser.responseText);
		alert(document.getElementById("pg").innerHTML);
		document.getElementById("pg").innerHTML = document.getElementById("pg").innerHTML + sp[0];
		document.getElementById('theValue').value = sp[1];
	}
	if (xmlHttpPg.readyState==1)
	{
		//document.getElementById("pg").innerHTML = "&nbsp;<img src='admin_image/ajax-loader.gif'>";
	}
}

function GetXmlHttpObject()
{ 
	var objXMLHttp=null
	if (window.XMLHttpRequest)
	{
	objXMLHttp=new XMLHttpRequest()
	}
	else if (window.ActiveXObject)
	{
	objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp
} 