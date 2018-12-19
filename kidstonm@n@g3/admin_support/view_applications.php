<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top"><b>Applications</b></td>
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
				$sql_image_pg = "select cd.ID,cd.name,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date,cd.status,jm.ID as jid,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.applied_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where jm.job_code ='$get_jobcode' and cd.status = 'Y' and jm.status = 'Y' and cm.status ='Y' and ap.application_status <> 'REJECTED' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
			}// jcode
			else
			{// jcode
				$sql_image_pg = "select cd.ID,cd.name,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date,cd.status,jm.ID as jid,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status as jstatus,ap.ID as appid,ap.resume,ap.applied_date,ap.application_status from candidate_master cd,job_details jm,application_master ap,company_details cm where cd.status = 'Y' and jm.status = 'Y' and cm.status ='Y' and ap.application_status <> 'REJECTED' and cd.ID = ap.candidate_id and jm.org_id = cm.ID and jm.ID = ap.job_id order by ap.ID desc";
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
					<td width="150">Status</td>
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
					Contact Number	: <?PHP echo html_entity_decode($rs_image[$i]["contact_number"]); ?></br>
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
					Job Code		: <?PHP echo html_entity_decode($rs_image[$i]["job_code"]); ?><br />
					Apply By Date : <?PHP echo $rs_image[$i]["dd"]; ?>	  </span><br />
					<span class="view-title">Job Title		: <?PHP echo html_entity_decode($rs_image[$i]["job_title"]); ?></span>
					</td>
					<td width="150" bgcolor="#FFFFFF">
					<?PHP
							if($rs_image[$i]["application_status"] != "N")
							{// status
								
								if($rs_image[$i]["application_status"] == "APPLIED")
									echo "<span class='app-color'>".$rs_image[$i]["application_status"]."</span>";
								if($rs_image[$i]["application_status"] == "QUALIFIED")
									echo "<span class='q-color'>".$rs_image[$i]["application_status"]."</span>";
								if($rs_image[$i]["application_status"] == "INFORMED")
									echo "<span class='inf-color'>".$rs_image[$i]["application_status"]."</span>";
								if($rs_image[$i]["application_status"] == "INVITED")
									echo "<span class='inv-color'>".$rs_image[$i]["application_status"]."</span>";
								if($rs_image[$i]["application_status"] == "PRESENTED")
									echo "<span class='pre-color'>".$rs_image[$i]["application_status"]."</span>";
								if($rs_image[$i]["application_status"] == "OFFERED")
									echo "<span class='off-color'>".$rs_image[$i]["application_status"]."</span>";
							
							
							}// status
							else
							{// status
								echo "N/A";
							}// status
					?>					</td>
				  </tr>
<?PHP
				$sn = $sn + 1;
				} // for
?>				
	  </table>
      <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
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
    <td><div align="center" class="error">No applications found to list here</div></td>
  </tr>
<?PHP		
		}// count
?>  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
