<?PHP 
include("support/submenu_generate.php"); ?>
<div class="top-menu-sec">
				<div class="ddsmoothmenu" id="smoothmenu1">
				<ul>
				<li>
				<?PHP
				if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
				{
				?>
				<a href="<?PHP echo SITE_URL.main_menu_link('3',$db); ?>" <?PHP echo main_menu_highliht('3',$cms_id,$db); ?>>Für Kandidaten</a>
				<?PHP
				}
				if($_SESSION["slanguage"] == "2")
				{?>
				<a href="<?PHP echo SITE_URL.main_menu_link('3',$db); ?>" <?PHP echo main_menu_highliht('3',$cms_id,$db); ?>>For candidates</a>
				<?PHP
				}
				?><?PHP menu_generate('3',$db);?>
<!--					<ul>
						<li><a style="width:127px;" href="<?PHP echo SITE_URL; ?>view-latest-openings.php">View latest Openings</a></li>
						<li><a style="width:127px;" href="javascript:;">Submit your Resume</a></li>
						<li><a style="width:127px;" href="career-tips.php">Career Tips</a></li>
						<li><a style="width:127px;" href="write-us.php">Write to Us</a></li>
				</ul>-->	
				</li>
				<li>
				<?PHP
				if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "" )
				{
				?>
				<a href="<?PHP echo SITE_URL.main_menu_link('4',$db); ?>" <?PHP echo main_menu_highliht('4',$cms_id,$db); ?>>Für Kunden</a>
				<?PHP
				}
				if($_SESSION["slanguage"] == "2")
				{
				?>
				<a href="<?PHP echo SITE_URL.main_menu_link('4',$db); ?>" <?PHP echo main_menu_highliht('4',$cms_id,$db); ?>>For customers</a>
				<?PHP
				}
				?><?PHP menu_generate('4',$db);?>
<!--					<ul>
						<li><a style="width:140px;" href="<?PHP echo SITE_URL; ?>post-job.php">Post a Job Ad</a></li>
					</ul>
-->				</li>
					<li>
					<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					{
					?>
						<a href="<?PHP echo SITE_URL.main_menu_link('1',$db); ?>" <?PHP echo main_menu_highliht('1',$cms_id,$db); ?>>Über KIDSTON</a>
						<?PHP
						}
						if($_SESSION["slanguage"] == "2")
						{
						?>
						<a href="<?PHP echo SITE_URL.main_menu_link('1',$db); ?>" <?PHP echo main_menu_highliht('1',$cms_id,$db); ?>>About KIDSTON</a>
						<?PHP
						}
						?>
						<?PHP menu_generate('1',$db);?>
					</li>				
					<li>
					<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
					{
					?>
					<a href="<?PHP echo SITE_URL.main_menu_link('2',$db); ?>" <?PHP echo main_menu_highliht('2',$cms_id,$db); ?>>Kontakt</a>
					<?PHP
						}
						if($_SESSION["slanguage"] == "2")
						{
						?>
					<a href="<?PHP echo SITE_URL.main_menu_link('2',$db); ?>" <?PHP echo main_menu_highliht('2',$cms_id,$db); ?>>Contact</a>
					<?PHP
					}
					?><?PHP menu_generate('2',$db);?></li>
				</ul>
				</div>				
</div>