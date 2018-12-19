<?PHP
session_start();
	if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "server")
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
	
		if((isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Send"))
		{// submit
			// Save the company details...
				$tbl_1 = "meet_the_candidate";
				$cname = $db->check_input($_REQUEST['cname']);
				$name = $db->check_input($_REQUEST['name']);
				$addr = $db->check_input($_REQUEST['address']);
				$phone = $db->check_input($_REQUEST['phone']);
				$email = $db->check_input($_REQUEST['email']);
				$remarks = $db->check_input($_REQUEST['remarks']);
				$tcode = $db->check_input($_REQUEST['tcode']);
				$to   = $db->check_input($_REQUEST['mailadd']);
				//$to ="nalini@niyati.com";
				$ins_cand["company"] = $cname;	
				$ins_cand["name"] = $name;	
				$ins_cand["address"] = $addr;
				$ins_cand["phone"] = $phone;
				$ins_cand["email"] = $email;	
				$ins_cand["remarks"] = $remarks;
				$ins_cand["tcode"] = $tcode;
				$ins_cand["status"] = "Y";
				$get_id = $db->db_insert($tbl_1,$ins_cand);
				
						$from = $email;
						$sub  = "Request for the talent profile : $tcode";
						?>
						<span style="display: none;">						
						<?PHP 	
							ob_start();
							require_once("../support/talent_mailtemp.php");
							$message = ob_get_contents();
							
							ob_end_flush();
						?>
						</span>
                        <?PHP

						$headers = "From: Kidston <noreply@kidston.ch>\r\n Reply-to: $email \r\n";
						$headers .= "Content-Type: text/HTML; charset=ISO-8859-1\n";
						$ok = mail($to,$sub,$message,$headers);	 
						//$ok = mail("nalini@niyati.com","Test Mail","Please ignore it is a test mail submission",$headers);
						if($ok)
						{
							$resmsg = $db->encode64("13");
				$status = 200;
						}
						
						?>
						<script language="javascript">window.location = "<?PHP echo SITE_URL; ?>view_talent.php?resmsg=<?PHP echo $resmsg; ?>&status=<?PHP echo $status; ?>";</script>
<?PHP
 }// submit
?>
