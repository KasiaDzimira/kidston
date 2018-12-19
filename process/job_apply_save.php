<?PHP
session_start();
	if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
	{
		include("../inc1ud35/database.mvc.php");
	}
	else
	{
		include("../inc1ud35/database.mvc.live.php");
	}
	
	include("progressing-alert.php");
		// initialize error message
	$resmsg = $db->encode64("0");
		// Code for Save the record...................
	
	// Spam filter	
	if($_POST["subject"] != "" || $_POST["message"] != "" || !isset($_POST["subject"]) || !isset($_POST["message"]))
	{
?>
<script language="javascript">window.close();</script>
<?PHP		
		die('Process done');
	} 
	
		if((isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Submit") || (isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Bewerben"))
		{// submit
			$dd = date("Y-m-d H:i:s");
			// Save the company details...
			$tbl_1 = "candidate_master";
			$ins_cand = array();
			
			if($db->pinput(r1)=="Male")
			{
				$sex="M";
			}
			else
			{
				$sex="F";
			}
			
			if($_POST['wlteam'] == "Y")
			{
				$ins_cand["wlteam"] = $db->pinput("wlteam");
			}
			$ins_cand["name"] = $db->pinput("name");
			if($_POST["lname"] != "")
				$ins_cand["lastname"] = $db->pinput("lname");
			$ins_cand["sex"] = $sex;
			$ins_cand["qualification"] = $db->pinput("qualification");	
			
			if($db->pinput("dob") != "")
				$ins_cand["dob"] = $db->pinput("dob");	
			$ins_cand["address"] = $db->pinput("address");	
			$ins_cand["state"] = $db->pinput("stateSelect");	
			$ins_cand["country"] = $db->pinput("countrySelect");
			//if($db->pinput("pincode") != "")	
				//$ins_cand["postalcode"] = $db->pinput("pincode");	
			if($db->pinput("frm_reference") != "")
			{	
				$ins_cand["reference"] = $db->pinput("frm_reference");	
			}
			else
			{	
				$ins_cand["reference_name"] = $db->pinput("frm_reference_name");
				$ins_cand["reference_email"] = $db->pinput("frm_reference_email");	
			}	
			$ins_cand["contact_number"] = $db->pinput("cont_no");	
			$ins_cand["email"] = $db->pinput("cont_pemail");	
			$ins_cand["applied_date"] = $dd;
			$ins_cand["applied_ip"] = $_SERVER['REMOTE_ADDR'];
			
			$get_id = $db->db_insert($tbl_1,$ins_cand);
			
			if($get_id > 0)
			{
				if(basename($_FILES['upfile']['name']) != "")
				{// file
					$uploadPath = '../uploads/candidate/';
					$fname = basename($_FILES['upfile']['name']);
					$llen = strlen(basename($_FILES['upfile']['name']));
					$lpos = strpos(basename($_FILES['upfile']['name']),".");
					$lfname = substr(basename($_FILES['upfile']['name']),$lpos+1,4);
					$strg = strtoupper($lfname);

					if (($strg == "jpg" || $strg == "JPG" || $strg == "jpeg" || $strg == "JPEG" || $strg == "pdf" || $strg == "PDF" || $strg == "DOC" || $strg == "doc"|| $strg == "DOCX"|| $strg == "docx")) 
					{// file type
						 $save_name = "cms_".date("jmYhis").rand(991,9999);
						 $filepath = $uploadPath."$save_name".".".$strg;
						$ok = move_uploaded_file($_FILES['upfile']['tmp_name'],$filepath);
						$res["resume"] = "$save_name".".".$strg;
					}// file type
				}// file
				
			if(basename($_FILES['upfile2']['name']) != "")
				{// file
					$uploadPath = '../uploads/candidate/';
					$fname = basename($_FILES['upfile2']['name']);
					$llen = strlen(basename($_FILES['upfile2']['name']));
					$lpos = strpos(basename($_FILES['upfile2']['name']),".");
					$lfname = substr(basename($_FILES['upfile2']['name']),$lpos+1,4);
					$strg = strtoupper($lfname);
					
					if (($strg == "jpg" || $strg == "JPG" || $strg == "jpeg" || $strg == "JPEG" || $strg == "pdf" || $strg == "PDF" || $strg == "DOC" || $strg == "doc"|| $strg == "DOCX"|| $strg == "docx")) 
					{// file type
						 $save_name = "cms_".date("jmYhis").rand(991,9999);
						 $filepath = $uploadPath."$save_name".".".$strg;
						$ok = move_uploaded_file($_FILES['upfile2']['tmp_name'],$filepath);
						$res["resume2"] = "$save_name".".".$strg;
					}// file type
				}// file
				
				if(basename($_FILES['upfile3']['name']) != "")
				{// file
					$uploadPath = '../uploads/candidate/';
					$fname = basename($_FILES['upfile3']['name']);
					$llen = strlen(basename($_FILES['upfile3']['name']));
					$lpos = strpos(basename($_FILES['upfile3']['name']),".");
					$lfname = substr(basename($_FILES['upfile3']['name']),$lpos+1,4);
					$strg = strtoupper($lfname);
					
					if (($strg == "jpg" || $strg == "JPG" || $strg == "jpeg" || $strg == "JPEG" || $strg == "pdf" || $strg == "PDF" || $strg == "DOC" || $strg == "doc"|| $strg == "DOCX"|| $strg == "docx")) 
					{// file type
						 $save_name = "cms_".date("jmYhis").rand(991,9999);
						 $filepath = $uploadPath."$save_name".".".$strg;
						$ok = move_uploaded_file($_FILES['upfile3']['tmp_name'],$filepath);
						$res["resume3"] = "$save_name".".".$strg;
					
					}// file type
				}// file
				
				
				//$res["candidate_id"] = $db->pinput("job_id");	
				$res["candidate_id"] = $get_id;	
				//$res["job_id"] = $get_id;	
				
				if($_POST['wlteam'] == "Y")
				{
					$res["job_id"] =  0;
				}else{
					$res["job_id"] =  $db->pinput("job_id");
				}
				$res["applied_date"] = $dd;
				$res["applied_ip"] = $_SERVER['REMOTE_ADDR'];
				$res["application_status"] = "APPLIED";  	
				$res["status"] = "Y";  	
				$db->db_insert('application_master',$res);
				if($_POST['wlteam'] == "Y")
				{
					$ato = "recruiting@kidston.ch";
					$aemail_sub = "New talent is available";
				
			?>
						<div style="display:none;">
						<?PHP 
							ob_start();	
								include("../mailer/new_talent_mailer.php");
								$amessage = ob_get_contents();
							ob_end_flush();
						 ?>
						</div>
						<?PHP
							$aheaders  = "From: <info@kidston.ch> \r\n";
							$aheaders .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							$aok = mail($ato,$aemail_sub,$amessage,$aheaders);
				
				}
				
				if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
				{
					$resmsg = $db->encode64("17");
				}
				if($_SESSION["slanguage"] == "2")
				{
					$resmsg = $db->encode64("13");
				}		
			}
			else
			{
				$resmsg = $db->encode64("0");
			} 
			
			// update language table
				
				
					$tab_lan = "candidate_language";
					
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
									$inlang["job_id"] = $db->pinput("job_id");
								if($frm_language != "")
									$inlang["candidate_id"] = $get_id;
								if($frm_language != "")	
									$inlang["language"] = $frm_language;
								if($lang_lev != "")	
									$inlang["language_level"] = $lang_lev;
								
								$sql_insert = $db->db_insert($tab_lan,$inlang);
								//echo "<br>".$db->last_query." ".$db->last_error;
						}
						
					}// L for
					
			$val = $db->encode64($_REQUEST['job_id']);
			$cid = $db->encode64($get_id);
			
			$ref_name = $db->pinput("frm_reference_name");
			$ref_email = $db->pinput("frm_reference_email");
			$fname = $db->pinput("name");
			$lname = $db->pinput("lname");
			$sql_job_ref = $db->fetchSingleRow("select * from job_details where ID = ".$res["job_id"]);
			$sql_job_title = $sql_job_ref["job_title"];
			$sql_job_code = $sql_job_ref["job_code"];
			if($ref_email != "")
			{
					$to = $ref_email;
					$email_sub = "Reward request - Employee Referal from Kidston.ch";
				
			?>
						<div style="display:none;">
						<?PHP 
							ob_start();	
								include("../mailer/job_reference_mailer.php");
								$message = ob_get_contents();
							ob_end_flush();
						 ?>
						</div>
						<?PHP
							$headers  = "From: <info@kidston.ch> \r\n";
							$headers .= "Content-Type: text/HTML; charset=ISO-8859-1\n";
							$ok = mail($to,$email_sub,$message,$headers);
							
						//	echo "To".$to."<br>";
						// echo $email_sub."<br>";
						// echo "Headers".$headers."<br>";
				}
			
			
?>
<script language="javascript">window.location = "<?PHP echo SITE_URL; ?>view-latest-openings.php?resmsg=<?PHP echo $resmsg; ?>";</script>
<?PHP
 }// submit
?>
