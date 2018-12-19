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
	include("progressing-alert.php");
		// initialize error message
	$resmsg = $db->encode64("0");
	if($_REQUEST["act"] == "edit")
	{
			$get_remarks = $db->check_input($_REQUEST["remarks"]);
			
			// Table to be affected
			$tbl1 = "";
			$tbl1 = "application_link";
			$get_id = $_REQUEST["alid"];
			///echo $get_id;
			
			if($get_remarks != "")
				$ins2["remarks"] = $get_remarks;
			
/*			$ctime = date("Y-m-d H:i:s");
			
			$ins2["auth_date"] = $ctime;
			$ins2["auth_by"] = $_SESSION['aid'];
			$ins2["application_status"] = $get_status;
*/			$db->update($tbl1,$ins2," ID=$get_id ");
	}
?>
<script language="javascript">window.location = "../home.php?src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>