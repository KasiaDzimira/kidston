<?PHP
		session_start();
		
		//include("../../inc1ud35/database.mvc.php");
			if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
			{
				include("../../inc1ud35/database.mvc.php");
			}
			else
			{
				include("../../inc1ud35/database.mvc.live.php");
			}
			$db = new Database();
	
		if($_REQUEST["action"] == "cmsdelete")
		{
		
			
			$cmaster = $db->fetchSingleRow("select * from cms_master where ID=".$_REQUEST["cmsid"]);
			if($cmaster)
			{
				if($_REQUEST["mlevel"] == "1")
				{
					$sqlsel = $db->getTableArray("select * from cms_master where FL_ID=".$cmaster["FL_ID"]);
					for($i=0;$i<count($sqlsel);$i++)
					{
						if(file_exists("../../".$sqlsel[$i]["top_image0"]) && $sqlsel[$i]["top_image0"] != "")
						{
							unlink("../../".$sqlsel[$i]["top_image0"]);
							//echo "***".$sqlsel[$i]["top_image"]."****";
						}
					}
					$db->mysqlQuery("delete from level_one_master where ID=".$cmaster["FL_ID"]);
					$db->mysqlQuery("delete from level_two_master where SID=".$cmaster["FL_ID"]);
					$db->mysqlQuery("delete from level_three_master where SID=".$cmaster["FL_ID"]);
					$db->mysqlQuery("delete from cms_master where FL_ID=".$cmaster["FL_ID"]);
				}
				
				
				if($_REQUEST["mlevel"] == "2")
				{
					$sqlsel = $db->getTableArray("select * from cms_master where SL_ID=".$cmaster["SL_ID"]);
					for($i=0;$i<count($sqlsel);$i++)
					{
						if(file_exists("../../".$sqlsel[$i]["top_image1"]) && $sqlsel[$i]["top_image1"] != "")
						{
							unlink("../../".$sqlsel[$i]["top_image1"]);
						}
					}
					$db->mysqlQuery("delete from level_three_master where SSID=".$cmaster["SL_ID"]);
					$db->mysqlQuery("delete from level_two_master where ID=".$cmaster["SL_ID"]);
					$db->mysqlQuery("delete from cms_master where SL_ID=".$cmaster["SL_ID"]);
				}
				
				if($_REQUEST["mlevel"] == "3")
				{
					$sqlsel = $db->getTableArray("select * from cms_master where TL_ID=".$cmaster["TL_ID"]);
					for($i=0;$i<count($sqlsel);$i++)
					{	
						//echo $sqlsel[$i]["top_image"]."<br>";
						if(file_exists("../../".$sqlsel[$i]["top_image2"]) && $sqlsel[$i]["top_image2"] != "")
						{
							unlink("../../".$sqlsel[$i]["top_image2"]);
						}
					}
					$db->mysqlQuery("delete from level_three_master where ID=".$cmaster["TL_ID"]);
					$db->mysqlQuery("delete from cms_master where TL_ID=".$cmaster["TL_ID"]);
				}
				
			}
			
			//echo "delete from cms_master_history where ID=".$_REQUEST["hid"];
			//echo $db->last_error;
			$resmsg = "cmsremoved";
		}
		
?>
<script language="javascript">
window.location = "../home.php?src=msg&resmsg=<?PHP echo $resmsg; ?>";
</script>