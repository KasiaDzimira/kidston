<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>

<link href="admin_includes/kn-style.css" rel="stylesheet" type="text/css" />
<script src="admin_includes/kn-script.js" type="text/javascript"></script>
<script type="text/javascript" src="admin_includes/jquery.js"></script>
<script type="text/javascript" src="admin_includes/menu.js"></script>
<!--<script type="text/javascript" src="admin_includes/country_state.js"></script>
--><script type="text/javascript" src="admin_includes/form_validation.js"></script>

<script type="text/javascript" src="admin_includes/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="admin_includes/ajaxLoad.js"></script>

<!--[if lte IE 7]>
<style type="text/css">
html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->


<!-- TinyMCE -->
<script type="text/javascript" src="admin_includes/tiny/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
		//elements : "frm_short_desc,frm_detail_desc",
		elements : "frm_detail_desc,responsibility,skillz,head_content,menu_content,frm_add_com",
		theme : "advanced",
		extended_valid_elements : "iframe[src|width|height|name|align]",
		convert_urls : false,
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,ibrowser",

		// Theme options
		theme_advanced_buttons1 : "ibrowser,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,|,forecolor,backcolor,|,preview,fullscreen,code,",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
		
	});
</script>
<!-- /TinyMCE -->

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
<div id="bg-home">
  <div id="page-section">
  	<div id="top-section">
		<div id="logo"><img src="../knpic/logo.gif" width="92" height="73" /></div>
		<div id="top-rt-sec">
			
			<div class="top-menu-sec">
			<div class="top-icon-sec">
<!--          <a href="./home.php?src=talents" class="topp-link">Talents</a>
-->           <a href="logout.php" class="topp-link">LOGOUT</a>

            </div>
				<div class="ddsmoothmenu" id="smoothmenu1">
						  
	  <!-- Menu Div Start Here -->
		  <ul><!-- Main UL -->
				<!-- Level One LI -->	
									  <li><!-- Level One LI -->
				<a href="#">ABOUT</a>
				<ul>
				<!--		<ul>
-->					<li>

			   	    <a style="width:150px" href="home.php?src=cms&cmsid=20&mid=1&mlevel=1&act=edit">About us</a>
			
	<ul>
					
	    <li><a style="width:150px" href="./home.php?src=cms&mid=1&flid=20&mlevel=2&act=new">Add a sub-menu</a></li>
		<li><a style="width:150px" href="./home.php?src=florder&flid=20&mlevel=2&act=new">Menu Order</a></li>
	  </ul>					
		  </li>	
	
		  </li>	  
	   			<li>
			   	    <a style="width:150px" href="home.php?src=cms&cmsid=25&mid=1&mlevel=1&act=edit">Our Values</a>

			
	<ul>
					
	    <li><a style="width:150px" href="./home.php?src=cms&mid=1&flid=24&mlevel=2&act=new">Add a sub-menu</a></li>
		<li><a style="width:150px" href="./home.php?src=florder&flid=24&mlevel=2&act=new">Menu Order</a></li>
	  </ul>					
		  </li>	
	
		  </li>	  
	      	   <!-- <li><a style="width:px" href="./?src=careers&act=new"><strong>Post a Job</strong></a></li>-->
				
		
		
		<li><a style="width:150px" href="./home.php?src=cms&mid=1&mlevel=1&act=new">Add a menu</a></li>
		<li><a style="width:150px" href="./home.php?src=morder&mid=1&mlevel=1&act=new">Menu Order</a></li>

<!--		</ul>
-->				</ul>
				</li><!-- Level One LI -->
				  <li><!-- Level One LI -->
				<a href="#">CONTACT</a>
				<ul>
				<!--		<ul>
-->					<li>
			   	    <a style="width:150px" href="home.php?src=cms&cmsid=26&mid=2&mlevel=1&act=edit">Where to find us</a>

			
	<ul>
					
	    <li><a style="width:150px" href="./home.php?src=cms&mid=2&flid=25&mlevel=2&act=new">Add a sub-menu</a></li>
		<li><a style="width:150px" href="./home.php?src=florder&flid=25&mlevel=2&act=new">Menu Order</a></li>
	  </ul>					
		  </li>	
	
		  </li>	  
	      	   <!-- <li><a style="width:px" href="./?src=careers&act=new"><strong>Post a Job</strong></a></li>-->
				
		
		
		<li><a style="width:150px" href="./home.php?src=cms&mid=2&mlevel=1&act=new">Add a menu</a></li>
		<li><a style="width:150px" href="./home.php?src=morder&mid=2&mlevel=1&act=new">Menu Order</a></li>

