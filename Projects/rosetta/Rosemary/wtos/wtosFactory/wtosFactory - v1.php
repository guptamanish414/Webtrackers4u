<?php
 
include('../includes/config.php');
include('../top.php');
$table=$_GET['table'];
$alowRight=false;
//$alowRight=true;

function stored($columnName)
{
 global $table;
 if($table=='' && $columnName==''){return;}
 if(isset($_POST['alise'])){
       $_SESSION['alise'][$table]=$_POST['alise'];
 }
  $cA=($_SESSION['alise'][$table][$columnName]!='')?$_SESSION['alise'][$table][$columnName]:$columnName;
  return $cA;
}

function checked($columnName,$aliseArr)
{
    global $table;
    if($table=='' && $columnName==''&& $aliseArr==''){return;}
	  if(isset($_POST[$aliseArr])){
       $_SESSION[$aliseArr][$table]=$_POST[$aliseArr];
       }
	 $cf=($_SESSION[$aliseArr][$table][$columnName]!='')?'checked="checked"':'';
	return $cf;
}



//if($table=='admin'){ $alowRight=true; }

$flds=mysql_query("SHOW COLUMNS FROM $table");


if($flds){
?>
   
<form action="" method="post">
<span style="color:#FF0000;">&nbsp;1.Please do not check Search box for image field &nbsp; 2. by default all fields are text.  </span><br />
<span style="color:#0000CC;">&nbsp;1.Be sure that the filds are there in the table '<b>addedBy</b>'(int) , '<b>addedDate</b>'(datetime) and '<b>active</b>'(tinyint).</span><br />

<br />
<div style="font-style:italic; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FF0000; font-size:36px; font-weight:bold; position:absolute; top:260px; left:650px;">
WTOS FACTORY
</div>
<table> <tr><td><b> Primery</b></td>    <td><b>Field</b> </td>  <td><b>Alise</b> </td> <td><b style="color:#FF0000;">Ignor</b> </td>  <td><b>Listing</b> </td> <td><b>Search</b> </td>  <td><b>Image</b></td>       </tr>

<? 
$if=0;
while($tField=mysql_fetch_assoc($flds))
{

if($tField['Field']=='addedBy' || $tField['Field']=='addedDate' || $tField['Field']=='active' ){ continue;}
 
$if++;
$chkPrimery=($if==1)?'checked="checked"':'';

$trID='tr'.$if;
$chkID='chk'.$if;
 ?>

<tr id="<? echo $trID ?>" style="background:#0080FF;">
<td align="right"><input type="radio"  name="primery" value="<? echo $tField['Field'] ?>"  <? echo $chkPrimery   ?> /> </td> 
 <td><input type="text" name="fields[]" value="<? echo $tField['Field'] ?>" readonly="readonly" style="background-color:#0069D2; color:#ffffff"  /> </td>  
 <td><input type="text" name="alise[<? echo $tField['Field'] ?>]" value="<? echo stored($tField['Field'])?>" /></td>
  <td><input onclick="Ignor();"  id="<? echo $chkID ?>" type="checkbox" name="ignor[<? echo $tField['Field'] ?>]" value="<? echo $tField['Field'] ?>"  <? echo checked($tField['Field'],'ignor') ?> /></td> 
  <td><input type="checkbox" name="list[<? echo $tField['Field'] ?>]" value="<? echo $tField['Field'] ?>" <? echo checked($tField['Field'],'list') ?> /> </td> 
<td><input type="checkbox" name="search[<? echo $tField['Field'] ?>]" value="<? echo $tField['Field'] ?>" <? echo checked($tField['Field'],'search') ?> />  </td> 
<td><input type="checkbox" name="image[<? echo $tField['Field'] ?>]" value="<? echo $tField['Field'] ?>" <? echo checked($tField['Field'],'image') ?> />  </td>

</tr>
<? } ?>
<tr>
<td colspan="20" style="color:#0080FF"> 
<script>
var i=<? echo $if ?>;
function Ignor()
{
 var trID='';
 var chkID='';
  
  for(var j=1;j<=i; j++)
  {
  
    var trID='tr'+j;
    var chkID='chk'+j;
	
    if(os.getObj(chkID).checked){os.getObj(trID).style.background='#FF0000';}else{os.getObj(trID).style.background='#0080FF';}
  }
}
Ignor()
</script>
</td>
</tr>
</table>


<table><tr><td>
<br />   
 &nbsp; List Page <input type="text" name="listpage" value="<? echo $table ?>_f"  />    
 &nbsp; Edit Page <input type="text" name="editpage" value="<? echo $table ?>Edit_f"  /> <br />   <br />   
 &nbsp; List Page H <input type="text" name="listpageH" value="List <? echo $table ?>"  />  
  &nbsp; Edit Page H <input type="text" name="editpageH" value="Edit <? echo $table ?>"  /> <br />
  &nbsp; Add Page H <input type="text" name="addpageH" value="Add <? echo $table ?>"  /> <br />


<input type="submit" value="Create" name="Create" />
<input type="hidden" name="Proceed" value="OK" />
</td>  <td>


</td> </tr></table>
</form>
<? } ?>

