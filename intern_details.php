<?PHP
		include("support/firstline.php");

		$job_id = $_REQUEST['jid'];
		
		
		$curdate = date("Y-m-d");
		$job_query = $db->fetchSingleRow("select jm.ID,jm.org_id,jm.job_quota,jm.job_business,jm.job_code,jm.job_title,jm.job_type,jm.job_duration,jm.job_desc,jm.add_com,jm.job_salary,jm.job_response,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,jm.cont_purl,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.job_asap,jm.create_on,jm.created_ip,jm.admin_id,DATE_FORMAT(jm.postedon,'%D %M, %Y') as pdate,cm.ID,cm.comp_name,cm.industry_name,cm.country,cm.state,cm.cont_name,cm.cont_designation,cm.cont_email,cm.company_info from job_details jm, company_details cm where jm.status='Y' and jm.ID = '$job_id' and jm.org_id = cm.ID and cm.status='Y'");
		//echo "select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_type,jm.job_duration,jm.job_desc,jm.job_salary,jm.job_response,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,jm.cont_purl,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.create_on,jm.created_ip,jm.admin_id,DATE_FORMAT(jm.postedon,'%D %M, %Y') as pdate,cm.ID,cm.comp_name,cm.industry_name,cm.country,cm.state,cm.cont_name,cm.cont_designation,cm.cont_email,cm.cont_phone,cm.company_info from job_details jm, company_details cm where jm.apply_date >= '$curdate' and jm.status='Y' and jm.ID = '$job_id' and jm.org_id = cm.ID and cm.status='Y'";
		if($job_query["ID"] <= 0 && $job_query["ID"] != $job_id)
		{ ?>
			<script language="javascript">//window.location = "<?PHP echo SITE_URL;?>view-latest-openings.php";</script>
<?PHP 		//die("Invalid job request");
		}			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!--<title> <?PHP //echo $job_query['job_title']; ?> <?PHP //echo $job_query['job_code']; ?> | <?PHP //echo $job_query['location']; ?> at KIDSTON </title>-->
<?PHP 
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<title> <?PHP echo $job_query['job_title']; ?> – HR-Jobs bei KIDSTON </title>
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<title> <?PHP echo $job_query['job_title']; ?> – HR jobs at KIDSTON</title>
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
<link href="<?PHP echo SITE_URL;?>kninc/kn-style.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>

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
		 <span class="band-orange">Willkommen…</span><br />…im KIDSTON-Team</div>
		 <?PHP
		 	}
			if($_SESSION["slanguage"] == "2")
			{
		?>	
          <span class="band-orange">Welcome...</span><br />...to the KIDSTON team</div>
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
					
					</div>
		  		</div>
				<?PHP
						if($job_query)
						{
						
							
				?>
				<div class="inner-c2">
				<div class="align-right"><img src="<?PHP echo SITE_URL;?>knpic/icon-print.gif" alt="" width="16" height="13" border="0" />&nbsp;<a href="javascript:printViewJobs(<?PHP echo $_REQUEST['jid']; ?>);">Print</a> </div>
					<div class="h1"><a href="<?PHP echo SITE_URL; ?>view-intern.php">
					<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					{
						echo "Interne Stellen";
					}
					if($_SESSION["slanguage"] == "2")
					{
						echo "Internal jobs";
					}
					?>
					</a> &rsaquo;&rsaquo; <?PHP echo "[".html_entity_decode($job_query['job_title']) ."]"; ?></div> <div align="center">
					<?PHP if($_REQUEST['sid']!="")
						  {
						  	echo "Success: Process Completed!";
						  }
					?></div><div style="float:right">

					</div>
											
						<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="45" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td><div style="float: left;" align="left" class="h3"><?PHP echo html_entity_decode($job_query['job_title']); ?> [<?PHP echo html_entity_decode($job_query['job_code']); ?>]</div>
										<div style="float: right;" align="right" class="smtxt-g"><?PHP if($job_query['pdate']!=""){ ?>
                                        [<?PHP if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Inseriert am:";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Posted on:";
										}
									?>
									<?PHP
									if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									{
										$pdate = " ";
										$st = explode(" " ,$job_query['pdate']);
										$pmonth = " ";
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
										$arr = array("th","st","nd","rd");
										$pdate = str_replace($arr,".",$st[0])." ".$pmonth." ".$st[2];
									echo html_entity_decode($pdate);?>]
									<?PHP 
									}
									if($_SESSION["slanguage"] == "2")
									{
										echo html_entity_decode($job_query['pdate']);	
									?>]
                                    <?PHP
									}
										}
										?></div> </td>
									  </tr>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
									</table>							</td>
                          </tr>
                          <tr>
                            <td height="45" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td height="30" align="left" valign="bottom" class="head-pos">
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
										echo "Firmendetails";
										}
										if($_SESSION["slanguage"] == "2")
										{
										echo "Company details";
										}
										?></td>
									  </tr>
