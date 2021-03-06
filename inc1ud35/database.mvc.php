<?PHP

/*

	This is a class file is created for insert, update, delete ann select from Database. 

*/



/*

	<<< Database connection settings >>>

*/



define("HOST_NAME","localhost");

define("USER_NAME","root");

define("PASSWORD","root123");

define("DATABASE_NAME","db1158703");   

/*

	<<< Database connection settings end >>>

*/



/*

	<<< Database column type >>>

*/

define('MYSQL_TYPES_NUMERIC', 'int real ');

define('MYSQL_TYPES_DATE', 'datetime timestamp year date time ' );

define('MYSQL_TYPES_STRING', 'string blob ' );

/*

	<<< Database column type end >>>

*/



/*

	<<< Website Full URL >>>

*/

define("SITE_URL","http://sundar/kidston/website_progressing/");

/*

	<<< Website Full URL end >>>

*/





/*

	<<< Database main class >>>

*/

class Database 

{ // <<< main class >>>



//----------------------------------	

	var $host;   

	var $user;

	var $pw;

	var $db;  

	var $dblink;     

	var $auto_slashes; 

	var $last_error;        

	var $last_query; 

	var $errmsg = array("<span class='error'><b>There was an unexpected error and the process has not been completed! Please try again.</b></span>","<font color='#009900'><b>Success: Record Created.</b></font>", "<font color='#009900'><b>Success: Record Updated.</b></font>","<font color='#009900'><b>Success: Status Changed.</b></font>","<font color='#009900'><b>Success: File Uploaded.</b></font>","<font color='#FF0000'><b>Success: Record Deleted.</b></font>","<font color='#FF0000'><b>Partial Success: Record created. File Not Uploaded! Please edit the record and try uploading the file again.</b></font>","<font color='#FF0000'><b>Partial Success: Record updated. File Not Uploaded! Please edit the record and try uploading the file again.</b></font>","<font color='#009900'><b>You have successfully logged out!</b></font>","<font color='#FF0000'><b>Your session has expired!</b></font>","<font color='#FF0000'><b>Invalid Username or Password! Please try again.</b></font>","<font color='#FF0000'><b>This user is temporarily unavailable!</b></font>","<span class='error'>Sorry. You do not have access to this section!</span>","<span class='success'><b>Success: Process Completed!</b></span>","<span class='success'><b>Partial Success: Process Completed! But file/image was not uploaded! Please edit the record and try uploading the file again.</b></span>","<span class='error'><b>Record already Exist!</b></span>","<span class='success'><b>Successfully logged out!</b></span>","<span class='success'><b>Erfolgreich: Prozess abgeschlossen!</b></span>");

		 

	var		$HostName;

	var		$UserName;

	var		$PassWord;

	var		$DatabaseName;

	var		$DatabaseLink;

	

//----------------------------------	



		function Database($hostName = HOST_NAME, $userName = USER_NAME, $password = PASSWORD, $databaseName = DATABASE_NAME)

		{

			$this->HostName			=	$hostName;

			$this->UserName			=	$userName;

			$this->PassWord			=	$password;

			$this->DatabaseName		=	$databaseName;

			$this->DatabaseLink		=	mysql_connect($this->HostName, $this->UserName, $this->PassWord) or die(mysql_error());

			mysql_select_db($this->DatabaseName,$this->DatabaseLink); 

		}

	

	

	

		function getPagerData($numHits, $limit, $page)  

		{  

		   $numHits  = (int) $numHits;  

		   $limit    = max((int) $limit, 1);  

		   $page     = (int) $page;  

		   $numPages = ceil($numHits / $limit);  

	

		   $page = max($page, 1);  

		   $page = min($page, $numPages);  

	

		   $offset = ($page - 1) * $limit;  

	

		   $ret = new stdClass;  

	

		   $ret->offset   = $offset;  

		   $ret->limit    = $limit;  

		   $ret->numPages = $numPages;  

		   $ret->page     = $page;  

	

		   return $ret;  

	   }  

	

		function db_insert($table, $data)

