<?PHP
		include("support/firstline.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>World leading Team from KIDSTON – application form</title>
<meta name="description" content="Are you interested in a job with KIDSTON? Then apply!">
<meta name="keywords" content="kidston, apply, application form">
<link rel="shortcut icon" href="<?PHP echo SITE_URL;?>knpic/favicon.ico" type="image/x-icon" />
<link href="<?PHP echo SITE_URL;?>inc1ud35/layout.css" rel="stylesheet" type="text/css" />
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>calendar/calendar.js"></script>
<link type="text/css" href="<?PHP echo SITE_URL;?>new_cal/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?PHP echo SITE_URL;?>new_cal/ui/ui.core.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>new_cal/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/popup.js" language="javascript"></script>
<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/script.js"></script>
<!--<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>-->
<!--Font decrease-->
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
.jqifade {
	position: absolute;
	background-color: #aaaaaa;
}
div.jqi {
	width: 600px;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	position: absolute;
	background-color: #ffffff;
	font-size: 11px;
	text-align: left;
	border: solid 1px #eeeeee;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	padding: 7px;
}
div.jqi .jqicontainer {
	font-weight: bold;
}
div.jqi .jqiclose {
	position: absolute;
	top: 4px;
	right: -2px;
	width: 18px;
	cursor: default;
	color: #bbbbbb;
	font-weight: bold;
}
div.jqi .jqimessage {
	padding: 10px;
	line-height: 20px;
	color: #444444;
}
div.jqi .jqibuttons {
	text-align: right;
	padding: 5px 0 5px 0;
	border: solid 1px #eeeeee;
	background-color: #f4f4f4;
}
div.jqi button {
	padding: 3px 10px;
	margin: 0 10px;
	background-color: #2F6073;
	border: solid 1px #f4f4f4;
	color: #ffffff;
	font-weight: bold;
	font-size: 12px;
}
div.jqi button:hover {
	background-color: #728A8C;
}
div.jqi button.jqidefaultbutton {
	background-color: #BF5E26;
}
.jqiwarning .jqi .jqibuttons {
	background-color: #BF5E26;
}
</style>
<script type="text/javascript">
        var GB_ROOT_DIR = "greybox/";
    </script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="inner-bg">
  <div id="foot-sec-home">
    <div id="ind-page-section">
      <div id="ind-align">
			<div id="top-align">
			<div id="top-banner-align">
        <?PHP include("header_n.php"); ?>
        <div id="ind-banner-sec">
          <div id="inner-banner">
            <div id="ind-banner-logo"><a href="<?PHP echo SITE_URL;?>index.php?src=home"></a></div>
            <div id="inner-box-sec"> <span class="inner-top-ban-text">The right job,<br />
              right in front of you!</span></div>
            <div id="grey-box-sec">
              <div id="tab-box-bg">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  
                  <td align="left" valign="top">
                  
                  <div class="grey-box-c1">
                    <div class="grey-box-txt">
                      <div class="home-tab-sec">
                        <div class="home-tab-r1">
                          <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="280" align="left" valign="middle"><span class="tab-menu-sel">Join Our Talent Network</span></td>
                              <td width="1"></td>
                            </tr>
                          </table>
                        </div>
                        <div id="candidate">
                          <div class="home-tab-r2" >
                            <div class="home-tab-txt">
                              <div class="tab-text-content">
                                <div class="inn-tab-text-cont-left-detail">
                                  <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td height="25"><strong>What is the KIDSTON Talent Network?</strong></td>
                                    </tr>
                                    <tr>
                                      <td height="35" align="left" valign="top"> Signing up for the Talent Network allows you to receive customized job offers from our Recruiters.</td>
                                    </tr>
                                    <tr>
                                      <td height="25"><strong>Is my information confidential?</strong></td>
                                    </tr>
                                    <tr>
                                      <td height="25"> Yes! KIDSTON adheres to strict privacy regulations. We will not share your information with anyone.</td>
                                    </tr>
                                                                        <tr>
                                      <td height="15">&nbsp;</td>
                                    </tr>

                                    <tr>
                                      <td>
                                      <form action="process/job_apply_save.php" method="post" enctype="multipart/form-data" name="frm_job" id="frm_job" onsubmit="return validation_candidate();">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr align="left">
                                            <td><?PHP echo $db->errmsg[$db->decode64($_GET["resmsg"])];?></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td width="350" height="25" class="smtxt"><strong>Surname</strong><span class="star"> *</span></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40"><input type="text" name="subject" id="subject" style="display:none;" />
                                              <input name="lname" type="text" class="field-pj" id="lname" /></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td width="350"><strong>First name"<span class="star"> *</span></strong></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40"><input type="text" name="message" id="message" style="display:none;" />
                                              <input name="name" type="text" class="field-pj" id="name" /></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="25" class="smtxt"><strong>Gender</strong><span class="star"> *</span></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40"><input name="r1" id="m" type="radio" value="Male" />
                                              Male
                                              <input name="r1" id="f" type="radio" value="Female" />
                                              Female</td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="25" class="smtxt"><strong>Address</strong><span class="star"> *</span></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td><textarea name="address" class="field-pj" id="address"></textarea></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td class="smtxt">&nbsp;</td>
  </tr>
                                          <tr align="left" valign="top">
                                            <td height="25" class="smtxt"><strong>Country</strong><span class="star"> *</span></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40" class="smtxt"><select id='countrySelect' name='countrySelect' class="field-location">
                                                <option value="">Select Country</option>
                                                <option Value="Switzerland">Switzerland</option>
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
                                              </select></td>
  <tr align="left" valign="top">
    <td height="25" class="smtxt"><strong>Email</strong><span class="star"> *</span></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40"><input name="cont_pemail" type="text" class="field-pj" id="cont_pemail" /></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="25" class="smtxt"><strong>Contact number</strong><span class="star"> *</span></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40"><input name="cont_no" type="text" class="field-pj" id="cont_no" onKeyPress="return num_only(event);" /></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="25" class="smtxt"><strong>Date of birth</strong></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40"><input type="text" id="dob" name="dob" class="field-pj" maxlength="50"/>
                                              &nbsp;<span class="smtxt">[dd/mm/yyyy]</span></td>
                                          </tr>
                                          <tr>
                                            <td height="25" align="left" valign="top" class="smtxt"><strong><?PHP echo "Language"; $lval = "2"; ?></strong> <span class="star">*</span></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="35" class="smtxt">
											<?php
						   $sql_language = $db->getTableArray("select * from language_master where status = 'Y' order by language_name");
		  					$statevalue = "";
							?>
                                              <div id="pg">
                                                <select name="frm_language_0" id="frm_language_0" class="field-location" >
                                                  <option value="" selected="selected">Select a Language</option>
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
                                                </select>
                                                &nbsp;&nbsp;
                                                <input type="radio" name="frm_f_0" id="frm_f1_0" value="Native" />
                                                Native &nbsp;
                                                <input type="radio" name="frm_f_0" id="frm_f2_0" value="Fluent" />
                                                Fluent &nbsp;
                                                <input type="radio" name="frm_f_0" id="frm_f3_0" value="Basic" />
                                                Basic </div>
                                              <input type="hidden" value="1" id="theValue" name="theValue" /></td>
                                            <input type="hidden" name="stateload" id="stateload" value="<?PHP echo $statevalue; ?>"  />
                                          </tr>
                                          <tr>
                                            <td height="35" colspan="2" align="left" valign="top" >+<a href='javascript:void(0);' onClick="return_pg1('<?PHP echo $lval; ?>');"> Add more</a></td>
                                          </tr>
                                          
                                          <tr align="left" valign="top">
                                            <td height="45" class="bl-text"><strong>Attach application documents</strong> <span class="smtxt-g">[ DOC | DOCX | PDF | JPEG ]<br />
[You can submit a max. of three documents. Document names must not contain «.» and «,»]</span></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40"><input name="upfile" type="file" id="upfile" /></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40"><input name="upfile2" type="file" id="upfile2" /></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40"><input name="upfile3" type="file" id="upfile3" /></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="40" colspan="2"><input name="chk_agree" type="checkbox" id="chk_agree" value="Y" />
                                              <span class="star">* </span> <a href="javascript:void(0);" onclick="new_txt();"> I consent to the data protection declaration</a></td>
                                          </tr>
                                          <tr align="left" valign="top">
                                            <td height="35">
                                            <input type="hidden" name="wlteam" id="wlteam" value="Y" />
                                            <input name="frm_submit" type="submit" class="btn-common" id="frm_submit" value="Submit" />
                                              <input name="job_id" type="hidden" id="job_id" value="<?PHP echo $db->decode64($_GET['jid']);?>" /></td>
                                          </tr>
                                        </table>
                                    </form>
                                      </td>
                                      </tr>
                                    
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </td>
                  
                  </tr>
                  
                </table>
              </div>
            </div>
          </div>
        </div></div></div>
        <div class="ind-footer"> Copyright ©
          <script language="javascript" type="text/javascript">
var now = new Date();
var d = now.getFullYear();
document.write(d);
	    </script>
          KIDSTON. All rights reserved. </div>
      </div>
    </div>
  </div>
</div>
<script language="javascript" type="text/javascript">
function new_txt()
{ 
msg ="<table><tr><td><div class='h1'><blockquote><blockquote><p>Applying online at KIDSTON</blockquote></blockquote></div> <strong>Data protection declaration</strong><br /><br />KIDSTON requires your consent to processing of your application documents, to forwarding them to customers and to obtaining employment references. We guarantee you absolute confidentiality when handling your personal data.<br /><br />With confirmation of the data protection declaration KIDSTON reassures you that:<br /><div  class='bullet2'>Your file will only be sent to companies with your consent</div><div  class='bullet2'>You have the option of withdrawing your consent at any time. You can do this by email or by letter to Kidston</div><div  class='bullet2'> Your personal data will be handled with absolute confidentiality </div><br />By selecting the field &quot;I consent to the data protection declaration&quot;:<br /><div  class='bullet2'>I confirm that I am the person entitled to the data given in the application</div><div  class='bullet2'>I permit KIDSTON to process my data and communicate it to suitable customers for potential employment (your consent will be requested each time before it is passed on)</div><div  class='bullet2'>I agree with the content of the declaration</div></td></tr></table>";
                        if(msg != "")
                        {
                        prmt(msg);
                        }
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43390285-1', 'kidston.ch');
  ga('send', 'pageview');

</script></body>
</html>
