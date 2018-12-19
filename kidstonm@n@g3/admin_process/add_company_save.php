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
	ini_set("post_max_size","15M");
	ini_set("upload_max_filesize","15M");
	set_time_limit(0);
	include("../../inc1ud35/class.upload.php");
	include("progressing-alert.php");
		// initialize error message
	$resmsg = $db->encode64("0");
		// Code for Save the record...................
		
			if($_POST["btsave"] == "Submit" && isset($_POST["btsave"]))
			{// Submit			
				
					$curdatetime = date("Y-m-d,g:i:s");
				 	$admin_id = $_SESSION['aid'];
					
					
					$dup = $db->fetchSingleRow("select ID from company_details where username='".$_POST["username"]."'");
					
					if($dup)
					{// username
						$resmsg = $db->encode64("15");
?>
<script language="javascript">window.location = "../home.php?src=<?PHP echo $_POST[src]; ?>&page=<?PHP echo $_POST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>
<?PHP					
						die('Username Already Exist');
					}// username
					
					
					$ins_val= array();
					if($_POST["com_name"] != "")
						$ins_val["comp_name"]	 	 = $db->check_input($_POST["com_name"]);
					if($_POST["intern_comp"] != "")
						$ins_val["intern_compname"] = $db->check_input($_POST["intern_comp"]);		
					if($_POST["job_business"] != "")	
						$ins_val["industry_name"]	 = $db->check_input($_POST["job_business"]);
					if($_POST["countrySelect"] != "")
						$ins_val["country"]		 	 = $db->check_input($_POST["countrySelect"]);
					if($_POST["stateSelect"] != "")
						$ins_val["state"]			 = $db->check_input($_POST["stateSelect"]);
					if($_POST["cont_pname"] != "")
						$ins_val["cont_name"]	 	 = $db->check_input($_POST["cont_pname"]);
					if($_POST["cont_pdesign"] != "")
						$ins_val["cont_designation"] = $db->check_input($_POST["cont_pdesign"]);
					if($_POST["cont_pemail"] != "")
						$ins_val["cont_email"]		 = $db->check_input($_POST["cont_pemail"]);
					if($_POST["company_info"] != "")
						$ins_val["company_info"]	 = $db->check_input(htmlentities($_POST["company_info"]));
						
					if($_POST["address1"] != "")
						$ins_val["address1"] 		 = $db->check_input($_POST["address1"]);
					if($_POST["web_url"] != "")
						$ins_val["website_url"]	 	 = $db->check_input($_POST["web_url"]);
					if($_POST["frm_manager"] != "")
						$ins_val["link_manager"]    = $db->check_input($_POST["frm_manager"]);	
					if($_POST["username"] != "")
						$ins_val["username"]	 	 = $db->check_input($_POST["username"]);
					if($_POST["password"] != "")
					{
						$ins_val["password"]	 	 = md5($db->check_input($_POST["password"]));
						$ins_val["enpss"]			 = $db->encode64($db->check_input($_POST["password"]));
					}
					$ins_val["admin_id"]	 	 = $admin_id;					
					$ins_val["create_on"]	 	 = $curdatetime;
					$ins_val["created_ip"]	 	 = $_SERVER['REMOTE_ADDR'];
					if($_POST["status"] != "")
						$ins_val["status"]	 	 	 = $db->check_input($_POST["status"]);
									
					// Table name
					$tbl = "";
					$tbl = "company_details";
					
					// Execute query
					$insid = $db->db_insert($tbl,$ins_val);
					//echo $db->last_error;
					//echo "<br>".$db->last_query;
					if($insid > 0)
					{ 
						$resmsg = $db->encode64("13");				
					}
					else
					{
						$resmsg = $db->encode64("0");				
					}
					
					//Table name2
					$tb2 = "";
					$tb2 = "customer_admin_link";
					$customer = $db->fetchSingleRow("select * from company_details where status='Y'");
					$insval2["customer_id"] = $insid;
					$insval2["admin_id"]	= $db->check_input($_POST["frm_manager"]);	
					$insval2["status"]      = "Y";
					// Execute query2
					$db->db_insert($tb2,$insval2);
						
			} // #submit - Save
			
			//---------------------------------------------------------------------
			if($_POST["btupdate"] == "Update" && isset($_POST["btupdate"]))
			{ // #update - Edit
					
					$admin_id = $_SESSION['aid'];
					
					
					$dup = $db->fetchSingleRow("select ID from company_details where username='".$_POST["username"]."' and ID <> '".$_POST['id']."'");
					if($dup)
					{// username
						$resmsg = $db->encode64("15");
?>
<script language="javascript">window.location = "../home.php?src=<?PHP echo $_POST[src]; ?>&page=<?PHP echo $_POST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>
<?PHP					
						die('Username Already Exist');
					}// username
					
					
					
					if($_POST['password']!="")
					{
						$pass = $db->check_input($_POST['password']);
					}
					else
					{
						$pass = $db->check_input($_POST['hpass']);
					}
					$ins_val= array();
					$ins_val["comp_name"]	 	 = $db->check_input($_POST["com_name"]);
					$ins_val["intern_compname"] = $db->check_input($_POST["intern_comp"]);
					$ins_val["industry_name"]	 = $db->check_input($_POST["job_business"]);
					$ins_val["country"]		 	 = $db->check_input($_POST["countrySelect"]);
					$ins_val["state"]			 = $db->check_input($_POST["stateSelect"]);
					$ins_val["cont_name"]	 	 = $db->check_input($_POST["cont_pname"]);
					$ins_val["cont_designation"] = $db->check_input($_POST["cont_pdesign"]);
					$ins_val["cont_email"]		 = $db->check_input($_POST["cont_pemail"]);
					
					if($_POST["company_info"] != "")
						$ins_val["company_info"]	 = $db->check_input($_POST["company_info"]);
					
					$ins_val["address1"] 		 = $db->check_input($_POST["address1"]);
					//if($_POST["address2"] !="")
						//$ins_val["address2"]	 	 = $db->check_input($_POST["address2"]);
/*					$ins_val["street"]	 		 = $db->check_input($_POST["street"]);
					$ins_val["city"]	 		 = $db->check_input($_POST["city"]);
					$ins_val["postalcode"]	 	 = $db->check_input($_POST["pincode"]);
*/					$ins_val["website_url"]	 	 = $db->check_input($_POST["web_url"]);
					$ins_val["link_manager"]    =  $db->check_input($_POST["frm_manager"]);	
					//$ins_val["password"]	 	 = $pass;
					if($_POST["username"] != "")
						$ins_val["username"]	 	 = $db->check_input($_POST["username"]);
					$ins_val["password"]	 	 = md5($pass);
					$ins_val["enpss"]			 = $db->encode64($pass);
					$ins_val["admin_id"]	 	 = $admin_id;					
					$ins_val["status"]	 	 	 = $db->check_input($_POST["status"]);
					$id = $db->check_input($_POST['id']);
					
					
					$aff_row = $db->update("company_details",$ins_val," ID='$id' ");
					
					//Table name2
					$tb2 = "";
					$tb2 = "customer_admin_link";
					$insval2["customer_id"] =  $_REQUEST["id"];
					$insval2["admin_id"]	= $db->check_input($_POST["frm_manager"]);	
					$insval2["status"]      = "Y";
					
					// Execute query2
					
					 $db->update("customer_admin_link",$insval2, "ID = '$aff_row' ");
					 //echo $db->last_error." <br> ".$db->last_query;			
					 
					 
					if($aff_row > 0)
					{ 
						$resmsg = $db->encode64("13");				
					}
					else
					{
						$resmsg = $db->encode64("0");				
					}
									
			} // #update - Edit
			
	// Code for status change..........
	if($_REQUEST["act"] == "st")
	{// st
		$aff_row = $db->update_sql("update company_details set  status ='".$db->check_input($_REQUEST["st"])."' where ID='".$db->check_input($_REQUEST["id"])."'");
		
					if($aff_row > 0)
					{ 
						$resmsg = $db->encode64("13");				
					}
					else
					{
						$resmsg = $db->encode64("0");				
					}
					
	}// st	
	
// Code for delete record..........
	if($_REQUEST["act"] == "del")
	{// st
			//echo "delete from company_details where ID='".$db->check_input($_POST["id"]."' ";
			//$db->update_sql("delete from company_details where ID='".$db->check_input($_POST["id"])."' ");
			$aff_row = $db->update_sql("update company_details set  status ='D' where ID='".$db->check_input($_REQUEST["id"])."'");
					if($aff_row > 0)
					{ 
						$resmsg = $db->encode64("13");				
					}
					else
					{
						$resmsg = $db->encode64("0");				
					}
					//echo $db->last_query;
					//echo "<br>".$db->last_error;
	}// st
	// ------------------------------		
?>
<script language="javascript">window.location = "../home.php?src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>