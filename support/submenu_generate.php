<?PHP
function url_name()
{
	$url = $_SERVER['SCRIPT_NAME'];
	if( $url ) {
		$url = strrev($url);
		
		$last_slash = strlen($url) - strpos($url,'/') - 1;
		$url = strrev($url);
		//echo $last_slash."<br>";
	//if( $last_slash ) {
		//$file_name = trim(str_replace("/","",substr($url,$last_slash)));
		$file_name = trim(str_replace("/","",$url));
		//}
	}
	//echo $file_name;
	return $file_name;
}

function menu_generate($get_mid,$db)  
	{	
			$lo = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.url, cms.status, lom.menu_name, lom.menu_name_g, mmm.menu_name as fol from cms_master cms, level_one_master lom, menu_master mmm where cms.FL_ID = lom.ID and cms.MID = mmm.ID and cms.SL_ID = 0 and cms.MID='$get_mid' and cms.status='Y' order by lom.priority_no");
			$lt = $db->getTableArray("SELECT cms.ID AS cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.status, ltm.ID, ltm.menu_name, ltm.menu_name_g , ltm.SID AS lsid FROM cms_master cms, level_two_master ltm WHERE cms.SL_ID = ltm.ID and cms.TL_ID = 0 AND cms.MID ='$get_mid' and cms.status='Y' order by ltm.priority_no");
			$lth = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.TL_ID, cms.url, cms.status, ltm.ID, ltm.menu_name ,ltm.menu_name_g , ltm.SID as lsid from cms_master cms, level_three_master ltm where cms.TL_ID = ltm.ID and cms.MID='$get_mid' and cms.status='Y' order by ltm.priority_no");
			
		?>
		<ul>
		<?PHP
				$wid1 = "150";
				for($i=0;$i<count($lo);$i++)
				{
					if($_SESSION["slanguage"] == "1")
					{
						if(strlen($lo[$i]["menu_name_g"]) > 20)
						{
							$wid1 = strlen($lo[$i]["menu_name_g"]) + 150 + 40 ;
						}
					}
					if($_SESSION["slanguage"] == "2")
					{
						if(strlen($lo[$i]["menu_name"]) > 20)
						{
							$wid1 = strlen($lo[$i]["menu_name"]) + 84 + 40 ;
						}
					}
				}
					if($get_mid == "3")
				{
		?>
 			<li><a href="<?PHP echo SITE_URL; ?>view-latest-openings.php">
			<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						echo "Aktuelle Jobs";
					if($_SESSION["slanguage"] == "2")
						echo "Current jobs";
			?>
			</a></li>
		<?PHP
				}
				
				if($get_mid == "4")
				{
					if($_SESSION['lid']!="")
					{
						$pval = "post-job_log.php";
					}
					else
					{ 
						$pval = "post-job.php";
					}
		?>
			<li>
			<?PHP
			if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
			{
			?>
			<a href="<?PHP echo SITE_URL; ?>view_talent.php">Kandidaten finden</a>
			<?PHP
			}
			if($_SESSION["slanguage"] == "2")
			{
			?>
			<a href="<?PHP echo SITE_URL; ?>view_talent.php">Finding candidates</a>
			<?PHP
			}
			?>
			</li>
			<li>
			<?PHP
			if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
			{
			?>
			<a href="<?PHP echo SITE_URL.$pval; ?>">Offene Stellen melden</a>
			<?PHP
			}
			if($_SESSION["slanguage"] == "2")
			{
			?>
			<a href="<?PHP echo SITE_URL.$pval; ?>">Advertising job vacancies</a>
			<?PHP
			}
			?></li>
		<?PHP
			}
			for($i=0;$i<count($lo);$i++)
			{// for i	
		?>
			<li>
			<?PHP
			if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
			{
				if($lo[$i]["menu_name_g"] == "")
				{
				?>
				  <a style="width:<?PHP echo $wid1; ?>px" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i][cid]."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>"><?PHP echo $lo[$i]["menu_name"]; ?></a>
				 <?PHP
				 }
				 else
				 {
				?>
   	    <a style="width:<?PHP echo $wid1; ?>px" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i][cid]."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>"><?PHP echo $lo[$i]["menu_name_g"]; ?></a>
			<?PHP
				}
			}
			if($_SESSION["slanguage"] == "2")
			{
				if($lo[$i]["menu_name"] == "")
				{
				?>
			   	 <a style="width:<?PHP echo $wid1; ?>px" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i][cid]."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>"><?PHP echo $lo[$i]["menu_name_g"]; ?></a>
				<?PHP
				}
				else
				{
				?>	
				<a style="width:<?PHP echo $wid1; ?>px" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i][cid]."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>"><?PHP echo $lo[$i]["menu_name"]; ?></a>
			<?PHP
				}			
			}
			?>
	<ul>
