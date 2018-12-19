<?PHP
		if(!isset($_SESSION["username"]) || $_SESSION["username"] == "")
		{  
			unset( $GLOBALS[ session_name() ] );
			session_unset();
			session_destroy();

?>
	<script language="javascript">
		window.location = "index.php?msg=4";
	</script>
<?PHP
		die('session expired');
		}
?>