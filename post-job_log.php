<?PHP
		include("support/firstline.php");
		if(!isset($_SESSION['lid']) || $_SESSION['lid'] == "")
		{
?>
<script language="javascript">window.location = "post-job.php";</script>
<?PHP		
			die();
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?PHP
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<title>KIDSTON Personalvermittlung: offene IT- und kaufmännische Stellen melden</title>
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<title>Advertising and filling job vacancies - KIDSTON personnel introduction</title>
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="description" content="Sie suchen nach passenden Bewerbern für eine offene Stelle im IT- oder kaufmännischen Bereich? Melden Sie Ihre Vakanz bei KIDSTON.">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="description" content="Are you looking for suitable applicants for a job vacancy in the IT or commercial sectors? Advertise your vacancy with KIDSTON.">
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="keywords" content="offene stellen, it stellen, kaufmännische stellen, personalvermittlung">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="keywords" content="Job vacancies, fill jobs, advertise jobs, personnel introduction">
<?PHP
}
?>
<meta name="description" content="Sie suchen nach passenden Bewerbern für eine offene Stelle im Informatik- oder kaufmännischen Bereich? Melden Sie Ihre Vakanz bei KIDSTON.">
<meta name="keywords" content="offene stellen, stellen besetzen, stellen melden, personalvermittlung">
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="kninc/kn-style.css" rel="stylesheet" type="text/css" />
<script src="kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="kninc/jquery.js"></script>
<script type="text/javascript" src="kninc/menu.js"></script>
<script type="text/javascript" src="kninc/jquery-impromptu.2.7.min.js"></script>
<!--<script type="text/javascript" src="kninc/popup.js" language="javascript"></script>-->

<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>

<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>

