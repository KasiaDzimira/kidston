<?PHP
		include("support/firstline.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?PHP 
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<title>Offene Stellen bei KIDSTON - Jobs im HR-Bereich, Personalwesen</title>
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<title>Job vacancies at KIDSTON – jobs in the HR department, personnel</title>
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="description" content="Suchen Sie eine Stelle im Bereich Human Ressources? Herzlich willkommen bei KIDSTON!">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="description" content="Are you looking for a job in Human Resources? Then welcome to KIDSTON!">
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="keywords" content="offene stellen, stellen hr, stellen personalwesen, jobs hr, jobs personalwesen">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="keywords" content="Job vacancies, HR jobs, personnel jobs, HR jobs, personnel jobs ">
<?PHP
}
?>
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="kninc/kn-style.css" rel="stylesheet" type="text/css" />
<script src="kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="kninc/jquery.js"></script>
<script type="text/javascript" src="inc1ud35/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="kninc/menu.js"></script>
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
<?PHP include("login.php");
	  include("ffriend_intern.php"); ?>
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
		 <span class="band-orange">Willkommen ...</span><br />... im KIDSTON-Team</div>
		 <?PHP
		 	}
			if($_SESSION["slanguage"] == "2")
			{
		?>	
          <span class="band-orange">Welcome ...</span><br />... to the KIDSTON team</div>
		  <?PHP
		  	}
			?>
        </div>
	    <div class="top-band-right"><img src="<?PHP echo SITE_URL; ?>toppic/15.jpg" height="125" width="475" border="0" /></div>
      </div>
	  <div id="content-box-bg">
		  		<div class="inner-c1">
					<div class="inner-c1-pad">
						<!--<div class="inner-menu-red"><a href="<?PHP echo SITE_URL; ?>view-intern.php" class="menu-red-link">Search Intern jobs</a></div>
						<br /><br /><br />-->
						<?PHP 	$MID="1";
							include("support/left_menu.php"); 
						?>
						
                        <!--						<div class="inner-menu-red"><a href="#" class="menu-red-link">Submit your Resume</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Career Tips</a></div>
-->						<!--<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Work with kids ton</a></div>-->
					</div>
		  		</div>
				<div class="inner-c2">
					<div class="h1">
					<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					{
						echo "Interne Stellen";
						
					}
					if($_SESSION["slanguage"] == "2")
					{
						echo "Interne jobs";
						
					}
					?>
					 </div>
					<div class="frm-content-area">
					<?PHP
						if($_GET["resmsg"] != "")
						{
					?>
					<center>
					
					<?PHP echo $db->errmsg[$db->decode64($_GET["resmsg"])];?></center>
					<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
					?>
					<script language="javascript"> 
						 prmt("Bewerbung erfolgreich gesendet!");
						//return false;
					</script>
					<?PHP
						}
						else
						{
					?>	
					<script language="javascript"> 
						 prmt("Application successfully sent!");
						// return false;
					</script>
					<?PHP
						}
					?>

					<?PHP
						}
					?>
				
					<span class="h3">
					<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					{
						echo "Interessieren Sie sich für eine Stelle bei KIDSTON? Herzlich willkommen!";
					}
					if($_SESSION["slanguage"] == "2")
					{
						echo "Are you interested in a job with KIDSTON? Welcome!";
					}
//					?></span>
<br />
					<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					{
					echo "Es erwarten Sie ein kleines, junges und dynamisches Team, zeitgemässe Anstellungsbedingungen und ein attraktiver Arbeitsstandort in der Stadt Zürich. Hier finden Sie alle Stellen, die zurzeit bei uns offen sind. 
Wir freuen uns auf Ihre Bewerbung!";
					}
					if($_SESSION["slanguage"] == "2")
					{
					echo "A small, young and dynamic team awaits you with contemporary working conditions and an attractive workplace in the city of Zurich. Here you can find all the job vacancies currently available. We look forward to receiving your application!";
					}
					?>					
					</div>
					<?PHP
							// Page number and page limit
							$page = $_GET['page'];
							$limit = 25;
							$curdate = date("Y-m-d");
					 		// Job listing query
							$sql_image_pg = "select jm.job_asap,jm.ID,jm.org_id,jm.job_business,jm.job_code,jm.job_title,jm.job_type,jm.job_duration,jm.job_brief,jm.job_desc,jm.job_salary,jm.job_atype,jm.job_response,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,DATE_FORMAT(jm.postedon,'%d %b %Y') as pdate,jm.admin_id,jm.status,cm.comp_name from job_details jm, company_details cm where $appqry jm.job_atype = 'Intern' and  jm.status = 'Y' and cm.status ='Y' and jm.org_id = cm.ID and (jm.apply_date >= '$curdate' or jm.job_asap='asap' or jm.job_asap='nV' or jm.job_asap='by appt') order by jm.ID desc";
	
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
						<div class="job-list-r1">
							<div class="job-head-sec"><span class="h2">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
								echo "Interne Stellenangebote";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Internal job offers";
							}
							?></span></div>
