<?PHP include("support/firstline.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>

<link href="<?PHP echo SITE_URL;?>kninc/kn-style.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/kn-script.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/menu.js"></script>
<!--<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/popup.js" language="javascript"></script>-->
<script type="text/javascript" src="<?PHP echo SITE_URL;?>inc1ud35/validation.js"></script>
<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->
<link href="<?PHP echo SITE_URL;?>kninc/thickbox.css" rel="stylesheet" type="text/css" />
<script src="<?PHP echo SITE_URL;?>kninc/query-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="<?PHP echo SITE_URL;?>kninc/thickbox.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="<?PHP echo SITE_URL;?>kninc/easySlider.js"></script>
-->
		<script type="text/javascript" src="<?PHP echo SITE_URL;?>jQuery/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="<?PHP echo SITE_URL;?>jQuery/easyslider/easySlider1.5.js"></script>
<script type="text/javascript" src="jQuery/init.js"></script>

<!--Font decrease-->
<script type="text/javascript">
//Specify affected tags. Add or remove from list:
var tgs = new Array( 'div','td','tr','class','body');

//Specify spectrum of different font sizes:
var szs = new Array( 'xx-small','x-small','small','medium','large','x-large','xx-large' );
var startSz = 3;

function ts( trgt,inc ) {
	if (!document.getElementById) return
		var d = document,cEl = null,sz = startSz,i,j,cTags;
		
		sz += inc;
		if ( sz < 0 ) sz = 0;
		if ( sz > 6 ) sz = 6;
		startSz = sz;

	if (!( cEl = d.getElementById( trgt ) ) ) cEl = d.getElementsByTagName( trgt )[ 0 ];
	
		cEl.style.fontSize = szs[ sz ];
		
		for ( i = 0 ; i < tgs.length ; i++ ) {
		cTags = cEl.getElementsByTagName( tgs[ i ] );
		for ( j = 0 ; j < cTags.length ; j++ ) cTags[ j ].style.fontSize = szs[ sz ];
	}
} 
</script> 
<!--Font decrease end-->

<!--<script type="text/javascript">
	$(document).ready(function(){	
		$("#slider").easySlider({
			prevText:'<img src="knpic/arr-prev.gif" height="14" width="9" border="0" />',
			nextText:'<img src="knpic/arr-next.gif" height="14" width="9" border="0" />',
			//orientation:'vertical'
		});
	});
</script>
-->
<style>
/* Easy Slider */
#slider{
	
}	
#slider ul, #slider ul li.sliderblock{
	margin:0;
	padding:0;
	list-style:none;
	}
#slider ul li.sliderblock{ 
	/* 
		define width and height of list item (slide)
		entire slider area will adjust according to the parameters provided here
	*/ 
	width:215px;
	height:160px;
	overflow:hidden; 
	
	/* HIDE <li> AT INIT  >>> are set visible through jQuery */
	display: none;
	}	

#slider div.newsHeadlines p {
	background:transparent url(../../themes/axept01/images/groove_linie.gif) repeat-x scroll center bottom;
	display:block;
	padding: 2px 0;
	line-height: 15px;
}
#slider div.newsHeadlines p.last {
	background: transparent;
}


p#controls{
	margin: 10px 0 10px 0;
}

/* style="display:block;left:20px;margin:0;overflow:hidden;width:20px;height:20px;text-indent:-8000px;position:absolute;"*/

/*#prevBtn a, #nextBtn a{  
	display:block;
	width:20px;
	height:20px;
	background:url(arr-prev.gif) no-repeat 0 0;	
	}	
#nextBtn a{ 
	background:url(arr-next.gif) no-repeat 0 0;	
	}
*/


</style>
</head>

<body>

<?PHP include("login.php"); ?>
<div id="bg-home">
  <div id="page-section">
  	<?PHP include("header_font.php"); ?>
	<div id="home-mid-section">
		<div id="home-box-sec">
			<div id="home-box-c1">
			  <div id="home-band-head"><span class="home-band-bold">The meeting point</span> of <br />
			  bright candidates &amp; top companies!</div>
			  	<div id="band-menu-sec">
				  <div class="band-menu-bg">
					<div class="band-menu-head">For Candidates</div>
					<div class="left-menu-sec"> 
						<div class="left-menu-pad"><a href="<?PHP echo SITE_URL; ?>view-latest-openings.php" class="lt-menu">View latest Openings</a></div>
						<div class="left-menu-pad"><a href="#" class="lt-menu">Submit your Resume</a></div>
						<div class="left-menu-pad"><a href="#" class="lt-menu">Career Tips</a></div>
						<div class="left-menu-pad"><a href="#" class="lt-menu">Write to Us</a></div>
					</div>
				  </div>
					<div class="band-menu-bg">
					  <div class="band-menu-head">For Companies </div>
					  <div class="left-menu-sec"> 
						<div class="left-menu-pad"><a href="<?PHP echo SITE_URL; ?>post-job.php" class="lt-menu">Post a Job</a></div>
