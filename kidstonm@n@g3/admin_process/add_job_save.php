<?PHP
	session_start(); 
	if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "server")
	{
		include("../../inc1ud35/database.mvc.php");
	}
	else
	{
		include("../../inc1ud35/database.mvc.live.php");
	}
	include("progressing-alert.php");
	
		// initialize error message
	$resmsg = $db->encode64("0");
		// Code for Save the record...................
		// Code for Save the record...................
		
			if(isset($_POST["btsave"]) && $_POST["btsave"] == "Submit")
			{ // #submit - Save				
				
								
					$curdatetime = date("Y-m-d,g:i:s");
				 	$admin_id = $_SESSION['aid'];
					
					$job_title =  $db->check_input($_POST["job_title"]);
					$job_quota = $db->check_input($_POST["job_quota"]);
					$job_business = $db->check_input($_POST["job_area"]); 
					//$job_business = ""; 
					$job_brief =  $db->check_input($_POST["job_brief"]);
					$job_desc  =  $db->check_input($_POST["frm_detail_desc"]);
					
					$date  = $db->check_input($_POST['ivdate']);
					$month = $db->check_input($_POST['ivmonth']);
					$year  = $db->check_input($_POST['ivyear']);
					$edit_asap = $db->check_input($_POST['job_asap']);
					
					if($date!="" and $month!="" and $year!="")
					{
						$apply_date = $year."-".$month."-".$date; 
					}
					$ins_val= array();
					$ins_val["org_id"]	 	 = $db->check_input($_POST["org_name"]);
					//$ins_val["job_code"] 	 = $db->check_input($_POST["frm_jobcode"]);
					$ins_val["job_title"]	 = $job_title;
					$ins_val["job_business"] = $job_business;
					$ins_val["job_type"]	 = $db->check_input($_POST["job_type"]);
					if($_POST["job_duration"] != "")
						$ins_val["job_duration"] =  $db->check_input($_POST["job_duration"]);
						
					$ins_val["job_brief"]	 = $job_brief;
					$ins_val["job_desc"]	 = $job_desc;
					
					if($_POST["frm_add_com"] != "")
						$ins_val["add_com"] = $db->check_input($_POST["frm_add_com"]);
					
					if($_POST["frm_salary"] != "")
						$ins_val["job_salary"] =  $db->check_input($_POST["frm_salary"]);
					//if($_POST["frm_language"] != "")
						//$ins_val["job_language"] =  $db->check_input($_POST["frm_language"]);
					if($_POST["atype"] != "")
						$ins_val["job_atype"] =  $db->check_input($_POST["atype"]);
					if($_POST["responsibility"] != "")
						$ins_val["job_response"] =  $db->check_input($_POST["responsibility"]);
					if($_POST["skillz"] != "")
						$ins_val["job_skillz"] =  $db->check_input($_POST["skillz"]);
					
					$ins_val["location"] 	 = $db->check_input($_POST["job_location"]);
					$ins_val["cont_pname"]	 = $db->check_input($_POST["cont_pname"]);
					$ins_val["cont_pemail"]	 = $db->check_input($_POST["cont_email"]);
					
					//$ins_val["cont_purl"] 	 = $db->check_input($_POST["cont_url"]);
					if($apply_date!="")
						$ins_val["apply_date"]	 = $apply_date;
					if($edit_asap!="")
					{
						$ins_val["job_asap"]	 = $edit_asap;
					}else
					{
						//$ins_val["job_asap"]	 = NULL;
					}
					$ins_val["job_quota"] = $job_quota;	
					$ins_val["admin_id"]	 = $admin_id;					
					$ins_val["create_on"]	 = $curdatetime;
					$ins_val["created_ip"] 	 = $_SERVER['REMOTE_ADDR'];
					$ins_val["postedon"]	 = $curdatetime;
					$ins_val["update_on"]	 = $curdatetime;
					$ins_val["status"]	 	 = $db->check_input($_POST["status"]);
					$ins_val["publish_status"] = "A";
					if($db->check_input($_POST["frm_xml"]) == "Y")
						$ins_val["publish_xml"] = "Y";
					
					// Table to be affected
					$tbl = "";
					$tbl = "job_details";
					
					$insid = $db->db_insert($tbl,$ins_val);
					
					//echo $db->last_query;
					
					if($insid > 0)
					{ 
						
						if($db->check_input($_POST["status"]) == "Y")
						{//status
						
						$ent_jarea		= $db->check_input($_POST["job_area"]); 
						$ent_jtype		= $db->check_input($_POST["job_type"]);
						$ent_location	= $db->check_input($_POST["job_location"]);
						
						$sql_usr = "SELECT `ID`, `name`, `email`, `job_area`, `job_location`, `job_type` FROM `job_master` where (job_area = '".$ent_jarea."' and job_type = '".$ent_jtype."' and job_location ='".$ent_location."' and status='Y') or( job_area = 'All Job Area' and job_type = 'All' and job_location ='All Location' and status='Y')";
						$getuser = $db->getTableArray($sql_usr);
						if(count($getuser)>0)
						{// if $getuser
							for($e=0;$e<count($getuser);$e++)
							{//for e
								$name = $getuser[$e]['name'];
								$email = $getuser[$e]['email'];
								$user_id =  $db->encode64("JMA:".$getuser[$e]['ID']);
								
								$link = "https://www.kidston.ch/job/".$insid."/".$db->stringToUrlSlug(html_entity_decode($job_title));
								
								//$link = "https://www.kidston.ch/job_details.php?jid=".$insid;
								?>
                                    <div style="display:none;">
                                    <?PHP 
                                    ob_start();	
                                    include("../../mailer/usr_job_mail.php");
                                    $message = ob_get_contents();
                                    ob_end_flush();
                                    ?>
                                    </div>
								<?PHP	
							$to   = $email;
							$from = " KIDSTON <jobs@kidston.ch>";
							$email_sub = "KIDSTON New Job Alert!";
							$headers = "From: $from \r\n";
							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							$ok = mail($to,$email_sub,$message,$headers);

							}//for e
						}//if $getuser
						}//status

				$resmsg = $db->encode64("13");
						
						$jcode = $insid;
						if($insid < 10)
							$jcode = "00".$insid;
						if($insid < 100 && $insid > 9)
							$jcode = "0".$insid;
						
						
						$ins_val1["job_code"] = "K-".date("ymd")."-".$jcode;
						$aff_row = $db->update("job_details",$ins_val1," ID='$insid' ");	
						
						// update language table
						$tab_lan = "job_language";
						
						$get_thevalue = $db->check_input($_POST["theValue"]);
						//echo $get_thevalue;
						for($l=0;$l<$get_thevalue;$l++)
						{// L for
							$frm_language = "";
							$lang_lev   = "";
							$frm_language    = $_POST['frm_language_'.$l];
							$lang_lev   = $_POST['frm_f_'.$l];
							if(isset($_POST['frm_language_'.$l]) && isset($_POST['frm_f_'.$l]))
							{
									if($frm_language != "")
										$inlang["job_id"] = $insid;
									if($frm_language != "")	
										$inlang["language"] = $frm_language;
									if($lang_lev != "")	
										$inlang["language_level"] = $lang_lev;
									
									$sql_insert = $db->db_insert($tab_lan,$inlang);
							}
							//echo "<br>".$db->last_query." ".$db->lasat_error." -frm_language_$l = > frm_f_$l";
						}// L for
						
						$tab_pet = "job_platforms";
						$get_thepvalue = $db->check_input($_POST["thepValue"]);
						//echo $get_thepvalue;
						for($p=0;$p<$get_thepvalue;$p++)
						{// P for
							$frm_platform  = $_POST['frm_platform_'.$p];
							//echo $frm_platform;
							if(isset($_POST['frm_platform_'.$p]) )
							{
									
										$inplt["job_id"] = $insid;
									if($frm_platform != "")	
										$inplt["platform"] = $frm_platform;
																		
									$sql_insert = $db->db_insert($tab_pet,$inplt);
							}
							//echo "<br>".$db->last_query;
						}// P for
						
					}
					else
					{
						$resmsg = $db->encode64("0");				
					}
			} // #submit - Save
			
			//---------------------------------------------------------------------
			if($_POST["btupdate"] == "Update")
			{ // #update - Edit
			
				$curdatetime = date("Y-m-d,g:i:s");
					
					$job_title =  $db->check_input($_POST["job_title"]);
					$job_business = $db->check_input($_POST["job_area"]);
					
					$job_brief =  $db->check_input($_POST["job_brief"]);
					$job_desc  =  $db->check_input($_POST["frm_detail_desc"]);
					$job_quota = $db->check_input($_POST["job_quota"]);
					
					$date  = $db->check_input($_POST['ivdate']);
					$month = $db->check_input($_POST['ivmonth']);
					$year  = $db->check_input($_POST['ivyear']);
					//echo $db->check_input($_POST['ivmonth']);
					$edit_asap = $db->check_input($_POST['job_asap']);
					if($date!="" and $month!="" and $year!="")
					{
						$apply_date = $year."-".$month."-".$date; 
					}
 					
					$ins_val= array();
					$ins_val["org_id"]	 	 = $db->check_input($_POST["org_name"]);
					//$ins_val["job_code"]	 	 = $db->check_input($_POST["frm_jobcode"]);
					$ins_val["job_title"]	 = $job_title;
					$ins_val["job_quota"] = $job_quota;
					$ins_val["job_business"] = $job_business;
					$ins_val["job_type"]	 = $db->check_input($_POST["job_type"]);
					if($_POST["job_duration"] != "")
						$ins_val["job_duration"] =  $db->check_input($_POST["job_duration"]);
					if($job_brief != "")
						$ins_val["job_brief"]	 = $job_brief;
					$ins_val["Job_desc"]	 = $job_desc;
					
					if($_POST["frm_add_com"] != "")
						$ins_val["add_com"] = $db->check_input($_POST["frm_add_com"]);
					
					if($_POST["frm_salary"] != "")
						$ins_val["job_salary"] =  $db->check_input($_POST["frm_salary"]);
					//if($_POST["frm_language"] != "")
						//$ins_val["job_language"] =  $db->check_input($_POST["frm_language"]);
					if($_POST["atype"] != "")
						$ins_val["job_atype"] =  $db->check_input($_POST["atype"]);
					if($_POST["responsibility"] != "")
						$ins_val["job_response"] =  $db->check_input($_POST["responsibility"]);
					if($_POST["skillz"] != "")
						$ins_val["job_skillz"] =  $db->check_input($_POST["skillz"]);
					
					$ins_val["location"] 	 = $db->check_input($_POST["job_location"]);
					$ins_val["cont_pname"]	 = $db->check_input($_POST["cont_pname"]);
					$ins_val["cont_pemail"]	 = $db->check_input($_POST["cont_email"]);
					
					//$ins_val["cont_purl"] 	 = $db->check_input($_POST["cont_url"]);
					if($apply_date!="")
					{
						 $ins_val["apply_date"]	 = $apply_date;
					}
					if($edit_asap!="")
					{
						$ins_val["job_asap"]	 = $edit_asap;
					}
					else
					{
						$ins_val["job_asap"]	 = NULL;
					}
					$ins_val["status"]	 	 = $db->check_input($_POST["status"]);
					$ins_val["postedon"]	 = $curdatetime;
					$ins_val["update_on"]	 = $curdatetime;
					if($db->check_input($_POST["frm_xml"]) == "Y")
						$ins_val["publish_xml"] = "Y";
					$id = $db->check_input($_POST['id']);
					
					
					$aff_row = $db->update("job_details",$ins_val," ID='$id' ");
					//print_r($ins_val)."<hr>".$db->last_query."<br>";
					//echo "***".$db->last_error."***<br>";
					//echo print_r($ins_val);
					//echo $db->last_query;
					
						
						// update language table
						$tab_lan = "job_language";
						$get_thevalue = $db->check_input($_POST["theValue"]);
						
						$db->delete_sql("delete from job_language where job_id='".$id."'");
						//echo $get_thevalue;
						for($l=0;$l<$get_thevalue;$l++)
						{// L for
							$frm_language = "";
							$lang_lev   = "";
							$frm_language    = $_POST['frm_language_'.$l];
							$lang_lev   = $_POST['frm_f_'.$l];
							
							if(isset($_POST['frm_language_'.$l]) && isset($_POST['frm_f_'.$l]))
							{
								if($frm_language != "")
									$inlang["job_id"] = $id;
							
								if($frm_language != "")	
									$inlang["language"] = $frm_language;
								if($lang_lev != "")	
									$inlang["language_level"] = $lang_lev;
								$sql_insert = $db->db_insert($tab_lan,$inlang);
							}
							
							
							//echo "<br>".$db->last_query." ".$db->lasat_error." -frm_language_$l = > frm_f_$l";
						}// L for
						
						// update language table
						$tab_pet = "job_platforms";
						$get_thepvalue = $db->check_input($_POST["thepValue"]);
						
						$db->delete_sql("delete from job_platforms where job_id='".$id."'");
						//echo $get_thevalue;
						for($p=0;$p<$get_thepvalue;$p++)
						{// P for
							$frm_platform  = $_POST['frm_platform_'.$p];
							//echo $frm_platform;
							if(isset($_POST['frm_platform_'.$p]) )
							{
									
										$inplt["job_id"] = $id;
									if($frm_platform != "")	
										$inplt["platform"] = $frm_platform;
																		
									$sql_insert = $db->db_insert($tab_pet,$inplt);
							}
							//echo "<br>".$db->last_query;
						}// P for
					//echo $db->last_query." ".$db->last_error;
					
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
		//$ins_val["postedon"]	 = $curdatetime;
		$curdatetime = date("Y-m-d,g:i:s");
		$aff_row = $db->update_sql("update job_details set  postedon='$curdatetime',status ='".$_REQUEST["st"]."' where ID='".$_REQUEST["id"]."'");
		if($aff_row > 0 && $_REQUEST["st"] == "C")
		{
			
			//$db->delete_sql("delete from application_master where job_id='".$_REQUEST["id"]."' ");
			//$db->delete_sql("delete from application_link where job_id='".$_REQUEST["id"]."' ");
			
			$instatus["admin_id"] = $_SESSION["aid"];
			$instatus["job_id"] = $_REQUEST["id"];
			$instatus["remarkss"] = $db->check_input($_REQUEST["remarks"]);
			$instatus["created_on"] = $curdatetime;
			$instatus["created_ip"] = $_SERVER['REMOTE_ADDR'];
			
			
			$rem_insert = $db->db_insert("status_remarks",$instatus);
			
			//echo $db->last_query;
		}
		
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
		$curdatetime = date("Y-m-d,g:i:s");	
			//echo "delete from company_details where ID='".$db->check_input($_POST["id"]."' ";
			//$db->update_sql("delete from job_details where ID='".$db->check_input($_POST["id"]."' ");
			$aff_row = $db->update_sql("update job_details set  postedon='$curdatetime',status ='D' where ID='".$_REQUEST["id"]."'");
			
		//	$db->delete_sql("delete from application_master where job_id='".$_REQUEST["id"]."' ");
		//	$db->delete_sql("delete from application_link where job_id='".$_REQUEST["id"]."' ");
			
					if($aff_row > 0)
					{ 
						$resmsg = $db->encode64("13");				
					}
					else
					{
						$resmsg = $db->encode64("0");				
					}
	}// st
	// --------------------------------		
?>
<script language="javascript">window.location = "../home.php?rp=<?PHP echo $_REQUEST["rp"]; ?>&companyid=<?PHP echo $_REQUEST["companyid"]; ?>&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>