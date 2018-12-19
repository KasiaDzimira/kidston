<?PHP 
include("support/firstline.php"); 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="KIDSTON introduces top candidates to top companies in the IT and commercial sectors.">
<meta name="keywords" content="Personnel introduction, IT jobs, commercial jobs.">
<title>KIDSTON - Your IT Our 	People</title>
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="inc1ud35/layout.css" rel="stylesheet" type="text/css" />
<script src="inc1ud35/script.js" type="text/javascript" language="javascript"></script>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<script language="javascript" type="text/javascript">
function show1(val)
{
	if(val == "1")
	{
		document.getElementById('candidate').style.display= "block";
		document.getElementById('company').style.display= "none";
		
		document.getElementById('cnd').className = "tab-menu-sel";
		document.getElementById('cmp').className = "tab-menu";
	}
	if(val == "2")
	{
		document.getElementById('candidate').style.display= "none";
		document.getElementById('company').style.display= "block";
		
		document.getElementById('cnd').className = "tab-menu";
		document.getElementById('cmp').className = "tab-menu-sel";
	}
}
</script>
<script type="text/javascript" src="inc1ud35/jquery-code.js"></script>
<script type="text/javascript" src="inc1ud35/select-box.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#location').selectbox();
	});
	</script>
</head>
<body>
<div id="new-bg-home">
  <div id="foot-sec-home">
    <div id="ind-page-section">
      <div id="ind-align">
			<div id="top-align">
			<div id="top-banner-align">
        <?PHP include("header_n.php"); ?>
        <div id="ind-banner-sec">
          <div id="ind-banner">
            <div id="ind-banner-logo"><a href="<?PHP echo SITE_URL;?>index.php?src=home"></a></div>
            <div id="home-box-sec"> <span class="home-box-sec-h1">The right job, right in front of you!</span><br />
              With the most extensive career openings and the most skilled <br />
              employee database KIDSTON is the one-stop-shop for any of your <br />
              career needs. <a href="./about.php?src=about">Read more</a></div>
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
                                  <td width="245" align="center" valign="middle"><a href="javascript:;" id="cnd" onclick="show1('1')" class="tab-menu-sel">Find a Job</a></td>
                                  <td width="1"></td>
                                  <td width="245" align="left" valign="middle"><a href="javascript:;" id="cmp" class="tab-menu" onclick="show1('2')"> Find an IT Professional </a></td>
                                </tr>
                              </table>
                            </div>
                            <div id="candidate">
                              <div class="home-tab-r2" >
                                <div class="home-tab-txt">
                                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                    <form name="frm_stud" id="frm_stud" method="post" action="job_search_result.php" onsubmit="return svalidation();">
                                      <tr>
                                        <td height="40" valign="top"><span class="white-text">Search for a job</span></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td width="20">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td width="420" valign="top"><input name="stud_srch_txt" type="text" class="textbox" id="stud_srch_txt" size="40" value="e.g. Java Developer" onfocus="clearText(this);" onblur="clearText(this);" /></td>
                                        <td width="130" valign="top"><input name="Submit" id="Submit" type="submit" class="submit"  value="Search" /></td>
                                        <td align="left" valign="top"><a href="view-latest-openings.php"><img src="knpic/view-all-jobs.gif" height="41" width="137" border="0" alt="View All Jobs" /></a></td>
                                      </tr>
                                    </form>
                                  </table>
                                  <br />
                                  <div class="tab-text-content">
                                    <div class="tab-text-cont-left">
                                      <table width="580" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td><span class="black-head-25">Featured Jobs:</span></td>
                                          <td width="20">&nbsp;</td>
                                          <td align="right">&nbsp;
                                            <!--<a href="view-latest-openings.php" class="red-link">View all available jobs</a>--></td>
                                        </tr>
                                        <tr>
                                          <td height="30" align="left" valign="middle"><hr size="1" /></td>
                                          <td valign="middle"><hr size="1" /></td>
                                          <td valign="middle"><hr size="1" /></td>
                                        </tr>
                                        <?PHP
$sql_openlist = "select jm.ID,jm.org_id,jm.job_code,jm.job_type,jm.job_title,jm.job_brief,jm.job_asap,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,DATE_FORMAT(jm.postedon,'%D %M, %Y') as poston,jm.admin_id,jm.status from job_details jm, company_details cm where jm.status <> 'D' and jm.status = 'Y' and cm.status ='Y' and jm.org_id = cm.ID order by jm.ID desc limit 16";
$rs_openlist = $db->getTableArray($sql_openlist);
$count_rs = count($rs_openlist);