		{ // <<< db_insert >>>

			if (empty($data))

			{

				$this->last_error = "Invalid db_insert function call! Parameter value for Data ara missing.";

				return false;

			}

		

			$cols = '(';

			$values = '(';

		

			foreach ($data as $key=>$value)

			{ // <<< foreach >>>  

				$cols .= "$key,";

				$col_type = $this->get_column_type($table, $key);  // get column type

				

				if (!$col_type) return false;  // error!

				

				if (substr_count(MYSQL_TYPES_NUMERIC, "$col_type ")) $values .= "$value,";

				elseif (substr_count(MYSQL_TYPES_DATE, "$col_type "))

				{

					$value = $this->sql_date_format($value, $col_type); // format date

					$values .= "'$value',";

					//echo "$values";

					//echo "<br>".$key." = ".$value;

				}

				elseif (substr_count(MYSQL_TYPES_STRING, "$col_type "))

				{

					if ($this->auto_slashes) $value = addslashes($value);

						$values .= "'$value',";

				}

				

			} // <<< foreach end >>> 

			

			$cols = rtrim($cols, ',').')';

			$values = rtrim($values, ',').')';   

			$sql = "INSERT INTO $table $cols VALUES $values";

			//echo "sql=$sql";

			return $this->insert_sql($sql);

			

		} // <<< db_insert end >>>



	   function insert_sql($sql) 

	   { // <<< insert_sql >>> 

      		$this->last_query = $sql;

     

     		$r = mysql_query($sql);

			if (!$r) 

			{

				$this->last_error = mysql_error ();

				return false;

			}

     

			$id = mysql_insert_id();

			if ($id == 0) return true;

			else return $id;

			

	   } // <<< insert_sql end >>>



    function get_column_type($table, $column)

    {

      $r = mysql_query("SELECT $column FROM $table LIMIT 1");

      if (!$r)

      {

         $this->last_error = mysql_error();

         return false;

      }

      $ret = mysql_field_type($r, 0);

      if (!$ret)

      {

         $this->last_error = "Unable to get column information on $table.$column.";

         mysql_free_result($r);

         return false;

      }

      mysql_free_result($r);

      return $ret;

    }

	

	function sql_date_format($value, $type)

	{// <<< date_format >>>

	

	if (gettype($value) == 'string') $value = strtotime($value);

	return date('Y-m-d H:i:s', $value);

	}// <<< date_format end >>>

	

   function update($table, $data, $condition)

   {// <<< UPDATE >>>

		if (empty($data))

		{

			$this->last_error = "You must pass an array to the update_array() function." ;

			return false;

		}

     

		$sql = "UPDATE $table SET";

		foreach ($data as $key=>$value)

		{     

			$sql .= " $key=";

			$col_type = $this->get_column_type ($table, $key);  // get column type

			if (!$col_type) return false;  // error!

          

			if (substr_count(MYSQL_TYPES_NUMERIC, "$col_type "))

				$sql .= "$value,";

			elseif (substr_count(MYSQL_TYPES_DATE, "$col_type " ))

			{

				$value = $this->sql_date_format ($value, $col_type); // format date

				$sql .= "'$value',";

			}

			elseif (substr_count(MYSQL_TYPES_STRING, "$col_type "))

			{

				if ($this->auto_slashes) $value = addslashes($value);

					$values .= "'$value',";

				$sql=$sql.$values;

				unset($values);

			}

		}

		

		$sql = rtrim($sql, ','); 

		if (!empty($condition)) $sql .= " WHERE $condition" ;

		//echo "sql=$sql<br>";

		return $this->update_sql($sql);

      

	}// <<< UPDATE END >>>

    

	function update_sql($sql)

	{// <<< UPDATE_SQL >>>

		$this->last_query = $sql;

     

		$r = mysql_query($sql);

		if (!$r) {

			$this->last_error = mysql_error ();

			return false;

		}

     

		$rows = mysql_affected_rows();

		if ($rows == 0) return true;  // no rows were updated

		else return $rows;

	}// <<< UPDATE_SQL END >>>



	function delete_sql($sql)

