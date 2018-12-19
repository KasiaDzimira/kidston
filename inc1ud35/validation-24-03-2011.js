// JavaScript Document
/*

*///------------------ Start from candidate details form validation -----------------------------------
var siteurl = "http:www.kidston.ch/";
//var siteurl = "http://saravanan/kidston/phase_1/";

function prmt(msg)
{
	jQuery.prompt(msg,{show :'fadeIn'});
}

function printViewJobs(jid)
{
	printWin = window.open(siteurl + 'print_job_details.php?jid='+jid,'printWindow','width=600,height=600');
}

function printContactUs(cmsid)
{
	printWin = window.open(siteurl + 'print_cms.php?cmsid='+cmsid,'printWindow','width=600,height=600');
}

function validation_candidate()
{//1
  
	msg = "";
		if(document.getElementById("lname").value == "")
		{
			msg = "- Please enter the Last Name.";
		}
		if(document.getElementById("name").value == "")
		{
			msg += "<br>- Please enter the First Name.";
		}
		if(document.getElementById("m").checked == false && document.getElementById("f").checked == false)
		{
			msg += "<br>- Please select the sex.";
		}
		if(document.getElementById("address").value == "")
		{
			msg += "<br>- Please enter the contact address .";
		}
		if(document.getElementById("countrySelect").value == "")
		{
			msg += "<br>- Please select the country .";
		}
		if(document.getElementById("stateSelect").value == "")
		{
			msg += "<br>- Please enter the state name.";
		}	
		var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
		if(document.getElementById('cont_pemail').value == "")
		{
			msg += "<br>- Please enter the email address.";
		}
		else
		{
			if(!document.getElementById('cont_pemail').value.match(re)) 
			{
			msg += "<br>- Please enter a valid email address.";
			}
		}	
		if(document.getElementById("cont_no").value == "")
		{
			msg += "<br>- Please enter the phone number.";
		}
		if(document.getElementById("qualification").value == "")
		{
			msg += "<br>- Please enter the qualification.";
		}
				
		
	 if(document.getElementById("frm_language_0").value == "")
		{
			msg += "<br>- Please select the language.";
		}
		if(document.getElementById("frm_f1_0").checked != true && document.getElementById("frm_f2_0").checked != true && document.getElementById("frm_f3_0").checked != true)
		{
			msg += "<br>- Please select the language level.";
		}
		
		if(document.getElementById("frm_reference").value == "" && (document.getElementById("frm_reference_name").value == "" && document.getElementById("frm_reference_email").value == "") )
		{
				msg += "<br>- Please select platform or enter reference details.";
		}
				if(document.getElementById("frm_reference_name").value != "" && document.getElementById("frm_reference_email").value == "" )
				{
					msg += "<br>- Please enter the reference email.";
					
				}
				var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
					if (document.getElementById("frm_reference_email").value != "" && !document.getElementById("frm_reference_email").value.match(re)) 
					{
						msg += "<br>- Please enter valid reference email.";
					}
				if(document.getElementById("frm_reference_email").value != "" && document.getElementById("frm_reference_name").value == "" )
				{
					msg += "<br>- Please enter the reference name.";
				}
				
		
	 	if(document.getElementById("upfile").value == "")
		{
			msg += "<br>- Please upload resume.";
		}	
	 if(document.getElementById("upfile").value != "")
	 {
		if((document.getElementById("upfile").value.substr(document.getElementById("upfile").value.lastIndexOf('.')) != ".jpg") && (document.getElementById("upfile").value.substr(document.getElementById("upfile").value.lastIndexOf('.')) != ".JPG") && (document.getElementById("upfile").value.substr(document.getElementById("upfile").value.lastIndexOf('.')) != ".JPEG") && (document.getElementById("upfile").value.substr(document.getElementById("upfile").value.lastIndexOf('.')) != ".DOC") && (document.getElementById("upfile").value.substr(document.getElementById("upfile").value.lastIndexOf('.')) != ".doc") && (document.getElementById("upfile").value.substr(document.getElementById("upfile").value.lastIndexOf('.')) != ".pdf") && (document.getElementById("upfile").value.substr(document.getElementById("upfile").value.lastIndexOf('.')) != ".PDF") && (document.getElementById("upfile").value.substr(document.getElementById("upfile").value.lastIndexOf('.')) != ".docx") && (document.getElementById("upfile").value.substr(document.getElementById("upfile").value.lastIndexOf('.')) != ".DOCX"))
				{
					msg += "<br>- Allowed formats for Resume Documents 1 (DOC | DOCX | PDF |JPEG | JPG )";
				}
	 }
	 if(document.getElementById("upfile2").value != "")
	 {
		if((document.getElementById("upfile2").value.substr(document.getElementById("upfile2").value.lastIndexOf('.')) != ".jpg") && (document.getElementById("upfile2").value.substr(document.getElementById("upfile2").value.lastIndexOf('.')) != ".JPG") && (document.getElementById("upfile2").value.substr(document.getElementById("upfile2").value.lastIndexOf('.')) != ".JPEG") && (document.getElementById("upfile2").value.substr(document.getElementById("upfile2").value.lastIndexOf('.')) != ".DOC") && (document.getElementById("upfile2").value.substr(document.getElementById("upfile2").value.lastIndexOf('.')) != ".doc") && (document.getElementById("upfile2").value.substr(document.getElementById("upfile2").value.lastIndexOf('.')) != ".pdf") && (document.getElementById("upfile2").value.substr(document.getElementById("upfile2").value.lastIndexOf('.')) != ".PDF") && (document.getElementById("upfile2").value.substr(document.getElementById("upfile2").value.lastIndexOf('.')) != ".docx") && (document.getElementById("upfile2").value.substr(document.getElementById("upfile2").value.lastIndexOf('.')) != ".DOCX"))
				{
					msg += "<br>- Allowed formats for Resume Documents 2 (DOC | DOCX | PDF |JPEG | JPG )";
				}
	 }
	 if(document.getElementById("upfile3").value != "")
	 {
		if((document.getElementById("upfile3").value.substr(document.getElementById("upfile3").value.lastIndexOf('.')) != ".jpg") && (document.getElementById("upfile3").value.substr(document.getElementById("upfile3").value.lastIndexOf('.')) != ".JPG") && (document.getElementById("upfile3").value.substr(document.getElementById("upfile3").value.lastIndexOf('.')) != ".JPEG") && (document.getElementById("upfile3").value.substr(document.getElementById("upfile3").value.lastIndexOf('.')) != ".DOC") && (document.getElementById("upfile3").value.substr(document.getElementById("upfile3").value.lastIndexOf('.')) != ".doc") && (document.getElementById("upfile3").value.substr(document.getElementById("upfile3").value.lastIndexOf('.')) != ".pdf") && (document.getElementById("upfile3").value.substr(document.getElementById("upfile3").value.lastIndexOf('.')) != ".PDF") && (document.getElementById("upfile3").value.substr(document.getElementById("upfile3").value.lastIndexOf('.')) != ".docx") && (document.getElementById("upfile3").value.substr(document.getElementById("upfile3").value.lastIndexOf('.')) != ".DOCX"))
				{
					msg += "<br>- Allowed formats for Resume Documents 3 (DOC | DOCX | PDF |JPEG | JPG )";
				}
	 }
	 	if(document.getElementById("chk_agree").checked == false)
		{
			msg += "<br>- Please accept the Terms and Conditions.";
		}	
		
		if(msg != "")
		{
			prmt(msg);
			return false;
		}
		else
		{
			return true;
		}

} // 1


