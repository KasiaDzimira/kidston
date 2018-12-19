<?php
if($_REQUEST["act"] == "edit")
	{//if1
		$id = $_REQUEST["id"];
		//echo $id;
		$platform_type= $db->fetchSingleRow("select * from platform_master where ID = ".$id );
		$platform_name = $platform_type["platform_name"];
		$platform_status = $platform_type["status"];
	}	
?>	
<form name="frm_platform" id="frm_platform" action="admin_process/platform_save.php" method="post" onSubmit="return validation_platform();">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
		        <tr>
          <td><strong>Platform Details </strong> </td>
         <td>&nbsp;</td>
         <td colspan="2" align="right">&nbsp;</td>
         <td width="109" align="right">
		 <?php if($_REQUEST["act"] == "edit")
			 {
		 ?>
         <a href="home.php?src=add-platforms">Create New</a>
		<?php
			}
		?>
        </td>
        <td width="90" colspan="-1">&nbsp;</td>
        </tr>
		<tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4"><?php echo $db->errmsg[$db->decode64($_GET["resmsg"])]; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="25" colspan="4">&nbsp;</td>
        </tr>
		  <tr>
          <td width="228" height="35" valign="middle"><span class="bl-text">Platform Name*</span></td>
          <td width="13" align="center" valign="middle"><strong>:</strong></td>
          <td colspan="4" align="left"><input name="platform_title" type="text" class="field-job" id="platform_title" value="<?php echo $platform_name; ?>" /></td>
        </tr>
   <tr>
          <td height="35">&nbsp;</td>
          <td valign="middle">&nbsp;</td>
          <td colspan="4" align="left">
		  <input type="hidden" name="src" id="src" value="<?PHP echo $_REQUEST['src']; ?>" />
          <input type="hidden" name="id" id="id" value="<?PHP echo $_REQUEST['id'];?>" />
		  <input type="hidden" name="page" id="page" value="<?PHP echo $_REQUEST['page']; ?>"  />
		    <?PHP
				if($_REQUEST['act'] == "edit")
				{	
				?>
				<input type="submit" name="frm_update" id="frm_update" class="btn-common" value="Update" />
				<?PHP
				}
				else
				{
				?>
				 <input type="submit" name="frm_submit" id="frm_submit" class="btn-common" value="Submit" />
              <?PHP
				}
				?>
		    
          </td>
        </tr>
     </table></td></tr>
 </table>
	 
	 
	 <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
<?PHP
			$page = $_GET['page'];
			$limit = 75;
			
			$sql_list = "select * from platform_master order by platform_name";
		
			$fetch_image = $db->getTableArray($sql_list);
			$count_pg = count($fetch_image);
			
			$pager  = $db->getPagerData($count_pg, $limit, $page);  
			$offset = $pager->offset;  
			$limit  = $pager->limit;  
			$page   = $pager->page;
            if($count_pg > 0)
			{
?>  
    <tr>
      <td height="10" colspan="3" align="left" valign="middle" style="padding-left: 10px; padding-top:10px;"><strong>Language</strong></td>
      <td align="left" valign="top" colspan="4">
	   <?PHP	
	   
			// This is the code for listing the archives...
			
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
?>	  </td>
    </tr>
<?PHP
		}
		if($count_pg > 0)
		{ // # cp2
?>

    <tr>
      <td height="10" colspan="4" align="left" valign="middle">&nbsp;</td>
      <td align="left" valign="top"><span style="float:right; padding-right:18px;font-size:11px;">A - Activate / IN - Inactivate  / E - Edit / D - Delete</span></td>
    </tr>
    <tr class="title">
     <td width="72" height="50" align="center" valign="middle" bgcolor="#FFFFFF"><strong>#</strong></td>
     <td align="center" valign="middle" bgcolor="#FFFFFF" colspan="2"><strong> Platform </strong></td>
     <td width="143" align="center" valign="middle" bgcolor="#FFFFFF"><strong>Status</strong></td>
     <td width="330" align="center" valign="middle" bgcolor="#FFFFFF"><strong>Action</strong></td>
    </tr>
	    <?PHP		  
			$announce_list = $sql_list." limit $offset, $limit";
			$sn = 1;
			
			$rs_list = $db->getTableArray($announce_list);
			$count_rs = count($rs_list);
			for($i = 0;$i<$count_rs;$i++)
			{ //
			
?>
    <tr>
      <td height="35" align="center" valign="middle" bgcolor="#FFFFFF"><?PHP echo $sn; ?></td>
      <td align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;" colspan="2">
	  <?PHP echo $rs_list[$i]["platform_name"];  ?></td>
	     <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;">
	  <?PHP 
	  		if($rs_list[$i]['status'] =="Y")
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
			?>
	   
	   </td>
      <td align="center" valign="middle" bgcolor="#FFFFFF">
	  <?PHP 
	  		if($rs_list[$i]['status'] =="Y")
			{ 
	  ?>
	  		  <a href="admin_process/platform_save.php?id=<?PHP echo $rs_list[$i]['ID']; ?>&st=N&act=sts&src=<?PHP echo $_REQUEST[src]; ?>&page=<?php echo $_REQUEST[page]; ?>" class="red-link">IN</a>
		<?PHP 		
			}
			else
			{ 
		?>
			  <a href="admin_process/platform_save.php?id=<?PHP echo $rs_list[$i]['ID']; ?>&st=Y&act=sts&src=<?PHP echo $_REQUEST[src]; ?>&page=<?php echo $_REQUEST[page]; ?>" class="red-link">A</a>
		<?PHP 	
			} // else status
			?>&nbsp;
	  <a href="home.php?src=<?PHP echo $_REQUEST[src]; ?>&act=edit&id=<?PHP echo $rs_list[$i]['ID']; ?>&page=<?php echo $_REQUEST[page]; ?>" class="red-link">E</a> &nbsp;
	  
          <a href="javascript:;" class="red-link" onClick="return cfrm('Are you sure want to  delete?','admin_process/platform_save.php?act=del&id=<?PHP echo $rs_list[$i][ID]; ?>&page=<?php echo $_REQUEST[page]; ?>&src=<?PHP echo $_REQUEST['src']; ?>');">D</a>      
	  </td>
    </tr>
    <?PHP
		$sn +=  1;
			} // #w1
		} // # cp2
		
?>
  </table>
	 </form>   
