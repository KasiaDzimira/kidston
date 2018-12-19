<?PHP		session_start();
		
		ini_set("memory_limit","100M");
		ini_set("post_max_size","100M");
		ini_set("upload_max_filesize","100M");
		ini_set("max_execution_time","9000");
		
		include("../../res/database.mvc.php");
		$db = new Database();
		$resmsg = "in";
		// Code for Save the record...................
			if($_POST["btsave"] == "Submit")
			{// #submit - Save
			$get_LID = $_POST["life_style_id"];
			$get_name = $_POST["subcat_name"];
			$get_desc = $db->check_input($_POST["frm_content_1"]);
			$get_status = $_POST["subcat_status"];
			$get_subcat_title = $_POST["subcat_title"];
			$table_name = "subcat_master";
				if(basename($_FILES["banner_image"]["name"]) != "")
				{// file
					$len = strlen(basename($_FILES["banner_image"]["name"]));
					$lpos = strpos(basename($_FILES["banner_image"]["name"]),".");
					$filename = substr(basename($_FILES["banner_image"]["name"]),$lpos+1,4);
					$str = strtoupper($filename);
					if (($str == "jpg" || $str == "JPG" || $str == "jpeg" || $str == "JPEG" || $str == "swf" || $str == "SWF" || $str == "gif" || $str == "GIF"))
					{// file type
						$save_name = "scat_".date("jmYhis").rand(991,9999);
							if($get_img != "")
							{
								if(file_exists("../../".$get_img))
								{
								unlink("../../".$get_img);
								}
							}
							
						$get_img = 'uploads/subcat/'.$save_name.".".$str;
						$upload_url = '../../uploads/subcat/'.$save_name.".".$str;
						$file_path =SITE_PATH_URL.$get_img;
						move_uploaded_file($_FILES['banner_image']['tmp_name'],$upload_url);
						chmod($file_path,0644);
						}else{
							$get_img ="";
							$n_resmsg = "nS";
						}// file type
				}//file
				
						$insert_subcat["LID"] = $get_LID;
						$insert_subcat["subcat_name"] = $get_name;
						$insert_subcat["subcat_status"] = $get_status;
						$insert_subcat["subcat_img"] = $get_img;
						$insert_subcat["subcat_description"] = $get_desc;
						$insert_subcat["subcat_title"] = $get_subcat_title;
						$lst_id = $db->db_insert($table_name,$insert_subcat);
						//echo "QUERY : ".$db->last_query."<BR>";
						//echo "ERROR : ".$db->last_error."<BR>";
						if($lst_id > 0 )
						{
				//echo $db->last_error;
						$resmsg = "S";
						$n_resmsg = "yS";
					?>
					<script language="javascript">
window.location = "../_sa.php?src=<?PHP echo $_POST[src]; ?>&ssrc=<?PHP echo $_POST[ssrc]; ?>&page=<?PHP echo $_POST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>&n_resmsg=<?PHP echo $n_resmsg;?>";</script>
					<?PHP
						}
					die();
		}// #submit - Save
			if($_POST["btsave"] == "Update")
			{// #submit - Update
			
			$get_id = $_POST["bid"];
			$get_LID = $_POST["life_style_id"];
			$get_name = $_POST["subcat_name"];
			$get_desc = $db->check_input($_POST["frm_content_1"]);
			$get_status = $_POST["subcat_status"];
			$get_subcat_title = $_POST["subcat_title"];
			$get_img = $_POST["banner_hid_image"];
			$table_name = "subcat_master";
				if(basename($_FILES["banner_image"]["name"]) != "")
				{// file
					$len = strlen(basename($_FILES["banner_image"]["name"]));
					$lpos = strpos(basename($_FILES["banner_image"]["name"]),".");
					$filename = substr(basename($_FILES["banner_image"]["name"]),$lpos+1,4);
					$str = strtoupper($filename);
					if (($str == "jpg" || $str == "JPG" || $str == "jpeg" || $str == "JPEG" || $str == "swf" || $str == "SWF" || $str == "gif" || $str == "GIF"))
					{// file type
					
						$save_name = "scat_".date("jmYhis").rand(991,9999);
						if($get_img != ""){
							if(file_exists("../../".$get_img))
							{
								unlink("../../".$get_img);
							}
						}
						$get_img = 'uploads/subcat/'.$save_name.".".$str;
						$upload_url = '../../uploads/subcat/'.$save_name.".".$str;
						$file_path =SITE_PATH_URL.$get_img;
						move_uploaded_file($_FILES['banner_image']['tmp_name'],$upload_url);
						chmod($file_path,0644);
						}else{
							$get_img ="";
							$n_resmsg = "nS";
						}// file type
				}//file
				
						$insert_subcat["LID"] = $get_LID;
						$insert_subcat["subcat_name"] = $get_name;
						$insert_subcat["subcat_status"] = $get_status;
						$insert_subcat["subcat_img"] = $get_img;
						$insert_subcat["subcat_description"] = $get_desc;
						$insert_subcat["subcat_title"] = $get_subcat_title;
			$lst_id =$db->update($table_name, $insert_subcat,"ID ='$get_id'");
			if($lst_id >0){
			$resmsg = "us";
					?>
					<script language="javascript">
window.location = "../_sa.php?src=<?PHP echo $_POST[src]; ?>&ssrc=<?PHP echo $_POST[ssrc]; ?>&page=<?PHP echo $_POST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>
					<?PHP
					die();
				}else{
				$resmsg = "qe";
				?>
					<script language="javascript">
window.location = "../_sa.php?src=<?PHP echo $_POST[src]; ?>&ssrc=<?PHP echo $_POST[ssrc]; ?>&page=<?PHP echo $_POST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>
					<?PHP
					die();
				}
			}// #submit - Update
			
	if($_GET["act"] == "st")
	{// st
		
		$db->update_sql("update subcat_master set subcat_status='".$_GET["st"]."' where ID='".$_GET["bid"]."'");
		$resmsg = "ups";
		?>
<script language="javascript">
window.location = "../_sa.php?src=<?PHP echo $_GET[src]; ?>&ssrc=<?PHP echo $_GET[ssrc]; ?>&page=<?PHP echo $_GET[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>		
		<?PHP
		die();
	}// st
	// --------------------------------	
	// Code for delete record..........
	if($_GET["act"] == "del")
	{// st
			 if($_GET["del_img"] != "")
			 {
					if(file_exists("../../".$_GET["del_img"]))
					{
						unlink("../../".$_GET["del_img"]);
					}
			}
			$db->update_sql("delete from subcat_master where ID='".$_GET["id"]."'");
			$resmsg = "dl";
		//echo "update president_desk set con_status='".$_GET["st"]."' ID='".$_GET["pid"]."'";
		?>
<script language="javascript">
window.location = "../_sa.php?src=<?PHP echo $_GET[src]; ?>&ssrc=<?PHP echo $_GET[ssrc]; ?>&page=<?PHP echo $_GET[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>		
		<?PHP
		die();
	}// st
	// --------------------------------	
?>
