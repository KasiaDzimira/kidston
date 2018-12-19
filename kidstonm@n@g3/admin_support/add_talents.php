<script language="javascript" type="text/javascript">
var count = "40"; 
function limiter()
{
	var tex = document.frm_job.cdesign.value;
	var len = tex.length;
	if(len > count)
	{
				tex = tex.substring(0,count);
				document.frm_job.cdesign.value =tex;
				return false;
	}
		document.frm_job.climit.value = count-len;
}

</script>
<form action="admin_process/add_talents_save.php" method="post" name="frm_job" id="frm_job" onsubmit="return validation_talents();">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td><strong>Talents Section</strong></td>
            <td>&nbsp;</td>
            <td width="513" align="right">&nbsp;</td>
            <td width="116" align="right"><?PHP if($_REQUEST['act']=="edit"){?>
              <a href="home.php?src=talents">Create New</a>
              <?PHP }?></td>
            <td width="45" colspan="-1">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td height="25" colspan="3"><span class="blue-bg-link">
              <?PHP

		if($_REQUEST['act'] == "edit")

		{//edit

			$sql_edit = "select * from talents where ID = ".$_REQUEST['id'] ;

			$fetch_edit = $db->fetchSingleRow($sql_edit);

			

				$edit_cname	 = html_entity_decode($fetch_edit["cond_name"]);

				$edit_cdesign	= html_entity_decode($fetch_edit["curr_design"]);

				$edit_ksumm 	 = html_entity_decode($fetch_edit["know_summ"]);

				$edit_location = html_entity_decode($fetch_edit["location"]);

				$edit_bline = html_entity_decode($fetch_edit["busi_line"]);

				//$edit_jobbrief 	 =   htmlspecialchars_decode($fetch_edit["job_brief"]);

				$edit_age =  html_entity_decode($fetch_edit["age"]);

				$edit_employ =  html_entity_decode($fetch_edit["employ"]);



				$edit_summ = html_entity_decode($fetch_edit["summary"]);

				$edit_degr = html_entity_decode($fetch_edit["degrees"]);

				$edit_feduc = html_entity_decode($fetch_edit["feducation"]);

				$edit_available = html_entity_decode($fetch_edit["available"]);

				$edit_skillz = html_entity_decode($fetch_edit["skills"]);

				

				$edit_cont_pname 	 = html_entity_decode($fetch_edit["cpreson_name"]);								

				$edit_cont_pemail 	 = html_entity_decode($fetch_edit["cpreson_email"]);

				$edit_status		 = html_entity_decode($fetch_edit["status"]);

			

		}//edit

		echo $db->errmsg[$db->decode64($_GET["resmsg"])];

		

		?>
              </span></td>
          </tr>
          <tr>
            <td height="35" valign="middle"><span class="bl-text">Candidate Name</span> *</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><input name="can_name" type="text" class="field-job" id="can_name" value="<?PHP echo $edit_cname;?>" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Current Designation * </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><input name="cdesign" type="text" class="field-job" id="cdesign" value="<?PHP echo $edit_cdesign;?>" srows=3 cols=40 onkeyup=limiter();><font size="1" face="arial, helvetica, sans-serif"> Only 40 characters
 allowed!</font> <script type="text/javascript">
