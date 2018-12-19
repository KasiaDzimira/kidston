<?PHP
		include("support/firstline.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?PHP 
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<title>KIDSTON – Site map</title>
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<title>KIDSTON – Site map</title>
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="description" content="KIDSTON auf einen Blick: Jobs im IT- oder kaufmännischen Bereich finden, offene Stellen besetzen und mehr.">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="description" content="KIDSTON at a glance: Find jobs in the IT or commercial sectors, fill job vacancies and much more.">
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="keywords" content="kidston, sitemap">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="keywords" content="kidston, site map">
<?PHP
}
?>
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="kninc/kn-style.css" rel="stylesheet" type="text/css" />
<script src="kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="kninc/jquery.js"></script>
<script type="text/javascript" src="kninc/menu.js"></script>
<script type="text/javascript" src="include35/jquery-impromptu.2.7.min.js"></script>
<!--<script type="text/javascript" src="kninc/popup.js" language="javascript"></script>-->

<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>

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

<!--<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>-->

<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
<!--Font decrease-->
<script type="text/javascript">
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
</script>
<!--Font decrease end-->


</head>

<body>
<?PHP include("login.php"); ?>
<div id="bg-home">
  <div id="page-section">
  	<?PHP include("header.php");?>
	<div id="inner-mid-section">
	  <div id="inner-band-sec3">
        <div class="top-band-left">
          <div class="top-band-left-txt3">
		 <?PHP 
				if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
				{
				?>
		<span class="band-orange">Site map ...</span><br />... KIDSTON auf einen Blick</div>
		<?php
				}
				if($_SESSION["slanguage"] == "2" ) 
				{
				?>
					<span class="band-orange">Site map ...</span><br />... KIDSTON at a glance</div>
				<?PHP
				}
				?>
       	   </div> <div class="top-band-right"><img src="toppic/top-band17.jpg" height="125" width="475" border="0" /></div>
      </div>
	  <div id="content-box-bg">
		  		<div class="inner-c1">
					<div class="inner-c1-pad">
						<!--<div class="inner-menu-red"><a href="#" class="menu-red-link">Search jobs</a></div>
						<br /><br /><br />-->
						<?PHP 	//$MID="4";
							//include("support/left_menu.php"); 
						?>
						
<!--						<div class="inner-menu-red"><a href="#" class="menu-red-link">Submit your Resume</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Career Tips</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Work with kids ton</a></div>
-->					</div>
		  		</div>
				<div class="inner-c2">
					<div class="h1">Site map</div><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="35"><strong>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
			echo "Für Kandidaten";
		}
		if($_SESSION["slanguage"] == "2")
		{
			echo "FOR CANDIDATES";
		}
		?>	</strong></td>
      </tr>
      <tr>
        <td><?PHP menu_generate2('3',$db,''); ?></td>
      </tr>
      <tr>
        <td height="35"><strong>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
			echo "Für Kunden";
		}
		if($_SESSION["slanguage"] == "2")
		{	
			echo "FOR CUSTOMERS";
		}
		?></strong></td>
      </tr>
      <tr>
        <td ><?PHP menu_generate2('4',$db,''); ?></td>
      </tr>
    </table></td>
    <td width="1%">&nbsp;</td>
    <td valign="top"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="35"><strong>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
			echo "Über KIDSTON";
		}
		if($_SESSION["slanguage"] == "2")
		{
			echo "ABOUT KIDSTON";
		}
		?>	</strong></td>
      </tr>
      <tr>
        <td ><?PHP menu_generate2('1',$db,''); ?></td>
      </tr>
      <tr>
        <td height="35"><strong>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
			echo "Kontakt";
		}
		if($_SESSION["slanguage"] == "2")
		{
			echo "CONTACT US";
		}
		?></strong></td>
      </tr>
      <tr>
        <td ><?PHP menu_generate2('2',$db,''); ?></td>
      </tr>
    </table></td>
  </tr>
</table>

			</div>
	  </div>
	</div>
   <?PHP include("footer.php");?>
  </div>
</div>
<?PHP include("footer-red.php");?>
</body>
</html>