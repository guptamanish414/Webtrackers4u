<? 
class export
{

function exportTable($table)
{
 $sql_query = "select * from $table";
 return $this->exportMysqlToCsv($sql_query);

}
function exportQuery($query)
{
 return $this->exportMysqlToCsv($query);
}


private function exportMysqlToCsv($sql_query)
{
    $csv_terminated = "\n";
    $csv_separator = ",";
    $csv_enclosed = '"';
    $csv_escaped = "\\";
     
    // Gets the data from the database
    $result = mysql_query($sql_query);
    $fields_cnt = mysql_num_fields($result);
 
 
    $schema_insert = '';
 
    for ($i = 0; $i < $fields_cnt; $i++)
    {
        $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
            stripslashes(mysql_field_name($result, $i))) . $csv_enclosed;
        $schema_insert .= $l;
        $schema_insert .= $csv_separator;
    } // end for
 
    $out = trim(substr($schema_insert, 0, -1));
    $out .= $csv_terminated;
 
    // Format the data
    while ($row = mysql_fetch_array($result))
    {
	 //  _d( $row[1]);
	  //  $row=$this->changeDateFormat($row);
	        $schema_insert = '';
        for ($j = 0; $j < $fields_cnt; $j++)
        {
           $row[$j]=$this->changeDateFormat($row[$j]);  
		    if ($row[$j] == '0' || $row[$j] != '')
            {
		
                if ($csv_enclosed == '')
                {
                    $schema_insert .= $row[$j];
                } else
                {
                    $schema_insert .= $csv_enclosed . 
					str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
                }
            } else
            {
                $schema_insert .= '';
            }
 
            if ($j < $fields_cnt - 1)
            {
                $schema_insert .= $csv_separator;
            }
        } // end for
 
        $out .= $schema_insert;
        $out .= $csv_terminated;
    } // end while
 
    
   return $out;
   
 
}

function exportArrayToCsv($data,$headings)
{
    $csv_terminated = "\n";
    $csv_separator = ",";
    $csv_enclosed = '"';
    $csv_escaped = "\\";

    // Gets the data from the database
   // $result = mysql_query($sql_query);
    $fields_cnt = count($headings);


    $schema_insert = '';

    for ($i = 0; $i < $fields_cnt; $i++)
    {
        $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
           $headings[$i] ). $csv_enclosed;
        $schema_insert .= $l;
        $schema_insert .= $csv_separator;
    } // end for

    $out = trim(substr($schema_insert, 0, -1));
    $out .= $csv_terminated;

    // Format the data
   foreach($data as $row)
    {
	 //  _d( $row[1]);
	  //  $row=$this->changeDateFormat($row);
	        $schema_insert = '';
        for ($j = 0; $j < $fields_cnt; $j++)
        {
           $row[$j]=$this->changeDateFormat($row[$j]);  
		    if ($row[$j] == '0' || $row[$j] != '')
            {

                if ($csv_enclosed == '')
                {
                    $schema_insert .= $row[$j];
                } else
                {
                    $schema_insert .= $csv_enclosed .
					str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
                }
            } else
            {
                $schema_insert .= '';
            }

            if ($j < $fields_cnt - 1)
            {
                $schema_insert .= $csv_separator;
            }
        } // end for

        $out .= $schema_insert;
        $out .= $csv_terminated;
    } // end while


   return $out;


}
function exportQueryToCsv_customHeading($sql_query,$headings)
{
    $csv_terminated = "\n";
    $csv_separator = ",";
    $csv_enclosed = '"';
    $csv_escaped = "\\";

    // Gets the data from the database
    $result = mysql_query($sql_query);
    $fields_cnt = count($headings);


    $schema_insert = '';

    for ($i = 0; $i < $fields_cnt; $i++)
    {
        $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
           $headings[$i] ). $csv_enclosed;
        $schema_insert .= $l;
        $schema_insert .= $csv_separator;
    } // end for

    $out = trim(substr($schema_insert, 0, -1));
    $out .= $csv_terminated;

    // Format the data
   while ($row = mysql_fetch_array($result))
    {
	 //  _d( $row[1]);
	  //  $row=$this->changeDateFormat($row);
	        $schema_insert = '';
        for ($j = 0; $j < $fields_cnt; $j++)
        {
          $row[$j]=$this->changeDateFormat($row[$j]);   
		    if ($row[$j] == '0' || $row[$j] != '')
            {

                if ($csv_enclosed == '')
                {
                    $schema_insert .= $row[$j];
                } else
                {
                    $schema_insert .= $csv_enclosed .
					str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
                }
            } else
            {
                $schema_insert .= '';
            }

            if ($j < $fields_cnt - 1)
            {
                $schema_insert .= $csv_separator;
            }
        } // end for

        $out .= $schema_insert;
        $out .= $csv_terminated;
    } // end while
   return $out;
}