<!--		</ul>
-->				</ul>
				</li><!-- Level One LI -->
						<li><!-- Level One LI -->
				<a href="javascript:;">COMPANIES</a>
									<ul>
						<li><a style="width:150px;" href="home.php?src=add-comp">Add a Company</a></li>
						<li><a style="width:150px;" href="home.php?src=view-comp">View All Companies</a></li>

<!--					<li><a style="width:127px;" href="#">View Presentations</a></li>
						<li><a style="width:127px;" href="#">View Offers</a></li> -->
<!--						<li><a style="width:127px;" href="javascript:;">Search</a></li>
-->	
			<!--		<ul>
-->					<li>
			   	    <a style="width:150px" href="home.php?src=cms&cmsid=28&mid=4&mlevel=1&act=edit">Our Services</a>
			
	<ul>
					
	    <li><a style="width:150px" href="./home.php?src=cms&mid=4&flid=27&mlevel=2&act=new">Add a sub-menu</a></li>
		<li><a style="width:150px" href="./home.php?src=florder&flid=27&mlevel=2&act=new">Menu Order</a></li>
	  </ul>					
		  </li>	
	
		  </li>	  
	      	   <!-- <li><a style="width:px" href="./?src=careers&act=new"><strong>Post a Job</strong></a></li>-->

				
		
		
		<li><a style="width:150px" href="./home.php?src=cms&mid=4&mlevel=1&act=new">Add a menu</a></li>
		<li><a style="width:150px" href="./home.php?src=morder&mid=4&mlevel=1&act=new">Menu Order</a></li>

<!--		</ul>
-->						
					</ul>
			  				</li><!-- Level One LI -->	
				<li><!-- Level One LI -->
				<a href="javascript:;">JOBS</a>
				<ul>

									
						<li><a style="width:127px;" href="home.php?src=add-job">Add a Job Opening</a></li>
						<li><a style="width:127px;" href="home.php?src=view-job">Manage Job Entries</a></li>
						<li><a style="width:127px;" href="home.php?src=closed-job">Manage Closed Jobs</a></li>
						<li><a style="width:127px;" href="home.php?src=xml_gen">Generate XML</a></li>
<!--						<li><a style="width:127px;" href="home.php?src=view-app">View Applications</a></li>
						
						<li><a style="width:127px;" href="home.php?src=view-app">Requested Openings</a></li>-->
<!--						<li><a style="width:127px;" href="javascript:;">Search</a></li>
-->					
			  			</ul>
				</li><!-- Level One LI -->	
				<li><!-- Level One LI -->

				<a href="javascript:;">CANDIDATES</a>
				<ul>
									
<!--						<li><a style="width:127px;" href="#">View MasterList</a></li>
-->						<li><a style="width:150px;" href="home.php?src=view-applied">View Applied</a></li>
						<li><a style="width:150px;" href="home.php?src=view-selected">View Qualified</a></li>
<!--						<li><a style="width:127px;" href="home.php?src=view-informed">View Informed</a></li>
-->						<li><a style="width:150px;" href="home.php?src=view-invited">View Invited</a></li>
						<li><a style="width:150px;" href="home.php?src=view-presented">View Presented</a></li>

						<li><a style="width:150px;" href="home.php?src=view-hired">View Offered</a></li>
						<li><a style="width:150px;" href="home.php?src=rejected">View Rejected</a></li>
<!--						<li><a style="width:127px;" href="home.php?src=candidate">Talent Section</a></li>
--><!--						<li><a style="width:127px;" href="javascript:;">Search</a></li>
-->					
			   <!--		<ul>
-->					<li>
			   	    <a style="width:150px" href="home.php?src=cms&cmsid=27&mid=3&mlevel=1&act=edit">Career Tips</a>
			
	<ul>
					
	    <li><a style="width:150px" href="./home.php?src=cms&mid=3&flid=26&mlevel=2&act=new">Add a sub-menu</a></li>

		<li><a style="width:150px" href="./home.php?src=florder&flid=26&mlevel=2&act=new">Menu Order</a></li>
	  </ul>					
		  </li>	
	
		  </li>	  
	   			<li>
			   	    <a style="width:150px" href="home.php?src=cms&cmsid=32&mid=3&mlevel=1&act=edit">Work with KIDSTON</a>
			
	<ul>
					
	    <li><a style="width:150px" href="./home.php?src=cms&mid=3&flid=28&mlevel=2&act=new">Add a sub-menu</a></li>
		<li><a style="width:150px" href="./home.php?src=florder&flid=28&mlevel=2&act=new">Menu Order</a></li>

	  </ul>					
		  </li>	
	
		  </li>	  
	      	   <!-- <li><a style="width:px" href="./?src=careers&act=new"><strong>Post a Job</strong></a></li>-->
				
		
		
		<li><a style="width:150px" href="./home.php?src=cms&mid=3&mlevel=1&act=new">Add a menu</a></li>
		<li><a style="width:150px" href="./home.php?src=morder&mid=3&mlevel=1&act=new">Menu Order</a></li>

