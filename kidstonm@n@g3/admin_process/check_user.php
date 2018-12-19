<?PHP
Header('Cache-control: private, no-cache');
Header('Expires: Mon, 26 Jun 1997 05:00:00 GMT');
Header('Pragma: no-cache');

			if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
			{
				include("../../inc1ud35/database.mvc.php");
			}
			else
			{
				include("../../inc1ud35/database.mvc.live.php");
			}
	$db = new Database();
	$usname = $_REQUEST['usname'];
	$sql_ch = $db->fetchSingleRow("select * from company_details where username  = '".$usname."'");
	if($sql_ch)
	{
		echo "2";
	}
	else
	{
		echo "1";
	}
?>
	
