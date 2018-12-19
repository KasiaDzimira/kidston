<?PHP 
		if($_GET["mid"] != "" && isset($_GET["mid"]))
		{
			$_GET['mid'];
			$main_mn = $db->fetchSingleRow("select * from menu_master where ID=".$_GET["mid"]);
			$main_id = $main_mn["ID"];
			$main_name = $main_mn["menu_name"];
		}
		if($main_id == "")
		{
?>
<script language="javascript">window.location = "./?src=home";</script>
<?PHP
		die("Main menu not properly selected...");		
		}
		
		
		// This is the code to create new menu...............
		if($_GET["act"] == "new")
		{
		
				$flid = $_GET["flid"];
				$slid = $_GET["slid"];
				$tlid = $_GET["tlid"];
				
				  $sql_fmenu=$db->fetchSingleRow("select * from level_one_master where ID = ".$_GET['flid']);
				  $edit_flname = $sql_fmenu['menu_name'];
				  $edit_flname_g = $sql_fmenu['menu_name_g'];
	
				  $sql_smenu=$db->fetchSingleRow("select * from level_two_master where ID = ".$_GET['slid']);
				  $edit_slname = $sql_smenu['menu_name']; 
				  $edit_slname_g = $sql_smenu['menu_name_g']; 
				  
				  $sql_tmenu=$db->fetchSingleRow("select * from level_three_master where ID = ".$_GET['tlid']);
				  $edit_tlname = $sql_tmenu['menu_name'];  		
				  $edit_tlname_g = $sql_tmenu['menu_name_g'];   		  	 	  
				//...........................................
				//echo "select * from level_one_master where ID = ".$_GET['flid']." ".$sql_fmenu['menu_name'];

		}
		// --------------------------------------------------
		
		
		// This is the code in Edit mode to get the values.....
		if($_GET["act"] == "edit")
		{// edit
				$sqlcms = $db->fetchSingleRow("Select * from cms_master where ID=".$_GET["cmsid"]);
				//echo "Select * from cms_master where ID=".$_GET["cmsid"]."<br>";
				if($sqlcms)
				{// sqlcms
					
					//$main_id = $sqlcms["MID"];
					//$main_name = $sqlcms["MID"]
					
					// Level one name ..................................
					$sqlfm = $db->fetchSingleRow("select * from level_one_master where ID=".$sqlcms["FL_ID"]);
					if($sqlfm)
					{
						$edit_flname = str_replace('##','"',str_replace("^","'",$sqlfm["menu_name"]));
						$edit_flname_g = str_replace('##','"',str_replace("^","'",$sqlfm["menu_name_g"]));
						//$flid = $sqlfm["ID"];
					}
					// --------------------------------------------------------------
					
					// Level two name ..................................
					if($_GET["mlevel"] == "2")
					{
						$sqlsm = $db->fetchSingleRow("select * from level_two_master where ID=".$sqlcms["SL_ID"]);
						if($sqlsm)
						{
							$edit_slname = str_replace('##','"',str_replace("^","'",$sqlsm["menu_name"]));
							$edit_slname_g = str_replace('##','"',str_replace("^","'",$sqlsm["menu_name_g"]));
							//$slid = $sqlsm["menu_name"];
							
						}
						//echo "select * from level_two_master where ID=".$sqlcms["SL_ID"];
					}
					// --------------------------------------------------------------
					
					// Level three name ..................................
					if($_GET["mlevel"] == "3")
					{
						$sqlsm = $db->fetchSingleRow("select * from level_two_master where ID=".$sqlcms["SL_ID"]);
						if($sqlsm)
						{
							$edit_slname = str_replace('##','"',str_replace("^","'",$sqlsm["menu_name"]));
							$edit_slname_g = str_replace('##','"',str_replace("^","'",$sqlsm["menu_name_g"]));
							//$slid = $sqlsm["menu_name"];
						}
					
						$sqltm = $db->fetchSingleRow("select * from level_three_master where ID=".$sqlcms["TL_ID"]);
						if($sqltm)
						{
							$edit_tlname = str_replace('##','"',str_replace("^","'",$sqltm["menu_name"]));
							$edit_tlname_g = str_replace('##','"',str_replace("^","'",$sqltm["menu_name_g"]));
							//$tlid = $sqltm["ID"];
						}
					}
					// --------------------------------------------------------------
					
					
					$flid = html_entity_decode($sqlcms["FL_ID"]);
					$slid = html_entity_decode($sqlcms["SL_ID"]);
					$tlid = html_entity_decode($sqlcms["TL_ID"]);
					
					$edit_title = html_entity_decode(str_replace('##','"',str_replace("^","'",$sqlcms["page_title"])));
					$edit_title_g = html_entity_decode(str_replace('##','"',str_replace("^","'",$sqlcms["page_title_g"])));
					$edit_black_content = html_entity_decode(str_replace('##','"',str_replace("^","'",$sqlcms["banner_content"])));
					$edit_black_content_g = html_entity_decode(str_replace('##','"',str_replace("^","'",$sqlcms["banner_content_g"])));
					$edit_url = html_entity_decode(str_replace('##','"',str_replace("^","'",$sqlcms["url"])));
					$edit_content = str_replace('##','"',str_replace("^","'",$sqlcms["content"]));
					$edit_content_g = str_replace('##','"',str_replace("^","'",$sqlcms["content_g"]));
					$show_topband = "../".html_entity_decode($sqlcms["top_image0"]);
					$edit_topband = html_entity_decode($sqlcms["top_image0"]);
					$edit_topband1 = html_entity_decode($sqlcms["top_image1"]);
					$edit_topband2 = html_entity_decode($sqlcms["top_image2"]);
					$edit_menu_title = html_entity_decode($sqlcms["meta_title"]);
					$edit_menu_title_en = html_entity_decode($sqlcms["meta_title_en"]);
					$edit_menu_content = html_entity_decode($sqlcms["meta_content"]);
					$edit_menu_content_en = html_entity_decode($sqlcms["meta_content_en"]);
					$edit_menu_keyword = html_entity_decode($sqlcms["meta_keyword"]);
					$edit_menu_keyword_en = html_entity_decode($sqlcms["meta_keyword_en"]);
					$edit_project = html_entity_decode($sqlcms["right_project"]);
					$edit_right = html_entity_decode($sqlcms["right_content"]);
					$edit_right_dwld = html_entity_decode($sqlcms["right_dwld"]);
					$edit_status = html_entity_decode($sqlcms["status"]);
					$edit_head_content  = html_entity_decode($sqlcms["head_content"]);
					//$edit_layout  = $sqlcms["layout_sel"];
				}// sqlcms
		}// edit
		
		//.....................................................
		
		
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td align="right" valign="top">
	<?PHP
	if($_GET["act"] == "edit")
	{
	?>	  
	<div style="float:left; padding: 5px 5px 5px 10px;">
	<a href="admin_process/cms_delete.php?cmsid=<?PHP echo $_GET[cmsid]; ?>&act=edit&src=<?PHP echo $_GET[src]; ?>&mlevel=<?PHP echo $_GET[mlevel]; ?>&action=cmsdelete" onclick="return confirm('This will delete submenus too. Are you sure want to remove this menu?');">Remove this menu</a>
	&nbsp;&nbsp;
	<a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($main_name)."/".$_GET[cmsid]."-".trim(strtolower(str_replace(' ','-',$db->stringToUrlSlug($edit_title)))); ?>" target="_blank">View this page online</a>
	</div>
	<?PHP
	}
	?>
	<div style="float:right; padding:10px 10px 0px 0px;">	  
	
	<?PHP
	if($show_topband != "../" && file_exists($show_topband))
	{
	?>
	<img src="<?PHP echo $show_topband; ?>" />
	<?PHP
	}else{
	?>
	No masthead image placed. Image size to be 475 x 125 pixels, Jpeg format
	<?PHP
	}
	?>
	</div>	
	</td>
	</tr>
  <tr>
    <td height="400" align="left" valign="middle">
	
	<table width="100%" border="0" align="left" cellpadding="0" cellspacing="5">
	<form id="frm_cms" name="frm_cms" action="admin_process/menu_save.php" method="post" enctype="multipart/form-data" onsubmit="return cms_validate(this);">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle">
