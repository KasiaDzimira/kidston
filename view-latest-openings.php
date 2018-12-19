<?PHP 
	include("support/firstline.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Current jobs at KIDSTON – job search, job offers</title>
<meta name="description" content="Are you looking for a new challenge in IT or in the commercial sectors? KIDSTON is seeking top applicants for top jobs." />
<meta name="keywords" content="jobs, job search, job offers">
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="<?PHP echo SITE_URL;?>inc1ud35/layout.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>inc1ud35/script.js" language="javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<!--<script type="text/javascript" src="kninc/popup.js" language="javascript"></script>
-->
<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
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
<?PHP include("ffriend.php"); ?>
<div id="inner-bg">
  <div id="foot-sec-home">
    <div id="ind-page-section">
      <div id="ind-align">
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
                                  <td width="175" align="left" valign="middle"><span class="tab-menu-sel">Latest Openings</span></td>
                                  <td width="1"></td>
                                </tr>
                              </table>
                            </div>
                            
                    <div id="candidate">
                    <div class="home-tab-r2" >
                    <div class="home-tab-txt">
                    <div class="tab-text-content">
                    <div class="inn-tab-text-cont-left-detail">
        <div class="h1">Job search</div>
        <div class="latest-opening-frm-area">
			<?PHP
            if($_GET["resmsg"] != "")
            {
            ?>
            <center>
            <?PHP echo $db->errmsg[$db->decode64($_GET["resmsg"])];?>
            </center>
            <br />
            <script language="javascript"> 
			var msg = "Thank you very much for your application!<br>We will contact you as soon as possible following a careful review of your experience and qualifications.<br><br>Vielen Dank für die Zusendung Ihrer Bewerbungsunterlagen.<br>Wir werden Ihre Unterlagen schnellst möglich prüfen und uns bei Ihnen bezüglich dem weiteren Vorgehen melden.<br><br>KIDSTON Your IT Our People";
            prmt(msg);
            //return false;
            </script>
            <br />
            <?PHP
            }
            ?>
          <?PHP

$empn = array();
$busin = array();
$locin = array();

							if(isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Submit" && $_POST["subject"] == "" && $_POST["message"] == "")

							{//

									if($_POST["job_key"] != "")

									{

										$get_key = $db->pinput("job_key");

										$appqry = " (jm.job_title like '%$get_key%' or jm.job_desc like '%$get_key%' or cm.comp_name like '%$get_key%') and ";

									}

/*									if($_POST["job_location"] != "")
									{
										$get_location = $db->pinput("job_location");
										$appqry .= " ( jm.location like '%$get_location%') and ";
									}
*/									
if(isset($_POST["job_location"]))
{
									if(in_array('All',$_POST["job_location"]) && count($_POST["job_location"]) == 1)
									{ 
									
									} else { 
									
									$appqry .= " ( ";
									
									$o = 1;
									
									foreach ($_POST['job_location'] as $key => $value)
									
									{//foreach
									
									$locin[] = $value;
									
									if($o > 1)
									
									$appqry .= " or ";
									
									$appqry .= " jm.location like '%$value%' ";
									
									$o = $o + 1;
									
									}//foreach
									
									$appqry .= ") and ";
									
									}
}
if(isset($_POST["job_business"]))
{
									if(isset($_POST["job_business"]) && in_array('All',$_POST["job_business"]) && count($_POST["job_business"]) == 1 )
									{ 
									
									} else { 
									
									$appqry .= " ( ";
									
									$l = 1;
									
									foreach ($_POST['job_business'] as $key => $value)
									
									{//foreach
									
									$busin[] = $value;
									
									if($l > 1)
									
									$appqry .= " or ";
									
									$appqry .= " jm.job_business like '%$value%' ";
									
									$l = $l + 1;
									
									}//foreach
									
									$appqry .= ") and ";
									
									}
}
									if($_POST["job_id"] != "")

									{

										$get_location = $db->pinput("job_id");

										$appqry .= " ( jm.job_code like '%$get_location%') and ";

									}

									

									if($_POST["job_emptype"] != "")

									{

										//$get_location = $db->pinput("job_id");

										//$appqry .= " ( jm.job_code like '%$get_location%') and ";

										$appqry .= " ( ";

										$l = 1;

										foreach ($_POST['job_emptype'] as $key => $value)

										{//foreach

											$empn[] = $value;

											if($l > 1)

												$appqry .= " or ";

											

											$appqry .= " jm.job_type like '%$value%' ";

											$l = $l + 1;

										}//foreach

										$appqry .= ") and ";

									}

							}//

							//print_r($empn);

?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <form name="frmsearchjob" id="frmsearchjob" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
              <tr>
                <td width="200" height="22" align="left" valign="top">Key word:</td>
                <td width="25" align="left" valign="top">&nbsp;</td>
                <td width="180" align="left" valign="top">Job number:</td>
                <td width="25" align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top">Location: <span class="red">*</span></td>
              </tr>
              <tr>
                <td height="35" align="left" valign="top"><p class="dnd">
                    <input type="text" name="subject" id="subject" value="" />
                    <textarea name="message" id="message"></textarea>
                  </p>
                  <input name="job_key" id="job_key" type="text" class="field-job2" maxlength="50" value="<?PHP echo $db->pinput('job_key'); ?>" /></td>
                <td width="30" align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top"><input name="job_id" id="job_id" type="text" class="field-job2" maxlength="25" value="<?PHP echo $db->pinput('job_id');?>" /></td>
                <td align="left" valign="top">&nbsp;</td>
                <td width="180" align="left" valign="top">
                <select name="job_location[]" id="job_location"size="3" multiple="multiple" class="field-job3">
                    <option value="All" <?PHP if(in_array("All",$locin) ){?> selected="selected" <?PHP } ?>>All Location </option>
                    <option value="Bern Region"<?PHP if(in_array("Bern Region",$locin) ){?> selected="selected" <?PHP } ?>>Bern Region</option>
                    <option value="Zurich Region" <?PHP if(in_array("Zurich Region",$locin) ){?> selected="selected" <?PHP } ?>>Zurich Region</option>
                    <option value="North Switzerland (BS BL AG SO)" <?PHP if(in_array("North Switzerland (BS BL AG SO)",$locin) ){?> selected="selected" <?PHP } ?>>North Switzerland (BS BL AG SO)</option>
                    <option value="East Switzerland (SH TG AI AR SG GL GR)" <?PHP if(in_array("East Switzerland (SH TG AI AR SG GL GR)",$locin) ){?> selected="selected" <?PHP } ?>>East Switzerland (SH TG AI AR SG GL GR)</option>
                    <option value="West Switzerland (GE JU NE FR VD)" <?PHP if(in_array("West Switzerland (GE JU NE FR VD)",$locin) ){?> selected="selected" <?PHP } ?>>West Switzerland (GE JU NE FR VD)</option>
                    <option value="Central Switzerland (LU ZG SZ NW OW UR)" <?PHP if(in_array("Central Switzerland (LU ZG SZ NW OW UR)",$locin) ){?> selected="selected" <?PHP } ?>>Central Switzerland (LU ZG SZ NW OW UR)</option>
                </select><br /><br />
<span class="red">*</span>Press <b>Ctrl</b> for multiple choices
                <!--<input name="job_location" id="job_location" type="text" class="field-job2" maxlength="50" value="<?PHP //echo $db->pinput('job_location'); ?>" />--></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="35" colspan="8">&nbsp;</td>
              </tr>
              <tr>
                <td height="22" align="left" valign="top">Category: <span class="red">*</span></td>
                <td width="30" align="left" valign="top">&nbsp;</td>
                <td height="22" align="left" valign="top">Type of position:<span class="red">*</span></td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top" ><select name="job_business[]" size="3" multiple="multiple" class="field-job3" id="job_business" onchange="emptype_return(this);">
                   
                                    <option value="All" <?PHP if(in_array("All",$busin) ){?> selected="selected" <?PHP } ?>>All Job Area </option>
                                    <option value="1st Level Support / Helpdesk" <?PHP if(in_array("1st Level Support / Helpdesk",$busin) ){?> selected="selected" <?PHP } ?>>1st Level Support / Helpdesk Support</option>
                                    <option value="2nd Level Support" <?PHP if(in_array("2nd Level Support",$busin) ){?> selected="selected" <?PHP } ?>>2nd Level Support</option>
                                    <option value="3rd Level - Client System Engineering/SW Packaging" <?PHP if(in_array("3rd Level - Client System Engineering/SW Packaging",$busin) ){?> selected="selected" <?PHP } ?>>3rd Level - Client System Engineering / SW Packaging</option>
                                    <option value="3rd Level - Server System Engineer/Administrator" <?PHP if(in_array("3rd Level - Server System Engineer/Administrator",$busin) ){?> selected="selected" <?PHP } ?>>3rd Level - Server System Engineer / Administrator</option>
                                    <option value="Network Specialist/Administrator/Engineer/Security" <?PHP if(in_array("Network Specialist/Administrator/Engineer/Security",$busin) ){?> selected="selected" <?PHP } ?>>Network Specialist / Administrator  / Engineer / Security</option>
                                    <option value="Unix/Linux Specialist" <?PHP if(in_array("Unix/Linux Specialist",$busin) ){?> selected="selected" <?PHP } ?>>Unix / Linux Specialist</option>
                                    <option value="Web Programming/Publishing/Development" <?PHP if(in_array("Web Programming/Publishing/Development",$busin) ){?> selected="selected" <?PHP } ?>>Web Programming / Publishing / Development</option>
                                    <option value="Database Specialist/Development/Administrator" <?PHP if(in_array("Database Specialist/Development/Administrator",$busin) ){?> selected="selected" <?PHP } ?>>Database Specialist / Development / Administrator</option>
                                    <option value="Software Architect/Engineering/Programming" <?PHP if(in_array("Software Architect/Engineering/Programming",$busin) ){?> selected="selected" <?PHP } ?>>Software Architect / Engineering / Programming</option>
                                    <option value="ERP/SAP/CRM" <?PHP if(in_array("ERP/SAP/CRM",$busin) ){?> selected="selected" <?PHP } ?>>ERP / SAP / CRM</option>
                                    <option value="Project Management" <?PHP if(in_array("Project Management",$busin) ){?> selected="selected" <?PHP } ?>>Project Management</option>
                                    <option value="Consulting/Audit/Security/Analyse" <?PHP if(in_array("Consulting/Audit/Security/Analyse",$busin) ){?> selected="selected" <?PHP } ?>>Consulting / Audit / Security / Analyse</option>
                                    <option value="IT Management / Service Delivery Management" <?PHP if(in_array("IT Management / Service Delivery Management",$busin) ){?> selected="selected" <?PHP } ?>>IT Management / Service Delivery Management</option>
                                    <option value="Other Jobs" <?PHP if(in_array("Various Jobs",$busin) ){?> selected="selected" <?PHP } ?>>Other Jobs</option>
                                           </select>                    
                    
</td>
                <td width="30" align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top"><select name="job_emptype[]" size="3" multiple="multiple" class="field-job2" id="job_emptype" onchange="emptype_return(this);">
                    <option value="">Any</option>
                    <option value="Permanent" <?PHP if(in_array("Permanent",$empn) ){?> selected="selected" <?PHP } ?>>Permanent</option>
                    <option value="Temporary" <?PHP if(in_array("Temporary",$empn) ){?> selected="selected" <?PHP } ?>>Temporary</option>
                    <option value="Contract" <?PHP if(in_array("Contract",$empn) ){?> selected="selected" <?PHP } ?>>Contract</option>
                  </select></td>
                <td align="left" valign="bottom">&nbsp;</td>
                <td align="left" valign="bottom"><input type="hidden" name="frm_submit" id="frm_submit" value="Submit" />
                  <input name="Submit" type="submit" class="search-btn" value="Search" />
</td>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td height="35"><span class="red">*</span>Press <b>Ctrl</b> for multiple choices</td>
                <td width="30">&nbsp;</td>
                <td ><span class="red">*</span>Press <b>Ctrl</b> for multiple choices</td>
                <td>&nbsp;</td>
              </tr>
            </form>
          </table>
        </div>
        <?PHP

							// Page number and page limit

							$page = $_GET['page'];

							$limit = 25;

							$curdate = date("Y-m-d");

					 		// Job listing query

							$sql_image_pg = "select jm.job_asap,jm.ID,jm.org_id,jm.job_business,jm.job_code,jm.job_title,jm.job_type,jm.job_duration,jm.job_brief,jm.job_desc,jm.job_salary,jm.job_atype,jm.job_response,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,DATE_FORMAT(jm.postedon,'%d %b %Y') as pdate,jm.admin_id,jm.status,cm.comp_name from job_details jm, company_details cm where $appqry jm.status = 'Y' and cm.status ='Y' and jm.org_id = cm.ID and (jm.apply_date >= '$curdate' or jm.job_asap='asap' or jm.job_asap='nV' or jm.job_asap='by appt') order by jm.update_on desc";
							//echo $sql_image_pg;					

							// Execute query

							$fetch_image = $db->getTableArray($sql_image_pg);

							$count_pg = count($fetch_image);

							

							$pager  = $db->getPagerData($count_pg, $limit, $page);  

							$offset = $pager->offset;  

							$limit  = $pager->limit;  

							$page   = $pager->page;

							

							// Query with page limit

							$sql_image = $sql_image_pg." limit $offset, $limit";

							$sn = 1;

							

							// Execute query

							$rs_job = $db->getTableArray($sql_image);

							$count_rs = count($rs_job);

					

					?>
        <div class="job-list-sec">
          <div class="it-jobs">
            <div class="job-head-sec"><span class="h2">Job offers</span></div>
            <?PHP	

							if($pager->numPages > 1)

							{// IF PG #

?>
            <div class="job-nxt">
              <?PHP

								if ($page == 1)

								{// # 1

							?>
              <a href="javascript:;" class="pg-link">Previous</a>
              <?PHP

								}// # 1

								else

								{// # 1

							?>
              <a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?page=<?PHP echo ($page - 1); ?>" class="pg-link">Previous</a>
              <?PHP

								}// # 1

							?>
              |
              <?PHP

								if ($page == $pager->numPages)

								{// # 1

							?>
              <a href="javascript:;" class="pg-link">Next</a>
              <?PHP

								}// # 1

								else

								{// # 1

							?>
              <a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?page=<?PHP echo ($page + 1); ?>" class="pg-link">Next</a>
              <?PHP

								}// # 1

								$startnum = ($limit * ($page-1)) + 1;

								//$startnum = ($startnum + 1) - $count_rs;

							?>
            </div>
            <div class="job-paging">Displaying <?PHP echo $startnum; ?> to <?PHP echo ($startnum + $count_rs) - 1; ?> of <?PHP echo $count_pg; ?> Jobs </div>
            <?PHP

							}// IF PG #

?>
          </div>
          <div class="it-jobs-table">
            <?PHP

							if($count_rs > 0)

							{// rec count

?>
            <table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td width="120" align="left" valign="top" class="tab-h"><strong>Date</strong></td>
                <td align="left" valign="top" class="tab-h"><strong>Job title & description</strong></td>
                <td width="120" align="left" valign="top" class="tab-h"><strong>Location</strong></td>
              </tr>
              <?PHP

							for($i = 0;$i<$count_rs;$i++)

							{// FOR $i

								$tab_row = "tab-r1";

								if($sn % 2 == 0)

									$tab_row = "tab-r2";

?>
              <tr>
                <td align="left" valign="top" class="<?PHP echo $tab_row; ?>"><?PHP echo html_entity_decode($rs_job[$i]["pdate"]); ?></td>
                <td align="left" valign="top" class="<?PHP echo $tab_row; ?>"><a href="<?PHP echo SITE_URL."job/".html_entity_decode($rs_job[$i]["ID"])."/".$db->stringToUrlSlug(html_entity_decode($rs_job[$i]["job_title"]));?>"class="link-head-red"><?PHP echo html_entity_decode($rs_job[$i]["job_title"]); ?></a><br />
                  <br />
                  <?PHP
				 /* <a href="<?PHP echo "job/".html_entity_decode($rs_job[$i]["ID"])."/".$db->stringToUrlSlug(html_entity_decode($rs_job[$i]["job_title"]));?>"*/

							  		if($rs_job[$i]["job_brief"] != "")

									{// brief

							  ?>
                  <?PHP echo html_entity_decode($rs_job[$i]["job_brief"]); ?> <br />
                  <br />
                  <?PHP 

							  		}// brief

							  ?>

                  <strong>Job Code:</strong> <?PHP echo html_entity_decode($rs_job[$i]["job_code"]); ?> <br />
                  <?PHP

							  		if(trim($rs_job[$i]["job_skillz"])!= "")

									{// skill

							  ?>
                  <strong>Required Skills:</strong> <?PHP echo  substr(strip_tags(html_entity_decode($rs_job[$i]["job_skillz"])),0,350); ?>...<br />
                  <?PHP

							  		}// skill

							  ?>
                  <strong>Entry Date :</strong>
                  <?PHP 

							  		if($rs_job[$i]["dd"]!="")

									{

										echo html_entity_decode($rs_job[$i]["dd"]);

									}

									else

									{ 

										echo html_entity_decode($rs_job[$i]["job_asap"]);

									}

							   ?>
                  <br />
                  <a href="<?PHP echo SITE_URL."job/".html_entity_decode($rs_job[$i]["ID"])."/".$db->stringToUrlSlug(html_entity_decode($rs_job[$i]["job_title"]));?>" class="link-merun"> <img src="<?PHP echo SITE_URL; ?>knpic/view-details.gif" height="23" width="95" border="0" /></a>&nbsp; &nbsp; <a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent1" class="thickbox link-merun" title="" onclick="document.getElementById('url_frd').value = '<?PHP echo $rs_job[$i][ID]; ?>';"><img src="<?PHP echo SITE_URL; ?>knpic/forward-friend.gif" height="23" width="129" border="0" /></a>
</td>
                <td align="left" valign="top" class="<?PHP echo $tab_row; ?>"><?PHP

							  		if($rs_job[$i]["location"] != "")

									{// location

							  			 echo html_entity_decode($rs_job[$i]["location"]); 

							  		}//

							  ?></td>
              </tr>
              <?PHP		

								$sn = $sn + 1;

							}// FOR $i

?>
            </table>
            <?PHP

							}// rec count

							else

							{// rec count

?>
            <div align="center" class="error">No records found!</div>
            <?PHP

							}// rec count

?>
          </div>
          <div class="it-jobs">
            <?PHP	

							if($pager->numPages > 1)

							{// IF PG #

?>
            <div class="job-nxt">
              <?PHP

								if ($page == 1)

								{// # 1

							?>
              <a href="javascript:;" class="pg-link">Previous</a>
              <?PHP

								}// # 1

								else

								{// # 1

							?>
              <a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?page=<?PHP echo ($page - 1); ?>" class="pg-link">Previous</a>
              <?PHP

								}// # 1

							?>
              |
              <?PHP

								if ($page == $pager->numPages)

								{// # 1

							?>
              <a href="javascript:;" class="pg-link">Next</a>
              <?PHP

								}// # 1

								else

								{// # 1

							?>
              <a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?page=<?PHP echo ($page + 1); ?>" class="pg-link">Next</a>
              <?PHP

								}// # 1

								$startnum = ($limit * ($page-1)) + 1;

								//$startnum = ($startnum + 1) - $count_rs;

							?>
            </div>
            <div class="job-paging">Displaying <?PHP echo $startnum; ?> to <?PHP echo ($startnum + $count_rs) - 1; ?> of <?PHP echo $count_pg; ?> Jobs </div>
            <?PHP

								}// # 1

?>
          </div>
        </div>
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
