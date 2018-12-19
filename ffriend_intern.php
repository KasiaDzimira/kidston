<div id="myOnPageContent1" style="display:none;">
							<table width="400" border="0" cellspacing="0" cellpadding="2">
						  <form action="<?PHP echo SITE_URL; ?>process/ffriend.php" method="post" name="frd" id="frd" onsubmit="return frd_friend1('<?PHP echo SITE_URL; ?>process/ffriend.php');">
                            
                            <tr>
                              <td width="15" height="30" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td align="left" valign="middle" class="h3">Forward to a Friend</td>
                              <td align="right" valign="top" bgcolor="#fbfeff">
							  <div style="float:left; display:none;" class="smtxt" id="ff1"><font color="#FF0000"><b>Please fill all the fields</b></font> </div>
							  
							  </td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="21" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td align="left" valign="top" class="smtxt"><strong>Friend name<span class="star">*</span> </strong></td>
                              <td align="left" valign="top" class="smtxt"><strong>Your name<span class="star">*</span> </strong></td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="27" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td height="30" align="left" valign="top" bgcolor="#fbfeff">
						  	  <input name="fname1" type="text" class="smtxt" id="fname1" onFocus="this.value='';" /></td>
                              <td align="left" valign="top" bgcolor="#fbfeff">
							  	<input name="uname1" type="text" class="smtxt" id="uname1" value="" onFocus="this.value='';" />							  </td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="20" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td align="left" valign="top" class="smtxt"><strong>Friend email<span class="star">*</span> </strong></td>
                              <td align="left" valign="top" class="smtxt"><strong>Your email<span class="star">*</span> </strong></td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="27" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td height="30" align="left" valign="top" bgcolor="#fbfeff">
							  <input type="text" name="fmail1" value="Email" class="smtxt" id="fmail1" onclick=" 
	  if(this.value == 'Email') { this.value=''; }" onblur="if (this.value == '') { this.value='Email'; }"/>							 </td>
                              <td align="left" valign="top" bgcolor="#fbfeff">
<input type="text" name="umail1" id="umail1" value="Email" class="smtxt" onclick=" 
	  if(this.value == 'Email') { this.value=''; }" onblur="if (this.value == '') { this.value='Email'; }"/>							 </td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="36" align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;&nbsp; &nbsp; </td>
                              <td align="left" valign="middle" bgcolor="#fbfeff">
                              
                              <input type="submit" name="submit" id="submit" value="Submit" class="btn-common" />
							  <?PHP 
							  	$s=$_SERVER['QUERY_STRING'];
								$u=explode("?",$s);
								if($u[0]!="")
								{
									$val="?".$u[0];
								}
							  	$url_val = SITE_URL."view-intern.php".$val; ?>
                                  <input name="url_frd" type="hidden" id="url_frd" value="<?PHP echo $url_val; ?>" />
                              <td align="left" valign="top" bgcolor="#fbfeff">&nbsp;</td>
                            </tr>
						  </form>
                          </table>
</div>