<?PHP
		if($_GET["resmsg"] == "I")
		{
			echo "New menu has been created successfully!";
		}
		if($_GET["resmsg"] == "U")
		{
			echo "Menu has been updated successfully!";
		}
?>	  
		</td>
        </tr>
      <tr>
        <td width="250" height="40" align="left" valign="middle">Main Menu </td>
        <td width="20" align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<input type="hidden" id="menu_main" name="menu_main" class="field-job" maxlength="150" value="<?PHP echo $main_id; ?>">
		<?PHP
				echo "<h4>".$main_name."</h4>";
		?>		</td>
      </tr>
      <tr>
        <td height="40" align="left" valign="middle">Level One Menu </td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<?PHP if($_GET["mlevel"] != "1"){ ?>
		<input type="hidden" id="menu_one" name="menu_one" class="field-job" maxlength="50" value="<?PHP echo $edit_flname; ?>">
		<?PHP
				echo "<h4>".$edit_flname."</h4>";
		 }else{ 
		 ?>
		<input type="text" id="menu_one" name="menu_one" class="field-job" maxlength="50" value="<?PHP echo $edit_flname; ?>">
		<?PHP
			}
		?>		</td>
      </tr>
	   <tr>
        <td height="40" align="left" valign="middle">Level One Menu[German]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<?PHP if($_GET["mlevel"] != "1"){ ?>
		<input type="hidden" id="menu_one_g" name="menu_one_g" class="field-job" maxlength="50" value="<?PHP echo $edit_flname_g; ?>">
		<?PHP
				echo "<h4>".$edit_flname_g."</h4>";
		 }else{ 
		 ?>
		<input type="text" id="menu_one_g" name="menu_one_g" class="field-job" maxlength="50" value="<?PHP echo $edit_flname_g; ?>">
		<?PHP
			}
		?>		</td>
      </tr>
