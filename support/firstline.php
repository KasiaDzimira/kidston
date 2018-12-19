<?PHP
		session_start();
		if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "sundar")
		{
			include("inc1ud35/database.mvc.php");
		}
		else
		{
			include("inc1ud35/database.mvc.live.php");
		}
		
		if(!isset($_SESSION["slanguage"]))
			$_SESSION["slanguage"] = "1";
		//else
			//$_SESSION["slanguage"] = $_REQUEST["sflag"];
	
			//$_SESSION["slanguage"] = "1";
?>