<?php
include('includes/config.php');
include('top-inner.php');

// config 

$DivIds['AJAXPAGE']='memberqueryEdit';
$listPAGE='memberquery';
$primeryTable='memberquery';
$primeryField='memberqueryId';
$listHeader='List Memberquery';

 
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
		
		
 $dataToSave['memberId']=$_GET['memberId']; 
 $dataToSave['qDate']=$os->saveDate(varP('qDate')); 
 $dataToSave['minBudget']=varP('minBudget'); 
 $dataToSave['maxBudget']=varP('maxBudget'); 
 $dataToSave['preferedLoc']=varP('preferedLoc'); 
 $dataToSave['propType']=varP('propType'); 
 $dataToSave['note']=varP('note'); 

		 
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

 
$andmemberIdA=  $os->andField('memberId','memberId',$primeryTable,'%');
   $memberId=$andmemberIdA['value']; $andmemberId=$andmemberIdA['andField'];	 

    $f_qDate= $os->setNget('f_qDate',$primeryTable);
	$t_qDate= $os->setNget('t_qDate',$primeryTable);
   $andqDate=$os->DateQ('qDate',$f_qDate,$t_qDate,$sTime='00:00:00',$eTime='59:59:59');$andminBudgetA=  $os->andField('minBudget','minBudget',$primeryTable,'%');
   $minBudget=$andminBudgetA['value']; $andminBudget=$andminBudgetA['andField'];	 
$andmaxBudgetA=  $os->andField('maxBudget','maxBudget',$primeryTable,'%');
   $maxBudget=$andmaxBudgetA['value']; $andmaxBudget=$andmaxBudgetA['andField'];	 
$andpreferedLocA=  $os->andField('preferedLoc','preferedLoc',$primeryTable,'%');
   $preferedLoc=$andpreferedLocA['value']; $andpreferedLoc=$andpreferedLocA['andField'];	 
$andpropTypeA=  $os->andField('propType','propType',$primeryTable,'%');
   $propType=$andpropTypeA['value']; $andpropType=$andpropTypeA['andField'];	 
$andnoteA=  $os->andField('note','note',$primeryTable,'%');
   $note=$andnoteA['value']; $andnote=$andnoteA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andmemberId  $andqDate  $andminBudget  $andmaxBudget  $andpreferedLoc  $andpropType  $andnote    $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>
<form  action="<? echo $listPAGEUrl ?>" method="post"   enctype="multipart/form-data"  

id="recordEditForm"  >
												
					
										
						<table border="0" class="formClass addnew"   >
									
										<tr >
	  									<td>Enquery Date </td>
										<td><input value="<?php if(isset($pageData['qDate'])){ echo $os->showDate($pageData['qDate']); } ?>" type="text" name="qDate" id="qDate" class="dtpk textbox fWidth" style="width:80px;"/>
										</td>						
										 
	  									<td>Min Budget </td>
										<td><input value="<?php if(isset($pageData['minBudget'])){ echo $pageData['minBudget']; } ?>" type="text" name="minBudget" id="minBudget" class="textbox fWidth" style="width:80px;"/>
										</td>						
										 
	  									<td>Max Budget </td>
										<td><input value="<?php if(isset($pageData['maxBudget'])){ echo $pageData['maxBudget']; } ?>" type="text" name="maxBudget" id="maxBudget" class="textbox fWidth" style="width:80px;"/>
										</td>						
										
	  									<td>Location</td>
										<td><select name="preferedLoc" id="preferedLoc" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData['preferedLoc'],'propertylocationId','title','propertylocation');
							?>
							</select>
  
										</td>	
										
										</tr>
											
										
										<tr >					
										
	  									<td>Prop. Type </td>
										<td colspan="2"><select name="propType" id="propType" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->propertyType,$pageData['propType']);	?></select>	
  
										</td>						
										
										 
	  									 
										<td colspan="8">Note <input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
										
										
										<input type="submit" class="submit"  value="Add" style="cursor:pointer;" />	
									 
									 <a class="refreshButton" href="" style="margin-left:20px;"> Refresh </a>    
									
										
										</td>						
										</tr>
											
										
										
						
						</table>
							
						
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						            
						 
						
						
						
						
						
						
						
						
						
						
						</form>
	<table class="container" >
				<tr>
					 
			  <td  style="padding-left:5px;">
			  
			  
			  
			  
			  <!--  ggggggggggggggg   -->
			  
			  
			  
				 
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>								
								

  <td ><b>Date</b></td>  
  <td ><b>Min Budget</b></td>  
  <td ><b>Max Budget</b></td>  
  <td ><b>Prefered Locations</b></td>  
  <td ><b>Prop. Type</b></td>  
  <td ><b>Note</b></td> 
  <td style="width:130px;" >Action </td>
								
							</tr>
							
							
							
							
							<?php
							  $c=1;
							 $i=$os->slNo();
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border" id="selected<?php echo $c;?>" onclick="trSelected('<?php echo $c;?>','<?php echo  count($records);?>');"   onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								
								
    <td><?php echo $os->showDate($record['qDate']);?> </td>  
  <td><?php echo $record['minBudget']?> </td>  
  <td><?php echo $record['maxBudget']?> </td>  
  <td><?php echo  
	$os->getByFld('propertylocation','propertylocationId',$record['preferedLoc'],'title'); ?></td> 
  <td><?php echo  
	$os->propertyType[$record['propType']]; ?></td> 
  <td><?php echo $record['note']?> </td>  
  	
                      <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						<a class="deleteButton" href="javascript:void(0)" onclick="popUpWindow('search-applicants-property.php?memberqueryId=<?php echo $record['memberqueryId'];?>', 50, 50, 735, 600)">Search </a>
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
						</span>
						
                        
                       </td>
														
					</tr>
				 
                            
							
							<?php $i++; $c++;
							} 
							}?>
							
							
							
						</table>
				 
				 		<?php echo $recordsA['links'];?>			
	  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>







	
    <script>
	
		
	 dateCalander();
	
	</script>
	
	<? include('bottom-inner.php')?>