<?PHP
		if($_GET["mlevel"] == "2" || $_GET["mlevel"] == "3")
		{
?>	  
      <tr>
        <td height="40" align="left" valign="middle">Level Two Menu </td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<?PHP if($_GET["mlevel"] != "2"){ ?>
		<input type="hidden" id="menu_two" name="menu_two" class="field-job" maxlength="50" value="<?PHP echo $edit_slname; ?>">
		<?PHP
				echo "<h4>".$edit_slname."</h4>";
		 }else{ 
		 ?>
		<input type="text" id="menu_two" name="menu_two" class="field-job" maxlength="50" value="<?PHP echo $edit_slname; ?>">
		<?PHP
				}
		?>				</td>
      </tr>
	   <tr>
        <td height="40" align="left" valign="middle">Level Two Menu[German]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<?PHP if($_GET["mlevel"] != "2"){ ?>
		<input type="hidden" id="menu_two_g" name="menu_two_g" class="field-job" maxlength="50" value="<?PHP echo $edit_slname_g; ?>">
		<?PHP
				echo "<h4>".$edit_slname_g."</h4>";
		 }else{ 
		 ?>
		<input type="text" id="menu_two_g" name="menu_two_g" class="field-job" maxlength="50" value="<?PHP echo $edit_slname_g; ?>">
		<?PHP
				}
		?>				</td>
      </tr>
<?PHP
		}
		if($_GET["mlevel"] == "3")
		{
?>	  
      <tr>
        <td height="40" align="left" valign="middle">Level Three Menu </td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<input type="text" id="menu_three" name="menu_three" class="field-job" value="<?PHP echo $edit_tlname; ?>">		</td>
      </tr>
	  <tr>
        <td height="40" align="left" valign="middle">Level Three Menu[German]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<input type="text" id="menu_three_g" name="menu_three_g" class="field-job"  value="<?PHP echo $edit_tlname_g; ?>">		</td>
      </tr>
<?PHP
		}
