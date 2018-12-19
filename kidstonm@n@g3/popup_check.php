<?PHP
		session_start();
		if(!isset($_SESSION["username"]) || $_SESSION["username"] == "")
		{  
			unset( $GLOBALS[ session_name() ] );
			session_unset();
			session_destroy();

?>
	<script language="javascript">
		window.opener.location.reload();
		window.close();
	</script>
<?PHP
		die('session expired');
		}
?>