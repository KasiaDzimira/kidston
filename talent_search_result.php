<?PHP 
	include("support/firstline.php");
	if(isset($_REQUEST['Submit']) && $_REQUEST['Submit']== "Search")
{ 
		$stud_srch_txt = $_REQUEST["txt_it_srch"];

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Current jobs at KIDSTON – job search, job offers</title>
<meta name="description" content="Are you looking for a new challenge in IT or in the commercial sectors? KIDSTON is seeking top applicants for top jobs." />
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
       
<?PHP // Page number and page limit


$server = "mysql18j04.db.hostpoint.internal";

$username = "borisple_kidsto";

$password = "Gewitter03$!";

$database ="borisple_kidsto";



$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else
{
mysql_select_db($database, $mysqlConnection);
}
							$page = $_GET['page'];
							$limit = 3;
							$curdate = date("Y-m-d");
					 		// Job listing query
							//echo "TXT: ".$stud_srch_txt."<br>";
							
						 $sql_image_pg = "select ID,talent_code,curr_design,know_summ,location,busi_line,skills,available from talents WHERE (`curr_design` like '%".$stud_srch_txt."%' or busi_line like '%".$stud_srch_txt."%' or `skills` like '%".$stud_srch_txt."%'  or talent_code like '%".$stud_srch_txt."%'  or busi_line like '%".$stud_srch_txt."%'  or skills like '%".$stud_srch_txt."%') and status <> 'D' and status = 'Y' order by ID desc";

							// Execute query
							$fetch_image = $db->getTableArray($sql_image_pg);
							//echo "Last Query:".$db->last_query;
							//echo "<br>Last Error:".$db->last_error;
$server = "mysql18j04.db.hostpoint.internal";

$username = "borisple_kidsto";

$password = "Gewitter03$!";

$database ="borisple_kidsto";



$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else
{
mysql_select_db($database, $mysqlConnection);
}
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
        <div class="it-jobs-table">
						<div class="talent-search">
							<div class="job-head-sec"><span class="h2">&nbsp;&nbsp;&nbsp;Available candidates</span></div>
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
							
							<div class="job-paging">Displaying <?PHP echo $startnum; ?> to <?PHP echo ($startnum + $count_rs) - 1; ?> of <?PHP echo $count_pg; ?> Talents </div>
							
<?PHP
							}// IF PG #
?>							
							
						</div>
<?PHP
							if($count_rs > 0)
							{// rec count
?>						
						  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  <!--                            <tr>
                              <td align="left" valign="top" class="tab-h">&nbsp;</td>
                              <td align="left" valign="top" class="tab-h"><?PHP //echo $sql_image_pg; ?></td>
                              <td align="left" valign="top" class="tab-h">&nbsp;</td>
                            </tr>
-->                            <tr>                              
    <td align="left" valign="top" class="tab-h">Description</td>
    <td width="120" align="left" valign="top" class="tab-h">Availability</td>
    </tr>
  <?PHP
							for($i = 0;$i<$count_rs;$i++)
							{// FOR $i
								$tab_row = "tab-r1";
								if($sn % 2 == 0)
									$tab_row = "tab-r2";
?>							
						    <tr>                              
						      <td align="left" valign="top" class="<?PHP echo $tab_row; ?>">
                              
                              <a href="<?PHP echo SITE_URL."talent/".$rs_job[$i]["ID"]."/".$db->stringToUrlSlug($rs_job[$i]["curr_design"]);?>" class="link-head-red"><?PHP echo html_entity_decode($rs_job[$i]["curr_design"]); ?></a>
						       <!-- <a href="<?PHP //echo "talent/".$rs_job[$i]["ID"]."/".$db->stringToUrlSlug($rs_job[$i]["curr_design"]);?>" class="link-head-red"><?PHP //echo html_entity_decode($rs_job[$i]["curr_design"]); ?></a>--><br />
						        <br />
						        <strong>Candidate ID:</strong> <?PHP echo html_entity_decode($rs_job[$i]["talent_code"]); ?> <br /> 
						        <?PHP
							  		if(trim($rs_job[$i]["know_summ"])!= "")
									{// know_summ
							  ?>
						        <strong>Know How summary:</strong><br /><?PHP echo html_entity_decode($rs_job[$i]["know_summ"]); ?><br />
						        <?PHP
							  		}// know_summ
							  		if(trim($rs_job[$i]["skills"])!= "")
									{// skill
							  ?>
						        <strong>Skillz:</strong> <?PHP echo substr(strip_tags(html_entity_decode($rs_job[$i]["skills"])),0,350); ?>...<br /> 
						        <?PHP		
									}// skill
								if(trim($rs_job[$i]["location"])!= "")
								{// skill
							  ?>
						        <strong>Location:</strong> <?PHP echo $rs_job[$i]["location"]; ?> <br />
						        <br />   
						        <?PHP		
									}// skill
							  ?>
						        <span style="float:right;"> <a href="<?PHP echo SITE_URL.'talent/'.$rs_job[$i]['ID'].'/'.$db->stringToUrlSlug($rs_job[$i]['busi_line']);?>" class="link-merun"><img src="<?PHP echo SITE_URL; ?>knpic/view-details.gif" height="23" width="95" border="0" /></a></span>
                                
                                <!--<a href="<?PHP //echo 'talent/'.$rs_job[$i]['ID'].'/'.$db->stringToUrlSlug($rs_job[$i]['busi_line']); ?>" class="link-merun"><img src="<?PHP //echo SITE_URL; ?>knpic/view-details.gif" height="23" width="95" border="0" /></a>-->
						        </td>
						      <td align="left" valign="top" class="<?PHP echo $tab_row; ?>">
						        <?PHP
							  		if($rs_job[$i]["available"] != "")
									{// location
							  			 echo $rs_job[$i]["available"]; 
							  		}//
							  ?>							  </td>
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
						
						<div class="talent-search">
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
							?>						  </div>
<div class="job-paging">Displaying <?PHP echo $startnum; ?> to <?PHP echo ($startnum + $count_rs) - 1; ?> of <?PHP echo $count_pg; ?> Talents </div>
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
