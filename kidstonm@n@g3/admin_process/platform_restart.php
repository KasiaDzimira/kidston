<?PHP
		session_start();
		include("progressing-alert.php");
		if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
		{
			include("../../inc1ud35/database.mvc.php");
		}
		else
		{
			include("../../inc1ud35/database.mvc.live.php");
		}
		$db = new Database();
		$msg = "0";
		
		if(isset($_REQUEST['act']) && $_REQUEST['act'] == "restart")
		{
			$tble = "platform_restart_flag";
			$ins_val["restarted_date_time"] = date("Y-m-d H:i:s");
			$ins_val["ip"] = $_SERVER['REMOTE_ADDR'];
			$ins_val["brwsr"] = $_SERVER['HTTP_USER_AGENT'];
			$ins_val["admin_id"] = $_SESSION["aid"];
			
			
			$aff_row = $db->db_insert($tble,$ins_val);
			$lastid = mysql_insert_id();
			
			if($aff_row > 0)
			{
				$ins_restart["platform_count_restart"] = "Y";
				$ins_restart["restart_id"] = $lastid;
				$db->update('application_master',$ins_restart, "platform_count_restart = 'N'");
				$msg = "1";
			}
			
			
		}
?>		
<script language="javascript">window.location='../home.php?src=view-platform&msg=<?PHP echo $msg; ?>&ref=<?PHP echo $lastid; ?>';</script>
