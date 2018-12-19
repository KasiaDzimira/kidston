 <form action="admin_process/xml_save.php" method="post" name="frm_xml" id="frm_xml" target="_blank" onSubmit="return xml_validation();">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td align="left" valign="top"><b>XML Generator</b>&nbsp;&nbsp;<a href="../xmlwire/kidston_jobs.xml" target="_blank">Current Version of XML</a></td>

  </tr>

<?PHP

			$page = $_GET['page'];

			$limit = 100;

			$curdate = date("Y-m-d");

				//$sql_image_pg = "select * from job_details where publish_xml='Y' and status='Y' and (apply_date >= '$curdate' or job_asap='asap') and job_atype <> 'Intern'";

$sql_image_pg = "select * from job_details where publish_xml='Y' and status='Y' and (apply_date >= '$curdate' or job_asap='asap')";

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

					<td width="35" height="35"><input name="sel_all" type="checkbox" id="sel_all" onclick="return chkall()"  /></td>

					<td>Job Details </td>

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

					<td width="35" height="35" bgcolor="#FFFFFF">

					<?PHP

					$sql_xml = $db->getTableArray("select * from xml_master where job_id=".$rs_image[$i]["ID"]." and  status ='Y'");

					if(count($sql_xml)>0)

					{

						for($k =0;$k<count($sql_xml);$k++)

						{

					?>

					    <input type="checkbox" name="<?PHP echo "chk".$i; ?>" id="<?PHP echo "chk".$i; ?>" value="<?PHP echo $rs_image[$i]["ID"];?>" checked ="true" onclick="unchk1(<?PHP echo "chk".$i; ?>);">

					<?PHP

						}

					}

					else

					{

					?>

					  <input type="checkbox" name="<?PHP echo "chk".$i; ?>" id="<?PHP echo "chk".$i; ?>" value="<?PHP echo $rs_image[$i]["ID"];?>" onclick="unchk1(<?PHP echo "chk".$i; ?>);">

					 <?PHP

					 }

					 ?> </td>

					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">

					<span class="smtxt"><?PHP echo html_entity_decode($rs_image[$i]["job_title"]); ?></span>					</td>

				  </tr>				

<?PHP

				$sn = $sn + 1;

				} // for

?>			

  <tr align="center" valign="middle" onmouseover="changeCSS(this,'#FBFBE7','#FCFAF3','#535353');this.style.cursor='pointer'" onmouseout="changeCSS(this,'#F9F9F9','#FCFAF3','#535353');">

				    <td height="35" bgcolor="#FFFFFF"></td>

				    <td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;"><input name="btsave" type="submit" id="btsave" value="Generate XML" class="btn2">

			        <input name="lenval" type="hidden" id="lenval" value="<?PHP echo $i; ?>" /></td>

			      </tr>	

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

  </form>