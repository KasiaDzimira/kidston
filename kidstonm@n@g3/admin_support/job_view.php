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
		$job_cat = $_REQUEST['job_cat'];	
		$sql_job = $db->getTableArray("select * from job_details where job_title='$job_cat' group by org_id ");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../admin_includes/kn-style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>
</head>

<body>
<form name="form1" method="post" action="">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="40" colspan="3" class="padd-25"><strong>Job Details </strong></td>
  </tr>
  <?PHP $sn=1;
  		for($j=0;$j<count($sql_job);$j++)
  		{ // for loop
		
			// company name is getting query
			$com_query = $db->fetchSingleRow("select * from company_details where ID='".$sql_job[$j]['org_id']."' ")
	?>
			  <tr>
			    <td colspan="3"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
                  <?PHP $sn=1;
  		for($j=0;$j<count($sql_job);$j++)
  		{ // for loop
		
			// company name is getting query
			$com_query = $db->fetchSingleRow("select * from company_details where ID='".$sql_job[$j]['org_id']."' ")
	?>
                  <tr>
                    <td width="48%" bgcolor="#FFFFFF"><?PHP echo $sn.".";?><span class="padd-25">Oraganization</span></td>
                    <td width="8%" align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
                    <td width="40%" bgcolor="#FFFFFF"><?PHP echo html_entity_decode($com_query['comp_name']);?></td>
                  </tr>
                  <tr>
                    <td height="35" bgcolor="#FFFFFF" class="padd-25">Job Title</td>
                    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
                    <td bgcolor="#FFFFFF"><?PHP echo str_replace('##','"',str_replace("^","'",html_entity_decode($sql_job[$j]['job_title'])));?></td>
                  </tr>
                  <tr>
                    <td height="35" bgcolor="#FFFFFF" class="padd-25">Job Brief Description</td>
                    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
                    <td bgcolor="#FFFFFF"><?PHP echo str_replace('##','"',str_replace("^","'",html_entity_decode($sql_job[$j]['job_brief'])));?></td>
                  </tr>
                  <tr>
                    <td height="35" bgcolor="#FFFFFF" class="padd-25">Job Detail Description</td>
                    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
                    <td bgcolor="#FFFFFF"><?PHP echo str_replace('##','"',str_replace("^","'",html_entity_decode($sql_job[$j]['job_desc'])));?></td>
                  </tr>
                  <tr>
                    <td height="35" bgcolor="#FFFFFF" class="padd-25">Contact Preson Name </td>
                    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
                    <td bgcolor="#FFFFFF"><?PHP echo html_entity_decode($sql_job[$j]['cont_pname']);?></td>
                  </tr>
                  <tr>
                    <td height="35" bgcolor="#FFFFFF" class="padd-25">Contact Preson Email </td>
                    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
                    <td bgcolor="#FFFFFF"><?PHP echo html_entity_decode($sql_job[$j]['cont_pemail']);?></td>
                  </tr>
                  <tr>
                    <td height="35" bgcolor="#FFFFFF" class="padd-25">Contact Preson URL </td>
                    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
                    <td bgcolor="#FFFFFF"><a href="http://<?PHP echo html_entity_decode($sql_job[$j]['cont_purl']);?>" target="_blank"><?PHP echo html_entity_decode($sql_job[$j]['cont_purl']);?></a></td>
                  </tr>
                  <tr>
                    <td height="35" bgcolor="#FFFFFF" class="padd-25">Location</td>
                    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
                    <td bgcolor="#FFFFFF"><?PHP echo html_entity_decode($sql_job[$j]['location']);?></td>
                  </tr>
                  <tr>
                    <td height="35" bgcolor="#FFFFFF" class="padd-25">Apply by  Date</td>
                    <td align="center" bgcolor="#FFFFFF"><strong>:</strong></td>
                    <td bgcolor="#FFFFFF"><?PHP 
					$dd = explode("-",$sql_job[$j]['apply_date']);
					echo $date  = $dd[2]."-".$dd[1]."-".$dd[0];
					?></td>
                  </tr>
                  <tr>
                    <td colspan="3" bgcolor="#CCCCCC" class="padd-25">&nbsp;</td>
                  </tr>
                  <?PHP  $sn=$sn+1;
		}// for loop ?>
                </table></td>
    </tr>
<?PHP  $sn=$sn+1;
		}// for loop ?>
  <tr>
    <td width="52%" height="35">&nbsp;</td>
    <td width="8%">&nbsp;</td>
    <td width="40%">
      <input type="submit" name="Submit" value="Close" class="btn-common" onClick="javascript:window.close();">    </td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
