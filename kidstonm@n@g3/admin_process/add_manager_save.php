<?PHP
session_start(); 
 
		if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
		{
			include("../../inc1ud35/database.mvc.php");
		}else
		{
			include("../../inc1ud35/database.mvc.live.php");
		}
		include("progressing-alert.php");
		ini_set("post_max_size","15M");
		ini_set("upload_max_filesize","15M");
		set_time_limit(0);
		include("../../inc1ud35/class.upload.php");
		// initialize error message
		$resmsg = $db->encode64("0");
		
		
		if($_POST["btsave"] == "Submit" && isset($_POST["btsave"]))
		{// submit		
						
				$dup = $db->fetchSingleRow("select ID from admin_access where username = '".$_POST["frm_uname"]."'");
				if($dup)
				{
						$resmsg = $db->encode64("15");
				}else
				{
						// get the form post values 
						$get_cat = $db->check_input($_POST["admin_id"]);
						$get_email = $db->check_input($_POST["frm_email"]);
						$get_name = $db->check_input($_POST["frm_name"]);
						$get_uname = $db->check_input($_POST["frm_uname"]);
						$get_pass = $db->check_input($_POST["frm_pass"]);
						$get_phone = $db->check_input($_POST["cont_phone"]);
						$get_status = $db->check_input($_POST["frm_status"]);		
						
						$tbl = "admin_access";
												
						$usermaster["admin_type"] = $get_cat;
						if($get_email != "")
							$usermaster["email"] = $get_email;
						$usermaster["name"] = $get_name;
						$usermaster["username"] = $get_uname;
						$usermaster["password"] = md5($get_pass);
						$usermaster["phone"] = $get_phone;
						$usermaster["status"] = $get_status;
						
						
						if(basename($_FILES['file1']['name']) != "")
					    {//base
					   			$handle = new Upload($_FILES['file1']);
								$handle->allowed = array("image/*");
						// then we check if the file has been uploaded properly
							if ($handle->uploaded) 
							{// file1
								$orgfile = "../../uploads/jobs/";
								$dbfile = "uploads/jobs/";
								$newimage = date("Ymdhis").rand(99,999);
							// upload original file
								$handle->jpeg_quality = 100;
								$handle->Process($orgfile);
							if($handle->processed)
							{// org img
								$get_org_image = $dbfile.$handle->file_dst_name;
								$imgsz = getimagesize("../../".$get_org_image);
							// **** profile image ****
								$handle->file_new_name_body = 'job_image'.$newimage;
								$handle->image_resize = true;
								if($imgsz[1] > $imgsz[0])
									$handle->image_ratio_fill = true;
									$handle->image_x = '84';
									$handle->image_y = '83';
									$handle->jpeg_quality = 100;
									$handle->Process($orgfile);
							if($handle->processed)
							$get_prof_image = $dbfile.$handle->file_dst_name;
							
							$handle->clean();
							}
						}//file1
					}//base
					$usermaster["cont_image"] = $get_prof_image;
					$usermaster["cont_image1"] = $get_org_image;	
						$userid = $db->db_insert($tbl,$usermaster);	
						if($userid > 0)
						{	
							$resmsg = $db->encode64("13");
						}
						else
						{
							$resmsg = $db->encode64("0");
						}
				}
		}// submit
	
		
	// Code for status change..........
	if($_REQUEST["act"] == "st")
	{// st
		$status = $db->update_sql("update admin_access set status = '".$_REQUEST["st"]."' where ID = '".$_REQUEST["id"]."'");
		if($status > 0)
				{	
					$resmsg = $db->encode64("13");
				}
				else
				{
					$resmsg = $db->encode64("0");
				}
	}// st
	
	