<? if($_POST['Create']=='Create' && $_POST['Proceed']=='OK'){ ?>
<? 

$os->Factory['WTF_primery']=$_POST['primery'];
$os->Factory['WTF_table']=$table;
$os->Factory['WTF_listpage']=$_POST['listpage'];
$os->Factory['WTF_editpage']=$_POST['editpage'];
$os->Factory['WTF_H_listpage']=$_POST['listpageH'];
$os->Factory['WTF_H_editpage']=$_POST['editpageH'];
$os->Factory['WTF_H_addpage']=$_POST['addpageH'];


$os->Factory['WTF_dataToSave']="\n";
$os->Factory['WTF_andFields']="\n";
$os->Factory['WTF_andFieldQuery']=" ";
$os->Factory['WTF_searchHtml']="\n";
$os->Factory['WTF_listTitles']="\n";
$os->Factory['WTF_listValues']="\n";
$os->Factory['WTF_searchScript']="\n";
$os->Factory['WTF_EditFields']="\n";

	 		 		


$listpage=$os->Factory['WTF_listpage'].'.php';
$editpage=$os->Factory['WTF_editpage'].'.php';
 
 
if($alowRight){
$os->listpage = fopen('../'.$listpage, 'w');
$os->editpage = fopen('../'.$editpage, 'w');
}

$os->listpageStr='listlist';
$os->editpageStr='editpage editpage';


/* read template 454 */
$handle = fopen('wtosFactory.list.html', "r");
$os->listpageStrTmpl =(string) fread($handle, filesize('wtosFactory.list.html'));
fclose($handle);
$handle = fopen('wtosFactory.edit.html', "r");
$os->editpageStrTmpl = fread($handle, filesize('wtosFactory.edit.html'));
fclose($handle);
/* read template 454 end */

 



//_d($_POST);
 ?> <!-- template List  345 --> <? 
foreach($_POST['fields'] as $f)
{
  
 if(is_array($_POST['ignor'])){ if(in_array ($f,$_POST['ignor']) ){  continue; } }  // no operation 
  
  
  
  
  $alise=$_POST['alise'][$f];
  
   
  
  
  if($os->Factory['WTF_primery']!=$f){ 
   
                 
				 
				 if($_POST['image'][$f]==$f)  {
				 
				   $os->Factory['WTF_dataToSave'] .=' $'.$f.'=$os->UploadPhoto(\''.$f.'\',$site[\'imgPath\'].\'wtos-images\');
				   	if($'.$f.'!=\'\'){
					$dataToSave[\''.$f.'\']=\'wtos-images/\'.$'.$f.';
					} 					
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,\''.$f.'\',$site[\'imgPath\']);}'."\n";		
				 
				   }else{
					   
				   $os->Factory['WTF_dataToSave'] .=' $dataToSave[\''.$f.'\']=varP(\''.$f.'\'); '."\n";		   
				   
				   }
				 
				
                                                    
													
													
				 
				 
				 
				 
				 
				 
   }
  
  
  
  $v_search=$f.'_search';
  $v_and='$and'.$f;
  $v_andFT='$and'.$f.'A' ;
  
  
  
  # search 5656
  if(is_array($_POST['search'])){
  if(in_array ($f,$_POST['search']) ){
  
   $os->Factory['WTF_andFields'] .=$v_andFT.'=  $os->andField(\''.$v_search.'\',\''.$f.'\',$primeryTable,\'%\');
  $'.$v_search.'='.$v_andFT.'[\'value\']; '.$v_and.'='.$v_andFT.'[\'andField\'];	 '."\n";
  


 $os->Factory['WTF_andFieldQuery'] .= $v_and."  ";
 
  $os->Factory['WTF_searchHtml'] .= ' '.$alise.':<input type="text" name="'.$v_search.'" id="'.$v_search.'" value="<?php echo $'.$v_search.'?>" style="width:100px;" /> &nbsp; '." \n  ";
  
  
   $os->Factory['WTF_searchScript'] .= ' var '.$v_search.'V= os.getVal(\''.$v_search.'\'); '."\n";
   $os->Factory['WTF_searchScriptAppend'] .=$v_search.'=\'+'.$v_search.'V +\'&';
   $os->Factory['WTF_resetScript'] .=$v_search.'=&';
	   }}
 
 # list 123456
   if(is_array($_POST['list'])){
 if(in_array ($f,$_POST['list']) ){
   $os->Factory['WTF_listTitles'] .= '<td ><b>'.$alise.'</b></td> '." \n  ";
   
   
   
   
										 
										if($_POST['image'][$f]==$f)  {
										   $os->Factory['WTF_listValues'] .= '<td><img src="<?php  echo $site[\'urlFront\'].$record[\''.$f.'\']; ?>"  height="70" width="70" /></td> '." \n  ";
										
										}else{
   
                                                 $os->Factory['WTF_listValues'] .= '<td><?php echo $record[\''.$f.'\']?> </td> '." \n  ";
                                           }
	                                                                      
	 
	 
	 
	 } 	 }
	  
 
 
  
    
 

}
$os->Factory['WTF_searchScriptAppend']='window.location=\'?'.$os->Factory['WTF_searchScriptAppend'].'\';';
$os->Factory['WTF_searchScript'] =$os->Factory['WTF_searchScript'] .$os->Factory['WTF_searchScriptAppend'];
$os->Factory['WTF_resetScript']='window.location=\'?' .$os->Factory['WTF_resetScript'].'\';';
  

$os->listpageStr=$os->listpageStrTmpl;
foreach($os->Factory as $key=>$val)
{
//echo  $key."<br>";
//echo  $os->listpageStrTmpl."<br>";
$os->listpageStr= str_ireplace( $key, $val,$os->listpageStr);
 

}  
  
?>





<!-- template List  end  345  -->

<!-- template Edit  676 -->
<? 
   		
 foreach($_POST['fields'] as $f)
{
   if(is_array($_POST['ignor'])){ if(in_array ($f,$_POST['ignor']) ){  continue; } }  // no operation 
 
  $alise=$_POST['alise'][$f];
  
   
  
  
  if($os->Factory['WTF_primery']!=$f)
  { 
   
      
	  if($_POST['image'][$f]==$f)  {
	   $os->Factory['WTF_EditFields'] .='<tr >
	  									<td>'.$alise.' </td>
										<td>
										<img src="<?php  echo $site[\'urlFront\'].$pageData[\''.$f.'\']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="'.$f.'" />
										</td>						
										</tr>';  
	  
	  }else{
	  $os->Factory['WTF_EditFields'] .='<tr >
	  									<td>'.$alise.' </td>
										<td>
										<input value="<?php if(isset($pageData[\''.$f.'\'])){ echo $pageData[\''.$f.'\']; } ?>" type="text" name="'.$f.'" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										';  
					}          
   }
  
  }  

$os->editpageStr=$os->editpageStrTmpl;
foreach($os->Factory as $key=>$val)
{
//echo  $key."<br>";
//echo  $os->listpageStrTmpl."<br>";
$os->editpageStr= str_ireplace( $key, $val,$os->editpageStr);
 

}  
  
  ?>

		
							
						
		 
									
	
							
	
<!-- template Edit  676  -->




<? 
 
if($alowRight){
fwrite($os->listpage,$os->listpageStr);
fwrite($os->editpage,$os->editpageStr);

fclose($os->listpage);
fclose($os->editpage);
}

?>
 <br /> <br />
&nbsp;<a target="_blank" href="../<?php echo $listpage ?>"> <?php echo $listpage ?></a>
 <br /> <br /> 
<? 

} ?>






<?
 



?>

<? include('../bottom.php')?>