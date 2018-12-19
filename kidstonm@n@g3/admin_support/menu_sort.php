<div id="file_list" style="padding:20px;">
<?PHP
	$sql_image_pg = "select * from level_one_master where MID='".$_REQUEST["mid"]."' order by priority_no";
	$rs_image = $db->getTableArray($sql_image_pg);
	$count_rs = count($rs_image);
	if($count_rs > 0)
	{
?>
<h3>
<?PHP
	$mlfetch = $db->fetchSingleRow("select * from menu_master where ID=".$_REQUEST["mid"]);
	echo $mlfetch["menu_name"]."  ";
?>
</h3>
<ol id="list_to_sort">
<?PHP
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

<a href="javascript:void(0);" onClick="window.open('admin_support/popup_order.php?mid=<?PHP echo $_REQUEST[mid]; ?>','ord','width=500,height=500,top=100,left=100,resizable=0');" id="sav-btn">Change this order</a>
<?PHP
	}
?>
</div>
