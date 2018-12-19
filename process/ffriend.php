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
						
						$uname = $_REQUEST['uname1'];
						$fname = $_REQUEST['fname1'];	
					
						$url_test = $_REQUEST['url_frd'];
						
						$sqljob = $db->fetchSingleRow("select ID,job_title,job_atype from job_details where ID='$url_test'");
						$linkjob = SITE_URL;
						if($sqljob)
						{
							if($sqljob["job_atype"] == "Intern")
							{
								$linkjob .= "intern/".$sqljob["ID"]."/".$db->stringToUrlSlug($sqljob["job_title"]);
							}else
							{
								$linkjob .= "job/".$sqljob["ID"]."/".$db->stringToUrlSlug($sqljob["job_title"]);
							}
						
						
								    $to   = $_REQUEST["fmail1"];
									$from = $_REQUEST["umail1"];
									$sub  = "Your friend $uname has forwarded you a message and link";
									$headers = "From: Kidston <noreply@kidston.ch>\r\n Reply-to: $from \r\n";
									//$headers .= "Cc: $cc \r\n";
									//$headers .= "MIME-Version: 1.0" . "\r\n";
									//$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									?>
				   <span style="display:none;">						
									<?PHP 	
										ob_start();
										require_once("../support/ffmailtemp.php");
										$message = ob_get_contents();
										ob_end_flush();
									?>
					</span>
						<?PHP	
						//echo $message;					
								$ok = mail($to,$sub,$message,$headers);	 
								$resmsg = $db->encode64("13"); 
								if($ok)
								{
									if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										echo "###^^###1";
									if($_SESSION["slanguage"] == "2")
										echo "###^^###2";	
								}
								else
								{
									echo "###^^###3";
								}
						}
?>