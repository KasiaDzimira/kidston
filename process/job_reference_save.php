<?PHP
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
	if($_POST["message"] != "" || !isset($_POST["message"]))
	{
?>
<script language="javascript">window.close();</script>
<?PHP		
		die('Process done');
	} 
	
		if((isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Submit") || (isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Senden"))
		{// submit
			$dd = date("Y-m-d H:i:s");
			// Save the company details...
			$ins_cand = array();
			
			$name = $db->pinput("name");
			$lname = $db->pinput("lname");
			$address = $db->pinput("address");	
			$state = $db->pinput("stateSelect");	
			$country = $db->pinput("countrySelect");
			$email = $db->pinput("cont_pemail");	
			$contactno =  $db->pinput("cont_no");
			$bankinfo =  $db->pinput("bank_details");
					
			$val = $_REQUEST['job_id'];
			$cid = $_REQUEST['candid_id'];
			$sql_candid = $db->fetchSingleRow("select * from candidate_master where ID =".$cid );
			$sql_code = $db->fetchSingleRow("select * from job_details where ID =".$val);
			
			$job_code = $sql_code["job_code"];	
			$job_title = $sql_code["job_title"];		
			$candid_name = $sql_candid["name"];		
			$candid_lname = $sql_candid["lastname"];
			
				$from = $email;
				$to = "info@kidston.ch";
				//$to = "nalini@niyati.com";
				$email_sub = "Job Referals-Reward request";
			?>
						<div style="display:none;">
						<?PHP 
							ob_start();	
								include("../mailer/admin_reference_mailer.php");
								$message = ob_get_contents();
							ob_end_flush();
						 ?>
						</div>
						<?PHP
							$headers = "From: Kidston <noreply@kidston.ch>\r\n Reply-to: $from \r\n"; 
							$headers .= "Content-Type: text/HTML; charset=ISO-8859-1\n";
							$ok = mail($to,$email_sub,$message,$headers);
							if($ok)
							{	
								$resmsg = $db->encode64("1");
							}
							else
							{
								$resmsg = $db->encode64("0");
							}		
?>
<script language="javascript">window.location = "<?PHP echo SITE_URL; ?>thanks.php";</script>
<?PHP
 }// submit
?>