document.write("<input type=text name=climit size=2 readonly value="+count+"> <font size='1' face='arial, helvetica, sans-serif'>characters left</font>");
</script></td>
          </tr>
         <!-- <tr>
            <td height="35" valign="middle">Know How Summary </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><textarea name="know_summ" class="field-job" id="know_summ"><?PHP echo $edit_ksumm; ?></textarea></td>
          </tr>-->
          <tr>
            <td height="35" valign="middle">Location</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left">
            
 <select name="location" id="location" class="field-job-drp">
        <option value="" selected="selected">Location </option>
        <option value="Bern Region"  <?PHP if($edit_location=='Bern Region'){?> selected="selected"<?PHP }?>>Bern Region</option>
        <option value="Zurich Region" <?PHP if($edit_location=='Zurich Region'){?> selected="selected"<?PHP }?>>Zurich Region</option>
        <option value="North Switzerland (BS BL AG SO)" <?PHP if($edit_location=='North Switzerland (BS BL AG SO)'){?> selected="selected"<?PHP }?>>North Switzerland (BS BL AG SO)</option>
        <option value="East Switzerland (SH TG AI AR SG GL GR)" <?PHP if($edit_location=='East Switzerland (SH TG AI AR SG GL GR)'){?> selected="selected"<?PHP }?>>East Switzerland (SH TG AI AR SG GL GR)</option>
        <option value="West Switzerland (GE JU NE FR VD)" <?PHP if($edit_location=='West Switzerland (GE JU NE FR VD)'){?> selected="selected"<?PHP }?>>West Switzerland (GE JU NE FR VD)</option>
        <option value="Central Switzerland (LU ZG SZ NW OW UR)" <?PHP if($edit_location=='Central Switzerland (LU ZG SZ NW OW UR)'){?> selected="selected"<?PHP }?>>Central Switzerland (LU ZG SZ NW OW UR)</option>
            </select>
            </td>
          </tr>
          <tr>
            <td height="35" valign="middle">Job Area * </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><!--<input name="business" type="text" class="field-job" id="business" value="<?PHP //echo $edit_bline;?>" />-->
            
               <select class="field-job-drp" name="business" id="business">
                <option value="" selected="selected">Job Area </option>
                
                    <option value="1st Level Support / Helpdesk" <?PHP if($edit_bline=="1st Level Support / Helpdesk Support"){?> selected="selected"<?PHP }?>>1st Level Support / Helpdesk</option>
                    <option value="2nd Level Support" <?PHP if($edit_bline=="2nd Level Support"){?> selected="selected"<?PHP }?>>2nd Level Support</option>
                    <option value="3rd Level - Client System Engineering/SW Packaging" <?PHP if($edit_bline=="3rd Level - Client System Engineering / SW Packaging"){?> selected="selected"<?PHP }?>>3rd Level - Client System Engineering / SW Packaging</option>
                    <option value="3rd Level - Server System Engineer/Administrator" <?PHP if($edit_bline=="3rd Level - Server System Engineer / Administrator"){?> selected="selected"<?PHP }?>>3rd Level - Server System Engineer / Administrator</option>
                    <option value="Network Specialist/Administrator/Engineer/Security" <?PHP if($edit_bline=="Network Specialist/Administrator/Engineer/Security"){?> selected="selected"<?PHP }?>>Network Specialist / Administrator  / Engineer / Security</option>
                    <option value="Unix/Linux Specialist" <?PHP if($edit_bline=="Unix/Linux Specialist"){?> selected="selected"<?PHP }?>>Unix / Linux Specialist</option>
                    <option value="Web Programming/Publishing/Development" <?PHP if($edit_bline=="Web Programming/Publishing/Development"){?> selected="selected"<?PHP }?>>Web Programming / Publishing / Development</option>
                    <option value="Database Specialist/Development/Administrator" <?PHP if($edit_bline=="Database Specialist/Development/Administrator"){?> selected="selected"<?PHP }?>>Database Specialist / Development / Administrator</option>
                    <option value="Software Architect/Engineering/Programming" <?PHP if($edit_bline=="Software Architect/Engineering/Programming"){?> selected="selected"<?PHP }?>>Software Architect / Engineering / Programming</option>
                    <option value="ERP/SAP/CRM" <?PHP if($edit_bline=="ERP/SAP/CRM"){?> selected="selected"<?PHP }?>>ERP / SAP / CRM</option>
                    <option value="Project Management" <?PHP if($edit_bline=="Project Management"){?> selected="selected"<?PHP }?>>Project Management</option>
                    <option value="Consulting/Audit/Security/Analyse" <?PHP if($edit_bline=="Consulting/Audit/Security/Analyse"){?> selected="selected"<?PHP }?>>Consulting / Audit / Security / Analyse</option>
                    <option value="IT Management / Service Delivery Management" <?PHP if($edit_bline=="IT Management / Service Delivery Management"){?> selected="selected"<?PHP }?>>IT Management / Service Delivery Management</option>
                    <option value="Various Jobs" <?PHP if($edit_bline=="Various Jobs"){?> selected="selected"<?PHP }?>>Various Jobs</option>
            </select>
            </td>
          </tr>
          <tr>
            <td height="35" valign="middle">Age</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><input name="age" type="text" class="field-job" onkeypress="return num_only(event);" id="age" value="<?PHP echo $edit_age;?>" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Desired Type of Employment</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left">
            
            <select class="field-job-drp" name="employ" id="employ">
                <option value="" selected="selected">Job Type </option>
                <option value="Permanent" <?PHP if($edit_employ=="Permanent"){?> selected="selected"<?PHP }?>>Permanent</option>
                <option value="Temporary" <?PHP if($edit_employ=="Temporary"){?> selected="selected"<?PHP }?>>Temporary</option>
                <option value="Contract" <?PHP if($edit_employ=="Contract"){?> selected="selected"<?PHP }?>>Contract</option>
              </select>
              
            <!--<input name="employ" type="text" class="field-job" id="employ" value="<?PHP //echo $edit_employ;?>" />--></td>
          </tr>
          <tr>
            <td height="45" valign="middle">Summary</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><textarea name="summary" class="field-job" id="summary" rows="5" cols="40" style="width: 50%"><?PHP echo $edit_summ;?></textarea></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Skills </td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="3" align="left"><textarea id="skillz" name="skillz" rows="5" cols="40" style="width: 50%"><?PHP echo $edit_skillz; ?></textarea></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Certifications/Degrees</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><input name="degrees" type="text" class="field-job" id="degrees" value="<?PHP echo $edit_degr;?>" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Language </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><div id="pg">
                <?PHP

		   $sql_language = $db->getTableArray("select * from language_master where status = 'Y'");

		   $statevalue = "";

		  		if($_REQUEST["act"] == "edit")

				{// edit

				

						$sql_lang = $db->getTableArray("select * from talents_language where talent_id='".$_REQUEST['id']."'");

						if(count($sql_lang)>0)

						{// $jlang

							for($e=0;$e<count($sql_lang);$e++)

							{// for e

		  ?>
                <div id="my<?PHP echo ($e+1); ?>Div"> <br />
                  <div>
                    <select name="frm_language_<?PHP echo $e; ?>" id="frm_language_<?PHP echo $e; ?>" class="field-job-drp">
                      <option value="" selected="selected">Select a Language</option>
                      <?php

					     for($i=0;$i<count($sql_language);$i++)

	  					{

						//------statevalue-------//

							if($statevalue == "")

							{

							$statevalue = $sql_language[$i]["language_name"];

							}

							else

							{

							$statevalue = $statevalue.",".$sql_language[$i]["language_name"];

							}

						?>
                      <option value="<?PHP echo $sql_language[$i]["language_name"]; ?>" <?php if($sql_lang[$e][language] == $sql_language[$i]["language_name"]) { ?> selected = "selected" <?php } ?> > <?php echo $sql_language[$i]["language_name"]; ?></option>
                      <?php

					}

					?>
                    </select>
                    <br />
                    <input type="radio" name="frm_f_<?PHP echo $e; ?>" id="frm_f1_<?PHP echo $e; ?>" value="Native" <?PHP if($sql_lang[$e][language_level] == "Native"){ ?> checked="checked" <?PHP } ?> />
                    Native
                    
                    &nbsp;
                    <input type="radio" name="frm_f_<?PHP echo $e; ?>" id="frm_f2_<?PHP echo $e; ?>" value="Fluent" <?PHP if($sql_lang[$e][language_level] == "Fluent"){ ?> checked="checked" <?PHP } ?> />
                    Fluent
                    
                    &nbsp;
                    <input type="radio" name="frm_f_<?PHP echo $e; ?>" id="frm_f3_<?PHP echo $e; ?>" value="Basic" <?PHP if($sql_lang[$e][language_level] == "Basic"){ ?> checked="checked" <?PHP } ?> />
                    Basic </div>
                  <?PHP

				if($e > 0)

				{

			?>
                  <span style='float:right;'> -<a href="javascript:my<?PHP echo ($e+1); ?>Div;" onclick="removeElementone('my<?PHP echo ($e+1); ?>Div')" class="error">Remove</a></span><br />
                  <?PHP

		  		}

					  

		  ?>
                </div>
                <?PHP

		  					}// for e

		  ?>
                <input type="hidden" value="<?PHP echo $e; ?>" id="theValue" name="theValue" />
                <?PHP

						}// $jlang

						else

						{// $jlang

		  ?>
                <select name="frm_language_0" id="frm_language_0" class="field-job-drp">
                  <option value="" selected="selected">Select a Language</option>
                  <?php 

					  for($i=0;$i<count($sql_language);$i++)

	  					{

							if($statevalue == "")

							{

							$statevalue = $sql_language[$i]["language_name"];

							}

							else

							{

							$statevalue = $statevalue.",".$sql_language[$i]["language_name"];

							}

						?>
                  <option value="<?PHP echo $sql_language[$i]["language_name"]; ?>" > <?php echo $sql_language[$i]["language_name"]; ?></option>
                  <?php

					}

					?>
                </select>
                <br />
                <input type="radio" name="frm_f_0" id="frm_f1_0" value="Native" />
                Native
                
                &nbsp;
                <input type="radio" name="frm_f_0" id="frm_f2_0" value="Fluent" />
                Fluent
                
                &nbsp;
                <input type="radio" name="frm_f_0" id="frm_f3_0" value="Basic" />
                Basic </div>
              <input type="hidden" value="1" id="theValue" name="theValue" />
              <?PHP					

						}// $jlang

		  		}// edit

				else

				{// edit

		  ?>
              <select name="frm_language_0" id="frm_language_0" class="field-job-drp">
                <option value="" selected="selected">Select a Language</option>
                <?php 

					   

					  for($i=0;$i<count($sql_language);$i++)

					  {

					  	//$statevalue

							if($statevalue == "")

							{

							$statevalue = $sql_language[$i]["language_name"];

							}

							else

							{

							$statevalue = $statevalue.",".$sql_language[$i]["language_name"];

							}

						

					  ?>
                <option value="<?php echo $sql_language[$i]["language_name"]; ?>" ><?php echo $sql_language[$i]["language_name"]; ?></option>
                <?php

					  }

					  ?>
              </select>
              <br />
              <input type="radio" name="frm_f_0" id="frm_f1_0" value="Native" />
              Native
              
              &nbsp;
              <input type="radio" name="frm_f_0" id="frm_f2_0" value="Fluent" />
              Fluent
              
              &nbsp;
              <input type="radio" name="frm_f_0" id="frm_f3_0" value="Basic" />
              Basic
              </div>
              <input type="hidden" value="1" id="theValue" name="theValue" />
              <?PHP

		  		}// edit

		  ?>
              <input type="hidden" name="stateload" id="stateload" value="<?PHP echo $statevalue; ?>"  />
              </div>
              <!--		  <input name="frm_language" type="text" class="field-job" id="frm_language" value="<?PHP //echo $edit_language; ?>" />

