<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top"><b>Talent Section</b></td>
  </tr>
<!--  <tr>
    <td height="50" align="left" valign="top">
	<form name="frm_jcode" id="frm_jcode" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return validate_applications(this);">
	Filter By :
  <select name="atype" id="atype" onchange="window.location = 'home.php?atype='+this.value+'&rp=<?PHP echo $_REQUEST[rp]; ?>&companyid=<?PHP echo $_REQUEST[companyid]; ?>&src=<?PHP echo $_REQUEST[src]; ?>';">
				  <option value="">Advertisement Type</option>
				  <option value="Intern" <?PHP if($_REQUEST[atype] == "Intern") {?> selected="selected" <?PHP } ?>>Intern</option>
				  <option value="Requested" <?PHP if($_REQUEST[atype] == "Requested") {?> selected="selected" <?PHP } ?>>Requested</option>
				  <option value="www" <?PHP if($_REQUEST[atype] == "www") {?> selected="selected" <?PHP } ?>>WWW</option>
				  <option value="">All</option>
				  </select>
				  
&nbsp;or&nbsp;
Job Code : <input type="text" name="frm_jobcode" id="frm_jobcode" class="field-job" maxlength="25">
<input type="hidden" name="src" id="src" value="<?PHP echo $_REQUEST[src]; ?>" />
	<input type="hidden" name="dmmy" id="dmmy" value="" style="display:none;">
	<input type="submit" name="search_submit" id="search_submit" value="Find" class="btn-common">&nbsp;

	<?PHP
			if($_REQUEST["frm_jobcode"] != "" || $_REQUEST["rp"] != "" or $_REQUEST["atype"] != "" || $_REQUEST[companyid] != "")
			{// jcode
	?>
	<a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?src=<?PHP echo $_REQUEST[src]; ?>">View All</a>
	<?PHP
			}// jcode
	?>
</form>
	</td>
  </tr>
-->  
<?PHP
			$page = $_GET['page'];
			$limit = 75;
			if($_REQUEST["rp"] != "")
			{
				$rpp = $db->check_input($_REQUEST["rp"]);
				$apprp = " and jm.cont_pname='$rpp' ";
			}
			if($_REQUEST["atype"] != "")
			{
				$gatype = $db->check_input($_REQUEST["atype"]);
				$apprp .= " and jm. job_atype='$gatype' ";
			}
			
			$sql_image_pg = "select * from candidate_master where status = 'Y' order by ID desc";
					
			if($_REQUEST["search_submit"] != "" && isset($_REQUEST["search_submit"]))		
			{// search_submit
				$jcode = $db->check_input($_REQUEST["frm_jobcode"]);
				$sql_image_pg = "select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.job_atype,jm.location,jm.cont_pname,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status from job_details jm, company_details cm where jm.status <> 'D' $apprp and cm.status ='Y' and jm.org_id = cm.ID and jm.job_code='$jcode' order by jm.ID desc";
			}// search_submit
	
			if($_REQUEST["companyid"] != "")
			{// companyid
				$cmid = $db->check_input($_REQUEST["companyid"]);
				$sql_image_pg = "select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,jm.cont_pname,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status from job_details jm, company_details cm where jm.status <> 'D' $apprp and cm.status ='Y' and jm.org_id = cm.ID and cm.ID='$cmid' order by jm.ID desc";
			}// companyid
			
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
    <td>
<?PHP	
		if($pager->numPages > 1)
		{ // # cp1
?>

<span style="float:right; padding-right:15px;">

<?PHP
		if ($page == 1) // this is the first page - there is no previous page  
		echo "<span class='pg-menu-sel'>&#9668;</span>&nbsp;";  
		else            // not the first page, link to the previous page  
		echo "<a href=\"?atype=".$_REQUEST[atype]."&rp=".$_REQUEST[rp]."&rp=".$_REQUEST[rp]."&companyid=".$cmid."&src=".$_REQUEST["src"]."&orderby=".$order_by."&page=" . ($page - 1) ."\" class='pg-menu'>&#9668;</a>&nbsp;";  
?>
<span class="red-txt">&nbsp;Page <?php echo $page; ?> of <?php echo $pager->numPages; ?>&nbsp; Page(s)&nbsp;</span>
<?PHP 
		if ($page == $pager->numPages) // this is the last page - there is no next page  
		echo "<span class='pg-menu-sel'>&#9658;</span>";  
		else            // not the last page, link to the next page  
		echo "<a href=\"?atype=".$_REQUEST[atype]."&rp=".$_REQUEST[rp]."&companyid=".$cmid."&src=".$_REQUEST["src"]."&orderby=".$order_by."&page=" . ($page + 1) ."\" class='pg-menu'>&#9658;</a>";
?>
</span>
<?PHP
		} // # cp1
?>		
	</td>
  </tr>
  
  <tr>
    <td align="left">
	<span style="float:right; padding-right:15px;font-size:11px;">A - Show in Talent Section / IN - Remove From Talent Section</span>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
				  <tr align="center" valign="middle">
					<td width="35" height="35">#</td>
					<td>Name</td>
					<td width="75">CV</td>
					<td width="95">Action</td>
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
					Name	:  <a href="javascript:void(0)" onclick="window.open('admin_support/view_application_details.php?aid=<?PHP echo $rs_image[$i]['ID'];?>','','width=1015,height=450,scrollbars=yes,status=yes')"><?PHP echo html_entity_decode($rs_image[$i]["name"]); ?></a><br>
					Candidate ID : <?PHP echo html_entity_decode($rs_image[$i]["ID"]); ?><br>
					Email	: <?PHP echo html_entity_decode($rs_image[$i]["email"]); ?><br>
					Phone	: <?PHP echo html_entity_decode($rs_image[$i]["contact_number"]); ?>
					<br>
					</span>
					<?PHP 
					$company_detail = $db->fetchSingleRow("select * from company_details where ID='".$rs_image[$i]['org_id']."'");
					?>					</td>
					<td bgcolor="#FFFFFF">
					<?PHP
						if(html_entity_decode($rs_image[$i]["resume"]) != "")
						{
					?>
					<a href="<?PHP echo SITE_URL.html_entity_decode($rs_image[$i]["resume"]); ?>">View</a>
					<?PHP
						}
					?>
					</td>
					<td bgcolor="#FFFFFF">
				  <?PHP 
						if($rs_image[$i]['guest_flag'] == "Y")
						{ // if status
				  ?>
						  <a href="admin_process/talent_save.php?st=N&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">IN</a>
					<?PHP 		
						} // if status
						elseif($rs_image[$i]['guest_flag'] == "N")
						{ // else status
					?>
						  <a href="admin_process/talent_save.php?st=Y&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">A</a>
					<?PHP 	
						}// else status
					?>
					</td>
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
    <td><div align="center" class="error">No jobs found to list here</div></td>
  </tr>
<?PHP		
		}// count
?>  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
