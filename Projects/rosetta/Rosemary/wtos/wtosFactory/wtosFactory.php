<?php
include('../includes/config.php');
include('../top.php');
$table=$_GET['table'];
$alowRight=false;
$alowRight=true;
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
function storedR($columnName)
{
 global $table;
 if($table=='' && $columnName==''){return;}
 if(isset($_POST['relation'])){
       $_SESSION['relation'][$table]=$_POST['relation'];
 }
  $cA=($_SESSION['relation'][$table][$columnName]!='')?$_SESSION['relation'][$table][$columnName]:'';
  return $cA;
}



 

if($_POST['listpage']!=""){$_SESSION[$table]['listpage']=$_POST['listpage'];}$listpage=($_SESSION[$table]['listpage']=='')?$table.'_l':$_SESSION[$table]['listpage'];
if($_POST['editpage']!=""){$_SESSION[$table]['editpage']=$_POST['editpage'];}$editpage=($_SESSION[$table]['editpage']=='')?$table.'Edit_e':$_SESSION[$table]['editpage'];
if($_POST['listpageH']!=""){$_SESSION[$table]['listpageH']=$_POST['listpageH'];}$listpageH=($_SESSION[$table]['listpageH']=='')?'List '.ucfirst($table):$_SESSION[$table]['listpageH'];
if($_POST['editpageH']!=""){$_SESSION[$table]['editpageH']=$_POST['editpageH'];}$editpageH=($_SESSION[$table]['editpageH']=='')?'Edit '.ucfirst($table):$_SESSION[$table]['editpageH'];
if($_POST['addpageH']!=""){$_SESSION[$table]['addpageH']=$_POST['addpageH'];}$addpageH=($_SESSION[$table]['addpageH']=='')?'Add '.ucfirst($table):$_SESSION[$table]['addpageH'];






function checked($columnName,$aliseArr)
{
 
    global $table;
    if($table=='' && $columnName==''&& $aliseArr==''){return;}
	  if(isset($_POST['primery'])){
       $_SESSION[$aliseArr][$table]=$_POST[$aliseArr];
       }
	 $cf=($_SESSION[$aliseArr][$table][$columnName]!='')?'checked="checked"':'';
	 
	 if(!isset($_SESSION[$aliseArr][$table]) && ( $aliseArr=='list' || $aliseArr=='edit'))
	 {
	   $cf='checked="checked"';
	 }
	 
	return $cf;
}