	{// <<< Delete_SQL >>>

		$this->last_query = $sql;

     

		$r = mysql_query($sql);

		if (!$r) {

			$this->last_error = mysql_error ();

			return false;

		}

     

		$rows = mysql_affected_rows();

		if ($rows == 0) return true;  // no rows were Deleted

		else return $rows;

	}// <<< DElete_SQL END >>>



	function mysqlQuery($qry)

	{// <<< mysqlQuery >>>

		$rs		=	mysql_query($qry, $this->DatabaseLink);

		return $rs;

	}// <<< mysqlQuery END >>>

	

	function getTableArray($qry)	

	{// <<< getTableArray >>>

		$dataTable		=	array();

		$rs				=	mysql_query($qry);

		if($rs	===	FALSE)  

			return $dataTable; 

		

		$fieldcount		=	@mysql_num_fields($rs);

		$fields			=	array();	

		for ($i=0; $i<$fieldcount; $i++ )

			 $fields[$i]		=	@mysql_field_name($rs,$i);

		

		$count		=	0;

		

		while ($row	=	@mysql_fetch_array($rs)) {

			for ($i=0; $i<$fieldcount; $i++ )

			$dataTable[$count][$fields[$i]]		=	$row[$fields[$i]];

			$count++;	

		}

		

		@mysql_free_result($rs);

		return 	$dataTable;	

	}// <<< getTableArray END >>>	

	

	function fetchSingleRow($qry)

	{

		$row		=	array();

		$rs			=	mysql_query($qry);

		if($rs	===	FALSE)

			return $row;

				

		$row		=	mysql_fetch_array($rs);

		mysql_free_result($rs);

		return $row;	

	} 

	function fetchSingleAssocRow($qry)

	{

		$row		=	array();

		$rs			=	mysql_query($qry);

		if($rs	===	FALSE)

			return $row;

				

		$row		=	mysql_fetch_assoc($rs);

		mysql_free_result($rs);

		return $row;	

	}

	

	

	function pagenostring($qry,$start,$limit)

	{

		$linklimit	=	10;

		$Q_rs	=	@mysql_query($qry);

		$noofrows	=	@mysql_num_rows($Q_rs);

		

		$no_of_pages	=	$noofrows/$limit;

		$no_of_pages	=	ceil($no_of_pages);

		$str='&nbsp;';

		

		if($no_of_pages<=$linklimit)

		{

			for($i=0;$i<$no_of_pages;$i++)

			{

				if(($i*$limit)==$start)

					$str=$str.($i+1);

				else

					$str=$str.'&nbsp;&nbsp;<a class="font1" href="#" onClick="_submit('.$i*$limit.');">'.(1+$i).'</a>&nbsp;&nbsp;';

			}

			return($str);

		}

		else

		{

			if($start==0)

			{

				$istart	=	0;

				$iend	=	$linklimit;

			}

			else

			{

				if((($start/$limit)-$linklimit)<0)

					$istart	=	0;

				else

					$istart	=	($start/$limit)-($linklimit-1);

				if((($start/$limit)+$linklimit)>$no_of_pages)

					$iend	=	$no_of_pages;

				else

					$iend	=	($start/$limit)+$linklimit;

			}

			for($i=$istart;$i<$iend;$i++)

			{

				if(($i*$limit)==$start)

					$str=$str.($i+1);

				else

					$str=$str.'&nbsp;<a href="#" class="font1" onClick="_submit('.$i*$limit.');">'.(1+$i).'</a>&nbsp;';

			}

			return($str);

					

		}

	}

	function check_input($value)

