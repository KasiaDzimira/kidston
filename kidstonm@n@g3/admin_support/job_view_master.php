<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td height="50" align="left" valign="top"><b>Jobs Master List</b></td>

  </tr>

  <tr>

    <td height="50" align="left" valign="top">

	<form name="frm_jcode" id="frm_jcode" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return validate_applications(this);">

	Filter By :

  <select name="atype" id="atype" onchange="window.location = 'home.php?jstatus=<?PHP echo $_REQUEST[jstatus]; ?>&atype='+this.value+'&rp=<?PHP echo $_REQUEST[rp]; ?>&companyid=<?PHP echo $_REQUEST[companyid]; ?>&src=<?PHP echo $_REQUEST[src]; ?>';">

				  <option value="">Advertisement Type</option>

				  <option value="Intern" <?PHP if($_REQUEST[atype] == "Intern") {?> selected="selected" <?PHP } ?>>Intern</option>

				  <option value="Requested" <?PHP if($_REQUEST[atype] == "Requested") {?> selected="selected" <?PHP } ?>>Requested</option>

				  <option value="www" <?PHP if($_REQUEST[atype] == "www") {?> selected="selected" <?PHP } ?>>WWW</option>

				  <option value="">All</option>

				  </select>

				  

&nbsp;/&nbsp;

  <select name="jstatus" id="jstatus" onchange="window.location = 'home.php?jstatus='+this.value+'&rp=<?PHP echo $_REQUEST[rp]; ?>&companyid=<?PHP echo $_REQUEST[companyid]; ?>&atype=<?PHP echo $_REQUEST[atype];?>&src=<?PHP echo $_REQUEST[src]; ?>';">

				  <option value="">Job Status</option>

				  <option value="Y" <?PHP if($_REQUEST[jstatus] == "Y") {?> selected="selected" <?PHP } ?>>Active</option>

				  <option value="N" <?PHP if($_REQUEST[jstatus] == "N") {?> selected="selected" <?PHP } ?>>Inactive</option>

				  <option value="">All</option>

				  </select>

&nbsp;or&nbsp;



Job Code : <input type="text" name="frm_jobcode" id="frm_jobcode" class="field-job" maxlength="25">

