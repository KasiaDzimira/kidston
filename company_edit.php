<?PHP
		include("support/firstline.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="kninc/kn-style.css" rel="stylesheet" type="text/css" />
<script src="kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="kninc/jquery.js"></script>
<script type="text/javascript" src="kninc/menu.js"></script>
<script type="text/javascript" src="kninc/jquery-impromptu.2.7.min.js"></script>
<!--<script type="text/javascript" src="kninc/popup.js" language="javascript"></script>-->
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>

<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>


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



<!-- TinyMCE -->
<script type="text/javascript" src="admin/admin_includes/tiny/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
		//elements : "frm_short_desc,frm_detail_desc",
		elements : "frm_detail_desc,responsibility,skillz",
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
	  <div id="inner-band-sec">
        <div class="top-band-left">
          <div class="top-band-left-txt">Search for opening jobs<br />
              <span class="band-orange">your chance</span></div>
        </div>
	    <div class="top-band-right"><img src="<?PHP echo SITE_URL; ?>toppic/top-band10.jpg" height="125" width="475" border="0" /></div>
      </div>
	  <div id="content-box-bg">
		  		<div class="inner-c1">
					<div class="inner-c1-pad">
						<div class="inner-menu-red"><a href="#" class="menu-red-link">Search jobs</a></div>
						<div class="inner-menu-red"><a href="#" class="menu-red-link">Submit your Resume</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Career Tips</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Work with kids ton</a></div>
					</div>
		  		</div>
				<div class="inner-c2">
					<div class="h1">Company Details</div>
					<div class="frm-content-area" >
                      <!--
					 		Company Informations...
					 -->
					 <?PHP 
					 		echo $id = $_SESSION['lid'];
							if($id!="")
							{ // company id 
								$comp = $db->fetchSingleRow("select ID,comp_name,industry_name,country,state,cont_name,cont_designation,cont_email,cont_phone,company_info,address1,website_url from company_details where ID='$id'");
								$comp_name = html_entity_decode($comp['comp_name']);
								$industry_name = html_entity_decode($comp['industry_name']);
								$country = html_entity_decode($comp['country']);
								$state = html_entity_decode($comp['state']);
								$cont_designation = html_entity_decode($comp['cont_designation']);
								$cont_phone = html_entity_decode($comp['cont_phone']);
								$company_info = html_entity_decode($comp['company_info']);
								$address1 = html_entity_decode($comp['address1']);
								$website_url = html_entity_decode($comp['website_url']);
								
							} // company id
					 ?>
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
					<form name="frm_post" id="frm_post" action="action/{save_job}/<?PHP echo base64_encode(rand(1000,50000)); ?>" method="post" onsubmit="return job_validation(this);" >
				      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="280" height="25" align="left" valign="top">Company Name <span class="star">*</span> :</td>
                          <td width="30" align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top">Business Line <span class="star">*</span> : </td>
                        </tr>
                        <tr>
                          <td height="45" align="left" valign="top">
						  <p class="dnd">
						  <input type="text" name="subnject" id="subject" value="" />
						  <textarea name="message" id="message"></textarea>
						  </p>
						  <input name="com_name" id="com_name" type="text" class="field-job" maxlength="100" value="<?PHP echo  $comp_name;?>" /></td>
                          <td align="center" valign="top"></td>
                          <td align="left" valign="top"><input type="text" name="indu_name" id="indu_name" class="field-job" maxlength="250" value="<?PHP echo  $industry_name;?>"/></td>
                        </tr>
				        <tr>
				          <td width="280" height="25" align="left" valign="top">Location - Country <span class="star">*</span>   : </td>
                          <td width="30" align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top">State : </td>
                        </tr>
				        <tr>
				          <td height="45" align="left" valign="top">
						  <select id='countrySelect' name='countrySelect' class="field-job-drp">
				<option value="">Select Country</option>
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
			</select>						  </td>
                          <td align="center" valign="top">/</td>
                          <td align="left" valign="top"><input type="text" name="stateSelect" id="stateSelect" class="field-job" maxlength="50" value="<?PHP echo $state; ?>" /></td>
                        </tr>
				        <tr>
				          <td width="280" height="25" align="left" valign="top">Contact Person Name <span class="star">*</span> : </td>
                          <td width="30" align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top">Contact Person Designation <span class="star">*</span>  :</td>
                        </tr>
				        <tr>
				          <td height="45" align="left" valign="top"><input name="cont_pname" type="text" class="field-job" id="cont_pname" maxlength="75" /></td>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top"><input name="cont_pdesign" type="text" class="field-job" id="cont_pdesign" maxlength="200" /></td>
                        </tr>
				        <tr>
				          <td width="280" height="25" align="left" valign="top">Contact Person Email <span class="star">*</span> : </td>
                          <td width="30" align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top">Contact Person Phone <span class="star">*</span> :</td>
                        </tr>
				        <tr>
				          <td height="45" align="left" valign="top">
						  <input name="cont_pemail" type="text" class="field-job" id="cont_pemail" maxlength="200" />						  </td>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top"><input name="cont_phone" type="text" class="field-job" id="cont_phone" onkeypress="return num_only(event);" maxlength="25" /></td>
                        </tr>
				        <tr>
				          <td width="280" height="25" align="left" valign="top">Company Information <span class="star">*</span> : </td>
                          <td width="30" align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top">Company Address <span class="star">*</span> :</td>
                        </tr>
				        <tr>
				          <td height="45" align="left" valign="top">
						  <textarea name="company_info" id="company_info" class="field-job-atext"></textarea>						  </td>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top"><textarea name="address1" class="field-job-atext" id="address1"></textarea></td>
                        </tr>
				        <tr>
				          <td width="280" height="35" align="left" valign="middle">Website URL : </td>
                          <td width="30" align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top"></td>
                        </tr>
				        <tr>
				          <td height="45" align="left" valign="top"><input name="web_url" type="text" class="field-job" id="web_url" value="<?PHP echo $edit_website_url;?>" maxlength="150" /></td>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top">&nbsp;</td>
                        </tr>
				        <tr>
				          <td align="left" valign="top"><input type="submit" name="frm_submit" id="frm_submit" value="Save" class="btn-common" /></td>
				          <td align="left" valign="top">&nbsp;</td>
				          <td align="left" valign="top">&nbsp;</td>
			            </tr>
		              </table>
					  <!--
					 		Company Informations end...
					 -->
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