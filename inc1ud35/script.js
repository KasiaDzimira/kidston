function MM_reloadPage(init){if(init==true)with(navigator){if((appName=="Netscape")&&(parseInt(appVersion) >= 4)){document.MM_pgW=innerWidth;document.MM_pgH=innerHeight;onresize=MM_reloadPage;}}else if(innerWidth!=document.MM_pgW||innerHeight!=document.MM_pgH)location.reload();}MM_reloadPage(true);

function checkBrowser(){
	this.ver=navigator.appVersion
	this.dom=document.getElementById?1:0
	this.ie5=(this.ver.indexOf("MSIE 5")>-1 && this.dom)?1:0;
	this.ie4=(document.all && !this.dom)?1:0;
	this.ns5=(this.dom && parseInt(this.ver) >= 5) ?1:0;
	this.ns4=(document.layers && !this.dom)?1:0;
	this.bw=(this.ie5 || this.ie4 || this.ns4 || this.ns5)
	return this
}

bw=new checkBrowser()

//Show layers
function show(id)
{ 
this.css=bw.dom? document.getElementById(id).style:bw.ie4?document.all[id].style:bw.ns4?document.layers[id]:0;	
this.css.visibility='visible'
//document.getElementById('about_1').style.color='#000000';
}	

//Hide a layer
function hide(id)
{
	this.css=bw.dom? document.getElementById(id).style:bw.ie4?document.all[id].style:bw.ns4?document.layers[id]:0;	
	this.css.visibility='hidden';
}
function MM_jumpMenu(targ,selObj,restore){eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");if(restore)selObj.selectedIndex=0;}function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v3.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); return x;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_showHideLayers() { //v3.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
    obj.visibility=v; }
}
   function changeCSS(obj, bgColor, bdColor, ftColor) {
   	if (document.getElementById) {
		obj.style.backgroundColor = bgColor;
		obj.style.borderColor = bdColor;
		obj.style.color = ftColor;
	}
}
/* field value clear */
function clearText(field){
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
/* field end */


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

/**********************To allow only characters*******************/
 function charactercheck(event)
{
  if(navigator.appName != "Microsoft Internet Explorer" )
 {
  if( (event.which >= 97 && event.which <= 122 ) 
   || (event.which >= 65 && event.which <= 90 ) || (event.which == 13 ) || (event.which == 95 )
   || (event.which == 8 ) || (event.which==0))
    {
	     return ; 
	}
  else {
    return false;
  }
 }
 else
 {
  if( (event.keyCode >= 97 && event.keyCode <= 122 ) 
   || (event.keyCode >= 65 && event.keyCode <= 90 ) || (event.keyCode == 13 ) || (event.keyCode == 95 )
   || (event.keyCode == 8 ) || (event.keyCode==32))
    {
	     return ; 
	}
  else {
    return false;
  }
  }
}
/**************************end here *******/
/*******************To allow only integers and Space *********************/
 function numcheck(event) 
 {
 if(navigator.appName != "Microsoft Internet Explorer" )
 {
  if( (event.which >= 48 && event.which <= 57) || (event.which == 8 ) || (event.which == 32 )  || (event.which==0) )
	   {
	     return; 
		}
  else
   { 
  		return false;
  	}
 }
 else
 {
    if( (event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode == 32 ) || (event.keyCode == 8 ) )
	   {
	     return; 
	}
  else { 
    return false;
  }
	}
 }
/**************end************/
//******************Add more*********************************
function return_pg(lgmode)
{
  //alert(value);
  var numi = document.getElementById('theValue');
  var numv = document.getElementById('theValue').value;
  var value;
  if(lgmode == "1")
  {
   value = "<br /><select name=frm_language_"+numv+" id=frm_language_"+numv+" class=field-location><option value=\'\'>Sprache wählen</option><option value=\'de - Deutsch&brvbar;German\'>de - Deutsch&brvbar;German</option><option value=\'en - Englisch&brvbar;English\'>en - Englisch&brvbar;English</option><option value=\'fr - Franz&ouml;sisch&brvbar;French\'>fr - Franz&ouml;sisch&brvbar;French</option><option value=\'it - Italienisch&brvbar;Italian\'>it - Italienisch&brvbar;Italian</option></select>&nbsp;&nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f1_"+numv+" value=\'Native\' />&nbsp;Muttersprache &nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f2_"+numv+" value=\'Fluent\' />&nbsp;Verhandlungssicher &nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f3_"+numv+" value=\'Basic\' />&nbsp;Berufspraxis"
  }
  if(lgmode == "2")
  {
   value = "<br /><select name=frm_language_"+numv+" id=frm_language_"+numv+" class=field-location><option value=\'\'>Select a Language</option><option value=\'de - Deutsch&brvbar;German\'>de - Deutsch&brvbar;German</option><option value=\'en - Englisch&brvbar;English\'>en - Englisch&brvbar;English</option><option value=\'fr - Franz&ouml;sisch&brvbar;French\'>fr - Franz&ouml;sisch&brvbar;French</option><option value=\'it - Italienisch&brvbar;Italian\'>it - Italienisch&brvbar;Italian</option></select>&nbsp;&nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f1_"+numv+" value=\'Native\' />&nbsp;Native &nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f2_"+numv+" value=\'Fluent\' />&nbsp;Fluent &nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f3_"+numv+" value=\'Basic\' />&nbsp;Basic"
  }
  var ni = document.getElementById('pg');
  var num = (document.getElementById("theValue").value -1)+ 2;
  numi.value = num;
  //alert(num);
  var divIdName = "my"+num+"Div";
  var newdiv = document.createElement('div');
  newdiv.setAttribute("id",divIdName);
  if(lgmode == "1")
  {
  newdiv.innerHTML = value+"<span style='float:right;'> -<a href=\"javascript:;\" onclick=\"removeElementone(\'"+divIdName+"\')\" class='error'>entfernen</a></span><br />";
  }
  if(lgmode == "2")
  {
  newdiv.innerHTML = value+"<span style='float:right;'> -<a href=\"javascript:;\" onclick=\"removeElementone(\'"+divIdName+"\')\" class='error'>Remove</a></span><br />";
  }
  ni.appendChild(newdiv);
/**/}

function removeElementone(divNum) {
  var d = document.getElementById('pg');
  var olddiv = document.getElementById(divNum);
  d.removeChild(olddiv);
}
//*********************Ends Here*********************************

function return_pg1(lgmode)
{
  //alert(value);
  var numi = document.getElementById('theValue');
  var numv = document.getElementById('theValue').value;
  var temp = new Array();
  temp = (document.getElementById('stateload').value).split(",");
  //var value;
  if(lgmode == "1")
  {
    var value = "<div><br /><select name=frm_language_"+numv+" id=frm_language_"+numv+" class=field-location><option value=\'\'>Sprache wählen</option>";
  for(i=0;i<temp.length;i++)
  {
	value += "<option value='"+temp[i]+"'>"+ temp[i]+"</option>";
  }
  value = value + "</select>&nbsp;&nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f1_"+numv+" value=\'Native\' />&nbsp;Muttersprache &nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f2_"+numv+" value=\'Fluent\' />&nbsp;Verhandlungssicher &nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f3_"+numv+" value=\'Basic\' />&nbsp;Berufspraxis"
  }
  if(lgmode == "2")
  {
   var value = "<div><br /><select name=frm_language_"+numv+" id=frm_language_"+numv+" class=field-location><option value=\'\'>Select a Language</option>";
  for(i=0;i<temp.length;i++)
  {
	value += "<option value='"+temp[i]+"'>"+ temp[i]+"</option>";
  }
  value = value + "</select>&nbsp;&nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f1_"+numv+" value=\'Native\' />&nbsp;Native &nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f2_"+numv+" value=\'Fluent\' />&nbsp;Fluent &nbsp;&nbsp;<input type=radio name=frm_f_"+numv+" id=frm_f3_"+numv+" value=\'Basic\' />&nbsp;Basic"
  }
  var ni = document.getElementById('pg');
  var num = (document.getElementById("theValue").value -1)+ 2;
  numi.value = num;
  //alert(num);
  var divIdName = "my"+num+"Div";
  var newdiv = document.createElement('div');
  newdiv.setAttribute("id",divIdName);
  if(lgmode == "1")
  {
  newdiv.innerHTML = value+"<span style='float:right;'> -<a href=\"javascript:;\" onclick=\"removeElementone(\'"+divIdName+"\')\" class='error'>entfernen</a></span><br />";
  }
  if(lgmode == "2")
  {
  newdiv.innerHTML = value+"<span style='float:right;'> -<a href=\"javascript:;\" onclick=\"removeElementone(\'"+divIdName+"\')\" class='error'>Remove</a></span><br />";
  }
  ni.appendChild(newdiv);
/**/}

function removeElementone(divNum) {
  var d = document.getElementById('pg');
  var olddiv = document.getElementById(divNum);
  d.removeChild(olddiv);
}
//*********************Ends Here*********************************


function job_validation(frm)
{
		msg = "";
		if(document.getElementById("com_name").value == "")
		{
			msg = "- Please enter the Name of the Company.";
		}
		if(document.getElementById("indu_name").value == "")
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
		if(document.getElementById("cont_phone").value == "")
		{
			msg += "<br>- Please enter the Contact Phone.";
		}
		if(document.getElementById("address1").value == "")
		{
			msg += "<br>- Please enter the Address.";
		}
		
		if(document.getElementById("job_title").value == "")
		{
			msg += "<br>- Please enter the Job Title.";
		}
/*		if(document.getElementById("job_brief").value == "")
		{
			msg += "<br>- Please enter the Brief Description.";
		}
*/
			if(document.getElementById("job_location").value == "")
		{
			msg += "<br>- Please enter the Job Location .";
		}
/*		if(document.getElementById("res_pname").value == "")
		{
			msg += "<br>- Please enter the Responsible Person Name .";
		}
		var re = /^[_\.0-9a-z-]+\@([0-9a-z][0-9a-z-]*\.)+([a-z]{2,4})+$/i
		if(document.getElementById('cont_email').value == "")
		{
			msg += "<br>- Please enter the Responsible Person Email Address.";
		}
		else
		{
			if(!document.getElementById('cont_email').value.match(re)) 
			{
			msg += "<br>- Please enter a valid Email Address for the Responsible Person.";
			}
		}
*/		if(document.getElementById("frm_language_0").value == "")
		{
			msg += "<br>- Please select the language.";
		}
		if(document.getElementById("frm_f1_0").checked != true && document.getElementById("frm_f2_0").checked != true && document.getElementById("frm_f3_0").checked != true)
		{
			msg += "<br>- Please select the language level.";
		}
	if(document.getElementById("job_asap").value == "")
	{
	if(document.getElementById("ivdate").value == "" || document.getElementById("ivmonth").value == "" || document.getElementById("ivyear").value == "" )
		{
			msg += "<br>- Please select the Entry Date .";
		}else{
			dd = document.getElementById("ivdate").value;
			mm = document.getElementById("ivmonth").value;
			yy = document.getElementById("ivyear").value;
			
			frm_date =$dd+"-"+$mm+"-"+$yy; 
			var d = new Date();
			d1=d.getDate();
			m1=d.getMonth();
			y1=d.getFullYear();
			var curdate=d1+"-"+m1+"-"+y1;
			datecur1 = dateCompare(curdate,frm_date,'<=');
			if($datecur1==false)
			{
					msg += "<br>- Entry Date must be a future date.";
			}
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
function emptype_return(prp)
{
	if(prp.value == "")
		prp.value = "";
}
function job_valid_login(frm)
{
		msg = "";
	/*	if(document.getElementById("com_name").value == "")
		{
			msg = "- Please enter the Name of the Company.";
		}
		if(document.getElementById("indu_name").value == "")
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
		if(document.getElementById("cont_phone").value == "")
		{
			msg += "<br>- Please enter the Contact Phone.";
		}
		if(document.getElementById("address1").value == "")
		{
			msg += "<br>- Please enter the Address.";
		}*/
		
		if(document.getElementById("job_title").value == "")
		{
			msg += "<br>- Please enter the Job Title.";
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
	if(document.getElementById("job_asap").value == "")
	{
	if(document.getElementById("ivdate").value == "" || document.getElementById("ivmonth").value == "" || document.getElementById("ivyear").value == "" )
		{
			msg += "<br>- Please select the Entry Date .";
		}else{
			dd = document.getElementById("ivdate").value;
			mm = document.getElementById("ivmonth").value;
			yy = document.getElementById("ivyear").value;
			
			frm_date =$dd+"-"+$mm+"-"+$yy; 
			var d = new Date();
			d1=d.getDate();
			m1=d.getMonth();
			y1=d.getFullYear();
			var curdate=d1+"-"+m1+"-"+y1;
			datecur1 = dateCompare(curdate,frm_date,'<=');
			if($datecur1==false)
			{
					msg += "<br>- Entry Date must be a future date.";
			}
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