<?PHP	
							if($pager->numPages > 1)
							{// IF PG #
?>
							<div class="job-nxt">
							<?PHP
								if ($page == 1)
								{// # 1
							?>
							<a href="javascript:;" class="pg-link">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
								echo "rückwärts";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Previous";
							}
							?></a>
							<?PHP
								}// # 1
								else
								{// # 1
							?>
							<a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?page=<?PHP echo ($page - 1); ?>" class="pg-link">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
								echo "rückwärts";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Previous";
							}
							?>	</a>
							<?PHP
								}// # 1
							?>
							|
							<?PHP
								if ($page == $pager->numPages)
								{// # 1
							?>
							<a href="javascript:;" class="pg-link">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
								echo "vorwärts";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Next";
							}
							?>		
							</a>
							<?PHP
								}// # 1
								else
								{// # 1
							?>
							<a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?page=<?PHP echo ($page + 1); ?>" class="pg-link">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
								echo "vorwärts";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Next";
							}
							?></a>
							<?PHP
								}// # 1
								$startnum = ($limit * ($page-1)) + 1;
								//$startnum = ($startnum + 1) - $count_rs;
							?>
							</div>
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							?>
							<div class="job-paging">Angezeigt <?PHP echo $startnum; ?> bis <?PHP echo ($startnum + $count_rs) - 1; ?> von <?PHP echo $count_pg; ?> Interne </div>
							<?PHP
							}
							if($_SESSION["slanguage"] == "2")
							{
							?>	
							<div class="job-paging">Displaying <?PHP echo $startnum; ?> to <?PHP echo ($startnum + $count_rs) - 1; ?> of <?PHP echo $count_pg; ?> Intern Jobs </div>
							<?PHP
							}
							?>
							
<?PHP
							}// IF PG #
