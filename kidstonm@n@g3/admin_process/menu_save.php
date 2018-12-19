<?PHP
session_start();
	
		// Database connection class..............
			if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
			{
				include("../../inc1ud35/database.mvc.php");
			}
			else
			{
				include("../../inc1ud35/database.mvc.live.php");
			}
		$db = new Database();
		include("progressing-alert.php");
		
		// This is the file to save the CMS page content to Database based on the menu level selected......
		
		// Session check.....................
	/*	if($_SESSION["username"] == "" && !isset($_SESSION["username"]))
		{
?>
<script language="javascript">window.location = "home.php?src=4";</script>
<?PHP		
			die("Session expired! Please login..");
		}*/
	/* ------------------------------ Menu create the page in cms submit in start ---------------------------------- */
		// This is the code to create a new menu and content to it.................
		if($_POST["Submit"] == "Submit" && isset($_POST["Submit"]))
		{// if Submit = Submit
		
			$get_mid = $_POST["menu_main"];
			
			$get_flid = "0";
			$get_slid = "0";
			$get_tlid = "0";
			
			if($_POST["h_fl_id"] != "")
				$get_flid = $_POST["h_fl_id"];
			if($_POST["h_sl_id"] != "")
				$get_slid = $_POST["h_sl_id"];
			if($_POST["h_tl_id"] != "")
				$get_tlid = $_POST["h_tl_id"];
				
			if($_POST["mlevel"] == "1")
			{
				//$get_flid = $_REQUEST["h_fl_id"];
				$fl_in["MID"] = $get_mid;
				$fl_in["menu_name"] = $db->check_input($_POST["menu_one"]);
				$fl_in["menu_name_g"] = $db->check_input($_POST["menu_one_g"]);  
				
				$pr = $db->fetchSingleRow("Select max(priority_no) as prno from level_one_master");
				if($pr)
				{
					$priority_no = $pr["prno"] + 1;
				}else{
					$priority_no = 1;
				}
				$fl_in["priority_no"] = $priority_no;
				$fl_in["status"] = "Y";
				
				$get_flid = $db->db_insert("level_one_master", $fl_in);
			}
			
			if($_POST["mlevel"] == "2")
			{
			
				$sl_in["MID"] = $get_mid;
				$sl_in["SID"] = $db->check_input($_POST["h_fl_id"]);
				$sl_in["menu_name"] = $db->check_input($_POST["menu_two"]);
				$sl_in["menu_name_g"] = $db->check_input($_POST["menu_two_g"]);
				$pr = $db->fetchSingleRow("Select max(priority_no) as prno from level_two_master");
				if($pr)
				{
					$priority_no = $pr["prno"] + 1;
				}else{
					$priority_no = 1;
				}
				$sl_in["priority_no"] = $priority_no;
				$sl_in["status"] = "Y";
				
				$get_slid = $db->db_insert("level_two_master", $sl_in);
				
			}
			
			if($_POST["mlevel"] == "3")
			{
			
				$tl_in["MID"] = $get_mid;
				$tl_in["SID"] = $db->check_input($_POST["h_fl_id"]);
				$tl_in["SSID"] = $db->check_input($_POST["h_sl_id"]);
				$tl_in["menu_name"] = $db->check_input($_POST["menu_three"]);
				$tl_in["menu_name_g"] = $db->check_input($_POST["menu_three_g"]);
				$pr = $db->fetchSingleRow("Select max(priority_no) as prno from level_three_master");
				if($pr)
				{
					$priority_no = $pr["prno"] + 1;
				}else{
					$priority_no = 1;
				}
				$tl_in["priority_no"] = $priority_no;
				$tl_in["status"] = "Y";
				
				$get_tlid = $db->db_insert("level_three_master", $tl_in);
			}
			 $cms_in["top_image0"] = "";
				if(basename($_FILES['menu_topband']['name']) != "")
				{// file
					$uploadPath = '../../uploads/';
					$fname = basename($_FILES['menu_topband']['name']);
					$llen = strlen(basename($_FILES['menu_topband']['name']));
					$lpos = strpos(basename($_FILES['menu_topband']['name']),".");
					$lfname = substr(basename($_FILES['menu_topband']['name']),$lpos+1,4);
					$strg = strtoupper($lfname);
					
					if (($strg == "jpg" || $strg == "JPG" || $strg == "jpeg" || $strg == "JPEG" || $strg == "swf" || $strg == "SWF")) 
					{// file type
						$save_name = "cms_".date("jmYhis").rand(991,9999);
						$filepath = $uploadPath."$save_name".".".$strg;
						$ok = move_uploaded_file($_FILES['menu_topband']['tmp_name'],$filepath);
						$cms_in["top_image0"] = "uploads/"."$save_name".".".$strg;
						$file_path =SITE_PATH_URL."uploads/"."$save_name".".".$strg;
						//echo "file_path : ".$file_path."<br>";
						//chmod($file_path,0644);
					}// file type
				}// file
			
			$cms_in["MID"] = $get_mid;
			$cms_in["FL_ID"] = $get_flid;
			$cms_in["SL_ID"] = $get_slid;
			$cms_in["TL_ID"] = $get_tlid;
			$cms_in["page_title"] = $db->check_input($_POST["menu_title"]);
			$cms_in["page_title_g"] = $db->check_input($_POST["menu_title_g"]);
			$cms_in["banner_content"] = $db->check_input($_POST["banner_content"]);
			$cms_in["banner_content_g"] = $db->check_input($_POST["banner_content_g"]);
			$cms_in["meta_title"] = $db->check_input($_POST["menu_titles"]);
			$cms_in["meta_content"] = $db->check_input($_POST["menu_contents"]);
			$cms_in["meta_keyword"] = $db->check_input($_POST["menu_keywords"]);
			
			//$cms_in["url"] = trim($_POST["menu_url"]);
			$cms_in["content"] = $db->check_input_ed($_POST["menu_content"]);
			$cms_in["content_g"] = $db->check_input_ed($_POST["menu_content_g"]);
			//$cms_in["head_content"] = $db->check_input($_POST["head_content"]);
			$cms_in["status"] = $db->check_input($_POST["menu_status"]);
			
			$cms_id = $db->db_insert("cms_master", $cms_in);
			//echo "**".$db->last_query."**";		
			//echo "**".$db->last_error."**";
			
?>
<script language="javascript">
window.location = "../home.php?src=cms&cmsid=<?PHP echo $cms_id; ?>&mid=<?PHP echo $get_mid; ?>&mlevel=<?PHP echo $_REQUEST[mlevel]; ?>&resmsg=I&act=edit";</script>
</script>
<?PHP			
			die('return to previous page failed');
		}// if Submit = Submit
		
		/* ------------------------------ Menu create the page in cms submit in end ---------------------------------- */
		
		
		// This is the code to update the menu content .................
		if($_POST["Submit"] == "Save" && isset($_POST["Submit"]))
		{// if Submit = Save
		
			$get_mid = $_POST["menu_main"];
			
			$get_flid = $_POST["h_fl_id"];
			$get_slid = $_POST["h_sl_id"];
			$get_tlid = $_POST["h_tl_id"];
			$cms_id = $_POST["h_cms_id"];
			
			if($_POST["mlevel"] == "1")
			{
				$fl_in["menu_name"] = $db->check_input($_POST["menu_one"]); 
				$fl_in["menu_name_g"] = $db->check_input($_POST["menu_one_g"]); 
				$db->update("level_one_master", $fl_in, "ID=".$get_flid);
			}
			
			if($_POST["mlevel"] == "2")
			{
				$sl_in["menu_name"] = $db->check_input($_POST["menu_two"]);
				$sl_in["menu_name_g"] = $db->check_input($_POST["menu_two_g"]);
				$db->update("level_two_master", $sl_in, "ID=".$get_slid);
			}
			if($_POST["mlevel"] == "3")
			{
				$tl_in["menu_name"] = $db->check_input($_POST["menu_three"]);
				$tl_in["menu_name_g"] = $db->check_input($_POST["menu_three_g"]);
				$db->update("level_three_master", $tl_in, "ID=".$get_tlid);
			}
			 $cms_in["top_image0"] = $db->check_input($_POST["h_topimage"]);
				if(basename($_FILES['menu_topband']['name']) != "")
				{// file
					$uploadPath = '../../uploads/';
					$fname = basename($_FILES['menu_topband']['name']);
					$llen = strlen(basename($_FILES['menu_topband']['name']));
					$lpos = strpos(basename($_FILES['menu_topband']['name']),".");
					$lfname = substr(basename($_FILES['menu_topband']['name']),$lpos+1,4);
					$strg = strtoupper($lfname);
					
					if (($strg == "jpg" || $strg == "JPG" || $strg == "jpeg" || $strg == "JPEG" || $strg == "swf" || $strg == "SWF")) 
					{// file type
						
						// Delete the old topband image to replace with new one
						if($_POST["h_topimage"] != "" && file_exists("../../".$_POST["h_topimage"]))
						{
							unlink("../../".$_POST["h_topimage"]);
						}
						
						$save_name = "cms_".date("jmYhis").rand(991,9999);
						$filepath = $uploadPath."$save_name".".".$strg;
						$ok = move_uploaded_file($_FILES['menu_topband']['tmp_name'],$filepath);
						$cms_in["top_image0"] = "uploads/"."$save_name".".".$strg;
						$file_path =SITE_PATH_URL."uploads/"."$save_name".".".$strg;
						//echo "file_path : ".$file_path."<br>";
						//chmod($file_path,0644);
					}// file type
				}// file 
			$cms_in["page_title"] = $db->check_input($_POST["menu_title"]);
			$cms_in["page_title_g"] = $db->check_input($_POST["menu_title_g"]);
			$cms_in["banner_content"] = $db->check_input($_POST["banner_content"]);
			$cms_in["banner_content_g"] = $db->check_input($_POST["banner_content_g"]);
			$cms_in["meta_title"] = $db->check_input($_POST["menu_titles"]);
			$cms_in["meta_title_en"] = $db->check_input($_POST["menu_titles_en"]);
			$cms_in["meta_content"] = $db->check_input($_POST["menu_contents"]);
			$cms_in["meta_content_en"] = $db->check_input($_POST["menu_contents_en"]);
			$cms_in["meta_keyword"] = $db->check_input($_POST["menu_keywords"]);
			$cms_in["meta_keyword_en"] = $db->check_input($_POST["menu_keywords_en"]);
			//$cms_in["url"] = trim($_REQUEST["menu_url"]);
			$cms_in["content"] = $db->check_input_ed($_POST["menu_content"]);
			$cms_in["content_g"] = $db->check_input_ed($_POST["menu_content_g"]);
			$cms_in["status"] = $db->check_input($_POST["menu_status"]);
			
			$db->update("cms_master", $cms_in, "ID=".$cms_id);
 			//echo "**".$db->last_query."**"."  ".$cms_id;
			//echo "**".$db->last_error."**"."  ".$cms_id;
			
?>
<script language="javascript">
window.location = "../home.php?src=cms&cmsid=<?PHP echo $cms_id; ?>&mid=<?PHP echo $get_mid; ?>&mlevel=<?PHP echo $_REQUEST[mlevel]; ?>&resmsg=U&act=edit";</script>
</script>
<?PHP			
	}// if Submit = Save
?>