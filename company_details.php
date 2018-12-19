<?PHP
		include("support/firstline.php");

		$lid = $_SESSION['lid'];
		
				$comp_query = $db->fetchSingleRow("select * from company_details where ID = '$lid' and status='Y'");
		
//		$comp_query = $db->fetchSingleRow("select cm.ID,cm.comp_name,cm.industry_name,cm.country,cm.state,cm.cont_name,cm.cont_designation,cm.cont_email,cm.cont_phone,cm.company_info from company_details cm where  cm.ID = '$lid' and cm.status='Y'");
		
		if($lid=="")
		{ ?>
			<script language="javascript">window.location = "<?PHP echo SITE_URL;?>index.php";</script>
<?PHP 		die("Invalid job request");
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
<title>KIDSTON - Kundenbereich<?PHP //echo $comp_query['comp_name']; ?> <!--| KIDSTON --></title>
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<title>KIDSTON – customer area</title>
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="description" content="Ihr geschützter Kundenbereich bei KIDSTON.">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="description" content="Your secure customer area at KIDSTON.">
<?PHP
}
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{
?>
<meta name="keywords" content="kidston, kundenbereich">
<?PHP
}
if($_SESSION["slanguage"] == "2")
{
?>
<meta name="keywords" content="kidston, customer area">
<?PHP
}
?>
<link rel="shortcut icon" href="knpic/favicon.ico" type="image/x-icon" />

<link href="<?PHP echo SITE_URL;?>kninc/kn-style.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
<!--<script type="text/javascript" language="javascript" src="<?PHP echo SITE_URL;?>kninc/popup.js"></script>-->

<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="j<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>
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
  	<?PHP include("header.php"); ?>
	<div id="inner-mid-section">
	  <div id="inner-band-sec3">
         <div class="top-band-left">
             <div class="top-band-left-txt3">
			  <?PHP
		  if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		  {
		  ?>
		  <span class="band-orange">Your Business – Our People</span><br />Sie suchen – Wir finden</div>
		  <?PHP
		 	}
			if($_SESSION["slanguage"] == "2")
			{
		?>	
          <span class="band-orange">Your Business – Our People</span><br />You search – We find</div>
		  <?PHP
		  	}
			?>
                </div>
	    <div class="top-band-right"><img src="<?PHP echo SITE_URL; ?>toppic/01.jpg" height="125" width="475" border="0" /></div>
      </div>
	  <div id="content-box-bg">
		  		<div class="inner-c1">
					<div class="inner-c1-pad">
                    <div class="inner-menu-red">
				
					<?PHP
					if($_SESSION['lid']!="")
					{
					?>
               			<a href="<?PHP echo SITE_URL; ?>post-job_log.php" class="dyn-menu-n">
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							echo "Offene Stellen melden";
						}
						if($_SESSION["slanguage"] == "2")
						{
							echo "Advertising job vacancies";
						}
						?></a>
					<?PHP
					}else
					{ //menu-red-link
					?> 
                   		<a href="<?PHP echo SITE_URL; ?>post-job.php" class="dyn-menu-n">
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							echo "Offene Stellen melden";
						}
						if($_SESSION["slanguage"] == "2")
						{
							echo "Advertising job vacancies";
						}
						?></a>
					<?PHP
					}
					?>
					
			         
					
					<!--scroll-->
					<div id="bar">
					<?PHP
						$link_manager = $db->fetchSingleRow("select * from admin_access where ID= ".$comp_query["link_manager"]);
						//echo "select * from admin_access where ID= ".$comp_query["link_manager"];
						if($comp_query["link_manager"] != "")
						{
						?>
                      <span class="profile-head">
					  <?PHP if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					   {
					   ?>Ihr direkter Ansprechpartner
					   <?PHP
					   }
					   if($_SESSION["slanguage"] == "2")
					   {
					   ?>your direct contact partner
					   <?PHP
					   }
					   ?></span><br />
                      <?PHP
							if($link_manager["cont_image"] != "")
							{
						?>
              	 <img src="<?PHP echo SITE_URL.$link_manager[cont_image]; ?>" width="84" height="83" /><br />
             			<?PHP
								}
							if($link_manager["name"] != "")
								echo $link_manager["name"]."<br>";
							if($link_manager["email"] != "")
								echo $link_manager["email"]."<br>";
							if($link_manager["phone"] != "")
								echo $link_manager["phone"]."<br>";
						}		
						?></div>
						<!--scroll-->
						
					
                    </div>
<!--						<div class="inner-menu-red"><a href="#" class="menu-red-link">Submit your Resume</a></div>
					<div class="inner-menu-gray"><a href="javascript:void(0);" class="menu-gray-link">Post a job</a></div>
