<?PHP
	function menu_generate($get_mid,$db)  
	{	
			$lo = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.url, cms.status, lom.menu_name, mmm.menu_name as fol from cms_master cms, level_one_master lom, menu_master mmm where cms.FL_ID = lom.ID and cms.MID = mmm.ID and cms.SL_ID = 0 and cms.MID='$get_mid' and cms.status='Y' order by lom.priority_no");
			
			$lt = $db->getTableArray("SELECT cms.ID AS cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.status, ltm.ID, ltm.menu_name, ltm.SID AS lsid FROM cms_master cms, level_two_master ltm WHERE cms.SL_ID = ltm.ID and cms.TL_ID = 0 AND cms.MID ='$get_mid' and cms.status='Y' order by ltm.priority_no");
									
			$lth = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.TL_ID, cms.url, cms.status, ltm.ID, ltm.menu_name, ltm.SID as lsid from cms_master cms, level_three_master ltm where cms.TL_ID = ltm.ID and cms.MID='$get_mid' and cms.status='Y' order by ltm.priority_no");
			
		?>
		<ul>
		<?PHP
				$wid1 = "150";
				for($i=0;$i<count($lo);$i++)
				{
					if(strlen($lo[$i]["menu_name"]) > 20)
					{
						$wid1 = strlen($lo[$i]["menu_name"]) + 150 + 40 ;
					}
				}
			for($i=0;$i<count($lo);$i++)
			{// for i	
			?>
			<li>
   	    <a style="width:<?PHP echo $wid1; ?>px" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i][cid]."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>"><?PHP echo $lo[$i]["menu_name"]; ?></a>
	<ul>
<?PHP 		
					$wid2 = "150";
					for($j=0;$j<count($fetch_sl);$j++)
					{
					
						if(strlen($fetch_sl[$j]["menu_name"]) > 20)
						{
							$wid2 = strlen($fetch_sl[$j]["menu_name"]) + 150 + 40 ;
						}
					}
			
					for($j=0;$j<count($lt);$j++)
					  {// for j
?>
						<li>
<?PHP					  
							if($lo[$i]["FL_ID"] == $lt[$j]["lsid"])
							{//if check j 						
?>					
<a style="width:<?PHP echo $wid2; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j][cid]."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>"><?PHP echo $lt[$j]["menu_name"]; ?></a>
		<ul>
		<?PHP 	
					$wid3 = "150";
					for($k=0;$k<count($fetch_tl);$k++)
					{
					
						if(strlen($fetch_tl[$k]["menu_name"]) > 20)
						{
							$wid3 = strlen($fetch_tl[$k]["menu_name"]) + 150 + 40 ;
						}
					}
					for($k=0;$k<count($lth);$k++)
					  {// for k	
?>
						<li>
<?PHP					  
					 		//echo $lo[$i]["FL_ID"]." == ".$lth[$k]["ID"];	
							if($lt[$j]["ID"] == $lth[$k]["SL_ID"])
							//if($lo[$i]["FL_ID"]." == ".$lth[$k]["lsid"])
							{//if check k							
						?>
						<a style="width:<?PHP echo $wid3; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>"><?PHP echo $lth[$k]["menu_name"]; ?></a>
	</li>
<?PHP 
					  		}//if check k							
					  }// for k
?>
	  </ul>
	</li>		
	 <?php
			}//if check j	
		}// for j	
	 ?>					
	  </ul>					
		  </li>	
	   <?PHP
			}// for i
		?>
		</ul>
<?PHP
	}
	
function main_menu_link($get_mid,$db)
{
		$cms_master = "select * from cms_master where MID='$get_mid' and status='Y'";
		$cms_val = $db->fetchSingleRow($cms_master);

	//main menu master get the id...
	$cms_f = $db->fetchSingleRow("select * from menu_master where ID='".$cms_val["MID"]."'");
		
		if($cms_f) 
		{// main menu folder name
			//if($cms_f["ID"]=="1"){ $mm_name= "about-us"; }
			//if($cms_f["ID"]=="2"){ $mm_name= "contact-us"; }
			$mm_name = $db->stringToUrlSlug($cms_f["menu_name"]);
			//echo $mm_name = str_replace(" ","-",$cms_f["menu_name"]);
			return $mm_name."/".$cms_val[ID]."-".$db->stringToUrlSlug($cms_val["page_title"]);	
		}// main menu folder name
		else
		{
				return "javascript:void(0);";
		}
}	


function main_menu_highliht($get_mid,$get_cmsid,$db)
{
		$cms_high = "select * from cms_master where ID='$get_cmsid'";
		$cms_hi_val = $db->fetchSingleRow($cms_high);
		if($cms_hi_val["MID"] == $get_mid)
		{
			return "class='selected'";
		}
		else
		{
			//return "class='menu-left'";
		}
}	



