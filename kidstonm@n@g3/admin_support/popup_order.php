<?PHP
		if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
		{
			include("../../inc1ud35/database.mvc.php");
		}
		else
		{
			include("../../inc1ud35/database.mvc.live.php");
		}
		$db = new Database();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Menu Order</title>
<script src="../lib/prototype.js" language="javascript"></script>
<script src="../src/builder.js" language="javascript"></script>
<script src="../src/controls.js" language="javascript"></script>
<script src="../src/dragdrop.js" language="javascript"></script>
<script src="../src/scriptaculous.js" language="javascript"></script>
<script src="../src/effects.js" language="javascript"></script>
<script src="../src/slider.js" language="javascript"></script>
<script src="../src/sound.js" language="javascript"></script>
<script src="../src/unittest.js" language="javascript"></script>
</head>

<body bgcolor="#CCCCCC">
<div class="pad-top" style="padding:20px;">
  <div class="body-main">

<div id="file_list">
<h3>
<?PHP
	$mlfetch = $db->fetchSingleRow("select * from menu_master where ID=".$_REQUEST["mid"]);
	echo $mlfetch["menu_name"]."  ";
?>
</h3>
<ul id="list_to_sort">
<?PHP
		$sql_image_pg = "select * from level_one_master where MID='".$_REQUEST["mid"]."' order by priority_no";
		$rs_image = $db->getTableArray($sql_image_pg);
		$count_rs = count($rs_image);
		for($i = 0;$i<$count_rs;$i++)
		{ // #w1
?>			
			<li id="item_<?PHP echo $rs_image[$i][ID]; ?>" onMouseOver="this.style.cursor='move';" style="padding: 10px 5px 0px 5px; font-family:Arial; font-size:12px;" class="field-form-3"><?PHP echo $rs_image[$i]['menu_name']; ?></li><div></div>
<?PHP			
		}// #w1
		
?>
</ul>
<script language="javascript">
	Sortable.create("list_to_sort", {
   	onUpdate: function() {
  	new Ajax.Request("../admin_process/level_one_change.php", {method: "post",parameters: { data: Sortable.serialize("list_to_sort") }  });
	//alert("hai");
    }
    });
</script>
<br>
<p style="padding-left: 15px;">
<a href="javascript:window.close();" onClick="window.opener.document.location.reload();" style="color:#454545; font-size:12px; font-family:Arial;" id="sav-btn">Close Window</a>
</p>
<br><br><br>
<p style="padding-left:15px; color:#666666; font-size:15px; font-family:Arial;  ">
<strong>Note</strong>: To change the order, <strong>simply drag and drop</strong> the items as per the order you require..
</p>
</div>
</div>
</div>
</body>
</html>
