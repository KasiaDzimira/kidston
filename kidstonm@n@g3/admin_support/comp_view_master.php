<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top"><b>Company Master List</b> 
	<?PHP
	if($_REQUEST["rp"] != "" || $_REQUEST["atype"] != "" || $_REQUEST["cstatus"] != "" )
	{// ccode
	?>
	 - <a href="<?PHP echo $_SERVER['PHP_SELF']; ?>?src=<?PHP echo $_REQUEST[src]; ?>">View All</a>
	<?PHP
	}
	?> </td>
  </tr>  
<?PHP
			$page = $_GET['page'];
			$limit = 75;
			
			if($_REQUEST["rp"] != "")
			{
				$rpp = $db->check_input($_REQUEST["rp"]);
				$apprp = " and cm.link_manager='$rpp' ";
			}
			if($_REQUEST["atype"] != "")
			{
				$gatype = $db->check_input($_REQUEST["atype"]);
				$apprp .= " and jm.job_atype='$gatype' ";
			}
			if($_REQUEST["jstatus"] != "")
			{
				$gstatus = $db->check_input($_REQUEST["jstatus"]);
				$apprp .= " and jm.status='$gstatus' ";
			}
			
			if($_REQUEST["rp"] != "" || $_REQUEST["atype"] != "" || $_REQUEST["cstatus"] != "" )
			{// ccode
				$sql_image_pg = "select * from company_details where link_manager = '".$_REQUEST["rp"]."' order by status desc,comp_name ";
			}// ccode
			else
			{			
				$sql_image_pg = "select * from company_details order by status desc,comp_name ";
			}	
		
		
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
		echo "<a href=\"?src=".$_REQUEST["src"]."&orderby=".$order_by."&page=" . ($page - 1) ."\" class='pg-menu'>&#9668;</a>&nbsp;";  
?>
<span class="red-txt">&nbsp;Page <?php echo $page; ?> of <?php echo $pager->numPages; ?>&nbsp; Page(s)&nbsp;</span>
<?PHP 
		if ($page == $pager->numPages) // this is the last page - there is no next page  
		echo "<span class='pg-menu-sel'>&#9658;</span>";  
		else            // not the last page, link to the next page  
		echo "<a href=\"?src=".$_REQUEST["src"]."&orderby=".$order_by."&page=" . ($page + 1) ."\" class='pg-menu'>&#9658;</a>";
?>
</span>
<?PHP
		} // # cp1
?>		
	</td>
  </tr>
  
  <tr>
    <td align="left">
				<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
				  <tr align="center" valign="middle">
					<td width="35" height="35">#</td>
					<td>Company Name </td>
					<td width="150">Industry</td>
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
					<a href="javascript:void(0)" onclick="window.open('admin_support/comp_view.php?cid=<?PHP echo $rs_image[$i]['ID'];?>','','width=1015,height=450,scrollbars=yes,status=yes')">
					 <?PHP echo html_entity_decode($rs_image[$i]['comp_name']); ?></a> 
	  &nbsp;&nbsp;
	  <?PHP
	  		$jentry = $db->fetchSingleRow("select ID from job_details where org_id ='".$rs_image[$i]['ID']."' and status='Y'");
			if($jentry && html_entity_decode($rs_image[$i]['status']) == 'Y')
			{// jentry
	  ?>
	  - &nbsp;<a href="./home.php?companyid=<?PHP echo html_entity_decode($rs_image[$i]['ID']); ?>&src=view-job" class="sm-link">View Job Entries</a>
	  <?PHP 
	  		}
			//else
			//{// jentry
				//echo $rs_image[$i]['comp_name'];
			//}// jentry
		$sql_lm = $db->fetchSingleRow("select * from admin_access where ID = ".$rs_image[$i]["link_manager"]);
		if(count($sql_lm )>0)
		{
	  ?>     
	 - Contact Person : <a href="./home.php?atype=<?PHP echo $gatype; ?>&rp=<?PHP echo $sql_lm["ID"]; ?>&companyid=<?PHP echo $cmid; ?>&src=<?PHP echo $_REQUEST[src]; ?>" class="sm-link"><?PHP echo $sql_lm["name"]; ?>
	 </a>
	 <?PHP
	 	}
		?>		
					 </td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<?PHP echo html_entity_decode($rs_image[$i]['industry_name']); ?>	</td>					
					<td width="150" bgcolor="#FFFFFF">
					<span style="padding-left: 10px;">
        <?PHP 
	  		if(html_entity_decode($rs_image[$i]['status']) == "Y")
			{ // if status
				echo "<font color='green'>Active</font>";
			} // if status
			if(html_entity_decode($rs_image[$i]['status']) == "N")
			{ // else status
				echo "<font color='blue'>Inactive</font>";
			} // else status
			if(html_entity_decode($rs_image[$i]['status']) == "D")
			{ // else status
				echo "<font color='red'>Deleted</font>";
			} // else status
			
	   ?>
      </span>
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
