<script language="javascript" type="text/javascript">
var count = "40"; 
function limiter()
{
	var tex = document.frm_job.job_title.value;
	var len = tex.length;
	if(len > count)
	{
				tex = tex.substring(0,count);
				document.frm_job.job_title.value =tex;
				return false;
	}
		document.frm_job.climit.value = count-len;
}

</script>
<form action="admin_process/add_job_save.php" method="post" name="frm_job" id="frm_job" onsubmit="return validation_job();">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <td><strong>Jobs  Details</strong></td>
            <td>&nbsp;</td>
            <td colspan="2" align="right">&nbsp;</td>
            <td width="109" align="right"><?PHP if($_REQUEST['act']=="edit"){?>
              <a href="home.php?src=add-job">Create New</a>
              <?PHP }?></td>
            <td width="90" colspan="-1">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td height="25" colspan="4"><span class="blue-bg-link">
              <?PHP

		if($_REQUEST['act'] == "edit")

		{//edit

			$sql_edit = "select * from job_details where ID = ".$_REQUEST['id'] ;

			//echo $sql_edit;

			$fetch_edit = $db->fetchSingleRow($sql_edit);

			

				$edit_company	 = html_entity_decode($fetch_edit["org_id"]);

				$edit_jarea	 = html_entity_decode($fetch_edit["job_business"]);

				$edit_jobcode	 = html_entity_decode($fetch_edit["job_code"]);

				$edit_jobtitle 	 = html_entity_decode($fetch_edit["job_title"]);

				$edit_jobquota 	 = html_entity_decode($fetch_edit["job_quota"]);

				$edit_jtype 	 = html_entity_decode($fetch_edit["job_type"]);

				$edit_duration   = html_entity_decode($fetch_edit["job_duration"]);

				$edit_jobbrief 	 = htmlspecialchars_decode($fetch_edit["job_brief"]);

				$get_ddesc 	 	 = html_entity_decode($fetch_edit["job_desc"]);

				$get_add_com     = html_entity_decode($fetch_edit["add_com"]);



				$edit_salary = html_entity_decode($fetch_edit["job_salary"]);

				$edit_language = html_entity_decode($fetch_edit["job_language"]);

				$edit_atype = html_entity_decode($fetch_edit["job_atype"]);

				$edit_responsibility = html_entity_decode($fetch_edit["job_response"]);

				$edit_skillz = html_entity_decode($fetch_edit["job_skillz"]);

				

				$dd = explode("-",$fetch_edit["apply_date"]);

				$date  = $dd[2];

				$month = $dd[1];

				$year  = $dd[0];

				

				

				$edit_location	 	 = html_entity_decode($fetch_edit["location"]);

				$edit_asap	 	 	 = html_entity_decode($fetch_edit["job_asap"]);

				$edit_cont_pname 	 = html_entity_decode($fetch_edit["cont_pname"]);								

				$edit_cont_pemail 	 = html_entity_decode($fetch_edit["cont_pemail"]);

				$edit_cont_purl	 	 = html_entity_decode($fetch_edit["cont_purl"]);

				$edit_status		 = html_entity_decode($fetch_edit["status"]);

				$edit_xml = html_entity_decode($fetch_edit["publish_xml"]);

			

		}//edit

		else

		{ // edit else

			$id = $_SESSION["aid"];

			$admin_preson = $db->fetchSingleRow("select email,name from admin_access where ID = '$id' and status = 'Y' ");

			$edit_cont_pemail = $admin_preson['email'];

			$edit_cont_pname = $admin_preson['name'];

		} // edit else

		echo $db->errmsg[$db->decode64($_GET["resmsg"])];

		

		?>
              </span></td>
          </tr>
          <?PHP $query_org_name = $db->getTableArray("select * from company_details where status='Y' order by comp_name"); ?>
          <tr>
            <td width="228" height="35" valign="middle"><span class="bl-text">Company Name *</span></td>
            <td width="13" align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><select class="field-job-drp" name="org_name" id="org_name">
                <option value="">Select Company</option>
                <?PHP 

					for($org=0;$org<count($query_org_name);$org++)

					{ // org for loop

			?>
                <option value="<?PHP echo $query_org_name[$org]['ID'];?>" <?PHP if($edit_company==$query_org_name[$org]['ID']){?> selected="selected"<?PHP }?>><?PHP echo $query_org_name[$org]['comp_name']; ?>&nbsp;&nbsp;
                <?PHP if($query_org_name[$org]['intern_compname'] != "") { ?>
                [<?PHP echo $query_org_name[$org]['intern_compname']; ?>]
                <?PHP } ?>
                </option>
                <?PHP 	} // org for loop

			?>
              </select></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Job Title *</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><input name="job_title" type="text" class="field-job" id="job_title" value="<?PHP echo $edit_jobtitle;?>" srows=3 cols=40 onkeyup=limiter();><font size="1" face="arial, helvetica, sans-serif"> Only 40 characters
 allowed!</font> <script type="text/javascript">