<!--		</ul>
-->			   </ul>
				</li><!-- Level One LI -->
                <li>

				<a href="#">TALENTS</a>
				                	<ul>
                    	<li><a style="width:150px;" href="home.php?src=talents">Add a Talent</a></li>
<!--                        <li><a style="width:150px;" href="manage-talent.php">Manage Talent</a></li>
-->                    </ul>
				
								</li>
				<li><!-- Level One LI -->
				<a href="javascript:;">ADMIN</a>

				
					<ul>
									
						<li><a style="width:127px;" href="home.php?src=add-manager">Add a Manager</a></li>
						<li><a style="width:127px;" href="home.php?src=view-manager">View Manager List</a></li>
			   						<li><a style="width:127px;" href="home.php?src=add-recruiters">Add a Recruiter</a></li>
						<li><a style="width:127px;" href="home.php?src=view-recruiters">View Recruiter List</a></li>
					
			   	</ul>					
				</li>

		  					
		  </ul><!-- Main UL -->

	  <!-- Menu Div End Here -->
				</div>				
			</div>
		</div>
	</div>
<div id="home-mid-section"><div class="adtitle" align="right">Welcome&nbsp;Kidston&nbsp;|&nbsp;Super Admin</div>

	  <div id="home-box-sec">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="top"><b>Applied Candidates</b></td>
  </tr>

  <tr>
    <td height="50" align="left" valign="top">
	<form name="frm_jcode" id="frm_jcode" action="/kidston/kidstonm@n@g3/home.php" method="post" onSubmit="return validate_applications(this);">
	Job Code : <input type="text" name="frm_jobcode" id="frm_jobcode" class="field-job" maxlength="25">
	<input type="hidden" name="dmmy" id="dmmy" value="" style="display:none;">
	<input type="hidden" name="src" id="src" value="view-applied">
	
	<input type="submit" name="search_submit" id="search_submit" value="Find" class="btn-common">&nbsp;
		</form>

	</td>
  </tr>
  
  
  <tr>
    <td height="35" align="right" valign="top">
	</td>
  </tr>
  <tr>
    <td align="left">

				<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
				  <tr align="center" valign="middle">
					<td width="35" height="35">#</td>
					<td width="500">Candidate Details</td>
					<td>Job Details </td>
					<td width="150">Action</td>
				  </tr>

				  <tr align="center" valign="middle" onmouseover="changeCSS(this,'#FBFBE7','#FCFAF3','#535353');this.style.cursor='pointer'" onmouseout="changeCSS(this,'#F9F9F9','#FCFAF3','#535353');">
					<td width="35" bgcolor="#FFFFFF">1</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Name		: <a href="javascript:void(0)" onclick="window.open('admin_support/view_application_details.php?aid=36','','width=1015,height=450,scrollbars=yes,status=yes')">
Sandra Muster</a><br />
					Email : sandra@muster.ch	 <br />

										Contact Number	: 045643216574</br>
					<br>Resume(s):<br>					 <a href="http://02af716.netsolhost.com/kidston/uploads/candidate/cms_90220100604005487.PDF" target="_blank">Resume 1</a>&nbsp;
										
					</span>					</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Job Code		: K-100209-045<br />

					Apply By Date : 	  </span><br />
					<span class="view-title">Job Title		: Supporter</span>
					</td>
					<td width="150" bgcolor="#FFFFFF">
										<a href="javascript:;" onClick="jform('admin_process/candidate_status.php?apid=36&st=QUALIFIED&src=view-applied&page=&frm_jobcode=&btsave=change');">Qualify</a>&nbsp;&nbsp;
					<a href="javascript:;" onClick="rejform('template.php?apid=36&st=REJECTED&src=view-applied&page=&frm_jobcode=&btsave=change');">Reject</a>
										</td>

				  </tr>
				  <tr align="center" valign="middle" onmouseover="changeCSS(this,'#FBFBE7','#FCFAF3','#535353');this.style.cursor='pointer'" onmouseout="changeCSS(this,'#F9F9F9','#FCFAF3','#535353');">
					<td width="35" bgcolor="#FFFFFF">2</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Name		: <a href="javascript:void(0)" onclick="window.open('admin_support/view_application_details.php?aid=35','','width=1015,height=450,scrollbars=yes,status=yes')">
