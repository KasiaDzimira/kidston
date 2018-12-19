<?PHP
	session_start();
	
		if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
		{
			include("../inc1ud35/database.mvc.php");
		}else
		{
			include("../inc1ud35/database.mvc.live.php");
		}
		
		$resmsg = $db->encode64("16");
		$data["logout_time"] = date("Y-m-d H:i:s");
		$data["login_status"] = "N";
		$cn = " ID ='".$_SESSION["login_id"]."'";
		$db->update("admin_login", $data,$cn);

	unset( $GLOBALS[ session_name() ] );
	session_unset();
	session_destroy();
	
?>
	<script language="javascript">
		window.location = "./?resmsg=<?PHP echo $resmsg; ?>";
	</script>