// Code for delete record..........
	if($_REQUEST["act"] == "del")
	{// st	
		$sql_delete = $db->update_sql("update admin_access set status = 'D' where ID = '".$_REQUEST["id"]."' ");
			if($sql_delete > 0)
			{	
				$resmsg = $db->encode64("13");
			}
			else
			{
				$resmsg = $db->encode64("0");
			}
	}// st
	// --------------------------------	
	
	// code for update the contents....
		if($_POST["btsave"] == "Update" && isset($_POST["btsave"]))
		{// update				
				
				$dup = $db->fetchSingleRow("select ID from admin_access where username = '".$_POST["frm_uname"]."' and ID != '".$_POST["id"]."' ");
				if($dup)
				{
						$resmsg = $db->encode64("15");
				}else
				{						
						// get the form post values 
						$get_cat = $db->check_input($_POST["admin_id"]);
						$get_email = $db->check_input($_POST["frm_email"]);
						$get_name = $db->check_input($_POST["frm_name"]);
						$get_uname = $db->check_input($_POST["frm_uname"]);
						if($_POST["frm_pass"] != "")
						{
							$get_pass = md5($db->check_input($_POST["frm_pass"]));
						}
						else
						{
							$get_pass = $db->check_input($_POST["hpass"]);
						}
						$get_phone = $db->check_input($_POST["cont_phone"]);	
						$get_status = $db->check_input($_POST["frm_status"]);		
						
						$tbl = "admin_access";
						
						$umaster["admin_type"] = $get_cat;
						if($get_email !="")
							$umaster["email"] = $get_email;
						$umaster["name"] = $get_name;
						$umaster["username"] = $get_uname;
						$umaster["password"] = $get_pass;
						$umaster["phone"] = $get_phone;
						$umaster["status"] = $get_status;
						$id = $_REQUEST['id'];
						
					if($_FILES['file1'] != "")
						{ // file up
					
							$dup1 = $db->fetchSingleRow("select cont_image,cont_image1 from admin_access where ID='".$_POST['id']."'");
							
							$f1 = '../../'.$dup1["cont_image"];
							$f2 = '../../'.$dup1["cont_image1"];
							if($dup1["cont_image"] != "")
							{
								unlink($f1);
							}
							
							if($dup1["cont_image1"] != "" )
							{	
								unlink($f2);
							}	
							
							$handle = new Upload($_FILES['file1']);
							$handle->allowed = array("image/*");
							// then we check if the file has been uploaded properly
							if ($handle->uploaded) 
							{// file
								$orgfile = "../../uploads/jobs/";
								$dbfile = "uploads/jobs/";
								$newimage = date("Ymdhis").rand(99,999);
								// upload original file
								$handle->jpeg_quality = 100;
								$handle->Process($orgfile);
										
								if($handle->processed)
								{// org img
											
									$get_org_image = $dbfile.$handle->file_dst_name;
									$imgsz = getimagesize("../../".$get_org_image);
								
								// **** profile image ****
									$handle->file_new_name_body = 'job_image'.$newimage;
									$handle->image_resize = true;
									if($imgsz[1] > $imgsz[0])
										$handle->image_ratio_fill = true;
									$handle->image_x = '84';
									$handle->image_y = '83';
									$handle->jpeg_quality = 100;
									$handle->Process($orgfile);
									if($handle->processed)
										$get_prof_image = $dbfile.$handle->file_dst_name;
										$handle->clean();
								}// org img
						   }//file
					}	// file up
					
					
					$umaster["cont_image"] = $get_prof_image;
					$umaster["cont_image1"] = $get_org_image;
					
						
						$userid = $db->update($tbl,$umaster,"ID = '$id'");	
						//echo $db->last_error." <br> ".$db->last_query;
						if($userid > 0)
						{	
							$resmsg = $db->encode64("13");
						}
						else
						{
							$resmsg = $db->encode64("0");
						}
				}
		}// update
?>
<script language="javascript">window.location = "../home.php?src=<?PHP echo $_REQUEST[src]; ?>&page=<?PHP echo $_REQUEST[page]; ?>&resmsg=<?PHP echo $resmsg; ?>";</script>