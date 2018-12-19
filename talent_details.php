<?PHP 
include("support/firstline.php");
$tal_id = $_REQUEST['tid'];
$talent_qurey = $db->fetchSingleRow("select * from talents where status='Y' and ID = '$tal_id' ");
$bline = $talent_qurey["busi_line"];
if($talent_qurey["ID"] <= 0 && $talent_qurey["ID"] != $tal_id)
{ 
?>
<script language="javascript">window.location = "<?PHP echo SITE_URL;?>view_talent.php";</script>
<?PHP 		die("Invalid job request");
}			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?PHP echo $talent_qurey['curr_design']; ?>- Job search at KIDSTON</title>
<meta name="description" content="Search and find applicants quickly and easily: KIDSTON introduces candidates to companies from all over German-speaking Switzerland – for IT and commercial jobs.">
<meta name="keywords" content="Find applicants, search applicants, IT jobs, commercial jobs">
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="<?PHP echo SITE_URL;?>inc1ud35/layout.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>inc1ud35/script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
<!--<script type="text/javascript" language="javascript" src="<?PHP echo SITE_URL;?>kninc/popup.js"></script>-->
<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>
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
                    <td align="left" valign="top"><div class="grey-box-c1">
                        <div class="grey-box-txt">
                          <div class="home-tab-sec">
                            <div class="home-tab-r1">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="240" align="left" valign="middle"><span class="tab-menu-sel">Find an IT Professional</span></td>
                                  <td width="1"></td>
                                </tr>
                              </table>
                            </div>
                            <div id="candidate">
                              <div class="home-tab-r2" >
                                <div class="home-tab-txt">
                                  <div class="tab-text-content">
                                    <div class="inn-tab-text-cont-left">
                                      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="45" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td><div style="float: left;" align="left" class="h3"><?PHP echo html_entity_decode($talent_qurey['curr_design']); ?> [<?PHP echo html_entity_decode($talent_qurey['talent_code']); ?>]</div>
                                                  <div style="float: right;" align="right" class="smtxt-g">
                                                    <?PHP if($talent_qurey['pdate']!=""){ ?>
                                                    [Posted on: <?PHP echo $talent_qurey['pdate'];?>]
                                                    <?PHP } ?>
                                                  </div></td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                        <tr>
                                          <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td height="20" align="left" valign="bottom" class="head-tab"><strong>Candidate details</strong></td>
                                              </tr>
                                             <tr>
                                                <td height="30" align="left" valign="bottom"  class="heading"><strong>Job Area: </strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['busi_line']); ?></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Candidate number: </strong></td>
                                              </tr>
                                              <tr>
                                                <td  style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['talent_code']); ?></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Age:</strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['age']); ?></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Availability:</strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['available']);?></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Location: </strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['location']); ?></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Type of employment required:</strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['employ']); ?></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Summary:</strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['summary']); ?></td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                        <tr>
                                          <td height="45" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="bottom">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td height="20" align="left" valign="bottom" class="head-tab"><strong>Education</strong></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Certificates/examinations: </strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['degrees']); ?></td>
                                              </tr>
                                             
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                        <?PHP if($talent_qurey['job_desc']!=""){?>
                                        <tr>
                                          <td height="45" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td height="20" align="left" valign="bottom" class="head-tab"> <strong>Job Description</strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo htmlspecialchars_decode($talent_qurey['job_desc']); ?></td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                        <tr>
                                          <?PHP } ?>
                                          <td height="45" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td height="20" align="left" valign="bottom" class="head-tab"><strong>Candidate profile</strong></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Skills: </strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['skills']); ?></td>
                                              </tr>
                                              <?PHP
    $lang = $db->getTableArray("select * from talents_language where talent_id='$tal_id'");
    if(count($lang) > 0 )
    { // if count
    ?>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Languages: </strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP
    for($j=0;$j<count($lang);$j++)
    { // for j
    ?>
                                                  <div>
                                                    <?PHP
    if($j > 0)
    //echo ", ";
    $level = "";
    $language_level = $lang[$j]["language_level"];
    if($language_level == "Native")
    {
    $level = "Muttersprache";
    }	
    if($language_level == "Fluent")
    {
    $level = "Verhandlungssicher";
    }
    if($language_level == "Basic")
    {
    $level = "Berufspraxis";
    }		
    ?>
	<?PHP echo html_entity_decode($lang[$j]['language'])."(".html_entity_decode($lang[$j]['language_level']).")"; ?>
    </div>
   <?PHP } // for j ?></td>
                                              </tr>
                                              <?PHP
    }// if count
    ?>
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td class="head-tab"><strong>Contact person</strong></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Name:</strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['cpreson_name']); ?></td>
                                              </tr>
                                              <tr>
                                                <td height="30" align="left" valign="bottom" class="heading"><strong>Email:</strong></td>
                                              </tr>
                                              <tr>
                                                <td style="padding-left:15px;"><?PHP echo html_entity_decode($talent_qurey['cpreson_email']); ?></td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td class="head-tab"><strong>Would you like to meet this candidate? Fill in this form:</strong></td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                        <tr>
                                          <td height="45" align="left" valign="top">
                                          <form id="frm_tal" name="frm_tal" method="post" action="<?PHP echo SITE_URL; ?>process/meet_candiate_save.php" onSubmit="return candidate_validate();">
                                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td width="15">&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td width="20">&nbsp;</td>
                                                  <td><div style="float:left; display:none;" id="talent"><font color="#FF0000"><b> Please enter  name and email.</b></font> </div></td>
                                                </tr>
                                                <tr>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td width="140" height="35" align="left" valign="middle"><strong>Company</strong><span class="star">*</span></td>
                                                  <td align="left" valign="middle">:</td>
                                                  <td align="left" valign="middle">
                                                  <input type="text" name="subject" id="subject" style="display:none;" />
                                                  <input name="cname" type="text" class="field-job" id="cname" /></td>
                                                </tr>
                                                <tr>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td height="35" align="left" valign="middle"><strong>Name</strong>
                                                    <span class="star">*</span></td>
                                                  <td align="left" valign="middle">:</td>
                                                  <td align="left" valign="middle">
                                                  <input type="text" name="message" id="message" style="display:none;" />
                                                  <input name="name" type="text" class="field-job" id="name" /></td>
                                                </tr>
                                                <tr>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td height="35" align="left" valign="middle"><strong>Address</strong></td>
                                                  <td align="left" valign="middle">:</td>
                                                  <td align="left" valign="middle"><textarea name="address" class="field-job" id="address"></textarea></td>
                                                </tr>
                                                <tr>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td height="35" align="left" valign="middle"><strong>Telephone number</strong> <span class="star">*</span></td>
                                                  <td align="left" valign="middle">:</td>
                                                  <td align="left" valign="middle"><input name="phone" type="text" class="field-job" id="phone" onKeyPress="return num_only(event);"  /></td>
                                                </tr>
                                                <tr>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td height="35" align="left" valign="middle"><strong>E-Mail</strong>
                                               <span class="star">*</span></td>
                                                  <td align="left" valign="middle">:</td>
                                                  <td align="left" valign="middle"><input name="email" type="text" class="field-job" id="email" /></td>
                                                </tr>
                                                <tr>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td height="35" align="left" valign="middle"><strong>Remarks</strong></td>
                                                  <td align="left" valign="middle">:</td>
                                                  <td align="left" valign="middle"><textarea name="remarks" class="field-job" id="remarks"></textarea></td>
                                                </tr>
                                                <tr>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td height="30" align="left" valign="middle">&nbsp;</td>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  </tr>
                                                <tr>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td height="30" align="left" valign="middle">&nbsp;</td>
                                                  <td align="left" valign="middle">&nbsp;</td>
                                                  <td align="left" valign="middle">
                                                  
                                                  <input name="frm_submit" type="submit" class="btn-common" id="frm_submit" value="Send" />
                                                    <!--<input type="button" name="Submit" value="Send" class="btn-common" onClick="return talent_validation('<?PHP //echo SITE_URL; ?>process/talsend.php');"/>-->
                                                    <input name="tcode" type="hidden" id="tcode" value="<?PHP echo html_entity_decode($talent_qurey['talent_code']); ?>" />
                                                    <input name="mailadd" type="hidden" id="mailadd" value="<?PHP echo html_entity_decode($talent_qurey['cpreson_email']);?>" /></td>
                                                </tr>
                                              </table>
                                            </form>
                                            <!--<a class="link-merun" onmouseover='this.style.cursor="pointer" ' onfocus='this.blur();'  onclick="popup('popUpDiv2')">Send request</a>--></td>
                                        </tr>
                                        <tr>
                                          <td height="45" align="left" valign="top">&nbsp;</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="inn-tab-text-cont-right">
                                      <?PHP
    
    $job_details_count = $db->fetchSingleRow("SELECT COUNT( ID ) as jcount FROM  `talents` WHERE  `busi_line` =  '".$bline."'");
    
    ?>
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td><span class="black-head-21">Similar Candidate:&nbsp;(<?PHP echo $job_details_count['jcount'];?>)</span></td>
                                        </tr>
                                        <tr>
                                          <td height="30" valign="middle"><hr size="1" /></td>
                                        </tr>
                                        <tr>
                                          <td><?PHP
    $sql_sjob = "SELECT `ID`, `talent_code`, `cond_name`, `curr_design`, `know_summ`, `location`, `busi_line`, `age`, `employ`, `summary`, `degrees`, `feducation`, `available`, `skills`, `cpreson_name`, `cpreson_email`, `create_on`, `ip_addr`, `admin_id`, `status` FROM `talents` WHERE busi_line = '".$bline."' and `status` ='Y'";
    $rs_sjob = $db->getTableArray($sql_sjob);
    $count_jrs = count($rs_sjob);
    //echo "SQL: ".$sql_sjob."<br>***<br>Count: ".$count_jrs;
    for($j = 0;$j<$count_jrs;$j++)
    {// FOR $j
    ?>
                                            <div class="designation-pad">
                                           <!-- <a href="talent_details.php?tid=<?PHP //echo $rs_sjob[$j]["ID"];?>" class="designation"><?PHP //echo html_entity_decode($rs_sjob[$j]["curr_design"]); ?></a>-->
										   <a href="<?PHP echo SITE_URL."talent/".$rs_sjob[$j]["ID"]."/".$db->stringToUrlSlug(html_entity_decode($rs_sjob[$j]["curr_design"]));?>" class="designation"><?PHP echo html_entity_decode($rs_sjob[$j]["curr_design"]); ?></a>
										   
										   <br />
                                              <?PHP echo $rs_sjob[$j]["location"];?> | <?PHP echo $rs_sjob[$j]["talent_code"];?> </div>
                                            <?PHP } ?>
                                            <div class="common-left"> <br />
                                              <a href="<?PHP echo SITE_URL."view_talent.php"; ?>" class="body-link">View all available Candidates</a></div></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="inn-tab-text-cont-right"><span class="black-head-17">Sign Up and stay updated about new candidates! </span><br />
<br /><a href="<?PHP echo SITE_URL;?>professionals-alert.php"><img src="<?PHP echo SITE_URL; ?>knpic/sign-up.gif" width="75" height="26" alt="Email Subscription" border="0"/></a>                                    </div>
                                    <div class="inn-sign-up"> <br />
                                      <br />
                                      <br />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div></td>
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43390285-1', 'kidston.ch');
  ga('send', 'pageview');

</script></body>
</html>