?>							
							
						</div>
						<div class="job-list-r2">
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
								<?PHP
								if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
								{
								?>		
                              <td width="120" align="left" valign="top" class="tab-h">Datum</td>
							  <?PHP
							 	}
							  if($_SESSION["slanguage"] == "2")
								{
								?>	
							  <td width="120" align="left" valign="top" class="tab-h">Date</td>
							  <?PHP
							  	}
							  ?>
							  <?PHP
								if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
								{
								?>	
                              <td align="left" valign="top" class="tab-h">Stellentitel & Beschreibung</td>
							   <?PHP
							  	}
							  if($_SESSION["slanguage"] == "2")
								{
								?>	
							  <td align="left" valign="top" class="tab-h">Job title & description</td>
							  <?PHP
							  	}
							  ?>
							   <?PHP
								if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
								{
								?>	
                              <td width="120" align="left" valign="top" class="tab-h">Einsatzort</td>
							  <?PHP
							  	}
							  if($_SESSION["slanguage"] == "2")
								{
								?>								  
							  <td width="120" align="left" valign="top" class="tab-h">Location</td>
							  <?PHP
							  }
							  ?>
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
                              <td align="left" valign="top" class="<?PHP echo $tab_row; ?>">
							  <a href="<?PHP echo "intern/".html_entity_decode($rs_job[$i]["ID"])."/".$db->stringToUrlSlug(html_entity_decode($rs_job[$i]["job_title"]));?>" class="link-head-red"><?PHP echo html_entity_decode($rs_job[$i]["job_title"]); ?></a><br />
                                <br />
							  <?PHP
							  		if($rs_job[$i]["job_brief"] != "")
									{// brief
							  ?>
                                <?PHP echo html_entity_decode($rs_job[$i]["job_brief"]); ?> ...
								<br />
                                <br />
							  <?PHP 
							  		}// brief
							  ?>
							  <?PHP
							  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							  {
							  ?>
                                <strong>Stellennummer:</strong> <?PHP echo html_entity_decode($rs_job[$i]["job_code"]); ?> <br />
								<?PHP
								}
								if($_SESSION["slanguage"] == "2")
								{
								?>
								<strong>Job Code:</strong> <?PHP echo html_entity_decode($rs_job[$i]["job_code"]); ?> <br /> 
								<?PHP
								}
								?>
							  <?PHP
							  		if(trim($rs_job[$i]["job_skillz"])!= "")
									{// skill
							  ?>
							  <?PHP
							  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							  {
							  ?>
								<strong>Anforderungen:</strong> <?PHP echo  substr(strip_tags(html_entity_decode($rs_job[$i]["job_skillz"])),0,350); ?>...<br />
								<?PHP
								}
								if($_SESSION["slanguage"] == "2")
								{
								?>
								<strong>Required Skills:</strong> <?PHP echo  substr(strip_tags(html_entity_decode($rs_job[$i]["job_skillz"])),0,350); ?>...<br />
								<?PHP
								}
								?>
							  <?PHP
							  		}// skill
							  ?>
							   <?PHP
							  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							  {
							  $pdate = " ";
								$st = explode(" ",$rs_job[$i]["dd"]);
								
								//echo $st[0];
										$pmonth = " ";
										//echo $st[1];
										if($st[1] == "January,")
										{
											$pmonth = "Januar";
										}
										if($st[1] == "February,")
										{
											$pmonth = "Februar";
										}
										if($st[1] == "March,")
										{
											$pmonth = "März";
										}
										if($st[1] == "April,")
										{
											$pmonth = "April";
										}
										if($st[1] == "May,")
										{
											$pmonth = "Mai";
										}
										if($st[1] == "June,")
										{
											$pmonth = "Juni";
										}
										if($st[1] == "July,")
										{
											$pmonth = "Juli";
										}
										if($st[1] == "August,")
										{
											$pmonth = "August";
										}
										if($st[1] == "September,")
										{
											$pmonth = "September";
										}
										if($st[1] == "October,")
										{
											$pmonth = "Oktober";
										}
										if($st[1] == "November,")
										{
											$pmonth = "November";
										}
										if($st[1] == "December,")
										{
											$pmonth = "Dezember";
										}
										$arr  = array("th","st","nd","rd");
										$pdate = str_replace($arr,".",$st[0])." ".$pmonth." ".$st[2]; 
							  ?>
							  <strong>Einsatzbeginn :</strong> <?PHP if($rs_job[$i]["dd"]!=""){echo html_entity_decode($pdate);}else{ echo html_entity_decode($rs_job[$i]["job_asap"]); }?> <br />
							  <?PHP
								}
								if($_SESSION["slanguage"] == "2")
								{
								?>
							   <strong>Entry Date :</strong> <?PHP if($rs_job[$i]["dd"]!=""){echo html_entity_decode($rs_job[$i]["dd"]);}else{ echo html_entity_decode($rs_job[$i]["job_asap"]); }?> <br />
							   <?PHP
							   }
							   ?>
<!--							  <strong>Company:</strong> <?PHP //echo $rs_job[$i]["comp_name"]; ?> <br />
-->                                <br />                          
<!--								<a href="job_apply.php?jid=<?PHP //echo $db->encode64($rs_job[$i]["ID"]);?>" class="link-merun">View Details</a>-->
								<?PHP
								if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
								{
								?>
								<a href="<?PHP echo 'intern/'.html_entity_decode($rs_job[$i]['ID']).'/'.$db->stringToUrlSlug($rs_job[$i]['job_title']); ?>" ><img src="<?PHP echo SITE_URL; ?>knpic/Details-ansehen.gif" height="23" width="119" border="0" /></a>
								 &nbsp; &nbsp;
								<a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent1" class="thickbox link-merun" title="" onclick="document.getElementById('url_frd').value = '<?PHP echo $rs_job[$i][ID]; ?>';">
								<img src="<?PHP echo SITE_URL; ?>knpic/inserat.gif" height="23" width="161" border="0" /></a>						<?PHP
								}
								if($_SESSION["slanguage"] == "2")
								{
								?>
									<a href="<?PHP echo 'intern/'.html_entity_decode($rs_job[$i]['ID']).'/'.$db->stringToUrlSlug($rs_job[$i]['job_title']); ?>" ><img src="<?PHP echo SITE_URL; ?>knpic/view-details.gif" height="23" width="95" border="0" /></a>
								 &nbsp; &nbsp;
								<a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent1" class="thickbox link-merun" title="" onclick="document.getElementById('url_frd').value = '<?PHP echo $rs_job[$i][ID]; ?>';">
								<img src="<?PHP echo SITE_URL; ?>knpic/forward-friend.gif" height="23" width="129" border="0" /></a>		
								<?PHP
								}
								?>
								
									  </td>
                              <td align="left" valign="top" class="<?PHP echo $tab_row; ?>">
							  <?PHP
							  		if($rs_job[$i]["location"] != "")
									{// location
							  			 echo html_entity_decode($rs_job[$i]["location"]); 
							  		}//
							  ?>							  </td>
                            </tr>
