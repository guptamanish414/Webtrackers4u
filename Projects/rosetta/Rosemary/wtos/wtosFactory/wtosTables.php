<?
include('../includes/config.php');
include('../top.php');

if(isset($_POST['tableName'])){
$_SESSION['tables']=$_POST;
}
$v=$_SESSION['tables'];
foreach($v['tableName'] as $k=>$val)
{
$tableName=trim($val);
if($tableName!='')
		{
 
 
 
 $str="CREATE TABLE IF NOT EXISTS `".$tableName."`(";
 
$flds=$v['fields'][$k];
		
		$fldsD=explode("\n",$flds);
		
		  $strA=array();
		
		   foreach($fldsD as $fval){
		   
		      $D=explode(" ",$fval);
			  
			  $name=trim($D[0]); $Type=trim($D[1]); $size=trim($D[2]); $pk=trim($D[3]); $ai=trim($D[4]); 
			  if($name!='')
			  {
			  $aiStr='';
			 
				if($ai=="ai")
				{
				  
				  $aiStr='AUTO_INCREMENT';
				}
				 
				if($Type=='v'){  $strA[]=" `$name` varchar($size) COLLATE utf8_unicode_ci NOT NULL";   }
				if($Type=='i'){  $strA[]=" `$name` int($size) NOT NULL $aiStr";   }
				if($Type=='t'){  $strA[]=" `$name` tinyint($size)  NOT NULL";   }
				if($Type=='te'){ $strA[]=" `$name` text COLLATE utf8_unicode_ci NOT NULL";   }
				if($Type=='d'){  $strA[]=" `$name` datetime NOT NULL";   }
				if($Type=='do'){ $strA[]=" `$name` varchar($size) COLLATE utf8_unicode_ci NOT NULL";   }
				if($Type=='f'){  $strA[]=" `$name` varchar($size) COLLATE utf8_unicode_ci NOT NULL";   }
				if(trim($pk)=='pk'){  $pks=", PRIMARY KEY (`$name`)";  }
			 
			   }
		  
		   }
		
		
		 
		
		  
		
		
		 $strIlode=implode(', ',$strA);
		 $str .=$strIlode. $pks;
			 
		   

$str .=") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ";

 
mysql_query("DROP TABLE `$tableName`");
mysql_query($str);
}
}

 

 /*
" `test` (
  `testId` int(11) NOT NULL AUTO_INCREMENT,
  `testName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(2) NOT NULL,
  PRIMARY KEY (`testId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ";
*/

?>
<style>
.tname{ width:200px; }
.fname{ width:200px; height:400px;}
.tkname{ color:#FFFFFF; font-weight:bold; }

</style>
<div style="background-color:#3399FF; padding:20px;">
<form action="" method="post">
<div style="font-size:14px; color:#FFFFFF; padding:5px 0px 5px 30px;"> 
<span  class="tkname">v</span>-varchar 
<span  class="tkname">i</span>-integer 
<span  class="tkname">t</span>-tiny 
<span  class="tkname">te</span>-text 
<span  class="tkname">d</span>-datetime 
<span  class="tkname">do</span>-double 
<span  class="tkname">f</span>-float 
<span  class="tkname">pk</span>-primerykey 
<span  class="tkname">ai</span>- autoincrement <br />
 Example  <b style="font-size:12px;">imageId i 10 pk ai  |  description te  |  addedDate d |  addedBy i 10 |  modifyDate d |  modifyBy i 10 |  active t 2</b>


 </div>

<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Table</td>
    <td><input type="text" class="tname" name="tableName[]" value="<? echo $v['tableName'][0]; ?>" /></td>
	<td><input type="text" class="tname"  name="tableName[]" value="<? echo $v['tableName'][1]; ?>" /></td>
	<td><input type="text" class="tname"  name="tableName[]" value="<? echo $v['tableName'][2]; ?>" /></td>
	<td><input type="text" class="tname"  name="tableName[]" value="<? echo $v['tableName'][3]; ?>" /></td>
	<td><input type="text" class="tname"  name="tableName[]" value="<? echo $v['tableName'][4]; ?>" /></td>
	<td><input type="text" class="tname"  name="tableName[]" value="<? echo $v['tableName'][4]; ?>" /></td>
  </tr>
  <tr>
    <td>Fields</td>
    <td><textarea class="fname" name="fields[]"><? echo $v['fields'][0]; ?></textarea></td>
	<td><textarea class="fname" name="fields[]"><? echo $v['fields'][1]; ?></textarea></td>
	<td><textarea class="fname" name="fields[]"><? echo $v['fields'][2]; ?></textarea></td>
	<td><textarea class="fname" name="fields[]"><? echo $v['fields'][3]; ?></textarea></td>
	<td><textarea class="fname" name="fields[]"><? echo $v['fields'][4]; ?></textarea></td>
	<td><textarea class="fname" name="fields[]"><? echo $v['fields'][4]; ?></textarea></td>
  </tr>
   
</table>
<input type="submit" value="OK" style="margin:5px 0px 0px 30px; height:30px; width:40px; font-weight:bold; color:#0033FF; font-size:16px;" />
</form>
<br />
<div style="margin:0px 0px 0px 30px; color:#FFFFFF ">
addedDate d <br />  addedBy i 10 <br />  modifyDate d <br />  modifyBy i 10 <br />  active t 2
</div>
<div style="font-style:italic; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FF0000; font-size:36px; font-weight:bold; position:absolute; top:460px; left:650px;">
WTOS FACTORY
</div>
</div>
<br />
<br />
<br />
 