<? 
session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
//error_reporting(-1);
ob_end_clean();


if($_GET['WT_rentagreementListing']=='OK')
{
    

	$f_dated_s= $os->setNget('f_dated_s',$primeryTable);
	$t_dated_s= $os->setNget('t_dated_s',$primeryTable);
	$anddated=$os->DateQ('dated_s',$f_dated_s,$t_dated_s,$sTime='00:00:00',$eTime='59:59:59');
	$andtenantIdA=  $os->andField('tenantId_s','tenantId',$primeryTable,'%');
	$tenantId_s=$andtenantIdA['value']; $andtenantId=$andtenantIdA['andField'];	 
	$andlandlordIdA=  $os->andField('landlordId_s','landlordId',$primeryTable,'%');
	$landlordId_s=$andlandlordIdA['value']; $andlandlordId=$andlandlordIdA['andField'];	 
	$andpropertyIdA=  $os->andField('propertyId_s','propertyId',$primeryTable,'%');
	$propertyId_s=$andpropertyIdA['value']; $andpropertyId=$andpropertyIdA['andField'];	 
	$andtypeA=  $os->andField('type_s','type',$primeryTable,'%');
	$type_s=$andtypeA['value']; $andtype=$andtypeA['andField'];	 
	$andagentNameA=  $os->andField('agentName_s','agentName',$primeryTable,'%');
	$agentName_s=$andagentNameA['value']; $andagentName=$andagentNameA['andField'];	 
	$andstatusA=  $os->andField('status_s','status',$primeryTable,'%');
	$status_s=$andstatusA['value']; $andstatus=$andstatusA['andField'];	 
	$andnoteA=  $os->andField('note_s','note',$primeryTable,'%');
	$note_s=$andnoteA['value']; $andnote=$andnoteA['andField'];	 

   
	$searchKey=$_GET['searchKey'];
	if($searchKey!=''){
	$where ="and ( dated like '%$searchKey%' Or tenantId like '%$searchKey%' Or landlordId like '%$searchKey%' Or propertyId like '%$searchKey%' Or type like '%$searchKey%' Or agentName like '%$searchKey%' Or status like '%$searchKey%' Or note like '%$searchKey%' )";
	}
	$listingQuery=" select * from rentagreement where rentagreementId>0   $where   $anddated  $anddated  $andtenantId  $andtenantId  $andlandlordId  $andlandlordId  $andpropertyId  $andpropertyId  $andtype  $andtype  $andagentName  $andagentName  $andstatus  $andstatus  $andnote  $andnote     order by rentagreementId desc";
	
	 
	// $rsRecords=$os->mq($listingQuery);
	$resource=$os->pagingQuery($listingQuery,50,false,true);
	$rsRecords=$resource['resource'];
	
	$rsRecordsCount=mysql_num_rows($rsRecords);


 
?>
<div class="listingRecords">
<div class="pagingLinkCss"> <? echo $resource['links']; ?> </div>

<table  border="0" cellspacing="2" cellpadding="2" class="noBorder"  >
							<tr class="borderTitle" >
						
	                            <td >#</td>
									<td >Action </td>
								
<td ><b>Date</b></td>  
  <td ><b>Agreement  <br />From</b></td>  
  <td ><b>Agreement  <br /> To</b></td>  
  <td ><b>Tenant</b></td>  
  <td ><b>Landlord</b></td>  
  <td ><b>Property</b></td>  
  <td ><b>Type</b></td>  
  <td ><b>Commission</b></td>  
  <td ><b>Rent  <br /> Amount</b></td>  
  <td ><b>Status</b></td>  
  <td ><b>Note</b></td>  
	
 </tr>
							
							
							
							<?php
								  
						 $i=$os->slNo();
							while($record=$os->mfa( $rsRecords)){ 
							    
								
							
						
							 ?>
							<tr onclick="WT_rentagreementGetById('<? echo $record['rentagreementId'];?>')">
							<td><?php echo $i; ?>     </td>
							<td><span style="cursor:pointer;" class="editAjax" >Edit</span>    </td>
								
								
<td><?php echo $os->showDate($record['dated']);?> </td>  
  <td><?php echo $os->showDate($record['fromDate']);?> </td>  
  <td><?php echo $os->showDate($record['toDate']);?> </td>  
  <td><?php echo  
	$os->getByFld('member ','memberId',$record['tenantId'],'firstName'); ?></td> 
  <td><?php echo  
	$os->getByFld('member ','memberId',$record['landlordId'],'firstName'); ?></td> 
  <td><?php echo  
	$os->getByFld('property','propertyId',$record['propertyId'],'title'); ?></td> 
  <td><?php echo  
	$os->agreementType[$record['type']]; ?></td> 
  <td><?php echo $record['commission']?> </td>  
  <td><?php echo $record['rentAmount']?> </td>  
  <td><?php echo  
	$os->agreementStatus[$record['status']]; ?></td> 
  <td><?php echo $record['note']?> </td>  
  
								
				 </tr>
                          <? 
						  
						 $i++;   
						  } ?>  
							
		
			
			
							 
		</table> 
		
		
		
		</div>
		
		<br />
		
		
						
<?php 
exit();
	
}