<!--						<div class="left-menu-pad"><a href="<?PHP echo SITE_URL; ?>view-latest-openings.php" class="lt-menu">Positions Available</a></div>
-->						<div class="left-menu-pad"><a href="#" class="lt-menu">International Recruitment</a></div>
						<div class="left-menu-pad"><a href="#" class="lt-menu">Student Jobs</a></div>
					 </div>
				   </div>
			  </div>
			</div>
			<div id="home-box-c2"><img src="knpic/home-top.jpg" alt="" width="440" height="389" /></div>
		</div>
	  <div id="grey-box-sec">
	  	<div id="grey-box-bg">
	  	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td rowspan="2" align="left" valign="top">
			  	<div class="grey-box-c1">
				  <div class="grey-box-h">Reasons why you should <br /> chose the services of Kidston </div>
					  <div class="grey-box-txt">
					  	<div class="bullet-home">The best jobs from top companies</div>
						<div class="bullet-home">Ability to upload multiple resumes</div>
						<div class="bullet-home">Receive regular job alerts through email</div>
						<div class="bullet-home">Resume database accessed by top companies</div>
						<div class="bullet-home">Get useful career tips from our experts  </div>
					  </div>	
		  	  </div>			  </td>
              <td width="1" align="left" valign="top" class="v-dot"></td>
              <td align="left" valign="top">
				<div class="grey-box-c2">
						<div class="grey-box-h">Job Openings</div>
								<div class="grey-box-txt">
					  <?PHP
					  $cur_date = date("Y-m-d");
							$sql_image_pg = "(select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_type,jm.job_duration,jm.job_brief,jm.job_desc,jm.job_salary,jm.job_atype,jm.job_response,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status,cm.comp_name, 'a' as a from job_details jm, company_details cm where jm.job_atype <> 'Intern' and  jm.status = 'Y' and cm.status ='Y' and jm.org_id = cm.ID and (jm.apply_date >= '$cur_date' or jm.job_asap='asap') order by jm.ID desc limit 0,10) UNION (select jm.ID,jm.org_id,jm.job_code,jm.job_title,jm.job_type,jm.job_duration,jm.job_brief,jm.job_desc,jm.job_salary,jm.job_atype,jm.job_response,jm.job_skillz,jm.location,jm.cont_pname,jm.cont_pemail,DATE_FORMAT(jm.apply_date,'%D %M, %Y') as dd,jm.admin_id,jm.status,cm.comp_name, 'b' as a from job_details jm, company_details cm where jm.job_atype = 'Intern' and  jm.status = 'Y' and cm.status ='Y' and jm.org_id = cm.ID and (jm.apply_date >= '$cur_date' or jm.job_asap='asap') order by jm.ID desc limit 0,10)";
						$fjob = $db->getTableArray($sql_image_pg);
						//echo $sql_image_pg;
						if(count($fjob)>0)
						{ // if
						?>
										<div id="slider">
										<ul>
						
												<li class='sliderblock first'>
												<div class='newsHeadlines'>
						<?PHP
							for($j=0;$j<count($fjob);$j++)
							{ //for
						
						
				$liclass = "sliderblock";
						?>
													<p>
														<div class="bullet-slide">
						<?PHP
						if($fjob[$j]["a"] == "a")
						{
						?>
						<a href="<?PHP echo "job/".$fjob[$j]["ID"]."/".$db->stringToUrlSlug(html_entity_decode($fjob[$j]["job_title"]));?>" class="job-link"><?PHP echo html_entity_decode($fjob[$j]["job_title"]); ?></a>
						<?PHP
						}
						if($fjob[$j]["a"] == "b")
						{
						?>
						<a href="<?PHP echo "intern/".$fjob[$j]["ID"]."/".$db->stringToUrlSlug(html_entity_decode($fjob[$j]["job_title"]));?>" class="job-link"><?PHP echo html_entity_decode($fjob[$j]["job_title"]); ?></a>
						<?PHP
						}
						?>
														</div>
				   									</p>
			<?PHP
			if((($j+1) % 5) == 0)
			{
			?>
												</div>
												</li>
			<?PHP
			if(count($fjob) > ($j+1))
			{
			?>
												<li class='sliderblock'>
												<div class='newsHeadlines'>
			<?PHP
			}
			}
			?>		
						<?PHP
					  		} // for
						?>
												</div>
												</li>
										</ul>
										</div>
						<?PHP
					   } // if
					   ?>
						</div>
				</div>
			  </td>
            </tr>
            <tr>
              <td width="1" align="left" valign="top" class="v-dot"></td>
              <td height="60" align="left" valign="middle" class="foot-icon-sec">
					<div class="foot-icon-txt">Connect with us </div>
					<div class="foot-icon-pic"><a href="https://twitter.com/kidstongmbh" target="_blank"><img src="knpic/icon-bird.gif" alt="" width="36" height="36" border="0" /></a></div>
					<div class="foot-icon-pic"><a href="https://www.xing.com/net/kidston" target="_blank"><img src="knpic/icon-in.gif" alt="" width="36" height="36" border="0" /></a></div>
					<div class="foot-icon-pic"><a href="https://www.facebook.com/pages/KIDSTON/259889204512" target="_blank"><img src="knpic/icon-f.gif" alt="" width="36" height="36" border="0" /></a></div>
			  </td>
            </tr>
          </table>
	  	</div>
	  </div>
	</div>
    <div id="foot-sec"> <span class="copyright">Copyright © <script language="javascript" type="text/javascript">
var now = new Date();
var d = now.getFullYear();
document.write(d);
	    </script> KIDSTON. All rights reserved.</span> <a href="javascript:void(0)" class="foot-link">Disclaimer</a>
		  <!--<a href="javascript:void(0)" class="foot-link">Terms of Use</a>	<a href="javascript:void(0)" class="foot-link">Privacy Policy</a>-->
	</div>
  </div>
</div>
</body>
</html>