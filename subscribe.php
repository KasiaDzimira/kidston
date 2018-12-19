<?PHP
	include("support/firstline.php");
	$user_id = $db->decode64($_REQUEST['acc']);
	$user_detail = split(":",$user_id);
	$user_acc_id = $user_detail[1];
	$user_acc_type = $user_detail[0];
	if($user_detail[0] == "JMA"){
	//echo "UseriD: ".$user_id."<br>***<br>Account: ".$user_acc_id;
			$job_email = $db->fetchSingleRow("select ID,name,email,job_area,job_location,job_type from job_master where ID= ".$user_acc_id);
			$user_id =  $job_email['ID'];
			$user_email = $job_email['email'];
			$user_name = $job_email['name'];
			$user_job_area = $job_email['job_area'];
			$user_job_location = $job_email['job_location'];
			$user_job_type = $job_email['job_type'];
			$ins_val1["status"] = "Y";
			$aff_row = $db->update("job_master",$ins_val1," ID='$user_id'");
	}
	if($user_detail[0] == "PMA"){
	//echo "UseriD: ".$user_id."<br>***<br>Account: ".$user_acc_id;
			$job_email = $db->fetchSingleRow("select ID,company,email,job_area,job_location,job_type from professional_master where ID= ".$user_acc_id);
			$user_id =  $job_email['ID'];
			$user_email = $job_email['email'];
			$user_name = $job_email['company'];
			$user_job_area = $job_email['job_area'];
			$user_job_location = $job_email['job_location'];
			$user_job_type = $job_email['job_type'];
			$ins_val1["status"] = "Y";
			$aff_row = $db->update("professional_master",$ins_val1," ID='$user_id'");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Email Subscription Activation at KIDSTON – job search, job offers</title>
<meta name="description" content="Are you looking for a new challenge in IT or in the commercial sectors? KIDSTON is seeking top applicants for top jobs." />
<meta name="keywords" content="jobs, job search, job offers">
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />
<link href="<?PHP echo SITE_URL;?>inc1ud35/layout.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>inc1ud35/script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
<style>
.jqifade {
	position: absolute;
	background-color: #aaaaaa;
}
div.jqi {
	width: 600px;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	position: absolute;
	background-color: #ffffff;
	font-size: 11px;
	text-align: left;
	border: solid 1px #eeeeee;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	padding: 7px;
}
div.jqi .jqicontainer {
	font-weight: bold;
}
div.jqi .jqiclose {
	position: absolute;
	top: 4px;
	right: -2px;
	width: 18px;
	cursor: default;
	color: #bbbbbb;
	font-weight: bold;
}
div.jqi .jqimessage {
	padding: 10px;
	line-height: 20px;
	color: #444444;
}
div.jqi .jqibuttons {
	text-align: right;
	padding: 5px 0 5px 0;
	border: solid 1px #eeeeee;
	background-color: #f4f4f4;
}
div.jqi button {
	padding: 3px 10px;
	margin: 0 10px;
	background-color: #2F6073;
	border: solid 1px #f4f4f4;
	color: #ffffff;
	font-weight: bold;
	font-size: 12px;
}
div.jqi button:hover {
	background-color: #728A8C;
}
div.jqi button.jqidefaultbutton {
	background-color: #BF5E26;
}
.jqiwarning .jqi .jqibuttons {
	background-color: #BF5E26;
}
</style>
</head>
<body>
<div id="inner-bg">
  <div id="foot-sec-home">
    <div id="ind-page-section">
      <div id="ind-align">
			<div id="top-align">
			<div id="top-banner-align">
        <?PHP include("header_n.php"); ?>
        <div id="ind-banner-sec">
          <div id="inner-banner">
            <div id="ind-banner-logo"><a href="<?PHP echo SITE_URL;?>index.php?src=home"></a></div>
            <div id="inner-box-sec"> <span class="inner-top-ban-text">The right job,<br />
              right in front of you!</span></div>
            <div id="grey-box-sec">
              <div id="tab-box-bg">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><div class="grey-box-c1">
                        <div class="grey-box-txt">
                          <div class="home-tab-sec">
                            <div class="home-tab-r1">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="185" align="left" valign="middle"><span class="tab-menu-sel">Email - Activation</span></td>
                                  <td width="1"></td>
                                </tr>
                              </table>
                            </div>
                            <div id="candidate">
                              <div class="home-tab-r2" >
                                <div class="home-tab-txt">
                                  <div class="tab-text-content">
                                    <div class="inn-tab-text-cont-left-detail">
                                      <div class="h1"><br />
                                       Thanks,Your email-id {<?PHP echo $user_email;?>} has been activated.</div>
<br />
<br />
<table width="100%" border="0" cellpadding="3" cellspacing="2"><tr><td height="35"><span class="h3">You will receive email notification for following</span></td></tr>
<tr><td><strong>Job Area:</strong> <?PHP echo $user_job_area;?></td></tr>
<tr><td><strong>Job Location:</strong> <?PHP echo $user_job_location;?></td></tr>
<tr><td><strong>Job Type:</strong> <?PHP echo $user_job_type;?></td></tr>
<tr><td height="50">&nbsp;</td></tr>
<tr><td><h4>KIDSTON</h4></td></tr>
<tr><td>Your IT Our people</td>
<tr><td height="50">&nbsp;</td></tr>
</table>


                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div></div></div>
        <div class="ind-footer"> Copyright ©
          <script language="javascript" type="text/javascript">
var now = new Date();
var d = now.getFullYear();
document.write(d);
	    </script>
          KIDSTON. All rights reserved. </div>
      </div>
    </div>
  </div>
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