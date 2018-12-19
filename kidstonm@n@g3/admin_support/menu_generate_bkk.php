<?PHP 
		include("admin_support/submenu_generate.php");
		$top_menu = $db->getTableArray("select * from menu_master where menu_status='Y'");
?>	  
	  <!-- Menu Div Start Here -->
		  <ul><!-- Main UL -->
		  	<?PHP for($t=0;$t<count($top_menu);$t++)
				  { // for topmenu
			?>
				  <li><!-- Level One LI -->
				<a href="#"><?PHP echo $top_menu[$t]['menu_name'];?></a>
				<?PHP
					$pri = $top_menu[$t]['priority_number'];
					menu_generate($pri,$db);
				?>
				</li><!-- Level One LI -->
		<?PHP 	 
				 } // for topmenu
			?>
				</li><!-- Level One LI -->	
		  		<li><!-- Level One LI -->
					<a href="logout.php">LOGOUT</a>
				</li><!-- Level One LI -->
				
				
		  					
		  </ul><!-- Main UL -->

	  <!-- Menu Div End Here -->
