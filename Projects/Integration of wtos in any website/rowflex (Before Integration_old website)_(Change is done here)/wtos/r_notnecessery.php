<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='r_notnecesseryEdit';
$listPAGE='r_notnecessery';
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


##  update row
if(varP('operation'))
{

	 if(varP('operation')=='updateField')
	 {
	  $rowId=varP('rowId');
	
	  #---- edit section ----#
		
		
 $dataToSave['propertyId']=varP('propertyId'); 
 $applicantId=$os->UploadPhoto('applicantId',$site['imgPath'].'wtos-images');
				   	if($applicantId!=''){
					$dataToSave['applicantId']='wtos-images/'.$applicantId;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'applicantId',$site['imgPath']);}
					} 					
						
 $dataToSave['rentMonths']=varP('rentMonths'); 
 $dataToSave['rentYears']=varP('rentYears'); 
 $dataToSave['amount']=varP('amount'); 
 $dataToSave['amountStatus']=varP('amountStatus'); 
 $dataToSave['llAmount']=varP('llAmount'); 
 $dataToSave['llAmountStatus']=varP('llAmountStatus'); 
 $dataToSave['profit']=varP('profit'); 
 $dataToSave['contractStatus']=varP('contractStatus'); 
 $dataToSave['remarks']=varP('remarks'); 

		 
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
$andamountA=  $os->andField('amount','amount',$primeryTable,'%');
   $amount=$andamountA['value']; $andamount=$andamountA['andField'];	 
$andamountStatusA=  $os->andField('amountStatus','amountStatus',$primeryTable,'%');
   $amountStatus=$andamountStatusA['value']; $andamountStatus=$andamountStatusA['andField'];	 
$andllAmountA=  $os->andField('llAmount','llAmount',$primeryTable,'%');
   $llAmount=$andllAmountA['value']; $andllAmount=$andllAmountA['andField'];	 
$andllAmountStatusA=  $os->andField('llAmountStatus','llAmountStatus',$primeryTable,'%');
   $llAmountStatus=$andllAmountStatusA['value']; $andllAmountStatus=$andllAmountStatusA['andField'];	 
$andprofitA=  $os->andField('profit','profit',$primeryTable,'%');
   $profit=$andprofitA['value']; $andprofit=$andprofitA['andField'];	 
$andcontractStatusA=  $os->andField('contractStatus','contractStatus',$primeryTable,'%');
   $contractStatus=$andcontractStatusA['value']; $andcontractStatus=$andcontractStatusA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andpropertyId  $andapplicantId  $andrentMonths  $andrentYears  $andamount  $andamountStatus  $andllAmount  $andllAmountStatus  $andprofit  $andcontractStatus    $andActive order by $primeryField desc  ";

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
	

 Property:
	
	
	<select name="propertyId" id="propertyId" class="textbox fWidth" ><option value="">Select Property</option>		  	<? 
								
										  $os->optionsHTML($propertyId,'propertyId','title','property');?>
							</select>
   Applicant: <input type="text" name="applicantId" id="applicantId" value="<?php echo $applicantId?>" style="width:100px;" /> &nbsp;  
   Month: <input type="text" name="rentMonths" id="rentMonths" value="<?php echo $rentMonths?>" style="width:100px;" /> &nbsp;  
   rentYears: <input type="text" name="rentYears" id="rentYears" value="<?php echo $rentYears?>" style="width:100px;" /> &nbsp;  
   amount: <input type="text" name="amount" id="amount" value="<?php echo $amount?>" style="width:100px;" /> &nbsp;  
   amountStatus: <input type="text" name="amountStatus" id="amountStatus" value="<?php echo $amountStatus?>" style="width:100px;" /> &nbsp;  
   llAmount: <input type="text" name="llAmount" id="llAmount" value="<?php echo $llAmount?>" style="width:100px;" /> &nbsp;  
   llAmountStatus: <input type="text" name="llAmountStatus" id="llAmountStatus" value="<?php echo $llAmountStatus?>" style="width:100px;" /> &nbsp;  
   profit: <input type="text" name="profit" id="profit" value="<?php echo $profit?>" style="width:100px;" /> &nbsp;  
   contractStatus: <input type="text" name="contractStatus" id="contractStatus" value="<?php echo $contractStatus?>" style="width:100px;" /> &nbsp;  
  
	 
	
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
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
<td ><b>Property</b></td>  
  <td ><b>Applicant</b></td>  
  <td ><b>Month</b></td>  
  <td ><b>rentYears</b></td>  
  <td ><b>amount</b></td>  
  <td ><b>amountStatus</b></td>  
  <td ><b>llAmount</b></td>  
  <td ><b>llAmountStatus</b></td>  
  <td ><b>profit</b></td>  
  <td ><b>contractStatus</b></td>  
  <td ><b>remarks</b></td>  
  
								
								 
								
                                
								
								
								<td >Action </td>
								
							</tr>
							
							<tr class="border" >
								<td id="create_0_0" style="display:none" colspan="10">
								<div  id="create_0"> &nbsp </div>	
								
								</td>
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
								
								
<td><?php echo  
	$os->getByFld('property','propertyId',$record['propertyId'],'title'); ?></td> 
  <td><img src="<?php  echo $site['urlFront'].$record['applicantId']; ?>"  height="70" width="70" /></td>  
  <td><?php echo $record['rentMonths']?> </td>  
  <td><?php echo $record['rentYears']?> </td>  
  <td><?php echo $record['amount']?> </td>  
  <td><?php echo $record['amountStatus']?> </td>  
  <td><?php echo $record['llAmount']?> </td>  
  <td><?php echo $record['llAmountStatus']?> </td>  
  <td><?php echo $record['profit']?> </td>  
  <td><?php echo $record['contractStatus']?> </td>  
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
 var amountV= os.getVal('amount'); 
 var amountStatusV= os.getVal('amountStatus'); 
 var llAmountV= os.getVal('llAmount'); 
 var llAmountStatusV= os.getVal('llAmountStatus'); 
 var profitV= os.getVal('profit'); 
 var contractStatusV= os.getVal('contractStatus'); 
window.location='<?php echo $listPAGEUrl; ?>propertyId='+propertyIdV +'&applicantId='+applicantIdV +'&rentMonths='+rentMonthsV +'&rentYears='+rentYearsV +'&amount='+amountV +'&amountStatus='+amountStatusV +'&llAmount='+llAmountV +'&llAmountStatus='+llAmountStatusV +'&profit='+profitV +'&contractStatus='+contractStatusV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>propertyId=&applicantId=&rentMonths=&rentYears=&amount=&amountStatus=&llAmount=&llAmountStatus=&profit=&contractStatus=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>