	{

			$value = htmlentities($value);

		// Stripslashes

		if (get_magic_quotes_gpc())

  		{

  			$value = stripslashes($value);

  		}

		//if (!is_numeric($value))

  		//{

		 	//$value = "'" . mysql_real_escape_string($value) . "'";

			$value = mysql_real_escape_string($value);

  		//}

		//$value = htmlentities($value);

    	$value = preg_replace(

        array(

          // Remove invisible content

			'@<head[^>]*?>.*?</head>@siu',

            '@<style[^>]*?>.*?</style>@siu',

            '@<script[^>]*?.*?</script>@siu',

            '@<object[^>]*?.*?</object>@siu',

            '@<embed[^>]*?.*?</embed>@siu',

            '@<applet[^>]*?.*?</applet>@siu',

            '@<noframes[^>]*?.*?</noframes>@siu',

            '@<noscript[^>]*?.*?</noscript>@siu',

            '@<noembed[^>]*?.*?</noembed>@siu',

            //'@<table[^>]*?.*?</table>@siu',

          // Add line breaks before and after blocks

            '@</?((address)|(blockquote)|(center)|(del))@iu',

            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',

            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',

            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',

            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',

            '@</?((frameset)|(frame)|(iframe))@iu',

        ),

        array(

            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',

            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",

            "\n\$0", "\n\$0",

        ),

        $value );

		

		

		return strip_tags($value,"<img><table><tr><td><tbody><p><pre>");

	}

	

	function check_input_ed($value)

	{

		// Stripslashes

		if (get_magic_quotes_gpc())

  		{

  			$value = stripslashes($value);

  		}

		//if (!is_numeric($value))

  		//{

		 	//$value = "'" . mysql_real_escape_string($value) . "'";

			$value = mysql_real_escape_string($value);

  		//}

		$value = preg_replace(array('@<script[^>]*?.*?</script>@siu',),array('',),$value);

/*    	$value = preg_replace(

        array(

          // Remove invisible content

			'@<head[^>]*?>.*?</head>@siu',

            '@<style[^>]*?>.*?</style>@siu',

            '@<script[^>]*?.*?</script>@siu',

            '@<object[^>]*?.*?</object>@siu',

            '@<embed[^>]*?.*?</embed>@siu',

            '@<applet[^>]*?.*?</applet>@siu',

            '@<noframes[^>]*?.*?</noframes>@siu',

            '@<noscript[^>]*?.*?</noscript>@siu',

            '@<noembed[^>]*?.*?</noembed>@siu',

            //'@<table[^>]*?.*?</table>@siu',

          // Add line breaks before and after blocks

            '@</?((address)|(blockquote)|(center)|(del))@iu',

            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',

            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',

            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',

            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',

            '@</?((frameset)|(frame)|(iframe))@iu',

        ),

        array(

            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',

            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",

            "\n\$0", "\n\$0",

        ),

        $value );

*/		

		

		return $value;

	}

	function pinput($param)

	{

		$value = $_POST[$param];

		$value = htmlentities($value);

		// Stripslashes

		if (get_magic_quotes_gpc())

  		{

  			$value = stripslashes($value);

  		}

		//if (!is_numeric($value))

  		//{

		 	//$value = "'" . mysql_real_escape_string($value) . "'";

			$value = mysql_real_escape_string($value);

  		//}

		

    	$value = preg_replace(

        array(

          // Remove invisible content

			'@<head[^>]*?>.*?</head>@siu',

            '@<style[^>]*?>.*?</style>@siu',

            '@<script[^>]*?.*?</script>@siu',

            '@<object[^>]*?.*?</object>@siu',

            '@<embed[^>]*?.*?</embed>@siu',

            '@<applet[^>]*?.*?</applet>@siu',

            '@<noframes[^>]*?.*?</noframes>@siu',

            '@<noscript[^>]*?.*?</noscript>@siu',

            '@<noembed[^>]*?.*?</noembed>@siu',

            //'@<table[^>]*?.*?</table>@siu',

          // Add line breaks before and after blocks

            '@</?((address)|(blockquote)|(center)|(del))@iu',

            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',

            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',

            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',

            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',

            '@</?((frameset)|(frame)|(iframe))@iu',

        ),

        array(

            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',

            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",

            "\n\$0", "\n\$0",

        ),

        $value );

		

		

		return strip_tags($value,"<img><table><tr><td><tbody><p><pre>");

	}

	

	

	

	

	function check_login_input($value)

	{

		if (get_magic_quotes_gpc())

  		{

  			$value = stripslashes($value);

  		}

		//if (!is_numeric($value))

  		//{

		 	//$value = "'" . mysql_real_escape_string($value) . "'";

			$value = mysql_real_escape_string($value);

  		//}

		return $value;

	}	

	function fetchSingleRowParam($table,$param,$apnd)

