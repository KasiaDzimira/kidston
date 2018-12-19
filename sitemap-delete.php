<?PHP 
include("support/first_line.php");
		$cms_id = $_REQUEST["cmsid"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ICICI Foundation</title>
<?PHP include("support/scripts_line.php");?>
</head>
<?PHP
$msg_id = $_GET['msg_id'];
        $second_desc = $db->fetchSingleRow("select * from home_second_content where status='1' and ID = ".$msg_id);
		if($second_desc > 0 )
		{
        $second_ID = $second_desc['ID'];
		$second_title = $second_desc['title'];
		$second_breif_description = $second_desc['breif_desc'];
		$second_link_url = $second_desc['link_url'];
		$second_image_url= $second_desc['image_url'];
		}
?>
<body>
<div id="main">
<?PHP include("support/header.php");?>
<div id="menu-main">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="menu-bg">
    <tr>
      <td width="4" align="left" ><img src="images/menu-left.gif" alt="" width="4" height="45" border="0" /></td>
	  <td width="10" valign="bottom"></td>
	  <td>
 <?PHP include("support/menu_generate.php");?></td>
      <td width="4" align="left" ><img src="images/menu-right.gif" alt="" width="4" height="45" border="0" /></td>
    </tr>
  </table>
</div>
<div id="inner-body-main">
<div id="inn-body-full-main">

      <div id="breadcrumb"><a href="index.php" class="breadcrumb">Home</a> &gt; Sitemap</div>
      <br />
      
     <!-- Start-->
     <table width="85%" border="0" align="left" cellspacing="0" cellpadding="0">
     <tr>
     <td width="420">
    <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td><a href="<?PHP echo SITE_URL."overview-1.htm";?>" class="bold-link">About Us</a></td>
    </tr>
    <tr>
    <td ><?PHP menu_generate('1',$db); ?></td>
    </tr>
    <tr>
    <td><a href="<?PHP echo SITE_URL."icchn-9.htm";?>" class="bold-link">Partners</a></td>
    </tr>
    <tr>
    <td ><?PHP menu_generate('2',$db); ?></td>
    </tr>
    </table>
    </td>
    <td width="1" bgcolor="#CAC6AA"></td>
    <td align="left" valign="top">
        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td><a href="<?PHP echo SITE_URL."icici-group-csr-14.htm";?>" class="bold-link">ICICI Group CSR</a></td>
        </tr>
        <tr>
        <td ><?PHP menu_generate('3',$db); ?></td>
        </tr>
        <tr>
        <td ><a href="<?PHP echo SITE_URL."newsroom-21.htm";?>" class="bold-link">Newsroom</a></td>
        </tr>
        <tr>
        <td ><?PHP menu_generate('4',$db); ?></td>
        </tr>
        <tr>
        <td height="30">
        <a href="<?PHP echo SITE_URL."email-rss.php";?>" class="bold-link">Email &amp; RSS</a>
        </td>
        </tr>
        <tr>
        <td height="30">
        <a href="<?PHP echo SITE_URL."faqs-6.php";?>" class="bold-link">FAQs</a>
        </td>
        </tr>
        <tr>
        <td height="30">
        <a href="<?PHP echo SITE_URL."sitemap.php";?>" class="bold-link">Sitemap</a>
        </td>
        </tr>
        <tr>
        <td height="30">
        <a href="<?PHP echo SITE_URL."terms-of-use.php";?>" class="bold-link">Term of Use</a>
        </td>
        </tr>
        </table>
    </td>
    </tr>
    </table>
     <!-- End-->
        <br />
      <br />
    </div></div>
</div>
<?PHP include "support/footer.php";?>
</div>
<?PHP include "support/analytics.php"; ?>
</body>
</html>
