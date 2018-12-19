<?PHP
 
		if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
		{
			include("../../inc1ud35/database.mvc.php");
		}else
		{
			include("../../inc1ud35/database.mvc.live.php");
		}
		
		$get_thevalue = $db->check_input($_REQUEST["thevalue"]);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?PHP
		//for($i=0;$i<$get_thevalue;$i++)
		//{
?>
  <tr>
    <td height="35" align="left" valign="middle">
<select name="frm_language_<?PHP echo $get_thevalue; ?>" id="frm_language" class="field-job-drp">
		  <option value="">Select a Language</option>
		  <option value="Bitte Wahlen Sie">Bitte Wahlen Sie</option>
		  <option value="Deustch">Deustch</option>
		  <option value="English">English</option>
		  <option value="French">French</option>
		  <option value="German">German</option>
</select>
	</td>
  </tr>
  <tr>
    <td height="35" align="left" valign="middle">
		  <input type="radio" name="frm_f_<?PHP echo $get_thevalue; ?>" id="frm_f1_<?PHP echo $get_thevalue; ?>" value="Muttersprache" />Muttersprache
		  &nbsp;
		  <input type="radio" name="frm_f_<?PHP echo $get_thevalue; ?>" id="frm_f2_<?PHP echo $get_thevalue; ?>" value="Verhandlungssicher" />Verhandlungssicher
		  &nbsp;
		  <input type="radio" name="frm_f_<?PHP echo $get_thevalue; ?>" id="frm_f3_<?PHP echo $get_thevalue; ?>" value="Berufspraxis" />Berufspraxis
	</td>
  </tr>
		 
<?PHP			
		//}

?>
</table>
<?PHP

		
if($_REQUEST["act"] == "add")
{
	echo "^@^";
	echo ($get_thevalue+1);
}
		
?>