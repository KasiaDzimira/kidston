<?PHP
	session_start();
	if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "sundar")
	{
		include("../inc1ud35/database.mvc.php");
	}else{
		include("../inc1ud35/database.mvc.live.php");
	}
	include("progressing-alert.php");
	$resmsg = $db->encode64("0");
	if($_POST["subject"] != "" || $_POST["message"] != "" || !isset($_POST["subject"]) || !isset($_POST["message"]) )
	{
?>
<script language="javascript">window.close();</script>
<?PHP		
		die('Process done');
	}
	// submit check

	if((isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Submit" && $db->pinput("com_name") != "" && $_POST["subject"] == "" && $_POST["message"] == ""))
	{//
	//echo "Am Here<br>";
		$dd = date("Y-m-d H:i:s");
		$tbl_1 = "company_details";
		$ins_comp = array();
		if($db->pinput("com_name") != "")
			$ins_comp["comp_name"] = $db->pinput("com_name");
		if($db->pinput("countrySelect") != "")
			$ins_comp["country"] = $db->pinput("countrySelect");
		if($db->pinput("cont_pname") != "")
			$ins_comp["cont_name"] = $db->pinput("cont_pname");
		if($db->pinput("cont_pdesign") != "")
			$ins_comp["cont_designation"] = $db->pinput("cont_pdesign");
		if($db->pinput("cont_pemail") != "")
			$ins_comp["cont_email"] = $db->pinput("cont_pemail");
		if($db->pinput("cont_phone") != "")
			$ins_comp["cont_phone"] = $db->pinput("cont_phone");
		if($db->pinput("remarks") != "")
			$ins_comp["remarks"] = $db->pinput("remarks");
		if($db->pinput("address1") != "")
			$ins_comp["address1"] = $db->pinput("address1");
			$ins_comp["create_on"] = $dd;
			$ins_comp["created_ip"] = $_SERVER['REMOTE_ADDR'];
			$ins_comp["status"] = "N";
			
				if(basename($_FILES['upfile']['name']) != "")
				{// file
					$uploadPath = '../uploads/company/';
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
						$ins_comp["j_desc"] = "$save_name".".".$strg;
					}// file type
				}// file
			
			
		$comp_id = $db->db_insert($tbl_1,$ins_comp);
	//echo "Error: ".$db->last_error."<br>Query: ".$db->last_query."<br>***<br>";
	//die();
		
						$ato = "customers@kidston.ch";
						//$ato = "nalini@niyati.com";
						$aemail_sub = "New Advertising Job Vacancies";
					?>
					<div style="display:none;">
						<?PHP 
                        ob_start();	
                        include("../mailer/new_job_vacancies_mailer.php");
                        $amessage = ob_get_contents();
                        ob_end_flush();
                        ?>
					</div>
               <?PHP     
                    if(basename($_FILES["upfile"]["name"]) != "")
					  { 
						$fileatt      = $_FILES['upfile']['tmp_name'];
						$fileatt_type = $_FILES['upfile']['type'];
						$fileatt_name = $_FILES['upfile']['name'];
						
						$file_size = filesize($filepath);
						
						$file = fopen($filepath, "r");
						$data = fread($file, $file_size);
						fclose($file);
						
						$content = chunk_split(base64_encode($data));
						$uid = md5(uniqid(time()));
						
						$aheaders = "From: <info@kidston.ch> \r\n";
						$aheaders .= "cc: $cc \r\n";
						//   $header .= "Reply-To: ".$replyto."\r\n";
						$aheaders .= "MIME-Version: 1.0\r\n";
						$aheaders .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
						$aheaders .= "This is a multi-part message in MIME format.\r\n";
						$aheaders .= "--".$uid."\r\n";
						$aheaders .= "Content-type:text/html; charset=iso-8859-1\r\n";
						$aheaders .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
						$aheaders .= $amessage."\r\n\r\n";
						$aheaders .= "--".$uid."\r\n";
						$aheaders .= "Content-Type: application/octet-stream; name=\"".$fileatt_name."\"\r\n"; // use diff. tyoes here
						$aheaders .= "Content-Transfer-Encoding: base64\r\n";
						$aheaders .= "Content-Disposition: attachment; filename=\"".$fileatt_name."\"\r\n\r\n";
						$aheaders .= $content."\r\n\r\n";
						$aheaders .= "--".$uid."--";
					
					}
					else
					{
						$aheaders = "From: <info@kidston.ch> \r\n";
						$aheaders .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
					}
							
                  ?>  
                    
					<?PHP
					//	$aheaders  = "From: info@kidston.ch \r\n";
					//	$aheaders .= "Content-Type: text/HTML; charset=ISO-8859-1\n";
						$aok = mail($ato,$aemail_sub,$amessage,$aheaders);
						$status = 200;


		if($comp_id > 0)
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
			if($db->pinput("job_business") != "")
				$ins_job["job_business"] = $db->pinput("job_business");	
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

		//	echo $db->last_error."<br>".$db->last_query;

				// check job saved?..

				if($job_id > 0)

				{// job_id

				$resmsg = $db->encode64("13");
					

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

					//	echo "<br>".$db->last_query." ".$db->lasat_error." -frm_language_$l = > frm_f_$l";

					}// L for

					

				}// job_id

			

			

		}// comp_id



	}//

	

?>

<script language="javascript">window.location = "<?PHP echo SITE_URL;?>post-job.php?resmsg=<?PHP echo $resmsg; ?>&status=<?PHP echo $status;?>";</script>