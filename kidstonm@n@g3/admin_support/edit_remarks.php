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
<style>
.btn-common
{
	background-image:url(../admin_image/btn-bg.gif); background-repeat:no-repeat; height:27px; width:70px;
	font-family:Trebuchet MS; border:0px solid #b0b0b0; color:#fdfdfd; font-size:13px; padding:2px 5px 3px 5px; font-weight:bold; cursor:pointer;
}


.field-popup
{ 
font-family:Trebuchet MS; border:1px solid #d0cdcd; color:#323232; background-color:#f6f6f6; background-repeat:no-repeat; background-position:left top; font-size:13px; padding:5px 3px 3px 5px; 	
}
			.jqifade{ position: absolute; background-color: #aaaaaa; }
			div.jqi{ width: 300px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; position: absolute; background-color: #ffffff; font-size: 11px; text-align: left; border: solid 1px #eeeeee; -moz-border-radius: 10px; -webkit-border-radius: 10px; padding: 7px; }
			div.jqi .jqicontainer{ font-weight: bold; }
			div.jqi .jqiclose{ position: absolute; top: 4px; right: -2px; width: 18px; cursor: default; color: #bbbbbb; font-weight: bold; }
			div.jqi .jqimessage{ padding: 10px; line-height: 20px; color: #444444; }
			div.jqi .jqibuttons{ text-align: right; padding: 5px 0 5px 0; border: solid 1px #eeeeee; background-color: #f4f4f4; }
			div.jqi button{ padding: 3px 10px; margin: 0 10px; background-color: #2F6073; border: solid 1px #f4f4f4; color: #ffffff; font-weight: bold; font-size: 12px; }
			div.jqi button:hover{ background-color: #728A8C; }
			div.jqi button.jqidefaultbutton{ background-color: #BF5E26; }
			.jqiwarning .jqi .jqibuttons{ background-color: #BF5E26; }

</style>

</head>

<body>
<?PHP
$applink= $db->fetchSingleRow("select * from application_link where ID = ".$_REQUEST["id"] );
$appremarks = $applink["remarks"];
?>	
<form name="frm_remarks" id="frm_remarks" action="../admin_process/remarks_save.php" method="post" onSubmit="return validation_remarks();">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
		       
		<tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4"><?php echo $db->errmsg[$db->decode64($_GET["resmsg"])]; ?></td>
        </tr>
		<tr>
          <td colspan="5" align="right"><a href="new_remarks.php?id=<?PHP echo $_REQUEST["id"]; ?>&alid=<?PHP echo $_REQUEST["alid"]; ?>&src=<?PHP echo $_REQUEST["rsrc"]; ?>">Back </a></td>
       </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="25" colspan="4">&nbsp;</td>
        </tr>
		  <tr>
          <td width="150" height="35" valign="middle"><span class="bl-text">Remarks</span></td>
          <td width="13" align="center" valign="middle"><strong>:</strong></td>
          <td colspan="4" align="left">
		  <textarea name="edit_remarks" class="field-popup" id="edit_remarks" cols="60" rows="6"><?php echo $appremarks; ?></textarea>
		  </td>
        </tr>
   <tr>
          <td height="35">&nbsp;</td>
          <td valign="middle">&nbsp;</td>
          <td colspan="4" align="left">
		  <input type="hidden" name="rsrc" id="rsrc" value="<?PHP echo $_REQUEST['rsrc']; ?>" />
          <input type="hidden" name="get_id" id="get_id" value="<?PHP echo $_REQUEST['id'];?>" />
		   <input type="hidden" name="aid" id="aid" value="<?PHP echo $_REQUEST['alid'];?>" />
		  <input type="hidden" name="page" id="page" value="<?PHP echo $_REQUEST['page']; ?>"  />
		 <input type="submit" name="frm_submit" id="frm_submit" class="btn-common" value="Submit" />
            
          </td>
        </tr>
     </table></td></tr>
 </table>
</form>   
</body>
</html>