<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='aarentsEdit';
$listPAGE='aarents';
$primeryTable='rents';
$primeryField='rentsId';
$listHeader='List Rents';

 
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


function addMonthlyRecord($month,$year,$memberId=0)
{
global $os,$primeryTable,$primeryField;
if($month=='' && $year=='')
{
   return ;
}
    $thisMonthRec=array();
    $where=" rentMonths='$month' and rentYears='$year'";
	$existingRs=$os->get_rents($where,'','',' applicantId');
	if(is_array($existingRs) && count($existingRs)>0)
	{
	foreach($existingRs as $val){
	 $thisMonthMemRec[]=$val['applicantId'];
	 }
	}
	 
	$prevMonth=$month-1;
	$prevYear=$year;
	if($prevMonth<1)
	{
	  $prevMonth=12;
	  $prevYear=$year-1;
	}
	
   $chqQuery="select * from rents where   rentMonths='$prevMonth' and rentYears='$prevYear' and contractStatus='Active'" ;
	$existingRs=$os->mq($chqQuery);
	while($prevRec=$os->mfa($existingRs))
	{
	
	 if(!in_array($prevRec['applicantId'],$thisMonthMemRec))
	 {
	     $dataToSaveNew=$prevRec;
	     unset( $dataToSaveNew['rentsId'] );
		$dataToSaveNew['rentMonths'] =$month;
		$dataToSaveNew['rentYears'] =$year;
		$dataToSaveNew['Arrears'] =$prevRec['Due'];
		$dataToSaveNew['TotalPayble'] =$dataToSaveNew['amount']+$dataToSaveNew['Arrears'];
		$dataToSaveNew['ReceivedAmount'] =0;
		$dataToSaveNew['Due'] =0;
		$dataToSaveNew['amountStatus'] ='Pending';
		$dataToSaveNew['llAmountStatus'] ='Pending';
		$dataToSaveNew['profit'] ='0';
		$dataToSaveNew['remarks'] ='';
		$dataToSaveNew['modifyDate']=$os->now();
		$dataToSaveNew['modifyBy']=$os->userDetails['adminId']; 		 
		$dataToSaveNew['addedDate']=$os->now();
		$dataToSaveNew['addedBy']=$os->userDetails['adminId'];
		//_d($dataToSaveNew);
		if($dataToSaveNew['propertyId']>0 && $dataToSaveNew['applicantId']>0)
       {
        $os->save($primeryTable,$dataToSaveNew,$primeryField,'');  // new record if not exist
  
       }
       
  
       
	    
	 }
	 
	
	}
	 


}

 


