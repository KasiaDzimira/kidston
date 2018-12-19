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
<ol id="list_to_sort">
<?PHP
	$level_two = $db->getTableArray("select * from level_two_master where SID=".$rs_image["ID"]." order by priority_no");
	$count_2 = count($level_two);
		if($count_2 > 0)
		{
			for($i = 0;$i<$count_2;$i++)
			{ // #w1
?>			
			<li id="item_<?PHP echo $rs_image[$i][ID]; ?>" style="padding: 10px 5px 0px 5px;"><?PHP echo $level_two[$i]['menu_name']; ?></li>
<?PHP			
			}// #w1
		
?>
</ol>
<?PHP
		}
		else{
?>
<h4>There is no menus in this level to sort!</h4>
<?PHP	
		}
	}else{
?>
<h4>There is no menus in this level to sort!</h4>
<?PHP	
	}
?>
<br>
<?PHP
	if($count_2 > 1)
	{
?>
<p style="padding-left: 15px;">
<a href="javascript:void(0);" onClick="window.open('support/popup_order_fl.php?flid=<?PHP echo $_REQUEST[flid]; ?>','ord','width=500,height=500,top=100,left=100,resizable=0');" class="sav_link" id="sav-btn">Change this order</a>
</p>
<?PHP
	}
?>
</div>
