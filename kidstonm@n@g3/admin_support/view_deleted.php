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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top"><b>Deleted Candidates</b></td>
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
				$sql_image_pg = "select cd.ID,cd.name,cd.lastname,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date as candidate_apply_date,cd.status,cd.reference,jm.ID as jid,jm.org_id,jm.job_code, jm.job_title,jm.job_asap, jm.job_brief, jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.resume2,ap.resume3,ap.applied_date as application_apply_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where jm.job_code ='$get_jobcode' and cd.status = 'Y' and ap.application_status = 'DELETED' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
			}// jcode
			else
			{// jcode
				$sql_image_pg = "select cd.ID,cd.name,cd.lastname,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date as candidate_apply_date,cd.status,cd.reference,jm.ID as jid,jm.org_id,jm.job_asap,jm.job_code, jm.job_title, jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.resume2,ap.resume3,ap.applied_date as application_apply_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where cd.status = 'Y' and ap.application_status = 'DELETED' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
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
	<span style="float:right; padding-right:15px;font-size:11px;"> AR -Add Remarks / RR - Read Remarks / DEL - Delete / REJ - Reject</span>
				<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
				  <tr align="center" valign="middle">
					<td width="35" height="35">#</td>
					<td>Candidate Details</td>
					<td width="250">Job Details </td>
					<td width="150">Remarks</td>
				  </tr>
<?PHP		  
				$sql_image = $sql_image_pg." limit $offset, $limit";
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
					Name		: <a href="javascript:void(0)" onclick="window.open('admin_support/view_application_details.php?aid=<?PHP echo $rs_image[$i]['ID'];?>','','width=1015,height=450,scrollbars=yes,status=yes')">
<?PHP echo html_entity_decode($rs_image[$i]["name"])." ".html_entity_decode($rs_image[$i]["lastname"]); ?></a><br />
					Email : <?PHP echo html_entity_decode($rs_image[$i]["email"]); ?>	 <br />
					<?PHP
						if($rs_image[$i]["contact_number"] != "")
						{
					?>
					Contact Number	: <?PHP echo $rs_image[$i]["contact_number"]; ?><br />
					<?PHP
						}
					?>
					Join Date : <?PHP echo date("d M Y",strtotime($rs_image[$i]['candidate_apply_date'])); ?><br />
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
					
					</span>					</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Job Code		: <?PHP echo $rs_image[$i]["job_code"]; ?><br />
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
					?>	
					</td>
					<td width="150" bgcolor="#FFFFFF">
					<?PHP
												$aplink = $db->fetchSingleRow("select al.ID,al.application_status,al.remarks,DATE_FORMAT(al.auth_date,'%D %M, %Y') as dd,al.auth_by,aa.name from application_link al,admin_access aa where al.application_id='".$rs_image[$i]["appid"]."' and al.auth_by = aa.ID and al.application_status='DELETED'");
										
				$rmks = "";
				$msg = "";
							if($aplink)
							{// remarks
								$aplink_id = $aplink["ID"];
								$rmks = $aplink["remarks"];
																//echo $msg;
								?>
								<!--<a href="admin_support/new_remarks.php?alid=<?PHP echo $rs_image[$i]["appid"]; ?>&rsrc=<?PHP echo $_REQUEST["src"]; ?>" title="Read Remarks" class="greybox">RR</a>-->
								<a href="admin_support/new_remarks.php?alid=<?PHP echo $rs_image[$i]["appid"]; ?>&rsrc=<?PHP echo $_REQUEST["src"]; ?>" title="Read Remarks" class="example6" id="watch">RR</a>
							
								<?PHP
							}// remarks
				?>	&nbsp;
					<a href="javascript:;" onClick="jform('admin_process/candidate_status.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=DELETED&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">AR</a>					</td>
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
