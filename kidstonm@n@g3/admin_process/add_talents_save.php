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
					
					$can_name =  $db->check_input($_POST["can_name"]);
					$cdesign =  $db->check_input($_POST["cdesign"]);
					$know_summ  =  $db->check_input($_POST["know_summ"]);
					
					$loc  = $db->check_input($_POST['location']);
					$bus = $db->check_input($_POST['business']);
					$age  = $db->check_input($_POST['age']);
					$employ = $db->check_input($_POST['employ']);
					$skillz  = $db->check_input($_POST['skillz']);
					
					$summ  = $db->check_input($_POST['summary']);
					$degr = $db->check_input($_POST['degrees']);
					$feduc  = $db->check_input($_POST['feducation']);
					
					$avaliable  = $db->check_input($_POST['availability']);
					$cpname = $db->check_input($_POST['cont_pname']);
					$cemail  = $db->check_input($_POST['cont_email']);
					
					
					$ins_val= array();
					
					$ins_val["cond_name"]	 = $can_name;
					$ins_val["curr_design"]	 = $cdesign;
					if($know_summ!="")
						$ins_val["know_summ"]	 = $know_summ;
					if($loc!="")
						$ins_val["location"]	 = $loc;
					if($bus!="")
						$ins_val["busi_line"]	 = $bus;
					if($age!="")						
						$ins_val["age"]	 = $age;
					if($employ != "")
						$ins_val["employ"] = $employ;
					if($summ!="")						
						$ins_val["summary"]	 = $summ;
					if($degr!="")						
						$ins_val["degrees"]	 = $degr;
					if($feduc!="")								
						$ins_val["feducation"]	 = $feduc;
					if($avaliable!="")		
						$ins_val["available"]	 = $avaliable;
					if($skillz!="")		
						$ins_val["skills"]	 = $skillz;
					$ins_val["cpreson_name"]	 = $cpname;
					$ins_val["cpreson_email"]	 = $cemail;
					$ins_val["create_on"]	 = $curdatetime;
					$ins_val["ip_addr"]	 = $_SERVER['REMOTE_ADDR'];
					$ins_val["admin_id"]	 = $admin_id;
					$ins_val["status"]	 = $db->check_input($_POST["status"]);
					
					// Table to be affected
					$tbl = "";
					$tbl = "talents";
					
					$insid = $db->db_insert($tbl,$ins_val);
					
					if($insid > 0)
					{ 
							if($db->check_input($_POST["status"]) == "Y")
							{//status
							$ent_jarea		= $db->check_input($_POST["business"]); 
							$ent_jtype		= $db->check_input($_POST["employ"]);
							$ent_location	= $db->check_input($_POST["location"]);
							$sql_usr = "SELECT `ID`, `company`, `email`, `job_area`, `job_location`, `job_type`, `apply_on` FROM `professional_master` WHERE (job_area = '".$ent_jarea."' and job_type = '".$ent_jtype."' and job_location ='".$ent_location."' and status='Y') or( job_area = 'All Job Area' and job_type = 'All' and job_location ='All' and status='Y')";
							$getuser = $db->getTableArray($sql_usr);
//		echo $db->last_query;
//		echo $db->last_error;
//		die();
//
							if(count($getuser)>0)
							{// if $getuser
							for($e=0;$e<count($getuser);$e++)
							{//for e
								$name = $getuser[$e]['company'];
								$email = $getuser[$e]['email'];
								$user_id =  $db->encode64("PMA:".$getuser[$e]['ID']);
								$link = SITE_URL."talent/".$insid."/".$db->stringToUrlSlug(html_entity_decode($cdesign));
								//$link = "https://www.kidston.ch/talent_details.php?tid=".$insid;
								?>
								<div style="display:none;">
								<?PHP 
								ob_start();	
								include("../../mailer/pro_job_mail.php");
								$message = ob_get_contents();
								ob_end_flush();
								?>
								</div>
								<?PHP	
								$to   = $email;
								//$to   = 'nalini@niyati.com';
								$from = "KIDSTON <customers@kidston.ch>";
								$email_sub = "KIDSTON New Pro Alert!";
								$headers = "From: $from \r\n";
								$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
								$ok = mail($to,$email_sub,$message,$headers);
								
								//echo "From: ".$from."<br>To: ".$to."<br>Subj: ".$email_sub."<br>Message: ".$message."<br>+++<br>";
							
							}//for e
							}//if $getuser
							}//status
							
						die();
						
						
						$resmsg = $db->encode64("13");
						
						$jcode = $insid;
						if($insid < 10)
							$jcode = "00".$insid;
						if($insid < 100 && $insid > 9)
							$jcode = "0".$insid;
						
						
						$ins_val1["talent_code"] = "T-".date("ymd")."-".$jcode;
						$aff_row = $db->update("talents",$ins_val1," ID='$insid' ");	
						
						// update language table
						$tab_lan = "talents_language";
						
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
										$inlang["talent_id"] = $insid;
									if($frm_language != "")	
										$inlang["language"] = $frm_language;
									if($lang_lev != "")	
										$inlang["language_level"] = $lang_lev;
									
									$sql_insert = $db->db_insert($tab_lan,$inlang);
							}
							//echo "<br>".$db->last_query." ".$db->lasat_error." -frm_language_$l = > frm_f_$l";
						}// L for
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
				 	$admin_id = $_SESSION['aid'];
					
					$can_name =  $db->check_input($_POST["can_name"]);
					$cdesign =  $db->check_input($_POST["cdesign"]);
					$know_summ  =  $db->check_input($_POST["know_summ"]);
					
					$loc  = $db->check_input($_POST['location']);
					$bus = $db->check_input($_POST['business']);
					$age  = $db->check_input($_POST['age']);
					$employ = $db->check_input($_POST['employ']);
					$skillz  = $db->check_input_ed($_POST['skillz']);
					
					$summ  = $db->check_input($_POST['summary']);
					$degr = $db->check_input($_POST['degrees']);
					$feduc  = $db->check_input($_POST['feducation']);
					
					$avaliable  = $db->check_input($_POST['availability']);
					$cpname = $db->check_input($_POST['cont_pname']);
					$cemail  = $db->check_input($_POST['cont_email']);
				
				
				$ins_val= array();
					
					$ins_val["cond_name"]	 = $can_name;
					$ins_val["curr_design"]	 = $cdesign;
					if($know_summ!="")
						$ins_val["know_summ"]	 = $know_summ;
					if($loc!="")
						$ins_val["location"]	 = $loc;
					if($bus!="")
						$ins_val["busi_line"]	 = $bus;
					if($age!="")						
						$ins_val["age"]	 = $age;
					if($employ!="")
						$ins_val["employ"] = $employ;
					if($summ!="")						
						$ins_val["summary"]	 = $summ;
					if($degr!="")						
						$ins_val["degrees"]	 = $degr;
					if($feduc!="")								
						$ins_val["feducation"]	 = $feduc;
					if($avaliable!="")		
						$ins_val["available"]	 = $avaliable;
					if($skillz!="")		
						$ins_val["skills"]	 = $skillz;
					$ins_val["cpreson_name"]	 = $cpname;
					$ins_val["cpreson_email"]	 = $cemail;
					$ins_val["create_on"]	 = $curdatetime;
					$ins_val["ip_addr"]	 = $_SERVER['REMOTE_ADDR'];
					$ins_val["admin_id"]	 = $admin_id;
					$ins_val["status"]	 = $db->check_input($_POST["status"]);
		
					$id = $db->check_input($_POST['id']);
					
					
					$aff_row = $db->update("talents",$ins_val," ID='$id' ");
					
						// update language table
						$tab_lan = "talents_language";
						$get_thevalue = $db->check_input($_POST["theValue"]);
						
						$db->delete_sql("delete from talents_language where talent_id='".$id."'");
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
									$inlang["talent_id"] = $id;
							
								if($frm_language != "")	
									$inlang["language"] = $frm_language;
								if($lang_lev != "")	
									$inlang["language_level"] = $lang_lev;
								$sql_insert = $db->db_insert($tab_lan,$inlang);
							}
							
							
							//echo "<br>".$db->last_query." ".$db->lasat_error." -frm_language_$l = > frm_f_$l";
						}// L for
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
		$aff_row = $db->update_sql("update talents set  status ='".$_REQUEST["st"]."' where ID='".$_REQUEST["id"]."'");
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
		$aff_row = $db->update_sql("update talents set status ='D' where ID='".$_REQUEST["id"]."'");
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
	
//echo "Console Log 1 <br>Last Query: ".$db->last_query."<br>***<br>";
//echo "Console Log 2 <br>Last Query: ".$db->last_query."<br>***<br>";
//echo "Console Log 3 <br>ent_jarea: ".$ent_jarea."<br>***<br>";
//echo "Console Log 4 <br>ent_jtype: ".$ent_jtype."<br>***<br>";
//echo "Console Log 5 <br>ent_location: ".$ent_location."<br>***<br>";
//echo "Console Log 1A <br>Last Query: ".$sql_usr."<br>***<br>";
//echo "Console Log 6 <br>link: ".$link."<br>***<br>";

?>
<script language="javascript">window.location = "../home.php?rp=<?PHP echo $_REQUEST["rp"]; ?>&companyid=<?PHP echo $_REQUEST["companyid"]; ?>&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>