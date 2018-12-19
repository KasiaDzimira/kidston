<?PHP 
		if($_REQUEST['search']=="Search")
		{ // if 
		   $val = $_REQUEST['search_key'];
		   $loc = $_REQUEST['countrySelect'];
?>
			<script language="javascript" type="text/javascript">window.location  = "home.php?src=comp-search&sear=<?PHP echo $val ?>&loc=<?PHP echo $loc ?>";</script>	
<?PHP  } // if
?>
<table width="94%" border="0" align="center" cellpadding="1" cellspacing="1">
    
    <tr>
      <td height="75" colspan="7" align="left" valign="middle"><strong>Company View MasterList</strong> </td>
    </tr>
    <tr>
      <td height="10" colspan="7" align="left" valign="middle">
	  <form action="home.php?src=comp-search" method="post" name="frm_search" id="frm_search">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="36%" height="25">By Keyword:</td>
          <td colspan="3">By location:</td>
        </tr>
        <tr>
          <td height="35"><input name="search_key" type="text" class="field-job" id="search_key" value="<?PHP echo $_REQUEST['sear'];?>" /></td>
          <td>
		  	<select id='countrySelect' name='countrySelect' onchange='populateState()' class="field-job-drp">
            </select>
						 <?PHP 
						  	if($_REQUEST['loc']!="")
						  	{
						  ?>
                          <script type="text/javascript">initCountry('<?PHP echo $_REQUEST['loc'];?>'); </script>
						  <?PHP }else {?>
						  <script type="text/javascript">initCountry(''); </script>
						  <?PHP } ?>			
                          <script type="text/javascript">
							  document.getElementById('stateSelect').value="<?PHP echo $edit_state; ?>";
  						 </script>
		 </td>
          <td width="20%"><input name="search" id="search" type="submit" value="Search" class="btn-common" /></td>
          <td width="13%"><?PHP if($_REQUEST['sear']!="" || $_REQUEST['loc']){?>
            <a href="home.php?src=comp-search">View All</a>
            <?PHP }?></td>
        </tr>
      </table>
	  </form>
	  </td>
    </tr>
    <tr>
      <td height="10" colspan="4" align="left" valign="middle">&nbsp;</td>
      <td align="left" valign="top" colspan="3">
	   <?PHP	
	   
			// This is the code for listing the archives...
			$page = $_GET['page'];
			$limit = 20;
			
			$sql_image_pg = "select * from company_details where status='Y'";
			$val = $_REQUEST['sear'];
			$loc = $_REQUEST['loc'];
			
			if($_REQUEST['sear']!="" && $_REQUEST['loc']!="")
			{ // if
				 $sql_image_pg.="and comp_name LIKE  '%$val%' and country LIKE  '%$loc%' order by ID desc";
			} // if			
			else if($_REQUEST['sear']!="")
			{ // else if
				 $sql_image_pg.="and comp_name LIKE  '%$val%' order by ID desc";
			} // else if
			else if($_REQUEST['loc']!="")
			{ // else if
				 $sql_image_pg.="and country LIKE  '%$loc%' order by ID desc";
			}			
			else
			{ // else if
				$sql_image_pg.= " order by ID desc";
			} // else if
			
			//echo $sql_image_pg;
			$fetch_image = $db->getTableArray($sql_image_pg);
			$count_pg = count($fetch_image);
			
			$pager  = $db->getPagerData($count_pg, $limit, $page);  
			$offset = $pager->offset;  
			$limit  = $pager->limit;  
			$page   = $pager->page;
			
		if($count_pg > 0)
		{ // # cp1
?>

<span style="float:right; padding-right:15px;">

<?PHP
		if ($page == 1) // this is the first page - there is no previous page  
		echo "<span class='pg-menu-sel'>&#9668;</span>&nbsp;";  
		else            // not the first page, link to the previous page  
		echo "<a href=\"?src=".$_REQUEST["src"]."&sear=".$_REQUEST["sear"]."&loc=".$_REQUEST["loc"]."&orderby=".$order_by."&page=" . ($page - 1) ."\" class='pg-menu'>&#9668;</a>&nbsp;";  
?>
<span class="red-txt">&nbsp;Page <?PHP echo $page; ?> of <?PHP echo $pager->numPages; ?>&nbsp; Page(s)&nbsp;</span>
<?PHP 
		if ($page == $pager->numPages) // this is the last page - there is no next page  
		echo "<span class='pg-menu-sel'>&#9658;</span>";  
		else            // not the last page, link to the next page  
		echo "<a href=\"?src=".$_REQUEST["src"]."&sear=".$_REQUEST["sear"]."&loc=".$_REQUEST["loc"]."&orderby=".$order_by."&page=" . ($page + 1) ."\" class='pg-menu'>&#9658;</a>";
?>
</span>
<?PHP
		} // # cp1
