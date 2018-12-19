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

			if(isset($_REQUEST["btsave"]) && $_REQUEST["btsave"] == "change")

			{ // 

					$ins_val= array();

					

					$get_id = $db->check_input($_REQUEST["apid"]);

					$get_status = $db->check_input($_REQUEST["st"]);

					$check_st = $db->check_input($_REQUEST["chk_st"]);

					if($check_st == "Y")

					{

						$tin_val["mail_status"] = $check_st;

						$db->update("application_master",$tin_val," ID = '$get_id'");

					}	

				

					if($get_status != "")

						$ins_val["application_status"]	= $get_status;

					

					// Table to be affected

					$tbl = "";

					$tbl = "application_master";

					

					$aff_row = $db->update($tbl,$ins_val," ID = '$get_id' ");

					

					//echo $db->last_query;

					

					if($aff_row > 0)

					{ 

						$get_remarks = $db->check_input($_REQUEST["remarks"]);

						

						// Table to be affected

						$tbl1 = "";

						$tbl1 = "application_link";

						

						$app = $db->fetchSingleRow("SELECT * FROM application_master where ID='$get_id'");

						

						$ins2["application_id"] = $get_id;

						$ins2["job_id"] = $app["job_id"];

						$ins2["candidate_id"] = $app["candidate_id"];

						if($get_remarks != "")

							$ins2["remarks"] = $get_remarks;

						

						$ctime = date("Y-m-d H:i:s");

						

						$ins2["auth_date"] = $ctime;

						$ins2["auth_by"] = $_SESSION['aid'];

						$ins2["application_status"] = $get_status;

						$db->db_insert($tbl1,$ins2);

						//echo $db->last_error." ".$db->last_query;

						

						// Sending the email to the candidate...

						$email_sub = "";

						$email_head = "";

						$email_body = "";

						$email_regards = "";

						

						// candidate details...

						$can_master = $db->fetchSingleRow("select name,email from candidate_master where ID='".$app["candidate_id"]."'");

						// Job details...

						$job_master = $db->fetchSingleRow("select job_code,job_title from job_title where ID='".$app["job_id"]."'");

						

						if($job_master)

							$email_body = "This is with reference to your application for the vacancy – ".$job_master["job_code"]." ".$job_master["job_title"];

						

							

						if($get_status == "REJECTED")

						{

							$email_sub = $app["job_id"]." Job Application Status";

							$email_body .= $_REQUEST["temp_reason"];

						}

						if($get_status == "QUALIFIED")

						{

							$email_sub = $app["job_id"]." Job Application - Qualified";

							$email_body .= "We are happy to inform you that your application has been Qualified, and we will be in touch with you shortly to update you on the progress.";

						}else

						{

							$up_val["guest_flag"] = "N";

							$canid = $app["candidate_id"];

							$db->update("candidate_master",$up_val," ID = '$canid' ");

						}

						if($get_status == "INVITED")

						{

							$email_sub = $app["job_id"]." Job Application - Call for Interview";

							$email_body .= "We are happy to inform you that you have been invited for attending the Interview.

";

						}

	

						if($get_status == "REJECTED")

						{// Rejected Mail

							

							if($app["mail_status"] != 'Y')

							{

						?>

						<div style="display:block;">

						<?PHP 

							ob_start();	

								include("../../mailer/temp.php");

								$message = ob_get_contents();

							ob_end_flush();

						 ?>

						</div>

						<?PHP

							$to   = $can_master["email"];

							$from = "KIDSTON <info@kidston.ch>";

							$headers = "From: $from \r\n";

							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

							$ok = mail($to,$email_sub,$message,$headers);

							

							}

						}// Rejected Mail

						

					//echo "<br>".$db->last_error;

						$resmsg = $db->encode64("13");				

					}

					else

					{

						$resmsg = $db->encode64("0");				

					}

					

			} // 		

?>

<?PHP if($_REQUEST['src']=="view_can"){?>

<script language="javascript">window.location = "../admin_support/view_candidate_status.php?frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>

<?PHP }else{?>

<script language="javascript">window.location = "../home.php?src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>

<?PHP } ?>