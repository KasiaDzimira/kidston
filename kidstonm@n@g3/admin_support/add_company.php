<form action="admin_process/add_company_save.php" method="post" name="frm_cmp" id="frm_cmp" onsubmit="return validation_company();" >
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Company Details</strong> </td>
          <td>&nbsp;</td>
          <td colspan="3" align="right"><?PHP if($_REQUEST['act']=="edit"){?><a href="home.php?src=add-comp">Create New</a><?PHP }?> </td>
          <td width="5%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="25" colspan="4"><span class="blue-bg-link">
            <?PHP
		if($_REQUEST['act'] == "edit")
		{//edit
			$sql_edit = "select * from company_details where ID = ".$_REQUEST['id'] ;
			$fetch_edit = $db->fetchSingleRow($sql_edit);
				$edit_compname 		 = html_entity_decode($fetch_edit["comp_name"]);
				$edit_intern	     = html_entity_decode($fetch_edit["intern_compname"]);
				$edit_business 		 = html_entity_decode($fetch_edit["industry_name"]);
				$edit_country 		 = html_entity_decode($fetch_edit["country"]);
				$edit_state		 	 = html_entity_decode($fetch_edit["state"]);
				$edit_contname		 = html_entity_decode($fetch_edit["cont_name"]);
				$edit_contdesign 	 = html_entity_decode($fetch_edit["cont_designation"]);
				$edit_contemail	 	 = html_entity_decode($fetch_edit["cont_email"]);								
				$edit_company_info	 = html_entity_decode($fetch_edit["company_info"]);
				$edit_address1	 	 = html_entity_decode($fetch_edit["address1"]);
				$edit_address2		 = html_entity_decode($fetch_edit["address2"]);
				$edit_street	 	 = html_entity_decode($fetch_edit["street"]);
				$edit_city			 = html_entity_decode($fetch_edit["city"]);
				$edit_postalcode 	 = html_entity_decode($fetch_edit["postalcode"]);
				$edit_website_url 	 = html_entity_decode($fetch_edit["website_url"]);	
				$edit_manager 		 = html_entity_decode($fetch_edit["link_manager"]);	
				$edit_status		 = html_entity_decode($fetch_edit["status"]);	
				$edit_pass			 = html_entity_decode($fetch_edit["password"]);	
				$edit_pass1			 = html_entity_decode($fetch_edit["enpss"]);		
				$edit_username		 = html_entity_decode($fetch_edit["username"]);
				
			
		}//edit
			
		echo $db->errmsg[$db->decode64($_GET["resmsg"])];

		?>
          </span></td>
        </tr>
        <tr>
          <td width="24%" height="35"><span class="bl-text">Name Of The Company *</span></td>
          <td width="2%" align="center"><strong>:</strong></td>
          <td colspan="4" align="left"><input name="com_name" type="text" class="field-job" id="com_name" value="<?PHP echo $edit_compname;?>" maxlength="200" /></td>
        </tr>
        <tr>
          <td height="30"><span class="bl-text"> Intern Company Name </span></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><input type="text" name="intern_comp" class="field-job" id="intern_comp" maxlength="200" value="<?PHP echo $edit_intern; ?>" /></td>
        </tr> 
        <tr>
          <td height="35">Business Line *</td>
          <td align="center"><strong>:</strong></td>
          <td colspan="4" align="left">
		 <select name="job_business" class="field-job-drp" id="job_business">
            <option value="" selected="selected">Select Business Line</option>
			
			<option value="Agriculture/Forestry/Wood"<?PHP if($edit_business == "Agriculture/Forestry/Wood") { ?> selected="selected" <?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agriculture/Forestry/Wood</option>
			<option value="Banking/Financial institutions"<?PHP if($edit_business == "Banking/Financial institutions") { ?> selected="selected"<?PHP } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banking/Financial institutions</option>
			<option value="Building trade/Real estate"<?PHP if($edit_business == "Building trade/Real estate") { ?> selected="selected" <?PHP } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Building trade/Real estate</option>
			<option value="Catering/Hotel"<?PHP if($edit_business == "Catering/Hotel") { ?> selected="selected" <?PHP } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Catering/Hotel</option>
			<option value="Chemicals/Pharmaceuticals"<?PHP if($edit_business == "Chemicals/Pharmaceuticals") { ?> selected="selected" <?PHP } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chemicals/Pharmaceuticals</option>
			<option value="Commercial operation/Skilled crafts"<?PHP if($edit_business == "Commercial operation/Skilled crafts" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Commercial operation/Skilled crafts</option>
			<option value="Consulting various"<?PHP if($edit_business == "Consulting various" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consulting various</option>
			<option value="Consumer/Luxury goods industry"<?PHP if($edit_business == "Consumer/Luxury goods industry" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consumer/Luxury goods industry</option>
			<option value="Education"<?PHP if($edit_business == "Education" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Education</option>
			<option value="Health care/Social services"<?PHP if($edit_business == "Health care/Social services" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Health care/Social services</option>
			<option value="Industry various"<?PHP if($edit_business == "Industry various" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Industry various</option>
			<option value="Information technology/Telecom"<?PHP if($edit_business == "Information technology/Telecom" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Information technology/Telecom</option>
			<option value="Insurance"<?PHP if($edit_business == "Insurance" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Insurance</option>
			<option value="Legal/Business advice"<?PHP if($edit_business == "Legal/Business advice" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Legal/Business advice</option>
			<option value="Catering/Food/Tourism"<?PHP if($edit_business == "Catering/Food/Tourism" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Catering/Food/Tourism</option>
			<option value="Machine/System construction"<?PHP if($edit_business == "Machine/System construction" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Machine/System construction</option>
			<option value="Media/Printing/Publishing"<?PHP if($edit_business == "Media/Printing/Publishing" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Media/Printing/Publishing</option>
			<option value="Public administration/Associations"<?PHP if($edit_business == "Public administration/Associations" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Public administration/Associations</option>
			<option value="Retail trade/Wholesaling"<?PHP if($edit_business == "Retail trade/Wholesaling" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Retail trade/Wholesaling</option>
			<option value="Service sector in general"<?PHP if($edit_business == "Service sector in general" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Service sector in general</option>
			<option value="Tourism/Travel/Recreation"<?PHP if($edit_business == "Tourism/Travel/Recreation" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tourism/Travel/Recreation</option>
			<option value="Transport/Logistics"<?PHP if($edit_business == "Transport/Logistics" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transport/Logistics</option>
			<option value="Utilities"<?PHP if($edit_business == "Utilities" ) { ?> selected="selected"<?PHP }?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Utilities</option>
			</select>
		  </td>
        </tr>
        <tr>
          <td height="35" valign="top">Location Country / State *</td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left">
			<select id='countrySelect' name='countrySelect' class="field-job-drp">
				<option value="">Select Country</option>
				<option Value="Afghanistan">Afghanistan</option> 
				<option Value="Albania">Albania</option> 
				<option Value="Algeria">Algeria</option> 
				<option Value="American Samoa">American Samoa</option> 
				<option Value="Andorra">Andorra</option> 
				<option Value="Angola">Angola</option> 
				<option Value="Anguilla">Anguilla</option> 
				<option Value="Antarctica">Antarctica</option> 
				<option Value="Antigua And Barbuda">Antigua And Barbuda</option> 
				<option Value="Argentina">Argentina</option> 
				<option Value="Armenia">Armenia</option> 
				<option Value="Aruba">Aruba</option> 
				<option Value="Australia">Australia</option> 
				<option Value="Austria">Austria</option> 
				<option Value="Azerbaijan">Azerbaijan</option> 
				<option Value="Bahamas">Bahamas</option> 
				<option Value="Bahrain">Bahrain</option> 
				<option Value="Bangladesh">Bangladesh</option> 
				<option Value="Barbados">Barbados</option> 
				<option Value="Belarus">Belarus</option> 
				<option Value="Belgium">Belgium</option> 
				<option Value="Belize">Belize</option> 
				<option Value="Benin">Benin</option> 
				<option Value="Bermuda">Bermuda</option> 
				<option Value="Bhutan">Bhutan</option> 
				<option Value="Bolivia">Bolivia</option> 
				<option Value="Bosnia And Herzegowina">Bosnia And Herzegowina</option> 
				<option Value="Botswana">Botswana</option> 
				<option Value="Bouvet Island">Bouvet Island</option> 
				<option Value="Brazil">Brazil</option> 
				<option Value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
				<option Value="Brunei Darussalam">Brunei Darussalam</option> 
				<option Value="Bulgaria">Bulgaria</option> 
				<option Value="Burkina Faso">Burkina Faso</option> 
				<option Value="Burundi">Burundi</option> 
				<option Value="Cambodia">Cambodia</option> 
				<option Value="Cameroon">Cameroon</option> 
				<option Value="Canada">Canada</option> 
				<option Value="Cape Verde">Cape Verde</option> 
				<option Value="Cayman Islands">Cayman Islands</option> 
				<option Value="Central African Republic">Central African Republic</option> 
				<option Value="Chad">Chad</option> 
				<option Value="Chile">Chile</option> 
				<option Value="China">China</option> 
				<option Value="Colombia">Colombia</option> 
				<option Value="Congo">Congo</option> 
				<option Value="Cuba">Cuba</option> 
				<option Value="Cyprus">Cyprus</option> 
				<option Value="Denmark">Denmark</option> 
				<option Value="Egypt">Egypt</option> 
				<option Value="Estonia">Estonia</option> 
				<option Value="Ethiopia">Ethiopia</option> 
				<option Value="Finland">Finland</option> 
				<option Value="France">France</option> 
				<option Value="French Guiana">French Guiana</option> 
				<option Value="French Polynesia">French Polynesia</option> 
				<option Value="Georgia">Georgia</option> 
				<option Value="Germany">Germany</option> 
				<option Value="Ghana">Ghana</option> 
				<option Value="Greenland">Greenland</option> 
				<option Value="Guinea">Guinea</option> 
				<option Value="Guyana">Guyana</option> 
				<option Value="Haiti">Haiti</option> 
				<option Value="Honduras">Honduras</option> 
				<option Value="Hong Kong">Hong Kong</option> 
				<option Value="Hungary">Hungary</option> 
				<option Value="India">India</option> 
				<option Value="Indonesia">Indonesia</option> 
				<option Value="Iran">Iran</option> 
				<option Value="Iraq">Iraq</option> 
				<option Value="Ireland">Ireland</option> 
				<option Value="Israel">Israel</option> 
				<option Value="Italy">Italy</option> 
				<option Value="Jamaica">Jamaica</option> 
				<option Value="Japan">Japan</option> 
				<option Value="Jordan">Jordan</option> 
				<option Value="Kazakhstan">Kazakhstan</option> 
				<option Value="Kenya">Kenya</option> 
				<option Value="Kiribati">Kiribati</option> 
				<option Value="Korea">Korea</option> 
				<option Value="Kuwait">Kuwait</option> 
				<option Value="Latvia">Latvia</option> 
				<option Value="Lebanon">Lebanon</option> 
				<option Value="Lesotho">Lesotho</option> 
				<option Value="Liberia">Liberia</option> 
				<option Value="Lithuania">Lithuania</option> 
				<option Value="Luxembourg">Luxembourg</option> 
				<option Value="Macau">Macau</option> 
				<option Value="Macedonia">Macedonia</option> 
				<option Value="Madagascar">Madagascar</option> 
				<option Value="Malawi">Malawi</option> 
				<option Value="Malaysia">Malaysia</option> 
				<option Value="Maldives">Maldives</option> 
				<option Value="Mali">Mali</option> 
				<option Value="Malta">Malta</option> 
				<option Value="Martinique">Martinique</option> 
				<option Value="Mauritania">Mauritania</option> 
				<option Value="Mauritius">Mauritius</option> 
				<option Value="Mayotte">Mayotte</option> 
				<option Value="Mexico">Mexico</option> 
				<option Value="Monaco">Monaco</option> 
				<option Value="Mongolia">Mongolia</option> 
				<option Value="Montserrat">Montserrat</option> 
				<option Value="Morocco">Morocco</option> 
				<option Value="Mozambique">Mozambique</option> 
				<option Value="Myanmar">Myanmar</option> 
				<option Value="Namibia">Namibia</option> 
				<option Value="Nauru">Nauru</option> 
				<option Value="Nepal">Nepal</option> 
				<option Value="Netherlands">Netherlands</option> 
				<option Value="New Caledonia">New Caledonia</option> 
				<option Value="New Zealand">New Zealand</option> 
				<option Value="Nicaragua">Nicaragua</option> 
				<option Value="Niger">Niger</option> 
				<option Value="Nigeria">Nigeria</option> 
				<option Value="Niue">Niue</option> 
				<option Value="Norfolk Island">Norfolk Island</option> 
				<option Value="Norway">Norway</option> 
				<option Value="Oman">Oman</option> 
				<option Value="Pakistan">Pakistan</option> 
				<option Value="Palau">Palau</option> 
				<option Value="Panama">Panama</option> 
				<option Value="Papua New Guinea">Papua New Guinea</option> 
				<option Value="Paraguay">Paraguay</option> 
				<option Value="Peru">Peru</option> 
				<option Value="Philippines">Philippines</option> 
				<option Value="Pitcairn">Pitcairn</option> 
				<option Value="Poland">Poland</option> 
				<option Value="Portugal">Portugal</option> 
				<option Value="Puerto Rico">Puerto Rico</option> 
				<option Value="Qatar">Qatar</option> 
				<option Value="Reunion">Reunion</option> 
				<option Value="Romania">Romania</option> 
				<option Value="Russian Federation">Russian Federation</option> 
				<option Value="Rwanda">Rwanda</option> 
				<option Value="Saint Lucia">Saint Lucia</option> 
				<option Value="Samoa">Samoa</option> 
				<option Value="San Marino">San Marino</option> 
				<option Value="Saudi Arabia">Saudi Arabia</option> 
				<option Value="Senegal">Senegal</option> 
				<option Value="Seychelles">Seychelles</option> 
				<option Value="Sierra Leone">Sierra Leone</option> 
				<option Value="Singapore">Singapore</option> 
				<option Value="Slovenia">Slovenia</option> 
				<option Value="Solomon Islands">Solomon Islands</option> 
				<option Value="Somalia">Somalia</option> 
				<option Value="South Africa">South Africa</option> 
				<option Value="Spain">Spain</option> 
				<option Value="Sri Lanka">Sri Lanka</option> 
				<option Value="Sudan">Sudan</option> 
				<option Value="Sw Aziland">Sw Aziland</option> 
				<option Value="Sweden">Sweden</option> 
				<option Value="Switzerland">Switzerland</option> 
				<option Value="Syrian Arab Republic">Syrian Arab Republic</option> 
				<option Value="Taiwan">Taiwan</option> 
				<option Value="Tajikistan">Tajikistan</option> 
				<option Value="Thailand">Thailand</option> 
				<option Value="Tonga">Tonga</option> 
				<option Value="Trinidad And Tobago">Trinidad And Tobago</option> 
				<option Value="Tunisia">Tunisia</option> 
				<option Value="Turkey">Turkey</option> 
				<option Value="Uganda">Uganda</option> 
				<option Value="Ukraine">Ukraine</option> 
				<option Value="United Arab Emirates">United Arab Emirates</option> 
				<option Value="United Kingdom">United Kingdom</option> 
				<option Value="United States">United States</option> 
				<option Value="Uruguay">Uruguay</option> 
				<option Value="Uzbekistan">Uzbekistan</option> 
				<option Value="Vanuatu">Vanuatu</option> 
				<option Value="Venezuela">Venezuela</option> 
				<option Value="Viet Nam">Viet Nam</option> 
				<option Value="Wallis And Futuna Islands">Wallis And Futuna Islands</option> 
				<option Value="Western Sahara">Western Sahara</option> 
				<option Value="Yemen">Yemen</option> 
				<option Value="Yugoslavia">Yugoslavia</option> 
				<option Value="Zaire">Zaire</option> 
				<option Value="Zambia">Zambia</option> 
				<option Value="Zimbabwe">Zimbabwe</option> 
			</select>
                          &nbsp;/&nbsp;
				<input type="text" name="stateSelect" id="stateSelect" class="field-job" maxlength="50" value="<?PHP echo $edit_state; ?>" />
<!--                          <select id='stateSelect' name='stateSelect' class="field-job-drp" >
                          </select>
-->						  <?PHP 
						  	if($_REQUEST['act']=="edit")
						  	{
						  ?>
                          <script type="text/javascript">//initCountry('<?PHP echo $edit_country;?>'); </script>
						  <?PHP }else {?>
						  <script type="text/javascript">//initCountry('India'); </script>
						  <?PHP } ?>
                          <script type="text/javascript">
  //document.getElementById('stateSelect').value="<?PHP //echo $edit_state; ?>"; </script>
  <script language="javascript">document.getElementById("countrySelect").value = "<?PHP echo $edit_country; ?>"</script>  </td>
        </tr>
        <tr>
          <td height="35" valign="top">Contact Person Name *</td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left"><input name="cont_pname" type="text" class="field-job" id="cont_pname" value="<?PHP echo $edit_contname;?>" maxlength="75" /></td>
        </tr>
        <tr>
          <td height="35" valign="top">Contact Person Designation *</td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left"><input name="cont_pdesign" type="text" class="field-job" id="cont_pdesign" value="<?PHP echo $edit_contdesign;?>" maxlength="200" /></td>
        </tr>
        <tr>
          <td height="35" valign="top">Contact Person Email *</td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left"><input name="cont_pemail" type="text" class="field-job" id="cont_pemail" value="<?PHP echo $edit_contemail;?>" maxlength="200" /></td>
        </tr>
       
        <tr>
          <td height="35" valign="top">Company Information <br />
		  <span class="smtxt">[will be used as a company introduction for the job ads]</span>
		  </td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left">
		  <textarea name="company_info" id="company_info" class="field-job-atext"><?PHP echo $edit_company_info; ?></textarea>
		  </td>
        </tr>
        <tr>
          <td height="35" valign="top">Address * 	</td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left"><textarea name="address1" class="field-job-atext" id="address1"><?PHP echo $edit_address1;?></textarea></td>
        </tr>
<!--        <tr>
          <td height="35" valign="top">Address Line 2 </td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left"><textarea name="address2" class="field-job-atext" id="address2"><?PHP echo $edit_address2;?></textarea></td>
        </tr>
        <tr>
          <td height="35" valign="top">Street *</td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left"><input name="street" type="text" class="field-job" id="street" value="<?PHP echo $edit_street;?>" maxlength="200" /></td>
        </tr>
        <tr>
          <td height="35" valign="top">City *</td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left"><input name="city" type="text" class="field-job" id="city" value="<?PHP echo $edit_city;?>" maxlength="200" /></td>
        </tr>
        <tr>
          <td height="35" valign="top">Postalcode *</td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left"><input name="pincode" type="text" class="field-job" id="pincode" onkeypress="return num_only(event);" value="<?PHP echo $edit_postalcode;?>" maxlength="20" /></td>
        </tr>
-->        <tr>
          <td height="35" valign="top">Website URL </td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="4" align="left"><input name="web_url" type="text" class="field-job" id="web_url" value="<?PHP echo $edit_website_url;?>" maxlength="150" />
&nbsp; eg : [www.kidston.com] </td>
        </tr>
		  <tr>
          <td height="35" valign="top">Kidston Direct Contact</td>
          <td align="center" valign="top"><strong>:</strong></td>
		  <?PHP
		    $sql_manager = $db->getTableArray("select * from admin_access where admin_type=2 and status = 'Y'");
			?>	
          <td colspan="4" align="left">
		   <select name="frm_manager" id="frm_manager" class="field-job-drp">
		    <option value="" selected="selected">Select a Manager</option>
		    <?PHP
		  	for($i=0;$i<count($sql_manager);$i++)
	  		{
			?>
				 <option value="<?PHP echo $sql_manager[$i]["ID"]; ?>" <?PHP if($edit_manager == $sql_manager[$i]["ID"]) { ?> selected="selected" <?PHP } ?>>
				 <?PHP echo $sql_manager[$i]["name"]; ?></option>
			<?PHP	 
				}	
			?>
			</select>
			 </td>
        </tr>
        <tr>
          <td height="35"> <strong>Company Login Details </strong></td>
          <td align="center" valign="top">&nbsp;</td>
          <td colspan="4" align="left">&nbsp;</td>
        </tr>
		<?PHP //if($_REQUEST['act']!="edit")
			 // { // username
		?>
        <tr>
          <td height="35">UserName </td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><input name="username" type="text" class="field-job" id="username" maxlength="20" value="<?PHP echo  $edit_username; ?>"></td>
          <td align="left">&nbsp;&nbsp;
            <input name="frm_check" type="button" class="btn2" id="frm_check" onClick="checkUsername();" value="Check Availability" /></td>
          <td width="200"><div id="statusDiv">&nbsp;</div></td>
          <td width="5" align="left">&nbsp;</td>
        </tr>
		<?PHP //}// if username 
				//else
				//{
				//$db->htmle("hidden","username","");
				//}
		?>
        <tr>
          <td height="35">Password </td>
          <td align="center"><strong>:</strong></td>
          <td colspan="4" align="left">
		  	<input name="password" type="password" class="field-job" id="password" value="<?PHP echo $db->decode64($edit_pass1); ?>" maxlength="16">
			<input type="hidden" name="hpass" id="hpass" value="<?PHP echo $edit_pass;?>" />		  </td>
        </tr>
        <tr>
          <td height="35">Status</td>
          <td align="center"><strong>:</strong></td>
          <td colspan="4" align="left">
		  <select name="status" id="status" style="width:90px;" class="field-job-drp">
            <option value="N" <?PHP if($edit_status=="N"){?> selected="selected" <?PHP }?>>Inactive</option>
            <option value="Y" <?PHP if($edit_status=="Y"){?> selected="selected" <?PHP }?>>Active</option>
          </select>         </td>
        </tr>
        <tr>
          <td height="35">&nbsp;</td>
          <td>&nbsp;</td>
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
					 <input type="hidden" name="btupdate" id="btupdate" value="Submit" />
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
	   
			// This is the code for listing the archives...
			$page = $_GET['page'];
			$limit = 75;
			
			$sql_image_pg = "select * from company_details where status <> 'D' order by comp_name ";
		
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
      <td width="240" height="10" colspan="4" align="left" valign="middle" style="padding-left: 10px; padding-top:10px;"><strong>Companies</strong></td>
      <td align="left" valign="top" colspan="2">
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
?> </td>
    </tr>
<?PHP
		}
		if($count_pg > 0)
		{ // # cp2
?>
    <tr>
      <td height="10" colspan="4" align="left" valign="middle">&nbsp;</td>
      <td align="left" valign="top" colspan="2"><span style="float:right; padding-right:15px;font-size:11px;">A - Activate / IN - Inactivate / E - Edit / D - Delete</span></td>
    </tr>
    <tr class="title">
      <td width="50" height="30" align="center" valign="middle" bgcolor="#FFFFFF"><strong>#</strong></td>
      <td width="308" align="center" valign="middle" bgcolor="#FFFFFF"><strong> Company Name </strong></td>
      <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><strong>Industry</strong></td>
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
	  <a href="javascript:void(0)" onclick="window.open('admin_support/comp_view.php?cid=<?PHP echo $rs_image[$i]['ID'];?>','','width=1015,height=450,scrollbars=yes,status=yes')">
	  <?PHP 
				echo html_entity_decode($rs_image[$i]['comp_name']);
	  ?>
	 </a> 
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
	  ?>     
	  </td>
      <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP 
				echo html_entity_decode($rs_image[$i]['industry_name']);
		?>      </td>
      <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;">
	  
	  <?PHP 
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
	   ?>      </td>
      <td align="center" valign="middle" bgcolor="#FFFFFF">
	  <?PHP 
	  		if($rs_image[$i]['status'] == "Y")
			{ // if status
	  ?>
	  		  <a href="admin_process/add_company_save.php?st=N&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link" >IN</a>
		<?PHP 		
			} // if status
			else
			{ // else status
		?>
			  <a href="admin_process/add_company_save.php?st=Y&act=st&id=<?PHP echo $rs_image[$i]['ID']; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>" class="red-link" >A</a>
		<?PHP 	
			} // else status
	   ?>  &nbsp;&nbsp;|&nbsp;&nbsp;
	  <a href="home.php?src=<?PHP echo $_REQUEST[src]; ?>&amp;act=edit&amp;id=<?PHP echo $rs_image[$i]['ID']; ?>&amp;page=<?PHP echo $_REQUEST['page']; ?>" class="red-link">E</a> &nbsp;&nbsp;|&nbsp;&nbsp;
	  
          <a href="javascript:;" class="red-link" onclick="cfrm('Are you sure to delete?','admin_process/add_company_save.php?act=del&id=<?PHP echo $rs_image[$i][ID]; ?>&src=<?PHP echo $_REQUEST['src']; ?>&page=<?PHP echo $_REQUEST['page']; ?>');">D</a>      </td>
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
-->    <?PHP
		} // # cp2
?>
  </table>
</form>