<input type="hidden" name="src" id="src" value="<?PHP echo $_REQUEST[src]; ?>" />

	<input type="hidden" name="dmmy" id="dmmy" value="" style="display:none;">

	<input type="submit" name="search_submit" id="search_submit" value="Find" class="btn-common">&nbsp;



	<?PHP

			if($_REQUEST["frm_jobcode"] != "" || $_REQUEST["rp"] != "" || $_REQUEST["atype"] != "" || $_REQUEST["jstatus"] != "" || $_REQUEST[companyid] != "")

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

			if($_REQUEST["rp"] != "")

			{

				$rpp = $db->check_input($_REQUEST["rp"]);

				$apprp = " and jm.cont_pname='$rpp' ";

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

			

			

			$sql_image_pg = "select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.job_atype,jm.location,jm.cont_pname,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.job_asap,jm.admin_id,jm.status,cm.status as cstatus from job_details jm, company_details cm where jm.status <> 'D' and jm.status <> 'C' $apprp and jm.org_id = cm.ID order by jm.ID desc";

					

			if($_REQUEST["search_submit"] != "" && isset($_REQUEST["search_submit"]))		

			{// search_submit

				$jcode = $db->check_input($_REQUEST["frm_jobcode"]);

				$sql_image_pg = "select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.job_atype,jm.location,jm.cont_pname,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.job_asap,jm.admin_id,jm.status,cm.status as cstatus from job_details jm, company_details cm where jm.status <> 'D' and jm.status <> 'C' $apprp and jm.org_id = cm.ID and jm.job_code='$jcode' order by jm.ID desc";

			}// search_submit

	

			if($_REQUEST["companyid"] != "")

			{// companyid

				$cmid = $db->check_input($_REQUEST["companyid"]);

				$sql_image_pg = "select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.location,jm.cont_pname,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.job_asap,jm.admin_id,jm.status,cm.status as cstatus from job_details jm, company_details cm where jm.status <> 'D' and jm.status <> 'C' $apprp and jm.org_id = cm.ID and cm.ID='$cmid' order by jm.ID desc";

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

	<span style="float:right; padding-right:15px;font-size:11px;">P - Preview / A - Activate / IN - Inactivate / C - Closed / E - Edit / D - Delete </span>

				<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">

				  <tr align="center" valign="middle">

					<td width="35" height="35">#</td>

					<td width="200">Job Details </td>

					<td width="85">Company</td>

					<td width="85">Application Type</td>

					<td width="85">Applications</td>

					<td width="100">Presentations</td>

					<td width="75">Offers</td>

					<td width="90">Status</td>

				    <td width="95">&nbsp;</td>

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

					<?PHP 

					$company_detail = $db->fetchSingleRow("select * from company_details where ID='".$rs_image[$i]['org_id']."'");

					?>

					<span class="smtxt">

					Job Code		: <?PHP echo html_entity_decode($rs_image[$i]["job_code"]); ?><br />

					Apply By Date :<br /> 

					<?PHP 

							if($rs_image[$i]["job_asap"] != "")

								echo $rs_image[$i]["job_asap"];

						    else

								echo $rs_image[$i]["dd"]; 

								

							if($rs_image[$i]["status"] == "Y")

							{

								if($rs_image[$i]["job_atype"] == "Intern")

								{

									$jurl = SITE_URL."intern/".$rs_image[$i]['ID']."/".$db->stringToUrlSlug($rs_image[$i]['job_title']);

								}else

								{

									$jurl = SITE_URL."job/".$rs_image[$i]['ID']."/".$db->stringToUrlSlug($rs_image[$i]['job_title']);

								}

							}else

							{

									$jurl = "javascript:;";

							}
							

					?>	  
<!--<a href="<?PHP //echo $jurl; ?>" target="_blank">-->
					</span><br />

					<span class="view-title">Job Title		: <a href="<?PHP echo $jurl; ?>" target="_blank"><?PHP echo html_entity_decode($rs_image[$i]["job_title"]); ?></a></span>	  

					<br /><span class="smtxt"> Responsible Person : </span><a href="./home.php?atype=<?PHP echo $gatype; ?>&rp=<?PHP echo html_entity_decode($rs_image[$i][cont_pname]); ?>&companyid=<?PHP echo $cmid; ?>&src=<?PHP echo $_REQUEST[src]; ?>" class="sm-link"><?PHP echo html_entity_decode($rs_image[$i]["cont_pname"]); ?></a>					

					

					<?PHP

						$post = $db->getTableArray("select * from job_platforms where job_id=".$rs_image[$i]["ID"]);

						if(count($post) > 0 )

						{ // if count</td>

					?>

					<br /><span class="smtxt"> Posted In: </span><br />

					<?PHP 

							for($j=0;$j<count($post);$j++)

							{ // for j

								echo $post[$j]['platform']."<br>";

							}	

						}

					?>					

					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">

					<?PHP

					echo html_entity_decode($company_detail['comp_name']);

					echo "<br>";

					

					if($rs_image[$i]["cstatus"] == "Y")

						echo "<b>Active<b>";

					else

						echo "<b>Inactive</b>";	

					?>					</td>

					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP echo html_entity_decode($rs_image[$i]['job_atype']);?></td>

					<td bgcolor="#FFFFFF">

					<?PHP

						$app_count = $db->fetchSingleRow("select count(ID) from application_master where job_id='".$rs_image[$i]["ID"]."' and application_status <> 'REJECTED'");

						if($app_count[0] > 0)

						{// app

						

							//if($rs_image[$i]["status"] == "Y")

							//{

					?>

					 <a href="javascript:void(0)" onclick="window.open('admin_support/view_candidate_status.php?frm_jobcode=<?PHP echo html_entity_decode($rs_image[$i]['job_code']);?>','','width=1015,height=450,status=yes,scrollbars=yes')"><?PHP echo $app_count[0]; ?></a>

					<?PHP

							//}else

							//{

								//echo $app_count[0]; 

						

							//}

						}// app

						else

						{// app

							echo "N/A";

						}// app

					?>					</td>

					<td bgcolor="#FFFFFF">

					<?PHP

						$ps_count = $db->fetchSingleRow("select count(ID) from application_master where job_id='".$rs_image[$i]["ID"]."' and application_status = 'PRESENTED'");

						if($ps_count[0] > 0)

						{// app

							//if($rs_image[$i]["status"] == "Y")

							//{

					?>

					<a href="javascript:void(0)" onclick="window.open('admin_support/view_candidate_status.php?frm_jobcode=<?PHP echo $rs_image[$i]['job_code'];?>&appstatus=PRESENTED','','width=1015,height=450,scrollbars=yes,status=yes')"><?PHP echo $ps_count[0]; ?></a>

					<?PHP

							//}

							//else

							//{

								//echo $ps_count[0];

							//}

						}// app

						else

						{// app

							echo "N/A";

						}// app

					?>					</td>

					<td bgcolor="#FFFFFF">

					<?PHP

						$off_count = $db->fetchSingleRow("select count(ID) from application_master where job_id='".$rs_image[$i]["ID"]."' and application_status = 'OFFERED'");

						//echo "select count(ID) from application_master where job_id='".$rs_image[$i]["ID"]."' and application_status = 'OFFERED'";

						if($off_count[0] > 0)

						{// app

							//if($rs_image[$i]["status"] == "Y")

							//{

					?>

					<a href="javascript:void(0)" onclick="window.open('admin_support/view_candidate_status.php?frm_jobcode=<?PHP echo $rs_image[$i]['job_code'];?>&appstatus=OFFERED','','width=1015,height=450,scrollbars=yes,status=yes')"><?PHP echo $off_count[0]; ?></a>

					<?PHP

							//}else

							//{

								//echo $off_count[0];

							//}

						}// app

						else

						{// app

							echo "N/A";

						}// app

					?>					</td>

					<td bgcolor="#FFFFFF">

					<?PHP

							if($rs_image[$i]["status"] == "Y")

							{// status

								echo "PUBLISHED";

							}// status

							elseif($rs_image[$i]["status"] == "N")

							{// status

								echo "INACTIVE";

							}// status

							elseif($rs_image[$i]["status"] == "C")

							{// status

								//echo "CLOSED";

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

			 <a href="javascript:;" onClick="prmt('<?PHP echo $msg; ?>');">CLOSED</a>

		<?PHP

							}// status

					?>					</td>

				    <td bgcolor="#FFFFFF">

	  <a href="<?PHP echo $jurl; ?>" target="_blank">P</a>&nbsp;

	  <?PHP 

	  		if($rs_image[$i]['status'] == "Y")

			{ // if status

	  ?>

	  		  <a href="admin_process/add_job_save.php?rp=<?PHP echo $_REQUEST[rp]; ?>&companyid=<?PHP echo $cmid; ?>&st=N&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">IN</a>

		<?PHP 		

			} // if status

			elseif($rs_image[$i]['status'] == "N")

			{ // else status

		?>

			  <a href="admin_process/add_job_save.php?rp=<?PHP echo $_REQUEST[rp]; ?>&companyid=<?PHP echo $cmid; ?>&st=Y&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">A</a>

		<?PHP 	

			} // else status

			if($rs_image[$i]['status'] != "C")

			{ // else status

		?>

			  &nbsp;

			  <a href="javascript:;" onclick="jform('admin_process/add_job_save.php?rp=<?PHP echo $_REQUEST[rp]; ?>&companyid=<?PHP echo $cmid; ?>&st=C&act=st&id=<?PHP echo $rs_image[$i][ID]; ?>&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>');" class="red-link">C</a>

<!--			  <a href="admin_process/add_job_save.php?rp=<?PHP echo $_REQUEST[rp]; ?>&companyid=<?PHP echo $cmid; ?>&st=C&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">C</a>

-->		<?PHP 	

			} // else status

	   ?>&nbsp;

	  <a href="home.php?src=add-job&act=edit&amp;id=<?PHP echo $rs_image[$i]['ID']; ?>&amp;page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">E</a> &nbsp;

	  

          <a href="javascript:;" class="red-link" onclick="return cfrm('Are you sure to delete?','admin_process/add_job_save.php?rp=<?PHP echo $_REQUEST[rp]; ?>&companyid=<?PHP echo $cmid; ?>&act=del&id=<?PHP echo $rs_image[$i][ID]; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>');">D</a>					</td>

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

