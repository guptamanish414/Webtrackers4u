<?php
include('includes/config.php');
include('top-inner.php');

// config 

$DivIds['AJAXPAGE']='memberdocEdit';
$listPAGE='memberdoc';
$primeryTable='memberdoc';
$primeryField='memberdocId';
$listHeader='List Memberdoc';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft','memberId'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','memberId'),'');
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
		
		
 $dataToSave['docTitle']=varP('docTitle'); 
 $dataToSave['dated']=$os->now();//$os->saveDate(varP('dated')); 
 $docFile=$os->UploadPhoto('docFile',$site['imgPath'].'wtos-images');
				   	if($docFile!=''){
					$dataToSave['docFile']='wtos-images/'.$docFile;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'docFile',$site['imgPath']);}
					} 					
						
 $dataToSave['status']=varP('status'); 
 $dataToSave['note']=varP('note'); 
 $dataToSave['memberId']=$_GET['memberId']; 

		 
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		 
		if($rowId < 1){
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		
		
	 
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	
	 }
	
	
}
 

/* searching */

 
$anddocTitleA=  $os->andField('docTitle','docTitle',$primeryTable,'%');
   $docTitle=$anddocTitleA['value']; $anddocTitle=$anddocTitleA['andField'];	 

    $f_dated= $os->setNget('f_dated',$primeryTable);
	$t_dated= $os->setNget('t_dated',$primeryTable);
   $anddated=$os->DateQ('dated',$f_dated,$t_dated,$sTime='00:00:00',$eTime='59:59:59');$anddocFileA=  $os->andField('docFile','docFile',$primeryTable,'%');
   $docFile=$anddocFileA['value']; $anddocFile=$anddocFileA['andField'];	 
$andstatusA=  $os->andField('status','status',$primeryTable,'%');
   $status=$andstatusA['value']; $andstatus=$andstatusA['andField'];	 
$andnoteA=  $os->andField('note','note',$primeryTable,'%');
   $note=$andnoteA['value']; $andnote=$andnoteA['andField'];	 
$andmemberIdA=  $os->andField('memberId','memberId',$primeryTable,'%');
   $memberId=$andmemberIdA['value']; $andmemberId=$andmemberIdA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $anddocTitle  $anddated  $anddocFile  $andstatus  $andnote  $andmemberId    $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>
<form  action="" method="post"   enctype="multipart/form-data"  

id="recordEditForm"  >
												
					 
						 
						<table border="0"  >
							<tr ><td>					
						
						<input type="file" name="docFile"  id="docFile"/> <br />

	  									 Title  
										 <input value="<?php if(isset($pageData['docTitle'])){ echo $pageData['docTitle']; } ?>" type="text" name="docTitle" id="docTitle" class="textbox fWidth" style="width:290px;"/> <input type="submit" class="submit"  value="Save" />	
										 					
									
										 
										 
                                          
										  <div style="display:none;">
										  
	  									 Dated  
									 <input value="<?php if(isset($pageData['dated'])){ echo $os->showDate($pageData['dated']); } ?>" type="text" name="dated" id="dated" class="dtpk textbox fWidth" style="width:70px;"/> &nbsp;
										
										Status
										<select name="status" id="status" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->docStatus,$pageData['appoStatus']);	?></select>	
										  </div>
										</td>						
										 
	  									 				
										</tr>
										
										
										
						
						</table>
							
						
						            
						  
						
						
						
						
								 
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
						
						
						
						
						
						
						</form>


	<table class="container">
				<tr>
					
			  <td  class="middle" style="padding-left:5px;">
			  
			  
		 
			  
			  <!--  ggggggggggggggg   -->
			  
			 
			   
				  
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								 
								
		<td ><b>Dated</b></td>  						
<td ><b>Title</b></td>  
  
 
  
 
								 
								
                                
								
								
								<td >Action </td>
								
							</tr>
							
						 
							
							
							
							<?php
							  $c=1;
							 $i=$os->slNo();
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border" id="selected<?php echo $c;?>" onclick="trSelected('<?php echo $c;?>','<?php echo  count($records);?>');"   onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								 
								
					 <td><?php echo $os->showDate($record['dated']);?> </td>  			
<td><a title="Click to view" href="<?php  echo $site['urlFront'].$record['docFile']; ?>" target="_blank"><?php echo $record['docTitle']?> </a></td>  
 
 
    
       
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						 
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
						</span>
						
                        
                       </td>
														
					</tr>
				 
                            
							
							<?php $i++; $c++;
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
	
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom-inner.php')?>