<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top"><b>Applied Candidates</b></td>
  </tr>
  <?PHP if($_GET["resmsg"] != "") {?>
   <tr>
    <td height="50" align="left" valign="top">
	 <?PHP echo $db->errmsg[$db->decode64($_GET["resmsg"])];?></center><br />
</td>
  </tr>
  <?PHP } ?>
  <tr>
<?PHP
			$page = $_GET['page'];
			$limit = 75;
			 	

			
				$sql_image_pg = "select cd.ID,cd.name,cd.lastname,cd.sex,cd.dob,cd.address,cd.street,cd.city,cd.state,cd.country,cd.postalcode,cd.contact_number,cd.email,cd.applied_date as candidate_apply_date,cd.status,cd.reference,cd.reference_name,ap.ID as appid,ap.resume,ap.resume2, ap.resume3, ap.applied_date as application_apply_date,ap.application_status from candidate_master cd,application_master ap where cd.status = 'Y' and ap.application_status = 'APPLIED' and cd.ID = ap.candidate_id and ap.job_id=0 and cd.wlteam ='Y' order by ap.ID desc";
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
					<td width="150">Action</td>
				  </tr>
				  
<?PHP		  
			 $sql_template = $db->getTableArray("select * from template_master where status ='Y'");  
							
			 if(count($sql_template)>0 )
			 {
					for($r=0;$r<count($sql_template);$r++)
					{
							$msg .= $sql_template[$r]["template_name"]."<br>";
					}
			 }
				
				$sql_image = $sql_image_pg." limit $offset, $limit";
				$sn = 1;
				
				$rs_image = $db->getTableArray($sql_image);
				$count_rs = count($rs_image);
				for($i = 0;$i<$count_rs;$i++)
				{ // for
			
?>
				  <tr align="center" valign="middle" onmouseover="changeCSS(this,'#FBFBE7','#FCFAF3','#535353');this.style.cursor='pointer'" onmouseout="changeCSS(this,'#F9F9F9','#FCFAF3','#535353');">
					<td width="35" bgcolor="#FFFFFF"><?PHP echo $sn; ?></td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Name		: <a href="javascript:void(0)" onclick="window.open('admin_support/view_application_details.php?aid=<?PHP echo $rs_image[$i]['ID'];?>','','width=1015,height=450,scrollbars=yes,status=yes')">
<?PHP echo html_entity_decode($rs_image[$i]["name"])." ".html_entity_decode($rs_image[$i]["lastname"]); ?></a><br />
					Email : <?PHP echo html_entity_decode($rs_image[$i]["email"]); ?><br />
					<?PHP
						if($rs_image[$i]["contact_number"] != "")
						{
					?>
					Contact Number	: <?PHP echo html_entity_decode($rs_image[$i]["contact_number"]); ?><br/>
					<?PHP
						}
					?>	
						Join Date : <?PHP echo date("d M Y",strtotime($rs_image[$i]['candidate_apply_date'])); ?><br/>
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
					
				
					</td>
					<td width="150" bgcolor="#FFFFFF">
					<?PHP
							if($rs_image[$i]["application_status"] == "APPLIED")
							{// status
		 			?>
								
				
					<?PHP $msg1 = "Are You Sure want to delete?"; ?>
					<a href="javascript:;" onClick="cfrm('<?PHP echo $msg1; ?>','admin_process/candidate_delstatus.php?cid=<?PHP echo $rs_image[$i][ID]; ?>&apid=<?PHP echo $rs_image[$i][appid]; ?>&st=DELETED&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change');">Delete</a>
				
					<?PHP
							}// status
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
