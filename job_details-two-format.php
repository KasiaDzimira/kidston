<?PHP 
include("support/firstline.php");
$job_id = $_REQUEST['jid'];
$curdate = date("Y-m-d");
$job_query = $db->fetchSingleRow("select jm.ID,jm.org_id,jm.job_code,jm.job_business,jm.job_title,jm.job_type,jm.job_duration,jm.job_desc,jm.add_com,jm.job_salary,jm.job_response,jm.job_quota,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,jm.cont_purl,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.create_on,jm.created_ip,jm.admin_id,DATE_FORMAT(jm.postedon,'%D %M, %Y') as pdate,jm.job_asap,cm.ID,cm.comp_name,cm.industry_name,cm.country,cm.state,cm.cont_name,cm.cont_designation,cm.cont_email,cm.company_info from job_details jm, company_details cm where jm.status='Y' and jm.ID = '$job_id' and jm.org_id = cm.ID and cm.status='Y'");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="KIDSTON vermittelt Top-Kandidaten an Top-Unternehmen im IT-Bereich und im kaufmännischen Sektor.">
<meta name="description" content="KIDSTON introduces top candidates to top companies in the IT and commercial sectors.">
<meta name="keywords" content="personalvermittlung it, it stellen, kaufmännische stellen, offene stellen.">
<meta name="keywords" content="Personnel introduction, IT jobs, commercial jobs.">
<title>KIDSTON – personnel introduction for IT and commercial jobs</title>-->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?PHP
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="description" content="KIDSTON vermittelt Top-Kandidaten an Top-Unternehmen im IT-Bereich und im kaufmännischen Sektor.">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="description" content="KIDSTON introduces top candidates to top companies in the IT and commercial sectors.">
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="keywords" content="personalvermittlung it, it stellen, kaufmännische stellen, offene stellen.">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="keywords" content="Personnel introduction, IT jobs, commercial jobs.">
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<title>KIDSTON - Personalvermittlung für IT- und kaufmännische Stellen</title>
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<title>KIDSTON – personnel introduction for IT and commercial jobs</title>
<?PHP
}
?>
<link rel="shortcut icon" href="<?PHP echo SITE_URL;?>knpic/favicon.ico" type="image/x-icon" />
<link href="<?PHP echo SITE_URL;?>inc1ud35/layout.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>inc1ud35/script.js" type="text/javascript" language="javascript"></script>

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
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/jquery-code.js"></script>
	<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/select-box.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#location').selectbox();
	});
	</script>

</head>

<body>
<div id="inner-bg">
<div id="foot-sec-home"> 
  <div id="ind-page-section">
  <div id="ind-align">  
    <div id="ind-top-section">
		<div id="ind-logo"><a href="index.htm"><img src="knpic/ind-logo-top.gif" alt="" width="291" height="51" border="0" /></a></div>
		<div id="ind-right-sec"><span class="sel">Home</span>   |     <a href="#">About Kidston</a> | <a href="#">English</a> <img src="knpic/icon-flag.gif" width="12" height="9" alt="" /> <img src="knpic/icon-dn-arr.gif" width="8" height="6" alt="" /></div>
	</div>
    <div id="ind-banner-sec">
    <div id="inner-banner">
    <div id="ind-banner-logo"><a href="<?PHP echo SITE_URL;?>index.php?src=home"></a></div>
<div id="inner-box-sec">
			<span class="inner-top-ban-text">The right job,<br /> right in front of you!</span></div>
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
                            <td width="203" align="center" valign="middle"><span class="tab-menu-sel">Find a Job</span></td>
                            <td width="1"></td>
                            </tr>
                          </table>
                        </div>
                      
                      <div id="candidate">
                        
                        <div class="home-tab-r2" >
                          <div class="home-tab-txt">
<div class="tab-text-content"><div class="inn-tab-text-cont-left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
				<?PHP if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
				{
				?>	<a href="<?PHP echo SITE_URL; ?>view-latest-openings.php"><span class="black-head-21">Offene Stellen</span></a> &rsaquo;&rsaquo; <?PHP echo html_entity_decode($job_query['job_title']); 
                }
				if($_SESSION["slanguage"] == "2")
				{?>			
   <a href="<?PHP echo SITE_URL; ?>view-latest-openings.php"><span class="black-head-21">Vacancies</span></a> &rsaquo;&rsaquo; <?PHP echo "[".html_entity_decode($job_query['job_title'])."]";
				}
				?> </td>
    </tr>
  <tr>
    <td height="30" valign="middle"><hr size="1" /></td>
    </tr>
   
    <?PHP