if($_GET['WT_rentagreementEditAndSave']=='OK')
{
		$rentagreementId=varG('rentagreementId');
		
		
 $dataToSave['dated']=$os->saveDate(varG('dated')); 
 $dataToSave['fromDate']=$os->saveDate(varG('fromDate')); 
 $dataToSave['toDate']=$os->saveDate(varG('toDate')); 
 $dataToSave['tenantId']=varG('tenantId'); 
 $dataToSave['landlordId']=varG('landlordId'); 
 $dataToSave['propertyId']=varG('propertyId'); 
 $dataToSave['type']=varG('type'); 
 $dataToSave['rentAmountLandlord']=varG('rentAmount'); // varG('rentAmountLandlord'); 
 $dataToSave['commission']=varG('commission'); 
 $dataToSave['rentAmount']=varG('rentAmount'); 
 $dataToSave['deposite']=varG('deposite'); 
 $dataToSave['holdingDeposite']=varG('holdingDeposite'); 
 $dataToSave['adminFees']=varG('adminFees'); 
 $dataToSave['agentName']=varG('agentName'); 
 $dataToSave['rentDueDate']=$os->saveDate(varG('rentDueDate')); 
  $dataToSave['landLordDueDate']=$os->saveDate(varG('landLordDueDate')); 
 
 $dataToSave['paybleAmount']=varG('paybleAmount'); 
 $dataToSave['status']=varG('status'); 
 $dataToSave['note']=varG('note'); 

		
		
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
		if($rentagreementId < 1){
		
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		$rentagreementIdV=$os->save('rentagreement',$dataToSave,'rentagreementId',$rentagreementId);	
		$dataToSaveAdd['agreementReffId']='A'.$rentagreementIdV.'T'.$dataToSave['tenantId'].'P'.$dataToSave['propertyId'].'L'.$dataToSave['landlordId'];
		$rentagreementIdV=$os->save('rentagreement',$dataToSaveAdd,'rentagreementId',$rentagreementIdV);	
		$dataToSave['agreementReffId']=$dataToSaveAdd['agreementReffId']; 
		
		
		if($rentagreementIdV>0 )
		{
		if($rentagreementId>0 ){ $mgs= " Data updated Successfully";}
		if($rentagreementId<1 ){ $mgs= " Data Added Successfully";
		
		// for the first time add rent and landlord payments 	
	          
	               $os->addAgrementRentbillsLandlordbills($dataToSave,$rentagreementIdV);
	
	
		}
		
		
	   $tt=0;	
		if($tt==1)
		{
				//$os->mq('TRUNCATE TABLE landlordbill');
				//$os->mq('TRUNCATE TABLE rentbill');
				//$os->mq('TRUNCATE TABLE landlordbillotherfees');
				//$os->mq('TRUNCATE TABLE rentbillotherfees');
			   //$os->mq('TRUNCATE TABLE payments');
		        //$os->addAgrementRentbillsLandlordbills($dataToSave,$rentagreementIdV);
		} 
		 
		 
		  
		
		
		$mgs=$rentagreementIdV."#-#".$mgs;
		}else
		{
		$mgs="Error#-#Problem Saving Data.";
		
		}
		echo $mgs;		
 
exit();
	
}

if($_GET['WT_rentagreementGetById']=='OK')
{
		$rentagreementId=$_GET['rentagreementId'];
		
		if($rentagreementId>0)	
		{
		$wheres=" where rentagreementId='$rentagreementId'";
		}
	    $dataQuery=" select * from rentagreement  $wheres ";
		$rsResults=$os->mq($dataQuery);
		$record=$os->mfa( $rsResults);
		
		 
		
 $record['dated']=$os->showDate($record['dated']); 
 $record['fromDate']=$os->showDate($record['fromDate']); 
 $record['toDate']=$os->showDate($record['toDate']); 
 $record['tenantId']=stripslashes($record['tenantId']);
 $record['landlordId']=stripslashes($record['landlordId']);
 $record['propertyId']=stripslashes($record['propertyId']);
 $record['type']=stripslashes($record['type']);
 $record['rentAmountLandlord']=stripslashes($record['rentAmountLandlord']);
 $record['commission']=stripslashes($record['commission']);
 $record['rentAmount']=stripslashes($record['rentAmount']);
 $record['deposite']=stripslashes($record['deposite']);
 $record['holdingDeposite']=stripslashes($record['holdingDeposite']);
 $record['adminFees']=stripslashes($record['adminFees']);
 $record['agentName']=stripslashes($record['agentName']);
 $record['rentDueDate']=$os->showDate($record['rentDueDate']); 
 $record['paybleAmount']=stripslashes($record['paybleAmount']);
 $record['status']=stripslashes($record['status']);
 $record['note']=stripslashes($record['note']);
 $record['landLordDueDate']=$os->showDate($record['landLordDueDate']); 

		
		echo  json_encode($record);	 
 
exit();
	
}


if($_GET['WT_rentagreementDeleteRowById']=='OK')
{ 

$rentagreementId=$_GET['rentagreementId'];
 if($rentagreementId>0){

     $os->deleteRentLandlordByAgreementId($rentagreementId);
 
 
     $updateQuery="delete from rentagreement where rentagreementId='$rentagreementId'";
     $os->mq($updateQuery);
 
 
    echo 'Record Deleted Successfully';
 }
 exit();
}
