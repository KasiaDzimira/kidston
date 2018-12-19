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
//	
if(isset($_POST["frm_submit"]) && $_POST["frm_submit"] == "Submit")
{	
		$get_remarks = $db->check_input($_REQUEST["edit_remarks"]);
			
			// Table to be affected
			$tbl1 = "";
			$tbl1 = "application_link";
			$get_id = $_REQUEST["get_id"];
			///echo $get_id;
			
			if($get_remarks != "")
				$ins2["remarks"] = $get_remarks;
			
			$catup = $db->update($tbl1,$ins2," ID=$get_id ");
			if($catup > 0)
			{
				$resmsg = $db->encode64("2");
			}
			else
			{
				$resmsg = $db->encode64("0");
			}
					
			//echo $db->last_query;
}
if(isset($_POST["frm_rmk_submit"]) && $_POST["frm_rmk_submit"] == "Submit")
{
		
		$get_id = $db->check_input($_REQUEST["get_id"]);
		$cid = $db->check_input($_REQUEST["candid_id"]);
		$jid = $db->check_input($_REQUEST["job_id"]);
		$mem = $db->check_input($_REQUEST["mem"]);
		$sts = $db->check_input($_REQUEST["app_sts"]); 
		
		$get_remarks = $db->check_input($_REQUEST["edit_remarks"]);
			
			// Table to be affected
			$tbl1 = "";
			$tbl1 = "application_link";
			
			$ins2["application_id"] = $get_id;
			$ins2["candidate_id"] = $cid;
			$ins2["job_id"] = $jid;
			$ins2["auth_date"] = date("Y-m-d h:i:s");
			$ins2["auth_by"] = $mem;
			$ins2["application_status"] = $sts;
							
			if($get_remarks != "")
				$ins2["remarks"] = $get_remarks;
			
			$catup = $db->db_insert($tbl1,$ins2);
			if($catup > 0)
			{
				$resmsg = $db->encode64("2");
			}
			else
			{
				$resmsg = $db->encode64("0");
			}
			
					
}
?>
<script language="javascript">window.location = "../admin_support/new_remarks.php?alid=<?PHP echo $_REQUEST["aid"]; ?>&rsrc=<?PHP echo $_REQUEST["rsrc"]; ?>";</script>
<!--<script language="javascript">window.location = "../admin_support/edit_remarks.php?id=<?PHP echo $_REQUEST["get_id"]; ?>&alid=<?PHP echo $_REQUEST["aid"]; ?>&src=<?PHP echo $_REQUEST[rsrc]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>-->