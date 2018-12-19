<div id="myOnPageContent" style="display:none;">
						<table width="400" border="0" cellspacing="0" cellpadding="2">
						  <form action="" method="post" name="frd" id="frd" onsubmit="return login_validation('<?PHP echo SITE_URL; ?>process/login.php');">
                            <tr>
                              <td width="15" height="30" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td colspan="2" align="left" valign="middle" class="h3">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							?>
							Kundenlogin
							<?PHP
							}
							if($_SESSION["slanguage"] == "2")
							{
							?>
							Customer Login
							<?PHP
							}
							?> </td>
							  <td width="4" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="21" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td width="103" align="left" valign="top" class="smtxt">&nbsp;</td>
                              <td width="262" align="left" valign="top" class="smtxt"><div style="float:left; display:none;" id="ff"><font color="#FF0000"><b>
							  <?PHP
							  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							  {
							  echo "Bitte geben Sie Benutzername oder Passwort";
							  }
							  if($_SESSION["slanguage"] == "2")
							  {
							  echo "Please enter  Username or Password.";
							  }
							  ?></b></font> </div>							   </td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="27" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td height="30" bgcolor="#fbfeff"><span class="smtxt"><strong>
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							?>
							  Username 
							 <?PHP
							}
							if($_SESSION["slanguage"] == "2")
							{
							?>
							 User  name * 
							 <?PHP
							 }
							 ?></strong></span></td>
                              <td height="30" bgcolor="#fbfeff"><input type="text" name="uname" id="uname" class="field-job"/></td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="27" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td height="60" bgcolor="#fbfeff"><span class="smtxt"><strong>
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							?>Passwort
							 <?PHP
							}
							if($_SESSION["slanguage"] == "2")
							{
							?>
							  Password  *
							   <?PHP
							 }
							 ?> </strong></span>
							  </td>
                              <td bgcolor="#fbfeff"><input type="password" name="pass" class="field-job" id="pass"/>
							  </td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="36" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;&nbsp; &nbsp; </td>
                              <td align="left" valign="middle" bgcolor="#fbfeff">
							<?PHP
							if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							?>
							  <input type="submit" name="submit" id="submit" value="Anmelden" class="btn-common" />
							 <?PHP
							}
							if($_SESSION["slanguage"] == "2")
							{
							?>
							   <input type="submit" name="submit" id="submit" value="Submit" class="btn-common" />
							  <?PHP
							  }
							  ?> 
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
						  </form>
                          </table>
</div>