<table width="100%" cellpadding="2" cellspacing="2" border="0">
<tr>
<!--<td width="250" align="left" valign="top"><?PHP //include("support/home_left_menu.php");?>	</td>-->
<td><table width="100%" cellpadding="0" cellspacing="0" border="0">
<form name="frm_con" id="frm_con" action="process_r/subcat_save.php" method="post" enctype="multipart/form-data" onsubmit="return subcat_validation(this);">
		  <tr>
		  <td><span class="ora-white-head">Home</span> <span class="ash-head">> Subcategory </span></td>
		  <td width="10">&nbsp;</td>
		  <td width="287" height="35" align="right" valign="middle" class="blue-bg-link"></td>
		  </tr>
          <tr>
		  <td height="35" colspan="3" align="center"><strong>Create [ </strong>or<strong> ] Edit the Sub Category</strong> </td>
		  </tr>	
		  <tr>
		    <td>&nbsp; </td>
		    <td>&nbsp;</td>
		    <td height="35" align="left" valign="middle"><div style="float:right"><?PHP if($_GET['act'] == "edit") { ?><a href="./_sa.php?src=<?PHP echo $_GET[src]; ?>&ssrc=<?PHP echo $_GET[ssrc]; ?>&page=<?PHP echo $_GET[page]; ?>" class="link">Create New</a> <?PHP } ?></div></td>
	      </tr>
		  <tr>
		<td width="130">&nbsp;</td>
		<td>&nbsp;</td>
		<td height="35" align="left" valign="middle" class="blue-bg-link">
		<?PHP
		$LID = "";
		if($_GET['act'] == "edit")
		{
			$sql_edit = "select ID,LID,subcat_name,subcat_img,subcat_description,subcat_title,subcat_status from subcat_master where ID = ".$_GET['id'];
			$fetch_edit = $db->fetchSingleRow($sql_edit);
			if(count($fetch_edit) > 0 )
			{
				$edit_id = $fetch_edit["ID"];
				$LID = $fetch_edit["LID"];
				$edit_subcat_name = htmlspecialchars($fetch_edit["subcat_name"]);
				$edit_subcat_status = $fetch_edit["subcat_status"];
				$edit_banner_image= $fetch_edit["subcat_img"];
				$edit_subcat_title = htmlspecialchars($fetch_edit["subcat_title"]);
				$edit_subcat_description = $fetch_edit["subcat_description"];
			}
		}
		
		if($_GET['resmsg'] == "S")
		{
			echo "<font color=green><b>Record has been created successfully!</b></font>";
		}
		if($_GET['resmsg'] == "IE")
		{
			echo "<font color=red><b>Uploaded File type Error. Upload JPG file.</b></font>";
		}
		if($_GET['resmsg'] == "UBI")
		{
			echo "<font color=green><b>Record has been created successfully! </b></font><font color=red><b>Uploaded File type Error. Upload either JPG or GIF.</b></font>";
		}
		if($_GET['resmsg'] == "ups")
		{
			echo "<font color=green><b>Status has been updated successfully.</b></font>";
		}
		if($_GET['resmsg'] == "us")
		{
			echo "<font color=green><b>Record has been updated Successfully!</b></font>";
		}
		if($_GET['resmsg'] == "dl")
		{
			echo "<font color=red><b>Record has been deleted successfully.</b></font>";
		}
		?>&nbsp;		</td>
		</tr>
		
		  <tr>
		    <td height="35" align="left" valign="middle" class="bl-text">Select Lifestyle Line </td>
		    <td align="center" valign="middle"><strong>:</strong></td>
		    <td><select name="life_style_id" class="field" id="life_style_id" onChange="fillSelectFromArray(this.form.subcat_name, ((this.selectedIndex == -1) ? null : SubcatLoad[this.selectedIndex-1]));">
			 <option value=""<?PHP if($LID == ""){?> selected="selected" <?PHP } ?>> - Select Lifestyle - </option>
					<?
					$sqlc = " select ID,lifestyle_line,lifestyle_status from lifestyle_master";
					$sn = 1;
					$resultc = $db->getTableArray($sqlc);
					$count_rs = count($resultc);
					for($i = 0;$i<$count_rs;$i++)
					{ 
					?>
                        <option value="<?PHP echo  $resultc[$i]['ID']; ?>"<?PHP if($LID == $resultc[$i]['ID']){?> selected="selected" <?PHP } ?>><?PHP echo $resultc[$i]['lifestyle_line'];?></option>
					<? }
					 ?>
				</select></td>
	      </tr>
          
		  <tr>
		  <td height="35" align="left" valign="middle" class="bl-text">Name * </td>
		  <td align="center" valign="middle"><strong>:</strong></td>
		  <td>
		  <input type="text" name="subcat_name" id="subcat_name" value="<?PHP echo $edit_subcat_name; ?>" class="field" maxlength="100" />		  </td>
    </tr>
		  <tr>
		  <td height="35" align="left" valign="middle" class="bl-text">Title * </td>
		  <td align="center" valign="middle"><strong>:</strong></td>
		  <td>
		  <input type="text" name="subcat_title" id="subcat_title" value="<?PHP echo $edit_subcat_title; ?>" class="field" />		  </td>
    </tr>