<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
<style>
			.jqifade{ position: absolute; background-color: #aaaaaa; }
			div.jqi{ width: 400px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; position: absolute; background-color: #ffffff; font-size: 11px; text-align: left; border: solid 1px #eeeeee; -moz-border-radius: 10px; -webkit-border-radius: 10px; padding: 7px; }
			div.jqi .jqicontainer{ font-weight: bold; }
			div.jqi .jqiclose{ position: absolute; top: 4px; right: -2px; width: 18px; cursor: default; color: #bbbbbb; font-weight: bold; }
			div.jqi .jqimessage{ padding: 10px; line-height: 20px; color: #444444; }
			div.jqi .jqibuttons{ text-align: right; padding: 5px 0 5px 0; border: solid 1px #eeeeee; background-color: #f4f4f4; }
			div.jqi button{ padding: 3px 10px; margin: 0 10px; background-color: #2F6073; border: solid 1px #f4f4f4; color: #ffffff; font-weight: bold; font-size: 12px; }
			div.jqi button:hover{ background-color: #728A8C; }
			div.jqi button.jqidefaultbutton{ background-color: #BF5E26; }
			.jqiwarning .jqi .jqibuttons{ background-color: #BF5E26; }

</style>

<script language="javascript">
function getInternetExplorerVersion()
// Returns the version of Internet Explorer or a -1
// (indicating the use of another browser).
{
  var rv = -1; // Return value assumes failure.
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}
var ver = getInternetExplorerVersion();
if ((ver <= 6) && (navigator.appCodeName == 'Mozilla') )
{
	//alert(navigator.appCodeName);
	//Specify spectrum of different font sizes:
	var min=8;
	var max=18;
	function increaseFontSize() {
   var p = document.getElementsByTagName('body');
   for(i=0;i<p.length;i++) {
      if(p[i].style.fontSize) {
         var s = parseInt(p[i].style.fontSize.replace("px",""));
      } else {
         var s = 12;
      }
      if(s!=max) {
         s += 2;
      }
      p[i].style.fontSize = s+"px"
   }
}
function decreaseFontSize() {
   var p = document.getElementsByTagName('body');
   for(i=0;i<p.length;i++) {
      if(p[i].style.fontSize) {
         var s = parseInt(p[i].style.fontSize.replace("px",""));
      } else {
         var s = 12;
      }
      if(s!=min) {
         s -= 2;
      }
      p[i].style.fontSize = s+"px"
   }   
}

}	
else
{
	//alert(ver);
	function increaseFontSize()
	{
	if(parent.parent.document.body.style.zoom!=0) 
	parent.parent.document.body.style.zoom*=1.2; 
	else 
	parent.parent.document.body.style.zoom=1.2;
	}
	function decreaseFontSize()
	{
	if(parent.parent.document.body.style.zoom!=0) 
	parent.parent.document.body.style.zoom*=0.833; 
	else 
	parent.parent.document.body.style.zoom=0.833;
	}

}
</script>

<!-- TinyMCE -->
<script type="text/javascript" src="tiny/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
		//elements : "frm_short_desc,frm_detail_desc",
		elements : "frm_detail_desc,responsibility,skillz,frm_add_com",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",

		// Theme options
		theme_advanced_buttons1 : "ibrowser,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,|,forecolor,backcolor,|,preview,fullscreen,code,",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

</head>

<body>
<?PHP include("login.php"); ?>
<div id="bg-home">
  <div id="page-section">
  	<?PHP include("header.php");?>
	<div id="inner-mid-section">
	  <div id="inner-band-sec3">
        <div class="top-band-left">
          <div class="top-band-left-txt3">
		   <?PHP
		  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		  {
		  ?>
		  <span class="band-orange">Your Business - Our People</span><br />Sie suchen - Wir finden</div>
		  <?PHP
		 	}
			if($_SESSION["slanguage"] == "2")
			{
		?>	
          <span class="band-orange">Your Business – Our People</span><br />You search – we find</div>
		  <?PHP
		  	}
			?>
               </div>
	    <div class="top-band-right"><img src="<?PHP echo SITE_URL; ?>toppic/01.jpg" height="125" width="475" border="0" /></div>
      </div>
	  <div id="content-box-bg">
		  		<div class="inner-c1">
					<div class="inner-c1-pad">
						<!--<div class="inner-menu-red"><a href="#" class="menu-red-link">Search jobs</a></div>
						<br /><br /><br />-->
						<?PHP 	$MID="4";
							include("support/left_menu.php"); 
						?>
						
<!--						<div class="inner-menu-red"><a href="#" class="menu-red-link">Submit your Resume</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Career Tips</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Work with kids ton</a></div>
-->					</div>
		  		</div>
				<div class="inner-c2">
					<div class="h1">
					<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					{
						echo "Offene Stellen melden";
					}
					if($_SESSION["slanguage"] == "2")
					{
						echo "Advertising  job vacancies";
					}
					?>	 </div>
					<div class="frm-content-area" >
                      <!--
					 		Company Informations...
					 -->
					 <?PHP
					 		if($_REQUEST["resmsg"] != "")
							{
					 ?>
					 <div style="height:70px;" align="center"><?PHP echo $db->errmsg[$db->decode64($_REQUEST["resmsg"])]; ?>
					 <?PHP
					 	//if($_REQUEST["jcode"] != "")
						//{
					 ?>
<!--					 <span class='smtxt'><b>Jobcode : </b><?PHP //echo $db->decode64($_REQUEST["jcode"]); ?></span>
-->					 <?PHP
					 	//}
					 ?>
					 </div>
					 <?PHP
					 		}
					 ?>
					<form name="frm_post" id="frm_post" action="action/{save_joblog}/<?PHP echo base64_encode(rand(1000,50000)); ?>" method="post" onSubmit="return job_valid_login(this);" >
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
					    <tr>
					      <td width="260" height="30" align="left" valign="top"><strong>
						  <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						  {
						  	echo "Stellendetails";
						  }
						  if($_SESSION["slanguage"] == "2")
						  {
						 	 echo "Job details";
						  }
						  ?>
						  </strong></td>
					      <td width="80" align="center" valign="middle">&nbsp;</td>
					      <td width="260" align="left" valign="top">&nbsp;</td>
				          <td width="50" align="left" valign="top">&nbsp;</td>
					    </tr>
					    <tr>
					      <td height="20" align="left" valign="top">
						   <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						  {
						  	echo "Stellentitel";
						  }
						  if($_SESSION["slanguage"] == "2")
						  {
						 	 echo "Job title";
						  }
						  ?><span class="star">*</span> : </td>
                          <td align="center" valign="middle">&nbsp;</td>
                          <td align="left" valign="top">
						  <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						  {
						  	echo "Anstellungsart";
						  }
						  if($_SESSION["slanguage"] == "2")
						  {
						 	 echo "Type of position";
						  }
						  ?> <span class="star">*</span> :</td>
                          <td align="left" valign="top">&nbsp;</td>
					    </tr>
					    <tr>
					      <td height="45" align="left" valign="top"><input name="job_title" type="text" class="field-pj" id="job_title" maxlength="200" />
						   <p class="dnd">
						  <input type="text" name="subject" id="subject" value="" />
						  <textarea name="message" id="message"></textarea>
						  </p>						  </td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="left" valign="top">
							<select class="field-location" name="job_type" id="job_type">
								<option value="Permanent">
								<?PHP
								if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
								{
									echo "Festanstellung";
								}
								if($_SESSION["slanguage"] == "2")
								{
									echo "Permanent";
								}
								?>	 </option>
								<option value="Temporary">
								<?PHP
								if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
								{
									echo "Temporär";
								}
								if($_SESSION["slanguage"] == "2")
								{
									echo "Temporary";
								}
								?>	 </option>
								<option value="Freelance">
								<?PHP
								if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
								{
									echo "Freelance";
								}
								if($_SESSION["slanguage"] == "2")
								{
									echo "Freelance";
								}
								?>	</option>
							</select></td>
                            <td align="left" valign="top">&nbsp;</td>
					    </tr>
					    
					    <tr>
					      <td height="20" align="left" valign="top">
						  <?PHP
						 	 if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						 	 {
						  		echo "Einsatzbeginn";
						 	 }
						 	 if($_SESSION["slanguage"] == "2")
							 {
						 	    echo "Start of employment";
						  	 }
						 	 ?> <span class="star">*</span> : </td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="left" valign="top"></td>
                            <td align="left" valign="top"></td>
					    </tr>
					    <tr>
					      <td height="45" align="left" valign="top"><?PHP 
		  	$curyear = date('Y');
		  ?>
			  <select name="ivdate" id="ivdate" class="field-pj-drp" style="width:70px;">
			  <option value="">
			   <?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
					{
						echo "Tag";
					}
					if($_SESSION["slanguage"] == "2")
					{
					    echo "Date";
					}
				?>
			 </option>
			  <?PHP 
			  		for($d=1;$d<=31;$d++)
					{// for
						if($d<=9)
						{ 
							$ddd = "0".$d;
						?>
							<option value="<?PHP echo $ddd; ?>" <?PHP if($date==$ddd){?> selected="selected"<?PHP }?>><?PHP echo "0".$d; ?></option>	
		<?PHP			}else
						{
				?>
						
						<option value="<?PHP echo $d; ?>" <?PHP if($date==$d){?> selected="selected"<?PHP }?>><?PHP echo $d; ?></option>		
			<?PHP 		}
		  		} // for
			  ?>
			  </select>
			  <select name="ivmonth" id="ivmonth" class="field-pj-drp" style="width:80px;">
			  <option value="">
			  <?PHP
				 if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
				 {
					echo "Monat";
				 }
				 if($_SESSION["slanguage"] == "2")
				 {
				    echo "Month";
				 }
				?></option>
				  <option value="01">Jan</option>
				  <option value="02">Feb</option>
				  <option value="03">Mar</option>
				  <option value="04">Apr</option>
				  <option value="05">May</option>
				  <option value="06">Jun</option>
				  <option value="07">jul</option>
				  <option value="08">Aug</option>
				  <option value="09">sep</option>
				  <option value="10">Oct</option>
				  <option value="11">Nov</option>
				  <option value="12">Dec</option>  
			  </select>
			  <select name="ivyear" id="ivyear" class="field-pj-drp" style="width:80px;">
			  <option value="">
			  <?PHP
				 if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
				 {
					echo "Jahr";
				 }
				 if($_SESSION["slanguage"] == "2")
				 {
				    echo "Year";
				 }
				?></option>
			 <?PHP 
			  		for($y=$curyear;$y<=$curyear+2;$y++)
					{
				?>
						<option value="<?PHP echo $y; ?>"><?PHP echo $y; ?></option>		
		  	<?PHP 
					}
			  ?>			  
			  </select></td>
                            <td align="center" valign="top">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
							{
								echo "oder";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "OR";
							}
							?> &nbsp;&nbsp;&nbsp;</td>
                            <td align="left" valign="top">
							 <select name="job_asap" id="job_asap" class="field-location" >
			  <option value="">
			   <?PHP
			  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" ) 
			  {
			  	echo "wählen";
			  }
			  if($_SESSION["slanguage"] == "2")
			  {
				echo "Select";
			  }
			  ?></option>
			  <option value="asap">ASAP</option>		 
			  <option value="nV">nV</option>
			  <option value="by appt">by appt</option> 
		   </select>	</td>
                            <td align="left" valign="top">&nbsp;</td>
					    </tr>
				<tr>
					      <td height="20" align="left" valign="top">
						  <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						  {
						  	echo "Dauer";
						  }
						  if($_SESSION["slanguage"] == "2")
						  {
							echo "Duration";
						  }
						?>:</td>
                          <td align="center" valign="middle">&nbsp;</td>
                            <td align="left" valign="top">
							<?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						  {
						  	echo "Einsatzort";
						  }
						  if($_SESSION["slanguage"] == "2")
						  {
							echo "Location";
						  }
							?> <span class="star">*</span> : 
<!--							Responsible Person Name * :
--></td>
                            <td align="left" valign="top">&nbsp;</td>
				</tr>
					    <tr>
					      <td height="45" align="left" valign="top">
						  	<input name="job_duration" type="text" class="field-pj" id="job_duration" maxlength="50" />	  					  </td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="left" valign="top">
<!--							<input name="res_pname" type="text" class="field-job"  id="res_pname" maxlength="150" />
-->							<input name="job_location" type="text" class="field-pj" id="job_location" maxlength="200"/>							</td>
                            <td align="left" valign="top">&nbsp;</td>
					    </tr>
					    
					    
					    <tr>
					      <td height="20" align="left" valign="top">
						  
<!--						  Responsible Person Email * : 
-->						  <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						  {
						  	echo "Gehaltsspanne";
						  }
						  if($_SESSION["slanguage"] == "2")
						  {
							echo "Salary range";
						  }
							?> <span class="star">*</span> :						  </td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="left" valign="top"></td>
                            <td align="left" valign="top"></td>
					    </tr>
					    <tr>
					      <td height="45" align="left" valign="top">
<!--						  <input name="cont_email" type="text" class="field-job" id="cont_email" maxlength="150" />
-->						  <input name="frm_salary" type="text" class="field-pj" id="frm_salary" maxlength="" />						  </td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="left" valign="top"></td>
                            <td align="left" valign="top"></td>
					    </tr>
					    
					    <tr>
					      <td height="20" align="left" valign="top">
						  <?PHP
						   $lval = "1";
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						  {
						  	echo "Sprache";
							$lval = "1";
						  }
						  if($_SESSION["slanguage"] == "2")
						  {
							echo "Language";
							$lval = "2";
						  }
							?> <span class="star">*</span> : </td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="left" valign="top"></td>
                            <td align="left" valign="top"></td>
					    </tr>
					    <tr>
					      <td height="45" colspan="4" align="left" valign="top">
						  <?php
						   $sql_language = $db->getTableArray("select * from language_master where status = 'Y'");
		  					$statevalue = "";
							?>
						  <div id="pg">
						  		<select name="frm_language_0" id="frm_language_0" class="field-location">
								   <option value="" selected="selected">
								   <?PHP
						 			 if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						 			 {
						  				echo "Sprache wählen";
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
										echo "Select a Language";
									  }
									?></option>
					  <?php 
					   
					  for($i=0;$i<count($sql_language);$i++)
					  {
					  	//$statevalue
							if($statevalue == "")
							{
							$statevalue = $sql_language[$i]["language_name"];
							}
							else
							{
							$statevalue = $statevalue.",".$sql_language[$i]["language_name"];
							}
						
					  ?>
					  <option value="<?php echo $sql_language[$i]["language_name"]; ?>" ><?php echo $sql_language[$i]["language_name"]; ?></option>
					  <?php
					  }
					  ?>
					  </select>&nbsp;&nbsp;			 
									  <input type="radio" name="frm_f_0" id="frm_f1_0" value="Native" />
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  	echo "Muttersprache";
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
									  	echo "Native";
									  }
									  ?>
									  &nbsp;
									  <input type="radio" name="frm_f_0" id="frm_f2_0" value="Fluent" />
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  	echo "Verhandlungssicher";
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
									  	echo "Fluent";
									  }
									  ?> &nbsp;
									  <input type="radio" name="frm_f_0" id="frm_f3_0" value="Basic" />
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  	echo "Berufspraxis";
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
									  	echo "Basic";
									  }
									  ?>		
						    </div> 
									  <input type="hidden" value="1" id="theValue" name="theValue" /> </td>
									   <input type="hidden" name="stateload" id="stateload" value="<?PHP echo $statevalue; ?>"  />
                        </tr>
					    <tr>
					     <td height="45" align="left" valign="top">&nbsp;</td>
					      <td align="center" valign="middle">&nbsp;</td>
					      <td align="right" valign="middle">+<a href='javascript:void(0);' onClick="return_pg1('<?PHP echo $lval; ?>');"> 
						   <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						  	{
						  		echo "hinzufügen";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Add more";
							}	
						?>	
						  </a></td>
				          <td align="right" valign="middle">&nbsp;</td>
					    </tr>
						
					    <tr>
					      <td height="22" align="left" valign="middle">
						     <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						  	{
						  		echo "Aufgaben";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Duties";
							}	
						?>	 <span class="star">*</span> : </td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
					    </tr>
					    <tr>
					      <td height="45" colspan="4" align="left" valign="top">
						  <textarea id="responsibility" name="responsibility" rows="5" cols="40" style="width: 50%"></textarea>						  </td>
                        </tr>
					    <tr>
					      <td height="22" align="left" valign="middle">
						  <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						  	{
						  		echo "Fähigkeiten";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Skills";
							}	
						?>	
						   <span class="star">*</span> : </td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
					    </tr>
					    <tr>
					      <td height="45" colspan="4" align="left" valign="top">
						  <textarea id="skillz" name="skillz" rows="5" cols="40" style="width: 50%"></textarea>						  </td>
                        </tr>
					    
<!--					    <tr>
					      <td height="30" align="left" valign="bottom">Job Brief Description : </td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top"></td>
                        </tr>
					    <tr>
					      <td height="45" align="left" valign="top">
						  <textarea name="job_brief" class="field-job-atext" id="job_brief"></textarea>						  </td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top"></td>
                        </tr>
					    
					    
					    <tr>
					      <td height="30" colspan="3" align="left" valign="bottom">Job Detailed Description (Aditional Information) : </td>
                        </tr>
					    <tr>
					      <td height="45" colspan="3" align="left" valign="top">
						  <textarea id="frm_detail_desc" name="frm_detail_desc" rows="15" cols="80" style="width: 80%"></textarea>						  </td>
                        </tr>
-->					   
					    <tr>
					      <td height="22" colspan="4" align="left" valign="middle">
						 <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						  	{
						  		echo "Zusätzliche Bemerkungen";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Additional comments";
							}	
						?>:</td>
                        </tr>
					    <tr>
					      <td height="45" colspan="4" align="left" valign="top">
						  <textarea id="frm_add_com" name="frm_add_com" rows="10" cols="80" style="width: 80%"></textarea>						  </td>
                        </tr>
 <tr>
					      <td height="40" colspan="4" align="left" valign="bottom">
                          <?PHP
						  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						  {
						   ?>
                              <input type="submit" name="frm_submit" id="frm_submit" value="Senden" class="btn-common" />
                           <?PHP
						  }
						  if($_SESSION["slanguage"] == "2")
						  {
						  ?> 
						     <input type="submit" name="frm_submit" id="frm_submit" value="Submit" class="btn-common" />
                          <?PHP
						  }
						  ?>
						  <input id="cid" name="cid" type="hidden" value="<?PHP echo $_SESSION["lid"]; ?>" />						  </td>
                        </tr>
				      </table>
					  </form>
				  </div>
	    </div>
	  </div>
	</div>
   <?PHP include("footer.php");?>
  </div>
</div>
<?PHP include("footer-red.php");?>
</body>
</html>