Moi Ego</a><br />
					Email : aline.wittwer@gmx.ch	 <br />

										Contact Number	: 04564321657</br>
										
					</span>					</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Job Code		: K-100209-047<br />
					Apply By Date : 	  </span><br />
					<span class="view-title">Job Title		: Engineer</span>

					</td>
					<td width="150" bgcolor="#FFFFFF">
										<a href="javascript:;" onClick="jform('admin_process/candidate_status.php?apid=35&st=QUALIFIED&src=view-applied&page=&frm_jobcode=&btsave=change');">Qualify</a>&nbsp;&nbsp;
					<a href="javascript:;" onClick="rejform('template.php?apid=35&st=REJECTED&src=view-applied&page=&frm_jobcode=&btsave=change');">Reject</a>
										</td>
				  </tr>
				  <tr align="center" valign="middle" onmouseover="changeCSS(this,'#FBFBE7','#FCFAF3','#535353');this.style.cursor='pointer'" onmouseout="changeCSS(this,'#F9F9F9','#FCFAF3','#535353');">
					<td width="35" bgcolor="#FFFFFF">3</td>

					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Name		: <a href="javascript:void(0)" onclick="window.open('admin_support/view_application_details.php?aid=32','','width=1015,height=450,scrollbars=yes,status=yes')">
Aline wittwer</a><br />
					Email : aline.wittwer@kidston.ch	 <br />
										Contact Number	: 0746545341324</br>
										
					</span>					</td>

					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Job Code		: K-100209-047<br />
					Apply By Date : 	  </span><br />
					<span class="view-title">Job Title		: Engineer</span>
					</td>
					<td width="150" bgcolor="#FFFFFF">

										<a href="javascript:;" onClick="jform('admin_process/candidate_status.php?apid=32&st=QUALIFIED&src=view-applied&page=&frm_jobcode=&btsave=change');">Qualify</a>&nbsp;&nbsp;
					<a href="javascript:;" onClick="rejform('template.php?apid=32&st=REJECTED&src=view-applied&page=&frm_jobcode=&btsave=change');">Reject</a>
										</td>
				  </tr>
				  <tr align="center" valign="middle" onmouseover="changeCSS(this,'#FBFBE7','#FCFAF3','#535353');this.style.cursor='pointer'" onmouseout="changeCSS(this,'#F9F9F9','#FCFAF3','#535353');">
					<td width="35" bgcolor="#FFFFFF">4</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">

					<span class="smtxt">
					Name		: <a href="javascript:void(0)" onclick="window.open('admin_support/view_application_details.php?aid=23','','width=1015,height=450,scrollbars=yes,status=yes')">
Boris Plesac</a><br />
					Email : boris.plesac@kidston.ch	 <br />
										Contact Number	: 0788889964</br>
					<br>Resume(s):<br>					 <a href="http://02af716.netsolhost.com/kidston/uploads/candidate/cms_80220100354482454.JPG" target="_blank">Resume 1</a>&nbsp;

										
					</span>					</td>
					<td align="left" bgcolor="#FFFFFF" style="padding-left: 10px;">
					<span class="smtxt">
					Job Code		: K-100208-042<br />
					Apply By Date : 	  </span><br />
					<span class="view-title">Job Title		: Onsite Supporter</span>
					</td>

					<td width="150" bgcolor="#FFFFFF">
										<a href="javascript:;" onClick="jform('admin_process/candidate_status.php?apid=28&st=QUALIFIED&src=view-applied&page=&frm_jobcode=&btsave=change');">Qualify</a>&nbsp;&nbsp;
					<a href="javascript:;" onClick="rejform('template.php?apid=28&st=REJECTED&src=view-applied&page=&frm_jobcode=&btsave=change');">Reject</a>
										</td>
				  </tr>
				
	  </table>
      <p>&nbsp;</p>
    <p>&nbsp;</p>

    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>

</table>
	  <br />
	  
	    <br>
<br>
<br>
	  </div>
</div>
    <div id="foot-sec"> <span class="copyright">&copy;&nbsp;<script language="javascript" type="text/javascript">
var now = new Date();
var d = now.getFullYear();
document.write(d);
	    </script> KIDSTON. All rights reserved.</span>    <a href="terms.php" class="foot-link">Terms of Use</a>	<a href="privacy.php" class="foot-link">Privacy Policy</a>

	</div>
  </div>
</div>
</body>
</html>
