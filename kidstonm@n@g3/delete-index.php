<?PHP 
	include("admin_includes/first_line.php");
	include("admin_includes/header_log.php");
?>
<?PHP 
if($_REQUEST['frm_submit'] == "LOGIN")
{ 
			$get_frm_login_username = $db->check_login_input($_REQUEST["frm_login_username"]);
			$get_frm_login_password = $db->check_login_input($_REQUEST["frm_login_password"]);
			$table='admin_access';
			
			$log_checker['username']=$get_frm_login_username;
			$log_checker['password']=$get_frm_login_password;
			$log_checker['status'] = 'Y';
			$log_chk = $db->fetchSingleRowParam($table,$log_checker,'');
	
		//$log_chk = $db->fetchSingleRow("Select * from admin_access where username='".$get_frm_login_username."' and password='".$get_frm_login_password."' and status ='Y'");
	if($log_chk)
	{ 
				 	$adminID = $log_chk["ID"];
					
				 	$_SESSION["aid"] = $log_chk["ID"];
				 	$_SESSION['username'] = $log_chk['username'];
					$_SESSION['admin_type'] = $log_chk['admin_type'];
					?>
					<script language="javascript" type="text/javascript">
						window.location  = "home.php";
					</script>	
					<?PHP
	}else{
	$msg = "1";
	}//logchk
}//submit
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
			 if($_REQUEST['msg'] != "")
			 {
			 $msg = $_REQUEST['msg'];
			 }
			 if($msg != "") { ?>
          <tr>
            <td height="30" align="center" valign="middle" colspan="5"><font color="#FF0000">
              <?PHP if($msg == "1"){?>
              <span class="813250511-03102003"><b>Sorry!</b><br />
              <span class="048074611-03102003"> Invalid Username / Password..!. <br />
                Please enter your valid User Name and Password to view personalised pages </span> </span>
              <?PHP } ?>
              <?PHP if($msg =="4"){ ?>
              <span class="813250511-03102003"><b>Sorry!</b><br />
              <span class="048074611-03102003"> You have not logged in or Session Timed Out.<br />
                Please do login again. </span> </span>
              <?PHP }?>
              <?PHP if($msg =="0"){ ?>
              </font><span class="813250511-03102003"><b><span class="style2">Thank You</span></b></span><span class="style2"><b>!</b></span><span class="813250511-03102003"></span><font color="#FF0000"><span class="813250511-03102003"><br />
              </span></font><span class="813250511-03102003"><span class="048074611-03102003 style1"> You have successfully logged out </span></span>
              <?PHP }?>
              </font> </td>
          </tr>
          <?PHP } ?>
          <form action="index.php" method="post" name="frm_login" id="frm_login" onsubmit="return validate_frm_login();">
            <tr>
              <td height="1" colspan="5" align="right" ></td>
            </tr>
            <tr>
              <td width="257" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="103" height="45" align="left" bgcolor="#FFFFFF" class="blue-text">User Name<span class="red"> *</span></td>
              <td width="10" align="center" valign="middle" bgcolor="#FFFFFF" >:</td>
              <td width="203" align="left" valign="middle" bgcolor="#FFFFFF"><input type="text" name="frm_login_username" id="frm_login_username" class="field-job" /></td>
              <td width="207" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
              <td height="45" align="left" bgcolor="#FFFFFF" class="blue-text">Password<span class="red"> *</span></td>
              <td width="10" align="center" valign="middle" bgcolor="#FFFFFF" >:</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF" ><input type="password" name="frm_login_password" id="frm_login_password" class="field-job" /></td>
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
