<div id="top-section">
		<div id="logo"><a href="<?PHP echo SITE_URL;?>index.htm"><img src="<?PHP echo SITE_URL;?>knpic/logo.gif" alt="" width="92" height="73" border="0" /></a></div>
		<div id="top-rt-sec">
		  <div class="top-icon-sec">
          <a href="javascript:ts('body',2)"><img src="<?PHP echo SITE_URL;?>knpic/a1.gif" width="11" height="13" id="fntSizeDec" /></a><a href="javascript:ts('body',-1)" ><img src="<?PHP echo SITE_URL;?>knpic/a2.gif" width="11" height="13" /></a> |         
			  <a href="<?PHP echo SITE_URL;?>index.php"><img src="<?PHP echo SITE_URL;?>knpic/home-icon.gif" alt="" width="13" height="14" /></a> | 
			  <a href="javascript:;" onclick="window.print();"><img src="<?PHP echo SITE_URL;?>knpic/icon-print.gif" alt="" width="16" height="13" border="0" /></a> | 
<!--          <img src="<?PHP echo SITE_URL;?>knpic/icon-add-frnd.gif" width="17" height="13" alt="" /> | --> 
              <img src="<?PHP echo SITE_URL;?>knpic/icon-sitemap.gif" alt="" width="17" height="13" /> 
		  </div>

			<div id="cust-login">
			<?PHP if($_SESSION['lid'] == ""){ ?>
			<div id="sectiond-2" class="anchor"><a href="#TB_inline?height=200&amp;width=400&amp;inlineId=myOnPageContent" class="thickbox topp-link" title="">Customer Login </a></div>
			<?PHP } else {?>
				<a href="<?PHP echo $db->stringToUrlSlug(html_entity_decode($_SESSION['cname']));?>" class="topp-link"><?PHP echo "Welcome&nbsp;".$_SESSION['username']; ?>!</a>&nbsp;
				<a href="logout.php" class="topp-link">Logout</a>
	<?PHP } ?>
				</div>
				
		<?PHP include("support/menu.php"); ?>
		</div>
	</div>