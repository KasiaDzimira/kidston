// JavaScript Document
function prmt(msg)
{
	jQuery.prompt(msg,{show :'fadeIn'});
	
}
function cfrm(msg,url)
{
	var ok = jQuery.prompt(msg,{show :'fadeIn',submit: function(v,m,f){
                  if(v) 
				  {
					window.location = url;
				 	 return true;
				  }
                  else
				  {
                  	return true;
				  }
            },buttons: { Ok: true, Cancel: false }});
}

function jform(url)
{
	var txt = 'Remarks : <br><textarea name="reject_name" id="reject_name" class="field-popup" cols="60" rows="6"></textarea>';
function mysubmitfunc(v,m,f){
	 if(v){
		  an = m.children('#reject_name');
		  if(f.reject_name == ""){
				an.css("border","solid #ff0000 1px");
				return false;
		  }
		  else
		  {
			//document.getElementById("reject_reason").value = f.reject_name;
			 window.location = url+"&remarks="+f.reject_name;
			//document.frm_news.action = url;
			//document.frm_news.submit();
		  }
	 }
      return true;
}
$.prompt(txt,{
      submit: mysubmitfunc,
      buttons: { Ok:true, Cancel: false }
});
}

function rform(url,msg)
{
	//alert(url);
	//var str =  "Edit";
//	var surl = "home.php?src=edit-remarks";
//	
//	var msg = msg + str.link(surl);
	
function mysubmitfunc(v,m,f){
	 if(v){
		  an = m.children('#reject_name');
		  if(f.reject_name == ""){
				an.css("border","solid #ff0000 1px");
				return false;
		  }
		  else
		  {
			 window.location = url+"&remarks="+f.reject_name+"&act=edit";
		 }
	 }
      return true;
}
$.prompt(msg,{
      submit: mysubmitfunc,
      buttons: { Ok:true, Cancel: false }
});

}


function rejform(url,temp)
{
	//alert(url);
	//alert(temp);
	var spot = new Array();
	spot = temp.split("<br>");
	spot_len = spot.length-1;
	
	var txt = 'Remarks : <br><textarea name="reject_name" id="reject_name" class="field-popup" cols="60" rows="6"></textarea>';
	//txt = txt + '<br><br>Template : <br><select name="frm_temp" id="frm_temp" class="field-job-drp"><option value="">Select the template</option><option value="1">Falsches Profile</option><option value="1e">WRONG PROFILE</option><option value="2">Bessere Kandidaten</option><option value="2e">Better candidates</option><option value="3">Gemäss Besprechung</option><option value="3e">as discussed</option><option value="4">Mangels Erfahrung</option><option value="4e">lack of experience</option><option value="5">Bereits besetzt durch anderen Kandidaten</option><option value="5e">already occupied by another candidate</option><option value="6">Bereits besetzt direkt durch Kunde</option><option value="6e">already occupied by client</option><option value="7">Geschlossen durch Kunde</option><option value="7e">closed by client</option></select>';
	
	 txt = txt + '<br><br><input type="checkbox" name="frm_check" id="frm_check" value="Y" >Reject without Mail';
	 txt = txt + "<br><br>Template : <br><select name=frm_temp id=frm_temp class=field-job-drp><option value=\'\'>Select a template</option>";
 	 for(i=0;i<spot_len;i++)
  	{
		txt += "<option value='"+spot[i]+"'>"+ spot[i]+"</option>";
  	}
  	txt = txt + "</select>";
		
  	var str =  "+ Add a Template";
	var surl = "home.php?src=add-templates";
	txt = txt + str.link(surl);
function mysubmitfunc(v,m,f){
	
	 if(v){
		  		  
		  an = m.children('#reject_name');
		  an1 = m.children('#frm_temp'); 
		  an2 = m.children('#frm_check'); 
		  
		  if(f.reject_name == ""){
				an.css("border","solid #ff0000 1px");
				return false;
		  }
		  else if(f.frm_check != "Y" && f.frm_temp == ""){
				an1.css("border","solid #ff0000 1px");
				return false;
				
		 }	
		  else
		  {
			 window.location = url+"&remarks="+f.reject_name+"&temp_id="+f.frm_temp+"&chk="+f.frm_check;
		  }
	 }
      return true;
}
$.prompt(txt,{
      submit: mysubmitfunc,
      buttons: { Ok:true, Cancel: false }
});
}

