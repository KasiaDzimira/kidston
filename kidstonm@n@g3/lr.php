<?PHP 
	include("admin_includes/first_line.php");
	include("admin_includes/header_log.php");
?>
<div id="home-mid-section">
	  <div id="home-box-sec"><br />
	   <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="50" colspan="5" valign="middle" class="orange-head" style="padding:5px 0px 0px 5px;">&nbsp;</td>
          </tr>
          <tr>
            <td height="30" colspan="5" align="left" valign="middle"><strong class="black-bold"> Administrator Login</strong></td>
          </tr>
          <?PHP 
			 if($_GET["resmsg"] != "") { 
		   ?>
          <tr>
            <td height="30" align="center" valign="middle" colspan="5">
			<?PHP
					if($_GET["resmsg"] != "")
					{
						echo $db->errmsg[$db->decode64($_GET["resmsg"])];
					}
			?>
               </td>
          </tr>
          <?PHP } ?>
          <form action="lr/<?PHP echo base64_encode(rand(1000,50000)); ?>" method="post" name="frm_login" id="frm_login" onsubmit="return login_validation(this);">
            <tr>
              <td height="1" colspan="5" align="right" ></td>
            </tr>
            <tr>
              <td width="257" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="103" height="45" align="left" bgcolor="#FFFFFF" class="blue-text">User Name<span class="red"> *</span></td>
              <td width="10" align="center" valign="middle" bgcolor="#FFFFFF" >:</td>
              <td width="203" align="left" valign="middle" bgcolor="#FFFFFF"><input type="text" name="frm_login_username" id="frm_login_username" class="field-job" autocomplete="off"/></td>
              <td width="207" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td height="45" align="left" bgcolor="#FFFFFF" class="blue-text">Password<span class="red"> *</span></td>
              <td width="10" align="center" valign="middle" bgcolor="#FFFFFF" >:</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF" ><input type="password" name="frm_login_password" id="frm_login_password" class="field-job" autocomplete="off" /></td>
              <td align="left" valign="middle" bgcolor="#FFFFFF" >&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td height="45" bgcolor="#FFFFFF">&nbsp;</td>
              <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;
                  <input type="submit" name="frm_submit" id="frm_submit" value="LOGIN" class="btn-common" />
                &nbsp;
                <input type="reset" name="frm_reset" id="frm_reset" value="RESET" class="btn-common" />
              </td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          </form>
          <tr>
            <td height="1" colspan="5" align="right" ></td>
          </tr>
          <tr>
            <td height="80" colspan="5" align="right" bgcolor="#FFFFFF" ></td>
          </tr>
        </table><br>
<br>
<br>

	  </div>
	  </div>
<?PHP include("admin_includes/fooder.php");?>