$sql_openlist = "select jm.ID,jm.org_id,jm.job_code,jm.job_type,jm.job_title,jm.job_brief,jm.job_asap,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,DATE_FORMAT(jm.postedon,'%D %M, %Y') as poston,jm.admin_id,jm.status from job_details jm, company_details cm where jm.status <> 'D' and jm.status = 'Y' and cm.status ='Y' and jm.org_id = cm.ID order by jm.ID desc limit 16";
$rs_openlist = $db->getTableArray($sql_openlist);
$count_rs = count($rs_openlist);


?>
<tr>
<td>
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="45" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td><div style="float: left;" align="left" class="h3"><?PHP echo html_entity_decode($job_query['job_title']); ?> [<?PHP echo html_entity_decode($job_query['job_code']); ?>]</div>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
										$pdate = " ";
										$st = explode(" ",$job_query['pdate']);
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
										<div style="float: right;" align="right" class="smtxt-g"><?PHP if($job_query['pdate']!=""){ ?> [Inseriert am: <?PHP echo html_entity_decode($pdate);?>]<?PHP } ?></div>
										<?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?> 
										<div style="float: right;" align="right" class="smtxt-g"><?PHP if($job_query['pdate']!=""){ ?> [Posted on: <?PHP echo html_entity_decode($job_query['pdate']);?>]<?PHP } ?></div>
										<?PHP
										}
										?></td>
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
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
									  	<td height="30" align="left" valign="bottom" class="head-tab">Details zur Einsatzfirma</td>
									 <?PHP
									 }
									 if($_SESSION["slanguage"] == "2" )
									 {
									 ?>
									  	<td height="30" align="left" valign="bottom" class="head-tab">Details about the company recruiting</td>
									 <?PHP
									 }
									 ?>	
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
									 <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Beschreibung: </strong> </td>
									 <?PHP
									  }
									  if($_SESSION["slanguage"] == "2") 
									  {
									  ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Description: </strong> </td>
									 <?PHP
										}
										?>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['company_info']);//echo html_entity_decode($job_query['company_info']); ?></td>
								      </tr>
									  <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
									 	<td height="30" align="left" valign="bottom" class="smtxt"><strong>Branche : </strong></td>
									 <?PHP
									 }
									 if($_SESSION["slanguage"] == "2")
									 {
									 ?>	
									 	<td height="30" align="left" valign="bottom" class="smtxt"><strong>Line of business: </strong></td>
									 <?PHP
									 }
									 ?>	
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;">
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
										}	
										?> 
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
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
										   <td height="30" align="left" valign="bottom" class="head-tab">Details zum Job</td>
									 <?php
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
											<td height="30" align="left" valign="bottom" class="head-tab">Details about the job</td>
										<?PHP
										}
										?>
									  </tr>
									  <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
									   <td height="30" align="left" valign="bottom" class="smtxt"><strong>Anstellungsart : </strong> </td>
										<?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Type of position: </strong> </td>
										<?php
										}
										?>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;">
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
										?>
										</td>
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
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Quota:</strong></td>	<?PHP
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
									  <?PHP
									   if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									   {
									   ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Dauer : </strong></td>
									  </tr>
									  <?PHP
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Duration : </strong></td>
									  </tr>
									  <?PHP
									  }
									  ?>									  
									
									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['job_duration']); ?></td>
								      </tr>
									  <?PHP
									  	}
										//if($job_query['job_salary'] != "")
										//{
									  ?>