-->	<!--						<div class="inner-menu-gray"><a href="javascript:void(0);" class="menu-gray-link">Edit profile</a></div>
						<div class="inner-menu-gray"><a href="#" class="menu-gray-link">My post</a></div>-->
					</div>
		  		</div>
                <br />
                 <?PHP
						if($comp_query)
						{
						
				?>
				<div class="inner-c2">
					<div class="h1"><a href="<?PHP echo SITE_URL;?>">Home</a> &rsaquo;&rsaquo; <?PHP echo html_entity_decode($comp_query['comp_name']); ?></div> 
					<div style="float:right">
					</div>
						<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="45" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td height="30" align="left" valign="bottom" class="head-pos">
										<?PHP
										if($_SESSION["slanguage"] == "1" ||$_SESSION["slanguage"] == "")
										{
											echo "Firmendetails";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Company details";
										}
										?>	</td>
									  </tr>
									  <tr>
									    <td height="30" align="left" valign="bottom"> 
										<div style="float: left;" align="left"><strong><?PHP echo "[".html_entity_decode($comp_query['comp_name'])."]"; ?></strong></div>
										<div style="float: right;" align="right" class="smtxt-g"><?PHP echo html_entity_decode($comp_query['country']); ?>&nbsp;<?PHP echo $comp_query['state']; ?></div>										</td>
								      </tr>
									  <tr>
									    <td>&nbsp;</td>
								      </tr>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" ||$_SESSION["slanguage"] == "")
										{
										echo "Firmenbeschreibung";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Description of company";
										}
										?>	 : </strong> </td>
									  </tr>
									  <tr>
									    <td><?PHP echo html_entity_decode($comp_query['company_info']); ?></td>
								      </tr>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Branche";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Line of business";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td><?PHP echo html_entity_decode($comp_query['industry_name']); ?></td>
								      </tr>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
									</table></td>
                          </tr>
                          <tr>
                            <td height="45" align="left" valign="top">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td height="30" align="left" valign="bottom" class="head-pos">
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Kontaktperson";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Contact person";
										}
										?>	</td>
									  </tr>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Name";
										}
										if($_SESSION["slanguage"] == "2")
										{
										echo "Name";
										}
										?> : </strong> </td>
									  </tr>
									  <tr>
									    <td><?PHP echo html_entity_decode($comp_query['cont_name']); ?></td>
								      </tr>
									  <?PHP
									  	if(html_entity_decode($comp_query['cont_designation']) != "")
										{
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Funktion";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Job title";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td><?PHP echo html_entity_decode($comp_query['cont_designation']); ?></td>
								      </tr>
									  <?PHP
									  	}
										if(html_entity_decode($comp_query['cont_email']) != "")
										{
									  ?>
									  <tr>
									   <td height="30" align="left" valign="bottom" class="smtxt"><strong>
									   <?PHP
									   if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
									   {
									   		echo "E-Mail-Adresse";
									   }
										if($_SESSION["slanguage"] == "2")
										{
											echo "Email address";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td><?PHP echo html_entity_decode($comp_query['cont_email']); ?></td>
								      </tr>
									  <?PHP
									  	}
										if(html_entity_decode($comp_query['cont_phone']) != "")
										{
									  ?>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Telefonnummer";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Phone Number";
										}
										?>	 : </strong></td>
									  </tr>
									  <tr>
									    <td><?PHP echo html_entity_decode($comp_query['cont_phone']); ?></td>
								      </tr>
									  <?PHP
									  	}
									  ?>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
							  </table>							</td>
                          </tr>
                          <tr>
                            <td height="45" align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td height="30" align="left" valign="bottom" class="head-pos">
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Firmenanschrift";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Company address";
										}
										?>	</td>
									  </tr>
									  <tr>
										<td height="30" align="left" valign="bottom" class="smtxt"><strong>
										<?PHP
										if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
										{
											echo "Adresse";
										}
										if($_SESSION["slanguage"] == "2")
										{
											echo "Address";
										}
										?>	 : </strong> </td>
									  </tr>
									  <tr>
									    <td>
											<?PHP echo html_entity_decode($comp_query['address1'])."&nbsp;".html_entity_decode($comp_query['address2']); 
											if($comp_query['street']!=""){ echo "<br />".html_entity_decode($comp_query['street']).","; }
											if($comp_query['city']!=""){ echo "<br />".html_entity_decode($comp_query['city']).","; }
											if($comp_query['postalcode']!=""){ echo "<br />".html_entity_decode($comp_query['postalcode']); }
											if($comp_query['state']!=""){ echo "<br />".html_entity_decode($comp_query['state']); }
											if($comp_query['country']!=""){ echo "<br />".html_entity_decode($comp_query['country']); }											
											 ?>										</td>
								      </tr>
									  <?PHP if(html_entity_decode($comp_query['website_url'])){ ?>
										  <tr>
											<td height="30" align="left" valign="bottom"><strong>
											<?PHP
											if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
											{
												echo "Website-URL";
											}
											if($_SESSION["slanguage"] == "2")
											{
												echo "Website-URL";
											}
											?>	 : </strong></td>
										  </tr>
										  <tr>
											<td><?PHP echo html_entity_decode($comp_query['website_url']);?></td>
										  </tr>
				 					 <?PHP } ?>
									  <tr>
										<td>&nbsp;</td>
									  </tr>
							  </table>							
							</td>
                          </tr>
                          <tr>
                            <td height="45" align="left" valign="top">&nbsp;</td>
                          </tr>
                        </table>
                </div>			
				<?PHP
					}
				?>
	  </div>
	</div>
    <?PHP include("footer.php");?>
  </div>
</div>
<?PHP include("footer-red.php");?>
</body>
</html>