?>	  </td>
    </tr>
    <tr>
      <td height="10" colspan="4" align="left" valign="middle">&nbsp;</td>
      <td align="left" valign="top" colspan="3">&nbsp;</td>
    </tr>
    <?PHP
		if($count_pg > 0)
		{ // # cp2
?>
    <tr class="title">
      <td width="41" height="30" align="center" valign="middle"><strong>#</strong></td>
      <td width="169" align="center" valign="middle"><strong> Company Name </strong></td>
      <td width="153" align="center" valign="middle"><strong>Location</strong></td>
      <td width="121" align="center" valign="middle"><strong>Jobs</strong></td>
      <td width="158" align="center" valign="middle"><strong>Presentations</strong></td>
      <td width="120" align="center" valign="middle"><strong>Offers</strong></td>
      <td width="133" align="center" valign="middle"><strong>Status</strong></td>
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
      <td height="35" align="center" valign="middle"><?PHP echo $sn; ?></td>
      <td align="left" valign="middle" style="padding-left: 10px;">
			<a href="javascript:void(0)" onclick="window.open('admin_support/comp_view.php?cid=<?PHP echo $rs_image[$i]['ID'];?>','','width=500,height=450,scrollbars=yes,status=yes')">
			  <?PHP 
					echo html_entity_decode($rs_image[$i]['comp_name']);
			  ?>
			 </a>		  </td>
      <td align="left" valign="middle" style="padding-left: 10px;">
		  <?PHP 
				echo html_entity_decode($rs_image[$i]['country']);
		  ?>	  </td>
      <td align="left" valign="middle" style="padding-left: 10px;"><?PHP 
				//echo $rs_image[$i]['industry_name'];
		?></td>
      <td align="center" valign="middle" style="padding-left: 10px;"><?PHP 
				//echo $rs_image[$i]['industry_name'];
		?></td>
      <td align="center" valign="middle" style="padding-left: 10px;"><?PHP 
				//echo $rs_image[$i]['industry_name'];
		?></td>
      <td align="center" valign="middle"><span style="padding-left: 10px;">
        <?PHP 
	  		if(html_entity_decode($rs_image[$i]['status']) =="Y")
			{ // if status
				echo html_entity_decode($rs_image[$i]['status']);
	  ?>
	  			
        <!--<a href="admin_process/add_company_save.php?st=N&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link" onClick="return confirm('Are you sure went to change the status?');">Inactive</a>-->
        <?PHP 		
			} // if status
			else
			{ // else status
					echo html_entity_decode($rs_image[$i]['status']);
		?>
        <!--<a href="admin_process/add_company_save.php?st=Y&act=st&id=<?PHP echo html_entity_decode($rs_image[$i]['ID']); ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link" onClick="return confirm('Are you sure went to change the status?');">Active</a>-->
        <?PHP 	
			} // else status
	   ?>
      </span></td>
    </tr>
    <?PHP
		$sn +=  1;
			} // #w1
		} // # cp2
		
		else
		{ // # cp2
?>
    <tr class="even">
      <td height="30" colspan="7" align="center" valign="middle" class="error"><b>No records found to list here..!</b></td>
    </tr>
    <?PHP
		} // # cp2
?>
    <tr >
      <td height="140" colspan="7" align="center" valign="top">&nbsp;</td>
    </tr>
  </table>