<!--								 <tr>
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
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
										?>						  
									  <td height="30" align="left" valign="bottom" class="smtxt"><strong>Aufgaben : </strong></td>
									  <?PHP
									  	}
										if($_SESSION["slanguage"] == "2")
										{
										?>	
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Duties : </strong></td>							
										<?PHP
										}
										?>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['job_response']); ?></td>
								      </tr>
									  <?PHP
									  	}
									  ?>
									  <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Einsatzort : </strong></td>
									  <?PHP
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
									  ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Location : </strong></td>
										<?PHP
										}
										?>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['location']); ?>
										</td>
								      </tr>
									  
									  
									   <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Rubrik : </strong></td>
									  <?PHP
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
									  ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Category : </strong></td>
										<?PHP
										}
										?>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;">
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
										 ?>
										</td>
								      </tr>
									  
									   <tr>
									   <?PHP
									   if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									   {
									   ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Einsatzbeginn : </strong></td>									<?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Start of employment:</strong></td>									<?PHP
										}
										?>		
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
									  <td style="padding-left: 15px;"><?PHP //echo html_entity_decode($job_query['dd']); ?><?PHP if($job_query["dd"]!=""){echo html_entity_decode($pdate);}else{ echo html_entity_decode($job_query["job_asap"]); }?></td>
									  <?PHP
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
									  ?>	  
									    <td style="padding-left: 15px;"><?PHP //echo html_entity_decode($job_query['dd']); ?><?PHP if($job_query["dd"]!=""){echo html_entity_decode($job_query["dd"]);}else{ echo html_entity_decode($job_query["job_asap"]); }?></td>
									<?PHP
									}
									?>	
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
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
										<td height="30" align="left" valign="bottom" class="head-tab">Gewünschtes Bewerberprofil</td>
										<?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
										<td height="30" align="left" valign="bottom" class="head-tab">Applicant profile required</td>
										<?PHP
										}
										?>
									  </tr>
									  <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  	{
									  ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Fähigkeiten : </strong> </td>
									  <?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Skills: </strong> </td>
										<?PHP
										}
										?>	
									  </tr>
									    
									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['job_skillz']); ?></td>
										
								        </tr>
									  <?PHP
										$lang = $db->getTableArray("select * from job_language where job_id='$job_id'");
										if(count($lang) > 0 )
										{ // if count
									  ?>
									  <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Sprachen : </strong></td>
										<?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Languages : </strong></td>
										<?PHP
										}
										?>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;">
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
													?>
									               <?PHP 
												   if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
												   {
												   	  echo html_entity_decode($lang[$j]['language'])."(".html_entity_decode($level).")"; 											   }
												  if($_SESSION["slanguage"] == "2")
												   {
												   	  echo html_entity_decode($lang[$j]['language'])."(".html_entity_decode($lang[$j]["language_level"]).")"; 					   }
													 ?> 								            </div>
							            <?PHP  
												} // for j
										?>										</td>
								      </tr>
									  <?PHP
									  }
									    ?>
									  </table><br />
									 <table width="100%" border="0" cellspacing="0" cellpadding="0">
									
									  <?PHP
									//  	}// if count
										if($job_query['add_com'] != "")
										{
									  ?>
									  <tr>
									   <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
									    <td height="30" align="left" valign="bottom" class="head-tab"><strong>Zusätzliche Bemerkungen : </strong></td>
									  <?PHP
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
									 ?>
											
									   <td height="30" align="left" valign="bottom" class="head-tab"><strong>Additional comments: </strong></td>  
				        			  <?PHP
									  }
									  ?>
			      </tr>
									  <tr>
									    <td align="left" valign="bottom" style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['add_com']); ?>
										</td>
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
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							?>
							<div id="sectiond-2" class="anchor"><a href="<?PHP echo SITE_URL;?>job_apply.php?jid=<?PHP echo $db->encode64($_REQUEST['jid']);?>" class="link-merun"><img src="<?PHP echo SITE_URL; ?>knpic/jetzt-btn.gif" height="23" width="110" border="0" /></a> &nbsp; &nbsp; 
  <a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent1" class="thickbox link-merun" onClick="document.getElementById('url_frd').value = '<?PHP echo $job_id; ?>';" title=""><img src="<?PHP echo SITE_URL; ?>knpic/inserat.gif" height="23" width="161" border="0" /></a></div>
  							<?PHP
							}
							if($_SESSION["slanguage"] == "2")
							{
							?>
							<div id="sectiond-2" class="anchor"><a href="<?PHP echo SITE_URL;?>job_apply.php?jid=<?PHP echo $db->encode64($_REQUEST['jid']);?>" class="link-merun"><img src="<?PHP echo SITE_URL; ?>knpic/apply-now.gif" height="23" width="95" border="0" /></a> &nbsp; &nbsp; 
  <a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent1" class="thickbox link-merun" onClick="document.getElementById('url_frd').value = '<?PHP echo $job_id; ?>';" title=""><img src="<?PHP echo SITE_URL; ?>knpic/forward-friend.gif" height="23" width="129" border="0" /></a></div>
  							<?PHP
							}
							?>
						</td>													
                          </tr>
						  
                          <tr>
                            <td height="45" align="left" valign="top">&nbsp;</td>
                          </tr>
                        </table>
