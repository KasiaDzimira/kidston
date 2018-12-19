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
		// Code for Save the record...................
		// Code for Save the record...................
			if(isset($_REQUEST["btsave"]) && $_REQUEST["btsave"] == "change")
			{ // 
					$get_id = $db->check_input($_REQUEST["apid"]);
					$get_status = $db->check_input($_REQUEST["st"]);
							
					// Table to be affected
					$tbl = "";
					$tbl = "application_master";
					
					if($get_status == "DELETED")
					{
						$sql_del = $db->fetchSingleRow("SELECT * FROM application_master where ID='$get_id'");	
						
					}
					
					$app = $db->delete_sql("delete FROM application_master where ID='$get_id'");
					if($app > 0)
					{					
						$resmsg = $db->encode64("13");				
					}
					else
					{
						$resmsg = $db->encode64("0");				
					}
			}		
?>
<?PHP if($_REQUEST['src']=="view_can"){?>
<script language="javascript">window.location = "../admin_support/view_candidate_status.php?frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&appstatus=<?PHP echo $_REQUEST[appstatus]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>
<?PHP }else{?>
<script language="javascript">window.location = "../home.php?src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>
<?PHP } ?>