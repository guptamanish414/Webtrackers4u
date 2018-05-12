<?php
include('includes/config.php');
include('top-inner.php');

// config 

$DivIds['AJAXPAGE']='alertsEdit';
$listPAGE='alerts';
$primeryTable='alerts';
$primeryField='alertsId';
$listHeader='List Alerts';

 
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
 $dataToSave['alertType']=varP('alertType'); 
 $dataToSave['title']=varP('title'); 
 $dataToSave['bookedDate']=$os->now();
 $dataToSave['ampm']=varP('ampm'); 
 
 $dataToSave['bookedBy']=varP('bookedBy'); 
 $dataToSave['executeBy']=varP('executeBy'); 
 $dataToSave['executionDate']=$os->saveDate(varP('executionDate')); 
 $dataToSave['duration']=varP('duration'); 
 $dataToSave['startTime']=varP('startTime'); 
 $dataToSave['endTime']=varP('endTime'); 
 $dataToSave['appoStatus']=varP('appoStatus'); 
 $dataToSave['folloStatus']=varP('folloStatus'); 
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
$andalertTypeA=  $os->andField('alertType','alertType',$primeryTable,'%');
   $alertType=$andalertTypeA['value']; $andalertType=$andalertTypeA['andField'];	 
$andtitleA=  $os->andField('title','title',$primeryTable,'%');
   $title=$andtitleA['value']; $andtitle=$andtitleA['andField'];	 
$andbookedDateA=  $os->andField('bookedDate','bookedDate',$primeryTable,'%');
   $bookedDate=$andbookedDateA['value']; $andbookedDate=$andbookedDateA['andField'];	 
$andbookedByA=  $os->andField('bookedBy','bookedBy',$primeryTable,'%');
   $bookedBy=$andbookedByA['value']; $andbookedBy=$andbookedByA['andField'];	 
$andexecuteByA=  $os->andField('executeBy','executeBy',$primeryTable,'%');
   $executeBy=$andexecuteByA['value']; $andexecuteBy=$andexecuteByA['andField'];	 

    $f_executionDate= $os->setNget('f_executionDate',$primeryTable);
	$t_executionDate= $os->setNget('t_executionDate',$primeryTable);
   $andexecutionDate=$os->DateQ('executionDate',$f_executionDate,$t_executionDate,$sTime='00:00:00',$eTime='59:59:59');$anddurationA=  $os->andField('duration','duration',$primeryTable,'%');
   $duration=$anddurationA['value']; $andduration=$anddurationA['andField'];	 
$andstartTimeA=  $os->andField('startTime','startTime',$primeryTable,'%');
   $startTime=$andstartTimeA['value']; $andstartTime=$andstartTimeA['andField'];	 
$andendTimeA=  $os->andField('endTime','endTime',$primeryTable,'%');
   $endTime=$andendTimeA['value']; $andendTime=$andendTimeA['andField'];	 
$andappoStatusA=  $os->andField('appoStatus','appoStatus',$primeryTable,'%');
   $appoStatus=$andappoStatusA['value']; $andappoStatus=$andappoStatusA['andField'];	 
$andfolloStatusA=  $os->andField('folloStatus','folloStatus',$primeryTable,'%');
   $folloStatus=$andfolloStatusA['value']; $andfolloStatus=$andfolloStatusA['andField'];	 
