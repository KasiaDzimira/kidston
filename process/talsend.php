<?PHP 
Header("Cache-control: private, no-cache");
Header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
Header("Pragma: no-cache");
	session_start();
		if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
		{
			include("../inc1ud35/database.mvc.php");
		}
		else
		{
			include("../inc1ud35/database.mvc.live.php");
		}
						
						$cname = $db->check_input($_REQUEST['cname']);
						$name = $db->check_input($_REQUEST['name']);
						$addr = $db->check_input($_REQUEST['addr']);
						$loc = $db->check_input($_REQUEST['loc']);
						$phone = $db->check_input($_REQUEST['phone']);
						$email = $db->check_input($_REQUEST['email']);
						$tcode = $db->check_input($_REQUEST['tcode']);
						
						$to   = $db->check_input($_REQUEST['mailadd']);	
						$from = $email;
						$sub  = "Request for the talent profile : $tcode";
						$headers = "From: Kidston <noreply@kidston.ch>\r\n Reply-to: $from \r\n";
						$headers .= "Cc: $cc \r\n";
						$headers .= "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
						//echo $headers."<br>".$sub;
						?>
						<span style="display: none;">						
						<?PHP 	
							ob_start();
							require_once("../support/talent_mailtemp.php");
							$message = ob_get_contents();
							ob_end_flush();
						?>
		</span>
<!--								<style>
.success
{
color:#006633;
font-size:14px;
font-weight:bold;
border:#006633 1px solid;
padding:5px;
}
</style>
<div align="center" class="success"><< Please wait while your request is being processed. Do not Refresh or Close the window.. >></div>
-->						<?PHP	
						// echo $message;					
						$ok = mail($to,$sub,$message,$headers);	 
						$resmsg = $db->encode64("13"); 
						if($ok)
						{
							echo "###^^###1";
						}
						else
						{
							echo "###^^###2";
						}
?>