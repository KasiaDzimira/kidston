 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../admin_includes/kn-style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>
<script type="text/javascript" src="../admin_includes/jquery.js"></script>
<script type="text/javascript" src="../admin_includes/form_validation.js"></script>
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

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top"><b>Qualified Candidates</b></td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top">
	 <?PHP echo $db->errmsg[$db->decode64($_GET["resmsg"])];?></center><br />
</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top">
	<form name="frm_jcode" id="frm_jcode" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return validate_applications(this);">
	Job Code : <input type="text" name="frm_jobcode" id="frm_jobcode" class="field-job" maxlength="25">
	<input type="hidden" name="dmmy" id="dmmy" value="" style="display:none;">
	<input type="hidden" name="src" id="src" value="<?PHP echo $_REQUEST[src]; ?>">
	
	<input type="submit" name="search_submit" id="search_submit" value="Find" class="btn-common">&nbsp;
	<?PHP
			if($_REQUEST["frm_jobcode"] != "")
			{// jcode
	?>
	<a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?src=<?PHP echo $_REQUEST[src]; ?>">View All</a>
	<?PHP
			}// jcode
	?>
	</form>

	</td>
  </tr>
<?PHP
			$page = $_GET['page'];
			$limit = 75;
			 	
			if($_REQUEST["frm_jobcode"] != "")
			{// jcode
				$get_jobcode = $_REQUEST["frm_jobcode"]; 
				//$sql_image_pg = "select cd.ID,cd.name,cd.lastname,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date as candidate_apply_date,cd,reference,cd.reference_name,cd.status,cd.guest_flag,jm.ID as jid, jm.org_id, jm.job_code, jm.job_title, jm.job_asap,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.resume2,ap.resume3,ap.applied_date as application_apply_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where jm.job_code ='$get_jobcode' and cd.status = 'Y' and jm.status = 'Y' and cm.status ='Y' and ap.application_status = 'QUALIFIED' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
				
				$sql_image_pg = "select cd.ID,cd.name,cd.lastname,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date as candidate_apply_date,cd.status,jm.ID as jid, jm.org_id,jm.job_code,jm.job_title,cd.reference, cd.reference_name, jm.job_brief, jm.location,  DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.job_asap,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.resume2, ap.resume3, ap.applied_date as application_apply_date,ap.application_status from candidate_master cd,job_details jm,application_master ap, company_details cm where jm.job_code ='$get_jobcode' and cd.status = 'Y' and cm.status ='Y' and ap.application_status = 'QUALIFIED' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
			}// jcode
			else
			{// jcode
				$sql_image_pg = "select cd.ID,cd.name,cd.lastname,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date as candidate_apply_date,cd.reference,cd.reference_name,cd.status,cd.guest_flag,jm.ID as jid, jm.org_id, jm.job_code,jm.job_title,jm.job_asap,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.resume2,ap.resume3,ap.applied_date as application_apply_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where cd.status = 'Y' and cm.status ='Y' and ap.application_status = 'QUALIFIED' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
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
  
  <tr>
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
  </tr>
  <tr>
    <td align="left">
				<span style="float:right; padding-right:15px;font-size:11px;"><!--MT - Mark as Talent / UT - Unmark as Talent /--> INV - Interview / REJ - Reject / DEL - Delete / AR -Add Remarks / RR - Read Remarks / ER - Edit Remarks</span>
				<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
				  <tr align="center" valign="middle">
					<td width="35" height="35" align="center">#</td>
					<td>Candidate Details</td>
					<td width="250" align="center">Job Details </td>
					<td width="150" align="center">Action</td>
				  </tr>
<?PHP		  
				$sql_template = $db->getTableArray("select * from template_master where status ='Y'");  
								
				 if(count($sql_template)>0 )
				 {
						for($r=0;$r<count($sql_template);$r++)
						{
								$msgs .= $sql_template[$r]["template_name"]."<br>";
								//$msg .= "<a href=\'www.sun.com\'>Edit</a><hr>";
						}
				 }
				$sql_image = $sql_image_pg." limit $offset, $limit";
				$sn = 1;
				
				$rs_image = $db->getTableArray($sql_image);
				$count_rs = count($rs_image);
				for($i = 0;$i<$count_rs;$i++)
				{ // for
			
?>				  <tr align="center" valign="middle" onmouseover="changeCSS(this,'#FBFBE7','#FCFAF3','#535353');this.style.cursor='pointer'" onmouseout="changeCSS(this,'#F9F9F9','#FCFAF3','#535353');">
					<td width="35" height="35" bgcolor="#FFFFFF"><?PHP echo $sn; ?></td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Name		: <a href="javascript:void(0)" onclick="window.open('admin_support/view_application_details.php?aid=<?PHP echo $rs_image[$i]['ID'];?>','','width=1015,height=450,scrollbars=yes,status=yes')">
<?PHP echo html_entity_decode($rs_image[$i]["name"])." ".html_entity_decode($rs_image[$i]["lastname"]); ?></a><br />
					Email : <?PHP echo html_entity_decode($rs_image[$i]["email"]); ?>	 <br />
					<?PHP
						if(html_entity_decode($rs_image[$i]["contact_number"]) != "")
						{
					?>
					Contact Number	: <?PHP echo html_entity_decode($rs_image[$i]["contact_number"]); ?> <br />
					<?PHP
						}
					?>
					Join Date : <?PHP echo date("d M Y",strtotime($rs_image[$i]['candidate_apply_date'])); ?> <br />
					<?PHP	
					if($rs_image[$i]["resume"] != "" || $rs_image[$i]["resume2"] != "" || $rs_image[$i]["resume3"] != "")
					{
						echo "<br>Resume(s):<br>";
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
					 <a href="<?PHP echo SITE_URL."uploads/candidate/".$rs_image[$i]["resume2"]; ?>" target="_blank">Resume 2 </a>&nbsp;
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
					<form action="admin_process/apply_job_save.php" method="post" name="frm_applyjobcode" id="frm_applyjobcode" >
					Job Code:<input type="text" name="frm_job_code" id="frm_job_code" value= "" class="field-job"/>
					<input type="hidden" name="job_id" id="job_id" value="<?PHP echo $rs_image[$i]["jid"]; ?>"/>
					<input type="hidden" name="candid_id" id="candid_id" value="<?PHP echo $rs_image[$i]["ID"]; ?>"/>
					<input type="hidden" name="src" id="src" value="<?PHP echo $_REQUEST["src"]; ?>"/>
					<input type="submit" name="frm_submit" id="frm_submit" value="Apply" class="btn-common"/>
					</form>	</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Job Code		: <?PHP echo html_entity_decode($rs_image[$i]["job_code"]); ?><br />
					Apply By Date :
					 <?PHP if($rs_image[$i]["dd"] != "")
						  { 	
					 		 echo $rs_image[$i]["dd"];
						  }
						  else
						  {
						  	 echo $rs_image[$i]["job_asap"];
						  }
					  ?>		  </span><br />
					<span class="view-title">Job Title		: <?PHP echo html_entity_decode($rs_image[$i]["job_title"]); ?></span>
					<br/>
					<?PHP
					if($rs_image[$i]["reference"] != "")
					{
					?>
					Job Platform : <?PHP echo html_entity_decode($rs_image[$i]["reference"]); ?>
					<?PHP
					}
					else
					{
						if($rs_image[$i]["reference_name"] !=  "" )
						{
					?>
						Job Refered By :<?PHP echo html_entity_decode($rs_image[$i]["reference_name"]); ?>
					<?PHP		  
						}
					}
					?>					</td>
					<td width="150" bgcolor="#FFFFFF">
				
					&nbsp;
					<?PHP
							if(html_entity_decode($rs_image[$i]["application_status"]) == "QUALIFIED")
							{// status
					?>
								<!--<a href="javascript:;" onClick="jform('admin_process/candidate_status.php?apid=<?PHP //echo $rs_image[$i][appid]; ?>&st=INVITED&src=<?PHP //echo $_REQUEST[src]; ?>&page=<?PHP //echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP //echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">INV</a>
								&nbsp;-->
								
								<a href="javascript:;" onClick="rejform('template.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=REJECTED&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change','<?PHP echo $msgs; ?>');">REJ</a>&nbsp;
					<?PHP $msg1 = "Are You Sure want to delete?"; ?>
					<a href="javascript:;" onClick="cfrm('<?PHP echo $msg1; ?>','admin_process/candidate_delstatus.php?cid=<?PHP echo $rs_image[$i][ID]; ?>&apid=<?PHP echo $rs_image[$i][appid]; ?>&st=DELETED&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">DEL</a>	
							
			<?PHP
							}// status
							
							$aplink = $db->fetchSingleRow("select al.ID,al.application_status,al.remarks,DATE_FORMAT(al.auth_date,'%D %M, %Y') as dd,al.auth_by,aa.name from application_link al,admin_access aa where al.application_id='".$rs_image[$i]["appid"]."' and al.application_status='QUALIFIED' and al.auth_by = aa.ID");
							if($aplink)
							{// remarks
								$aplink_id = $aplink["ID"];
								$rmks = $aplink["remarks"];
							?>
					&nbsp;
					
					<a href="admin_support/new_remarks.php?alid=<?PHP echo $rs_image[$i]["appid"]; ?>&rsrc=<?PHP echo $_REQUEST["src"]; ?>" title="Read Remarks" class="example6" id="watch">RR</a>
				
					<?PHP
							}// remarks
					?>
					&nbsp;
				<a href="javascript:;" onClick="jform('admin_process/candidate_status.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=QUALIFIED&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">AR</a>						</td>
				  </tr>
<?PHP
				$sn = $sn + 1;
				} // for
?>				
	  </table>
    </td>
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
    <td><div align="center" class="error">No records found to list here</div></td>
  </tr>
<?PHP		
		}// count
?>  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>