$andnoteA=  $os->andField('note','note',$primeryTable,'%');
   $note=$andnoteA['value']; $andnote=$andnoteA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andmemberId  $andalertType  $andtitle  $andbookedDate  $andbookedBy  $andexecuteBy  $andexecutionDate  $andduration  $andstartTime  $andendTime  $andappoStatus  $andfolloStatus  $andnote    $andActive order by $primeryField desc  ";

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
	  									<td width="70">Alert Type </td>
										<td><select name="alertType" id="alertType" class="textbox fWidth" onchange="appFoll();" >	<? 
										  $os->onlyOption($os->alertType,$pageData['alertType']);	?></select>	
										  
										  <script> function appFoll()
										  {
										    var aType=os.getVal('alertType');
											
											if(aType=='Followup'){
													os.hide('approw1');
													os.hide('appDateSpan');
													os.hide('appStatusSpan');												
													os.show('followStatusSpan');
													os.show('follDateSpan');
											}
											if(aType=='Appointment'){
											
											 os.show('approw1');
													os.show('appDateSpan');
													os.show('appStatusSpan');												
													os.hide('followStatusSpan');
													os.hide('follDateSpan');
											
											
											
										
											
											
											}
											
											       
											
											     
											
										  
										  }</script>
  
										</td>	
										
										
										<td><span id="appDateSpan">App Date </span><span id="follDateSpan" style="display:none;"> Follow. Date </span></td>
										<td><input value="<?php if(isset($pageData['executionDate'])){ echo $os->showDate($pageData['executionDate']); } ?>" type="text" name="executionDate" id="executionDate" class="dtpk textbox fWidth" style="width:80px;"/>
										</td>	
										
										<td>Time </td>
										<td><input value="<?php if(isset($pageData['startTime'])){ echo $pageData['startTime']; } ?>" type="text" name="startTime" id="startTime" class="textbox fWidth" style="width:30px;"/>  <select name="ampm" id="ampm" class="textbox fWidth"   >	<? 
										  $os->onlyOption($os->ampm,$pageData['ampm']);	?></select>	
										</td>						
										
	  											
										</tr>
											
										
										<tr id="approw1" >
	  											<td>Title </td>
										<td><input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="textbox fWidth" style="width:80px;"/>
										</td>						
										
	  									<td>Booked By </td>
										<td>
										
										  <select name="bookedBy" id="bookedBy" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->staffAppo,$pageData['bookedBy']);	?></select>	
										  
										  
									 
										</td>						
										
	  										
										<td>Assign To </td>
										<td>
										
										  <select name="executeBy" id="executeBy" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->staffAppo,$pageData['executeBy']);	?></select>	
										
										 
										</td>							
										
	  													
										</tr>
											
										
										<tr >
	  													
											
	  													
									
	  									<td colspan="2">
									<div id="appStatusSpan"> Appo. Status  
										 
										 
										 	<select name="appoStatus" id="appoStatus" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->appoStatus,$pageData['appoStatus']);	?></select>	
										  
										
										  
										 
										 
										 
										 </div><div id="followStatusSpan" style="display:none;"> Follow. Status  
										 
										   <select name="folloStatus" id="folloStatus" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->folloStatus,$pageData['folloStatus']);	?></select>	
										  
										  </div>	
										 
										</td>						
										
	  									<td>Note </td>
										<td colspan="10"><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>	<input type="submit" class="submit"  value="Add" style="cursor:pointer;" />	
										</td>						
										</tr>
											
										
										
						
						</table>
							
						
					
						
						
					
									 
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
						
						
						
						
						
						
						</form>

	<table class="container">
				<tr>
					
			   <td  style="padding-left:5px;">
					  
			  <!--  ggggggggggggggg   -->
			  
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
  <td ><b>Date</b></td> 
  <td width="60" ><b>Time</b></td>   
  <td ><b>Alert Type</b></td>  
  
   <td ><b>Appo. Status</b></td>  
   <td ><b>Note</b></td>  
  
  <td ><b>Other Details</b></td>  
  
 
  
  
  
								
								 
								
                                
								
								
								<td style="width:100px;" >Action </td>
								
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
								
		  <td><?php echo $os->showDate($record['executionDate']);?> </td> 	
		   <td><?php echo $record['startTime']?>  <?php echo $record['ampm']?> </td>  					

  <td><?php echo  
	$os->alertType[$record['alertType']]; ?></td> 
	
	  <td>
	  <?  if($record['alertType']=='Appointment'){ ?>
	  <?php echo $record['appoStatus']?>  
	  <? } ?>
	  
	  	  
	   <?  if($record['alertType']=='Followup'){ ?> <?php echo $record['folloStatus']?>   <? } ?></td>  
	    <td><?php echo $record['note']?> </td> 
		 <td> 
		  <?  if($record['alertType']=='Appointment'){ ?>
		 Title:  <?php echo $record['title']?>  <br />Booked By :<?php echo $record['bookedBy']?>  <br />Assign To: <?php echo $record['executeBy']?> <? } ?> </td> 
	
   
 
 
  
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<!--<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>-->
						
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