function reference_candidate()
{//1
  
	msg = "";
		if(document.getElementById("name").value == "")
		{
			msg = "- Please enter the Name.";
		}
		
		if(document.getElementById("address").value == "")
		{
			msg += "<br>- Please enter the contact address .";
		}
		if(document.getElementById("countrySelect").value == "")
		{
			msg += "<br>- Please select the country .";
		}
		if(document.getElementById("stateSelect").value == "")
		{
			msg += "<br>- Please enter the state name.";
		}	
		var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
		if(document.getElementById('cont_pemail').value == "")
		{
			msg += "<br>- Please enter the email address.";
		}
		else
		{
			if(!document.getElementById('cont_pemail').value.match(re)) 
			{
			msg += "<br>- Please enter a valid email address.";
			}
		}	
		if(document.getElementById("cont_no").value == "")
		{
			msg += "<br>- Please enter the phone number.";
		}
		
	 	if(document.getElementById("bank_details").value == "")
		{
			msg += "<br>- Please enter the Bank details.";
		}
		
		if(msg != "")
		{
			prmt(msg);
			return false;
		}
		else
		{
			return true;
		}

} // 1
function num_only(event)
{
	//alert(event.keyCode);
  if(navigator.appName != "Microsoft Internet Explorer" )
 {
  	 if( (event.which >= 48 && event.which <= 57) || (event.which == 13 ) || (event.which == 44 ) || (event.which == 8 ) || (event.which==0))
    {
	     return ; 
	}
  else {
    return false;
  }
 }
 else
 {
   if( (event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode == 13 ) || (event.keyCode == 44 ) || (event.keyCode == 8 ))
    {
	     return ; 
	}
  else {
    return false;
  }
  }
}
function frd_friend1(uurl)
{	
msg = "";
	if(document.getElementById('uname1').value == "")
	{
		msg += "1";
	}
	if(document.getElementById('fmail1').value=='' || document.getElementById('fmail1').value=='Email')     
	{
		msg += "1";
		document.getElementById('fmail1').value=''
		document.getElementById('fmail1').focus();  
		
	}
		var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
	if (!document.getElementById('fmail1').value.match(re)) 
	{
		msg += "1";
		document.getElementById('fmail1').select();  
	}
	if(document.getElementById('umail1').value=='' || document.getElementById('umail1').value=='Email')     
	{
		msg += "1";
		document.getElementById('umail1').value=''
		document.getElementById('umail1').focus(); 
		
	}
		var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
	if (!document.getElementById('umail1').value.match(re)) 
	{
		msg += "1";
		document.getElementById('umail1').select();   
	}
	//alert(msg);
		if(msg != "")
		{
			//alert(msg);
			document.getElementById("ff1").style.display = "block";
			return false;
		}
		else
		{
			document.getElementById("ff1").style.display = "";
			//document.getElementById("ff1").innerHTML = "Please wait..";
			
			xmlHttpcomment=GetXmlHttpObject()
			if (xmlHttpcomment==null)
			{
			alert ("Browser does not support HTTP Request")
			return false;
			} 
			url = uurl+"?uname1="+document.getElementById("uname1").value+"&fname1="+document.getElementById("fname1").value+"&fmail1="+document.getElementById("fmail1").value+"&umail1="+document.getElementById("umail1").value+"&url_frd="+document.getElementById("url_frd").value;
			//alert(url);
			xmlHttpcomment.onreadystatechange=mailersend 
			xmlHttpcomment.open("GET",url,true)
			xmlHttpcomment.send(null)
				
			//return false;
		}
	return false;
}
function mailersend ()
{ 
	document.getElementById("ff1").innerHTML = "";
	if (xmlHttpcomment.readyState==4 || xmlHttpcomment.readyState=="complete")
	{ 
		var b = xmlHttpcomment.responseText;
		//alert(xmlHttpcomment.responseText);
		var temp = new Array();
		txt = b.split("###^^###");
		//alert(txt[1]+" --- "+txt[0]);
		if(txt[1] == "1")
		{
			document.getElementById("ff1").innerHTML = "<div align='center'><font color='red'>Mail gesendet!</font></div>";
		}else if(txt[1] == "2")
		{
			document.getElementById("ff1").innerHTML = "<div align='center'><font color='red'>Mail sent!</font></div>";
		}
		else
		{
			document.getElementById("ff1").innerHTML = "<div align='center'><font color='red'>Failed!</font></div>";
		}
	}
}
// ---------------------------------- Login validation -----------------------------------------
function login_validation(uurl)
{	
msg = "";
	if(document.getElementById('uname').value == "")
	{
		msg += "1";
	}
	if(document.getElementById('pass').value=="") 
	{
		msg += "1";
	}
		if(msg != "")
		{
			document.getElementById("ff").style.display = "block";
			return false;
		}
		else
		{
			document.getElementById("ff").style.display = "";
						
			xmlHttpcomment=GetXmlHttpObject()
			if (xmlHttpcomment==null)
			{
			alert ("Browser does not support HTTP Request")
			return false;
			} 
			url = uurl+"?uname="+document.getElementById("uname").value+"&pass="+document.getElementById("pass").value;
			xmlHttpcomment.onreadystatechange=login
			xmlHttpcomment.open("GET",url,true)
			xmlHttpcomment.send(null)
		}
	return false;
}
function login() 
{ 
	document.getElementById("ff").innerHTML = "";
	if (xmlHttpcomment.readyState==4 || xmlHttpcomment.readyState=="complete")
	{ 
		var b = xmlHttpcomment.responseText;
		var temp = new Array();
		txt = b.split("###^^###");
		if(txt[1] == "1")
		{
			window.location  = txt[0];
		}
		if(txt[1] == "2")
		{
			document.getElementById("ff").innerHTML = "<div align='center'><font color='red'>Falscher Benutzername oder Passwort! Bitte nocheinmal versuchen.</font></div>";
		}
		if(txt[1] == "3")
		{
			document.getElementById("ff").innerHTML = "<div align='center'><font color='red'>Invalid Username or Password! Please try again.</font></div>";
		}
	}
}
/*function GetXmlHttpObject()
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
*/
function talent_validation(uurl)
{	
//alert("Hello");
msg = "";
	if(document.getElementById("name").value == "")
	{
			msg +=  "- Please enter the name\n";
	}
	var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
		if(document.getElementById('email').value == "")
		{
			msg += "- Please enter your email address\n";
		}
		else
		{
			if(!document.getElementById('email').value.match(re)) 
			{
			msg += "- Please enter a valid email address";
			}
		}	
	if(msg != "")
		{
			//document.getElementById("talent").style.display = "block";
			//prmt(msg);
			//prmt(msg);
			alert(msg);
			return false;
		}
		else
		{
			document.getElementById("talent").style.display = "";
			document.getElementById("talent").innerHTML = "Please wait..";
				
			xmlHttpcomment1=GetXmlHttpObject()
			if (xmlHttpcomment1==null)
			{
			alert ("Browser does not support HTTP Request")
			return false;
			}
		url = uurl+"?cname="+document.getElementById("cname").value+"&name="+document.getElementById("name").value+"&addr="+document.getElementById("address").value+"&loc="+document.getElementById("loc").value+"&phone="+document.getElementById("phone").value+"&email="+document.getElementById("email").value+"&mailadd="+document.getElementById("mailadd").value+"&tcode="+document.getElementById("tcode").value;
		//alert(url);
				xmlHttpcomment1.onreadystatechange=talentmail
			xmlHttpcomment1.open("GET",url,true)
			xmlHttpcomment1.send(null)
		}
	return false;
}