--></td>
          </tr>
          <tr>
            <td height="35" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="3" align="left" valign="bottom"><input type="hidden" name="int1" id="int1" value="1"/>
              <!--		  +<a href='javascript:void(0);' onClick="return_pg('<?php echo $pg ;?>');" > Add more</a>

-->
              +<a href='javascript:void(0);' onClick="return_pg();"> Add more</a></td>
          </tr>
          <tr>
            <td height="35" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="3" align="left">&nbsp;</td>
          </tr>
          <!--  <tr>
            <td height="10" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="3" align="left">&nbsp;</td>
          </tr>
        <tr>
            <td height="35" valign="middle">Further Education </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><input name="feducation" type="text" class="field-job" value="<?PHP //echo $edit_feduc; ?>" id="feducation" maxlength="150" /></td>
          </tr>-->
          <tr>
            <td height="35" valign="middle">Availability</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><input name="availability" type="text" class="field-job" value="<?PHP echo $edit_available; ?>" id="availability" maxlength="150" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Contact Person Name *</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><input name="cont_pname" type="text" class="field-job" value="<?PHP echo $edit_cont_pname; ?>" id="cont_pname" maxlength="150" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Contact Person Email *</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><input name="cont_email" type="text" class="field-job" id="cont_email" value="<?PHP echo $edit_cont_pemail; ?>" maxlength="150" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Status</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="3" align="left"><select name="status" id="status" style="width:90px;" class="field-job-drp">
                <option value="Y" <?PHP if($edit_status=="Y"){?> selected="selected" <?PHP }?>>Active</option>
                <option value="N" <?PHP if($edit_status=="N"){?> selected="selected" <?PHP }?>>Inactive</option>
              </select></td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td valign="middle">&nbsp;</td>
            <td colspan="3" align="left"><input type="hidden" value="<?PHP echo $_REQUEST['src']; ?>" name="src" id="src" />
              <input type="hidden" value="<?PHP echo $_REQUEST['page']; ?>" name="page" id="page" />
              <input name="id" type="hidden" id="id" value="<?PHP echo $_REQUEST['id'];?>" />
              <?PHP

				if($_REQUEST['act'] == "edit")

				{	

				?>
              <input type="submit" name="btupdate" id="btupdate" class="btn-common" value="Update" />
              <?PHP

				}

				else

				{

				?>
              <input type="submit" name="btsave" id="btsave" class="btn-common" value="Submit" />
              <?PHP

				}

				?></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
  <br />
  <br />
  <br />
  <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
    <?PHP

			$page = $_GET['page'];

			$limit = 75;

			

			$sql_image_pg = "select ID,talent_code,cond_name,curr_design,status from talents  where status <>'D' order by ID desc";



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
      <td height="10" colspan="4" align="left" valign="middle" style="padding-left: 10px; padding-top:10px;"><strong>Talents</strong></td>
      <td align="left" valign="top" colspan="2"><?PHP	

	   

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

