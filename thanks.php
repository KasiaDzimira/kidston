<?PHP
		include("support/firstline.php");

 
		$job_id = $db->decode64($_REQUEST['jid']);
		$candid_id = $db->decode64($_REQUEST['cid']);
		
		$cur_date = date("Y-m-d");
		$job_query = $db->fetchSingleRow("select jm.ID,jm.org_id,jm.job_code,jm.job_business,jm.job_title,jm.job_type,jm.job_duration,jm.job_desc,jm.job_salary,jm.job_response,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,jm.cont_purl,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.create_on,jm.created_ip,jm.admin_id,DATE_FORMAT(jm.postedon,'%D %M, %Y') as pdate,cm.ID,cm.comp_name,cm.industry_name,cm.country,cm.state,cm.cont_name,cm.cont_designation,cm.cont_email,cm.company_info from job_details jm, company_details cm where jm.status='Y' and jm.ID = '$job_id' and jm.org_id = cm.ID and cm.status='Y' ");
				
		if($job_query["ID"] <= 0 && $job_query["ID"] != $job_id)
		{
			die("Invalid job request");
		}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?PHP 
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<title>Bewerben bei KIDSTON - Bewerbungsformular</title>
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<title>Apply at KIDSTON – Job reference form</title>
<?PHP 
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="description" content="Interessieren Sie sich für eine Stelle bei KIDSTON? Bewerben Sie sich!">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="description" content="Are you interested in a job with KIDSTON? Then apply!">
<?PHP 
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="keywords" content="kidston, bewerben, bewerbungsformular">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="keywords" content="kidston, apply, application form">
<?PHP
}
?>
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="<?PHP echo SITE_URL;?>kninc/kn-style.css" rel="stylesheet" type="text/css" />
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<script type="text/javascript" src="inc1ud35/jquery.js"></script>
<script type="text/javascript" src="inc1ud35/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="inc1ud35/validation.js"></script>
<script type="text/javascript" src="calendar/calendar.js"></script>
<link type="text/css" href="new_cal/themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="new_cal/ui/ui.core.js"></script>
	<script type="text/javascript" src="new_cal/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="kninc/popup.js" language="javascript"></script>
	
	<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>

<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/kn-script.js"></script>
<!--<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>-->
<!--Font decrease-->
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

<!--<script type="text/javascript">{}
	$(function() {
		$("#dob").datepicker({maxDate: '-180M -1D',dateFormat:'dd-mm-yy',showOn: 'button', buttonImage: 'new_cal/themes/calendar.gif', buttonImageOnly: true, changeMonth: true,changeYear: true} );
		
	});
	</script>-->
<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
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


 <script type="text/javascript">
        var GB_ROOT_DIR = "greybox/";
    </script>

    <script type="text/javascript" src="greybox/AJS.js"></script>
    <script type="text/javascript" src="greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="greybox/gb_scripts.js"></script>
    <link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

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
		?>
		 <span class="band-orange">Ihr neuer Job</span><br />Suchen – Finden - Bewerben</div>
		 <?PHP
		 	}
			if($_SESSION["slanguage"] == "2")
			{
		?>	
          <span class="band-orange">Your new job</span><br />Search – find – apply</div>
		  <?PHP
		  	}
			?>
        
        </div>
	    <div class="top-band-right"><img src="<?PHP echo SITE_URL; ?>toppic/jobmarket.jpg" height="125" width="475" border="0" /></div>
      </div>
	  <div id="content-box-bg">
		  		<div class="inner-c1">
					<div class="inner-c1-pad">
			
					</div>
		  		</div>
				<div class="inner-c2">
				<div class="h3">Thanks for your time.We will get back to you with the quote shortly.<br />
Alternatively,you can write to us at <a href="mailto:jobs@kidston.ch">jobs(at)kidston.ch</a>.</div>
		        </div>			

	  </div>
	</div>
    <?PHP include("footer.php");?>
  </div>
</div>
<?PHP include("footer-red.php");?>
</body>
</html>