<!--									  <tr>
									    <td height="30" align="left" valign="bottom"> 
										<div style="float: left;" align="left"><strong><?PHP //echo $job_query['comp_name']; ?></strong></div>
										<div style="float: right;" align="right" class="smtxt-g"><?PHP //echo $job_query['country']; ?>&nbsp;<?PHP //echo $job_query['state']; ?></div>										</td>
								      </tr>
								  <tr>
									    <td>&nbsp;</td>
								      </tr>-->	
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Beschreibung der Einsatzfirma";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Description of the company recruiting";
										}
										?>	 : </strong> </td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['company_info']);//echo html_entity_decode($job_query['company_info']); ?></td>
								      </tr>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Branche";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Line of business";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px">
										<?PHP 
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											$industry = "";
											$inds = $job_query["industry_name"];
											if($inds == "Agriculture/Forestry/Wood")
											{
												$industry = "Land-/Forstwirtschaft/Holz";
											}
											if($inds == "Banking/Financial institutions")
											{
												$industry = "Banken/Finanzinstitute";
											}
											if($inds == "Building trade/Real estate")
											{
												$industry = "Baugewerbe/Immobilien";
											}
											if($inds == "Catering/Hotel")
											{
												$industry = "Gastgewerbe/Hotellerie";
											}	
											if($inds == "Chemicals/Pharmaceuticals")
											{
												$industry = "Chemie/Pharma";
											}
											if($inds == "Commercial operation/Skilled crafts")
											{
												$industry = "Gewerbe/Handwerk allgemein";
											}
											if($inds == "Consulting various")
											{
												$industry = "Beratung diverse";
											}
											if($inds == "Consumer/Luxury goods industry")
											{
												$industry = "Konsum-/Luxusgüterindustrie";
											}
											if($inds == "Education")
											{
												$industry = "Bildungswesen";
											}
											if($inds == "Health care/Social services")
											{
												$industry = "Gesundheits-/Sozialwesen";
											}
											if($inds == "Industry various")
											{
												$industry = "Industrie diverse";
											}
											if($inds == "Information technology/Telecom")
											{
												$industry = "Informatik/Telekommunikation";
											}
											if($inds == "Insurance")
											{
												$industry = "Versicherungen";
											}
											if($inds == "Legal/Business advice")
											{
												$industry = "Rechts-/Wirtschaftsberatung";
											}
											if($inds == "Machine/System construction")
											{
												$industry = "Maschinen-/Anlagenbau";
											}
											if($inds == "Media/Printing/Publishing")
											{
												$industry = "Medien/Druckerei/Verlage";
											}
											if($inds == "Public administration/Associations")
											{
												$industry = "Öffentl. Verwaltung/Verbände";
											}
											if($inds == "Retail trade/Wholesaling")
											{
												$industry = "Detail-/Grosshandel";
											}
											if($inds == "Service sector in general")
											{
												$industry = "Dienstleistungen allgemein";
											}
											if($inds == "Tourism/Travel/Recreation")
											{
												$industry = "Tourismus/Reisen/Freizeit";
											}
											if($inds == "Transport/Logistics")
											{
												$industry = "Transport/Logistik";
											}
											if($inds == "Utilities")
											{
												$industry = "Energie-/Wasserwirtschaft";
											}
										 echo html_entity_decode($industry); 
										 }
										 if($_SESSION["slanguage"] == "2")
										 {
										echo html_entity_decode($job_query['industry_name']); 
										}?>
										</td>
								      </tr>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
									</table>							</td>
                          </tr>
                          <tr>
                            <td height="45" align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td height="30" align="left" valign="bottom" class="head-pos">
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
										{
											echo "Stellendetails";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Job details";
										}
										?>	</td>
									  </tr>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
										{
											echo "Anstellungsart";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Type of position";
										}
										?>	 : </strong> </td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px">
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{	
											$jtype = "";
											$job_type = $job_query["job_type"];
											if($job_type == "Any")
											{
												$jtype = "Alle";
											}	
											if($job_type == "Permanent")
											{
												 $jtype = "Festanstellung";
											}
											if($job_type == "Temporary")
											{
												$jtype = "Temporär";
											}
											if($job_type == "Freelance")
											{
												$jtype = "Freelance";
											}
											echo html_entity_decode($jtype);
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo html_entity_decode($job_query['job_type']);
										}
										?></td>
								      </tr>
									   <?PHP
									   if($job_query['job_quota'] != "")
										{
										?>
										<tr>	
										<?PHP
									   if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									   {
									   ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Pensum: </strong></td>									<?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Quota:</strong></td>									<?PHP
										}
										?>		
									  </tr>
									  	<tr>	
										<?PHP
									   if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									   {
									   ?>
										 <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['job_quota']); ?></td>								<?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
									 <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['job_quota']); ?></td>								<?PHP
										}
										?>		
									  </tr>
									  <?PHP
									  }
									  ?>
									  <?PHP
									  	if($job_query['job_duration'] != "" &&  strtoupper($job_query['job_type']) != "PERMANENT")
										{
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
										{
											echo "Duration";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Dauer";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['job_duration']); ?></td>
								      </tr>
									  <?PHP
									  	}
										//if($job_query['job_salary'] != "")
										//{
									  ?>
<!--									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Salary : </strong></td>
									  </tr>
									  <tr>
									    <td><?PHP //echo $job_query['job_salary']; ?></td>
								      </tr>
-->									  <?PHP
									  	//}
										if($job_query['job_response'] != "")
										{
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
										{
											echo "Aufgaben";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Duties";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['job_response']); ?></td>
								      </tr>
									  <?PHP
									  	}
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Einsatzort";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Location";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['location']); ?></td>
								      </tr>
									  
									   <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Rubrik";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Category";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px">
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											$business = "";
											$sts = $job_query["job_business"];
											if($sts == "Admin./HR/Consulting/CEO")
											{
												$business = "Administration/HR/Consulting/CEO";
											}
											if($sts == "Finance/Trusts/Real estate")
											{
												$business = "Finanzen/Treuhand/Immobilien";
											}
											if($sts == "Banking/Insurance")
											{
												$business = "Banking/Versicherungswesen";
											}
											if($sts == "Product/Purchasing/Forwarding")
											{
												$business = "Produkt Mgmt/Einkauf/Disposition";
											}
											if($sts == "Sales/Customer service/Admin")
											{
												$business = "Verkauf/Kundendienst/Innendienst";
											}
											if($sts == "Information technology/Telecom")
											{
												$business = "Informatik/Telekommunikation";
											}
											if($sts == "Electronic/Mechanics/Engineering")
											{
												$business = "Elektronik/Mechanik/Technik";
											}	
											echo html_entity_decode($business);						
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo html_entity_decode($job_query['job_business']);
										}
										?></td>
								      </tr>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Einsatzbeginn";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Start of employment";
										}
										?> : </strong></td>
									  </tr>
									  <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  	$pdate = " ";
										$st = explode(" ",$job_query["dd"]);
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
									    <td style="padding-left: 15px"><?PHP //echo html_entity_decode($job_query['dd']); ?>
										<?PHP if($job_query["dd"]!=""){echo html_entity_decode($pdate);}else{ echo html_entity_decode($job_query["job_asap"]); }?></td>
										<?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
										 <td style="padding-left: 15px"><?PHP //echo html_entity_decode($job_query['dd']); ?>
										<?PHP if($job_query["dd"]!=""){echo html_entity_decode($job_query["dd"]);}else{ echo html_entity_decode($job_query["job_asap"]); }?></td>
										<?PHP
										}
										?>
								      </tr>
									   
									  <tr>
										<td>&nbsp;</td>
									  </tr>
							  </table>							</td>
                          </tr><?PHP //if($job_query['job_desc']!=""){?>
