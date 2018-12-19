<?PHP
		include("support/firstline.php");
		$cms_id = $_GET['cms_id'];
		$cms_query = $db->fetchSingleRow("select * from cms_master where status='Y' and ID='$cms_id'"); 
		// $fmenu_id = $cms_query['FL_ID'];
		if($cms_query['MID']=="1"){ $head = "About US"; }
		if($cms_query['MID']=="2"){ $head = "Contact US"; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?PHP
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<title><?PHP echo $cms_query['meta_title']; ?></title>
<meta name="description" content="<?PHP echo $cms_query['meta_content']; ?>" />
<meta name="keywords" content="<?PHP echo $cms_query['meta_keyword']; ?>">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<title><?PHP echo $cms_query['meta_title_en']; ?></title>
<meta name="description" content="<?PHP echo $cms_query['meta_content_en']; ?>" />
<meta name="keywords" content="<?PHP echo $cms_query['meta_keyword_en']; ?>">
<?PHP
}
?>
<link rel="shortcut icon" href="<?PHP echo SITE_URL;?>knpic/favicon.ico" type="image/x-icon" />
<link href="<?PHP echo SITE_URL;?>kninc/kn-style.css" rel="stylesheet" type="text/css" />
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<script type="text/javascript" src="inc1ud35/jquery.js"></script>
<script type="text/javascript" src="inc1ud35/jquery-impromptu.2.7.min.js"></script>
<!--<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/popup.js" language="javascript"></script>-->
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>


<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>

