<?PHP
		include("support/firstline.php");

 
		$job_id = $db->decode64($_REQUEST['jid']);
		
		$cur_date = date("Y-m-d");
		$job_query = $db->fetchSingleRow("select jm.ID,jm.org_id,jm.job_business,jm.job_code,jm.job_title,jm.job_type,jm.job_duration,jm.job_desc,jm.job_salary,jm.job_response,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,jm.cont_purl,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.create_on,jm.created_ip,jm.admin_id,DATE_FORMAT(jm.postedon,'%D %M, %Y') as pdate,cm.ID,cm.comp_name,cm.industry_name,cm.country,cm.state,cm.cont_name,cm.cont_designation,cm.cont_email,cm.company_info from job_details jm, company_details cm where jm.status='Y' and jm.ID = '$job_id' and jm.org_id = cm.ID and cm.status='Y' ");
		//echo "***".$db->last_query;
		//echo $db->last_query;
		if($job_query["ID"] <= 0 && $job_query["ID"] != $job_id)
		{
			die("Invalid job request");
		}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?PHP 
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<title>Bewerben bei KIDSTON - Bewerbungsformular</title>
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<title>Apply at KIDSTON – application form</title>
<?PHP 
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="description" content="Interessieren Sie sich für eine Stelle bei KIDSTON? Bewerben Sie sich!">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="description" content="Are you interested in a job with KIDSTON? Then apply!">
<?PHP 
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="keywords" content="kidston, bewerben, bewerbungsformular">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="keywords" content="kidston, apply, application form">
<?PHP
}
?>
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="<?PHP echo SITE_URL;?>kninc/kn-style.css" rel="stylesheet" type="text/css" />
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<script type="text/javascript" src="inc1ud35/jquery.js"></script>
<script type="text/javascript" src="inc1ud35/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="inc1ud35/validation.js"></script>
<script type="text/javascript" src="calendar/calendar.js"></script>
<link type="text/css" href="new_cal/themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="new_cal/ui/ui.core.js"></script>
	<script type="text/javascript" src="new_cal/ui/ui.datepicker.js"></script>
	<!--<script type="text/javascript" src="kninc/popup.js" language="javascript"></script>-->
	
	<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>

 <script type="text/javascript">
        var GB_ROOT_DIR = "greybox/";
    </script>

    <script type="text/javascript" src="greybox/AJS.js"></script>
    <script type="text/javascript" src="greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="greybox/gb_scripts.js"></script>
    <link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
<!--<script type="text/javascript">{}
	$(function() {
		$("#dob").datepicker({maxDate: '-180M -1D',dateFormat:'dd-mm-yy',showOn: 'button', buttonImage: 'new_cal/themes/calendar.gif', buttonImageOnly: true, changeMonth: true,changeYear: true} );
		
	});
	</script>-->