document.write("<input type=text name=climit size=2 readonly value="+count+"> <font size='1' face='arial, helvetica, sans-serif'>characters left</font>");
</script></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Job Area* </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><select class="field-job-drp" name="job_area" id="job_area">
                <option value="" selected="selected">Job Area </option>
                
                    <option value="1st Level Support / Helpdesk" <?PHP if($edit_jarea=="1st Level Support / Helpdesk Support"){?> selected="selected"<?PHP }?>>1st Level Support / Helpdesk</option>
                    <option value="2nd Level Support" <?PHP if($edit_jarea=="2nd Level Support"){?> selected="selected"<?PHP }?>>2nd Level Support</option>
                    <option value="3rd Level - Client System Engineering/SW Packaging" <?PHP if($edit_jarea=="3rd Level - Client System Engineering / SW Packaging"){?> selected="selected"<?PHP }?>>3rd Level - Client System Engineering / SW Packaging</option>
                    <option value="3rd Level - Server System Engineer/Administrator" <?PHP if($edit_jarea=="3rd Level - Server System Engineer / Administrator"){?> selected="selected"<?PHP }?>>3rd Level - Server System Engineer / Administrator</option>
                    <option value="Network Specialist/Administrator/Engineer/Security" <?PHP if($edit_jarea=="Network Specialist/Administrator/Engineer/Security"){?> selected="selected"<?PHP }?>>Network Specialist / Administrator  / Engineer / Security</option>
                    <option value="Unix/Linux Specialist" <?PHP if($edit_jarea=="Unix/Linux Specialist"){?> selected="selected"<?PHP }?>>Unix / Linux Specialist</option>
                    <option value="Web Programming/Publishing/Development" <?PHP if($edit_jarea=="Web Programming/Publishing/Development"){?> selected="selected"<?PHP }?>>Web Programming / Publishing / Development</option>
                    <option value="Database Specialist/Development/Administrator" <?PHP if($edit_jarea=="Database Specialist/Development/Administrator"){?> selected="selected"<?PHP }?>>Database Specialist / Development / Administrator</option>
                    <option value="Software Architect/Engineering/Programming" <?PHP if($edit_jarea=="Software Architect/Engineering/Programming"){?> selected="selected"<?PHP }?>>Software Architect / Engineering / Programming</option>
                    <option value="ERP/SAP/CRM" <?PHP if($edit_jarea=="ERP/SAP/CRM"){?> selected="selected"<?PHP }?>>ERP / SAP / CRM</option>
                    <option value="Project Management" <?PHP if($edit_jarea=="Project Management"){?> selected="selected"<?PHP }?>>Project Management</option>
                    <option value="Consulting/Audit/Security/Analyse" <?PHP if($edit_jarea=="Consulting/Audit/Security/Analyse"){?> selected="selected"<?PHP }?>>Consulting / Audit / Security / Analyse</option>
                    <option value="IT Management / Service Delivery Management" <?PHP if($edit_jarea=="IT Management / Service Delivery Management"){?> selected="selected"<?PHP }?>>IT Management / Service Delivery Management</option>
                    <option value="Various Jobs" <?PHP if($edit_jarea=="Various Jobs"){?> selected="selected"<?PHP }?>>Various Jobs</option>
            </select></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Quota / Pensum * </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><input name="job_quota" type="text" class="field-job" id="job_quota" value="<?PHP echo $edit_jobquota;?>" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Type of Employment * </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><select class="field-job-drp" name="job_type" id="job_type">
                <option value="" selected="selected">Job Type </option>
                <option value="Permanent" <?PHP if($edit_jtype=="Permanent"){?> selected="selected"<?PHP }?>>Permanent</option>
                <option value="Temporary" <?PHP if($edit_jtype=="Temporary"){?> selected="selected"<?PHP }?>>Temporary</option>
                <option value="Contract" <?PHP if($edit_jtype=="Contract"){?> selected="selected"<?PHP }?>>Contract</option>
              </select></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Entry Date *</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td width="341" align="left"><?PHP 

		  	$curyear = date('Y');

		  ?>
              <select name="ivdate" id="ivdate" class="field-job-drp" style="width:90px;">
                <option value="">Date</option>
                <?PHP 

			  		for($d=1;$d<=31;$d++)

					{// for

						if($d<=9)

						{ 

							$ddd = "0".$d;

						?>
                <option value="<?PHP echo $ddd; ?>" <?PHP if($date==$ddd){?> selected="selected"<?PHP }?>><?PHP echo "0".$d; ?></option>
                <?PHP			}else

						{

				?>
                <option value="<?PHP echo $d; ?>" <?PHP if($date==$d){?> selected="selected"<?PHP }?>><?PHP echo $d; ?></option>
                <?PHP 		}

		  		} // for

			  ?>
              </select>
              <select name="ivmonth" id="ivmonth" class="field-job-drp" style="width:90px;">
                <option value="" selected="selected">Month </option>
                <option value="01" <?PHP if($month=='01'){?> selected="selected"<?PHP }?>>Jan</option>
                <option value="02" <?PHP if($month=='02'){?> selected="selected"<?PHP }?>>Feb</option>
                <option value="03" <?PHP if($month=='03'){?> selected="selected"<?PHP }?>>Mar</option>
                <option value="04" <?PHP if($month=='04'){?> selected="selected"<?PHP }?>>Apr</option>
                <option value="05" <?PHP if($month=='05'){?> selected="selected"<?PHP }?>>May</option>
                <option value="06" <?PHP if($month=='06'){?> selected="selected"<?PHP }?>>Jun</option>
                <option value="07" <?PHP if($month=='07'){?> selected="selected"<?PHP }?>>Jul</option>
                <option value="08" <?PHP if($month=='08'){?> selected="selected"<?PHP }?>>Aug</option>
                <option value="09" <?PHP if($month=='09'){?> selected="selected"<?PHP }?>>111Sep</option>
                <option value="10" <?PHP if($month=='10'){?> selected="selected"<?PHP }?>>Oct</option>
                <option value="11" <?PHP if($month=='11'){?> selected="selected"<?PHP }?>>Nov</option>
                <option value="12" <?PHP if($month=='12'){?> selected="selected"<?PHP }?>>Dec</option>
              </select>
              <select name="ivyear" id="ivyear" class="field-job-drp" style="width:90px;">
                <option value="">Year</option>
                <?PHP 

			  		for($y=$curyear;$y<=$curyear+2;$y++)

					{

				?>
                <option value="<?PHP echo $y; ?>"<?PHP if($year==$y){?>selected="selected"<?PHP }?>><?PHP echo $y; ?></option>
                <?PHP 

					}

			  ?>
              </select>
              &nbsp; OR </td>
            <td width="177" align="left"><select name="job_asap" id="job_asap" class="field-job-drp" style="width:90px;">
                <option value="">Select</option>
                <option value="asap" <?PHP if($edit_asap=='asap'){?> selected="selected"<?PHP }?>>ASAP</option>
                <option value="nV" <?PHP if($edit_asap=='nV'){?> selected="selected"<?PHP }?>>nV</option>
                <option value="by appt" <?PHP if($edit_asap=='by appt'){?> selected="selected"<?PHP }?>>by appt</option>
              </select></td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td height="35" valign="middle">Job Location *</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left">
            <select name="job_location" id="job_location" class="field-job-drp">
            <option value="All">All Location </option>
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
            <td height="35" valign="middle">Kidston Contact  Name </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><input name="cont_pname" type="text" class="field-job" value="<?PHP echo $edit_cont_pname; ?>" id="cont_pname" maxlength="150" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle">Kidston Contact  Email </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><input name="cont_email" type="text" class="field-job" id="cont_email" value="<?PHP echo $edit_cont_pemail; ?>" maxlength="150" /></td>
          </tr>
          <tr>
            <td height="35" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td height="35" valign="middle">Language*<br />
              <span class="smtxt"><a href="./home.php?src=add-language">Manage Languages</a></span></td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><div id="pg">
                <?PHP

		  $sql_language = $db->getTableArray("select * from language_master where status = 'Y' order by language_name");

		  $statevalue = "";

		  		if($_REQUEST["act"] == "edit")

				{// edit

						$sql_lang = $db->getTableArray("select * from job_language where job_id='".$_REQUEST['id']."'");

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
              </div></td>
          </tr>
          <tr>
            <td height="35" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left" valign="bottom"><input type="hidden" name="int1" id="int1" value="1"/>
              +<a href='javascript:void(0);' onClick="return_pg();"> Add more</a></td>
          </tr>
          <tr>
            <td height="35" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left">&nbsp;</td>
          </tr>
          
          <tr>
            <td height="35" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left" valign="bottom"><input type="hidden" name="int1" id="int1" value="1"/>
              +<a href='javascript:void(0);' onClick="return_pf();"> Add more</a></td>
          </tr>
          <tr>
            <td height="35" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left">&nbsp;</td>
          </tr>
          
          <tr>
            <td height="35" valign="middle">Job Brief Description * </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><textarea name="job_brief" class="field-job-atext" id="job_brief"><?PHP echo $edit_jobbrief; ?></textarea></td>
          </tr>
                    <tr>
            <td height="35" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left">&nbsp;</td>
          </tr>
          

          <tr>
            <td height="35" valign="middle">Responsibilities </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><textarea id="responsibility" name="responsibility" rows="5" cols="40" style="width: 50%"><?PHP echo $edit_responsibility; ?></textarea></td>
          </tr>
          <tr>
            <td height="20" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td height="35" valign="middle">Skills </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><textarea id="skillz" name="skillz" rows="5" cols="40" style="width: 50%"><?PHP echo $edit_skillz; ?></textarea></td>
          </tr>
          <tr>
            <td height="20" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td height="35" valign="middle">Additional Information</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><textarea id="frm_detail_desc" name="frm_detail_desc" rows="15" cols="80" style="width: 80%"><?PHP echo $get_ddesc; ?></textarea></td>
          </tr>
          <tr>
            <td height="10" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td height="10" valign="middle">&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td colspan="4" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td height="35" valign="middle">Status</td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><select name="status" id="status" style="width:90px;" class="field-job-drp">
                <option value="Y" <?PHP if($edit_status=="Y"){?> selected="selected" <?PHP }?>>Active</option>
                <option value="N" <?PHP if($edit_status=="N"){?> selected="selected" <?PHP }?>>Inactive</option>
                <?PHP

				if($_REQUEST["act"] == "edit")

				{

			?>
                <option value="C" <?PHP if($edit_status=="C"){?> selected="selected" <?PHP }?>>Closed</option>
                <?PHP

				}

			?>
              </select></td>
          </tr>
          <tr>
            <td height="35">Publish in XML </td>
            <td align="center" valign="middle"><strong>:</strong></td>
            <td colspan="4" align="left"><input type="checkbox" name="frm_xml" id="frm_xml" <?PHP if($edit_xml == "Y") { ?> checked="checked" <?PHP } ?> value="Y" /></td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td valign="middle">&nbsp;</td>
            <td colspan="4" align="left"><input type="hidden" value="<?PHP echo $_REQUEST['src']; ?>" name="src" id="src" />
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

			

			$sql_image_pg = "select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_brief,jm.job_asap,jm.location,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,DATE_FORMAT(jm.postedon,'%D %M, %Y') as poston,jm.admin_id,jm.status from job_details jm, company_details cm where jm.status <> 'D' and jm.status <> 'C' and cm.status ='Y' and jm.org_id = cm.ID order by jm.ID desc";

		

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
      <td height="10" colspan="4" align="left" valign="middle" style="padding-left: 10px; padding-top:10px;"><strong>Jobs</strong></td>
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
      <td align="left" valign="top" colspan="2"><span style="float:right; padding-right:15px;font-size:11px;">A - Activate / IN - Inactivate / C - Close / E - Edit / D - Delete</span></td>
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
      <td align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP 

	  		$company_detail = $db->fetchSingleRow("select * from company_details where ID='".$rs_image[$i]['org_id']."'");

	  ?>
        <span class="smtxt"> Job Code		: <?PHP echo html_entity_decode($rs_image[$i]["job_code"]); ?><br />
        Apply By Date :
        <?PHP if($rs_image[$i]["dd"]!=""){echo $rs_image[$i]["dd"]; } else{

	  echo html_entity_decode($rs_image[$i]["job_asap"]);}

	   ?>
        <br />
        Posted On : <?PHP echo html_entity_decode($rs_image[$i]["poston"]); ?> <br />
        <?PHP 

	  	$job_posters = $db->getTableArray("select * from job_platforms where job_id='".$rs_image[$i]['ID']."'");

		if(count($job_posters)>0)

		{//if

	  ?>
        Posted In :
        <?PHP

		   for($j=0;$j<count($job_posters);$j++)

				{ // for j

			

		  ?>
        <?PHP echo html_entity_decode($job_posters[$j]["platform"])."<br>"; ?>
        <?PHP

				} // for j

			?>
        <?PHP	

		}//if		

	   ?>
        </span> <span class="view-title">Job Title		: <?PHP echo html_entity_decode($rs_image[$i]["job_title"]); ?></span></td>
      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP

			echo html_entity_decode($company_detail['comp_name']);

	  ?></td>
      <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP 

	  		if($rs_image[$i]['status'] =="Y")

			{ // if status

	  ?>
        Active
        <?PHP 		

			} // if status

			elseif($rs_image[$i]['status'] =="N")

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

	   ?></td>
      <td align="center" valign="middle" bgcolor="#FFFFFF"><?PHP 

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
        &nbsp; <a href="javascript:;" onclick="jform('admin_process/add_job_save.php?st=C&act=st&id=<?PHP echo $rs_image[$i][ID]; ?>&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>');" class="red-link">C</a>
        <!--			 &nbsp;<a href="admin_process/add_job_save.php?st=C&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">C</a>

-->
        <?PHP 	

			} // else status

	   ?>
        &nbsp; <a href="home.php?src=<?PHP echo $_REQUEST[src]; ?>&amp;act=edit&amp;id=<?PHP echo $rs_image[$i]['ID']; ?>&amp;page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">E</a> &nbsp; <a href="javascript:;" class="red-link" onclick="return cfrm('Are you sure to delete?','admin_process/add_job_save.php?act=del&id=<?PHP echo $rs_image[$i][ID]; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>');">D</a></td>
    </tr>
    <?PHP

		$sn +=  1;

			} // #w1

		} // # cp2

		

		else

		{ // # cp2

?>
    <!--    <tr class="even">

      <td height="30" colspan="6" align="center" valign="middle" class="error"><b>No records found to list here..!</b></td>

    </tr>

-->
    <?PHP

		} // # cp2

?>
  </table>
</form>
