<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Recruiters Master List</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
	<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC"> 
  	<?PHP	
	
		if($_GET["resmsg"] != "")
		{ // msg
	
			echo $db->errmsg[$db->decode64($_GET["resmsg"])];
		} // msg
		
   
			// This is the code for listing the archives...
			$page = $_GET['page'];
			$limit = 20;
			
			$sql_admin_type = $db->fetchSingleRow("select * from admin_type where type_name = 'Recruiter' ");
			$admin_id = $sql_admin_type["ID"];
			
			$sql_image_pg = "select * from admin_access where admin_type = '".$admin_id."' and status <> 'D' order by ID desc";
		
			$fetch_image = $db->getTableArray($sql_image_pg);
			$count_pg = count($fetch_image);
			
			$pager  = $db->getPagerData($count_pg, $limit, $page);  
			$offset = $pager->offset;  
			$limit  = $pager->limit;  
			$page   = $pager->page;
			
		if($count_pg > 0)
		{ 		
			// This is the code for listing the archives...			
		if($pager->numPages > 1)
		{ // # cp1
?>

  <tr>
    <td width="240" height="10" colspan="4" align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="top" colspan="2">
	

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
</td>
  </tr>
<?PHP
		} // # cp1
?>    
  <tr>
    <td height="10" colspan="4" align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="top" colspan="2"><span style="float:right; padding-right:15px;font-size:11px;">A - Activate / IN - Inactivate / E - Edit / D - Delete</span></td>
  </tr>
  <?PHP
  		} // # cp1
		if($count_pg > 0)
		{ // # cp2
?>
  <tr class="title">
    <td width="50" height="30" align="center" valign="middle"><strong>#</strong></td>
    <td width="280" align="center" valign="middle"><strong>  Name </strong></td>
    <td colspan="2" align="center" valign="middle"><strong>Email</strong></td>
    <td width="129" align="center" valign="middle"><strong>Status</strong></td>
    <td width="212" align="center" valign="middle"><strong>Action</strong></td>
  </tr>
  <?PHP		  
			$sql_image = $sql_image_pg." limit $offset, $limit";
			$sn = 1;
			
			$rs_image = $db->getTableArray($sql_image);
			$count_rs = count($rs_image);
			for($i = 0;$i<$count_rs;$i++)
			{ //
			
?>
  <tr class="row" onmouseover="changeCSS(this,'#FBFBE7','#FCFAF3','#535353');this.style.cursor='pointer'" onmouseout="changeCSS(this,'#F9F9F9','#FCFAF3','#535353');">
    <td height="35" align="center" valign="middle" bgcolor="#FFFFFF"><?PHP echo $sn; ?></td>
    <td align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP 
				echo html_entity_decode($rs_image[$i]['name']);
	  ?>    </td>
    <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP 
				echo html_entity_decode($rs_image[$i]['email']);
		?>    </td>
    <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;">
	<?PHP 
	  		if($rs_image[$i]['status'] == "Y")
			{ // if status
	  ?>
       			Active
        <?PHP 		
			} // if status
			else
			{ // else status
		?>
       			Inactive
        <?PHP 	
			} // else status
	   ?>    </td>
    <td align="center" valign="middle" bgcolor="#FFFFFF">
	<?PHP 
	  		if($rs_image[$i]['status'] == "Y")
			{ // if status
	  ?>
        <a href="admin_process/add_manager_save.php?st=N&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link" >IN</a>
        <?PHP 		
			} // if status
			else
			{ // else status
		?>
        <a href="admin_process/add_manager_save.php?st=Y&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link" >A</a>
        <?PHP 	
			} // else status
	   ?>   &nbsp; 
	<a href="home.php?src=add-recruiters&act=edit&id=<?PHP echo $rs_image[$i]['ID']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">E</a> 
	&nbsp;
	
	 <a href="javascript:;" onclick="return cfrm('Are you sure to delete?','admin_process/add_manager_save.php?act=del&id=<?PHP echo $rs_image[$i][ID]; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>');" class="red-link">D</a> </td>
  </tr>
  <?PHP
		$sn +=  1;
			} // #w1
		} // # cp2
		
		else
		{ // # cp2
?>
  <tr class="even">
    <td height="30" colspan="6" align="center" valign="middle" bgcolor="#FFFFFF" class="error">No records found to list here..!</td>
  </tr>
  <?PHP
		} // # cp2
?>
</table>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
