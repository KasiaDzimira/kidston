<?PHP
		include("../../res/database.mvc.php");
		$db = new Database();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Menu Order</title>
<link href="../res/style.css" type="text/css" rel="stylesheet">
<link href="../res/layout.css" type="text/css" rel="stylesheet">
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

<body>
<div class="pad-top">
  <div class="body-main">

<div id="file_list">
<?PHP
	$sql_image_pg = "select * from level_one_master where ID='".$_REQUEST["flid"]."' order by priority_no";
	//echo $sql_image_pg;
	$rs_image = $db->fetchSingleRow($sql_image_pg);
	$count_rs = count($rs_image);
	if($count_rs > 0)
	{
?>
<h3>
<?PHP
	$mlfetch = $db->fetchSingleRow("select * from menu_master where ID=".$rs_image["MID"]);
	echo $mlfetch["menu_name"]." >> ".$rs_image["menu_name"]." >> ";
?>
</h3>
<ul id="list_to_sort">
<?PHP
	$level_two = $db->getTableArray("select * from level_two_master where SID=".$rs_image["ID"]." order by priority_no");
	$count_2 = count($level_two);
		if($count_2 > 0)
		{
			for($i = 0;$i<$count_2;$i++)
			{ // #w1
?>			
			<li id="item_<?PHP echo $level_two[$i][ID]; ?>" onMouseOver="this.style.cursor='move';" style="padding: 10px 5px 0px 5px;" class="field-form-3"><?PHP echo $level_two[$i]['menu_name']; ?></li><div></div>
<?PHP			
			}// #w1
		}
?>
</ul>
<script language="javascript">
	Sortable.create("list_to_sort", {
   	onUpdate: function() {
  	new Ajax.Request("../process_r/level_two_change.php", {method: "post",parameters: { data: Sortable.serialize("list_to_sort") }  });
	//alert("hai");
    }
    });
</script>
<?PHP
	}
?>
<br>
<p style="padding-left: 15px;">
<a href="javascript:window.close();" onClick="window.opener.document.location.reload();" class="sav_link" id="sav-btn">Close Window</a>
</p>
<br><br><br>
<p style="padding-left: 15px;">
Note: To change the order, simply drag and drop the items as per the order you require..
</p>
</div>


</div>
</div>
</body>
</html>
