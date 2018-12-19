<?PHP
		include("support/firstline.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="kninc/kn-style.css" rel="stylesheet" type="text/css" />
<script src="kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="kninc/jquery.js"></script>
<script type="text/javascript" src="inc1ud35/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="kninc/menu.js"></script>
<!--<script type="text/javascript" src="kninc/popup.js" language="javascript"></script>
-->
<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>

<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
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

</head>

<body>
<?PHP include("login.php");
	  include("ffriend.php"); ?>
<div id="bg-home">
  <div id="page-section">
  	<?PHP include("header.php"); ?>
	<div id="inner-mid-section">
	  <div id="inner-band-sec">
			<div id="top-band-pad">
			  <div id="top-band-c1">Search for opening jobs<br /><span class="band-orange">your chance</span></div>
				<div id="top-band-c2">We are searching for talents.<br />
			    What we can do for you by clicking on Work with Kidston. </div>
			</div>
	  </div>
		  <div id="content-box-bg">
		  		<div class="inner-c1">
					<div class="inner-c1-pad">
						<div class="inner-menu-red"><a href="<?PHP echo SITE_URL; ?>view-latest-openings.php" class="menu-red-link">Search jobs</a></div>
<!--						<div class="inner-menu-red"><a href="#" class="menu-red-link">Submit your Resume</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Career Tips</a></div>
-->						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">Work with kids ton</a></div>
					</div>
		  		</div>
			<div class="inner-c2">
					<div class="h1">APPLY ON-LINE AT ADECCO</div>
			  <div class="apply-content-area">
			    <strong>The data protection legal requirements of Adecco</strong>                <br />
			      <br />
			    Adecco Human Resources AG respects in full the requirements, required by law, for data protection in Switzerland, We guarantee absolute confidentiality in the handling of your personal data.<br />
                <br />
                For each instance where personal data is provided to a 3<sup>rd</sup> party, Swiss lefislation for data protections requires the consent from the party providing the data (Article 7 paragraph 3 and 18 paragraph 3 from the Swiss Act for Temporary Labour and Recruitment and also Article 19 and 47 from the regulation for Temporary Labour and Recruitment and Article 35 from the Swiss Act for Data Protection <sup>1</sup>).
                <br />
                <br />
                With the signature of this confidentiality clause, Adecco Human Resources may:              
			    		        
			    <div class="bullet2">send your file to company's which fit your profile, having first obtained your consent</div>
	            <div class="bullet2">guarantee the disposal of your file upon written receipt of this request</div>

	            <br />
				However, if there is no activiy within the first 6 months, your candidacy will be made inactive and your candidate file will be deleted from our database.
	            <br />		          On selecting the field &quot;I agree&quot; :<br /> 
		          <br />
		          <div class="bullet2">I confirm that I have the right to complete this data and take full responsibility for the consequences of misrepresentation of any of this data.</div>
			    <div class="bullet2">I allow adecco Human Resouces AG to use this data for presentation of my profile to Clients with a view to possible employment (before sending your file, we will request your consent for each case)</div>
			    <div class="bullet2">I accept the confidentiality clause </div>
			    <br /><br />If you experience any translation problems from other languages, please refer to the French version as the master.<br /><br />
			    Please find the above mentioned Acts on the following website: <a href="https://www.admin.ch">www.admin.ch</a>
			    Disclaimer
			    I agree      I disagree <br />
			    <br />
			    <div class="disc-bot">
					<div class="disc-left">Disclaimer</div>
					<div class="disc-right">
					  <form id="apply" name="apply" method="post" action="">
					    <input name="agree" type="submit" id="agree" value="I agree"  class="btn-common2"/>
						<input name="disagree" type="submit" id="disagree" value="I disagree" class="btn-common2" />
				      </form>
				    </div>
				</div>
			  </div>
				</div>
		  </div>
	</div>
    <?PHP include("footer.php");?>
  </div>
</div>
<?PHP include("footer-red.php");?>
</body>
</html>