<?PHP
	session_start();
	if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
			{
				include("../../inc1ud35/database.mvc.php");
			}
			else
			{
				include("../../inc1ud35/database.mvc.live.php");
			}
	$db = new Database();
	
	parse_str($_POST['data']);
		//$sql = "UPDATE tbl_projectdetail SET priority_number = '1'";
		//$db->update_sql($sql);
	
	for ($i = 0; $i < count($list_to_sort); $i++)
	{
		$sql = "UPDATE level_three_master SET priority_no = ($i+1) WHERE ID =". $list_to_sort[$i];
		$db->update_sql($sql);
	}

?>