//-------------------------------------------------------------------------------------------------------------------

function menu_generate1($get_mid,$db,$cmsid)  
	{	
			$lo = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.url, cms.status, lom.menu_name, mmm.menu_name as fol from cms_master cms, level_one_master lom, menu_master mmm where cms.FL_ID = lom.ID and cms.MID = mmm.ID and cms.SL_ID = 0 and cms.MID='$get_mid' and cms.status='Y' order by lom.priority_no");
			
			$lt = $db->getTableArray("SELECT cms.ID AS cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.status, ltm.ID, ltm.menu_name, ltm.SID AS lsid FROM cms_master cms, level_two_master ltm WHERE cms.SL_ID = ltm.ID and cms.TL_ID = 0 AND cms.MID ='$get_mid' and cms.status='Y' order by ltm.priority_no");
									
			$lth = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.TL_ID, cms.url, cms.status, ltm.ID, ltm.menu_name, ltm.SID as lsid from cms_master cms, level_three_master ltm where cms.TL_ID = ltm.ID and cms.MID='$get_mid' and cms.status='Y' order by ltm.priority_no");
			
		?>
		<ul>
		<?PHP
				$wid1 = "150";
				for($i=0;$i<count($lo);$i++)
				{
					if(strlen($lo[$i]["menu_name"]) > 20)
					{
						$wid1 = strlen($lo[$i]["menu_name"]) + 150 + 40 ;
					}
				}
			for($i=0;$i<count($lo);$i++)
			{// for i	
			?>
			<li>
			<?PHP
				if($_GET['cms_id']==$lo[$i]['cid'])
				{
					?>		
					<font color="#FF0000">1. <?PHP echo $lo[$i]["menu_name"]; ?></font>
					<?PHP
				}
				else
				{
		?>
   	    <a style="width:<?PHP echo $wid1; ?>px" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i]['cid']."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>">1. <?PHP echo $lo[$i]["menu_name"]; ?></a>
		<?PHP
				}
		?>	<br />
<?PHP 		
					$wid2 = "150";
					for($j=0;$j<count($fetch_sl);$j++)
					{
					
						if(strlen($fetch_sl[$j]["menu_name"]) > 20)
						{
							$wid2 = strlen($fetch_sl[$j]["menu_name"]) + 150 + 40 ;
						}
					}
			
					for($j=0;$j<count($lt);$j++)
					  {// for j
?>
<?PHP					  	if($lo[$i]["FL_ID"] == $lt[$j]["lsid"])
							{//if check j 						
?>					
						<?PHP
						
						// This coding for change the status Inacvite color change... 
							if($_GET['cms_id']==$lt[$j]['cid'])
							{
						?>
								<font color="#FF0000" style="padding-left:10px;">2. <?PHP echo $lt[$j]["menu_name"]; ?></font>
						<?PHP 
						     } else { 
?>							 
<a style="width:<?PHP echo $wid2; ?>px; padding-left:10px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j]['cid']."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>">2. <?PHP echo $lt[$j]["menu_name"]; ?></a>
<?PHP
							 } 
						?><br />
	
		
		<?PHP 	
					$wid3 = "150";
					for($k=0;$k<count($fetch_tl);$k++)
					{
					
						if(strlen($fetch_tl[$k]["menu_name"]) > 20)
						{
							$wid3 = strlen($fetch_tl[$k]["menu_name"]) + 150 + 40 ;
						}
					}
					for($k=0;$k<count($lth);$k++)
					  {// for k	
			  
					 		//echo $lo[$i]["FL_ID"]." == ".$lth[$k]["ID"];	
							if($lt[$j]["ID"] == $lth[$k]["SL_ID"])
							//if($lo[$i]["FL_ID"]." == ".$lth[$k]["lsid"])
							{//if check k							
						
						// This coding for change the status Inacvite color change... 
							if($_GET['cms_id']==$lth[$k]['cid'])
							{
						?>
						<font color="#FF0000" style="padding-left:20px;">3. <?PHP echo $lth[$k]["menu_name"]; ?></font>
						<?PHP 
						     } else { 
						?>
						<a style="width:<?PHP echo $wid3; ?>px;padding-left:20px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>">3. <?PHP echo $lth[$k]["menu_name"]; ?></a>
						<?PHP
							 } 
						?>						
<?PHP 
					  		}//if check k							
					  }// for k
?>
	 <?php
			}//if check j	
		}// for j	
	 ?>					
	  </span>					
		  </li>	
	   <?PHP
			}// for i
		?>
		</ul>
<?PHP
	}
?>