<?PHP 
	include("../popup_check.php");
	if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
	{
		include("../../inc1ud35/database.mvc.php");
	}
	else
	{
		include("../../inc1ud35/database.mvc.live.php");
	}
	$db = new Database();
		$id = $_REQUEST['aid'];	
		$sql_company = $db->fetchSingleRow("select * from candidate_master where ID = '$id' ");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../admin_includes/kn-style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>
</head>

<body>
<table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="40" colspan="3"><strong>Candidate Details</strong> </td>
  </tr>
  <?PHP
  	if($sql_company['name'] != "")
	{ // name
  ?>
  <tr>
    <td width="52%" height="35" bgcolor="#FFFFFF" class="padd-25">Name </td>
    <td width="1%" align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td width="40%" bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['name'])." ".html_entity_decode($sql_company['lastname']); ?></td>
  </tr>
  <?PHP
   } // name
   if($sql_company['sex'] != "")
   { //male
  ?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Sex</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10">
		<?PHP 
				if($sql_company['sex'] == 'M')
				{
					echo "Male";
				}
				else
				{
					echo "Female";
				}
		?>	</td>
  </tr>
   <?PHP
   } //male
   if($sql_company['qualification'] != "")
   { //qualification
  ?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Qualification</td>
    <td align="center" bgcolor="#FFFFFF">:</td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['qualification']);?></td>
  </tr>
   <?PHP
   } //qualification
   if(html_entity_decode($sql_company['industry']) != "")
   { //industry
  ?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Industry</td>
    <td align="center" bgcolor="#FFFFFF">:</td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['industry']);?></td>
  </tr>
  	<?PHP 
	} //industry
	if($sql_company['dob'] != "")
	{ //dob
	?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Date of Birth </td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo $sql_company['dob'] ;//date("d-m-Y",strtotime($sql_company['dob'])); ?></td>
  </tr>
  <?PHP
   } //dob
   if($sql_company['address'] != "")
   { //addr
  ?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Address</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['address']);?></td>
  </tr>
   	<?PHP 
	} // addr
	if($sql_company['street'] != "")
	{ //street
	?>
<!--  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Street </td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['street']);?></td>
  </tr>
-->    <?PHP 
	} //street
	if(html_entity_decode($sql_company['city']) != "")
	{ //city
	?>
<!--  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">City</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['city']);?></td>
  </tr>
-->    <?PHP 
	} //city
	if(html_entity_decode($sql_company['state']) != "")
	{ //state
	?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">State</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['state']);?></td>
  </tr>
    <?PHP 
	} //state
	if(html_entity_decode($sql_company['country']) != "")
	{ //country
	?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Country </td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['country']);?></td>
  </tr>
    <?PHP 
	} //country
	if(html_entity_decode($sql_company['postalcode']) != "")
	{ //postalcode
	?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Postalcode</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['postalcode']);?></td>
  </tr>
    <?PHP 
	} //postalcode
	if(html_entity_decode($sql_company['contact_number']) != "")
	{ //postalcode
	?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Contact Number </td>
    <td align="center" bgcolor="#FFFFFF">:</td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['contact_number']);?></td>
  </tr>
    <?PHP 
	} //postalcode
	if(html_entity_decode($sql_company['email']) != "")
	{ //email
	?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Email</td>
    <td align="center" bgcolor="#FFFFFF">:</td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['email']);?></td>
  </tr>
    <?PHP 
	} //email
	if(html_entity_decode($sql_company['reference']) != "")
	{ //postalcode
	?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Reference</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['reference']);?></td>
  </tr>
    <?PHP 
	} //postalcode
	$sql_language =  $db->getTableArray("select * from candidate_language where candidate_id = '$id' ");
	if(count($sql_language) > 0)
	{
	?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Language</td>
    <td align="center" bgcolor="#FFFFFF">:</td> 
	<td bgcolor="#FFFFFF" class="padd-10"><?PHP
	$sql_language =  $db->getTableArray("select * from candidate_language where candidate_id = '$id' ");
	for($i=0;$i<count($sql_language);$i++)
	{ // for j
	?>
	<?PHP
	 echo "<br>".html_entity_decode($sql_language[$i]['language'])."(".html_entity_decode($sql_language[$i]['language_level']).")";
	} ?>
	</td>
  </tr>
    <?PHP
	} 
	if(html_entity_decode($sql_company['applied_date']) != "")
	{ //applied_date
	?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Joined Date </td>
    <td align="center" bgcolor="#FFFFFF">:</td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo date("d-m-Y",strtotime($sql_company['applied_date'])); ?></td>
  </tr> 
    <?PHP 
	} //applied_date
	
	if(html_entity_decode($sql_company['status']) != "")
	{ //Status
	?> 
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Status</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP 
	if(html_entity_decode($sql_company['status']) == "Y")
	{
		echo "Active";
	}
	else
	{
		echo "Inactive";
	}
	?></td>
  </tr>  
  <?PHP
  } // status
  ?>
  <tr>
    <td height="35" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">
	<input type="submit" name="Submit" value="Close" class="btn-common" onClick="javascript:window.close();">    </td>
  </tr>  
</table>
</body>
</html>