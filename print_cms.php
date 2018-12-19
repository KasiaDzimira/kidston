<?PHP
		include("support/firstline.php");
		$cms_id = $_GET['cmsid'];
		$cms_query = $db->fetchSingleRow("select * from cms_master where status='Y' and ID='$cms_id'"); 
		//echo "select * from cms_master where status='Y' and ID='$cms_id'"
?>
<html>
<head>
<title>Contact Kidston</title>
<script language="javascript">
function print_p()
{
	window.print();
	window.close();
}
</script>
</head>
<link href="kninc/kn-style.css" rel="stylesheet" type="text/css" />
<body onLoad="print_p();">
<div class="inner-c3">
<table width="500" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" style="padding-left: 15px;"><img src="<?PHP echo SITE_URL; ?>knpic/lg.jpg" alt="" width="50" height="40" /></td>
			</tr>
			<tr>
				<td align="left" style="padding-left: 15px;"><div style="border-bottom:#666666 1px solid; width:505px; padding-left:30px; ">&nbsp;</div><br />
</td>
			</tr>
			<?PHP
				if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
				{
			?>	
<tr>
<td align="left" valign="bottom" style="padding-left: 15px;">			
<div style="float: left;" align="left" class="h3">
<?PHP
if($cms_query['page_title_g'] != "")
{
	echo html_entity_decode($cms_query['page_title_g']);
}	
else
{
	$sql_alt1 = $db->fetchSingleRow("select page_title,page_title_g from cms_master where MID='".$cms_query['MID']."'");
	if($sql_alt1)
	{
		if($sql_alt1['page_title_g'] != "")
			echo html_entity_decode($sql_alt1['page_title_g']);
		elseif($sql_alt1['page_title'] != "")
			echo html_entity_decode($sql_alt1['page_title']);
	}
}?>
</div>
</td>
</tr>
			<?PHP
				}
				if($_SESSION["slanguage"] == "2")
				{
			?>	
<tr>
<td align="left" valign="bottom" style="padding-left: 15px;">		
<div style="float: left;" align="left" class="h3">
<?PHP
if($cms_query['page_title'] != "")
{
	 echo html_entity_decode($cms_query['page_title']); 
}
else
{
	$sql_alt1 = $db->fetchSingleRow("select page_title,page_title_g from cms_master where MID='".$cms_query['MID']."'");
	if($sql_alt1)
	{
		if($sql_alt1['page_title'] != "")
			echo html_entity_decode($sql_alt1['page_title']);
		elseif($sql_alt1['page_title_g'] != "")
			echo html_entity_decode($sql_alt1['page_title_g']);
	}
}
?> 
</div>
</td>		
</tr>
<?PHP
		}
				if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
				{
			?>	
			
 <tr>
    <td align="left" valign="bottom" style="padding-left: 15px;"><?PHP echo html_entity_decode($cms_query['content_g']); ?>
	</td>
</tr>
			<?PHP
				}
				if($_SESSION["slanguage"] == "2")
				{
			?>
 <tr>
    <td align="left" valign="bottom" style="padding-left: 15px;"><?PHP echo html_entity_decode($cms_query['content']); ?>
	</td>
</tr>
			<?PHP
				}
			?>		
			<tr>
				<td align="left" style="padding-left: 15px;" height="20"><div style="border-bottom:#666666 1px solid; width:505px; padding-left:30px; "></div></td>
			</tr>
			<tr>
				<td align="left" style="padding-left: 15px;"> Copyright © <script language="javascript" type="text/javascript">
var now = new Date();
var d = now.getFullYear();
document.write(d);
	    </script> KIDSTON. All rights reserved.</td>
				</tr>	
</table>		
</div>	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43390285-1', 'kidston.ch');
  ga('send', 'pageview');

</script></body>
</html>