</td>
</tr>










   <tr>
    <td><div class="common-left"><span class="job-title">TOP JOB: <?PHP echo html_entity_decode($job_query['job_title']); ?> (m / f)</span> <span class="red-text">[<?PHP echo html_entity_decode($job_query['job_code']); ?>]</span></div> <div class="print-div"><a href="#" class="sm-link1">Print</a> <a href="#"><img src="knpic/print-icon.gif" alt="Print" width="14" height="13" hspace="3" /></a><br />
											<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
										$pdate = " ";
										$st = explode(" ",$job_query['pdate']);
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
                                        <span class="small-text"> <?PHP if($job_query['pdate']!=""){ ?> [Inseriert am: <?PHP echo html_entity_decode($pdate);?>]<?PHP } ?></span>
                                     <?PHP  }
										if($_SESSION["slanguage"] == "2")
										{
											?>
                                        <span class="small-text"> <?PHP if($job_query['pdate']!=""){ ?> [Published on: <?PHP echo html_entity_decode($pdate);?>]<?PHP } ?></span>
<?PHP } ?>      
      </div></td>
    </tr>
        <tr>
        <td>
        <?PHP
        if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
        {
        ?>
        <div class="head-tab">Details zur Einsatzfirma</div>
        <?PHP
        }
        if($_SESSION["slanguage"] == "2" )
        {
        ?>
        <div class="head-tab">Company Details</div>
        <?PHP
        }
        ?>	
        </td>
   
   </tr>
   <tr>
     <td class="txt-pad">
			<?PHP
            if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
            {
            ?>
            <span class="title">Beschreibung:</span>
            <?PHP
            }
            if($_SESSION["slanguage"] == "2") 
            {
            ?>
            <span class="title">Description:</span>
            <?PHP
            }
            ?>
     <br />


Our client is a beautiful museum in Basel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices laoreet iaculis. Etiam molestie malesuada magna nec convallis.<br />

<br />
<span class="title">Industry:</span><br />
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
											}	
										?> 
<br />
<br />
</td>
   </tr>
   <tr>
     <td><div class="head-tab"> <?PHP if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == ""){ echo "Details zum Job";} 										if($_SESSION["slanguage"] == "2"){ echo "Job Details";}?></div></td>
   </tr>
      <tr>
     <td class="txt-pad"><span class='title'>Statute:</span>
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
										?>
 <br />
       <br />
       <span class="title"><?PHP if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == ""){ echo"Pensum:";}if($_SESSION["slanguage"] == "2"){echo "Workload:";}?></span> <?PHP echo html_entity_decode($job_query['job_quota']); ?> <br />
       <br />
       <span class="title">Tasks:</span><br /><?PHP echo html_entity_decode($job_query['job_response']); ?>
     <!--  <div class="bull">They coordinate the hardware and software of all workplaces</div>-->
<!--<div class="bull">Make the evaluation of new programs</div>
<div class="bull">Wait the hardware and software (including network support, data backup, server infrastructure, Windows and Linux)</div>
<div class="bull">They advise and assist the user in the design and implementation of computer science as well as solutions in the application of the programs used</div>
<div class="bull">They participate in projects</div>
<div class="bull">They are the contact person in the field of computer science</div>
-->         <br />
         <span class="title">Location:</span><br />
         <?PHP echo html_entity_decode($job_query['location']); ?><br /><br /></td>
   </tr>
   
   <tr>
     <td><div class="head-tab">Desired Canditate Profile</div></td>
   </tr>
   <tr>
     <td class="txt-pad"><span class="title">Statute:</span> Permanent<br />
       <br />
       <span class="title">Workload:</span> 60% <br />
       <br />
       <span class="title">Tasks:</span><br />
       <div class="bull">They coordinate the hardware and software of all workplaces</div>
