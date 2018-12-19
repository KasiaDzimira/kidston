<form action="admin_process/add_manager_save.php" method="post" name="frm_manager" id="frm_manager" onsubmit="return validation_manager();">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Rcruiters Details</strong> </td>
          <td>&nbsp;</td>
          <td width="513" align="right">&nbsp;</td>
          <td width="116" align="right"><?PHP if($_REQUEST['act'] == "edit"){?>
            <a href="home.php?src=add-recruiters">Create New</a>
            <?PHP }?></td>
          <td width="45" colspan="-1">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="25" colspan="3"><span class="blue-bg-link">
        <?PHP
		$sql_at = $db->fetchSingleRow("select ID,type_name from admin_type where type_name = 'Recruiter' ");
		$admin_type = $sql_at["type_name"];
		$admin_id = $sql_at["ID"];
		?>
		<?PHP
		if($_REQUEST["act"] == "edit")
		{ // edit
			$edit_id = $_REQUEST['id'];
			$edit_admin = $db->fetchSingleRow("select * from admin_access where ID = '".$_REQUEST['id']."'");
			$edit_cid = html_entity_decode($edit_admin['admin_type']);
			$edit_email = html_entity_decode($edit_admin['email']);
			$edit_name = html_entity_decode($edit_admin['name']);
			$edit_uname = html_entity_decode($edit_admin['username']);		
			$edit_pname = html_entity_decode($edit_admin['password']);
			$edit_status = html_entity_decode($edit_admin['status']);
		} // edit	
		
		
		if($_GET["resmsg"] != "")
		{ // msg
	
			echo $db->errmsg[$db->decode64($_GET["resmsg"])];
		} // msg
		?>
          </span></td>
        </tr>
		<?PHP $query_org_name = $db->getTableArray("select * from company_details where status='Y' ");?>
        <tr>
          <td width="218" height="35"><span class="bl-text">Name * </span></td>
          <td width="18" align="center"><strong>:</strong></td>
          <td colspan="3" align="left">
		  <input name="frm_name" type="text" class="field-text1" id="frm_name" value="<?PHP echo $edit_name;?>" >		  </td>
        </tr>
        <tr>
          <td height="35">Email</td>
          <td align="center"><strong>:</strong></td>
          <td colspan="3" align="left">
		  <input name="frm_email" type="text" class="field-text1" id="frm_email" value="<?PHP echo $edit_email; ?>"></td>
        </tr>        
        <tr>
          <td height="35" valign="middle">Username * </td>
          <td align="center" valign="middle"><strong>:</strong></td>
          <td colspan="3" align="left">	
		  <?PHP
		  if($_REQUEST["act"] == "edit")
		  {
		  ?>
		 <input name="frm_uname" readonly="true" type="text" class="field-text1" id="frm_uname" value="<?PHP echo $edit_uname; ?>">
		  <?PHP
		  }
		  else
		  {
		  ?>
 		 <input name="frm_uname" type="text" class="field-text1" id="frm_uname" value="<?PHP echo $edit_uname; ?>">
		 <?PHP
		 }
		 ?>	
		</td>
        </tr>        
        <tr>
          <td height="35" valign="middle">Password * </td>
          <td align="center" valign="middle"><strong>:</strong></td>
          <td colspan="3" align="left">
		  <input name="frm_pass" type="password" class="field-text1" id="frm_pass">
		  <input type="hidden" name="hpass" id="hpass" value="<?PHP echo $edit_pname; ?>" /> </td>
        </tr>        
        <tr>
          <td height="35" valign="middle">Confirm Password * </td>
          <td align="center" valign="top"><strong>:</strong></td>
          <td colspan="3" align="left"><input name="frm_cpass" type="password" class="field-text1" id="frm_cpass"></td>
        </tr>
        <tr>
          <td height="35">Status</td>
          <td align="center"><strong>:</strong></td>
          <td colspan="3" align="left">
		  <select name="frm_status" id="frm_status" style="width:90px;" class="field-job-drp">
            <option value="N" <?PHP if($edit_status == "N"){?> selected="selected" <?PHP }?>>Inactive</option>
            <option value="Y" <?PHP if($edit_status == "Y"){?> selected="selected" <?PHP }?>>Active</option>
          </select>         </td>
        </tr>
        <tr>
          <td height="35">&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="3" align="left">
		  	  <input type="hidden" value="<?PHP echo $_REQUEST['src']; ?>" name="src" id="src" />
              <input type="hidden" value="<?PHP echo $_REQUEST['page']; ?>" name="page" id="page" />
              <input type="hidden" name="id" id="id" value="<?PHP echo $_REQUEST['id'];?>" />

              <?PHP
				if($_REQUEST['act'] == "edit")
				{	
				?>
             		<input type="submit" name="btsave" id="btsave" class="btn-common" value="Update" />
					<input type="hidden" name="admin_id" id="admin_id" value="<?PHP echo $admin_id; ?>" />
              <?PHP
				}
				else
				{
				?>		
					<input type="hidden" name="admin_id" id="admin_id" value="<?PHP echo $admin_id; ?>" />
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
  
</form>