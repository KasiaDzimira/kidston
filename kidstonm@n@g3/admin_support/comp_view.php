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
		$id = $_REQUEST['cid'];	
		$sql_company = $db->fetchSingleRow("select * from company_details where ID = '$id' ");
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
    <td height="40" colspan="3"><strong>Company Details</strong> </td>
  </tr>
  <tr>
    <td width="52%" height="35" bgcolor="#FFFFFF" class="padd-25">Name Of The Company </td>
    <td width="1%" align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td width="40%" bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['comp_name']); ?></td>
  </tr>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Business Line </td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['industry_name']);?></td>
  </tr>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Location </td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['country']); ?></td>
  </tr>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Contact Person Name</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['cont_name']);?></td>
  </tr>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Contact Person Designation </td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['cont_designation']);?></td>
  </tr>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Contact Person Email </td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['cont_email']);?></td>
  </tr>
<!--  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Contact Phone</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['cont_phone']);?></td>
  </tr>
-->  <?PHP
  if($sql_company['website_url'] != "")
  {
  ?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Website URL</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10">
	<?PHP echo html_entity_decode($sql_company['website_url']);?>
	</td>
  </tr>
 <?PHP
 }
 ?>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Address Line</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo html_entity_decode($sql_company['address1']);?></td>
  </tr>  
<!--  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Street</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP //echo html_entity_decode($sql_company['street']);?></td>
  </tr>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">City</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP //echo html_entity_decode($sql_company['city']);?></td>
  </tr>
  <tr>
    <td height="35" bgcolor="#FFFFFF" class="padd-25">Postalcode</td>
    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
    <td bgcolor="#FFFFFF" class="padd-10"><?PHP //echo html_entity_decode($sql_company['postalcode']);?></td>
  </tr>  
-->  
<?PHP
	if(html_entity_decode($sql_company['username'])!= "")
	{
?>
<tr>
  <td height="35" bgcolor="#FFFFFF" class="padd-25">Username</td>
  <td align="center" bgcolor="#FFFFFF">:</td>
  <td bgcolor="#FFFFFF" class="padd-10">
  <?PHP echo html_entity_decode($sql_company['username']); ?>  </td>
</tr>
<?PHP
			if(html_entity_decode($sql_company['password']) != "")
			{
?>
<tr>
  <td height="35" bgcolor="#FFFFFF" class="padd-25">Password</td>
  <td align="center" bgcolor="#FFFFFF">:</td>
  <td bgcolor="#FFFFFF" class="padd-10"><?PHP echo $db->decode64(html_entity_decode($sql_company['enpss'])); ?></td>
</tr>
<?PHP
			}
	}
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
  <tr>
    <td height="35" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">
	<input type="submit" name="Submit" value="Close" class="btn-common" onClick="javascript:window.close();">    </td>
  </tr>  
</table>
</body>
</html>