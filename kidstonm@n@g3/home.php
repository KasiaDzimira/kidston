<?PHP 
	include("admin_includes/first_line.php");
	//echo $_SESSION['username'];
	if($_SESSION['username'] == "" && !isset($_SESSION['username']))
	{
		$resmsg = base64_encode("9");
	?>
		<script language="javascript">window.location = "./?resmsg=<?PHP echo $resmsg; ?>";</script>
	<?PHP		
		die("Session expired! Please login...");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>

<link href="admin_includes/kn-style.css" rel="stylesheet" type="text/css" />
<script src="admin_includes/kn-script.js" type="text/javascript"></script>
<script type="text/javascript" src="admin_includes/jquery.js"></script>
<script type="text/javascript" src="admin_includes/menu.js"></script>

<link rel="stylesheet" href="admin_includes/lightbox-style.css" type="text/css" media="screen" />
<script language="javascript" src="admin_includes/lightbox.js" type="text/javascript"></script>
<script language="javascript" src="admin_includes/color.js" type="text/javascript"></script>
<script> 
			$(document).ready(function(){
			
				document.getElementById("watch").style.display = '';
				//Examples of how to assign the ColorBox event to elements
				$(".example6").colorbox({iframe:true, innerWidth:500, innerHeight:408});
				
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
		

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
		elements : "frm_detail_desc,template_desc,responsibility,skillz,head_content,menu_content,frm_add_com,menu_content_g,summary",
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
	      <a href="logout.php" class="topp-link">LOGOUT</a>
            </div>
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
<div id="home-mid-section">
<div class="adtitle" align="right"><a href="home.php?src=add-templates">Manage Templates </a>&nbsp;|&nbsp;Welcome&nbsp;<?PHP echo $_SESSION["name"]; ?>&nbsp;|&nbsp;<?PHP echo $_SESSION["type_name"]; ?></div>
	  <div id="home-box-sec">
	  <?PHP 
	  		//$src = $_REQUEST['src'];
			if($_REQUEST['src'] == "home")
			{
				echo "<span class='success'>Welcome to Kidston Administrator Panel!</span><br><span class='smtxt'>Please use the top menus for further navigation.</span>";
			}	
			if($_REQUEST['src'] == "cms")
			{
				include("form/menu_create.php");
			}	
			if($_REQUEST["src"] == "msg")
			{
				include("admin_support/remove_msg.php");
			}
			if($_REQUEST["src"] == "morder")
			{
				include("admin_support/menu_sort.php");
			}
			if($_REQUEST["src"] == "add-comp")
			{
				include("admin_support/add_company.php");
			}
			if($_REQUEST["src"] == "view-comp")
			{
				include("admin_support/comp_view_master.php");
			}
			if($_REQUEST["src"] == "add-job")
			{
				include("admin_support/add_job.php");
			}
			if($_REQUEST["src"] == "add-language")
			{
				include("admin_support/add_language.php");
			}
			if($_REQUEST["src"] == "view-job")
			{
				include("admin_support/job_view_master.php");
			}
			if($_REQUEST["src"] == "comp-search")
			{
				include("admin_support/company_search.php");
			}
			if($_REQUEST["src"] == "add-manager")
			{
				include("admin_support/add_manager.php");
			}
			if($_REQUEST["src"] == "view-manager")
			{
				include("admin_support/view_manager.php");
			}
			if($_REQUEST["src"] == "add-recruiters")
			{
				include("admin_support/add_recruiters.php");
			}	
			if($_REQUEST["src"] == "view-recruiters")
			{
				include("admin_support/view_recruiters.php");
			}
			if($_REQUEST["src"] == "view-app")
			{
				include("admin_support/view_applications.php");
			}
			if($_REQUEST["src"] == "view-applied")
			{
				include("admin_support/view_applied.php");
			}
			if($_REQUEST["src"] == "view-wlteam")
			{
				include("admin_support/view_talents.php");
			}
			
			if($_REQUEST["src"] == "view-selected")
			{
				include("admin_support/view_selected.php");
			}
			if($_REQUEST["src"] == "view-informed")
			{
				include("admin_support/view_informed.php");
			}
			if($_REQUEST["src"] == "view-invited")
			{
				include("admin_support/view_invited.php");
			}
			if($_REQUEST["src"] == "view-presented")
			{
				include("admin_support/view_presented.php");
			}
			if($_REQUEST["src"] == "view-hired")
			{
				include("admin_support/view_hired.php");
			}
			if($_REQUEST["src"] == "candidate")
			{
				include("admin_support/manage_candidate.php");
			}
			if($_REQUEST["src"] == "closed-job")
			{
				include("admin_support/view_closed_job.php");
			}
			if($_REQUEST["src"] == "rejected")
			{
				include("admin_support/view_rejected.php");
			}
			if($_REQUEST["src"] == "unqualified")
			{
				include("admin_support/view_unqualified.php");
			}
			if($_REQUEST["src"] == "talents")
			{
				include("admin_support/add_talents.php");
			}
			if($_REQUEST["src"] == "xml_gen")
			{
				include("admin_support/xml_gen.php");
			}
			if($_REQUEST["src"] == "add-platforms")
			{
				include("admin_support/add_platforms.php");
			}
			if($_REQUEST["src"] == "add-templates")
			{
				include("admin_support/add_templates.php");
			}
			if($_REQUEST["src"] == "view-deleted")
			{
				include("admin_support/view_deleted.php");
			}
			if($_REQUEST["src"] == "edit-remarks")
			{
				include("admin_support/edit_remarks.php");
			}
			if($_REQUEST["src"] == "add-remarks")
			{
				include("admin_support/add_remarks.php");
			}
			if($_REQUEST["src"] == "view-platform")
			{
				include("admin_support/view_platform.php");
			}
	  ?>
	  <br />
	  
	    <br>
<br>
<br>
	  </div>
</div>
<?PHP include("admin_includes/fooder.php");?>