<?PHP 		
					$wid2 = "150";
					//echo count($lt);
					for($j=0;$j<count($fetch_sl);$j++)
					{
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							if(strlen($fetch_sl[$j]["menu_name_g"]) > 20)
							{
								$wid2 = strlen($fetch_sl[$j]["menu_name_g"]) + 150 + 40 ;
							}
						}	
						if($_SESSION["slanguage"] == "2")
						{
							if(strlen($fetch_sl[$j]["menu_name"]) > 20)
							{
								$wid2 = strlen($fetch_sl[$j]["menu_name"]) + 150 + 40 ;
							}
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
				if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
				{
					if($lt[$j]["menu_name_g"] == "" )
					{
				?>	
<a style="width:<?PHP echo $wid2; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j][cid]."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>"><?PHP echo $lt[$j]["menu_name"]; ?></a>
				<?PHP
					}
					else
					{
				?>
<a style="width:<?PHP echo $wid2; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j][cid]."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>"><?PHP echo $lt[$j]["menu_name_g"]; ?></a>
				<?PHP
					}	
				}
				if($_SESSION["slanguage"] == "2")
				{
					if($lt[$j]["menu_name"] == "" )
					{
				?>
<a style="width:<?PHP echo $wid2; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j][cid]."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>"><?PHP echo $lt[$j]["menu_name_g"]; ?></a>
				<?PHP
					}
					else
					{
				?>
<a style="width:<?PHP echo $wid2; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j][cid]."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>"><?PHP echo $lt[$j]["menu_name"]; ?></a>
				<?PHP
					}				
				}
				?>
		<ul>
		<?PHP 	
					$wid3 = "150";
					for($k=0;$k<count($fetch_tl);$k++)
					{
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							if(strlen($fetch_tl[$k]["menu_name_g"]) > 20)
							{
								$wid3 = strlen($fetch_tl[$k]["menu_name_g"]) + 150 + 40 ;
							}
						}
						if($_SESSION["slanguage"] == "2")
						{
							if(strlen($fetch_tl[$k]["menu_name"]) > 20)
							{
								$wid3 = strlen($fetch_tl[$k]["menu_name"]) + 150 + 40 ;
							}
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
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							if($lth[$k]["menu_name_g"] == "" )
							{
						?>
						<a style="width:<?PHP echo $wid3; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>"><?PHP echo $lth[$k]["menu_name"]; ?></a>
						<?PHP
							}
							else
							{
						?>	
						<a style="width:<?PHP echo $wid3; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>"><?PHP echo $lth[$k]["menu_name_g"]; ?></a>
						<?PHP
							}
						}	
						if($_SESSION["slanguage"] == "2")
						{
							if($lth[$k]["menu_name"] == "" )
							{
						?>
						<a style="width:<?PHP echo $wid3; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>"><?PHP echo $lth[$k]["menu_name_g"]; ?></a>
						<?PHP
							}
							else
							{
						?>	
						<a style="width:<?PHP echo $wid3; ?>px;" href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>"><?PHP echo $lth[$k]["menu_name"]; ?></a>
						<?PHP
							}
						}
						?>
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
		<?PHP
			if($get_mid == "1") 
	    { //add resources menu  
	   ?> 
	  		<li>
			<?PHP
			if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
			{
			?>
			<a href="<?PHP echo SITE_URL;?>view-intern.php">Interne Jobs</a>
			<?PHP
			}
			if($_SESSION["slanguage"] == "2")
			{
			?>
			<a href="<?PHP echo SITE_URL;?>view-intern.php">Internal Jobs</a>
			<?PHP
			}
			?></li>
		<?PHP  
		} //add resources menu   
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
			if(url_name() == "view-latest-openings.php" && $get_mid == "3")
				return "class='selected'";
			if(url_name() == "view_talent.php" && $get_mid == "4")
				return "class='selected'";
			if(url_name() == "post-job.php" && $get_mid == "4")
				return "class='selected'";
			if(url_name() == "post-job_log.php" && $get_mid == "4")
				return "class='selected'"; 
			if(url_name() == "view-intern.php" && $get_mid == "1")
				return "class='selected'";
			//return "class='menu-left'";
		}
}	

