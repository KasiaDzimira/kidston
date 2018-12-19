<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>

<link href="admin_includes/kn-style.css" rel="stylesheet" type="text/css" />
<script src="admin_includes/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="admin_includes/jquery.js"></script>
<script type="text/javascript" src="admin_includes/menu.js"></script>
<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->

</head>

<body>
<div id="bg-home">
  <div id="page-section">
  	<div id="top-section">
		<div id="logo"><img src="../knpic/logo.gif" width="92" height="73" /></div>
		<div id="top-rt-sec">
			<div class="top-icon-sec"></div>
			<div class="top-menu-sec">
				<div class="ddsmoothmenu" id="smoothmenu1">
					<?PHP
						if($_SESSION["username"] != "" )
						{
						include("admin_support/menu_generate.php");
						}
					?>
				</div>				
			</div>
		</div>
	</div>