<tr>
      <td height="35" align="left" valign="middle"><p> Description</p></td>
      <td width="10" align="center" valign="top"><strong> :  </strong></td>
      <td>
	  <?PHP
	  		$cnt_1 =  str_replace('##','"',$edit_subcat_description);
	  		$cnt_1 =  str_replace("^","'",$cnt_1);
			$oFCKeditor = new FCKeditor('frm_content_1');
			$oFCKeditor->BasePath	= '../fck/';
			$oFCKeditor->Value		= $cnt_1;
			$oFCKeditor->Create();	
		?>         </td>
    </tr><tr>
		  <td height="35" align="left" valign="middle" class="bl-text"><p>Subcategory Image * </p></td>
		  <td align="center" valign="middle"><strong>:</strong></td>
	<td width="287" valign="middle"> <? if ($edit_banner_image == ""){ ?>
			<input type="file" name="banner_image" id="banner_image" />
			<input type="hidden" name="docup" id="docup" value="Yes">
            <? }else{ ?>
			<?PHP 
			if($edit_banner_image != "")
			{
			$mphoto = getimagesize("../".$edit_banner_image);
			?>		
			<a onmouseover='this.style.cursor="pointer"' onfocus='this.blur();' onClick="document.getElementById('PopUp_<?PHP echo "1"; ?>').style.display = 'block';" class="samp-link">  Existing picture </a>
			<div id='PopUp_1' style="display:none">
			<?PHP		
			}
			?>
<table width="140" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td align="left" valign="top">&nbsp;</td>
			<td align="right" valign="top"><a href="javascript:void(0);" onClick="closepop('1');" class="top-link">Close</a></td>
			<td align="left" valign="top">&nbsp;</td>
			</tr>
			<tr>
			<td align="left" valign="top">&nbsp;</td>
			<td align="left" valign="top"><!--<img src="../<?PHP //echo $comm_img; ?>" width="300" height="300">-->
			<img src="<?PHP echo "../".$edit_banner_image; ?>" <?PHP echo imageResize($mphoto[0],$mphoto[1], 250); ?> align="left" border="0") />			</td>
			<td align="left" valign="top">&nbsp;</td>
			</tr>
			<tr>
			<td width="15" height="10" align="left" valign="top"></td>
			<td align="left" valign="top"></td>
			<td align="left" valign="top"></td>
			</tr>
			</table>			</div>
			     <br> 
			Upload New Image &nbsp;&nbsp;:&nbsp;<input name="banner_image" type="file" class="field" id="banner_image">
			<input type="Hidden" name="banner_hid_image" id="banner_hid_image" value="<?PHP echo $edit_banner_image;?>">
			<? } ?></td>
	</tr>		<tr>
		  <td>Status </td>
		  <td align="center" valign="middle"><strong>:</strong></td>
		  <td height="30">
		  <select name="subcat_status" id="subcat_status" class="field" onchange="home_subcat_status(this);">
		  <option value="0" <?PHP if($edit_subcat_status == "0"){?> selected="selected" <?PHP } ?>>Inactive</option>
		  <option value="1" <?PHP if($edit_subcat_status == "1"){?> selected="selected" <?PHP } ?>>Active</option>		 
		  </select>
		  <?PHP
		  		if($edit_subcat_status == "")
					$edit_subcat_status = "0";
		  ?>
		  <input type="hidden" name="st_val" id="st_val" value="<?PHP echo $edit_lifestyle_status; ?>" />		  </td>
    </tr>
		<tr>
		<td>&nbsp;</td>
		<td align="center" valign="middle">&nbsp; </td>
		<td height="30">
				<input type="hidden" value="<?PHP echo $_GET['src']; ?>" name="src" id="src">
				<input type="hidden" value="<?PHP echo $_GET['ssrc']; ?>" name="ssrc" id="ssrc">
				<input type="hidden" value="<?PHP echo $_GET['page']; ?>" name="page" id="page">
				<input type="hidden" value="<?PHP echo $_GET['id']; ?>" name="bid" id="bid">
				<?PHP
				if($_GET['act'] == "edit")
				{	
				?>
				<input type="submit" name="btsave" id="btsave" class="field" value="Update">
				<?PHP
				}
				else
				{
				?>
				<input type="submit" name="btsave" id="btsave" class="field" value="Submit">
				<?PHP
				}
				?>
