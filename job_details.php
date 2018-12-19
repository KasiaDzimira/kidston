<?PHP 
include("support/firstline.php");
$job_id = $_REQUEST['jid'];
$curdate = date("Y-m-d");
$job_query = $db->fetchSingleRow("select jm.ID,jm.org_id,jm.job_code,jm.job_business,jm.job_title,jm.job_type,jm.job_duration,jm.job_desc,jm.add_com,jm.job_salary,jm.job_response,jm.job_quota,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,jm.cont_purl,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.create_on,jm.created_ip,jm.admin_id,DATE_FORMAT(jm.postedon,'%D %M, %Y') as pdate,jm.job_asap,cm.ID,cm.comp_name,cm.industry_name,cm.country,cm.state,cm.cont_name,cm.cont_designation,cm.cont_email,cm.company_info from job_details jm, company_details cm where jm.status='Y' and jm.ID = '$job_id' and jm.org_id = cm.ID and cm.status='Y'");
    $furl="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$ttitle =  $job_query['job_title'];
	$tjob_business  =  $job_query['job_business'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?PHP echo $job_query['job_title']; ?> - Jobs at KIDSTON</title>
<meta itemprop="name" content="<?PHP echo $job_query['job_title']; ?> - Jobs at KIDSTON">
<meta name="description" content="Are you looking for a new challenge in IT or in the commercial sectors? KIDSTON is seeking top applicants for top jobs." />
<meta itemprop="description" content="Are you looking for a new challenge in IT or in the commercial sectors? KIDSTON is seeking top applicants for top jobs.">
<meta name="keywords" content="jobs, job search, job offers">

<meta property="og:image" content="https://kidston.ch/beta/knpic/kidston-fb-img.png">
<meta property="og:type" content="website" />
<meta property="og:url" content="<?PHP echo $furl;?>" />
<meta property="og:site_name" content="Kidston"/>
<meta property="og:title" content="<?PHP echo $job_query['job_title']; ?> - Jobs at KIDSTON"/>
<meta property="fb:app_id" content="439248996169294"/>
<link rel="shortcut icon" href="<?PHP echo SITE_URL;?>knpic/favicon.ico" type="image/x-icon" />
<link href="<?PHP echo SITE_URL;?>inc1ud35/layout.css" rel="stylesheet" type="text/css" />
<link  href="<?PHP echo SITE_URL;?>inc1ud35/print.css" rel="stylesheet" type="text/css" media="print" />
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
                  <?PHP include("header_n.php"); ?>
    <div id="ind-banner-sec">
    <div id="inner-banner">
    <div id="ind-banner-logo"><a href="<?PHP echo SITE_URL;?>index.php?src=home"></a></div>
<div id="inner-box-sec" class="del">
			<span class="inner-top-ban-text">The right job,<br /> right in front of you!</span></div>
	  <div id="grey-box-sec">
	  	<div id="tab-box-bg">
	  	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top">
                <div class="grey-box-c1">
                  
                  <div class="grey-box-txt">
                    <div class="home-tab-sec">
                      <div class="home-tab-r1" id="erase">
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="130" align="left" valign="middle"><span class="tab-menu-sel">Find a Job</span></td>
                            <td width="1"></td>
                            </tr>
                          </table>
                        </div>
                      
                      <div id="candidate">
<div class="home-tab-r2" >
                          <div class="home-tab-txt">
<div class="tab-text-content"><div class="inn-tab-text-cont-left" id="conn">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="del">
    <td>
   <a href="<?PHP echo SITE_URL; ?>view-latest-openings.php"><span class="black-head-21">Vacancies</span></a></td>
    </tr>
  <tr class="del">
    <td height="30" valign="middle"><hr size="1" /></td>
    </tr>
   
    <?PHP
$sql_openlist = "select jm.ID,jm.org_id,jm.job_code,jm.job_desc,jm.job_type,jm.job_title,jm.job_brief,jm.job_asap,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,DATE_FORMAT(jm.postedon,'%D %M, %Y') as poston,jm.admin_id,jm.status from job_details jm, company_details cm where jm.status <> 'D' and jm.status = 'Y' and cm.status ='Y' and jm.org_id = cm.ID order by jm.ID desc limit 16";
$rs_openlist = $db->getTableArray($sql_openlist);
$count_rs = count($rs_openlist);
$job_title_count = $job_query['job_title'];

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
										<div style="float: right;" align="right" class="smtxt-g"><?PHP if($job_query['pdate']!=""){ ?> [Posted on: <?PHP echo html_entity_decode($job_query['pdate']);?>]<?PHP } ?></div>
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
									  	<td height="20" align="left" valign="bottom" class="head-tab"><strong>Details about the company recruiting</strong></td>
									  </tr>
									  <tr>
										<td height="30" align="left" valign="bottom" class="heading"><strong>Description: </strong> </td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['company_info']); ?></td>
								      </tr>
									  <tr>
									 	<td height="30" align="left" valign="bottom" class="heading"><strong>Line of business: </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;">
										<?PHP

											$industry = "";
											$inds = $job_query["industry_name"];
									
											echo html_entity_decode($job_query['industry_name']);
											
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
								
											<td height="20" align="left" valign="bottom" class="head-tab"><strong>Details about the job</strong></td>
									  </tr>
									  <tr>

										<td height="30" align="left" valign="bottom" class="heading"><strong>Type of position: </strong> </td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['job_type']);?>
										</td>
									  </tr>
										<?PHP
                                        if($job_query['job_quota'] != "")
                                        {
                                        ?>
                                        <tr>	
                                        <td height="30" align="left" valign="bottom" class="heading"><strong>Quota:</strong></td>	
                                        </tr>
                                        <tr>	
                                        <td style="padding-left: 15px"><?PHP echo html_entity_decode($job_query['job_quota']); ?></td>	
                                        </tr>
                                        <?PHP
                                        }
                                        ?>
									  <?PHP
									  	if($job_query['job_duration'] != "" &&  strtoupper($job_query['job_type']) != "PERMANENT")
										{
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="heading"><strong>Duration : </strong></td>
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
										<td height="30" align="left" valign="bottom" class="heading"><strong>Duties : </strong></td>							
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['job_response']); ?></td>
								      </tr>
									  <?PHP
									  	}
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="heading"><strong>Location : </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['location']); ?>
										</td>
								      </tr>
									   <tr>
										<td height="30" align="left" valign="bottom" class="heading"><strong>Category : </strong></td>
									  </tr>
									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['job_business']); ?>
										</td>
								      </tr>
									  
									   <tr>
										<td height="30" align="left" valign="bottom" class="heading"><strong>Start of employment:</strong></td>	
									  </tr>
									  <tr>
									 <td style="padding-left: 15px;"><?PHP if($job_query["dd"]!=""){echo html_entity_decode($job_query["dd"]);}else{ echo html_entity_decode($job_query["job_asap"]); }?></td>
									
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
										<td height="20" align="left" valign="bottom" class="head-tab"><strong>Applicant profile required</strong></td>
									  </tr>
									  <tr>
										<td height="30" align="left" valign="bottom" class="heading"><strong>Skills: </strong> </td>
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
										<td height="30" align="left" valign="bottom" class="heading"><strong>Languages : </strong></td>
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
												   	  echo html_entity_decode($lang[$j]['language'])."(".html_entity_decode($lang[$j]["language_level"]).")"; 					
													 ?> 								            </div>
							            <?PHP  
												} // for j
										?>										</td>
								      </tr>
									  <?PHP
									  }if($job_query['job_desc'] !=""){
									    ?>
                                        									  <tr>
									    <td style="padding-left: 15px;"><?PHP echo html_entity_decode($job_query['job_desc']); ?></td>
										
								        </tr>
                                        <?PHP } ?>

									  </table><br />
									 <table width="100%" border="0" cellspacing="0" cellpadding="0">
									
									  <?PHP
									//  	}// if count
										if($job_query['add_com'] != "")
										{
									  ?>
									  <tr>
											
									   <td height="20" align="left" valign="bottom" class="head-tab"><strong>Additional comments: </strong></td>  
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
                          <tr class="del">
                            <td height="45" align="right" valign="top">
							<div id="sectiond-2" class="anchor"><div style="float:right"><a href="https://twitter.com/share" class="twitter-share-button" data-text="Checkout the new openings at KIDSTON: <?PHP echo $ttitle; ?>" data-count="none" data-via="kidstongmbh">Tweet</a></div>  &nbsp; &nbsp;  <div style="float:right"><iframe src="//www.facebook.com/plugins/like.php?href=<?PHP echo $furl;?>&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=80&amp;appId=439248996169294" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:49px; height:37px;" allowTransparency="true"></iframe> &nbsp; &nbsp; </div>  <div style="float:right"><a href="<?PHP echo SITE_URL;?>job_apply.php?jid=<?PHP echo $db->encode64($_REQUEST['jid']);?>" class="link-merun"><img src="<?PHP echo SITE_URL; ?>knpic/apply-now.gif" height="23" width="95" border="0" /></a>  &nbsp; &nbsp; </div>
                            
<div style="float:right; padding-right:10px"><a href="javascript:window.print();"><img src="<?PHP echo SITE_URL; ?>knpic/print.gif" alt="Print this page" height="23" width="59" border="0"></a>

</div>
                            
   </div>
	

						</td>													
                          </tr>
						  
                          <tr>
                            <td height="45" align="left" valign="top">&nbsp;</td>
                          </tr>
                        </table>
</td>
</tr>
</table>
 </div>
<div class="inn-tab-text-cont-right" id="erase">

<?PHP

$job_details_count = $db->fetchSingleRow("SELECT COUNT( ID ) as jcount FROM  `job_details` WHERE  `job_business` =  '".$tjob_business."'");

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="black-head-21">Similar Jobs:&nbsp;(<?PHP echo $job_details_count['jcount'];?>)</span></td>
  </tr>
  <tr>
    <td height="30" valign="middle"><hr size="1" /></td>
  </tr>
   
       <tr>
    <td>
    <?PHP
			$sql_sjob = "SELECT ID,job_title,job_type,location FROM  `job_details` WHERE  `job_business` =  '".$tjob_business."' and status ='Y' order by ID desc limit 8";
			$rs_sjob = $db->getTableArray($sql_sjob);
			$count_jrs = count($rs_sjob);
			//echo "SQL: ".$sql_sjob."<br>***<br>Count: ".$count_jrs;
				for($j = 0;$j<$count_jrs;$j++)
				{// FOR $j
				
				/* <a href="<?PHP echo "job/".html_entity_decode($rs_sjob[$j]["ID"])."/".$db->stringToUrlSlug(html_entity_decode($rs_sjob[$j]["job_title"]));?>"  class="inndesignation"><?PHP echo html_entity_decode($rs_sjob[$j]["job_title"]); ?></a><br /><?PHP echo $rs_sjob[$j]["location"];?> | <?PHP echo $rs_sjob[$j]["job_type"];*/
?>
        <div class="designation-pad"><!--<a href="job_details.php?jid=<?PHP //echo $rs_sjob[$j]["ID"];?>" class="inndesignation"><?PHP //echo html_entity_decode($rs_sjob[$j]["job_title"]); ?></a>-->
		<a href="<?PHP echo SITE_URL."job/".html_entity_decode($rs_sjob[$j]["ID"])."/".$db->stringToUrlSlug(html_entity_decode($rs_sjob[$j]["job_title"]));?>"  class="inndesignation"><?PHP echo html_entity_decode($rs_sjob[$j]["job_title"]); ?></a>
		<br /><?PHP echo $rs_sjob[$j]["location"];?> | <?PHP echo $rs_sjob[$j]["job_type"];?>
         </div>
         <?PHP } ?>
         
    
   <div class="common-left">
<br />
<a href="<?PHP echo SITE_URL; ?>view-latest-openings.php" class="body-link">View all available jobs</a></div>
</td>
  </tr>
</table>


</div>


<div class="inn-tab-text-cont-right" id="erase"><span class="black-head-17">Sign-up to get free job alerts by email</span><br />
<br /><a href="<?PHP echo SITE_URL;?>job-alerts.php"><img src="<?PHP echo SITE_URL; ?>knpic/sign-up.gif" width="75" height="26" alt="Email Subscription" border="0"/></a></div>


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
<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43390285-1', 'kidston.ch');
  ga('send', 'pageview');

</script></body>
</html>