function changeDateFormat($value)
{
if(strlen($value)==19)
{
		$p=explode("-",$value);$q=explode(":",$value);
		if($p>0 && $q>0)
		{
			$value= str_replace(array("-",":"),"-",$value);
		}


}
return $value;
}

function dbDump($db)   
{   
    $this->SQL=array();
	$tables = mysql_list_tables($db);
	while ($td = mysql_fetch_array($tables))
		{
			$table = $td[0];
			$this->tableDump($table);
		}
return implode("\r", $this->SQL);	
} 


function tableDump($table)
{
            $this->tableSQL=array();
			$r = mysql_query("SHOW CREATE TABLE `$table`");
			if ($r)
			{
                                $insert_sql = "";
                                $d = mysql_fetch_array($r);
                                $d[1] .= ";";
                                $this->SQL[] = str_replace("\n", "", $d[1]);
                                $this->tableSQL[]= str_replace("\n", "", $d[1]);
                                $table_query = mysql_query("SELECT * FROM `$table`");
                                $num_fields = mysql_num_fields($table_query);
                                while ($fetch_row = mysql_fetch_array($table_query))
                                {
                                        $insert_sql .= "INSERT INTO $table VALUES(";
                                        for ($n=1;$n<=$num_fields;$n++)
                                        {
                                        $m = $n - 1;
                                        $insert_sql .= "'".mysql_real_escape_string($fetch_row[$m])."', ";
                                        }
                                        $insert_sql = substr($insert_sql,0,-2);
                                        $insert_sql .= ");\n";
                                }
                                if ($insert_sql!= "")
                                {
                                        $this->SQL[] = $insert_sql;
                                        $this->tableSQL[] = $insert_sql;
                                }
			}

return implode("\r", $this->tableSQL);
}

function download($filename,$content)
{
	
	$filename = date("Y-m-d_H-i",time())."_".$filename;
	//header("Content-type: application/vnd.ms-excel");
	header("Content-type: application/octet-stream");
	header( "Content-disposition: filename=".$filename);
	print $content;
	exit;
}
function downloadFile($filename)
{
	
	
	//header("Content-type: application/vnd.ms-excel");
	header("Content-type: application/octet-stream");
	header( "Content-disposition: filename=".$filename);
	readfile($filename);
	exit;
}


function exportMysqlToCsv2($table) # have some csv error ','  ## useless
{
	
	$result = mysql_query("SHOW COLUMNS FROM ".$table."");
	$i = 0;
	if (mysql_num_rows($result) > 0) {
	while ($row = mysql_fetch_assoc($result)) {
	$csv_output .= $row['Field'].",";
	$i++;
	}
	}
	$csv_output .= "\n";
	
	$values = mysql_query("SELECT * FROM ".$table."");
	while ($rowr = mysql_fetch_row($values)) {
	for ($j=0;$j<$i;$j++) {
	$csv_output .= addslashes($rowr[$j]).",";
	}
	$csv_output .= "\n";
	}
	
		
	return $csv_output;
	
}



}
$export=new export;



?>