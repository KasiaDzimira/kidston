<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top"><b>Informed Candidates</b></td>
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
			 	


			//jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status
			//$sql_image_pg = "select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status from job_details jm, company_details cm where jm.status <> 'D' and cm.status ='Y' and jm.org_id = cm.ID order by jm.ID desc";
			if($_REQUEST["frm_jobcode"] != "")
			{// jcode
				$get_jobcode = $_REQUEST["frm_jobcode"]; 
				$sql_image_pg = "select cd.ID,cd.name,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date,cd.status,jm.ID as jid,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.applied_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where jm.job_code ='$get_jobcode' and cd.status = 'Y' and jm.status = 'Y' and cm.status ='Y' and ap.application_status = 'INFORMED' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
			}// jcode
			else
			{// jcode
				$sql_image_pg = "select cd.ID,cd.name,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date,cd.status,jm.ID as jid,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.applied_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where cd.status = 'Y' and jm.status = 'Y' and cm.status ='Y' and ap.application_status = 'INFORMED' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
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
				<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
				  <tr align="center" valign="middle">
					<td width="35" height="35">#</td>
					<td>Candidate Details</td>
					<td width="250">Job Details </td>
					<td width="150">Action</td>
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
<?PHP echo html_entity_decode($rs_image[$i]["name"]); ?></a><br />
					Email : <?PHP echo html_entity_decode($rs_image[$i]["email"]); ?>	 <br />
					<?PHP
						if($rs_image[$i]["contact_number"] != "")
						{
					?>
					Contact Number	: <?PHP echo $rs_image[$i]["contact_number"]; ?> <br />
					<?PHP
						}
						if($rs_image[$i]["resume"] != "")
						{
					?>
					resume	: <a href="<?PHP echo SITE_URL.html_entity_decode($rs_image[$i]["resume"]); ?>">View</a></br>
					<?PHP
						}
					?>
					
					</span>					</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Job Code		: <?PHP echo $rs_image[$i]["job_code"]; ?><br />
					Apply By Date : <?PHP echo $rs_image[$i]["dd"]; ?>	  </span><br />
					<span class="view-title">Job Title		: <?PHP echo html_entity_decode($rs_image[$i]["job_title"]); ?></span>
					</td>
					<td width="150" bgcolor="#FFFFFF">
					<?PHP
							if($rs_image[$i]["application_status"] == "INFORMED")
							{// status
					?>
					<a href="javascript:;" onClick="jform('admin_process/candidate_status.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=INVITED&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">Invite</a>&nbsp;&nbsp;
<!--					<a href="javascript:;" onClick="jform('admin_process/candidate_status.php?apid=<?PHP echo $rs_image[$i][appid]; ?>&st=REJECTED&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">Reject</a>
-->					<?PHP
							}// status
							
							$aplink = $db->fetchSingleRow("select al.remarks,DATE_FORMAT(al.auth_date,'%D %M, %Y') as dd,al.auth_by,aa.name from application_link al,admin_access aa where al.application_id='".$rs_image[$i]["appid"]."' and al.application_status='INFORMED' and al.auth_by = aa.ID");
							//echo "select al.remarks,DATE_FORMAT(al.auth_date,'%D %M, %Y) as dd,al.auth_by,aa.name from application_link al,admin_access aa where al.application_id='".$rs_image[$i]["appid"]."' and al.application_status='QUALIFIED' and al.auth_by = aa.ID";
							if($aplink)
							{// remarks
								$msg = $aplink["remarks"]."<br>";
								$msg .= "By : ".$aplink["name"]."<br>";
								$msg .= "On ".$aplink["dd"]."<br>";
					?>
					<a href="javascript:;" onClick="prmt('<?PHP echo $msg; ?>');">Remarks</a>
					<?PHP
							}// remarks
					?>
					</td>
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
