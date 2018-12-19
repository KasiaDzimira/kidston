<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
	<?PHP
			if(isset($_REQUEST['msg']))
			{
				if($_REQUEST['msg'] == "0")
				{
?>
<span style="color:#FF0000"><b>Enexpected Error! Process has not been Completed!</b></span>
<?PHP				
				}
				if($_REQUEST['msg'] == "1")
				{
?>
<span style="color:#009900;"><b>Process has been completed!</b></span>
<?PHP	
				}	
?>
<br />
<span style="color:#000000;"><b>Reference Number For this Restart: #<?PHP echo $_REQUEST['ref']; ?></b></span>
<?PHP						
			}
?>
	</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top">
	<div style="float:left;"><b>Platform Count</b></div>
	<div style="float:right;">
	<?PHP
			if($_SESSION["admin_type"] == "1" || $_SESSION["admin_type"] == "2")
			{
	?>
	<a href="admin_process/platform_restart.php?act=restart" onclick="return confirm('Are you sure want to restart the count?');">Restart</a>
	<?PHP
			}
	?>
	</div>
	</td>
  </tr>
 <?PHP
			$page = $_GET['page'];
			$limit = 75;
			 	
			$sql_image_pg = "select * from platform_master where status ='Y' order by platform_name";
			
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
					<td width="100">Platform</td>
					<td width="100">Total of Applied</td>
					<td width="150">Qualified of total applied</td>
					<td width="150">Offered of total qualified</td>
					<td width="100">Disqualified of total applied</td>
					<td width="100">Rejected total</td>
					<!--<td width="150">Total</td>-->
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
					<?PHP echo $rs_image[$i]["platform_name"]; ?>					</span></td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					<?PHP
					//$sql_cnt8 = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid FROM application_master am, candidate_master cm,platform_master pm WHERE cm.ID = am.candidate_id AND (am.application_status<>'DELETED') and cm.reference = pm.platform_name and pm.ID = ".$rs_image[$i]["ID"]." group by am.candidate_id");
//					$cnt_sql8 = count($sql_cnt8);
					$sql_cnt8 = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid FROM application_master am, candidate_master cm,platform_master pm WHERE cm.ID = am.candidate_id AND (am.application_status<>'DELETED') and cm.reference = pm.platform_name and pm.ID = ".$rs_image[$i]["ID"]." and am.platform_count_restart='N' group by am.candidate_id");
					$cnt_sql8 = count($sql_cnt8);
								
					$sql_cnt1 = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm,platform_master pm WHERE cm.ID = am.candidate_id AND am.application_status = 'APPLIED' and cm.reference = pm.platform_name and pm.ID = ".$rs_image[$i]["ID"]." and am.platform_count_restart='N' group by am.candidate_id");
					$cnt_sql1 = count($sql_cnt1);
					echo $cnt_sql8;
					?>
					</span>					</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					<?PHP
					$sql_cnt2 =  $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm,platform_master pm,application_link alm WHERE cm.ID = am.candidate_id AND alm.application_id=am.ID and alm.application_status IN('QUALIFIED','INVITED','PRESENTED') and cm.reference = pm.platform_name and pm.ID = ".$rs_image[$i]["ID"]." and am.platform_count_restart='N' group by am.candidate_id");
					
					$cnt_sql2 = count($sql_cnt2);
					echo $cnt_sql2." of ".$cnt_sql8;
					?>
					</span>					</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					<?PHP
					$sql_cnt5 = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm,platform_master pm,application_link alm  WHERE cm.ID = am.candidate_id AND  alm.application_id=am.ID and alm.application_status='OFFERED' and cm.reference = pm.platform_name and pm.ID = ".$rs_image[$i]["ID"]." and am.platform_count_restart='N' group by am.candidate_id");
					$cnt_sql5 = count($sql_cnt5);
					echo $cnt_sql5." of ".$cnt_sql2;
					?>
					</span>					</td>
					<td width="150" bgcolor="#FFFFFF" align="left">
					<span class="smtxt">
					<?PHP
					$sql_cnt7 = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm,platform_master pm,application_link alm  WHERE cm.ID = am.candidate_id AND alm.application_id=am.ID  and alm.application_status = 'UNQUALIFIED' and cm.reference = pm.platform_name and pm.ID = ".$rs_image[$i]["ID"]." and am.platform_count_restart='N' group by am.candidate_id");
					$cnt_sql7 = count($sql_cnt7);
					echo $cnt_sql7." of ".$cnt_sql8;
					?>
					</span>					</td>
					<td width="150" bgcolor="#FFFFFF" align="left">
					<span class="smtxt">
					<?PHP
					//$sql_cnt6 = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm,platform_master pm,application_link alm  WHERE cm.ID = am.candidate_id AND alm.application_id=am.ID  and alm.application_status = 'REJECTED' and cm.reference = pm.platform_name and pm.ID = ".$rs_image[$i]["ID"]." group by am.candidate_id ");
					
					$sql_cnt6 = $db->getTableArray("SELECT am.ID FROM application_master am,  candidate_master cm, platform_master pm, application_link alm WHERE cm.ID = am.candidate_id 	AND alm.application_id = am.ID AND alm.application_status =  'REJECTED' 					AND cm.reference = pm.platform_name AND pm.ID =".$rs_image[$i]["ID"]." and am.platform_count_restart='N' GROUP BY am.candidate_id UNION SELECT am.ID 					FROM application_master am, candidate_master cm, platform_master pm, application_link alm WHERE cm.ID = am.candidate_id 			AND alm.application_id = am.ID AND alm.application_status =  'UNQUALIFIED' AND cm.reference = pm.platform_name 	AND pm.ID =".$rs_image[$i]["ID"]." and am.platform_count_restart='N' GROUP BY am.candidate_id");
						
					$cnt_sql6 = count($sql_cnt6);
					//$total1 = $cnt_sql8 - $cnt_sql5;
					//$total1 = $cnt_sql6 + $cnt_sql7;
					//echo $cnt_sql6." of ".$cnt_sql8;
					echo $cnt_sql6;
					?>
					</span>					</td>
					</tr>	
								  
