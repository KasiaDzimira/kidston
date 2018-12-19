<?PHP
		session_start();
		
		$sl = "1";
		if($_REQUEST["slang"] == "2")
			$sl = "2";
		
		$_SESSION["slanguage"] = $sl;
		
		header("Location:". $_SERVER['HTTP_REFERER']);
		include("process/progressing-alert.php");		

?>