?>	  
      <tr>
        <td height="40" align="left" valign="middle">Page Headline </td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><input type="text" id="menu_title" name="menu_title" class="field-job"  value="<?PHP echo $edit_title; ?>"></td>
      </tr>
	   <tr>
        <td height="40" align="left" valign="middle">Page Headline[German]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><input type="text" id="menu_title_g" name="menu_title_g" class="field-job"  value="<?PHP echo $edit_title_g; ?>"></td>
      </tr>
	  <tr>
        <td height="40" align="left" valign="middle">Black Banner Content </td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><textarea name="banner_content" id="banner_content" class="field-job"><?PHP 
		if($edit_black_content != "")
		{
			echo $edit_black_content;
		}
		?></textarea></td>
      </tr>
	   <tr>
        <td height="40" align="left" valign="middle">Black Banner Content [German]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><textarea name="banner_content_g" id="banner_content_g" class="field-job"><?PHP 
		if($edit_black_content_g != "")
		{
			echo $edit_black_content_g;
		}
		?></textarea></td>
      </tr>
	   <tr>
        <td height="40" align="left" valign="middle">Meta Title</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><input type="text" id="menu_titles_en" name="menu_titles_en" class="field-job"  value="<?PHP echo $edit_menu_title_en; ?>"></td>
      </tr>
	  <tr>
        <td height="40" align="left" valign="middle">Meta Title[Germen]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><input type="text" id="menu_titles" name="menu_titles" class="field-job"  value="<?PHP echo $edit_menu_title; ?>"></td>
      </tr>
	   <tr>
        <td height="40" align="left" valign="middle">Meta Content</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><input type="text" id="menu_contents_en" name="menu_contents_en" class="field-job"  value="<?PHP echo $edit_menu_content_en; ?>"></td>
      </tr>
	  <tr>
        <td height="40" align="left" valign="middle">Meta Content[Germen]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><input type="text" id="menu_contents" name="menu_contents" class="field-job"  value="<?PHP echo $edit_menu_content; ?>"></td>
      </tr>
	  <tr>
        <td height="40" align="left" valign="middle">Meta Keyword</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><input type="text" id="menu_keywords_en" name="menu_keywords_en" class="field-job"  value="<?PHP echo $edit_menu_keyword_en; ?>"></td>
      </tr>
	   <tr>
        <td height="40" align="left" valign="middle">Meta Keyword[Germen]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle"><input type="text" id="menu_keywords" name="menu_keywords" class="field-job"  value="<?PHP echo $edit_menu_keyword; ?>"></td>
      </tr>
    <!-- <tr>
        <td height="40" align="left" valign="middle">Custom URL&nbsp;[ e.g About-Overview ]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<input type="text" id="menu_url" name="menu_url" class="field" maxlength="150" onkeypress="return alphanum(event);" value="<?PHP echo $edit_url; ?>">
		&nbsp;.htm		
		<img src="admin_image/help.gif" alt="Custom URL helps you to create clean html extensions for your links. For best performance of the web page on search engines, split the words with a hypen and include keywords on your URL. Example: bulk-materials-handling.htm" width="11" height="16" border="0" title="Custom URL helps you to create clean html extensions for your links. For best performance of the web page on search engines, split the words with a hypen and include keywords on your URL. Example: bulk-materials-handling.htm" onmouseover="this.style.cursor='help';" /></td>
      </tr>-->
      <tr>
        <td height="40" align="left" valign="middle">Header images </td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<input type="file" id="menu_topband" name="menu_topband" class="field-form-list" >
		&nbsp;Jpeg / Jpg format, 475 x 125 pixels		</td>
      </tr>
    <!-- <tr>
        <td height="40" align="left" valign="middle">Header content</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<textarea id="head_content" name="head_content" rows="5" cols="40" style="width: 50%"><?PHP echo $edit_head_content; ?></textarea>
		</td>
      </tr>-->
     <tr>
        <td height="40" align="left" valign="middle">Body content and images</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<textarea id="menu_content" name="menu_content" rows="5" cols="40" style="width: 50%"><?PHP echo $edit_content; ?></textarea>
		</td>
      </tr>
		 <tr>
        <td height="40" align="left" valign="middle">Body content and images[German]</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<textarea id="menu_content_g" name="menu_content_g" rows="5" cols="40" style="width: 50%"><?PHP echo $edit_content_g; ?></textarea>
		</td>
      </tr>
      <tr>
        <td height="40" align="left" valign="middle">Menu Status</td>
        <td align="center" valign="middle">:</td>
        <td align="left" valign="middle">
		<select id="menu_status" name="menu_status" class="field-job-drp" style="width:90px;">
			<option value="Y" <?PHP if($edit_status == "Y") { ?> selected="selected" <?PHP } ?>>Active</option>
			<option value="N" <?PHP if($edit_status == "N") { ?> selected="selected" <?PHP } ?>>Inactive</option>
		</select></td>
      </tr>
     <tr>
        <td height="40" align="left" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">
		<input type="hidden" id="mlevel" name="mlevel" value="<?PHP echo $_GET[mlevel]; ?>" />
		<input type="hidden" id="h_cms_id" name="h_cms_id" value="<?PHP echo $_GET["cmsid"]; ?>" />
		<input type="hidden" id="h_fl_id" name="h_fl_id" value="<?PHP echo $flid; ?>" />
		<input type="hidden" id="h_sl_id" name="h_sl_id" value="<?PHP echo $slid; ?>" />
		<input type="hidden" id="h_tl_id" name="h_tl_id" value="<?PHP echo $tlid; ?>" />
		<input type="hidden" id="h_topimage" name="h_topimage" value="<?PHP echo $edit_topband; ?>" />
		<input type="hidden" id="h_topimage1" name="h_topimage1" value="<?PHP echo $edit_topband1; ?>" />
		<input type="hidden" id="h_topimage2" name="h_topimage2" value="<?PHP echo $edit_topband2; ?>" />
		<input type="hidden" id="h_rightdwld" name="h_rightdwld" value="<?PHP echo $edit_right_dwld; ?>" />
<?PHP
		if($_GET["act"] == "new")
		{
?>		
		<input type="submit" id="Submit" name="Submit" value="Submit" class="btn-common">
<?PHP
		}
		if($_GET["act"] == "edit")
		{
?>	
		<input type="submit" id="Submit" name="Submit" value="Save" class="btn-common">
<?PHP
		}
?>		</td>
      </tr>
      <tr>
        <td height="40" align="left" valign="middle">&nbsp;</td>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
	  </form>
    </table></td>
  </tr>
</table>
