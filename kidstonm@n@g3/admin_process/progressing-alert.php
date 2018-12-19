<style>
.success
{
color:#006633;
font-size:14px;
font-weight:bold;
border:#006633 1px solid;
padding:5px;
}
</style>
<div align="center" class="success"><< Please wait while your request is being processed. Do not Refresh or Close the window..  >></div>
<?PHP
	if($_SESSION['username'] == "" && !isset($_SESSION['username']))
	{
		$resmsg = base64_encode("9");
	?>
		<script language="javascript">window.location = "../?resmsg=<?PHP echo $resmsg; ?>";</script>
	<?PHP		
		die("Session expired! Please login...");
	}
?>
