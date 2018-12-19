<?PHP
	session_start();
	//unset( $GLOBALS[ session_name() ] );
	
	session_unregister("lid");
	session_unregister("username");
	session_unregister("cname");
	//session_unset();
	//session_destroy();
?>
	<script language="javascript">
		window.location = "index.php";
	</script>
