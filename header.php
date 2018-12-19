<div id="top-section">
		<div id="logo"><a href="<?PHP echo SITE_URL;?>index.htm"><img src="<?PHP echo SITE_URL;?>knpic/logo.gif" alt="" width="92" height="73" border="0" /></a></div>
		<div id="top-rt-sec">
		  <div class="top-icon-sec">
<!--          <img src="<?PHP echo SITE_URL;?>knpic/icon-aa.gif" width="20" height="13" /> | -->
<a href="javascript:decreaseFontSize();"><img src="<?PHP echo SITE_URL;?>knpic/a2.gif" width="15" height="13" border="0" /></a><a href="javascript:increaseFontSize();"><img src="<?PHP echo SITE_URL;?>knpic/a1.gif" name="fntSizeDec" width="11" height="13" border="0" id="fntSizeDec" /></a>
			  <a href="<?PHP echo SITE_URL;?>index.php"><img src="<?PHP echo SITE_URL;?>knpic/home-icon.gif" alt="" width="13" height="14" border="0" /></a> <!--<a href="javascript:;" onclick="window.print();"><img src="<?PHP echo SITE_URL;?>knpic/icon-print.gif" alt="" width="16" height="13" border="0" /></a>--><!--          <img src="<?PHP echo SITE_URL;?>knpic/icon-add-frnd.gif" width="17" height="13" alt="" /> | --> <a href="<?PHP echo SITE_URL;?>sitemap.php"><img src="<?PHP echo SITE_URL;?>knpic/icon-sitemap.gif" alt="" width="17" height="13" border="0" /></a>			  </div>
			
			<div id="cust-login">
			<?PHP if($_SESSION['lid'] == ""){ ?>
			<div id="sectiond-2" class="anchor"><a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent" class="thickbox topp-link" title="">
			<?PHP
					if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						echo "Kundenlogin";
					if($_SESSION["slanguage"] == "2")
						echo "Customer Login";
						
			?></a>&nbsp;	 
			 </div>
			 
			<?PHP } else {
			$sql_com = $db->fetchSingleRow("select * from company_details where ID = " .$_SESSION["lid"]);
			?>
				<a href="<?PHP echo SITE_URL.$db->stringToUrlSlug(html_entity_decode($_SESSION['cname']));?>" class="topp-link"><?PHP  echo "Welcome&nbsp;".$sql_com['comp_name']; ?>!</a>&nbsp;			
				<a href="<?PHP echo SITE_URL; ?>logout.php" class="topp-link">Logout</a>
	<?PHP } ?></div>
		<!--<div class="country-icons">-->
		<div id = "country-icons">
					<?PHP
						if($_SESSION["slanguage"] == "1" || $_SESSION["slanguage"] == "")
						{
					?>
			
			<a href="<?PHP echo SITE_URL; ?>switchlang.php?slang=2" class="topp-link">EN<!--			<img src="<?PHP echo SITE_URL;?>knpic/foot-espanol.gif" alt="" width="18" height="12" border="0" />
--></a>&nbsp;
			<span class="topp-link-sel">DE</span>
				<?PHP
						}
					if($_SESSION["slanguage"] == "2")
					{
				?>
			<span class="topp-link-sel">EN</span>&nbsp;
			<a href="<?PHP echo SITE_URL; ?>switchlang.php?slang=1" class="topp-link">DE
<!--			<img src="<?PHP echo SITE_URL;?>knpic/foot-english.gif" alt="" width="18" height="12" border="0" />
-->			</a>
				<?PHP
					}
				?>
		</div>
		<?PHP include("support/menu.php"); ?>
		</div>
	</div>