<!--		<input name="reset" type="reset" class="field-button" value="Reset" />
-->				</td>
		</tr>
  </form>
		</table>

</td>
</tr>
<tr>
<!--<td>&nbsp;</td>-->
<td height="60">&nbsp;</td>
</tr>
<tr>
<!--<td>&nbsp;</td>-->
<td> 
<!--to insert table here-->
<table width="100%"  cellspacing="1" cellpadding="1" border="0" class="table-brdr">
		<tr>
    <td height="40" align="left" valign="middle" bgcolor="#FFFFFF">
	<div style="float: left; padding-left:15px;"><strong>List of Sub Category(s)</strong></div>
	<div style="float: right;">
	 <?PHP	  
	
			// This is the code for listing the archives...
			$page = $_GET['page'];
			$limit = 10;
			
			$sql_image_pg = "select ID,LID,subcat_name,subcat_img,subcat_status from subcat_master";
			//$sql_image_inact = "select * from tbl_homeimage where status='N'";
						
		
			/*$rs_pg = @mysql_query($sql_image_pg,$dblink);
			$count_pg = @mysql_num_rows($rs_pg);*/
			
			$fetch_image = $db->getTableArray($sql_image_pg);
			$count_pg = count($fetch_image);
			
			//$fetch_image_arr = parent::getTableArray($sql_image_inact);
			//$count_inact = count($fetch_image_arr);
						
			$pager  = $db->getPagerData($count_pg, $limit, $page);  
			$offset = $pager->offset;  
			$limit  = $pager->limit;  
			$page   = $pager->page;
			//echo $sql_image_pg;
			
		if($count_pg > 0)
		{ // # cp1
?>

<span style="float:right; padding-right:15px;">

<?PHP
		if ($page == 1) // this is the first page - there is no previous page  
		echo "<span class='pg-menu-sel'>&#9668;</span>&nbsp;";  
		else            // not the first page, link to the previous page  
		echo "<a href=\"?src=".$_GET["src"]."&ssrc=".$_GET["ssrc"]."&orderby=".$order_by."&page=" . ($page - 1) ."\" class='pg-menu'>&#9668;</a>&nbsp;";  
		
//for ($i = 1; $i <= $pager->numPages; $i++) {  

//if ($i == $pager->page) 
?>
<span class="red-txt">&nbsp;Page <?php echo $page; ?> of <?php echo $pager->numPages; ?>&nbsp; Page(s)&nbsp;</span>
<?PHP 
		if ($page == $pager->numPages) // this is the last page - there is no next page  
		echo "<span class='pg-menu-sel'>&#9658;</span>";  
		else            // not the last page, link to the next page  
		echo "<a href=\"?src=".$_GET["src"]."&ssrc=".$_GET["ssrc"]."&orderby=".$order_by."&page=" . ($page + 1) ."\" class='pg-menu'>&#9658;</a>";
?>
</span>
<?PHP
		} // # cp1
