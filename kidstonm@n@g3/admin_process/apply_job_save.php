<?PHP
session_start();
	if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
	{
		include("../../inc1ud35/database.mvc.php");
	}
	else
	{
		include("../../inc1ud35/database.mvc.php");
	}
	
	include("progressing-alert.php");
		// initialize error message
	$resmsg = $db->encode64("0");
		// Code for Save the record...................
	
	// Spam filter	
	
		if(isset($_POST["frm_submit"]) && $db->pinput("frm_submit") == "Apply")
		{// submit
		
			$job_code = $db->pinput("frm_job_code");
			$dd = date("Y-m-d H:i:s");
		
						
			$sql_apply = $db->fetchSingleRow("select * from job_details where job_code='".$job_code."' and status = 'Y'");
			$sql_dup_chk = $db->fetchSingleRow("select * from application_master where job_id=".$sql_apply["ID"]." and candidate_id = ".$db->pinput("candid_id"));	
			if($sql_dup_chk)
			{
				$resmsg = $db->encode64("15");
			?>
			<script language="javascript">window.location = "../home.php?src=<?PHP echo $_REQUEST[src]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>			
			<?PHP
			die('process completed');
			}
			else
			//if($sql_apply)
			{ // apply the details...
			$tbl_1 = "application_master";
			$ins_cand = array();
		
			$ins_cand["job_id"] = $sql_apply["ID"];
			$ins_cand["candidate_id"] = $db->pinput("candid_id");	
			$ins_cand["applied_date"] = $dd;
			$ins_cand["applied_ip"] = $_SERVER['REMOTE_ADDR'];
			$ins_cand["application_status"] = "APPLIED";  	
			
				$get_id = $db->db_insert($tbl_1,$ins_cand);
				if($get_id > 0)
				{
					$resmsg = $db->encode64("1");
				
					$sql_apply = $db->fetchSingleRow("select * from application_master where candidate_id = ".$db->pinput("candid_id"));
					
					$up_val["resume"] = $sql_apply["resume"];
					$up_val["resume2"] = $sql_apply["resume2"];
					$up_val["resume3"] = $sql_apply["resume3"];
					$db->update("application_master",$up_val," ID = '$get_id' ");				
				}
				else
				{
					$resmsg = $db->encode64("0");				
				}
				
			
			}// apply the details...	
			
			
?>
<script language="javascript">window.location = "../home.php?src=<?PHP echo $_REQUEST[src]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>
<?PHP
 }// submit
?>
