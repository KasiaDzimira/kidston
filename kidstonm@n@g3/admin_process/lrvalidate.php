<?PHP
			session_start();
			
			if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
			{
				include("../../inc1ud35/database.mvc.php");
			}
			else
			{
				include("../../inc1ud35/database.mvc.live.php");
			}
			
			if($_POST["frm_submit"] == "LOGIN" && isset($_POST["frm_submit"]))
			{// Submit
						// get post values
						$get_username = "";
						$get_password = "";
						
						$get_username = $db->check_login_input($_POST["frm_login_username"]);
						$get_password = $db->check_login_input($_POST["frm_login_password"]);
						
						$tbl = "";
						$tbl = "admin_access";
						$param["username"] = $get_username;
						$param["password"] = md5($get_password);
						$param["status"] = "Y";
						
						$log_chk = $db->fetchSingleRowParam($tbl,$param,'');
						if($log_chk)
						{// admin access :::: This if condition to check is this a valid admin with correct username & password ::::
						
							// check admin type
							$adtype = $db->fetchSingleRow("select * from admin_type where ID='".$log_chk["admin_type"]."' and status='Y'");
							if($adtype)// admin type  :::: This if condition to validate whether this admin type is active. If so then allow other no users under this type will not be allowed to login. ::::
							{
									$lgtime = date("Y-m-d H:i:s");
									// Create login log
									$tbl = "";
									$tbl = "admin_login";
									
									$lpm["admin_id"] = $log_chk["ID"];
									$lpm["login_time"] = $lgtime;
									$lpm["login_status"] = "Y";
									$lpm["login_ip"] = $_SERVER['REMOTE_ADDR'];
									$lpm["session_id"] = session_id();
									
									$lglog = $db->db_insert($tbl,$lpm);
									if($lglog > 0)
									{// log create :::: This is if condition to check the admin login log properly created? ::::
									
											// set up session
											$_SESSION["username"] = $get_username;
											$_SESSION["aid"] = $log_chk["ID"];
											$_SESSION["admin_type"] = $adtype["ID"];
											$_SESSION["admin_email"] = $log_chk["email"];
											$_SESSION["name"] = $log_chk["name"];
											
											$_SESSION["admin_power"] = $adtype["admin_power"];
											$_SESSION["type_name"] = $adtype["type_name"];
											
											$_SESSION["company"] = $adtype["company"];
											$_SESSION["job"] = $adtype["job"];
											$_SESSION["candidate"] = $adtype["candidate"];
											$_SESSION["dbsec"] = $adtype["db"];
											
											$_SESSION["login_time"] = $lgtime;
											$_SESSION["login_ip"] = $_SERVER['REMOTE_ADDR'];
											
											$_SESSION["login_id"] = $lglog;
			?>
			<script language="javascript">window.location = "../home.php?src=home";</script>
			<?PHP
										die('');								
									}// log create
									else
									{// log create
											$resmsg = $db->encode64("0");
									}// log create
							  }// admin type
							  else
							  {// admin type
											$resmsg = $db->encode64("11");
							  }// admin type
						}// admin access
						else
						{// admin access
											$resmsg = $db->encode64("10");
						}// admin access
				
			}// Submit
?>
<script language="javascript">window.location = "../?resmsg=<?PHP echo $resmsg; ?>";</script>