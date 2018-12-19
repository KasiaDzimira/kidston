<?php
$applink= $db->fetchSingleRow("select * from application_link where ID = ".$_REQUEST["alid"] );
$appremarks = $applink["remarks"];
?>	
<form name="frm_remarks" id="frm_remarks" action="admin_process/remarks_save.php" method="post" onSubmit="return validation_remarks();">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
		       
		<tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4"><?php echo $db->errmsg[$db->decode64($_GET["resmsg"])]; ?></td>
        </tr>
		<tr>
          <td colspan="5" align="right"><a href="home.php?src=<?PHP echo $_REQUEST["rsrc"]; ?>">Back </a></td>
       </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="25" colspan="4">&nbsp;</td>
        </tr>
		  <tr>
          <td width="228" height="35" valign="middle"><span class="bl-text">Remarks</span></td>
          <td width="13" align="center" valign="middle"><strong>:</strong></td>
          <td colspan="4" align="left">
		  <textarea name="edit_remarks" class="field-popup" id="edit_remarks" cols="60" rows="6"></textarea>
		  </td>
        </tr>
   <tr>
          <td height="35">&nbsp;</td>
          <td valign="middle">&nbsp;</td>
          <td colspan="4" align="left">
		  <input type="hidden" name="rsrc" id="rsrc" value="<?PHP echo $_REQUEST['rsrc']; ?>" />
          <input type="hidden" name="get_id" id="get_id" value="<?PHP echo $_REQUEST['alid'];?>" />
		  <input type="hidden" name="candid_id" id="candid_id" value="<?PHP echo $_REQUEST['cid'];?>" />
		  <input type="hidden" name="job_id" id="job_id" value="<?PHP echo $_REQUEST['jid'];?>" />
		  <input type="hidden" name="mem" id="mem" value="<?PHP echo $_REQUEST['mem'];?>" />
		   <input type="hidden" name="app_sts" id="app_sts" value="<?PHP echo $_REQUEST['sts']; ?>"  />
		  <input type="hidden" name="page" id="page" value="<?PHP echo $_REQUEST['page']; ?>"  />
		 <input type="submit" name="frm_rmk_submit" id="frm_rmk_submit" class="btn-common" value="Submit" />
            
          </td>
        </tr>
     </table></td></tr>
 </table>
</form>   