<!--                          <tr>
                            <td height="45" align="left" valign="top">							
<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td height="30" align="left" valign="bottom" class="head-pos">Job Description</td>
									  </tr>
									  <tr>
									    <td><?PHP //echo htmlspecialchars_decode($job_query['job_desc']); ?></td>
								      </tr>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
									</table>						</td>
                          </tr>
-->                          <tr><?PHP// } ?>	
                            <td height="45" align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<!--									  <tr>
									    <td height="30" align="left" valign="bottom" class="smtxt" style="padding-left: 15px"><?PHP //echo html_entity_decode($job_query['add_com']); ?></td>
			      </tr>
-->	
									  <tr>
										<td height="30" align="left" valign="bottom" class="head-pos">
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
										echo "Gewünschtes Kandidatenprofil";
										}
										if($_SESSION["slanguage"] == "2")
										{
										echo "Candidate profile required";
										}
										?></td>
									  </tr>
								      <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Fähigkeiten";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Skills";
										}
										?>	 : </strong> </td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['job_skillz']); ?></td>
								      </tr>
									  <?PHP
										$lang = $db->getTableArray("select * from job_language where job_id='$job_id'");
										if(count($lang) > 0 )
										{ // if count
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Sprachen";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Languages";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px" class="smtxt">
										<?PHP
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
											
									                if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
												   {
												   	  echo html_entity_decode($lang[$j]['language'])."(".html_entity_decode($level).")"; 											   }
												  if($_SESSION["slanguage"] == "2")
												   {
												   	  echo html_entity_decode($lang[$j]['language'])."(".html_entity_decode($lang[$j]["language_level"]).")"; 					   }	
													  ?>		            </div>
							            <?PHP  
												} // for j
										?>										</td>
								      </tr>
									  <?PHP
									  	}// if count
									  ?>
									  </table><br />
									  <table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <?PHP
									  
										if($job_query['add_com'] != "")
										{
									  ?>
									  <tr>
									    <td height="30" align="left" valign="bottom" class="head-pos"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Zusätzliche Bemerkungen";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Additional comments";
										}
										?>	 : </strong></td>
			      </tr>
									  <tr>
									    <td height="30" align="left" valign="bottom" class="smtxt" style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['add_com']); ?></td>
			      </tr>
				  					 <?PHP
									 	}
									 ?>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
							  </table>							
							</td>
                          </tr>
                          <tr>
                            <td height="45" align="right" valign="top">
							<div id="sectiond-2" class="anchor">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							?>
							<a href="<?PHP echo SITE_URL;?>intern_apply.php?jid=<?PHP echo $db->encode64($_REQUEST['jid']);?>" class="link-merun"><img src="<?PHP echo SITE_URL; ?>knpic/jetzt-btn.gif" height="23" width="110" border="0" /></a>
							<?PHP
							}
							if($_SESSION["slanguage"] == "2")
							{
							?><a href="<?PHP echo SITE_URL;?>intern_apply.php?jid=<?PHP echo $db->encode64($_REQUEST['jid']);?>" class="link-merun"><img src="<?PHP echo SITE_URL; ?>knpic/apply-now.gif" height="23" width="95" border="0" /></a>
							<?PHP
							}
							?>&nbsp;&nbsp;
  							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							?>
							<a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent1" class="thickbox link-merun" title="" onClick="document.getElementById('url_frd').value = '<?PHP echo $job_id; ?>';"><img src="<?PHP echo SITE_URL; ?>knpic/inserat.gif" height="23" width="161" border="0" /></a>
							<?PHP
							}
							if($_SESSION["slanguage"] == "2") 
							{
							?>
							<a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent1" class="thickbox link-merun" title="" onClick="document.getElementById('url_frd').value = '<?PHP echo $job_id; ?>';"> <img src="<?PHP echo SITE_URL; ?>knpic/forward-friend.gif" height="23" width="129" border="0" /></a>
						  <?PHP
						  }
						  ?></div>
					</td>													
                          </tr>
						  
                          <tr>
                            <td height="45" align="left" valign="top">&nbsp;</td>
                          </tr>
                        </table>
					
				  <!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<?PHP if($job_query['job_title']!=""){?>
						  <tr>
							<td width="25%" height="35">Job Title </td>
						    <td width="2%" align="center"><strong>:</strong></td>
						    <td width="73%"><?PHP echo html_entity_decode($job_query['job_title']);?></td>
						  </tr>
						 <?PHP } if($job_query['job_code']!=""){?>
						  <tr>
						    <td height="35">Job Code </td>
					        <td height="35" align="center"><strong>:</strong></td>
					        <td><?PHP echo html_entity_decode($job_query['job_code']);?></td>
						  </tr>
						 <?PHP } if($job_query['job_code']!=""){?>						  
						  <tr>
						    <td height="35">Date</td>
						    <td height="35" align="center"><strong>:</strong></td>
						    <td><?PHP echo date("d-F-Y", strtotime($job_query['apply_date']));?></td>
					      </tr>
						 <?PHP } if($job_query['job_type']!=""){?>						  						  
						  <tr>
						    <td height="35">Job Type </td>
						    <td height="35" align="center"><strong>:</strong></td>
						    <td><?PHP echo html_entity_decode($job_query['job_type']);?></td>
					      </tr>
						  <?PHP } if($job_query['location']!=""){?>				
						  <tr>
						    <td height="35">Location</td>
						    <td height="35" align="center"><strong>:</strong></td>
						    <td><?PHP echo html_entity_decode($job_query['location']);?></td>
					      </tr>
						   <?PHP } if($job_query['job_salary']!=""){?>	
						  <tr>
						    <td height="35"> Salary	</td>
						    <td height="35" align="center"><strong>:</strong></td>
						    <td><?PHP echo html_entity_decode($job_query['job_salary']);?></td>
					      </tr>
						   <?PHP }
						   	$lang = $db->getTableArray("select * from job_language where job_id='$job_id'");
							if(count($lang) > 0 )
							{ // if count
						    ?>	
						  <tr>
						    <td height="35" valign="top">Language</td>
						    <td height="35" align="center" valign="top"><strong>:</strong></td>
						    <td>
							<?PHP for($j=0;$j<count($lang);$j++)
								  { // for j
								?>
								<div>
									<?PHP echo html_entity_decode($lang[$j]['language'])."(".html_entity_decode($lang[$j]['language_level']).")";?>
								</div>
							<?PHP } // for j ?>
							</td>
			      </tr>
						  <?PHP } // if count 
						  if($job_query['job_brief']!=""){?>	
						  <tr>
						    <td height="35">Short Description </td>
						    <td height="35" align="center"><strong>:</strong></td>
						    <td><?PHP //echo $job_query['job_brief'];?></td>
					      </tr>
						  <?PHP }  if($job_query['job_desc']!=""){?>	
						  <tr>
						    <td height="35"> Description </td>
						    <td height="35" align="center"><strong>:</strong></td>
						    <td><?PHP echo html_entity_decode($job_query['job_desc']);?></td>
					      </tr>
						  <?PHP } ?>
						  <tr>
						    <td height="35">&nbsp;</td>
						    <td height="35" align="center">&nbsp;</td>
						    <td><a href="<?PHP echo SITE_URL;?>job_apply.php?jid=<?PHP echo $db->encode64($_REQUEST['jid']);?>" class="link-merun">Apply Now</a> &nbsp; &nbsp; <a href="#" class="link-merun">Forword to Friend</a></td>
					      </tr>
			      </table>-->					
                </div>			
				<?PHP
					}
				?>
	  </div>
	</div>
    <?PHP include("footer.php");?>
  </div>
</div>
<?PHP include("footer-red.php");?>
</body>
</html>