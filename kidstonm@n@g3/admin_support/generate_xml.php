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

	 { 

ob_start();

echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>";	 		

		$val = $_POST["lenval"]; 

		$xm  = "<JOBS>";

	 		for($i=0;$i<$val;$i++)

			{//for loop			

				$chk_id = $_POST['chk'.$i]; 

				$sql_xml = $db->fetchSingleRow("select * from job_details where ID='$chk_id'");
				$sql_xml['job_title'];	

				if($sql_xml >0)

				{	
				
				$text=preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $sql_xml['job_title']);
				
				//echo "<pre>Text: ".$text."</pre>";

					$xm  = $xm."<INSERATE><ORGANISATIONID>3685</ORGANISATIONID><INSERATID>".html_entity_decode($sql_xml['job_code'])."</INSERATID><TITEL>".html_entity_decode($text)."</TITEL><BERUF>".html_entity_decode($text)."</BERUF><TEXT>".html_entity_decode($sql_xml['job_brief'])."</TEXT><KONTAKT>".html_entity_decode($sql_xml['cont_pemail'])."</KONTAKT><EMAIL>".$sql_xml['cont_pemail']."</EMAIL><URL>".SITE_URL."</URL><DIREKT_URL>".SITE_URL."job/".html_entity_decode($sql_xml['ID'])."/".html_entity_decode($db->stringToUrlSlug($sql_xml['job_title']))."</DIREKT_URL></INSERATE>";

			}			

		}	//for loop

		$xm  = $xm."</JOBS>";

		//echo $xm;

		$file_xml = fopen("../../xmlwire/kidston_jobs.xml","w");

				fwrite($file_xml, ob_get_contents());

				fclose($file_xml);

		ob_end_flush();

		//echo $xm;

} // #submit - Save

?>