//-------------------------------------------------------------------------------------------------------------------
function menu_generate1($get_mid,$db,$cmsid)  
	{	
			$lo = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.url, cms.status, lom.menu_name, lom.menu_name_g ,mmm.menu_name as fol from cms_master cms, level_one_master lom, menu_master mmm where cms.FL_ID = lom.ID and cms.MID = mmm.ID and cms.SL_ID = 0 and cms.MID='$get_mid' and cms.status='Y' order by lom.priority_no");
			
			$lt = $db->getTableArray("SELECT cms.ID AS cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.status, ltm.ID, ltm.menu_name, ltm.menu_name_g, ltm.SID AS lsid FROM cms_master cms, level_two_master ltm WHERE cms.SL_ID = ltm.ID and cms.TL_ID = 0 AND cms.MID ='$get_mid' and cms.status='Y' order by ltm.priority_no");
									
			$lth = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.TL_ID, cms.url, cms.status, ltm.ID, ltm.menu_name, ltm.menu_name_g, ltm.SID as lsid from cms_master cms, level_three_master ltm where cms.TL_ID = ltm.ID and cms.MID='$get_mid' and cms.status='Y' order by ltm.priority_no");
			
		?>
		<?PHP
				$wid1 = "150";
				for($i=0;$i<count($lo);$i++)
				{
					if($_SESSION["slanguage"] == "1")
					{
						if(strlen($lo[$i]["menu_name_g"]) > 20)
						{
							$wid1 = strlen($lo[$i]["menu_name_g"]) + 150 + 40 ;
						}
					}	
					if($_SESSION["slanguage"] == "2")
					{
						if(strlen($lo[$i]["menu_name"]) > 20)
						{
							$wid1 = strlen($lo[$i]["menu_name"]) + 150 + 40 ;
						}
					}	

				}
				if($get_mid == "3")
				{
				//echo url_name();
					if(url_name() == "view-latest-openings.php" || url_name() == "job_details.php" || url_name() == "job_apply.php")
					{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="dyn-menu-pad"><span class="dyn-menu-sel">Aktuelle Jobs</span></div>
		<?PHP
		}	
		if($_SESSION["slanguage"] == "2")
		{
		?>
			<div id="dyn-menu-pad"><span class="dyn-menu-sel">Current jobs</span></div>
		<?PHP
		}
					}
					
					else{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
		
 			<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL."view-latest-openings.php";?>" class="dyn-menu">Aktuelle Jobs</a></div>
			<?PHP
		}	
		if($_SESSION["slanguage"] == "2")
		{
		?>
			<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL."view-latest-openings.php";?>" class="dyn-menu">Current jobs</a></div>
		<?PHP
		}
					}
				}
				if($get_mid == "4")
				{
					if($_SESSION['lid']!="")
					{
						$pval = "post-job_log.php";
					}
					else
					{ 
						$pval = "post-job.php";
					}
					if(url_name() == "view_talent.php" || url_name() == "talent_details.php")
					{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="dyn-menu-pad"><span class="dyn-menu-sel">Kandidaten finden</span></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{?>
			<div id="dyn-menu-pad"><span class="dyn-menu-sel">Finding candidates</span></div>
		<?PHP
		}
		?>
		<?PHP
					}else
					{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL."view_talent.php";?>" class="dyn-menu">Kandidaten finden</a></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>	
			<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL."view_talent.php";?>" class="dyn-menu">Finding candidates</a></div>
		<?PHP
		}
		?>
		<?PHP
					}
					if(url_name() == "post-job_log.php" || url_name() == "post-job.php")
					{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="dyn-menu-pad"><span class="dyn-menu-sel">Offene Stellen melden</span></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>		
			<div id="dyn-menu-pad"><span class="dyn-menu-sel">Advertising job vacancies</span></div>
		<?PHP
		}
		?>	
		<?PHP
					}else{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL.$pval; ?>" class="dyn-menu">Offene Stellen melden</a></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>		
			<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL.$pval; ?>" class="dyn-menu">Advertising job vacancies</a></div>
		<?PHP
		}
		?>	
		<?PHP
					}
				}
				
		//intern menu---------------------------------------
						
			for($i=0;$i<count($lo);$i++)
			{// for i	
				if($_GET['cms_id']==$lo[$i]['cid'])
				{
					?>	
					<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
			if($lo[$i]["menu_name_g"] == "")
			{
		?>	
		
					<div id="dyn-menu-pad"><span class="dyn-menu-sel"><?PHP echo $lo[$i]["menu_name"]; ?></span></div>
			<?PHP
			}
			else
			{
		?>	
					<div id="dyn-menu-pad"><span class="dyn-menu-sel"><?PHP echo $lo[$i]["menu_name_g"]; ?></span></div>	
		<?PHP
			}
		}
		if($_SESSION["slanguage"] == "2")
		{
			if($lo[$i]["menu_name"] == "")
			{
		?>				
		<div id="dyn-menu-pad"><span class="dyn-menu-sel"><?PHP echo $lo[$i]["menu_name_g"]; ?></span></div>
		<?PHP
			}
			else
			{
		?>	
		<div id="dyn-menu-pad"><span class="dyn-menu-sel"><?PHP echo $lo[$i]["menu_name"]; ?></span></div>
		<?PHP
			}
		}
		?>			
					<?PHP
				}
				else
				{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
			if($lo[$i]["menu_name_g"] == "")
			{
		?>	
			<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i]['cid']."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>" class="dyn-menu"> <?PHP echo $lo[$i]["menu_name"]; ?></a></div>
			<?PHP
			}
			else
			{
			?>
			<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i]['cid']."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>" class="dyn-menu"> <?PHP echo $lo[$i]["menu_name_g"]; ?></a></div>
			<?PHP
			}
		}
		if($_SESSION["slanguage"] == "2")
		{	
			if($lo[$i]["menu_name"] == "")
			{
		?>	
   	    <div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i]['cid']."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>" class="dyn-menu"> <?PHP echo $lo[$i]["menu_name_g"]; ?></a></div>
		<?PHP
			}
			else
			{
		?>	
   	    <div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i]['cid']."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>" class="dyn-menu"> <?PHP echo $lo[$i]["menu_name"]; ?></a></div>
		<?PHP
			}
		}
		?>
		<?PHP
				}
					$wid2 = "150";
					for($j=0;$j<count($fetch_sl);$j++)
					{
						
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							if(strlen($fetch_sl[$j]["menu_name_g"]) > 20)
							{
								$wid2 = strlen($fetch_sl[$j]["menu_name_g"]) + 150 + 40 ;
							}
						}	
						if($_SESSION["slanguage"] == "2")
						{
							if(strlen($fetch_sl[$j]["menu_name"]) > 20)
							{
								$wid2 = strlen($fetch_sl[$j]["menu_name"]) + 150 + 40 ;
							}
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
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							if($lt[$j]["menu_name_g"] == "")
							{
						?>
						 <div id="dyn-menu-pad2"><span class="dyn-menu2-sel"><?PHP echo $lt[$j]["menu_name"]; ?></span></div>
						 <?PHP
						 	}
							else
							{
						?>	
						 <div id="dyn-menu-pad2"><span class="dyn-menu2-sel"><?PHP echo $lt[$j]["menu_name_g"]; ?></span></div>
						<?PHP	 
							}
						}	
						if($_SESSION["slanguage"] == "2")
						{	
							if($lt[$j]["menu_name"] == "")
							{
						?> 
							 <div id="dyn-menu-pad2"><span class="dyn-menu2-sel"><?PHP echo $lt[$j]["menu_name_g"]; ?></span></div>
						 <?PHP
						 	}
							else
							{
						?>
							<div id="dyn-menu-pad2"><span class="dyn-menu2-sel"><?PHP echo $lt[$j]["menu_name"]; ?></span></div>
							<?PHP
							}	
						 }
						 ?>
						<?PHP 
						     } else { 
?>		
<?PHP
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{	
	if($lt[$j]["menu_name_g"] == "" )
	{
?>					 
<div id="dyn-menu-pad2"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j]['cid']."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>" class="dyn-menu2"><?PHP echo $lt[$j]["menu_name"]; ?></a></div>
<?PHP
	}
	else
	{
?>	
<div id="dyn-menu-pad2"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j]['cid']."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>" class="dyn-menu2"><?PHP echo $lt[$j]["menu_name_g"]; ?></a></div>
<?PHP
	}
}
if($_SESSION["slanguage"] == "2")
{
	if($lt[$j]["menu_name"] == "" )
	{
?>
<div id="dyn-menu-pad2"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j]['cid']."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>" class="dyn-menu2"><?PHP echo $lt[$j]["menu_name_g"]; ?></a></div>
<?PHP
	}
	else
	{
?>	
<div id="dyn-menu-pad2"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j]['cid']."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>" class="dyn-menu2"><?PHP echo $lt[$j]["menu_name"]; ?></a></div>
<?PHP
	}
}
?>
<?PHP
							 } 
					$wid3 = "150";
					for($k=0;$k<count($fetch_tl);$k++)
					{
							if($_SESSION["slanguage"] == "1")
							{
								if(strlen($fetch_tl[$k]["menu_name_g"]) > 20)
								{
									$wid3 = strlen($fetch_tl[$k]["menu_name_g"]) + 150 + 40 ;
								}
							}	
							if($_SESSION["slanguage"] == "2")
							{
								if(strlen($fetch_tl[$k]["menu_name"]) > 20)
								{
									$wid3 = strlen($fetch_tl[$k]["menu_name"]) + 150 + 40 ;
								}
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
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							if($lth[$k]["menu_name_g"] == "")
							{ 
							?>
							<div id="dyn-menu-pad3"><span class="dyn-menu3-sel"><?PHP echo $lth[$k]["menu_name"]; ?></span></div>
							<?PHP
							}
							else
							{
							?>
						<div id="dyn-menu-pad3"><span class="dyn-menu3-sel"><?PHP echo $lth[$k]["menu_name_g"]; ?></span></div>
						<?PHP
							}
						}
						if($_SESSION["slanguage"] == "2")
						{
							if($lth[$k]["menu_name"] == "")
							{ 
						?>
						<div id="dyn-menu-pad3"><span class="dyn-menu3-sel"><?PHP echo $lth[$k]["menu_name_g"]; ?></span></div>
						<?PHP
							}
							else
							{
						?>	
						<div id="dyn-menu-pad3"><span class="dyn-menu3-sel"><?PHP echo $lth[$k]["menu_name"]; ?></span></div>
						<?PHP
							}
						}
						?>
						<?PHP 
						     } else { 
						?>
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							if($lth[$k]["menu_name_g"] == "" )
							{
						?>
						<div id="dyn-menu-pad3"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>" class="dyn-menu3"><?PHP echo $lth[$k]["menu_name"]; ?></a></div>
						<?PHP
							}
							else
							{
						?>	
						<div id="dyn-menu-pad3"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>" class="dyn-menu3"><?PHP echo $lth[$k]["menu_name_g"]; ?></a></div>
						<?PHP
							}	
						}	
						if($_SESSION["slanguage"] == "2")
						{
							if($lth[$k]["menu_name"] == "" )
							{
						?>
						<div id="dyn-menu-pad3"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name_g]); ?>" class="dyn-menu3"><?PHP echo $lth[$k]["menu_name_g"]; ?></a></div>
						<?PHP
							}
							else
							{
						?>		
						<div id="dyn-menu-pad3"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>" class="dyn-menu3"><?PHP echo $lth[$k]["menu_name"]; ?></a></div>
						<?PHP
							}
						}
						?>
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
	   <?PHP
			}// for i
		?>
	<?PHP
	 	if($get_mid == "1")
				{
					if(url_name() == "view-intern.php" || url_name() == "intern_details.php" || url_name() == "intern_apply.php")
					{//if
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="dyn-menu-pad"><span class="dyn-menu-sel">Interne Jobs</span></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>		
			<div id="dyn-menu-pad"><span class="dyn-menu-sel">Internal Jobs</span></div>
		<?PHP
		}
		?>
				<?PHP
				}//if
				else
					{//else
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
				<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL."view-intern.php";?>" class="dyn-menu">Interne Jobs</a></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>			
				<div id="dyn-menu-pad"><a href="<?PHP echo SITE_URL."view-intern.php";?>" class="dyn-menu">Internal Jobs</a></div>
		<?PHP
		}
		?>		
		<?PHP	
					}//else
			}
		?>	