function editform(url,val)
{

	var txt = 'Remarks : <br><textarea name="reject_name" class="field-popup" id="reject_name" cols="60" rows="6">'+val+'</textarea>';
	
function mysubmitfunc(v,m,f){
	 if(v){
		  an = m.children('#reject_name');
		  if(f.reject_name == ""){
				an.css("border","solid #ff0000 1px");
				return false;
		  }
		  else
		  {
			//document.getElementById("reject_reason").value = f.reject_name;
			 window.location = url+"&remarks="+f.reject_name+"&act=edit";
			//document.frm_news.action = url;
			//document.frm_news.submit();
		  }
	 }
      return true;
}
$.prompt(txt,{
      submit: mysubmitfunc,
      buttons: { Ok:true, Cancel: false }
});
}


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

function login_validation(frm)
{
	if(frm.frm_login_username.value == "")
	{
		prmt("Please enter the Username.");
		//frm.frm_username.focus();
		return false;
	}
	if(frm.frm_login_password.value == "")
	{
		prmt("Please enter the Password.");
		//frm.frm_password.focus();
		return false;
	}
}
//------------------ Start from company details form validation -----------------------------------
function validation_company()
{//1
  
	msg = "";
	
		if(document.getElementById("com_name").value == "")
		{
			msg = "- Please enter the Name Of the Company.";
		}
		if(document.getElementById("job_business").value == "")
		{
			msg += "<br>- Please enter the Business Line.";
		}
		if(document.getElementById("countrySelect").value == "")
		{
			msg += "<br>- Please select the Country.";
		}
		if(document.getElementById("stateSelect").value == "")
		{
			msg += "<br>- Please enter the State Name.";
		}		
		if(document.getElementById("cont_pname").value == "")
		{
			msg += "<br>- Please enter the Contact Person Name.";
		}
		if(document.getElementById("cont_pdesign").value == "")
		{
			msg += "<br>- Please enter the Contact Person Designation.";
		}
		
		var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
		if(document.getElementById('cont_pemail').value == "")
		{
			msg += "<br>- Please enter Contact Person Email Address.";
		}
		else
		{
			if(!document.getElementById('cont_pemail').value.match(re)) 
			{
			msg += "<br>- Please enter a Valid Email Address.";
			}
		}		
		
		if(document.getElementById("address1").value == "")
		{
			msg += "<br>- Please enter the Address.";
		}
		

	
//alert(document.getElementById("username").value+" * "+document.getElementById("password").value+" * "+);
		if(document.getElementById("username").value == "" && document.getElementById("btupdate").value == "Submit" && document.getElementById("password").value != "")
		{
			msg += "<br>- Please enter the Username.";
		}
		if(document.getElementById("password").value == "" && document.getElementById("username").value != "" )
		{
			msg += "<br>- Please enter the Password.";
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

//------------------ End for company details form validation -----------------------------------

// ----------------- Start for a add job form validation ------------------------------------------
function validation_job()
{
	msg = "";
	if(document.getElementById("org_name").value == "")
	{
		msg = "- Please select the Organization.";
	}
	
		if(document.getElementById("job_business").value == "")
		{
			msg  += "<br>- Please select the Section.";
		}
		if(document.getElementById("job_title").value == "")
		{
			msg += "<br>- Please enter the Job Title.";
		}
		if(document.getElementById("job_brief").value == "")
		{
			msg += "<br>- Please enter the Brief Description.";
		}

		if(document.getElementById("job_location").value == "")
		{
			msg += "<br>- Please enter the Job Location .";
		}

		if(document.getElementById("frm_language_0").value == "")
		{
			msg += "<br>- Please select the language.";
		}
		if(document.getElementById("frm_f1_0").checked != true && document.getElementById("frm_f2_0").checked != true && document.getElementById("frm_f3_0").checked != true)
		{
			msg += "<br>- Please select the language level.";
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
	
	prmt("hello");
	return false;
}
// ----------------- End for a add job form validation ------------------------------------------

// ----------------- start date function is compared for current date ------------------------------
function dateCompare(sSrc,sDes,sOp)
{
	
   var oSrcDt,oDesDt;
   var aStrTok;

   var iDt1,iDt2;

   aStrTok=sSrc.split("-");
   if(aStrTok.length !=3 ) return false;

   oSrcDt=new Date(aStrTok[2],aStrTok[1]-1,aStrTok[0]);

   iDt1 = Date.parse(oSrcDt);

   if ( isNaN(iDt1)) iDt1=0;

   aStrTok=sDes.split("-");
   if(aStrTok.length !=3 ) return false;

   oDesDt=new Date(aStrTok[2],aStrTok[1]-1,aStrTok[0]);

   iDt2 = Date.parse(oDesDt);

   if (isNaN(iDt2)) iDt2=0;

   if(sOp!='>' && sOp!='<' && sOp!='==' && sOp!='<=' && sOp!='>=' && sOp!='<>' && sOp!='!='){SetStatus('Operator is not valid !'); return ;}	
  
  switch (sOp)
   {
     case ">":
			return (iDt1 > iDt2);
     case "<":
			return (iDt1 < iDt2);
     case "=": case "==":
            return (iDt1 == iDt2);
     case "<=":
			return (iDt1 <= iDt2);
     case ">=":
           return (iDt1 >= iDt2);
     case "!=" : case "<>":
           return (iDt1 != iDt2);
     default:
		   return false;
   }
 }
//------------------------------ End  date for current date function -------------------------------------

//---------------validation for add-manager--------------------------------------------------------------------------
function validation_manager()
{
	msg = "";
		if(document.getElementById("frm_name").value == "")
		{
			msg = "- Please enter the Name.";
		}	

		if(document.getElementById("frm_uname").value == "")
		{
			msg += "<br>- Please enter the Username.";
		}
		if(document.getElementById("btsave").value == "Submit")
		{
			if(document.getElementById("frm_pass").value == "")
			{
				msg += "<br>- Please enter the Password.";
			}
			if(document.getElementById("frm_cpass").value == "")
			{
				msg += "<br>- Please retype and confirm Password.";
			}	
		}
		if(document.getElementById("frm_cpass").value != document.getElementById("frm_pass").value && document.getElementById("frm_cpass").value != "")
		{
			msg += "<br>- Password and Confirm Password do not match. Please try again.";
		}
				 if(document.getElementById("file1").value != "")
	 {
if((document.getElementById("file1").value.substr(document.getElementById("file1").value.lastIndexOf('.')) != ".jpg") && (document.getElementById("file1").value.substr(document.getElementById("file1").value.lastIndexOf('.')) != ".JPG") && (document.getElementById("file1").value.substr(document.getElementById("file1").value.lastIndexOf('.')) != ".JPEG") && (document.getElementById("file1").value.substr(document.getElementById("file1").value.lastIndexOf('.')) != ".GIF") && (document.getElementById("file1").value.substr(document.getElementById("file1").value.lastIndexOf('.')) != ".gif"))
				{
					msg += "<br>- Image this format Only allowed (JPEG | JPG | GIF)";
				}
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
	//prmt("hello");
	return false;
}
//--------------------------------------------------------------------------------------------------------------------------
function validate_applications(frm)
{
	msg = "";
		if(document.getElementById("frm_jobcode").value == "")
		{
			msg = "- Please enter the Job Code.";
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

function apply_job_validation()
{
		msg = "";
		if(document.getElementById("frm_job_code").value == "")
		{
			msg = "- Please enter the Job Code.";
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


function validation_remarks(frm)
{
	msg = "";
	if(document.getElementById("edit_remarks").value == "")
		{
			msg = "- Please enter the Remarks.";
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
//******************Add more*********************************
function return_pg()
{
  //alert(value);
  var numi = document.getElementById('theValue');
  var numv = document.getElementById('theValue').value;
  // alert(numv);
  var temp = new Array();
  temp = (document.getElementById('stateload').value).split(",");
  var value = "<div><br /><select name=frm_language_"+numv+" id=frm_language_"+numv+" class=field-job-drp><option value=\'\'>Select a Language</option>";
  for(i=0;i<temp.length;i++)
  {
	value += "<option value='"+temp[i]+"'>"+ temp[i]+"</option>";
  }
  value = value + "</select><br /><input type=radio name=frm_f_"+numv+" id=frm_f1_"+numv+" value=\'Native\' />Native &nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f2_"+numv+" value=\'Fluent\' />Fluent&nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f3_"+numv+" value=\'Basic\' />Basic</div>"
  var ni = document.getElementById('pg');
  var num = (document.getElementById("theValue").value -1)+ 2;
  numi.value = num;
  //alert(num);
  var divIdName = "my"+num+"Div";
  var newdiv = document.createElement('div');
  newdiv.setAttribute("id",divIdName);
  newdiv.innerHTML = value+"<span style='float:right;'> -<a href=\"javascript:;\" onclick=\"removeElementone(\'"+divIdName+"\')\" class='error'>Remove</a></span><br />";
  ni.appendChild(newdiv);
/**/}

function removeElementone(divNum) {
  var d = document.getElementById('pg');
  var olddiv = document.getElementById(divNum);
  d.removeChild(olddiv);
}
//*********************Ends Here*********************************

//******************Add more*********************************
function return_pf()
{
  //alert(value);
  var numi = document.getElementById('thepValue');
  var numv = document.getElementById('thepValue').value;
  var temp = new Array();
  temp = (document.getElementById('platload').value).split(",");
  var value = "<div><br /><select name=frm_platform_"+numv+" id=frm_platform_"+numv+" class=field-job-drp><option value=\'\'>Select a Platform</option>";
  for(i=0;i<temp.length;i++)
  {
	value += "<option value='"+temp[i]+"'>"+ temp[i]+"</option>";
  }
  value = value + "</select><br /></div>"
  var ni = document.getElementById('pf');
  var num = (document.getElementById("thepValue").value -1)+ 2;
  numi.value = num;
  var divIdName = "my"+num+"Div";
  var newdiv = document.createElement('div');
  newdiv.setAttribute("id",divIdName);
  newdiv.innerHTML = value+"<span style='float:right;'> -<a href=\"javascript:;\" onclick=\"removesElementone(\'"+divIdName+"\')\" class='error'>Remove</a></span><br />";
  ni.appendChild(newdiv);
/**/}

function removesElementone(divNum) {
  var d = document.getElementById('pf');
  var olddiv = document.getElementById(divNum);
  d.removeChild(olddiv);
}


//*********************Ends Here*********************************

function validation_talents()
{
	msg = "";
		if(document.getElementById("can_name").value == "")
		{
			msg = "- Please enter the Candidate Name .";
		}
		if(document.getElementById("cdesign").value == "")
		{
			msg += "<br>- Please enter the Current Designation .";
		}	
		if(document.getElementById("business").value == "")
		{
			msg += "<br>- Please enter the Business Line .";
		}	
		if(document.getElementById("cont_pname").value == "")
		{
			msg += "<br>- Please enter the Contact Person Name .";
		}	
		var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
		if(document.getElementById('cont_email').value == "")
		{
			msg += "<br>- Please enter the Contact Person Email Address.";
		}
		else
		{
			if(!document.getElementById('cont_email').value.match(re)) 
			{
			msg += "<br>- Please enter a valid Email Address.";
			}
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
function xml_validation()
{
	msg = "";
	var lens2=document.getElementById('lenval').value;
	flag=false;
		for(i=0;i<lens2;i++)
		{
			if(document.getElementById('chk'+[i]).checked==true)
			{
				flag=true;
				break;
			}
		}
	if(flag==false)
	{
		msg="select atlest one";
		prmt(msg);
		return false;
	}

}
function chkall()
{
	var lens2=document.getElementById('lenval').value;
	for(i=0;i<lens2;i++)
		{
			if(document.getElementById('sel_all').checked==true)
			{
				document.getElementById('chk'+[i]).checked=true;
			}
			if(document.getElementById('sel_all').checked==false)
			{
				document.getElementById('chk'+[i]).checked=false;
			}
		}
}
function unchk1(a)
{
	if(a.value!="")
	{
		document.getElementById('sel_all').checked=false;
	}
}


//**********language validation************/
function validation_language()
{
	msg = "";
	if(document.getElementById("language_title").value == "")
	{
		msg = "- Please enter the Language.";
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
//**********Template validation************/
function validation_template()
{
	msg = "";
	if(document.getElementById("frm_temp_language").value == "")
	{
		msg = "- Please select the Template Language.";
	}
	if(document.getElementById("template_title").value == "")
	{
		msg += "<br>- Please enter the Template Name.";
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
//**********platform validation************/
function validation_platform()
{
	msg = "";
	if(document.getElementById("platform_title").value == "")
	{
		msg = "- Please enter the Platform.";
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
//**************cms validate***************
function cms_validate(frm)
{//1  
	msg = "";
	
/*	if(document.getElementById("menu_url").value == "")
	{
		msg += "<br>- Please enter the Custom URL.";
	}
*/	 if(document.getElementById("menu_topband").value != "")
	 {
if((document.getElementById("menu_topband").value.substr(document.getElementById("menu_topband").value.lastIndexOf('.')) != ".jpg") && (document.getElementById("menu_topband").value.substr(document.getElementById("menu_topband").value.lastIndexOf('.')) != ".JPG") && (document.getElementById("menu_topband").value.substr(document.getElementById("menu_topband").value.lastIndexOf('.')) != ".JPEG") && (document.getElementById("menu_topband").value.substr(document.getElementById("menu_topband").value.lastIndexOf('.')) != ".GIF") && (document.getElementById("menu_topband").value.substr(document.getElementById("menu_topband").value.lastIndexOf('.')) != ".gif"))
				{
					msg += "<br>- Image this format Only allowed (JPEG | JPG | GIF)";
				}
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
		return false;

} // 1