<?PHP		
								$sn = $sn + 1;
							}// FOR $i
?>							
<!--                            <tr>
                              <td align="left" valign="top" class="tab-r2">11 Sep 2009<br />
                              12:43 PM</td>
                              <td align="left" valign="top" class="tab-r2"><a href="#" class="link-bold">SAP Business Objects Analyst</a><br />
                                  <br />
3 years working experience with RPG/400 and ILE programming in an IBM AS/400 environment. Knowledgeable and experience in JD Edwards will be preferred. Analyse, design, and develop RP ... <br />
<br />
<strong>Job No:</strong> CDAL598755 <br />        <strong>Required Skills:</strong> Bachelor degree in any science stream, BE, B.Tech and MBA<br />        <br />        <a href="#" class="link-merun">Apply Now</a> &nbsp; &nbsp; <a href="#" class="link-merun">Forword to Friend</a></td>
                              <td align="left" valign="top" class="tab-r2">NewGersey</td>
                            </tr>
                            <tr>
                              <td align="left" valign="top" class="<?PHP echo $tab_row; ?>">11 Sep 2009<br />
                                12:43 PM</td>
                              <td align="left" valign="top" class="<?PHP echo $tab_row; ?>"><a href="#" class="link-bold">SAP Business Objects Analyst</a><br />
                                  <br />
                                3 years working experience with RPG/400 and ILE programming in an IBM AS/400 environment. Knowledgeable and experience in JD Edwards will be preferred. Analyse, design, and develop RP ... <br />
                                <br />
                                <strong>Job No:</strong> CDAL598755 <br />
                                <strong>Required Skills:</strong> Bachelor degree in any science stream, BE, B.Tech and MBA<br />
                                <br />
                                <a href="#" class="link-merun">Apply Now</a> &nbsp; &nbsp; <a href="#" class="link-merun">Forword to Friend</a></td>
                              <td align="left" valign="top" class="<?PHP echo $tab_row; ?>">NewGersey</td>
                            </tr>
                            <tr>
                              <td align="left" valign="top" class="tab-r2">11 Sep 2009<br />
                                12:43 PM</td>
                              <td align="left" valign="top" class="tab-r2"><a href="#" class="link-bold">SAP Business Objects Analyst</a><br />
                                  <br />
                                3 years working experience with RPG/400 and ILE programming in an IBM AS/400 environment. Knowledgeable and experience in JD Edwards will be preferred. Analyse, design, and develop RP ... <br />
                                <br />
                                <strong>Job No:</strong> CDAL598755 <br />
                                <strong>Required Skills:</strong> Bachelor degree in any science stream, BE, B.Tech and MBA<br />
                                <br />
                                <a href="#" class="link-merun">Apply Now</a> &nbsp; &nbsp; <a href="#" class="link-merun">Forword to Friend</a></td>
                              <td align="left" valign="top" class="tab-r2">NewGersey</td>
                            </tr>
-->                          </table>
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
							<a href="javascript:;" class="pg-link">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
								echo "rückwärts";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Previous";
							}
							?>		
							</a>
							<?PHP
								}// # 1
								else
								{// # 1
							?>
							<a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?page=<?PHP echo ($page - 1); ?>" class="pg-link">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
								echo "rückwärts";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Previous";
							}
							?>	
							</a>
							<?PHP
								}// # 1
							?>
							|
							<?PHP
								if ($page == $pager->numPages)
								{// # 1
							?>
							<a href="javascript:;" class="pg-link">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
								echo "vorwärts";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Next";
							}
							?></a>
							<?PHP
								}// # 1
								else
								{// # 1
							?>
							<a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?page=<?PHP echo ($page + 1); ?>" class="pg-link">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
								echo "vorwärts";
							}
							if($_SESSION["slanguage"] == "2")
							{
								echo "Next";
							}
							?>	</a>
							<?PHP
								}// # 1
								$startnum = ($limit * ($page-1)) + 1;
								//$startnum = ($startnum + 1) - $count_rs;
							?></div>
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							?>
							<div class="job-paging">Angezeigt <?PHP echo $startnum; ?> bis <?PHP echo ($startnum + $count_rs) - 1; ?> von <?PHP echo $count_pg; ?> Interne </div>
							<?PHP
							}
							if($_SESSION["slanguage"] == "2")
							{
							?>
							<div class="job-paging">Displaying <?PHP echo $startnum; ?> to <?PHP echo ($startnum + $count_rs) - 1; ?> of <?PHP echo $count_pg; ?> Intern Jobs </div>
							<?PHP
							}
							?>
<?PHP
								}// # 1
?>							
						</div>
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