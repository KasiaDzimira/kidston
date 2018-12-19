<?PHP
	include("../popup_check.php");
 
	if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
	{
		include("../../inc1ud35/database.mvc.php");
	}
	else
	{
		include("../../inc1ud35/database.mvc.live.php");
	}
	$db = new Database();
		$id = $_REQUEST['aid'];	
		$sql_company = $db->fetchSingleRow("select * from candidate_master where ID = '$id' ");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../admin_includes/kn-style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>
<script type="text/javascript" src="../admin_includes/jquery.js"></script>
<script type="text/javascript" src="../admin_includes/form_validation.js"></script>
 <link rel="stylesheet" href="../admin_includes/lightbox-style.css" type="text/css" media="screen" />
<script language="javascript" src="../admin_includes/lightbox.js" type="text/javascript"></script>
<script language="javascript" src="../admin_includes/color.js" type="text/javascript"></script>
<script> 
			$(document).ready(function(){
			
				document.getElementById("watch").style.display = '';
				//Examples of how to assign the ColorBox event to elements
				$(".example6").colorbox({iframe:true, innerWidth:500, innerHeight:408});
				
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
<script type="text/javascript" src="../admin_includes/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="../admin_includes/ajaxLoad.js"></script>
 <script type="text/javascript" src="greybox/greybox.js"></script>
    <link href="greybox/greybox.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript">
      var GB_ANIMATION = true;
      $(document).ready(function(){
        $("a.greybox").click(function(){
          var t = this.title || $(this).text() || this.href;
          GB_show(t,this.href,470,600);
          return false;
        });
      });
    </script>

	
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
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td height="40" align="left" valign="top"><b>Candidate Status</b></td>
  </tr>
     <tr>
    <td height="50" align="left" valign="top">
	 <?PHP echo $db->errmsg[$db->decode64($_GET["resmsg"])];?></center><br />
</td>
  </tr>
<?PHP
			$page = $_GET['page'];
			$limit = 75;
			 	
			if($_REQUEST["frm_jobcode"] != "")
			{// jcode
				$get_jobcode = $_REQUEST["frm_jobcode"];
				$get_application_status = $_REQUEST["appstatus"];
				if($get_application_status != "")
				{// app status
						$sql_image_pg = "select cd.ID,cd.name,cd.lastname,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date,cd.status,jm.ID as jid,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.applied_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where jm.job_code ='$get_jobcode' and cd.status = 'Y' and cm.status ='Y' and ap.application_status = '$get_application_status' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
				}// app status
				else
				{// app status
						$sql_image_pg = "select cd.ID,cd.name,cd.lastname,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date,cd.status,jm.ID as jid,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.resume2,ap.resume3,ap.applied_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where jm.job_code ='$get_jobcode' and cd.status = 'Y' and cm.status ='Y' and (ap.application_status <> 'REJECTED' and ap.application_status <> 'UNQUALIFIED' and ap.application_status <> 'DELETED') and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
				}// app status
			}// jcode
			else
			{// jcode
				$sql_image_pg = "select cd.ID,cd.name,cd.lastname,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date,cd.status,jm.ID as jid,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.resume2,ap.resume3,ap.applied_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where cd.status = 'Y' and cm.status ='Y' and (ap.application_status <> 'REJECTED' and ap.application_status <> 'UNQUALIFIED' and ap.application_status <> 'DELETED')  and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
			}// jcode
		//echo $sql_image_pg;
			$fetch_image = $db->getTableArray($sql_image_pg);
			$count_pg = count($fetch_image);
			
			$pager  = $db->getPagerData($count_pg, $limit, $page);  
			$offset = $pager->offset;  
			$limit  = $pager->limit;  
			$page   = $pager->page;
            if($count_pg > 0)
			{// count
?>  
  
  <!--<tr>
    <td height="35" align="right" valign="top">
<?PHP	
		if($pager->numPages > 1)
		{ // # cp1
?>

<span style="float:right; padding-right:15px;">

<?PHP
		if ($page == 1) // this is the first page - there is no previous page  
		echo "<span class='pg-menu-sel'>&#9668;</span>&nbsp;";  
		else            // not the first page, link to the previous page  
		echo "<a href=\"?frm_jobcode=".$_REQUEST["frm_jobcode"]."&src=".$_REQUEST["src"]."&orderby=".$order_by."&page=" . ($page - 1) ."\" class='pg-menu'>&#9668;</a>&nbsp;";  
?>
<span class="red-txt">&nbsp;Page <?php echo $page; ?> of <?php echo $pager->numPages; ?>&nbsp; Page(s)&nbsp;</span>
<?PHP 
		if ($page == $pager->numPages) // this is the last page - there is no next page  
		echo "<span class='pg-menu-sel'>&#9658;</span>";  
		else            // not the last page, link to the next page  
		echo "<a href=\"?frm_jobcode=".$_REQUEST["frm_jobcode"]."&src=".$_REQUEST["src"]."&orderby=".$order_by."&page=" . ($page + 1) ."\" class='pg-menu'>&#9658;</a>";
?>
</span>
<?PHP
		} // # cp1
?>	</td>
  </tr>-->
  <tr>
    <td align="left">
				<table width="100%" border="0" cellpadding="5" cellspacing="1">
				  <tr align="center" valign="middle">
				    <td height="35">&nbsp;</td>
				    <td>&nbsp;</td>
				    <td colspan="2">
					<span style="float:right; padding-right:15px;font-size:11px;">
					Q - Qualify / DISQ -Disqualify / INV - Invite / PR - Present / H - Hired(Offered) / RR - Read Remarks / ER - Edit Remarks / REJ - Reject / DEL -Delete
<!--					H - Hired(Offered) / REJ - Reject/INV - Invite
-->					</span>
					</td>
			      </tr>
				  <tr align="center" valign="middle">
					<td width="35" height="35">#</td>
					<td>Candidate Details</td>
					<td width="250">Job Details </td>
					<td width="150">Status</td>
				  </tr>
<?PHP		  
				$sql_template = $db->getTableArray("select * from template_master where status ='Y'");  
							
				if(count($sql_template)>0 )
				 {
					for($r=0;$r<count($sql_template);$r++)
					{
							$msg2 .= $sql_template[$r]["template_name"]."<br>";
					}
				 }
				 
				//$sql_image = $sql_image_pg." limit $offset, $limit";
				$sql_image = $sql_image_pg;
				$sn = 1;
				
				$rs_image = $db->getTableArray($sql_image);
				$count_rs = count($rs_image);
				for($i = 0;$i<$count_rs;$i++)
				{ // for
			
?>
				  <tr align="center" valign="middle" onmouseover="changeCSS(this,'#FBFBE7','#FCFAF3','#535353');this.style.cursor='pointer'" onmouseout="changeCSS(this,'#F9F9F9','#FCFAF3','#535353');">
					<td width="35" height="35" bgcolor="#FFFFFF"><?PHP echo $sn; ?></td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Name		: <a href="javascript:void(0)" onclick="window.open('view_application_details.php?aid=<?PHP echo $rs_image[$i]['ID'];?>','','width=1015,height=450,scrollbars=yes,status=yes')">
<?PHP echo html_entity_decode($rs_image[$i]["name"])." ".html_entity_decode($rs_image[$i]["lastname"]); ?></a><br />
					Email : <?PHP echo html_entity_decode($rs_image[$i]["email"]); ?>	 <br />
					<?PHP
						if($rs_image[$i]["contact_number"] != "")
						{
					?>
					Contact Number	: <?PHP echo $rs_image[$i]["contact_number"]; ?></br>
					<?PHP
						}
					
					if($rs_image[$i]["resume"] != "" || $rs_image[$i]["resume2"] != "" || $rs_image[$i]["resume3"] != "")
					{
						echo "Resume(s):<br>";
					}
					
						if($rs_image[$i]["resume"] != "")
						{
					?>
					 <a href="<?PHP echo SITE_URL."uploads/candidate/".$rs_image[$i]["resume"]; ?>" target="_blank">Resume 1</a>&nbsp;
					<?PHP
						}
						if($rs_image[$i]["resume2"] != "")
						{
					?>
					 <a href="<?PHP echo SITE_URL."uploads/candidate/".$rs_image[$i]["resume2"]; ?>" target="_blank">Resume 2</a>&nbsp;
					<?PHP
						}
						if($rs_image[$i]["resume3"] != "")
						{
					?>
					 <a href="<?PHP echo SITE_URL."uploads/candidate/".$rs_image[$i]["resume3"]; ?>" target="_blank">Resume 3</a>&nbsp;
					<?PHP
						}
					?>
					</span>				
					<?PHP
					//if($rs_image[$i]["application_status"] == "APPLIED")
					//{// status	
					?>
					<form action="../admin_process/apply_candidate_save.php" method="post" name="frm_applyjobcode" id="frm_applyjobcode" >
					Job Code:<input type="text" name="frm_job_code" id="frm_job_code" value= "" class="field-job"/>
					<input type="hidden" name="job_id" id="job_id" value="<?PHP echo $rs_image[$i]["jid"]; ?>"/>
					<input type="hidden" name="candid_id" id="candid_id" value="<?PHP echo $rs_image[$i]["ID"]; ?>"/>
					<input type="hidden" name="src" id="src" value="<?PHP echo $_REQUEST["src"]; ?>"/>
					<input type="submit" name="frm_submit" id="frm_submit" value="Apply" class="btn-common"/>
					</form>
					<?PHP
				//	}
					?>		
					</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Job Code		: <?PHP echo $rs_image[$i]["job_code"]; ?><br />
					Apply By Date : <?PHP echo $rs_image[$i]["dd"]; ?>	  </span><br />
					<span class="view-title">Job Title		: <?PHP echo html_entity_decode($rs_image[$i]["job_title"]); ?></span>
					<br />
					<span class="smtxt">
					Job Status		:
					<?PHP
							if($rs_image[$i]["jstatus"] == "Y")
								echo "Active";
							else
								echo "Inactive";
					?>
					</span>
										</td>
					<td width="150" bgcolor="#FFFFFF">
					<?PHP
							if($rs_image[$i]["application_status"] != "N")
							{// status
								
								
								 
								if($rs_image[$i]["application_status"] == "APPLIED")
								{
									echo "<span class='app-color'>".$rs_image[$i]["application_status"]."</span>";
									
								?>
<a href="javascript:;" onClick="jform('../admin_process/candidate_status.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=QUALIFIED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>&btsave=change');">Q</a>&nbsp;&nbsp;
<a href="javascript:;" onClick="jform('../admin_process/candidate_status.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=UNQUALIFIED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>&btsave=change');">DISQ</a>&nbsp;&nbsp;
			
					<a href="javascript:;" onClick="rejform('../template.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=REJECTED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>','<?PHP echo $msg2; ?>');">REJ</a> &nbsp;&nbsp;
					<?PHP $msg1 = "Are You Sure want to delete?"; ?>
					<a href="javascript:;" onClick="cfrm('<?PHP echo $msg1; ?>','../admin_process/candidate_delstatus.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=DELETED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">DEL</a>
					
							<?PHP 	
							}
								if($rs_image[$i]["application_status"] == "QUALIFIED")
								{
								echo "<span class='q-color'>".$rs_image[$i]["application_status"]."</span>";
								
										//if($rs_image[$i]["jstatus"] == "Y")
										//{// jstatus
								?>
								<a href="javascript:;" onClick="jform('../admin_process/candidate_status.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=INVITED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>&btsave=change');">INV</a>
								&nbsp;
											
					<a href="javascript:;" onClick="rejform('../template.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=REJECTED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>','<?PHP echo $msg2; ?>');">REJ</a> &nbsp;&nbsp;
					<?PHP $msg1 = "Are You Sure want to delete?"; ?>
					<a href="javascript:;" onClick="cfrm('<?PHP echo $msg1; ?>','../admin_process/candidate_delstatus.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=DELETED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">DEL</a>
								<?PHP
										//}// jstatus
								
									$aplink = $db->fetchSingleRow("select al.ID,al.remarks,al.application_status,DATE_FORMAT(al.auth_date,'%D %M, %Y') as dd,al.auth_by,aa.name from application_link al,admin_access aa where al.application_id='".$rs_image[$i]["appid"]."' and al.application_status='QUALIFIED' and al.auth_by = aa.ID");
										if($aplink)
										{// remarks
											$aplink_id = $aplink["ID"];
											$rmks = $aplink["remarks"];
								
								?>
								<a href="javascript:;" onClick="editform('../admin_process/edit_remarks_pop.php?alid=<?PHP echo $aplink_id; ?>&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>','<?PHP echo $rmks; ?>');">ER</a>
								<?PHP
										}//
											
								}
								if($rs_image[$i]["application_status"] == "INFORMED")
								{
									echo "<span class='inf-color'>".$rs_image[$i]["application_status"]."</span>";
								}
								if($rs_image[$i]["application_status"] == "INVITED")
								{
								echo "<span class='inv-color'>".$rs_image[$i]["application_status"]."</span>";
										//if($rs_image[$i]["jstatus"] == "Y")
										//{// jstatus
								?>
								<a href="javascript:;" onClick="jform('../admin_process/candidate_status.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=PRESENTED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>&btsave=change');">PR</a>
					&nbsp;
				<a href="javascript:;" onClick="rejform('../template.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=REJECTED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>','<?PHP echo $msg2; ?>');">REJ</a> &nbsp;&nbsp;
					<?PHP $msg1 = "Are You Sure want to delete?"; ?>
					<a href="javascript:;" onClick="cfrm('<?PHP echo $msg1; ?>','../admin_process/candidate_delstatus.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=DELETED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">DEL</a>
							<?PHP 	
										//}// jstatus	
									
									$aplink = $db->fetchSingleRow("select al.ID,al.remarks,al.application_status,DATE_FORMAT(al.auth_date,'%D %M, %Y') as dd,al.auth_by,aa.name from application_link al,admin_access aa where al.application_id='".$rs_image[$i]["appid"]."' and al.application_status='INVITED' and al.auth_by = aa.ID");
										if($aplink)
										{// remarks
											$aplink_id = $aplink["ID"];
											$rmks = $aplink["remarks"];
								
								?>
								<a href="javascript:;" onClick="editform('../admin_process/edit_remarks_pop.php?alid=<?PHP echo $aplink_id; ?>&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>','<?PHP echo $rmks; ?>');">ER</a>
								<?PHP
										}// remarks
								}
								if($rs_image[$i]["application_status"] == "PRESENTED")
								{ 
								echo "<span class='pre-color'>".$rs_image[$i]["application_status"]."</span>";
								
										//if($rs_image[$i]["jstatus"] == "Y")
										//{// jstatus
								
								?>
								<a href="javascript:;" onClick="jform('../admin_process/candidate_status.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=OFFERED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>&btsave=change');">H</a>&nbsp;
					
					<a href="javascript:;" onClick="rejform('../template.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=REJECTED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>','<?PHP echo $msg2; ?>');">REJ</a> &nbsp;&nbsp;
					<?PHP $msg1 = "Are You Sure want to delete?"; ?>
					<a href="javascript:;" onClick="cfrm('<?PHP echo $msg1; ?>','../admin_process/candidate_delstatus.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=DELETED&src=view_can&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">DEL</a>
								<?PHP 
										//}// jstatus
									
									$aplink = $db->fetchSingleRow("select al.ID,al.remarks,al.application_status,DATE_FORMAT(al.auth_date,'%D %M, %Y') as dd,al.auth_by,aa.name from application_link al,admin_access aa where al.application_id='".$rs_image[$i]["appid"]."' and al.application_status='PRESENTED' and al.auth_by = aa.ID");
										if($aplink)
										{// remarks
											$aplink_id = $aplink["ID"];
											$rmks = $aplink["remarks"];
								
								?>
								<a href="javascript:;" onClick="editform('../admin_process/edit_remarks_pop.php?alid=<?PHP echo $aplink_id; ?>&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>','<?PHP echo $rmks; ?>');">ER</a>
								<?PHP
										}// remarks
									
								}
								if($rs_image[$i]["application_status"] == "OFFERED")
								{
									echo "<span class='off-color'>".$rs_image[$i]["application_status"]."</span>";
								}
							
							
							}// status
							else
							{// status
								echo "N/A";
							}// status
							$rremarks = $db->getTableArray("select al.remarks,al.application_status,DATE_FORMAT(al.auth_date,'%D %M, %Y') as dd,al.auth_by,aa.name from application_link al,admin_access aa where al.application_id='".$rs_image[$i]["appid"]."' and al.auth_by = aa.ID");
								if(count($rremarks)>0)
								{// remarks
									for($r=0;$r<count($rremarks);$r++)
									{
/*										$msg .= $rremarks[$r]["remarks"]."<br>";
										$msg .= "By : ".$rremarks[$r]["name"]."<br>";
										$msg .= "On ".$rremarks[$r]["dd"]."<hr>";
*/										
										$msg .= $rremarks[$r]["remarks"]."<br>";
										$msg .= "Status : ".$rremarks[$r]["application_status"]."<br>";
										$msg .= "By : ".$rremarks[$r]["name"]."<br>";
										$msg .= "On ".$rremarks[$r]["dd"]."<hr>";
									}
					?>
<!--					<a href="javascript:;" onClick="prmt('<?PHP echo $msg; ?>');">RR</a>
-->			

<!--<a href="remarks.php?id=<?PHP echo $rs_image[$i]["appid"]; ?>" title="Read Remarks" class="greybox">RR</a>-->
<a href="new_remarks.php?alid=<?PHP echo $rs_image[$i]["appid"]; ?>&rsrc=<?PHP echo $_REQUEST["src"]; ?>" title="Read Remarks" class="example6" id="watch">RR</a>
				<?PHP
							   }// remarks
					?>
							
							
							
								</td>
				  </tr>
<?PHP
				$sn = $sn + 1;
				} // for
?>				
	  </table>      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
<?PHP
		}// count
		else
		{// count
?>
  <tr>
    <td><div align="center" class="error">No records found</div></td>
  </tr>
<?PHP		
		}// count
?>  
</table>

</body>
</html>