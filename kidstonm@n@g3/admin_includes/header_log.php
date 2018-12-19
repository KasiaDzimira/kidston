<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>

<link href="admin_includes/kn-style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="admin_includes/form_validation.js"></script>
<script src="admin_includes/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="admin_includes/jquery.js"></script>
<script type="text/javascript" src="admin_includes/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="admin_includes/menu.js"></script>

<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
<style>
			.jqifade{ position: absolute; background-color: #aaaaaa; }
			div.jqi{ width: 400px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; position: absolute; background-color: #ffffff; font-size: 11px; text-align: left; border: solid 1px #eeeeee; -moz-border-radius: 10px; -webkit-border-radius: 10px; padding: 7px; }
			div.jqi .jqicontainer{ font-weight: bold; }
			div.jqi .jqiclose{ position: absolute; top: 4px; right: -2px; width: 18px; cursor: default; color: #bbbbbb; font-weight: bold; }
			div.jqi .jqimessage{ padding: 10px; line-height: 20px; color: #444444; }
			div.jqi .jqibuttons{ text-align: right; padding: 5px 0 5px 0; border: solid 1px #eeeeee; background-color: #f4f4f4; }
			div.jqi button{ padding: 3px 10px; margin: 0 10px; background-color: #2F6073; border: solid 1px #f4f4f4; color: #ffffff; font-weight: bold; font-size: 12px; }
			div.jqi button:hover{ background-color: #728A8C; }
			div.jqi button.jqidefaultbutton{ background-color: #BF5E26; }
			.jqiwarning .jqi .jqibuttons{ background-color: #BF5E26; }

</style>

</head>

<body>
<div id="bg-home">
  <div id="page-section">
  	<div id="top-section">
		<div id="logo"><img src="../knpic/logo.gif" width="92" height="73" /></div>
		<?PHP 
				if($_REQUEST['src']=="1")
				{ // if menu session
		?>
		<div id="top-rt-sec">
			<div class="top-icon-sec"></div>
			<div class="top-menu-sec">
				<div class="ddsmoothmenu" id="smoothmenu1">
				<ul>
				<li><a href="for-candidates.php">FOR CANDIDATES</a>
					<ul>
						<li><a style="width:127px;" href="view-latest-openings.htm">View latest Openings</a></li>
						<li><a style="width:127px;" href="submit-your-resume.php">Submit your Resume</a></li>
						<li><a style="width:127px;" href="career-tips.php">Career Tips</a></li>
						<li><a style="width:127px;" href="write-us.php">Write to Us</a></li>
					</ul>
				</li>
				<li><a href="for-companies.php" class="selected">FOR COMPANIES</a>
					<ul>
						<li><a style="width:123px;" href="staff-search.php">Staff Search</a></li>
						<li><a style="width:123px;" href="positions-available.php">Positions Available</a></li>
						<li><a style="width:123px;" href="international-recruitment.php">International Recruitment</a></li>
						<li><a style="width:123px;" href="student-jobs.php">Student Jobs</a></li>
					</ul>
				</li>
				<li><a href="bpo-services.htm">ABOUT US</a></li>
				<li><a href="contactus.php">CONTACT US</a></li>
				</ul>
				</div>				
			</div>
		</div>
		<?PHP 
				} // if menu session
		?>

	</div>