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
if(isset($_POST["frm_submit"]) && $_POST["frm_submit"] == "Submit")
{
	$get_language = $db->check_input($_POST["language_title"]);

 		$sql_duplication_chk = $db->fetchSingleRow("select * from language_master where language_name = '$get_language'");
		if($sql_duplication_chk)
		 {
			$resmsg = $db->encode64("15");
 		 }
 		else
 		{
 			$resmsg = $db->encode64("1");
			$tab = "language_master";
			$cs["language_name"]  = $get_language;
			$cs["status"] = "Y";
			$db->db_insert($tab,$cs);
		}		
}	

//code to change the status----------------------------
if($_REQUEST["act"] == "sts")
{
	$resmsg = $db->encode64("3");
	$status_id = $_REQUEST["id"];
	$status = $_REQUEST["st"];
	$db->update_sql("update language_master set status='".$_REQUEST["st"]."' where ID=".$_REQUEST["id"]);

}
//-----------------------------------------------------

//code to delete---------------------------------------
if($_REQUEST["act"] == "del")
{
	$resmsg = $db->encode64("5");
	$delete_id = $_REQUEST["id"];
	$db->delete_sql("delete from language_master where ID = '$delete_id'");
	
}
//--------------------------------------------------

//code to update---------------------------------------
if(isset($_POST["frm_update"]) && $_POST["frm_update"] == "Update")
{
	$get_language = $db->check_input($_POST["language_title"]);
//dup_chk--------------------------------------------	
		
	 		$resmsg = $db->encode64("2");
			$tab = "language_master";
			$cs["language_name"]  = $get_language;
			$cs["status"] = "Y";
		
		$db->update($tab, $cs, "id=".$_REQUEST["id"]);
	
}
//--------------------------------------------------


?>
<script language="javascript">window.location = "../home.php?src=<?PHP echo $_REQUEST[src]; ?>&resmsg=<?PHP echo $resmsg; ?>&page=<?php echo $_REQUEST[page]; ?>";</script>