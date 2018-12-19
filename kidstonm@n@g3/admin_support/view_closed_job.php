<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" valign="middle"><?PHP echo $db->errmsg[$db->decode64($_GET["resmsg"])]; ?></td>
  </tr>
  <tr>
    <td height="35" align="left" valign="top">
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
<?PHP
			$page = $_GET['page'];
			$limit = 75;
			
			$sql_image_pg = "select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.job_asap,jm.admin_id,jm.status from job_details jm, company_details cm where jm.status = 'C' and jm.org_id = cm.ID order by jm.ID desc";
		
			$fetch_image = $db->getTableArray($sql_image_pg);
			$count_pg = count($fetch_image);
			
			$pager  = $db->getPagerData($count_pg, $limit, $page);  
			$offset = $pager->offset;  
			$limit  = $pager->limit;  
			$page   = $pager->page;
            if($count_pg > 0)
			{
?>  
    <tr>
      <td height="10" colspan="4" align="left" valign="middle" style="padding-left: 10px; padding-top:10px;"><strong>Closed Jobs</strong></td>
      <td align="left" valign="top" colspan="2">
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
      <td align="left" valign="top" colspan="2"><span style="float:right; padding-right:15px;font-size:11px;"> E - Edit / D - Delete</span></td>
    </tr>
    <tr class="title">
      <td width="50" height="50" align="center" valign="middle" bgcolor="#FFFFFF"><strong>#</strong></td>
      <td align="center" valign="middle" bgcolor="#FFFFFF"><strong> Job Details </strong></td>
      <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><strong>Company</strong></td>
      <td width="129" align="center" valign="middle" bgcolor="#FFFFFF"><strong>Status</strong></td>
      <td width="212" align="center" valign="middle" bgcolor="#FFFFFF"><strong>Action</strong></td>
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
      <td align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;">
	  <?PHP 
	  		$company_detail = $db->fetchSingleRow("select * from company_details where ID='".$rs_image[$i]['org_id']."'");
	  ?>
	  <span class="smtxt">
	  Job Code		: <?PHP echo $rs_image[$i]["job_code"]; ?><br />
					Apply By Date :<br /> 
					<?PHP 
							if($rs_image[$i]["job_asap"] != "")
								echo $rs_image[$i]["job_asap"];
						    else
								echo $rs_image[$i]["dd"]; 
					?>	  
	  
	  
	  </span><br />
	  <span class="view-title">Job Title		: <?PHP echo html_entity_decode($rs_image[$i]["job_title"]); ?></span>	  </td>
      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;">
	  <?PHP
			echo html_entity_decode($company_detail['comp_name']);
	  ?>	  </td>
      <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;">
	  
	  <?PHP 
	  		if($rs_image[$i]['status'] =="Y")
			{ // if status
	  ?>
	  		  Active
		<?PHP 		
			} // if status
			elseif($rs_image[$i]['status'] =="Y")
			{ // else status
		?>
			  Inactive
		<?PHP 	
			} // else status
			elseif($rs_image[$i]['status'] == "C")
			{ // else status
				$sqlmsg = $db->fetchSingleRow("select sr.remarkss,DATE_FORMAT(sr.created_on,'%D %M, %Y') as dd,aa.name from status_remarks sr,admin_access aa where sr.job_id='".$rs_image[$i]["ID"]."' and sr.admin_id = aa.ID order by sr.ID desc");
				
				$rmks = "";
				$msg = "";
			
				if($sqlmsg)
				{
					$rmks = $sqlmsg["remarkss"];
					$msg = $rmks."<br>";
					$msg .= "By : ".$sqlmsg["name"]."<br>";
					$msg .= "On ".$sqlmsg["dd"]."<br>";
				}
		?>
			 <a href="javascript:;" onClick="prmt('<?PHP echo $msg; ?>');">Closed</a>
	   <?PHP
			} // else status
	   ?>      
	   
	   </td>
      <td align="center" valign="middle" bgcolor="#FFFFFF">
	  <!--<?PHP 
	  		if($rs_image[$i]['status'] =="Y")
			{ // if status
	  ?>
	  		  <a href="admin_process/add_job_save.php?st=N&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">IN</a>
		<?PHP 		
			} // if status
			elseif($rs_image[$i]['status'] =="N")
			{ // else status
		?>
			  <a href="admin_process/add_job_save.php?st=Y&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">A</a>
		<?PHP 	
			} // else status
			if($rs_image[$i]['status'] != "C")
			{ // else status
		?>
			 &nbsp;<a href="admin_process/add_job_save.php?st=C&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">C</a>
		<?PHP 	
			} // else status
	   ?>&nbsp;
	  <a href="home.php?src=<?PHP echo $_REQUEST[src]; ?>&amp;act=edit&amp;id=<?PHP echo $rs_image[$i]['ID']; ?>&amp;page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">E</a> &nbsp;-->
	  
          <a href="javascript:;" class="red-link" onclick="return cfrm('Are you sure to delete?','admin_process/add_job_save.php?act=del&id=<?PHP echo $rs_image[$i][ID]; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>');">D</a> 
		   &nbsp;
	  <a href="home.php?src=add-job&act=edit&id=<?PHP echo $rs_image[$i]['ID']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">E</a>
		  
		  
		  </td>
    </tr>
<!--    <tr >
      <td height="10" align="center" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
-->    <?PHP
		$sn +=  1;
			} // #w1
		} // # cp2
		
		else
		{ // # cp2
?>
    <tr class="even">
      <td height="30" colspan="6" align="center" valign="middle" class="error"><b>No records found to list here..!</b></td>
    </tr>
    <?PHP
		} // # cp2
?>
<!--    <tr >
      <td height="10" align="center" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="140" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="100" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
-->  </table>	
	</td>
  </tr>
  <tr>
    <td height="35" align="left" valign="top">&nbsp;</td>
  </tr>
</table>
