<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='wtboxEdit';
$listPAGE='wtbox';
$primeryTable='wtbox';
$primeryField='wtboxId';
$listHeader='WT Box List';


$yesNo = array('0'=>'No','1'=>'Yes');
$colorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9'); 
 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');
##  delete row
if(varG('operation')=='deleteRow')
{
       if($os->deleteRow($primeryTable,$primeryField,varG('delId')))
	   {
	     $flashMsg='Data Deleted Successfully';
	   }
}


##  update row
if(varP('operation'))
{

	 if(varP('operation')=='updateField')
	 {
	  $rowId=varP('rowId');
	
	  #---- edit section ----#
		
		
 $dataToSave['title']=varP('title'); 
 $dataToSave['accessKey']=varP('accessKey'); 
 $dataToSave['langId']=varP('langId'); 
 $dataToSave['css']=varP('css'); 
 $dataToSave['container']=varP('container'); 
 $dataToSave['content']=varP('content'); 
 

		 
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	  if( $insertedId>0)
	  {
	       unset($_SESSION['wtbox'][$dataToSave['accessKey']]); 
	  }
	  
	
	 }
	
	
}
 

/* searching */

 
$andtitleA=  $os->andField('title','title',$primeryTable,'%');
  $title=$andtitleA['value']; $andtitle=$andtitleA['andField'];	 
$andaccessKeyA=  $os->andField('accessKey','accessKey',$primeryTable,'%');
  $accessKey=$andaccessKeyA['value']; $andaccessKey=$andaccessKeyA['andField'];	 
$andlangIdA=  $os->andField('langId','langId',$primeryTable,'%');
  $langId=$andlangIdA['value']; $andlangId=$andlangIdA['andField'];	 
$andcontentA=  $os->andField('content','content',$primeryTable,'%');
  $content=$andcontentA['value']; $andcontent=$andcontentA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andtitle  $andaccessKey  $andlangId  $andcontent    $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>

	<table class="container">
				<tr>
					<td  class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  <div class="headertext">Search Option   <span style="float:right">Record per page  <?php  echo $recordPerPageDDS; ?></span></div>
			  <div class="searchB">
<table cellpadding="0" cellspacing="0">
	<tr>
	<td class="buttonSa">
	

 Title:<input type="text" name="title" id="title" value="<?php echo $title?>" style="width:100px;" /> &nbsp;  
   Access Key:<input type="text" name="accessKey" id="accessKey" value="<?php echo $accessKey?>" style="width:100px;" /> &nbsp;  
   Language:<select name="langId" id="langId" class="newSelectBox" style="width:124px;">																	
										<?php echo $os->optionsHTML($langId,'langId','title','lang',$where='',$orderby='title ASC',$limit='');?>
										</select> &nbsp; 
   Content:<input type="text" name="content" id="content" value="<?php echo $content?>" style="width:100px;" /> &nbsp;  
  
	 
	
	<a  class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="resetButton" href="javascript:void(0)"  onclick="javascript:searchReset()">Reset</a>
	
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a class="addButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
<td ><b>Details</b></td>  
  
 <!-- <td ><b>Content</b></td>  -->
  
  
								
								 
								
                                
								
								
								<td >Action </td>
								
							</tr>
							
							<tr class="border" >
								<td id="create_0_0" style="display:none" colspan="10">
								<div  id="create_0"> &nbsp </div>	
								
								</td>
							</tr>
							
							
							
							<?php
							 $i=1;
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border"  onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td width="2%"><?php echo $i?>     </td>
								
								
<td >
<style>
.wtparam{  background-color:#F8F8F8;  line-height:1px;

}
 
</style>
	 
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:9px; background-color:#E6E6E6;  border:1px solid #FF0000;">
	<tr>
		<td width="80" class="wtparam" style="border:none; text-align:left; height:5px; ">Title :</td>
		<td class="wtparam" style="border:none; text-align:left; "><?php echo $record['title']?></td>
		<td  class="wtparam"  style="border:none; text-align:left;">Access Key :</td>
		<td   class="wtparam"  style="border:none; text-align:left;"><?php echo $record['accessKey']?></td>
		<td  class="wtparam"  style="border:none; text-align:left;">Tiny Mce :</td>
		<td  class="wtparam"  style="border:none; text-align:left;">
		<?php $os->changeStatusDD($yesNo,$record['tinymce'],'wtbox','tinymce','wtboxId',$DivIds['EDITID'],$colorStatus); ?>
		</td>
		<td  class="wtparam"  style="border:none; text-align:left;">CMS Key :</td>
		<td  class="wtparam"  style="border:none; text-align:left; font-size:12px; font-weight:bold;">wtbox-<?php echo $record['accessKey']?>-wtbox</td>
		<td  class="wtparam"  style="border:none; text-align:left; width:70px;">Language :</td>
		<td  class="wtparam" style="border:none; text-align:left; color:#FF0000; font-weight:bold;width:60px;"><?php echo $os->getByFld('lang','langId',$record['langId'],$getfld='title');?></td>
	</tr>
</table> 
<div  style="line-height:normal;">
            <?  if($record['container']!=''){ ?> <?php echo '<'.$record['container']; ?> style="<?php echo $record['css'] ?>">  <?  } ?>
			
			<? if($record['tinymce']!=1) {
			   $os->editAreaField(stripslashes( $record['content']),'wtbox','content','wtboxId',$DivIds['EDITID'], $inputNameID='contentEdit',$extraParams='class="tArea" style="width:900px; height:50px;" ');
			   }else{
			 
			
			  echo stripslashes( $record['content']);
			  }
			  ?>
			
			
			<?  if($record['container']!=''){ ?> </<?php echo $record['container']; ?>>  <?  } ?>
</div>
 </td>
  
  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						<?php if($record['system']!=1){?>
						<a  class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						<?php }?>
						
						
						</span>
						
                        
                       </td>
														
					</tr>
					<tr class="border">
						<td id="<?php echo  $DivIds['DIVLIST']; ?>" style="display:none" colspan="10">
							   <div  id="<?php echo  $DivIds['DIV']; ?>"> &nbsp </div>	
						
						</td>
					</tr>
                            
							
							<?php $i++;
							} 
							}?>
							
							
							
						</table>
				 
				 		<?php echo $recordsA['links'];?>			
	         
	  <br />
			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>







	
    <script>
	
	 function searchText()
	 {
	 
	   
 var titleV= os.getVal('title'); 
 var accessKeyV= os.getVal('accessKey'); 
 var langIdV= os.getVal('langId'); 
 var contentV= os.getVal('content'); 
window.location='<?php echo $listPAGEUrl; ?>title='+titleV +'&accessKey='+accessKeyV +'&langId='+langIdV +'&content='+contentV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>title=&accessKey=&langId=&content=&';	
	   
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>