	{	

		$row		=	array();	

		$qry = rtrim("select * from $table", ','); 

		

		if (!empty($param))

		{

		$qry .= " where ";

		$loop = 0;

			foreach ($param as $key=>$value)

			{

				if($loop > 0)

				{

					$qry .= " and ";

				}

				//echo $key." - ".$value."<br>";

				$qry .= "$key = '$value'";

				$loop += 1;

			}

		}

		if($apnd != "")

		{

			$qry .= " $apnd";

		}

		$rs			=	mysql_query($qry);

		$this->last_query = $qry;

		if($rs	===	FALSE)

			return $row;

				

		$row		=	mysql_fetch_array($rs);

		mysql_free_result($rs);

		return $row;	

		

	} 

	function getTableArrayParam($table,$param,$apnd)	

	{// <<< getTableArray >>>

		$dataTable		=	array();

		$qry = rtrim("select * from $table", ','); 

		if (!empty($param))

		{

		$qry .= " where ";

		$loop = 0;

			foreach ($param as $key=>$value)

			{

				if($loop > 0)

				{

					$qry .= " and ";

				}

				//echo $key." - ".$value."<br>";

				$qry .= "$key = '$value'";

				$loop += 1;

			}

		}

		if($apnd != "")

		{

			$qry .= " $apnd";

		}

		$rs				=	mysql_query($qry);

		$this->last_query = $qry;

		if($rs	===	FALSE)  

			return $dataTable; 

		

		$fieldcount		=	@mysql_num_fields($rs);

		$fields			=	array();	

		for ($i=0; $i<$fieldcount; $i++ )

			 $fields[$i]		=	@mysql_field_name($rs,$i);

		

		$count		=	0;

		

		while ($row	=	@mysql_fetch_array($rs)) {

			for ($i=0; $i<$fieldcount; $i++ )

			$dataTable[$count][$fields[$i]]		=	$row[$fields[$i]];

			$count++;	

		}

		

		@mysql_free_result($rs);

		return 	$dataTable;	

	}// <<< getTableArray END >>>	

		

	

	

	function encode64($val)

	{

		return base64_encode($val);

	}

	

	function decode64($val)

	{

		return base64_decode($val);

	}

	

	function menu_show($m)

	{

		if(($_SESSION[$m] == "Y") && ($_SESSION["aact"] == "1" || $_SESSION["aact"] == "2" || $_SESSION["aact"] == "3"))

		{

			return true;

		}else

		{

			return false;

		}

	}

	function full_permission($m)

	{

		if(($_SESSION[$m] == "Y") && $_SESSION["aact"] == "1")

		{

			return true;

		}else

		{

			return false;

		}

	}

	function check_permission($m)

	{

		if($_SESSION[$m] == "Y")

		{

			return true;

		}else

		{

			return false;

		}

	}

	

	function stringToUrlSlug($string)

    {

        $unPretty = array('/�/', '/�/', '/�/', '/�/', '/�/', '/�/', '/�/', '/\s?-\s?/', '/\s?_\s?/', '/\s?\/\s?/', '/\s?\\\s?/', '/\s/', '/"/', '/\'/');

        $pretty   = array('ae', 'oe', 'ue', 'Ae', 'Oe', 'Ue', 'ss', '-', '-', '-', '-', '-', '', '','');

       

        $retstring = strtolower(preg_replace($unPretty, $pretty, $string));

		$retstring = str_replace(".","",$retstring);

		$retstring = str_replace("?","",$retstring);

		$retstring = str_replace("%","",$retstring);

		

		return $retstring;

    }

	function htmle($ty,$nm,$val)

	{

		echo "<input type='".$ty."' name='".$nm."' id='".$nm."' value='".$val."' >";

	}

	

	function admin_name($aid)

	{

		$adn = $this->fetchSingleRow("select name from admin_access where ID='$aid'");

		if($adn)

			return $adn["name"];

		else

			return '';

	}

	

// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<@>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>







	

} // <<< main class end >>>



/*

	<<< Database main class end >>>

*/



/*

	<<< Initialize the object >>>

*/



	$db = new Database();



?>