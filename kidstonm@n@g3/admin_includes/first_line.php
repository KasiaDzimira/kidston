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

?>

