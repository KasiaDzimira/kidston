.<?PHP 
	include("support/firstline.php");
	if(isset($_REQUEST['Submit']) && $_REQUEST['Submit']== "Search")
{ 
		$stud_srch_txt = $_REQUEST["stud_srch_txt"];

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Current jobs at KIDSTON – job search, job offers</title>
<meta name="keywords" content="jobs, job search, job offers">
<link rel="shortcut icon" href="<?PHP echo SITE_URL;?>knpic/favicon.ico" type="image/x-icon" />
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
                                  <td width="155" align="left" valign="middle"><span class="tab-menu-sel">Search Result</span></td>
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
        
        <?PHP

							// Page number and page limit

							$page = $_GET['page'];

							$limit = 25;

							$curdate = date("Y-m-d");

					 		// Job listing query

						//	$sql_image_pg = "SELECT `ID`, `org_id`, `job_code`, `job_title`, `job_business`, `job_type`, `job_duration`, `job_brief`, `job_desc`, `add_com`, `job_salary`, `job_language`, `job_atype`, `job_response`, `job_skillz`, `job_quota`, `location`, `cont_pname`, `cont_pemail`, `cont_purl`, `apply_date`, `job_asap`, `create_on`, `update_on`, `created_ip`, `admin_id`, `postedon`, `status`, `publish_status`, `publish_xml`,DATE_FORMAT(apply_date,'%D %M, %Y') as dd,DATE_FORMAT(postedon,'%d %b %Y') as pdate FROM `job_details` WHERE  `job_title` like '%".$stud_srch_txt."%' or job_brief like '%".$stud_srch_txt."%' or `job_business` like '%".$stud_srch_txt."%' and job_atype <> 'Intern' and (apply_date >= '$curdate' or job_asap='asap' or job_asap='nV' or job_asap='by appt')and status = 'Y' order by ID desc";
											
						

							$sql_image_pg = " select jm.job_asap,jm.ID,jm.org_id,jm.job_business,jm.job_code,jm.job_title,jm.job_type,jm.job_duration,jm.job_brief,jm.job_desc,jm.job_salary,jm.job_atype,jm.job_response,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,DATE_FORMAT(jm.postedon,'%d %b %Y') as pdate,jm.admin_id,jm.status,cm.comp_name from job_details jm, company_details cm where (jm.job_title like '%".$stud_srch_txt."%' or jm.job_desc like '%".$stud_srch_txt."%' or cm.comp_name like '%".$stud_srch_txt."%' or jm.job_code like '%".$stud_srch_txt."%' or jm.job_business like '%".$stud_srch_txt."%' or jm.job_duration like '%".$stud_srch_txt."%' or jm.job_brief like '%".$stud_srch_txt."%' or jm.job_desc like '%".$stud_srch_txt."%' or jm.job_skillz like '%".$stud_srch_txt."%' ) and jm.job_atype <> 'Intern' and jm.status = 'Y' and cm.status ='Y' and jm.org_id = cm.ID and (jm.apply_date >= '$curdate' or jm.job_asap='asap' or jm.job_asap='nV' or jm.job_asap='by appt') order by jm.ID desc";
							
							$fetch_image = $db->getTableArray($sql_image_pg);
							$count_pg = count($fetch_image);
							//echo "SQL: ".$sql_image_pg."<br>Count: ".$count_pg."<br>";
							$pager  = $db->getPagerData($count_pg, $limit, $page);  
							$offset = $pager->offset;  
							$limit  = $pager->limit;  
							$page   = $pager->page;
							$sql_image = $sql_image_pg." limit $offset, $limit";
							$sn = 1;
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
              <a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?page=<?PHP echo ($page + 1); ?>" class="pg-link">Next </a>
              <?PHP
								}// # 1
								$startnum = ($limit * ($page-1)) + 1;
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
                <td width="120" align="left" valign="middle" class="tab-h"><strong>Date</strong></td>
                <td height="35" align="left" valign="middle" class="tab-h"><strong>Job title & description</strong></td>
                <td width="120" align="left" valign="middle" class="tab-h"><strong>Location</strong></td>
              </tr>
              <?PHP

							for($i = 0;$i<$count_rs;$i++)

							{// FOR $i

								$tab_row = "tab-r1";

								if($sn % 2 == 0)

									$tab_row = "tab-r2";

/*<a href="<?PHP echo "job/".html_entity_decode($rs_job[$i]["ID"])."/".$db->stringToUrlSlug(html_entity_decode($rs_job[$i]["job_title"]));?>" class="link-head-red"><?PHP echo html_entity_decode($rs_job[$i]["job_title"]); ?></a>
*/?>
              <tr>
                <td align="left" valign="top" class="<?PHP echo $tab_row; ?>"><?PHP echo html_entity_decode($rs_job[$i]["pdate"]); ?></td>
                <td align="left" valign="top" class="<?PHP echo $tab_row; ?>"><!--<a href="<?PHP //echo "job_details.php?jid=".$rs_job[$i]["ID"];?>" class="link-head-red"><?PHP //echo html_entity_decode($rs_job[$i]["job_title"]); ?></a>--><a href="<?PHP echo SITE_URL."job/".html_entity_decode($rs_job[$i]["ID"])."/".$db->stringToUrlSlug(html_entity_decode($rs_job[$i]["job_title"]));?>" class="link-head-red"><?PHP echo html_entity_decode($rs_job[$i]["job_title"]); ?></a>
                
                <br />
                  <br />
                  <?PHP

							  		if($rs_job[$i]["job_brief"] != "")

									{// brief

							  ?>
                  <?PHP echo html_entity_decode($rs_job[$i]["job_brief"]); ?> <br />
                  <br />
                  <?PHP 

							  		}// brief

							  ?>
                  <strong>Job Code:</strong> <?PHP echo html_entity_decode($rs_job[$i]["job_code"]); ?> <br />
                  <br />
                  <?PHP

							  		if(trim($rs_job[$i]["job_skillz"])!= "")

									{// skill

							  ?>

                  <strong>Required Skills:</strong> <?PHP echo  substr(strip_tags(html_entity_decode($rs_job[$i]["job_skillz"])),0,350); ?>...<br />
                  <br />
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
                  <br />
                  <?PHP

							  

							  ?> <!--<a href="job_details.php?jid=<?PHP //echo $rs_job[$i]["ID"];?>" class="link-merun"><img src="<?PHP //echo SITE_URL; ?>knpic/view-details.gif" height="23" width="95" border="0" /></a>--> <a href="<?PHP echo SITE_URL.'job/'.html_entity_decode($rs_job[$i]['ID']).'/'.$db->stringToUrlSlug($rs_job[$i]['job_title']); ?>" class="link-merun"> <img src="<?PHP echo SITE_URL; ?>knpic/view-details.gif" height="23" width="95" border="0" /></a>&nbsp; &nbsp; <a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent1" class="thickbox link-merun" title="" onclick="document.getElementById('url_frd').value = '<?PHP echo $rs_job[$i][ID]; ?>';"><img src="<?PHP echo SITE_URL; ?>knpic/forward-friend.gif" height="23" width="129" border="0" /></a>
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
          <div class="job-list-r1">
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