function job_validation(frm)
{
	msg = "";
		if(document.getElementById("com_name").value == "")
		{
			msg = "- Please enter the Company Name.";
		}
		if(document.getElementById("indu_name").value == "")
		{
			msg +=  "<br>- Please enter the industry name.";
		}
		if(document.getElementById("address1").value == "")
		{
			msg +=  "<br>- Please enter the address.";
		}
		if(document.getElementById("countrySelect").value == "")
		{
			msg +=  "<br>- Please select the country.";
		}
		if(document.getElementById("cont_pname").value == "")
		{
			msg +=  "<br>- Please enter the contact Name.";
		}
		if(document.getElementById("cont_pdesign").value == "")
		{
			msg +=  "<br>- Please enter the job title of contact person.";
		}
		if(document.getElementById("cont_pemail").value == "")
		{
			msg +=  "<br>- Please enter the contact email.";
		}
		var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
		if(!document.getElementById('cont_pemail').value.match(re)) 
		{
			msg += "<br>- Please enter a valid email address";
		}
		if(document.getElementById("cont_phone").value == "")
		{
			msg +=  "<br>- Please enter the contact phone.";
		}
		if(document.getElementById("job_title").value == "")
		{
			msg +=  "<br>- Please enter the job title.";
		}
		if(document.getElementById("job_location").value == "")
		{
			msg +=  "<br>- Please enter the job location.";
		}
		if(document.getElementById("frm_salary").value == "")
		{
			msg +=  "<br>- Please enter the job salary.";
		}
		
			if(msg != "")
			{
				prmt(msg);
				return false;
			}
			else
			{
				return true;
			}	
}

function talentmail() 
{ 
	if (xmlHttpcomment1.readyState==4 || xmlHttpcomment1.readyState=="complete")
	{ 
		var b = xmlHttpcomment1.responseText;
		//alert(xmlHttpcomment1.responseText);
		var temp = new Array();
		txt = b.split("###^^###");
		if(txt[1] == "1")
		{
			document.getElementById("talent").innerHTML = "<div align='center'><font color='red'>Mail Sent ...</font></div>";
		}
		else
		{
			document.getElementById("talent").innerHTML = "<div align='center'><font color='red'>Mail Not Sent...</font></div>";
		}
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
