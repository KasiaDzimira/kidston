<?PHP
session_start(); 
if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "saravanan")
	{
		include("../../inc1ud35/database.mvc.php");
	}
	else
	{
		include("../../inc1ud35/database.mvc.live.php");
	}
	//	include("progressing-alert.php");
	$resmsg = $db->encode64("0");
	if(isset($_POST["btsave"]) && $_POST["btsave"] == "Generate XML")
	 { // #submit - Save
// Send the headers	 
//header('Content-type: text/xml');
//header('Pragma: public');
//header('Cache-control: private');
//header('Expires: -1');
ob_start();
echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>";	 		
		$val = $_POST["lenval"]; 
		$db->delete_sql("delete from xml_master where status ='Y'");
		$tab_pet = "";
		$tab_pet = "xml_master";
		for($p=0;$p<$val;$p++)
		{// P for
			$frm_job  = $_POST['chk'.$p];
			
			if(isset($_POST['chk'.$p]) )
			{
				$inplt["job_id"] = $frm_job;
				$inplt["status"] = 'Y';
				$sql_insert = $db->db_insert($tab_pet,$inplt);
			
			}
			
		}// P for
		$xm  = "<JOBS>";
	 		for($i=0;$i<$val;$i++)
			{//for loop			
				$chk_id = $_POST['chk'.$i]; 
				$sql_xml = $db->fetchSingleRow("select * from job_details where ID='$chk_id'");
				$sql_xml['job_title'];	
				if($sql_xml >0)
				{	
					$xm  = $xm."<INSERATE><INSERAT><ORGANISATIONID>3685</ORGANISATIONID><INSERATID>".html_entity_decode($sql_xml['job_code'])."</INSERATID><TITEL>".html_entity_decode($sql_xml['job_title'])."</TITEL><BERUF>".html_entity_decode($sql_xml['job_title'])."</BERUF><TEXT>".html_entity_decode($sql_xml['job_brief'])."</TEXT><KONTAKT>".html_entity_decode($sql_xml['cont_pemail'])."</KONTAKT><EMAIL>".$sql_xml['cont_pemail']."</EMAIL><URL>".SITE_URL."</URL><DIREKT_URL>".SITE_URL."job/".html_entity_decode($sql_xml['ID'])."/".html_entity_decode($db->stringToUrlSlug($sql_xml['job_title']))."</DIREKT_URL></INSERAT></INSERATE>";
			}			
		}	//for loop
		$xm  = $xm."</JOBS>";
		echo $xm;
		$file_xml = fopen("../../xmlwire/kidston_jobs.xml","w");
				fwrite($file_xml, ob_get_contents());
				fclose($file_xml);
		ob_end_flush();
		//echo $xm;
} // #submit - Save
?>
<script language="javascript">window.close();</script>
