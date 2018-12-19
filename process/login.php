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
						
			$table='company_details';
			$uname = $db->check_login_input($_GET["uname"]);
			$pass  = md5($db->check_login_input($_GET["pass"]));
			$log_checker['username']=$uname;
			$log_checker['password']=$pass;
			$log_checker['status'] = 'Y';
			$log_chk = $db->fetchSingleRowParam($table,$log_checker,'');
		if($log_chk)
		{ //logchk
				$adminID = $log_chk["ID"];
				$_SESSION["lid"] = $log_chk["ID"];
				$_SESSION['username'] = $log_chk['username'];
				$_SESSION['cname'] = $log_chk['comp_name'];
				echo SITE_URL.$db->stringToUrlSlug($_SESSION['cname']);
				echo "###^^###1";	
		}else
		{
				if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					echo "###^^###2";
				if($_SESSION["slanguage"] == "2")
					echo "###^^###3";
		} //logchk
?>