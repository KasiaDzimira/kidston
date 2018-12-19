<div id="file_list">
<?PHP
	$sql_image_pg = "select * from level_three_master where SSID='".$_REQUEST["slid"]."' order by priority_no";
	//echo $sql_image_pg;
	$rs_image = $db->getTableArray($sql_image_pg);
	$count_rs = count($rs_image);
	if($count_rs > 0)
	{
?>
<h3>
<?PHP
	$mlfetch = $db->fetchSingleRow("select * from menu_master where ID=".$rs_image[0]["MID"]);
	$lof = $db->fetchSingleRow("select * from level_one_master where ID=".$rs_image[0]["SID"]);
	$ltf = $db->fetchSingleRow("select * from level_two_master where ID=".$rs_image[0]["SSID"]);
	echo $mlfetch["menu_name"]." >> ".$lof["menu_name"]." >> ".$ltf["menu_name"];
?>
</h3>
<ol id="list_to_sort">
<?PHP
	$level_two = $db->fetchSingleRow("select * from level_two_master where SID=".$rs_image["ID"]." order by priority_no");
	$count_2 = count($level_two);
			for($i = 0;$i<$count_rs;$i++)
			{ // #w1
?>			
			<li id="item_<?PHP echo $rs_image[$i][ID]; ?>" style="padding: 10px 5px 0px 5px;"><?PHP echo $rs_image[$i]['menu_name']; ?></li>
<?PHP			
			}// #w1
		
?>
</ol>
<?PHP
	}else{
?>
<h4>There is no menus in this level to sort!</h4>
<?PHP	
	}
?>
<br>
<?PHP
	if($count_rs > 1)
	{
?>
<p style="padding-left: 15px;">
<a href="javascript:void(0);" onClick="window.open('support/popup_order_sl.php?slid=<?PHP echo $_REQUEST[slid]; ?>','ord','width=500,height=500,top=100,left=100,resizable=0');" class="sav_link" id="sav-btn">Change this order</a>
</p>
<?PHP
	}
?>
</div>