<?PHP
				$sn = $sn + 1;
				} // for
?>				
	<tr align="center" valign="middle">
			<td width="100" bgcolor="#FFFFFF"><?PHP echo $sn; ?></td>
			<td width="100" bgcolor="#FFFFFF" align="left"><span class="smtxt">Refered By</span></td>
			<td width="150" bgcolor="#FFFFFF"  style="padding-left: 10px;" align="left">
			<span class="smtxt">
			<?PHP
					$sql_cnth = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm WHERE cm.ID = am.candidate_id AND (am.application_status<>'DELETED') and cm.reference_name <> '' and am.platform_count_restart='N' group by am.candidate_id");
					$cnt_sqlh = count($sql_cnth);
					$sql_cnta = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm WHERE cm.ID = am.candidate_id AND am.application_status =  'APPLIED' and cm.reference_name <> '' and am.platform_count_restart='N' group by am.candidate_id");
					$cnt_sqla = count($sql_cnta);
					echo $cnt_sqlh;
			?>
			</span>			</td>
			<td width="100" bgcolor="#FFFFFF" style="padding-left: 10px;" align="left">
			<span class="smtxt">
			<?PHP
				$sql_cntb = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm,application_link alm WHERE cm.ID = am.candidate_id AND alm.application_id=am.ID and alm.application_status IN('QUALIFIED','INVITED','PRESENTED') AND  cm.reference_name <> '' and am.platform_count_restart='N' group by am.candidate_id");
				$cnt_sqlb = count($sql_cntb);
				echo $cnt_sqlb." of ".$cnt_sqlh;
			?>
			</span>			</td>
			<td width="100" bgcolor="#FFFFFF" style="padding-left: 10px;" align="left">
			<span class="smtxt">
			<?PHP
				$sql_cnte = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm,application_link alm WHERE cm.ID = am.candidate_id  AND  alm.application_id=am.ID and alm.application_status='OFFERED' and cm.reference_name <> '' and am.platform_count_restart='N' group by am.candidate_id");
				$cnt_sqle = count($sql_cnte);
				echo $cnt_sqle." of ".$cnt_sqlb;
			?>
			</span>			</td>
			<td width="100" bgcolor="#FFFFFF"  style="padding-left: 10px;" align="left">
			<span class="smtxt">
			<?PHP
				$sql_cntg = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm,application_link alm WHERE cm.ID = am.candidate_id AND  alm.application_id=am.ID and alm.application_status='UNQUALIFIED' and cm.reference_name <> '' and am.platform_count_restart='N' group by am.candidate_id");
				$cnt_sqlg = count($sql_cntg);
				echo $cnt_sqlg." of ".$cnt_sqlh;
			?>
			</span>			</td>
			<td width="100" bgcolor="#FFFFFF"  style="padding-left: 10px;" align="left">
			<span class="smtxt">
			<?PHP
				//$sql_cntf = $db->getTableArray("SELECT cm.ID AS CID,am.ID as aid,am.application_status,am.applied_date FROM application_master am, candidate_master cm,application_link alm WHERE cm.ID = am.candidate_id AND alm.application_id=am.ID and alm.application_status =  'REJECTED' and cm.reference_name <> '' group by am.candidate_id");
				
				$sql_cntf = $db->getTableArray("SELECT am.ID  FROM application_master am, candidate_master cm,application_link alm WHERE cm.ID = am.candidate_id AND alm.application_id=am.ID and alm.application_status =  'REJECTED' and cm.reference_name <> '' and am.platform_count_restart='N' GROUP BY am.candidate_id UNION SELECT am.ID  FROM application_master am, candidate_master cm,application_link alm WHERE cm.ID = am.candidate_id AND alm.application_id=am.ID and alm.application_status =  'UNQUALIFIED' and cm.reference_name <> '' and am.platform_count_restart='N' GROUP BY am.candidate_id");
				$cnt_sqlf = count($sql_cntf);
				//echo $cnt_sqlf." of ".$cnt_sqlh;
				//$total2 = $cnt_sqlh - $cnt_sqle;
				$total2 = $cnt_sqlg + $cnt_sqlf;
				echo $cnt_sqlf;
			?>
			</span>			</td>
  </tr>
  </table>    </td>
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
