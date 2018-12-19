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
	if($_POST["subject"] != "" || $_POST["message"] != "")
	{
?>
<script language="javascript">window.close();</script>
<?PHP		
		die('Process done');
	}
	
		
	// submit check
	if((isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Submit" && $_POST["subject"] == "" && $_POST["message"] == "") || (isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Senden" && $_POST["subject"] == "" && $_POST["message"] == ""))
	{//
		$dd = date("Y-m-d H:i:s");
		// Check if the company already exist...
		
		// Save the company details...		
		$comp_id = $db->check_input($_POST['cid']);
		if($comp_id > 0 || $comp_id!="")
		{// comp_id
			
			$tbl_2 = "job_details";
			$ins_job = array();
	
			$date  = $db->check_input($_POST['ivdate']);
			$month = $db->check_input($_POST['ivmonth']);
			$year  = $db->check_input($_POST['ivyear']);
			
			
			$apply_date = $year."-".$month."-".$date; 
			
			
			$ins_job["org_id"] = $comp_id;
			if($db->pinput("job_title") != "")
				$ins_job["job_title"] = $db->pinput("job_title");
			if($db->pinput("job_type") != "")
				$ins_job["job_type"] = $db->pinput("job_type");
			if($db->pinput("job_duration") != "")
				$ins_job["job_duration"] = $db->pinput("job_duration");
			if($db->pinput("job_brief") != "")
				$ins_job["job_brief"] = $db->pinput("job_brief");
			if($db->pinput("frm_detail_desc") != "")
				$ins_job["job_desc"] = $db->pinput("frm_detail_desc");
			if($db->pinput("frm_add_com") != "")
				$ins_job["add_com"] = $db->pinput("frm_add_com");
			
			if($db->pinput("frm_salary") != "")
				$ins_job["job_salary"] = $db->pinput("frm_salary");
			
				$ins_job["job_atype"] = "Requested";
				
			if($db->pinput("responsibility") != "")
				$ins_job["job_response"] = $db->pinput("responsibility");
			if($db->pinput("skillz") != "")
				$ins_job["job_skillz"] = $db->pinput("skillz");
			if($db->pinput("job_location") != "")
				$ins_job["location"] = $db->pinput("job_location");
			if($db->pinput("res_pname") != "")
				$ins_job["cont_pname"] = $db->pinput("res_pname");
			if($db->pinput("cont_email") != "")
				$ins_job["cont_pemail"] = $db->pinput("cont_email");
			if($db->pinput("ivdate") != "")
				$ins_job["apply_date"] = $apply_date;
			if($db->pinput("job_asap") != "")
				$ins_job["job_asap"] = $db->pinput("job_asap");
	
				
				$ins_job["create_on"] = $dd;
				$ins_job["postedon"] = $dd;				
				$ins_job["created_ip"] = $_SERVER['REMOTE_ADDR'];
			
			// Execute query
			$job_id = $db->db_insert($tbl_2,$ins_job);
		//echo $db->last_error."<br>".$db->last_query;
				// check job saved?..
				if($job_id > 0)
				{// job_id
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							$resmsg = $db->encode64("17");
						}
					if($_SESSION["slanguage"] == "2")
						{	
							$resmsg = $db->encode64("13");
						}
					// Dynamic Job code creation..
					$jcode = $job_id;
					if($job_id < 10)
						$jcode = "00".$job_id;
					if($job_id < 100 && $job_id > 9)
						$jcode = "0".$job_id;
					
					$djobcode = "K-".date("ymd")."-".$jcode;
					$ins_val1["job_code"] = $djobcode;
					$aff_row = $db->update("job_details",$ins_val1," ID='$job_id' ");	
					
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
									$inlang["job_id"] = $job_id;
								if($frm_language != "")	
									$inlang["language"] = $frm_language;
								if($lang_lev != "")	
									$inlang["language_level"] = $lang_lev;
								
								$sql_insert = $db->db_insert($tab_lan,$inlang);
						}
						//echo "<br>".$db->last_query." ".$db->lasat_error." -frm_language_$l = > frm_f_$l";
					}// L for
					
				}// job_id
			
			
		}// comp_id
		
		
	}//
	
?>
<script language="javascript">window.location = "../../post-job_log.php?src=<?PHP echo $_REQUEST[src]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>