##  update row
if(varP('operation'))
{

	 if(varP('operation')=='updateField')
	 {
	  $rowId=varP('rowId');
	
	
	
 
	
	
	  #---- edit section ----#
		
		
 $dataToSave['propertyId']=varP('propertyId'); 
 $dataToSave['applicantId']=varP('applicantId'); 
 $dataToSave['rentMonths']=varP('rentMonths'); 
 $dataToSave['rentYears']=varP('rentYears'); 
 $dataToSave['amount']=varP('amount'); 
 $dataToSave['amountStatus']=varP('amountStatus'); 
 $dataToSave['llAmount']=varP('llAmount'); 
 $dataToSave['llAmountStatus']=varP('llAmountStatus'); 
 $dataToSave['profit']=varP('profit'); 
 $dataToSave['contractStatus']=varP('contractStatus'); 
 $dataToSave['remarks']=varP('remarks'); 
 
 
  $dataToSave['Arrears']=varP('Arrears'); 
    $dataToSave['TotalPayble']=varP('TotalPayble'); 
	 $dataToSave['ReceivedAmount']=varP('ReceivedAmount'); 
	  $dataToSave['Due']=varP('Due'); 

		 
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

 
$andpropertyIdA=  $os->andField('propertyId','propertyId',$primeryTable,'%');
   $propertyId=$andpropertyIdA['value']; $andpropertyId=$andpropertyIdA['andField'];	 
$andapplicantIdA=  $os->andField('applicantId','applicantId',$primeryTable,'%');
   $applicantId=$andapplicantIdA['value']; $andapplicantId=$andapplicantIdA['andField'];	 
$andrentMonthsA=  $os->andField('rentMonths','rentMonths',$primeryTable,'%');
   $rentMonths=$andrentMonthsA['value']; $andrentMonths=$andrentMonthsA['andField'];	 
$andrentYearsA=  $os->andField('rentYears','rentYears',$primeryTable,'%');
   $rentYears=$andrentYearsA['value']; $andrentYears=$andrentYearsA['andField'];	 
$andamountStatusA=  $os->andField('amountStatus','amountStatus',$primeryTable,'%');
   $amountStatus=$andamountStatusA['value']; $andamountStatus=$andamountStatusA['andField'];	 
$andllAmountStatusA=  $os->andField('llAmountStatus','llAmountStatus',$primeryTable,'%');
   $llAmountStatus=$andllAmountStatusA['value']; $andllAmountStatus=$andllAmountStatusA['andField'];	 
$andcontractStatusA=  $os->andField('contractStatus','contractStatus',$primeryTable,'%');
   $contractStatus=$andcontractStatusA['value']; $andcontractStatus=$andcontractStatusA['andField'];	 
$andremarksA=  $os->andField('remarks','remarks',$primeryTable,'%');
   $remarks=$andremarksA['value']; $andremarks=$andremarksA['andField'];	 

   if(varP('operation')!='updateField')
	 {
         addMonthlyRecord($rentMonths, $rentYears); //($month,$year,$memberId)  
     }
   
   
  
   




$whereSearch="where $primeryField>0   $andpropertyId  $andapplicantId  $andrentMonths  $andrentYears  $andamountStatus  $andllAmountStatus  $andcontractStatus  $andremarks    $andActive order by $primeryField desc";
$updateQuery="update  $primeryTable set Due=(TotalPayble-ReceivedAmount) $whereSearch ";
$os->mq($updateQuery);

$listingQuery=" select * from $primeryTable  $whereSearch ";

##  fetch row
$recordPerPage=999999;
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>

	<table class="container" >
				<tr>
					<td  class="leftside" style="display:none">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  <div class="headertext">Search Option   <span style="float:right; display:none;">Record per page  <?php  echo $recordPerPageDDS; ?></span></div>
			  <div class="searchB">
<table cellpadding="0" cellspacing="0">
	<tr>
	<td class="buttonSa">
	

 Property:
	
	
	<select name="propertyId" id="propertyId" class="textbox fWidth" ><option value="">Select Property</option>		  	<? 
								
										  $os->optionsHTML($propertyId,'propertyId','title','property');?>
							</select>
   Applicant:
	
	
	<select name="applicantId" id="applicantId" class="textbox fWidth" ><option value="">Select Applicant</option>		  	<? 
								
										  $os->optionsHTML($applicantId,'memberId','firstName','member',' memberType="Existing Tenant"');?>
							</select>
   Month:
	
	<select name="rentMonths" id="rentMonths" class="textbox fWidth" ><option value=""> </option>	<? 
										  $os->onlyOption($os->rentMonths,$rentMonths);	?></select>	
   Year:
	
	<select name="rentYears" id="rentYears" class="textbox fWidth" ><option value=""> </option>	<? 
										  $os->onlyOption($os->rentYears,$rentYears);	?></select>	
   Received?:
	
	<select name="amountStatus" id="amountStatus" class="textbox fWidth" ><option value=""> </option>	<? 
										  $os->onlyOption($os->amountStatus,$amountStatus);	?></select>	
   Paid To landlord:
	
	<select name="llAmountStatus" id="llAmountStatus" class="textbox fWidth" ><option value=""> </option>	<? 
										  $os->onlyOption($os->llAmountStatus,$llAmountStatus);	?></select>	
   Contract Status:
	
	<select name="contractStatus" id="contractStatus" class="textbox fWidth" ><option value=""> </option>	<? 
										  $os->onlyOption($os->contractStatus,$contractStatus);	?></select>	
   Remarks: <input type="text" name="remarks" id="remarks" value="<?php echo $remarks?>" style="width:100px;" /> &nbsp;  
  
	 
	
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="resetButton" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a  class="addButton"  href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" style="width:100%" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
<td ><b>Property</b></td>  
  <td ><b>Applicant</b></td>  
  <td ><b>Month</b></td>  
  <td ><b>Year</b></td>  
  <td ><b>Rent <br />Amount</b></td>  
  <td ><b>Arrears</b></td>  
  <td ><b>Total <br />Payble</b></td>  
  <td ><b>Received <br />Amount</b></td>  
  <td ><b>Due</b></td>  
  <td ><b>Received?</b></td>  
  <td ><b>Landlord <br />Amount</b></td>  
  <td ><b>Paid To <br />landlord</b></td>  
  <td ><b>Profit</b></td>  
  <td ><b>Contract <br />Status</b></td>  
  <td ><b>Remarks</b></td>  
  
								
					
								
                                
								
								
								<td >Action </td>
								
							</tr>
							
						 
							
							
							
							<?php
							  $c=1;
							 $i=$os->slNo();
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								 
									$total['amount']=$total['amount']+$record['amount'];
									$total['llAmount']=$total['llAmount']+$record['llAmount'];
									$total['profit']=$total['profit']+$record['profit'];
									
									$pendingColor='';
									if($record['amountStatus']=='Pending')
									{
									
									 $pendingColor='style="background-color:#FF9B9B"';
									}
									 
								  
							
							 ?>
							
							<tr  class="border" id="selected<?php echo $c;?>" onclick="trSelected('<?php echo $c;?>','<?php echo  count($records);?>');"   onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')" >
								<td><?php echo $i?>     </td>
								
								
<td><?php echo  
	$os->getByFld('property','propertyId',$record['propertyId'],'title'); ?></td> 
  <td><?php echo  
	$os->getByFld('member','memberId',$record['applicantId'],'firstName'); ?></td> 
  <td><?php echo  
	$os->rentMonths[$record['rentMonths']]; ?></td> 
  <td><?php echo  
	$os->rentYears[$record['rentYears']]; ?></td> 
  <td>
  <? echo $record['amount']; ?>
  <?php // $os->changeStatusDD_2('',$record['amount'],'rents','amount','rentsId',$DivIds['EDITID'],'',' height:50px;'); ?>
   </td>  
    <td> <? echo $record['Arrears']; ?>    </td>  
	  <td>  	 <? echo $record['TotalPayble']; ?>    </td>  
	 <td> 	
	 
	  <? // echo $record['ReceivedAmount']; ?>  
	 
	 <?php // $os->changeStatusDD_2('',$record['ReceivedAmount'],'rents','ReceivedAmount','rentsId',$DivIds['EDITID'],'',' height:60px;'); ?>
 <?php  $os->editTextField($record['ReceivedAmount'],'rents','ReceivedAmount','rentsId',$DivIds['EDITID'], $inputNameID='ReceivedAmounttext',$extraParams=' style="height:15px; width:70px;" ')?>
	   </td>  
	   <td> 	 <? echo $record['Due']; ?>    </td>  
	 
	
	
	
  <td><span  <? echo  $pendingColor ?>>
  <? 
     $coloramountStatus=array('Pending'=>'FF9B9B');
  
  ?>
  <?php $os->changeStatusDD($os->amountStatus,$record['amountStatus'],'rents','amountStatus','rentsId',$DivIds['EDITID'],$coloramountStatus); ?> 
  
  
  <?php   // echo  	$os->amountStatus[$record['amountStatus']]; ?>
  
  
  </span></td> 
  <td><?php echo $record['llAmount']?> </td>  
  <td>
  
   <?php $os->changeStatusDD($os->llAmountStatus,$record['llAmountStatus'],'rents','llAmountStatus','rentsId',$DivIds['EDITID'],''); ?> 
</td> 
  <td><?php echo $record['profit']?> </td>  
  <td><?php echo  
	$os->contractStatus[$record['contractStatus']]; ?></td> 
  <td><?php echo $record['remarks']?> </td>  
  
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
						</span>
						
                        
                       </td>
														
					</tr>
				 
                            
							
							<?php $i++; $c++;
							} 
							}?>
							
					<tr>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td><b> <? echo $total['amount']; ?> </b></td>
					<td> </td>
						<td> </td>
							<td> </td>
								<td> </td>
									<td> </td>
					<td> <b><? echo $total['llAmount']; ?></b> </td>
					<td> </td>
					<td> <b> <? $pr=$total['amount']-$total['llAmount'];echo $pr; ?> </b></td>
					<td> </td>
					<td> </td>
					
					</tr>		
							
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
	 
	   
 var propertyIdV= os.getVal('propertyId'); 
 var applicantIdV= os.getVal('applicantId'); 
 var rentMonthsV= os.getVal('rentMonths'); 
 var rentYearsV= os.getVal('rentYears'); 
 var amountStatusV= os.getVal('amountStatus'); 
 var llAmountStatusV= os.getVal('llAmountStatus'); 
 var contractStatusV= os.getVal('contractStatus'); 
 var remarksV= os.getVal('remarks'); 
window.location='<?php echo $listPAGEUrl; ?>propertyId='+propertyIdV +'&applicantId='+applicantIdV +'&rentMonths='+rentMonthsV +'&rentYears='+rentYearsV +'&amountStatus='+amountStatusV +'&llAmountStatus='+llAmountStatusV +'&contractStatus='+contractStatusV +'&remarks='+remarksV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>propertyId=&applicantId=&rentMonths=&rentYears=&amountStatus=&llAmountStatus=&contractStatus=&remarks=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>