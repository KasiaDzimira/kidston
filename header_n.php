<?PHP 
$src = $_REQUEST['src'];
?>

<div id="ind-top-section">
		<div id="ind-logo"><a href="<?PHP echo SITE_URL;?>index.php?src=home"><img src="<?PHP echo SITE_URL;?>knpic/new-logo.png" alt="" width="293" height="109" border="0" /></a></div>
		<div id="ind-right-sec" class="del"><?PHP if($src=="home"):?><span class="sel">Home</span><?PHP else: ?><a href="<?PHP echo SITE_URL;?>index.php?src=home">Home</a><?PHP endif;?>   |   <?PHP if($src=="about"):?><span class="sel">About KIDSTON</span><?PHP else: ?><a href="<?PHP echo SITE_URL;?>about.php?src=about">About KIDSTON</a><?PHP endif;?>   |  <?PHP if($src=="contact"):?><span class="sel">Contact</span><?PHP else: ?> <a href="<?PHP echo SITE_URL;?>contact.php?src=contact">Contact</a><?PHP endif;?> </div>
	</div>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>