function relationCode($relation,$fld,$alise,$op)
{

$relationCodes="";
$fs=explode(',',$relation);
if(count($fs)==1)
{
 
   $relationCodes=  '<select name="'.$fld.'" id="'.$fld.'" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->'.$fs[0].',$pageData[\''.$fld.'\']);	?></select>	';
	if($op=='search')
	{
	$relationCodes=' '.$alise.':'.'
	
	<select name="'.$fld.'" id="'.$fld.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>	<? 
										  $os->onlyOption($os->'.$fs[0].',$'.$fld.');	?></select>	';
	}
	if($op=='list')
	{
	$relationCodes=' 
	$os->'.$fs[0].'[$record[\''.$fld.'\']];';
	
	
	}
	
	
	
	



}else{

$relationCodes= '<select name="'.$fld.'" id="'.$fld.'" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData[\''.$fld.'\'],\''.$fs[0].'\',\''.$fs[1].'\',\''.$fs[2].'\');
							?>
							</select>';
							
							
				if($op=='search')
	{
	$relationCodes=' '.$alise.':'.'
	
	
	<select name="'.$fld.'" id="'.$fld.'" class="textbox fWidth" ><option value="">Select '.$alise.'</option>		  	<? 
								
										  $os->optionsHTML($'.$fld.',\''.$fs[0].'\',\''.$fs[1].'\',\''.$fs[2].'\');?>
							</select>';
	}			
		if($op=='list')
	{
	$relationCodes=' 
	$os->getByFld(\''.$fs[2].'\',\''.$fs[0].'\',$record[\''.$fld.'\'],\''.$fs[1].'\');'
	;
	}					
							
							
							
}
 

return $relationCodes;


}

function getTablesAndFlds($site)
{
  $db=$site['db'];
  
  $tbls=mysql_query("SHOW TABLES FROM $db");
  while($tbl=mysql_fetch_assoc($tbls))
   {
    
	  $tableName=$tbl['Tables_in_'.$db];
      $tableStr .="&nbsp;<br> <b> $tableName </b><br>";
       $flds=mysql_query("SHOW COLUMNS FROM $tableName");
       while($tField=mysql_fetch_assoc($flds))
          {
                  $fNmaes=$tField['Field'];
				   $tableStr .="&nbsp;&nbsp;&nbsp; $fNmaes <br>";
				  
		  }
  
   }
 
   
   return  $tableStr;
}

 
 

//if($table=='admin'){ $alowRight=true; }

$flds=mysql_query("SHOW COLUMNS FROM $table");









if($flds){
?>
   
<form action="" method="post">
<span style="color:#FF0000;">&nbsp;1.Please do not check Search box for image field &nbsp; 2. by default all fields are text.  </span><br />
<span style="color:#0000CC;">&nbsp;1.Be sure that the filds are there in the table '<b>addedBy</b>'(int) , '<b>addedDate</b>'(datetime) and '<b>active</b>'(tinyint). '<b> modifyBy</b>'  '<b> modifyDate  </b>' </span>   <br />

<br />
<div style="font-style:italic; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FF0000; font-size:36px; font-weight:bold; position:absolute; top:260px; left:750px;">
WTOS FACTORY
</div>

<div style="position:absolute; top:50px; left:1120px; height:500px; width:200px; overflow:scroll; overflow-x:hidden">
<? $tableStr=getTablesAndFlds($site);
  echo $tableStr;
?>
</div>
  


<table> <tr><td><b> Primery</b></td>    <td><b>Field</b> </td>  <td><b>Alise</b> </td> <td><b style="color:#FF0000;">Ignor</b> </td>  <td><b>Listing</b> </td> <td><b>Search</b> </td>  <td><b>Edit</b> </td>  <td><b>Image</b></td>  <td><b>Relation </b><font style="font-size:9px;">[arrayName|id,textFld,table]</font> </td>           </tr>

<? 
$if=0;
while($tField=mysql_fetch_assoc($flds))
{ 

 if($tField['Field']=='addedBy' || $tField['Field']=='addedDate' || $tField['Field']=='modifyBy' || $tField['Field']=='modifyDate'  ){ continue;}
//if($tField['Field']=='addedBy' || $tField['Field']=='addedDate' || $tField['Field']=='modifyBy'    ){ continue;}
 
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
<td><input type="checkbox" name="search[<? echo $tField['Field'] ?>]" value="<? echo $tField['Field'] ?>" <? echo checked($tField['Field'],'search') ?> />  
 <input type="checkbox" name="searchD[<? echo $tField['Field'] ?>]" value="<? echo $tField['Field'] ?>" <? echo checked($tField['Field'],'searchD') ?> /><span style="color:#FFFFFF;" title="Date Search">D</span>  

</td> 
<td><input type="checkbox" name="edit[<? echo $tField['Field'] ?>]" value="<? echo $tField['Field'] ?>" <? echo checked($tField['Field'],'edit') ?> />  </td> 
<td><input type="checkbox" name="image[<? echo $tField['Field'] ?>]" value="<? echo $tField['Field'] ?>" <? echo checked($tField['Field'],'image') ?> />  </td>
<td><input type="text" name="relation[<? echo $tField['Field'] ?>]" value="<? echo storedR($tField['Field'])?>" style="width:200px;" /></td>

 
 
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
<style>
.fldss{ border:none; color:#0000FF; font-weight:bold;}
</style>
 
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>List Page <br /> <input class="fldss" type="text" name="listpage" value="<? echo $listpage ?>"  />    </td>
    <td>Edit Page  <br />  <input  class="fldss"  type="text" name="editpage" value="<? echo $editpage ?>"  /> </td>
    <td>List Page H  <br />  <input  class="fldss"  type="text" name="listpageH" value="<? echo $listpageH ?>"  /></td>
    <td>Edit Page H  <br /> <input  class="fldss"  type="text" name="editpageH" value="<? echo $editpageH ?>"  /></td>
    <td>Add Page H  <br />  <input  class="fldss"  type="text" name="addpageH" value="<? echo $addpageH ?>"  /></td>
    <td>&nbsp;</td>
  </tr>
   
</table>
 
<br />

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
  $relation=$_POST['relation'][$f];
  $searchD=$_POST['searchD'][$f];
  
  if($os->Factory['WTF_primery']!=$f){ 
   
                 
				 
				 if($_POST['image'][$f]==$f)  {
				 
				   $os->Factory['WTF_dataToSave'] .=' $'.$f.'=$os->UploadPhoto(\''.$f.'\',$site[\'imgPath\'].\'wtos-images\');
				   	if($'.$f.'!=\'\'){
					$dataToSave[\''.$f.'\']=\'wtos-images/\'.$'.$f.';
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,\''.$f.'\',$site[\'imgPath\']);}
					} 					
						'."\n";	
				 
				   }else{
				   
				    if($searchD==$f){
					  $os->Factory['WTF_dataToSave'] .=' $dataToSave[\''.$f.'\']=$os->saveDate(varP(\''.$f.'\')); '."\n";		
					
					}else{
					   
				        $os->Factory['WTF_dataToSave'] .=' $dataToSave[\''.$f.'\']=varP(\''.$f.'\'); '."\n";		 
				   }  
				   
				   }
				 
					 
				 
				 
   }
  
  
  
  $v_search=$f.'_search'; // something wrong here 
  $v_search=$f;
  $v_and='$and'.$f;
  $v_andFT='$and'.$f.'A' ;
  
  
  
  # search 5656
  if(is_array($_POST['search'])){
  if(in_array ($f,$_POST['search']) ){
  
  /* inactive active
   if($f=='active') // exeptional html and search;
   {
   
     $os->Factory['WTF_searchHtml'] .=' '.$alise.'&nbsp;
	<select name="active" id="active_search"  onchange="javascript:window.location=\'<?php echo $listPAGEUrl; ?>active=\'+this.value">
	<option value="">All</option>
	<?php $os->onlyOption($os->activeOptions,$active);	?>
	</select>
	&nbsp;';
     $os->Factory['WTF_andFields'] .='$active= $os->setNget(\'active\',$primeryTable);  //for session set
     $andActive=($active!=\'\' )? " and active=\'$active\'":\'\';';
   }
   else
   {*/
   
   
 
   if($searchD==$f)// only for date
   {
    $andQueryStr='
    $f_'.$v_search.'= $os->setNget(\'f_'.$v_search.'\',$primeryTable);
	$t_'.$v_search.'= $os->setNget(\'t_'.$v_search.'\',$primeryTable);
   '.$v_and.'=$os->DateQ(\''.$v_search.'\',$f_'.$v_search.',$t_'.$v_search.',$sTime=\'00:00:00\',$eTime=\'59:59:59\');';
   
   
   
   }else{
   
   
  
	 $andQueryStr=$v_andFT.'=  $os->andField(\''.$v_search.'\',\''.$f.'\',$primeryTable,\'%\');
   $'.$v_search.'='.$v_andFT.'[\'value\']; '.$v_and.'='.$v_andFT.'[\'andField\'];	 '."\n";
 
	}
	
	$os->Factory['WTF_andFields'] .=$andQueryStr;
	$os->Factory['WTF_andFieldQuery'] .= $v_and."  ";
	
	
	if($relation!=''){ 
	$htmlRelation=relationCode($relation,$f,$alise,'search');
	       $searchHtmlStr =  $htmlRelation."\n  ";
	}elseif($searchD==$f) // only for date
	{
	   $searchHtmlStr ='From '.$alise.': <input class="dtpk" type="text" name="f_'.$v_search.'" id="f_'.$v_search.'" value="<?php echo $f_'.$v_search.'?>" style="width:100px;" /> &nbsp; '." \n  ".
	   'To '.$alise.': <input class="dtpk" type="text" name="t_'.$v_search.'" id="t_'.$v_search.'" value="<?php echo $t_'.$v_search.'?>" style="width:100px;" /> &nbsp; '." \n  ";
	
     }else
	 {
	 
	  $searchHtmlStr =' '.$alise.': <input type="text" name="'.$v_search.'" id="'.$v_search.'" value="<?php echo $'.$v_search.'?>" style="width:100px;" /> &nbsp; '." \n  ";
	 
	 }
  
  if($searchD==$f){  // only for date
		
		
		$os->Factory['WTF_searchScript'] .= ' var f_'.$v_search.'V= os.getVal(\'f_'.$v_search.'\'); '."\n";
		$os->Factory['WTF_searchScriptAppend'] .='f_'.$v_search.'=\'+f_'.$v_search.'V +\'&';
		$os->Factory['WTF_resetScript'] .='f_'.$v_search.'=&';
		

		$os->Factory['WTF_searchScript'] .= ' var t_'.$v_search.'V= os.getVal(\'t_'.$v_search.'\'); '."\n";
		$os->Factory['WTF_searchScriptAppend'] .='t_'.$v_search.'=\'+t_'.$v_search.'V +\'&';
		$os->Factory['WTF_resetScript'] .='t_'.$v_search.'=&';
		
		
   }else{
		
		$os->Factory['WTF_searchScript'] .= ' var '.$v_search.'V= os.getVal(\''.$v_search.'\'); '."\n";
		$os->Factory['WTF_searchScriptAppend'] .=$v_search.'=\'+'.$v_search.'V +\'&';
		$os->Factory['WTF_resetScript'] .=$v_search.'=&';
   
   }
   
   $os->Factory['WTF_searchHtml'] .= $searchHtmlStr;
   
 //  inactive active  }
  
   


  }}
 
 # list 123456
   if(is_array($_POST['list'])){
 if(in_array ($f,$_POST['list']) ){
   $os->Factory['WTF_listTitles'] .= '<td ><b>'.$alise.'</b></td> '." \n  ";
   
   
   
   
										 
										if($_POST['image'][$f]==$f)  {
										   $os->Factory['WTF_listValues'] .= '<td><img src="<?php  echo $site[\'urlFront\'].$record[\''.$f.'\']; ?>"  height="70" width="70" /></td> '." \n  ";
										 
										}
										
										/*elseif($f=='active'){
										
										$os->Factory['WTF_listValues'] .=' <td><?php $os->changeStatusDD($os->activeOptions,$record[\'active\'],\''.$os->Factory['WTF_table'].'\',\'active\',\''.$os->Factory['WTF_primery'].'\',$DivIds[\'EDITID\'],$os->activeColors); ?>  </td>';
											 
										}*/
										else
										{
										 
											if($relation!=''){ 
														$htmlRelation=relationCode($relation,$f,$alise,'list');
														$os->Factory['WTF_listValues'] .=  '<td><?php echo '.$htmlRelation.' ?></td> '."\n  ";
	                                              
											   }else{
											   
											   if($searchD==$f){  
											   
                                                 $os->Factory['WTF_listValues'] .= '<td><?php echo $os->showDate($record[\''.$f.'\']);?> </td> '." \n  ";
												 
												 }else{
												 
												  $os->Factory['WTF_listValues'] .= '<td><?php echo $record[\''.$f.'\']?> </td> '." \n  ";
												 }
                                             }
										  
										  
										  
									     }
	                                                                      
	 
	 
	 
	 } 	 }
	  
 
 
  
    
 
 
}
$os->Factory['WTF_searchScriptAppend']='window.location=\'<?php echo $listPAGEUrl; ?>'.$os->Factory['WTF_searchScriptAppend'].'\';';
$os->Factory['WTF_searchScript'] =$os->Factory['WTF_searchScript'] .$os->Factory['WTF_searchScriptAppend'];
$os->Factory['WTF_resetScript']='window.location=\'<?php echo $listPAGEUrl; ?>' .$os->Factory['WTF_resetScript'].'\';';
  

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
     if(is_array($_POST['edit'])){ if(in_array ($f,$_POST['edit']) ){//  check post
   
  

   
   
   
   
  
 
    $alise=$_POST['alise'][$f];
    $relation=$_POST['relation'][$f];
    $searchD=$_POST['searchD'][$f];
  
  
  if($os->Factory['WTF_primery']!=$f)
  { 
   
      
	  if($_POST['image'][$f]==$f)  {
	   $os->Factory['WTF_EditFields'] .='<tr >
	  									<td>'.$alise.' </td>
										<td>
										<img src="<?php  echo $site[\'urlFront\'].$pageData[\''.$f.'\']; ?>"  height="100" width="100" />
                                         <br>  <input type="file" name="'.$f.'"  id="'.$f.'"/>
										</td>						
										</tr>';  
	  
	  }else{
	  
	  $os->Factory['WTF_EditFields'] .='<tr >
	  									<td>'.$alise.' </td>
										<td>';
										
								if($relation!=''){ 
	$htmlRelation=relationCode($relation,$f,$alise,'edit');
	$os->Factory['WTF_EditFields'] .=  $htmlRelation."\n  ";
	}else{		
									
							 if($searchD==$f){  
							$os->Factory['WTF_EditFields'] .=	'<input value="<?php if(isset($pageData[\''.$f.'\'])){ echo $os->showDate($pageData[\''.$f.'\']); } ?>" type="text" name="'.$f.'" id="'.$f.'" class="dtpk textbox fWidth"/>';
							
							 }	else	{
									
									
$os->Factory['WTF_EditFields'] .=	'<input value="<?php if(isset($pageData[\''.$f.'\'])){ echo $pageData[\''.$f.'\']; } ?>" type="text" name="'.$f.'" id="'.$f.'" class="textbox fWidth"/>';
}
									
							}		
									
										 $os->Factory['WTF_EditFields'] .='
										</td>						
										</tr>
											
										
										';  
										
										
							
				
										
										
										
										
										
										
										
										
										
										
										
										
										
										
					}          
   }
  
  
  
  
  }} //  check post
  
  
  
  
  
  
  
  
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