?>	
	</div>	</td>
    </tr>
		<tr>
		  <td height="40" align="left" valign="middle"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
            <?PHP
		if($count_pg > 0)
		{ // # cp2
?>
            <tr class="title">
              <td width="50" height="30" align="center" valign="middle"><strong>#</strong></td>
              <td align="center" valign="middle"><strong>Lifestyle </strong></td>
              <td align="center" valign="middle"><strong> Subcategory Name</strong></td>
              <td width="100" align="center" valign="middle"><strong>Status</strong></td>
              <td width="150" align="center" valign="middle"><strong>Action</strong></td>
            </tr>
            <?PHP		  
			$sql_image = $sql_image_pg." limit $offset, $limit";
			$sn = 1;
			
			$rs_image = $db->getTableArray($sql_image);
			$count_rs = count($rs_image);
			for($i = 0;$i<$count_rs;$i++)
			{ //
			
					$sql_life = "select ID,lifestyle_line,`lifestyle_status` from lifestyle_master where ID = ".$rs_image[$i]['LID'];
					$fetch_life = $db->fetchSingleRow($sql_life);
					if(count($fetch_life) > 0 )
					{
					$life_id = $fetch_life["ID"];
					$life_name = htmlspecialchars($fetch_life["lifestyle_line"]);
					$life_status = $fetch_life["lifestyle_status"];
					}

			
			
?>
            <tr class="row">
              <td height="35" align="center" valign="middle" bgcolor="#FFFFFF"><?PHP echo $sn; ?></td>
              <td align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP 
			echo $life_name;
			?>              </td>
              <td align="left" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><?PHP 
			echo $rs_image[$i]['subcat_name'];
			?>              </td>
              <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding-left: 10px;"><select name="l_status_<?PHP echo $rs_image[$i]['ID']; ?>" id="l_status_<?PHP echo $rs_image[$i]['ID']; ?>" class="field" onchange="home_banner_activate(this,'<?PHP echo $rs_image[$i][ID]; ?>','<?PHP echo $page; ?>');">
                  <option value="0" <?PHP if($rs_image[$i]['subcat_status'] == "0"){?> selected="selected" <?PHP } ?>>Inactive</option>
                  <option value="1" <?PHP if($rs_image[$i]['subcat_status'] == "1"){?> selected="selected" <?PHP } ?>>Active</option>
                </select>
                  <?PHP
		  	if($edit_st == "")
				$edit_st = "0";
		  ?>
                  <input type="hidden" name="st_val_<?PHP echo $rs_image[$i]['ID']; ?>" id="st_val_<?PHP echo $rs_image[$i]['ID']; ?>" value="<?PHP echo $rs_image[$i]['status']; ?>" />
                </a> </td>
              <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="_sa.php?src=<?PHP echo $_GET[src]; ?>&amp;ssrc=<?PHP echo $_GET[ssrc]; ?>&amp;act=edit&amp;id=<?PHP echo $rs_image[$i]['ID']; ?>&amp;page=<?PHP echo $_GET['page']; ?>" class="link">E</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="process_r/subcat_save.php?act=del&amp;id=<?PHP echo $rs_image[$i]['ID']; ?>&amp;src=<?PHP echo $_GET['src']; ?>&amp;page=<?PHP echo $_GET['page']; ?>&amp;ssrc=<?PHP echo $_GET[ssrc]; ?>&amp;del_img=<?PHP echo $rs_image[$i]['banner_image']; ?>" class="link" onclick="return confirm('Are you sure want to delete?');">D</a> &nbsp;&nbsp; </td>
            </tr>
            <?PHP
		$sn +=  1;
			} // #w1
		} // # cp2
		
		else
		{ // # cp2
?>
            <tr class="even">
              <td height="30" colspan="5" align="center" valign="middle" bgcolor="#FFFFFF" class="error"><b>No records found to list here..!</b></td>
            </tr>
            <?PHP
		} // # cp2
?>
            <tr >
              <td height="40" colspan="5" align="right" valign="middle" bgcolor="#FFFFFF"><strong>Note : </strong> U - Upload, E - Edit, D - Delete &nbsp;</td>
              </tr>
          </table></td>
	    </tr>
  </table></td>
</tr>
</table>