<?PHP 
	include("admin_includes/first_line.php"); 
	
?>
<html>
<head>
<!-- TinyMCE -->

<script type="text/javascript" src="admin_includes/tiny/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
		//elements : "frm_short_desc,frm_detail_desc",
		elements : "temp_reason",
		theme : "advanced",
		extended_valid_elements : "iframe[src|width|height|name|align]",
		convert_urls : false,
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,ibrowser",

		// Theme options
		theme_advanced_buttons1 : "ibrowser,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,|,forecolor,backcolor,|,preview,fullscreen,code,",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
		
	});
</script>
<!-- /TinyMCE -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Template</title>
</head>

<body>
<?PHP
	include("admin_process/progressing-alert.php");
?>
 <?PHP  
 if($_REQUEST["chk"] != "Y")
 {
 ?>
<div align="center">
<form action="admin_process/candidate_status.php" method="post" name="frm_temp">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">
	<strong>Please confirm the template message</strong>	</td>
  </tr>
 <?PHP
   		$rejmail = $_REQUEST["chk"];
		//echo $rejmail;
		
  		$sql_temp_dup = $db->fetchSingleRow("select * from template_master where template_name = '".$_REQUEST['temp_id']."'");
		 $tid = $sql_temp_dup['ID'];
		 $tlang = $sql_temp_dup['template_lang'];
  		//echo  $tid;
  		$val = $db->fetchSingleRow("select * from application_master where ID='".$_REQUEST['apid']."'");
  		$jid = $val['job_id'];
  		$cid = $val['candidate_id'];
		
		
		$can_val = $db->fetchSingleRow("select * from candidate_master where ID='$cid'");
		
		//$can_val = $db->fetchSingleRow("select * from candidate_master where ID='$cid'");
		
		$job_val = $db->fetchSingleRow("select * from job_details where ID='$jid'");
		$esex = "";
		$gsex = "";
		$erds = "<br>Regards<br>Kidston Team";
		$grds = "<br>Herzliche Gr�sse<br>Kidston Team";
		if($can_val["sex"] == "M")
		{
			$esex = "Mr. ";
			$gsex = "geehrter Herr ";
		}
		if($can_val["sex"] == "F")
		{
			$esex = "Mrs. ";
			$gsex = "geehrte Frau ";
		}
  ?>
  
  <tr>
    <td align="center"><textarea id="temp_reason" name="temp_reason" rows="10" cols="40" style="width: 50%">
	<?PHP
	if($tlang == "DE")
	{
	?>	
	<p> Sehr <?PHP echo $gsex; ?><?PHP echo $can_val['name']." ".$can_val['lastname'];?></p> 
<p> Besten Dank f&uuml;r das Interesse an der offenen Stelle als <strong><?PHP echo str_replace("^","'",str_replace('##','"', $job_val['job_title'])); ?></strong> und die Zusendung Ihrer Bewerbungsunterlagen.</p>
	
	<?PHP
	}
	if($tlang == "EN")
	{
	?>	
<p>Dear <?PHP echo $esex; ?><?PHP echo $can_val['name']." ".$can_val['lastname'];?></p>
<p>
Thank you for your interest in the open position as <strong><?PHP echo str_replace("^","'",str_replace('##','"', $job_val['job_title'])); ?></strong> and sending your resume.</p>
	<?PHP
	}
	?>
<?PHP echo $sql_temp_dup["template_desc"]; ?>
<br>
<?PHP
	if($tlang == "DE")
	{
		echo $grds; 
	}
	if($tlang == "EN")
	{
		echo $erds; 
	}
?>
<p> &nbsp; </p>
 </textarea></td>
  </tr>
  <tr>
    <td height="40" align="center">
	<!--template.php?apid=12&st=REJECTED&src=view-applied&page=&frm_jobcode=&btsave=change&remarks=test&temp_id=1-->
	<input type="hidden" name="apid" id="apid" value="<?PHP echo $_REQUEST[apid]; ?>">
	<input type="hidden" name="st" id="st" value="<?PHP echo $_REQUEST[st]; ?>">
	<input type="hidden" name="src" id="src" value="<?PHP echo $_REQUEST[src]; ?>">
	<input type="hidden" name="page" id="page" value="<?PHP echo $_REQUEST[page]; ?>">
	<input type="hidden" name="btsave" id="btsave" value="<?PHP echo $_REQUEST[btsave]; ?>">
	<input type="hidden" name="frm_jobcode" id="frm_jobcode" value="<?PHP echo $_REQUEST[frm_jobcode]; ?>">
	<input type="hidden" name="remarks" id="remarks" value="<?PHP echo $_REQUEST[remarks]; ?>">
	<input type="hidden" name="temp_id" id="temp_id" value="<?PHP echo $_REQUEST[temp_id]; ?>">
	<input type="hidden" name="chk_st" id="chk_st" value="<?PHP echo $_REQUEST["chk"]; ?>">
		
	<input type="submit" name="Submit" value="Save"></td>
  </tr>
</table>
</form>
</div>
<?PHP
}
else
{
?>
<script language="javascript">
window.location = "admin_process/candidate_status.php?apid=<?PHP echo $_REQUEST[apid]; ?>&st=REJECTED&src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&chk_st=<?PHP echo $_REQUEST["chk"]; ?>&frm_jobcode=<?PHP echo $_REQUEST[frm_jobcode]; ?>&btsave=change&remarks=<?PHP echo $_REQUEST["remarks"];?>";
</script>
<?PHP
}
?>
</body>
</html>
