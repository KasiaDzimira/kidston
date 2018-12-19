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

<title>Offene IT- und kaufmännische Stellen bei KIDSTON – aktuelle Jobs</title>

<?PHP

}

if($_SESSION["slanguage"] == "2")

{

?>

<title>Current jobs at KIDSTON – job search, job offers</title>

<?PHP

}

if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")

{

?>

<meta name="description" content="Suchen Sie eine neue Herausforderung im IT-Bereich oder im kaufmännischen Sektor? KIDSTON sucht Top-Bewerber für Top-Jobs." />

<?PHP

}

if($_SESSION["slanguage"] == "2")

{

?>

<meta name="description" content="Are you looking for a new challenge in IT or in the commercial sectors? KIDSTON is seeking top applicants for top jobs." />

<?PHP

}

if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")

{

?>

<meta name="keywords" content="it jobs, kaufmännische jobs, it stellen, kaufmännische stellen, offene stellen">

<?PHP

}

if($_SESSION["slanguage"] == "2")

{

?>

<meta name="keywords" content="jobs, job search, job offers">

<?PHP

}

?>

<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />

<link href="<?PHP echo SITE_URL;?>inc1ud35/layout.css" rel="stylesheet" type="text/css" />

<script src="<?PHP echo SITE_URL;?>inc1ud35/script.js" type="text/javascript" language="javascript"></script>

<script type="text/javascript" src="kninc/jquery.js"></script>

<script type="text/javascript" src="inc1ud35/jquery-impromptu.2.7.min.js"></script>

<script type="text/javascript" src="kninc/menu.js"></script>

<!--<script type="text/javascript" src="kninc/popup.js" language="javascript"></script>

-->

<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />

<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>

<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>

<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>

<script type="text/javascript" src="inc1ud35/validation.js"></script>

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

<!--Font decrease end-->

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

                  <td align="left" valign="top">

                  <div class="grey-box-c1">

                      <div class="grey-box-txt">

                        <div class="home-tab-sec">

                          <div class="home-tab-r1">

                            <table border="0" cellspacing="0" cellpadding="0">

                              <tr>

                                <td width="128" align="left" valign="middle"><span class="tab-menu-sel">Contact Us </span></td>

                                <td width="1"></td>

                              </tr>

                            </table>

                          </div>

                          <div id="candidate">

                            <div class="home-tab-r2" >

                              <div class="home-tab-txt">

                                <div class="tab-text-content">

                                  <div class="inn-tab-text-cont-left-detail">

									

				<p style="text-align: justify;"><h3>Do you have any questions or suggestions, or can we help you with other matters? Contact us by phone, email or post.</h3></p>

<p>&nbsp;</p>

<table width="100%" border="0" cellpadding="0" cellspacing="0" style="width: 100%; height: 100%;">

<tbody>

<tr>

<td height="25" colspan="2" align="left" valign="middle" style="background-color: #dfdfdf;"><strong><span style="color: #414141; font-size:14px">&nbsp;By phone on the following key numbers: </span></strong></td>

</tr>

<tr>

<td width="100" align="left" valign="top" style="width: 157px;"><br />

  Tel<br />

  Fax</td>

<td align="left" valign="top"><br />

  +41 (0)44 576 9476<br />

  +41 (0)44 576 9477</td>

</tr>

</tbody>

</table>

<p>&nbsp;</p>

<table style="width: 100%; height: 54px;" border="0" cellpadding="0" cellspacing="0">

<tbody>

<tr>

<td height="25" colspan="2" align="left" valign="middle" style="background-color: #dfdfdf;"><strong><span style="color: #414141; font-size:14px">&nbsp;By email:</span></strong></td>

</tr>

<tr>

<td style="width: 157px;">

<p>&nbsp;</p>

<p>For customers:</p>

<p>For applicants:</p>

<p>For staff:</p>

</td>

<td>

<p>&nbsp;</p>

<p><a href="mailto:customers@kidston.ch">customers(at)kidston.ch</a></p>

<p><a href="mailto:jobs@kidston.ch">jobs(at)kidston.ch</a></p>

<p><a href="mailto:people@kidston.ch">people(at)kidston.ch</a></p>

</td>

</tr>

</tbody>

</table>

<p>&nbsp;</p>

<table style="width: 100%; height: 54px;" border="0" cellpadding="0" cellspacing="0">

<tbody>

<tr>

<td height="25" colspan="2" align="left" valign="middle" style="background-color: #dfdfdf;"><strong><span style="color: #414141; font-size:14px">&nbsp;By post:</span><br>

</strong></td>

</tr>

<tr>

<td align="left" valign="middle" style="width: 157px;"><br />  <strong>KIDSTON Zürich</strong><br />

  Grütlistrasse 36<br />

CH-8002 Zürich-Enge ZH</td>

<td align="left" valign="middle"><strong><br />

  KIDSTON Zug</strong><br />

Baarerstrasse 137<br />

CH-6301 Zug ZG

</td>

</tr>

<tr>

<td colspan="2">

<div class="h2">

					<br />

					By car or on foot </div><br />

<strong style="font-size:14px; line-height:25px">Do you have an appointment with us and need directions?<br /></strong>

Our office in Zurich is centrally placed near the station area directly next to the church area.<br />

<br />



<p style="text-align: justify;"> </p>

<iframe src="https://maps.google.ch/maps?f=q&source=s_q&hl=de&geocode=&q=KIDSTON+Z%C3%BCrich&sll=47.361153,9.041748&sssspn=4.658835,11.634521&ie=UTF8&hq=KIDSTON&hnear=Z%C3%BCrich&cid=11572864484003102541&ll=47.366618,8.535862&spn=0.009011,0.028324&z=15&iwloc=A&output=embed" width="658" height="320" frameborder="0"></iframe>

<p style="text-align: justify;"> </p>

<p style="text-align: justify;"><br />

  <br />

<strong style="font-size:14px; line-height:25px">Public transport to the Zurich station area:</strong></p>

<p style="text-align: justify;">You can find up to date timetables at <a href="https://www.sbb.ch/" target="_blank">www.sbb.ch</a></p>

<p style="text-align: justify;"> </p>

<p style="text-align: justify;"><br />

<strong style="font-size:14px; line-height:25px">Pedestrian route:</strong></p>

<p style="text-align: justify;">KIDSTON is located approximately one minute away from the Zurich station area. You go about 150m along Seestrasse, past the Suan-Long Chinese restaurant until you see some steps on your right-hand side, which lead over the tracks. At the top, on the left next to the large fountain, you will see a house with a salmon-coloured facade. You will find our office on the second floor. The entrance is at the back of the house.</p>

<p style="text-align: justify;"> </p>

<p style="text-align: justify;"><br />

<strong style="font-size:14px; line-height:25px">Driving</strong><strong>:</strong></p>

<p style="text-align: justify;">The easiest way is to use a navigation system or an online route mapping tool. There are plenty of public parking areas available along Grütlistrasse (50 Rp./hour).</p>		    

</td>

</tr>

</tbody>

</table>	



	         </div>

                                </div>

                              </div>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                                    </td>

                

                </tr>

                

              </table>



                </div>

                

            </div>

          </div>

        </div>

      </div>

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