?></td>
    </tr>
    <?PHP

		}

		if($count_pg > 0)

		{ // # cp2

?>
    <tr>
      <td height="10" colspan="4" align="left" valign="middle">&nbsp;</td>
      <td align="left" valign="top" colspan="2"><span style="float:right; padding-right:15px;font-size:11px;">A - Activate / IN - Inactivate /  E - Edit / D - Delete</span></td>
    </tr>
    <tr class="title">
      <td width="50" height="50" align="center" valign="middle" bgcolor="#FFFFFF"><strong>#</strong></td>
      <td align="center" valign="middle" bgcolor="#FFFFFF"><strong> Candidate Details </strong></td>
      <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><strong>Current Designation</strong></td>
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
      <td align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><span class="smtxt"> Candidate ID 	: <?PHP echo html_entity_decode($rs_image[$i]["talent_code"]); ?><br />
        Name : <?PHP echo html_entity_decode($rs_image[$i]["cond_name"]); ?> </span><br /></td>
      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP echo html_entity_decode($rs_image[$i]["curr_design"]); ?></td>
      <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP 

	  		if($rs_image[$i]['status'] =="Y")

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

	   ?></td>
      <td align="center" valign="middle" bgcolor="#FFFFFF"><?PHP 

	  		if($rs_image[$i]['status'] =="Y")

			{ // if status

	  ?>
        <a href="admin_process/add_talents_save.php?st=N&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">IN</a>
        <?PHP 		

			} // if status

			elseif($rs_image[$i]['status'] =="N")

			{ // else status

		?>
        <a href="admin_process/add_talents_save.php?st=Y&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">A</a>
        <?PHP 	

			} // else status

	   ?>
        &nbsp; <a href="home.php?src=<?PHP echo $_REQUEST[src]; ?>&amp;act=edit&amp;id=<?PHP echo $rs_image[$i]['ID']; ?>&amp;page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">E</a> &nbsp; <a href="javascript:;" class="red-link" onclick="return cfrm('Are you sure to delete?','admin_process/add_talents_save.php?act=del&id=<?PHP echo $rs_image[$i][ID]; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>');">D</a></td>
    </tr>
    <?PHP

		$sn +=  1;

			} // #w1

		} // # cp2

		

		else

		{ // # cp2

		} // # cp2

?>
  </table>
</form>

