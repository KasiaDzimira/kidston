<?PHP
		include("support/firstline.php");

		$job_id = $_REQUEST['jid'];
		
		
		$curdate = date("Y-m-d");
			$job_query = $db->fetchSingleRow("select jm.ID,jm.org_id,jm.job_code,jm.job_business,jm.job_title,jm.job_type,jm.job_duration,jm.job_desc,jm.add_com,jm.job_salary,jm.job_response,jm.job_quota,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,jm.cont_purl,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.create_on,jm.created_ip,jm.admin_id,DATE_FORMAT(jm.postedon,'%D %M, %Y') as pdate,jm.job_asap,cm.ID,cm.comp_name,cm.industry_name,cm.country,cm.state,cm.cont_name,cm.cont_designation,cm.cont_email,cm.company_info from job_details jm, company_details cm where jm.status='Y' and jm.ID = '$job_id' and jm.org_id = cm.ID and cm.status='Y'");
			
			//echo $db->last_query;
	
?>
<html>
<head>
<title>Jobs at Kidston</title>
<script language="javascript">
function print_p()
{
	window.print();
	window.close();
}
</script>
</head>
<link href="kninc/kn-style.css" rel="stylesheet" type="text/css" />
<?PHP
if($job_query)
{
?>
<body onLoad="print_p();">	

				<div class="inner-c3">
				<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
				<td align="left" ><img src="<?PHP echo SITE_URL; ?>knpic/lg.jpg" alt="" width="50" height="40" /></td>
			</tr>
			<tr>
				<td align="left"><div style="border-bottom:#666666 1px solid; width:505px; padding-left:30px; ">&nbsp;</div><br />
</td>
			</tr>
                <tr>
                <td height="45" align="left" valign="top">
					<table width="500" border="0" cellspacing="0" cellpadding="0">
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
                            <td height="35" align="left" valign="top">
									<table width="500" border="0" cellspacing="0" cellpadding="0">
									
									  <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
									  	<td height="30" align="left" valign="bottom" class="head-pos">Details zur Einsatzfirma</td>
									 <?PHP
									 }
									 if($_SESSION["slanguage"] == "2" )
									 {
									 ?>
									  	<td height="30" align="left" valign="bottom" class="head-pos">Details about the company recruiting</td>
									 <?PHP
									 }
									 ?>	
									  </tr>
									<?PHP
									if($job_query['company_info'] != "")
									{
									?>
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
									    <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['company_info']); ?></td>
								      </tr>
									  <?PHP
									  }
									  ?>
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
									</table>	</td>
                          </tr>
                          <tr>
						    <td height="45" align="left" valign="top">
													
<table width="500" border="0" cellspacing="0" cellpadding="0">
									  <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
										   <td height="30" align="left" valign="bottom" class="head-pos">Details zum Job</td>
									 <?php
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
											<td height="30" align="left" valign="bottom" class="head-pos">Details about the job</td>
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
									  	if($job_query['job_duration'] != "" &&  strtoupper($job_query['job_type']) != "PERMANENT")
										{
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>Duration : </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['job_duration']); ?></td>
								      </tr>
									  <?PHP
									  	}
				
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
									  <tr>
										<td>&nbsp;</td>
									  </tr>
							  </table>							</td>
                          </tr>
						  <tr>
                            <td height="45" align="left" valign="top">
							<table width="500" border="0" cellspacing="0" cellpadding="0">
									  <tr>
									  <?PHP
									  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									  {
									  ?>
										<td height="30" align="left" valign="bottom" class="head-pos">Gewünschtes Bewerberprofil</td>
										<?PHP
										}
										if($_SESSION["slanguage"] == "2")
										{
										?>
										<td height="30" align="left" valign="bottom" class="head-pos">Applicant profile required</td>
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
									 <table width="500" border="0" cellspacing="0" cellpadding="0">
									
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
									    <td height="30" align="left" valign="bottom" class="head-pos"><strong>Zusätzliche Bemerkungen : </strong></td>
									  <?PHP
									  }
									  if($_SESSION["slanguage"] == "2")
									  {
									 ?>
									   <td height="30" align="left" valign="bottom" class="head-pos"><strong>Additional comments: </strong></td>  
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
				<td align="left"  height="20"><div style="border-bottom:#666666 1px solid; width:505px; padding-left:30px; "></div></td>
			</tr>
			<tr>
				<td align="left"> Copyright © <script language="javascript" type="text/javascript">
var now = new Date();
var d = now.getFullYear();
document.write(d);
	    </script> KIDSTON. All rights reserved.</td>
				</tr>	
									
							  </table>							
									
				 </td></tr></table>	
<?PHP
	}
?>
</div>	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function

(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date

();a=s.createElement(o),
  m=s.getElementsByTagName(o)

[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-

analytics.com/analytics.js','ga');

  ga('create', 'UA-43390285-1', 'kidston.ch');
  ga('send', 'pageview');

</script>		
</body>		
</html>