?>
                                        <tr>
                                          <td width="280" align="left" valign="top"><?PHP
$sn= 1;
for($i = 0;$i<$count_rs;$i++)
{ //
?>
                                            <div class="designation-pad-index">
                                              <!---->
                                              <?PHP
	$title = html_entity_decode($rs_openlist[$i]["job_title"]);
	$wordslide = substr($title, 0, 40);?>
	
	<a href="<?PHP echo SITE_URL."job/".html_entity_decode($rs_openlist[$i]["ID"])."/".$db->stringToUrlSlug(html_entity_decode($rs_openlist[$i]["job_title"]));?>" class="designation"><?PHP echo html_entity_decode($rs_openlist[$i]["job_title"]); ?> </a>
                                              <br />
                                              <?PHP echo html_entity_decode($rs_openlist[$i]["location"]); ?> | <?PHP echo html_entity_decode($rs_openlist[$i]["job_type"]); ?> </div>
                                            <?PHP
if(($sn % 8) == 0)
{
	?></td>
                                          <td>&nbsp;</td>
                                          <td align="left" valign="top"><?PHP
}
$sn +=1;
}

?></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="tab-text-cont-right">
                                      <div class="tab-text-cont-signup"><span class="sign-up-text">Sign-up to get free job alerts by email</span><br />
                                        <br />
                                        <a href="<?PHP echo SITE_URL;?>job-alerts.php"><img src="knpic/sign-up.gif" width="75" height="26" alt="Email Subscription" border="0"/></a></div>
                                      <div class="tab-text-cont-signup"><span class="team-head">Join Our Talent Network!</span><br />
                                        <br />
                                        <span class="team-text"> Please <a href="world_leading_team.php" class="link-merun">click here</a>.</span><br />
                                      </div>
                                      <div class="stay-connected"> Stay connected to the latest jobs, events <br />
                                        and career advice.<br />
                                        <br />
                                        <a href="https://www.facebook.com/pages/KIDSTON/259889204512" target="_blank"><img src="knpic/icon-facebook.gif" width="42" height="42" alt="" /></a> <a href="https://twitter.com/kidstongmbh" target="_blank"><img src="knpic/icon-twitter.gif" width="42" height="42" alt="" /></a> <a href="https://www.linkedin.com/company/kidston" target="_blank"><img src="knpic/icon-linked.gif" width="42" height="42" alt="" /></a>
                                        <!--<a href="#"><img src="knpic/icon-gplus.gif" width="42" height="42" alt="" /></a>-->
                                        <a href="https://www.xing.com/net/kidston" target="_blank"><img src="knpic/icon-k.gif" width="42" height="42" alt="" /></a>
										<script src="//platform.linkedin.com/in.js" type="text/javascript">
                                        lang: en_US
                                        </script>
                                        <script type="IN/FollowCompany" data-id="2502324" data-counter="none"></script>

                                        </div>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                            <div id="company" style="display:none">
                              <div class="home-tab-r2" >
                                <div class="home-tab-txt">
                                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                    <form name="it_search" id="it_search" method="post" action="talent_search_result.php" onsubmit="return talent_search();">
                                      <tr>
                                        <td height="40" valign="top"><span class="white-text">Search for an IT Professional</span></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td width="20">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td width="420" valign="top"><input name="txt_it_srch" type="text" class="textbox" id="txt_it_srch" size="48" value="e.g. Java Developer" onfocus="clearText(this);" onblur="clearText(this);" /></td>
                                        <td width="130" valign="top"><input name="Submit" id="Submit" type="submit" class="submit"  value="Search" /></td>
                                        <td align="left" valign="top"><a href="view_talent.php"><img src="knpic/view-all-pros.gif" height="41" width="137" border="0" alt="View All Talents" /></a></td>
                                      </tr>
                                    </form>
                                  </table>
                                  <br />
                                  <div class="tab-text-content">
                                    <div class="tab-text-cont-left">
                                      <table width="580" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td><span class="black-head-25">IT Professional:</span></td>
                                          <td width="20">&nbsp;</td>
                                          <td align="right">&nbsp;
                                            <!--<a href="view_talent.php" class="red-link">View all Talents</a>--></td>
                                        </tr>
                                        <tr>
                                          <td height="30" valign="middle"><hr size="1" /></td>
                                          <td valign="middle"><hr size="1" /></td>
                                          <td valign="middle"><hr size="1" /></td>
                                        </tr>
                                        <?PHP
        $sql_talent = "select ID,talent_code,cond_name,curr_design,status,location from talents where status ='Y' order by ID desc limit 16";
        $rs_talentlist = $db->getTableArray($sql_talent);
        $count_tl = count($rs_talentlist);
        ?>
                                        <tr>
                                          <td width="280"><?PHP
