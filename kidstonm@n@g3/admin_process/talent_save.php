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
	// Code for status change..........
	if($_REQUEST["act"] == "st")
	{// st
		
		$aff_row = $db->update_sql("update candidate_master set guest_flag ='".$_REQUEST["st"]."' where ID='".$_REQUEST["id"]."'");
		
					if($aff_row > 0)
					{ 
						$resmsg = $db->encode64("13");				
					}
					else
					{
						$resmsg = $db->encode64("0");				
					}
	}// st	

?>
<script language="javascript">window.location = "../home.php?rp=<?PHP echo $_REQUEST["rp"]; ?>&companyid=<?PHP echo $_REQUEST["companyid"]; ?>&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>