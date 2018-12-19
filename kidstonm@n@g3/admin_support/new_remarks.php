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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kidston</title>
<script type="text/javascript" src="../admin_includes/jquery.js"></script>
<script type="text/javascript" src="../admin_includes/form_validation.js"></script>
<script type="text/javascript" src="../admin_includes/jquery-impromptu.2.7.min.js"></script>
<script type="text/javascript" src="../admin_includes/ajaxLoad.js"></script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
<?PHP
			$rremarks = $db->getTableArray("select al.ID,al.remarks,al.application_status,DATE_FORMAT(al.auth_date,'%D %M, %Y') as dd,al.auth_by,aa.name from application_link al,admin_access aa where al.application_id='".$_REQUEST["alid"]."' and al.auth_by = aa.ID");
		
								if(count($rremarks)>0)
								{// remarks
									for($r=0;$r<count($rremarks);$r++)
									{
								
										$msg .= $rremarks[$r]["remarks"]."<br>";
										$msg .= "Status : ".$rremarks[$r]["application_status"]."<br>";
										$msg .= "By : ".$rremarks[$r]["name"]."<br>";
										//$msg .= "On ".$rremarks[$r]["dd"]."<hr>";
										$msg .= "On ".$rremarks[$r]["dd"]." "."<a href=edit_remarks.php?id=".$rremarks[$r]["ID"]."&alid=".$_REQUEST["alid"]."&rsrc=".$_REQUEST[rsrc].">Edit</a><hr>";
									}
									echo $msg;
							   }// remarks
							
?>		
	
</table>

</body>
</html>