<style>
			.jqifade{ position: absolute; background-color: #aaaaaa; }
			div.jqi{ width: 600px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; position: absolute; background-color: #ffffff; font-size: 11px; text-align: left; border: solid 1px #eeeeee; -moz-border-radius: 10px; -webkit-border-radius: 10px; padding: 7px; }
			div.jqi .jqicontainer{ font-weight: bold; }
			div.jqi .jqiclose{ position: absolute; top: 4px; right: -2px; width: 18px; cursor: default; color: #bbbbbb; font-weight: bold; }
			div.jqi .jqimessage{ padding: 10px; line-height: 20px; color: #444444; }
			div.jqi .jqibuttons{ text-align: right; padding: 5px 0 5px 0; border: solid 1px #eeeeee; background-color: #f4f4f4; }
			div.jqi button{ padding: 3px 10px; margin: 0 10px; background-color: #2F6073; border: solid 1px #f4f4f4; color: #ffffff; font-weight: bold; font-size: 12px; }
			div.jqi button:hover{ background-color: #728A8C; }
			div.jqi button.jqidefaultbutton{ background-color: #BF5E26; }
			.jqiwarning .jqi .jqibuttons{ background-color: #BF5E26; }

</style>
<script language="javascript">
function getInternetExplorerVersion()
// Returns the version of Internet Explorer or a -1
// (indicating the use of another browser).
{
  var rv = -1; // Return value assumes failure.
  if (navigator.appName == 'Microsoft Internet Explorer')
  {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}
var ver = getInternetExplorerVersion();
if ((ver <= 6) && (navigator.appCodeName == 'Mozilla') )
{
	//alert(navigator.appCodeName);
	//Specify spectrum of different font sizes:
	var min=8;
	var max=18;
	function increaseFontSize() {
   var p = document.getElementsByTagName('body');
   for(i=0;i<p.length;i++) {
      if(p[i].style.fontSize) {
         var s = parseInt(p[i].style.fontSize.replace("px",""));
      } else {
         var s = 12;
      }
      if(s!=max) {
         s += 2;
      }
      p[i].style.fontSize = s+"px"
   }
}
function decreaseFontSize() {
   var p = document.getElementsByTagName('body');
   for(i=0;i<p.length;i++) {
      if(p[i].style.fontSize) {
         var s = parseInt(p[i].style.fontSize.replace("px",""));
      } else {
         var s = 12;
      }
      if(s!=min) {
         s -= 2;
      }
      p[i].style.fontSize = s+"px"
   }   
}

}	
else
{
	//alert(ver);
	function increaseFontSize()
	{
	if(parent.parent.document.body.style.zoom!=0) 
	parent.parent.document.body.style.zoom*=1.2; 
	else 
	parent.parent.document.body.style.zoom=1.2;
	}
	function decreaseFontSize()
	{
	if(parent.parent.document.body.style.zoom!=0) 
	parent.parent.document.body.style.zoom*=0.833; 
	else 
	parent.parent.document.body.style.zoom=0.833;
	}

}
</script>
</head>

<body>
<?PHP include("login.php"); ?>
<div id="bg-home">
  <div id="page-section">
  	<?PHP include("header.php"); ?>
	<div id="inner-mid-section">
  		<div id="inner-band-sec3">
			<div class="top-band-left">
				<div class="top-band-left-txt3">
			
	<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
				if($cms_query['banner_content_g'] != "")
				{
					echo html_entity_decode($cms_query['banner_content_g']);
				}
				else
				{
					$sql_alt = $db->fetchSingleRow("select banner_content,banner_content_g from cms_master where MID='".$cms_query['MID']."'");
					if($sql_alt)
					{
						if($sql_alt['banner_content_g'] != "")
							echo html_entity_decode($sql_alt['banner_content_g']);
						elseif($sql_alt['banner_content'] != "")
							echo html_entity_decode($sql_alt['banner_content']);
					}
				}
		}
		if($_SESSION["slanguage"] == "2")
		{
				if($cms_query['banner_content'] != "")
				{
					echo html_entity_decode($cms_query['banner_content']);
				}
				else
				{
					$sql_alt = $db->fetchSingleRow("select banner_content,banner_content_g from cms_master where MID='".$cms_query['MID']."'");
					if($sql_alt)
					{
						if($sql_alt['banner_content'] != "")
							echo html_entity_decode($sql_alt['banner_content']);
						elseif($sql_alt['banner_content_g'] != "")
							echo html_entity_decode($sql_alt['banner_content_g']);
					}
				}
		}
?>
		</div>
			<?PHP //echo $head; ?>
<!--				<div class="top-band-left-txt"><?PHP //echo $head; ?><br /></div>
-->			</div>
			<div class="top-band-right">
			<?PHP
					$topimage = SITE_URL."toppic/top-band2.jpg";
					
					if($cms_query["top_image0"] != "")
					{
						$topimage = SITE_URL.$cms_query["top_image0"];
					}else
					{
						$sqlimage = $db->fetchSingleRow("select * from cms_master where status='Y' and MID='".$cms_query["MID"]."'");
						if($sqlimage)
						{
							if($sqlimage["top_image0"] != "")
							{
								$topimage = SITE_URL.$sqlimage["top_image0"];
							}
						}
					}
			?>
			
			<img src="<?PHP echo $topimage; ?>" height="125" width="475" border="0" />
			</div>
	  	</div>
		  <div id="content-box-bg">
		  		<div class="inner-c1">
					<div class="inner-c1-pad">
					<?PHP 	
							include("support/left_menu.php"); 
					?>
					</div>
		  		</div>
				<div class="inner-c2">
				<?PHP
				if($cms_query['MID']=="2"){
				?>
				<div class="align-right">
				<img src="<?PHP echo SITE_URL;?>knpic/icon-print.gif" alt="" width="16" height="13" border="0" />&nbsp;<a href="javascript:printContactUs(<?PHP echo $_REQUEST['cms_id']; ?>);">Print</a></div>
				<?PHP
				}
				?>
					<div class="h2">
					<?php
			if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
			{
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
					}
			}
					
			if($_SESSION["slanguage"] == "2")
			{
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
			}
?>
					</div><br />
				<?PHP
				if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
				{
					if($cms_query['content_g'] != "")
					{
						echo html_entity_decode($cms_query['content_g']);
					}
					else
					{
						$sql_alt2 = $db->fetchSingleRow("select content,content_g from cms_master where MID='".$cms_query['MID']."'");
						if($sql_alt2)
						{
								if($sql_alt2['content_g'] != "")
									echo html_entity_decode($sql_alt2['content_g']);
								elseif($sql_alt2['content'] != "")
									echo html_entity_decode($sql_alt2['content']);
						}
					}
				}
					
				if($_SESSION["slanguage"] == "2")
				{
						if($cms_query['content'] != "")
						{
							echo html_entity_decode($cms_query['content']);
						}
						else
						{
						$sql_alt2 = $db->fetchSingleRow("select content,content_g from cms_master where MID='".$cms_query['MID']."'");
						if($sql_alt2)
						{
							if($sql_alt2['content'] != "")
							echo html_entity_decode($sql_alt2['content']);
							elseif($sql_alt2['content_g'] != "")
							echo html_entity_decode($sql_alt2['content_g']);
						}
					}
				}
				?>
		         </div>	
		  </div>
	</div>
    <?PHP include("footer.php");?>
  </div>
</div>
<?PHP include("footer-red.php");?>
</body>
</html>