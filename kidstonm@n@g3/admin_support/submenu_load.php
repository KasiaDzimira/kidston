<?PHP

	function menu_generate($get_mid,$db)  
	{	
			$lo = $db->getTableArray("select cms.ID as cid,lom.ID, cms.MID, cms.SID, cms.status, lom.menu_name_1, lom.menu_name_2, lom.menu_name_3 from cms_master cms, level_one_master lom where cms.SID = lom.ID and cms.SSID = 0 and cms.MID='$get_mid' order by cms.status");	
					
			$lt = $db->getTableArray("select cms.ID as cid, cms.MID, cms.SID,cms.SSID,cms.status,ltm.ID,ltm.menu_name_1,ltm.menu_name_2,ltm.menu_name_3,ltm.SID as lsid from cms_master cms, level_two_master ltm where cms.SID=ltm.SID and cms.TL_ID = 0 and cms.SSID = ltm.ID and cms.MID='$get_mid'");	
											
			$lth = $db->getTableArray("select cms.ID as cid, cms.MID, cms.SID,ltm.SID as lsid, cms.SSID, cms.TL_ID, cms.status, ltm.ID, ltm.menu_name_1,ltm.menu_name_2,ltm.menu_name_3, ltm.SID as lsid from cms_master cms, level_three_master ltm where cms.TL_ID = ltm.ID and cms.MID='$get_mid'");	
			
			//if(count($lo) > 0)
			//{//count
		?>
		<ul>
		<?PHP
			for($i=0;$i<count($lo);$i++)
			{// for i	
				if($lo[$i]["status"] == "N")
				 {
		?>			
		<li><a style="width:150px;" href="?cmsid=<?PHP echo $lo[$i][cid]; ?>&mid=<?php echo $get_mid; ?>&act=edit&src=cms"><font color="#FFFFFF"><?PHP echo $lo[$i]["menu_name_1"]." : ".$lo[$i]["menu_name_2"]." : ".$lo[$i]["menu_name_3"]; ?></font><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
		<?PHP
				}
				else
				{
		?>
   	    <li><a style="width:150px" href="?cmsid=<?PHP echo $lo[$i][cid]; ?>&mid=<?php echo $get_mid; ?>&act=edit&src=cms"><?PHP echo $lo[$i]["menu_name_1"]." : ".$lo[$i]["menu_name_2"]." : ".$lo[$i]["menu_name_3"]; ?><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
		<?PHP
				}
		?>	
	<ul style="left:170px;">
<?PHP 		
					for($j=0;$j<count($lt);$j++)
					  {// for j
							if($lo[$i]["ID"] == $lt[$j]["lsid"])
							{//if check j 						
?>					
						<li><a style="width:150px;" href="?cmsid=<?PHP echo $lt[$j][cid]; ?>&sid=<?PHP echo $lt[$j][lsid]; ?>&mid=<?php echo $get_mid; ?>&act=edit&src=cms">
						
						<?PHP
						
						// This coding for change the status Inacvite color change... 
							if($lt[$j]["status"] == "N")
							{
						?>
								<font color="#FFFFFF";>
						<?PHP
								 echo $lt[$j]["menu_name_1"]." : ".$lt[$j]["menu_name_2"]." : ".$lt[$j]["menu_name_3"];	
						?>
							    </font>
						<?PHP 
						     } 
							 else { 
								 echo $lt[$j]["menu_name_1"]." : ".$lt[$j]["menu_name_2"]." : ".$lt[$j]["menu_name_3"];	
							 } 
						?>						
						<!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul style="left:170px;">
		<?PHP 		
					for($k=0;$k<count($lth);$k++)
					  {// for k	
							if($lt[$j]["ID"] == $lth[$k]["SSID"])
							{//if check k							
?>					
						<li><a style="width:150px;" href="?cmsid=<?PHP echo $lth[$k][cid]; ?>&sid=<?PHP echo $lt[$j][lsid]; ?>&ssid=<?PHP echo $lt[$j][SSID]; ?>&mid=<?php echo $get_mid; ?>&act=edit&src=cms">
						
						<?PHP
						// This coding for change the status Inacvite color change... 
							if($lth[$k]["status"] == "0")
							{
						?>
								<font color="#6633FF";>
						<?PHP
								 echo $lth[$k]["menu_name_1"]." : ".$lth[$k]["menu_name_2"]." : ".$lth[$k]["menu_name_3"];	
						?>
							    </font>
						<?PHP 
						     }
							  else { 
								 echo $lth[$k]["menu_name_1"]." : ".$lth[$k]["menu_name_2"]." : ".$lth[$k]["menu_name_3"];	
							 } 
						?>						
						</a>
	</li>
<?PHP 
					  		}//if check k							
					  }// for k
?>
	  <li><a style="width:150px" href="./?src=cms&sid=<?PHP echo $lo[$i][cid]; ?>&ssid=<?PHP echo $lt[$j][SSID]; ?>&tid=<?PHP echo $lth[$k][TL_ID]; ?>&mid=<?php echo $get_mid; ?>">Create NEW</a></li>
	  <li><a style="width:150px" href="./?src=changeorder&sid=<?PHP echo $lo[$i][cid]; ?>&ssid=<?PHP echo $lt[$j][SSID]; ?>&tid=<?PHP echo $lth[$k][TL_ID]; ?>&mid=<?php echo $get_mid; ?>">Change Order</a></li>
	  </ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
	</li>		
	 <?php
			}//if check j	
		}// for j	
	 ?>					
	    <li style="width:280px;"><a style="width:150px" href="./?src=cms&sid=<?PHP echo $lo[$i][cid]; ?>&ssid=<?php echo $lt[$j][SSID]; ?>&mid=<?php echo $get_mid; ?>">Create NEW</a></li>
	    <li style="width:280px;"><a style="width:150px" href="./?src=changeorder&sid=<?PHP echo $lo[$i][cid]; ?>&ssid=<?php echo $lt[$j][SSID]; ?>&mid=<?php echo $get_mid; ?>">Change Order</a></li>

	  </ul>	<!--[if lte IE 6]></td></tr></table></a><![endif]-->				
		  </li>		
	   <?PHP
			}// for i
			//}//count
		?>
		<li style="width:180px;"><a style="width:150px" href="./?src=cms&sid=<?PHP echo $lo[$i][cid]; ?>&mid=<?php echo $get_mid; ?>">Create NEW</a></li>
		<li style="width:180px;"><a style="width:150px" href="./?src=changeorder&sid=<?PHP echo $lo[$i][cid]; ?>&mid=<?php echo $get_mid; ?>">Change Order</a></li>
		</ul>
<?PHP
	}
//-------------------------------------------------------------------------------------------------------------------
	
function main_menu_link($get_mid,$db)
{//11
		$cms_1 = "select * from cms_master where MID='$get_mid'";
		$cms_val = $db->fetchSingleRow($cms_1);

	//main menu master get the id...
	$cms_f1 = $db->fetchSingleRow("select * from main_menu_master where ID='".$cms_val["MID"]."'");
		
		if($cms_f1) 
		{// main menu folder name
			$mm_name = str_replace(" ","-",$cms_f1["menu_name"]);
					return $mm_name."-".$cms_val[ID]."/".$cms_val["url"].".html";

		}// main menu folder name
		else{
				return "javascript:void(0);";
		}			
}//11	

function main_menu_highliht($get_mid,$get_cmsid,$db)
{//22
		$cms_1 = "select * from cms_master where ID='$get_cmsid'";
		$cms_val = $db->fetchSingleRow($cms_1);
		if($cms_val["MID"] == $get_mid)
		{
			return "id='menu-sel'";
		}
}//22	
?>