<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
<style>
			.jqifade{ position: absolute; background-color: #aaaaaa; }
			div.jqi{ width: 600px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; position: absolute; background-color: #ffffff; font-size: 11px; text-align: left; border: solid 1px #eeeeee; -moz-border-radius: 10px; -webkit-border-radius: 10px; padding: 7px; }
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
</head>

<body>
<?PHP include("login.php"); ?>
<div id="bg-home">
  <div id="page-section">
  	<?PHP include("header.php"); ?>
	<div id="inner-mid-section">
	 <div id="inner-band-sec3">
        <div class="top-band-left">
		 <div class="top-band-left-txt3">
		<?PHP 
			if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
			{
		?>
		 <span class="band-orange">Willkommen...</span><br />...im KIDSTON Team</div>
		 <?PHP
		 	}
			if($_SESSION["slanguage"] == "2")
			{
		?>	
          <span class="band-orange">Welcome...</span><br />...to the KIDSTON Team</div>
		  <?PHP
		  	}
			?>
        
        </div>
	    <div class="top-band-right"><img src="<?PHP echo SITE_URL; ?>toppic/15.jpg" height="125" width="475" border="0" /></div>
      </div>
	  <div id="content-box-bg">
		  		<div class="inner-c1">
					<div class="inner-c1-pad">
						
						<?PHP 	$MID="1";
							include("support/left_menu.php"); 
						?>
					
<!--						<div class="inner-menu-red"><a href="#" class="menu-red-link">Submit your Resume</a></div>
-->						<!--<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Career Tips</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Work with kids ton</a></div>-->
					</div>
		  		</div>
				<div class="inner-c2">
					<div class="h1"><a href="<?PHP echo SITE_URL; ?>view-intern.php">
					<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					{
						echo "Interne Stellen";
					}
					if($_SESSION["slanguage"] == "2")
					{
						echo "Intern Jobs";
					}
					?>	</a> &rsaquo;&rsaquo; <a href="<?PHP echo 'intern/'.$job_id.'/'.$db->stringToUrlSlug(html_entity_decode($job_query['job_title'])); ?>"><?PHP echo html_entity_decode($job_query['job_code']); ?> </a> &rsaquo;&rsaquo;
					<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					{
						echo "Bewerben";
					}
					if($_SESSION["slanguage"] == "2")
					{
						echo "Apply";
					}
					?>	</div> 
<!--					<div style="float:right"><a href="<?PHP echo SITE_URL;?>view-latest-openings.php"  class="link-merun">Back</a></div>
-->					<?PHP 
						if($job_query > 0)
						{ // if 
						?>
						<form action="process/intern_apply_save.php" method="post" enctype="multipart/form-data" name="frm_job" id="frm_job" onsubmit="return validation_candidate();">
						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr align="left">
						    <td><?PHP echo $db->errmsg[$db->decode64($_GET["resmsg"])];?></td>
					      </tr>
						  <tr>
						  <td width="350" height="25" align="left" class="smtxt"><strong>
						  <?PHP
						  	if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							echo "Nachname";
						}	
						if($_SESSION["slanguage"] == "2")
						{
							echo "Surname";
						}
						?>	</strong><span class="star">*</span></td>
						<td align="left" width="350" height="25" class="smtxt"><strong>
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							echo "Vorname";
						}	
						if($_SESSION["slanguage"] == "2")
						{
							echo "First name";
						}
						?>	</strong> <span class="star">*</span> </td>
						</tr>
						  <tr>	
						    <td align="left">
								<input type="text" name="subject" id="subject" style="display:none;" />
							  <input name="lname" type="text" class="field-pj" id="lname" /></td>
						    <td align="left"> 
							<input type="text" name="message" id="message" style="display:none;" />
							 <input name="name" type="text" class="field-pj" id="name" /> </td>
						  </tr>
						 				 
						  <tr>
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
						    <td height="25" align="left" class="smtxt"><strong>Geschlecht</strong><span class="star"> *</span></td>	
						<?PHP
						}
						if($_SESSION["slanguage"] == "2")
						{
						?>			
						    <td height="25" align="left" class="smtxt"><strong>Gender</strong><span class="star"> *</span></td>						    					
						    <?PHP
						}
						?>			
					      </tr>
						  <tr align="left">
						    
					        <td><input name="r1" id="m" type="radio" value="Male" />
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
					          männlich 
						<?PHP
						}
						if($_SESSION["slanguage"] == "2")
						{
						?>	Male
						<?PHP
						}
						?>		  
				         <input name="r1" id="f" type="radio" value="Female" />
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> weiblich
						<?PHP
						}
						if($_SESSION["slanguage"] == "2")
						{
						?>Female
						<?PHP
						}
						?>	
						</td>
						  </tr>
						   <tr>
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
						    <td height="25" align="left" class="smtxt"><strong>Adresse </strong><span class="star">*</span></td>	
						 <?PHP
						 }
						if($_SESSION["slanguage"] == "2")
						{
						?> 		
						    <td height="25" align="left" class="smtxt"><strong>Address</strong><span class="star">*</span></td>			
						<?PHP
						}
						?>
							</tr>
						  <tr align="left">						    
						    <td><textarea name="address" class="field-pj" id="address"></textarea></td>
					      </tr>
						  <tr>
						 <?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
						  <td height="25" align="left" class="smtxt"><strong>Ort Land</strong><span class="star">*</span></td>
						  <td height="25" align="left" class="smtxt"><strong>Kanton </strong><span class="star">*</span></td>
						<?PHP
						 }
						if($_SESSION["slanguage"] == "2")
						{
						?> 		
						  <td height="25" class="smtxt"><strong>Country</strong><span class="star">*</span></td>
						  <td ><strong>Canton</strong><span class="star">*</span></td>
						 <?PHP
						}
						?>
					      </tr>
						  <tr>
						   <td width="350" height="25" align="left" class="smtxt">
			<select id='countrySelect' name='countrySelect' class="field-location">
			 <?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
				<option value="">Land wählen</option>
				<?PHP
						 }
						if($_SESSION["slanguage"] == "2")
						{
						?> 	
					<option value="">Select Country</option>
				<?PHP
				}
				?>
				<option Value="Afghanistan">Afghanistan</option> 
				<option Value="Albania">Albania</option> 
				<option Value="Algeria">Algeria</option> 
				<option Value="American Samoa">American Samoa</option> 
				<option Value="Andorra">Andorra</option> 
				<option Value="Angola">Angola</option> 
				<option Value="Anguilla">Anguilla</option> 
				<option Value="Antarctica">Antarctica</option> 
				<option Value="Antigua And Barbuda">Antigua And Barbuda</option> 
				<option Value="Argentina">Argentina</option> 
				<option Value="Armenia">Armenia</option> 
				<option Value="Aruba">Aruba</option> 
				<option Value="Australia">Australia</option> 
				<option Value="Austria">Austria</option> 
				<option Value="Azerbaijan">Azerbaijan</option> 
				<option Value="Bahamas">Bahamas</option> 
				<option Value="Bahrain">Bahrain</option> 
				<option Value="Bangladesh">Bangladesh</option> 
				<option Value="Barbados">Barbados</option> 
				<option Value="Belarus">Belarus</option> 
				<option Value="Belgium">Belgium</option> 
				<option Value="Belize">Belize</option> 
				<option Value="Benin">Benin</option> 
				<option Value="Bermuda">Bermuda</option> 
				<option Value="Bhutan">Bhutan</option> 
				<option Value="Bolivia">Bolivia</option> 
				<option Value="Bosnia And Herzegowina">Bosnia And Herzegowina</option> 
				<option Value="Botswana">Botswana</option> 
				<option Value="Bouvet Island">Bouvet Island</option> 
				<option Value="Brazil">Brazil</option> 
				<option Value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
				<option Value="Brunei Darussalam">Brunei Darussalam</option> 
				<option Value="Bulgaria">Bulgaria</option> 
				<option Value="Burkina Faso">Burkina Faso</option> 
				<option Value="Burundi">Burundi</option> 
				<option Value="Cambodia">Cambodia</option> 
				<option Value="Cameroon">Cameroon</option> 
				<option Value="Canada">Canada</option> 
				<option Value="Cape Verde">Cape Verde</option> 
				<option Value="Cayman Islands">Cayman Islands</option> 
				<option Value="Central African Republic">Central African Republic</option> 
				<option Value="Chad">Chad</option> 
				<option Value="Chile">Chile</option> 
				<option Value="China">China</option> 
				<option Value="Colombia">Colombia</option> 
				<option Value="Congo">Congo</option> 
				<option Value="Cuba">Cuba</option> 
				<option Value="Cyprus">Cyprus</option> 
				<option Value="Denmark">Denmark</option> 
				<option Value="Egypt">Egypt</option> 
				<option Value="Estonia">Estonia</option> 
				<option Value="Ethiopia">Ethiopia</option> 
				<option Value="Finland">Finland</option> 
				<option Value="France">France</option> 
				<option Value="French Guiana">French Guiana</option> 
				<option Value="French Polynesia">French Polynesia</option> 
				<option Value="Georgia">Georgia</option> 
				<option Value="Germany">Germany</option> 
				<option Value="Ghana">Ghana</option> 
				<option Value="Greenland">Greenland</option> 
				<option Value="Guinea">Guinea</option> 
				<option Value="Guyana">Guyana</option> 
				<option Value="Haiti">Haiti</option> 
				<option Value="Honduras">Honduras</option> 
				<option Value="Hong Kong">Hong Kong</option> 
				<option Value="Hungary">Hungary</option> 
				<option Value="India">India</option> 
				<option Value="Indonesia">Indonesia</option> 
				<option Value="Iran">Iran</option> 
				<option Value="Iraq">Iraq</option> 
				<option Value="Ireland">Ireland</option> 
				<option Value="Israel">Israel</option> 
				<option Value="Italy">Italy</option> 
				<option Value="Jamaica">Jamaica</option> 
				<option Value="Japan">Japan</option> 
				<option Value="Jordan">Jordan</option> 
				<option Value="Kazakhstan">Kazakhstan</option> 
				<option Value="Kenya">Kenya</option> 
				<option Value="Kiribati">Kiribati</option> 
				<option Value="Korea">Korea</option> 
				<option Value="Kuwait">Kuwait</option> 
				<option Value="Latvia">Latvia</option> 
				<option Value="Lebanon">Lebanon</option> 
				<option Value="Lesotho">Lesotho</option> 
				<option Value="Liberia">Liberia</option> 
				<option Value="Lithuania">Lithuania</option> 
				<option Value="Luxembourg">Luxembourg</option> 
				<option Value="Macau">Macau</option> 
				<option Value="Macedonia">Macedonia</option> 
				<option Value="Madagascar">Madagascar</option> 
				<option Value="Malawi">Malawi</option> 
				<option Value="Malaysia">Malaysia</option> 
				<option Value="Maldives">Maldives</option> 
				<option Value="Mali">Mali</option> 
				<option Value="Malta">Malta</option> 
				<option Value="Martinique">Martinique</option> 
				<option Value="Mauritania">Mauritania</option> 
				<option Value="Mauritius">Mauritius</option> 
				<option Value="Mayotte">Mayotte</option> 
				<option Value="Mexico">Mexico</option> 
				<option Value="Monaco">Monaco</option> 
				<option Value="Mongolia">Mongolia</option> 
				<option Value="Montserrat">Montserrat</option> 
				<option Value="Morocco">Morocco</option> 
				<option Value="Mozambique">Mozambique</option> 
				<option Value="Myanmar">Myanmar</option> 
				<option Value="Namibia">Namibia</option> 
				<option Value="Nauru">Nauru</option> 
				<option Value="Nepal">Nepal</option> 
				<option Value="Netherlands">Netherlands</option> 
				<option Value="New Caledonia">New Caledonia</option> 
				<option Value="New Zealand">New Zealand</option> 
				<option Value="Nicaragua">Nicaragua</option> 
				<option Value="Niger">Niger</option> 
				<option Value="Nigeria">Nigeria</option> 
				<option Value="Niue">Niue</option> 
				<option Value="Norfolk Island">Norfolk Island</option> 
				<option Value="Norway">Norway</option> 
				<option Value="Oman">Oman</option> 
				<option Value="Pakistan">Pakistan</option> 
				<option Value="Palau">Palau</option> 
				<option Value="Panama">Panama</option> 
				<option Value="Papua New Guinea">Papua New Guinea</option> 
				<option Value="Paraguay">Paraguay</option> 
				<option Value="Peru">Peru</option> 
				<option Value="Philippines">Philippines</option> 
				<option Value="Pitcairn">Pitcairn</option> 
				<option Value="Poland">Poland</option> 
				<option Value="Portugal">Portugal</option> 
				<option Value="Puerto Rico">Puerto Rico</option> 
				<option Value="Qatar">Qatar</option> 
				<option Value="Reunion">Reunion</option> 
				<option Value="Romania">Romania</option> 
				<option Value="Russian Federation">Russian Federation</option> 
				<option Value="Rwanda">Rwanda</option> 
				<option Value="Saint Lucia">Saint Lucia</option> 
				<option Value="Samoa">Samoa</option> 
				<option Value="San Marino">San Marino</option> 
				<option Value="Saudi Arabia">Saudi Arabia</option> 
				<option Value="Senegal">Senegal</option> 
				<option Value="Seychelles">Seychelles</option> 
				<option Value="Sierra Leone">Sierra Leone</option> 
				<option Value="Singapore">Singapore</option> 
				<option Value="Slovenia">Slovenia</option> 
				<option Value="Solomon Islands">Solomon Islands</option> 
				<option Value="Somalia">Somalia</option> 
				<option Value="South Africa">South Africa</option> 
				<option Value="Spain">Spain</option> 
				<option Value="Sri Lanka">Sri Lanka</option> 
				<option Value="Sudan">Sudan</option> 
				<option Value="Sw Aziland">Sw Aziland</option> 
				<option Value="Sweden">Sweden</option> 
				<option Value="Switzerland">Switzerland</option> 
				<option Value="Syrian Arab Republic">Syrian Arab Republic</option> 
				<option Value="Taiwan">Taiwan</option> 
				<option Value="Tajikistan">Tajikistan</option> 
				<option Value="Thailand">Thailand</option> 
				<option Value="Tonga">Tonga</option> 
				<option Value="Trinidad And Tobago">Trinidad And Tobago</option> 
				<option Value="Tunisia">Tunisia</option> 
				<option Value="Turkey">Turkey</option> 
				<option Value="Uganda">Uganda</option> 
				<option Value="Ukraine">Ukraine</option> 
				<option Value="United Arab Emirates">United Arab Emirates</option> 
				<option Value="United Kingdom">United Kingdom</option> 
				<option Value="United States">United States</option> 
				<option Value="Uruguay">Uruguay</option> 
				<option Value="Uzbekistan">Uzbekistan</option> 
				<option Value="Vanuatu">Vanuatu</option> 
				<option Value="Venezuela">Venezuela</option> 
				<option Value="Viet Nam">Viet Nam</option> 
				<option Value="Wallis And Futuna Islands">Wallis And Futuna Islands</option> 
				<option Value="Western Sahara">Western Sahara</option> 
				<option Value="Yemen">Yemen</option> 
				<option Value="Yugoslavia">Yugoslavia</option> 
				<option Value="Zaire">Zaire</option> 
				<option Value="Zambia">Zambia</option> 
				<option Value="Zimbabwe">Zimbabwe</option> 
			</select>  </td>
			
            <td align="left">             
				<input type="text" name="stateSelect" id="stateSelect" class="field-pj" maxlength="50" value="<?PHP echo $edit_state; ?>" />
                          <script type="text/javascript">
  //document.getElementById('stateSelect').value="<?PHP //echo $edit_state; ?>"; </script>
  <script language="javascript">document.getElementById("countrySelect").value = "<?PHP echo html_entity_decode($edit_country); ?>"</script></td>
					      </tr> 
						   <tr>
						  <?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
						{
						?> 
						    <td height="25" align="left" class="smtxt"><strong>Email</strong> <span class="star">*</span></td>
						<?PHP
						 }
						if($_SESSION["slanguage"] == "2")
						{
						?> 	
							<td height="25" align="left" class="smtxt"><strong>Email</strong> <span class="star">*</span></td>
						<?PHP
						}
						?>	
					      </tr>
						  <tr align="left">
						    <td><input name="cont_pemail" type="text" class="field-pj" id="cont_pemail" /></td>
					      </tr> 
						   <tr>
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
						    <td height="25" align="left" class="smtxt"><strong>Kontaktnummer</strong> <span class="star">*</span></td>
						<?PHP
						 }
						if($_SESSION["slanguage"] == "2")
						{
						?> 		
							<td height="25" align="left" class="smtxt"><strong>Contact number</strong> <span class="star">*</span></td>
						<?PHP
						}
						?>		
					      </tr>
						  <tr align="left">
						    <td><input name="cont_no" type="text" class="field-pj" id="cont_no" onkeypress="return num_only(event);" /></td>
					      </tr> 
						 	  <tr>
						  <?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
						    <td height="25" align="left" class="smtxt"><strong>Geburtsdatum</strong> </td>		
						<?PHP
						}
						if($_SESSION["slanguage"] == "2")
						{
						?>	
							<td height="25" align="left" class="smtxt"><strong>Date of birth</strong> </td>			
						<?PHP
						}
						?>					    
				          </tr>
						  <tr align="left">						    
						    <td>
							<input type="text" id="dob" name="dob" class="field-pj" maxlength="50"/>&nbsp;<span class="smtxt">[dd/mm/yyyy]</span></td>
					      </tr> 
						  <tr>
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
						    <td height="25" align="left" class="smtxt"><strong>Ausbildung</strong><span class="star"> *</span></td>	
						<?PHP
						}
						if($_SESSION["slanguage"] == "2")
						{
						?>
							<td height="25" align="left" class="smtxt"><strong>Education</strong><span class="star"> *</span></td>		
						<?PHP
						}
						?>	
						 </tr>
						  <tr align="left">
						    <td height="30" class="bl-text"><input name="qualification" type="text" class="field-pj" id="qualification"/></td>
					      </tr>
						  <tr>
					       <td height="25" align="left" class="smtxt"><strong>
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
							?></strong>
						   <span class="star">*</span> </td>
                            <td align="left">&nbsp;</td>
                      </tr>
						 <tr align="left">
					      <td height="35" class="smtxt" colspan="2">
						   <?php
						   $sql_language = $db->getTableArray("select * from language_master where status = 'Y'");
		  					$statevalue = "";
							?>
						  <div id="pg">
						  
						   		<select name="frm_language_0" id="frm_language_0" class="field-location" >
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
							?>
							</option>
					  <?php 
					  for($i=0;$i<count($sql_language);$i++)
	  					{
							if($statevalue == "")
							{
							$statevalue = $sql_language[$i]["language_name"];
							}
							else
							{
							$statevalue = $statevalue.",".$sql_language[$i]["language_name"];
							}
						?>
					<option value="<?PHP echo $sql_language[$i]["language_name"]; ?>" > <?php echo $sql_language[$i]["language_name"]; ?></option>
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
									  ?>	 &nbsp;
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
									  ?>	</div>
								  <input type="hidden" value="1" id="theValue" name="theValue" />
						  </td>
						   <input type="hidden" name="stateload" id="stateload" value="<?PHP echo $statevalue; ?>"  />
                      </tr>
					  
					  <tr>
					      <td align="left" >&nbsp;</td>
					      
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
						   <td >&nbsp;</td>
				        </tr>						 
						 
<!--						  <tr>
						    <td height="35" class="bl-text">Postalcode</td>
					      </tr>
						  <tr>
						    <td><input name="pincode" type="text" class="field-job" id="pincode" onkeypress="return num_only(event);" /></td>
					      </tr>
-->							
						 <tr>
						 <?PHP
						 if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						 {
						 ?>
						 <td height="25" align="left" class="smtxt"><strong>Wo haben Sie diese Stelle gesehen?</strong><span class="star"> *</span>  </td> 
						 
						 <?PHP
						 }
						 if($_SESSION["slanguage"] == "2")
						 {
						 ?>
						  <td height="25" align="left" class="smtxt"><strong>Where did you hear about this</strong><span class="star"> *</span></td>	
						 	
						  <?PHP
						  }
						  ?>					    
					      </tr>
						   <tr align="left">
						    <td height="25" class="bl-text"> 
							<select name="frm_reference" id="frm_reference" class="field-location" >
							<option value="" selected="selected">Plattform wählen</option>
						  <?PHP
						   $sql_platform = $db->getTableArray("select * from platform_master where status = 'Y' order by platform_name");
						   for($i=0;$i<count($sql_platform);$i++)
							{
							?>
						<option value="<?PHP echo $sql_platform[$i]["platform_name"]; ?>" > <?php echo $sql_platform[$i]["platform_name"]; ?></option>
						<?PHP
						}
						?>
						  </select>
						</td>
						
					      </tr>
						  <tr>
						 <?PHP
						 if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						 {
						 ?>
						 <td height="25" align="left" class="smtxt"><strong>oder</strong></td> 
						  <?PHP
						 }
						 if($_SESSION["slanguage"] == "2")
						 {
						 ?>
						  <td height="25" align="left" class="smtxt"><strong>or</strong></td>	
						  <?PHP
						  }
						  ?>					    
					      </tr>
						 <tr>
						 <?PHP
						 if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						 {
						 ?>
						 <td height="25" align="left" class="smtxt"><strong>Wer hat Ihnen diese Stelle empfohlen?</strong></td> 
						  <?PHP
						 }
						 if($_SESSION["slanguage"] == "2")
						 {
						 ?>
						  <td height="25" align="left" class="smtxt"><strong>Refered By</strong></td>	
						  <?PHP
						  }
						  ?>					    
					      </tr>
						  <tr>
						  <td height="35" align="left" class="smtxt">Name : <input type="text" name="frm_reference_name" id="frm_reference_name" value="" class="field-pj"/></td>	
						 	 <td height="35" align="left" class="smtxt">Email : <input type="text" name="frm_reference_email" id="frm_reference_email" value="" class="field-pj"/></td>					    
					      </tr>				
						  <tr>
						   <?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
						    <td height="35" colspan="2" align="left" class="bl-text"><strong>Hinzufügen der Bewerbungsunterlagen</strong> <span class="smtxt-g">[ DOC | DOCX | PDF | JPEG ] [Sie können max. 3 Dateien einreichen. Dateinamen dürfen keinen "." und "," enthalten]</span> </td>
						<?PHP
						 }
						if($_SESSION["slanguage"] == "2")
						{
						?> 		
							<td height="35" colspan="2" class="bl-text"><strong>Attach application documents</strong> <span class="smtxt-g">[ DOC | DOCX | PDF | JPEG ] [You can submit a max. of three documents. Document names must not contain «.» and «,»]</span> </td>
						<?PHP
						}
						?>	
					      </tr>
						  <tr align="left">
						    <td><input name="upfile" type="file" id="upfile" /></td>
					      </tr>
						  <tr align="left">
						    <td><input name="upfile2" type="file" id="upfile2" /></td>
					      </tr>
						  <tr align="left">
						    <td><input name="upfile3" type="file" id="upfile3" /></td>
					      </tr>
						 <tr>
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
						    <td height="30" align="left">
							<input name="chk_agree" type="checkbox" id="chk_agree" value="Y" /> 
							<span class="smtxt"><span class="star">*</span></span> 
			<!--				<a href="javascript:void(0)" onclick="window.open('job_agree.php','','width=1015,height=450,scrollbars=yes,status=yes')">-->
							<a rel="gb_page_center[820,615]" href="job_agree.php">
						   Ich bin mit der Datenschutzvereinbarung einverstanden</a></td>
						<?PHP
						 }
						if($_SESSION["slanguage"] == "2")
						{
						?> 	
							<td height="30">
							<input name="chk_agree" type="checkbox" id="chk_agree" value="Y" /> 
							<span class="smtxt"><span class="star">*</span></span> 
							<!--<a href="javascript:void(0)" onclick="window.open('job_agree.php','','width=1015,height=450,scrollbars=yes,status=yes')">-->
							<a rel="gb_page_center[820,615]" href="job_agree.php">
							I consent to the data protection declaration</a></td>
							<?PHP
							}
							?>
					      </tr>
						  <tr>
						  <?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
						?> 
						    <td height="35" align="left"><input name="frm_submit" type="submit" class="btn-common" id="frm_submit" value="Bewerben" />
					        <input name="job_id" type="hidden" id="job_id" value="<?PHP echo $db->decode64($_REQUEST['jid']); ?>" /></td>
						<?PHP
						}
						if($_SESSION["slanguage"] == "2")
						{
						?>
							 <td height="35"><input name="frm_submit" type="submit" class="btn-common" id="frm_submit" value="Submit" />
					        <input name="job_id" type="hidden" id="job_id" value="<?PHP echo $db->decode64($_REQUEST['jid']); ?>" /></td>
							<?PHP
							}
							?>
					      </tr>
					   </table>	
			      </form>	
				  <?PHP } else {?>
				  	<script language="javascript">window.location = "view-intern.php";</script>
				  <?PHP } ?>			
                </div>			

	  </div>
	</div>
    <?PHP include("footer.php");?>
  </div>
</div>
<?PHP include("footer-red.php");?>
</body>
</html>