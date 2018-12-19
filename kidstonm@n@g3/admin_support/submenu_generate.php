<?PHP
	function menu_generate($get_mid,$db)  
	{	
			$lo = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.url, cms.status, lom.menu_name, mmm.menu_name as fol from cms_master cms, level_one_master lom, menu_master mmm where cms.FL_ID = lom.ID and cms.MID = mmm.ID and cms.SL_ID = 0 and cms.MID='$get_mid' order by lom.priority_no");
			//echo "select cms.ID as cid,cms.MID,cms.FL_ID,cms.status, lom.menu_name from cms_master cms,level_one_master lom where cms.FL_ID = lom.ID and cms.SL_ID = 0 and cms.MID = '1";

			$lt = $db->getTableArray("SELECT cms.ID AS cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.status, ltm.ID, ltm.menu_name, ltm.SID AS lsid FROM cms_master cms, level_two_master ltm WHERE cms.SL_ID = ltm.ID and cms.TL_ID = 0 AND cms.MID ='$get_mid' order by ltm.priority_no");
			//echo "select cms.ID as cid,cms.MID,cms.FL_ID,cms.SL_ID,cms.status,ltm.ID,ltm.menu_name,ltm.FL_ID as lsid from cms_master cms, level_two_master ltm where cms.FL_ID = ltm.ID and cms.SL_ID = 0 and cms.MID = 1";
									
			$lth = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.TL_ID, cms.url, cms.status, ltm.ID, ltm.menu_name, ltm.SID as lsid from cms_master cms, level_three_master ltm where cms.TL_ID = ltm.ID and cms.MID='$get_mid' order by ltm.priority_no");	
			//echo "select cms.ID sas cid,cms.MID,cms.FL_ID,cms.SL_ID,cms.TL_ID,cms.status,tltm.ID,tltm.menu_name,tltm.FL_ID,tltm.SL_ID as lsid from cms_master cms, level_three_master tltm where cms.FL_ID = tltm.FL_ID and cms.SL_ID = tltm.SL_ID and cms.TL_ID = 0 and cms.MID = '$get_mid'";
			
			//if(count($lo) > 0)
			//{//count
			
		?>
<!--		<ul>
-->		<?PHP
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
				if($lo[$i]["status"] == "N")
				 {
		?>		
		<a style="width:<?PHP echo $wid1; ?>px;" href="home.php?src=cms&cmsid=<?PHP echo $lo[$i][cid]; ?>&mid=<?PHP echo $get_mid; ?>&mlevel=1&act=edit"><font color="#FF0000"><?PHP echo $lo[$i]["menu_name"]; ?></font></a>
		<?PHP
				}
				else
				{
		?>
   	    <a style="width:<?PHP echo $wid1; ?>px" href="home.php?src=cms&cmsid=<?PHP echo $lo[$i][cid]; ?>&mid=<?PHP echo $get_mid; ?>&mlevel=1&act=edit"><?PHP echo $lo[$i]["menu_name"]; ?></a>
		<?PHP
				}
		?>	
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
						<?PHP
						
						// This coding for change the status Inacvite color change... 
							if($lt[$j]["status"] == "N")
							{
						?>
<a style="width:<?PHP echo $wid2; ?>px;" href="./home.php?src=cms&cmsid=<?PHP echo $lt[$j][cid]; ?>&mid=<?PHP echo $get_mid; ?>&mlevel=2&act=edit"><font color="#FF0000"><?PHP echo $lt[$j]["menu_name"]; ?></font></a>
						<?PHP 
						     } else { 
?>							 
<a style="width:<?PHP echo $wid2; ?>px;" href="./home.php?src=cms&cmsid=<?PHP echo $lt[$j][cid]; ?>&mid=<?PHP echo $get_mid; ?>&mlevel=2&act=edit"><?PHP echo $lt[$j]["menu_name"]; ?></a>
<?PHP
							 } 
						?>						
							
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
						
						// This coding for change the status Inacvite color change... 
							if($lth[$k]["status"] == "N")
							{
						?>
						<a style="width:<?PHP echo $wid3; ?>px;" href="./home.php?src=cms&cmsid=<?PHP echo $lth[$k][cid]; ?>&mid=<?PHP echo $get_mid; ?>&mlevel=3&act=edit"><font color="#FF0000"><?PHP echo $lth[$k]["menu_name"]; ?></font></a>
						<?PHP 
						     } else { 
						?>
						<a style="width:<?PHP echo $wid3; ?>px;" href="./home.php?src=cms&cmsid=<?PHP echo $lth[$k][cid]; ?>&mid=<?PHP echo $get_mid; ?>&mlevel=3&act=edit"><?PHP echo $lth[$k]["menu_name"]; ?></a>
						<?PHP
							 } 
						?>						
	</li>
<?PHP 
					  		}//if check k							
					  }// for k
?>
		<li><a style="width:<?PHP echo $wid3; ?>px" href="./home.php?src=cms&mid=<?php echo $get_mid; ?>&flid=<?PHP echo $lt[$j][FL_ID]; ?>&slid=<?PHP echo $lt[$j][SL_ID]; ?>&mlevel=3&act=new">Add a sub-sub-menu</a></li>
		<li><a style="width:<?PHP echo $wid3; ?>px" href="./home.php?src=slorder&slid=<?PHP echo $lt[$j][SL_ID]; ?>&mlevel=3&act=new">Menu Order</a></li>
	  </ul>
	</li>		
	 <?php
			}//if check j	
		}// for j	
	 ?>					
	    <li><a style="width:<?PHP echo $wid2; ?>px" href="./home.php?src=cms&mid=<?php echo $get_mid; ?>&flid=<?PHP echo $lo[$i][FL_ID]; ?>&mlevel=2&act=new">Add a sub-menu</a></li>
		<li><a style="width:<?PHP echo $wid2; ?>px" href="./home.php?src=florder&flid=<?PHP echo $lo[$i][FL_ID]; ?>&mlevel=2&act=new">Menu Order</a></li>
	  </ul>					
		  </li>	
	
		  </li>	  
	   <?PHP
			}// for i
			//}//count
			
			//if($get_mid == "3")
			//{
		?>
   	   <!-- <li><a style="width:<?PHP //echo $wid1; ?>px" href="./?src=careers&act=new"><strong>Post a Job</strong></a></li>-->
		<?PHP
			//}
		?>
		
		
		
		<li><a style="width:<?PHP echo $wid1; ?>px" href="./home.php?src=cms&mid=<?php echo $get_mid; ?>&mlevel=1&act=new">Add a menu</a></li>
		<li><a style="width:<?PHP echo $wid1; ?>px" href="./home.php?src=morder&mid=<?php echo $get_mid; ?>&mlevel=1&act=new">Menu Order</a></li>

<!--		</ul>
--><?PHP
	}
//-------------------------------------------------------------------------------------------------------------------
?>