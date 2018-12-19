<?PHP 

		include("admin_support/submenu_generate.php");

		//$top_menu = $db->getTableArray("select * from menu_master where menu_status='Y'");

?>	  

	  <!-- Menu Div Start Here -->

		  <ul><!-- Main UL -->

				<!-- Level One LI -->	

					<?PHP //for($t=0;$t<count($top_menu);$t++)

				 // { // for topmenu

			?>

				  <li><!-- Level One LI -->

				<a href="#"><?PHP //echo $top_menu[$t]['menu_name'];?>ABOUT</a>

				<ul>

				<?PHP

					//$pri = $top_menu[$t]['ID'];

					if($db->check_permission("dbsec"))

						menu_generate(1,$db);

				?>

				</ul>

				</li><!-- Level One LI -->

				  <li><!-- Level One LI -->

				<a href="#"><?PHP //echo $top_menu[$t]['menu_name'];?>CONTACT</a>

				<ul>

				<?PHP

					//$pri = $top_menu[$t]['ID'];

					if($db->check_permission("dbsec"))

						menu_generate(2,$db);

				?>

				</ul>

				</li><!-- Level One LI -->

		<?PHP 	 

				 //} // for topmenu

			?>

				<li><!-- Level One LI -->

				<a href="javascript:;">COMPANIES</a>

				<?PHP

						if($db->check_permission("company"))

						{

				?>

					<ul>

						<li><a style="width:150px;" href="home.php?src=add-comp">Add a Company</a></li>

						<li><a style="width:150px;" href="home.php?src=view-comp">View All Companies</a></li>

<!--					<li><a style="width:127px;" href="#">View Presentations</a></li>

						<li><a style="width:127px;" href="#">View Offers</a></li> -->

<!--						<li><a style="width:127px;" href="javascript:;">Search</a></li>

-->	

			<?PHP

					if($db->check_permission("dbsec"))

						menu_generate(4,$db);

			?>

						

					</ul>

			  <?PHP

			  			}

			  ?>

				</li><!-- Level One LI -->	

				<li><!-- Level One LI -->

				<a href="javascript:;">JOBS</a>

				<ul>

				<?PHP

						if($db->check_permission("job"))

						{

				?>

					

						<li><a style="width:127px;" href="home.php?src=add-job">Add a Job Opening</a></li>

						<li><a style="width:127px;" href="home.php?src=view-job">Manage Job Entries</a></li>

						<li><a style="width:127px;" href="home.php?src=closed-job">Manage Closed Jobs</a></li>

						<li><a style="width:127px;" href="home.php?src=xml_gen">Generate XML</a></li>

<!--						<li><a style="width:127px;" href="home.php?src=view-app">View Applications</a></li>

						

						<li><a style="width:127px;" href="home.php?src=view-app">Requested Openings</a></li>-->

<!--						<li><a style="width:127px;" href="javascript:;">Search</a></li>

-->					

			  <?PHP

			  			}

			  ?>

			</ul>

				</li><!-- Level One LI -->	

				<li><!-- Level One LI -->

				<a href="javascript:;">CANDIDATES</a>

				<ul>

				<?PHP

						if($db->check_permission("candidate"))

						{

				?>

					

<!--						<li><a style="width:127px;" href="#">View MasterList</a></li>

-->						<li><a style="width:150px;" href="home.php?src=view-applied">View Applied</a></li>

						<li><a style="width:150px;" href="home.php?src=view-selected">View Qualified</a></li>

<!--						<li><a style="width:127px;" href="home.php?src=view-informed">View Informed</a></li>

						<li><a style="width:150px;" href="home.php?src=view-invited">View Interviewed</a></li>

						<li><a style="width:150px;" href="home.php?src=view-presented">View Presented</a></li>

						<li><a style="width:150px;" href="home.php?src=view-hired">View Offered</a></li>
                        -->	

						<li><a style="width:150px;" href="home.php?src=rejected">View Rejected</a></li>

						<li><a style="width:150px;" href="home.php?src=unqualified">View DisQualified</a></li>

						<!--<li><a style="width:150px;" href="home.php?src=view-deleted">View Deleted</a></li>-->

						<li><a style="width:150px;" href="home.php?src=view-platform">Platform Count</a></li>
                        <li><a style="width:150px;" href="home.php?src=view-wlteam">View Talents</a></li>

<!--						<li><a style="width:127px;" href="home.php?src=candidate">Talent Section</a></li>

--><!--						<li><a style="width:127px;" href="javascript:;">Search</a></li>

-->					

			   <?PHP

			  			}

						if($db->check_permission("dbsec"))

						{

							menu_generate(3,$db);

			  			}

			   ?>

			   </ul>

				</li><!-- Level One LI -->

                <li>

				<a href="#">TALENTS</a>

				<?PHP

						if($db->check_permission("company"))

						{

				?>

                	<ul>

                    	<li><a style="width:150px;" href="home.php?src=talents">Add a Talent</a></li>

<!--                        <li><a style="width:150px;" href="manage-talent.php">Manage Talent</a></li>

-->                    </ul>

				

				<?PHP

						}

				?>

				</li>

				<li><!-- Level One LI -->

				<a href="javascript:;">ADMIN</a>

				

					<ul>

				<?PHP	if($db->check_permission("dbsec"))

						{

				?>

					

						<li><a style="width:127px;" href="home.php?src=add-manager">Add a Manager</a></li>

						<li><a style="width:127px;" href="home.php?src=view-manager">View Manager List</a></li>

			   <?PHP

			  			}

						if($db->check_permission("dbsec"))

						{

				?>

						<li><a style="width:127px;" href="home.php?src=add-recruiters">Add a Recruiter</a></li>

						<li><a style="width:127px;" href="home.php?src=view-recruiters">View Recruiter List</a></li>

					

			   <?PHP

			  			}

			   ?>	</ul>					

				</li>

		  					

		  </ul><!-- Main UL -->



	  <!-- Menu Div End Here -->