<?PHP
	}
?>
<?PHP
function menu_generate2($get_mid,$db,$cmsid)  
	{	
			$lo = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.url, cms.status, lom.menu_name, lom.menu_name_g ,mmm.menu_name as fol from cms_master cms, level_one_master lom, menu_master mmm where cms.FL_ID = lom.ID and cms.MID = mmm.ID and cms.SL_ID = 0 and cms.MID='$get_mid' and cms.status='Y' order by lom.priority_no");
			
			$lt = $db->getTableArray("SELECT cms.ID AS cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.status, ltm.ID, ltm.menu_name, ltm.menu_name_g, ltm.SID AS lsid FROM cms_master cms, level_two_master ltm WHERE cms.SL_ID = ltm.ID and cms.TL_ID = 0 AND cms.MID ='$get_mid' and cms.status='Y' order by ltm.priority_no");
									
			$lth = $db->getTableArray("select cms.ID as cid, cms.MID, cms.FL_ID, cms.SL_ID, cms.TL_ID, cms.url, cms.status, ltm.ID, ltm.menu_name, ltm.menu_name_g, ltm.SID as lsid from cms_master cms, level_three_master ltm where cms.TL_ID = ltm.ID and cms.MID='$get_mid' and cms.status='Y' order by ltm.priority_no");
			
		?>
		<?PHP
				$wid1 = "150";
				for($i=0;$i<count($lo);$i++)
				{
					if($_SESSION["slanguage"] == "1")
					{
						if(strlen($lo[$i]["menu_name_g"]) > 20)
						{
							$wid1 = strlen($lo[$i]["menu_name_g"]) + 150 + 40 ;
						}
					}	
					if($_SESSION["slanguage"] == "2")
					{
						if(strlen($lo[$i]["menu_name"]) > 20)
						{
							$wid1 = strlen($lo[$i]["menu_name"]) + 150 + 40 ;
						}
					}	

				}
				if($get_mid == "3")
				{
					if(url_name() == "view-latest-openings.php")
					{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="sm-menu-pad"><span class="sm-link1-sel">Aktuelle Jobs</span></div>
		<?PHP
		}	
		if($_SESSION["slanguage"] == "2")
		{
		?>
			<div id="sm-menu-pad"><span class="sm-link1-sel">Current jobs</span></div>
		<?PHP
		}
					}else{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
		
 			<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL."view-latest-openings.php";?>" class="sm-link1">Aktuelle Jobs</a></div>
			<?PHP
		}	
		if($_SESSION["slanguage"] == "2")
		{
		?>
			<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL."view-latest-openings.php";?>" class="sm-link1">Current jobs</a></div>
		<?PHP
		}
					}
				}
				if($get_mid == "4")
				{
					if($_SESSION['lid']!="")
					{
						$pval = "post-job_log.php";
					}
					else
					{ 
						$pval = "post-job.php";
					}
					if(url_name() == "view_talent.php")
					{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="sm-menu-pad"><span class="sm-link1-sel">Kandidaten finden</span></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{?>
			<div id="sm-menu-pad"><span class="sm-link1-sel">Finding candidates</span></div>
		<?PHP
		}
		?>
		<?PHP
					}else
					{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL."view_talent.php";?>" class="sm-link1">Kandidaten finden</a></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>	
			<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL."view_talent.php";?>" class="sm-link1">Finding candidates</a></div>
		<?PHP
		}
		?>
		<?PHP
					}
					if(url_name() == "post-job_log.php" || url_name() == "post-job.php")
					{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="sm-menu-pad"><span class="sm-link1-sel">Offene Stellen melden</span></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>		
			<div id="sm-menu-pad"><span class="sm-link1-sel">Advertising job vacancies</span></div>
		<?PHP
		}
		?>	
		<?PHP
					}else{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL.$pval; ?>" class="sm-link1">Offene Stellen melden</a></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>		
			<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL.$pval; ?>" class="sm-link1">Advertising job vacancies</a></div>
		<?PHP
		}
		?>	
		<?PHP
					}
				}
				
				//INTERN MENU
				
			for($i=0;$i<count($lo);$i++)
			{// for i	
				if($_GET['cms_id']==$lo[$i]['cid'])
				{
					?>	
					<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
			if($lo[$i]["menu_name_g"] == "")
			{
		?>	
		
					<div id="sm-menu-pad"><span class="sm-link1-sel"><?PHP echo $lo[$i]["menu_name"]; ?></span></div>
			<?PHP
			}
			else
			{
		?>	
					<div id="sm-menu-pad"><span class="sm-link1-sel"><?PHP echo $lo[$i]["menu_name_g"]; ?></span></div>	
		<?PHP
			}
		}
		if($_SESSION["slanguage"] == "2")
		{
			if($lo[$i]["menu_name"] == "")
			{
		?>				
		<div id="sm-menu-pad"><span class="sm-link1-sel"><?PHP echo $lo[$i]["menu_name_g"]; ?></span></div>
		<?PHP
			}
			else
			{
		?>	
		<div id="sm-menu-pad"><span class="sm-link1-sel"><?PHP echo $lo[$i]["menu_name"]; ?></span></div>
		<?PHP
			}
		}
		?>			
					<?PHP
				}
				else
				{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
			if($lo[$i]["menu_name_g"] == "")
			{
		?>	
			<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i]['cid']."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>" class="sm-link1"> <?PHP echo $lo[$i]["menu_name"]; ?></a></div>
			<?PHP
			}
			else
			{
			?>
			<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i]['cid']."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>" class="sm-link1"> <?PHP echo $lo[$i]["menu_name_g"]; ?></a></div>
			<?PHP
			}
		}
		if($_SESSION["slanguage"] == "2")
		{	
			if($lo[$i]["menu_name"] == "")
			{
		?>	
   	    <div id="sm-menu-pad"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i]['cid']."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>" class="sm-link1"> <?PHP echo $lo[$i]["menu_name_g"]; ?></a></div>
		<?PHP
			}
			else
			{
		?>	
   	    <div id="sm-menu-pad"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lo[$i]['cid']."-".$db->stringToUrlSlug($lo[$i][menu_name]); ?>" class="sm-link1"> <?PHP echo $lo[$i]["menu_name"]; ?></a></div>
		<?PHP
			}
		}
		?>
		<?PHP
				}
					$wid2 = "150";
					for($j=0;$j<count($fetch_sl);$j++)
					{
						
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							if(strlen($fetch_sl[$j]["menu_name_g"]) > 20)
							{
								$wid2 = strlen($fetch_sl[$j]["menu_name_g"]) + 150 + 40 ;
							}
						}	
						if($_SESSION["slanguage"] == "2")
						{
							if(strlen($fetch_sl[$j]["menu_name"]) > 20)
							{
								$wid2 = strlen($fetch_sl[$j]["menu_name"]) + 150 + 40 ;
							}
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
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							if($lt[$j]["menu_name_g"] == "")
							{
						?>
						 <div id="dyn-menu-pad2"><span class="dyn-menu2-sel"><?PHP echo $lt[$j]["menu_name"]; ?></span></div>
						 <?PHP
						 	}
							else
							{
						?>	
						 <div id="dyn-menu-pad2"><span class="dyn-menu2-sel"><?PHP echo $lt[$j]["menu_name_g"]; ?></span></div>
						<?PHP	 
							}
						}	
						if($_SESSION["slanguage"] == "2")
						{	
							if($lt[$j]["menu_name"] == "")
							{
						?> 
							 <div id="sm-menu-pad2"><span class="sm-link2-sel"><?PHP echo $lt[$j]["menu_name_g"]; ?></span></div>
						 <?PHP
						 	}
							else
							{
						?>
							<div id="sm-menu-pad2"><span class="sm-link2-sel"><?PHP echo $lt[$j]["menu_name"]; ?></span></div>
							<?PHP
							}	
						 }
						 ?>
						<?PHP 
						     } else { 
?>		
<?PHP
if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
{	
	if($lt[$j]["menu_name_g"] == "" )
	{
?>					 
<div id="sm-menu-pad2"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j]['cid']."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>" class="sm-link2"><?PHP echo $lt[$j]["menu_name"]; ?></a></div>
<?PHP
	}
	else
	{
?>	
<div id="sm-menu-pad2"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j]['cid']."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>" class="sm-link2"><?PHP echo $lt[$j]["menu_name_g"]; ?></a></div>
<?PHP
	}
}
if($_SESSION["slanguage"] == "2")
{
	if($lt[$j]["menu_name"] == "" )
	{
?>
<div id="sm-menu-pad2"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j]['cid']."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>" class="sm-link2"><?PHP echo $lt[$j]["menu_name_g"]; ?></a></div>
<?PHP
	}
	else
	{
?>	
<div id="sm-menu-pad2"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lt[$j]['cid']."-".$db->stringToUrlSlug($lt[$j][menu_name]); ?>" class="sm-link2"><?PHP echo $lt[$j]["menu_name"]; ?></a></div>
<?PHP
	}
}
?>
<?PHP
							 } 
					$wid3 = "150";
					for($k=0;$k<count($fetch_tl);$k++)
					{
							if($_SESSION["slanguage"] == "1")
							{
								if(strlen($fetch_tl[$k]["menu_name_g"]) > 20)
								{
									$wid3 = strlen($fetch_tl[$k]["menu_name_g"]) + 150 + 40 ;
								}
							}	
							if($_SESSION["slanguage"] == "2")
							{
								if(strlen($fetch_tl[$k]["menu_name"]) > 20)
								{
									$wid3 = strlen($fetch_tl[$k]["menu_name"]) + 150 + 40 ;
								}
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
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
							{
							if($lth[$k]["menu_name_g"] == "")
							{ 
							?>
							<div id="sm-menu-pad3"><span class="sm-link3-sel"><?PHP echo $lth[$k]["menu_name"]; ?></span></div>
							<?PHP
							}
							else
							{
							?>
						<div id="sm-menu-pad3"><span class="sm-link3-sel"><?PHP echo $lth[$k]["menu_name_g"]; ?></span></div>
						<?PHP
							}
						}
						if($_SESSION["slanguage"] == "2")
						{
							if($lth[$k]["menu_name"] == "")
							{ 
						?>
						<div id="sm-menu-pad3"><span class="sm-link3-sel"><?PHP echo $lth[$k]["menu_name_g"]; ?></span></div>
						<?PHP
							}
							else
							{
						?>	
						<div id="sm-menu-pad3"><span class="sm-link3-sel"><?PHP echo $lth[$k]["menu_name"]; ?></span></div>
						<?PHP
							}
						}
						?>
						<?PHP 
						     } else { 
						?>
						<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
							if($lth[$k]["menu_name_g"] == "" )
							{
						?>
						<div id="sm-menu-pad3"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>" class="sm-link3"><?PHP echo $lth[$k]["menu_name"]; ?></a></div>
						<?PHP
							}
							else
							{
						?>	
						<div id="sm-menu-pad3"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>" class="sm-link3"><?PHP echo $lth[$k]["menu_name_g"]; ?></a></div>
						<?PHP
							}	
						}	
						if($_SESSION["slanguage"] == "2")
						{
							if($lth[$k]["menu_name"] == "" )
							{
						?>
						<div id="sm-menu-pad3"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>" class="sm-link3"><?PHP echo $lth[$k]["menu_name_g"]; ?></a></div>
						<?PHP
							}
							else
							{
						?>		
						<div id="sm-menu-pad3"><a href="<?PHP echo SITE_URL.$db->stringToUrlSlug($lo[$i][fol])."/".$lth[$k][cid]."-".$db->stringToUrlSlug($lth[$k][menu_name]); ?>" class="sm-link3"><?PHP echo $lth[$k]["menu_name"]; ?></a></div>
						<?PHP
							}
						}
						?>
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
	   <?PHP
			}// for i
		?>
		<?PHP
	if($get_mid == "1")
				{
					if(url_name() == "view-intern.php")
					{
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
			<div id="sm-menu-pad"><span class="sm-link1-sel">Interne Jobs</span></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>		
			<div id="sm-menu-pad"><span class="sm-link1-sel">Internal Jobs</span></div>
			<?PHP
			}
			?>
			<?PHP
			}
				else
					{
					
		?>
		<?PHP
		if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
		{
		?>
				<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL."view-intern.php";?>" class="sm-link1">Interne Jobs</a></div>
		<?PHP
		}
		if($_SESSION["slanguage"] == "2")
		{
		?>			
				<div id="sm-menu-pad"><a href="<?PHP echo SITE_URL."view-intern.php";?>" class="sm-link1">Internal Jobs</a></div>
		<?PHP
		}
		?>		
		<?PHP	
					}
				}
		?>			
<?PHP
	}
?>