<div class="bull">Make the evaluation of new programs</div>
<div class="bull">Wait the hardware and software (including network support, data backup, server infrastructure, Windows and Linux)</div>
<div class="bull">They advise and assist the user in the design and implementation of computer science as well as solutions in the application of the programs used</div>
<div class="bull">They participate in projects</div>
<div class="bull">They are the contact person in the field of computer science</div>
         <br />
         <span class="title">Location:</span><br />
         Northern Switzerland (BS BL AG SO)<br /><br /></td>
   </tr>
    <tr>
     <td><div class="head-tab">Additional Comments</div></td>
   </tr>
   
   <tr>
     <td class="txt-pad">
Are you interested? Then please submit your complete application documents via the web for an application form.</td>
   </tr>
   <tr>
     <td align="right"><input name="Search" id="Search" type="submit" class="apply-now-bot"  value="Apply Now" /> <input name="Search" id="Search" type="submit" class="recommend"  value="Recommend this Job" /></td>
   </tr>
</table>
 </div>
<div class="inn-tab-text-cont-right">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="black-head-21">Similar Jobs:</span></td>
  </tr>
  <tr>
    <td height="30" valign="middle"><hr size="1" /></td>
  </tr>
   
       <tr>
    <td>
        <div class="designation-pad">
    <a href="job/872/microsoft-system-engineer-vmware-esx-engineer" class="inndesignation">Microsoft System Engineer - Vmware ESX Engineer </a><br />
  Nordschweiz (BS BL AG SO) | Permanent </div>
    <div class="designation-pad">
    <a href="job/869/top-job:-it-helpdesk-supporter-(m-w)" class="inndesignation">TOP JOB: IT Helpdesk Supporter (m/w) </a><br />
Negotiable |  Region Zürich | Permanent </div>
    <div class="designation-pad">
    <a href="job/868/top-chance:-leiterin-applikationsmanagement" class="inndesignation">TOP CHANCE: LeiterIn Applikationsmanagement </a><br />
Negotiable |  Region Zürich | Permanent </div>
    <div class="designation-pad">
    <a href="job/867/top-job:-linux-system-engineer-(m-w)" class="inndesignation">TOP JOB: Linux System Engineer (m/w) </a><br />
Negotiable |  Region Bern | Permanent </div>
    <div class="designation-pad">
    <a href="job/866/helpdesk-mitarbeiterin" class="inndesignation">Helpdesk MitarbeiterIn </a><br />
Negotiable |  Region Zürich | Permanent </div>
    <div class="designation-pad">
    <a href="job/865/top-job:-it-supporter-(m-w)" class="inndesignation">TOP JOB: IT-Supporter (m/w) </a><br />
Negotiable |  Region St. Gallen | Permanent </div>
    <div class="designation-pad">
    <a href="job/864/top-job:-service-desk-mitarbeiter-in" class="inndesignation">TOP JOB: Service Desk Mitarbeiter/in </a><br />
Negotiable |  Region Zürich | Permanent </div>
    <div class="designation-pad">
    <a href="job/863/ihre-chance:-applikationsbetreuerin" class="inndesignation">IHRE CHANCE: ApplikationsbetreuerIn </a><br />
Negotiable |  Region Zürich | Permanent
 </div>
   <div class="common-left">
<br />
<a href="#" class="body-link">View all available jobs</a></div></td>
  </tr>
  
 
  
  
  
  
  
  
</table>


</div>
<div class="inn-sign-up">
<span class="black-head-21">Sign-up &amp;</span><br />
    <span class="black-head-17">get job alerts by Email </span><br />
  <input name="email" type="text" class="email-field" id="email" placeholder="Email id"/><br />
<input name="submit" id="submit" type="Button" class="inner-submit-sml"  value="Submit" />
  </div>
  </div>



                            
                            
                            </div>	
                          </div>
                        </div>		
                      					  
                      </div>
                  </div>		</div>	  </td>
            </tr>
            </table>
	  	</div>
	  </div>
</div></div>
<div class="ind-footer">
	Copyright © <script language="javascript" type="text/javascript">
var now = new Date();
var d = now.getFullYear();
document.write(d);
	    </script> KIDSTON. All rights reserved.
		  </div>	</div>
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