$sm= 1;
for($y = 0;$y<$count_tl;$y++)
{ //
?>
                                            <div class="designation-pad-index">
                                              <?PHP
	$ittitle = html_entity_decode($rs_talentlist[$y]["curr_design"]);
	$itwordslide = substr($ittitle, 0, 40);
	?>
                                             <!-- <a href="talent_details.php?tid=<?PHP echo $rs_talentlist[$y]["ID"];?>" class="designation"><?PHP echo $itwordslide; ?></a>-->
                                             <a href="<?PHP echo SITE_URL."talent/".$rs_talentlist[$y]["ID"]."/".$db->stringToUrlSlug($rs_talentlist[$y]["curr_design"]);?>" class="designation"><?PHP echo html_entity_decode($rs_talentlist[$y]["curr_design"]); ?> </a>
                                              <br />
                                              <?PHP echo html_entity_decode($rs_talentlist[$y]["location"]); ?> | <?PHP echo html_entity_decode($rs_talentlist[$y]["talent_code"]); ?> </div>
                                            <?PHP
if(($sm % 8) == 0)
{
	?></td>
                                          <td>&nbsp;</td>
                                          <td align="left" valign="top"><?PHP
}
$sm +=1;
}

?></td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="tab-text-cont-right">
                                      <div class="tab-text-cont-signup"><span class="sign-up-text">Sign Up and stay updated about new candidates! </span><br />
                                        <br />
                                        <a href="<?PHP echo SITE_URL;?>professionals-alert.php"><img src="knpic/sign-up.gif" width="75" height="26" alt="Email Subscription" border="0"/></a> </div>
                                      <div class="tab-text-cont-signup"><span class="team-head">Advertising Job Vacancies</span><br />
                                        <br />
                                        <span class="team-text">Please <a href="post-job.php" class="link-merun">click here</a>.</span><br />
                                      </div>
                                      <div class="stay-connected"> Stay connected to the latest jobs, events <br />
                                        and career advice.<br />
                                        <br />
                                        <a href="https://www.facebook.com/pages/KIDSTON/259889204512" target="_blank"><img src="knpic/icon-facebook.gif" width="42" height="42" alt="" /></a> <a href="https://twitter.com/kidstongmbh" target="_blank"><img src="knpic/icon-twitter.gif" width="42" height="42" alt="" /></a> <a href="https://www.linkedin.com/company/kidston" target="_blank"><img src="knpic/icon-linked.gif" width="42" height="42" alt="" /></a>
                                        <!--<a href="#"><img src="knpic/icon-gplus.gif" width="42" height="42" alt="" /></a>-->
                                        <a href="https://www.xing.com/net/kidston" target="_blank"><img src="knpic/icon-k.gif" width="42" height="42" alt="" /></a>
										<br />
<br />
<script src="//platform.linkedin.com/in.js" type="text/javascript">
                                        lang: en_US
                                        </script>
                                        <script type="IN/FollowCompany" data-id="2502324" data-counter="none"></script>
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
        </div></div></div></div></div>
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
function svalidation()
{
		if((document.getElementById("stud_srch_txt").value == "") || (document.getElementById("stud_srch_txt").value == "e.g. Java Developer"))
		{
	
			alert("Please enter the Search Criteria.");
			document.getElementById("stud_srch_txt").focus();
			document.getElementById("stud_srch_txt").value ="";
			return false;
		}
}

function talent_search()
{
		if((document.getElementById("txt_it_srch").value == "") || (document.getElementById("txt_it_srch").value == "e.g. Java Developer"))
		{
	
			alert("Please enter the Search Criteria.");
			document.getElementById("txt_it_srch").focus();
			document.getElementById("txt_it_srch").value ="";
			return false;
		}
	
}
</script>
</body>
</html>