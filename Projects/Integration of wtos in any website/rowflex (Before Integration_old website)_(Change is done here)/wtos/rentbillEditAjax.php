<? 
session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();


if($_GET['WT_rentbillListing']=='OK')
{
	
	$andrentMonthA=  $os->andField('rentMonth_s','rentMonth',$primeryTable,'=');
	$rentMonth_s=$andrentMonthA['value']; $andrentMonth=$andrentMonthA['andField'];	 
	$andrentYearA=  $os->andField('rentYear_s','rentYear',$primeryTable,'=');
	$rentYear_s=$andrentYearA['value']; $andrentYear=$andrentYearA['andField'];	 
	
	$f_dueDate_s= $os->setNget('f_dueDate_s',$primeryTable);
	$t_dueDate_s= $os->setNget('t_dueDate_s',$primeryTable);
	$anddueDate=$os->DateQ('dueDate',$f_dueDate_s,$t_dueDate_s,$sTime='00:00:00',$eTime='59:59:59');
	$andpaymentStatusA=  $os->andField('paymentStatus_s','paymentStatus',$primeryTable,'%');
	$paymentStatus_s=$andpaymentStatusA['value']; $andpaymentStatus=$andpaymentStatusA['andField'];	 
	$andnoteA=  $os->andField('note_s','note',$primeryTable,'%');
	$note_s=$andnoteA['value']; $andnote=$andnoteA['andField'];	 
	
	$andpropertyIdA=  $os->andField('propertyId_s','propertyId',$primeryTable,'%');
	$propertyId_s=$andpropertyIdA['value']; $andpropertyId=$andpropertyIdA['andField'];	
	
	
	if($propertyId_s>0)
	{
	
	$andpropertyId ="and agreementReffId LIKE '%P".$propertyId_s."%' " ;
	}
	
	
	 
   
	$searchKey=$_GET['searchKey'];
	if($searchKey!=''){
	$where ="and ( rentMonth like '%$searchKey%' Or rentYear like '%$searchKey%' Or dueDate like '%$searchKey%' Or paymentStatus like '%$searchKey%' Or note like '%$searchKey%' )";
	}
	  $listingQuery=" select * from rentbill where rentbillId>0   $where     $andrentMonth     $andrentYear  $anddueDate    $andpaymentStatus  $andpaymentStatus  $andnote  $andnote $andpropertyId     order by dueDate asc";
	
	 
	// $rsRecords=$os->mq($listingQuery);
	$resource=$os->pagingQuery($listingQuery,50,false,true);
	$rsRecords=$resource['resource'];
	
	$rsRecordsCount=mysql_num_rows($rsRecords);


#  tenant property landlord 999
 while($records=$os->mfa( $rsRecords)){ 
  $agreementReffId=$records['agreementReffId'];
 
   $p=$os->getIdsByAgreemenRefeId($agreementReffId);
   
   $tenantsIds[]=$p['memberIdTenant'];
   $landlordIds[]=$p['memberIdLandlord'];
   $propertyIds[]=$p['propertyId'];
  // $agreementReffIdS[]=$agreementReffId;
      
 }
 
 if(is_array($tenantsIds))
 {
		$idsStr=implode(',',$tenantsIds);
		$bulkQuery=" select memberId, firstName, lastName from member where memberId IN($idsStr)";
		$rsSource=$os->mq($bulkQuery);
		while($record=$os->mfa( $rsSource))
		{ 
		$tenantsArray[$record['memberId']]=$record['firstName'] . " ".$record['lastName'];
		}
		
		$idsStr=implode(',',$landlordIds);
		$bulkQuery=" select memberId, firstName, lastName from member where memberId IN($idsStr)";
		$rsSource=$os->mq($bulkQuery);
		while($record=$os->mfa( $rsSource))
		{ 
		$landlordArray[$record['memberId']]=$record['firstName'] . " ".$record['lastName'];
		}
		
		$idsStr=implode(',',$propertyIds);
		$bulkQuery=" select propertyId,houseNO,RoadName,postcode from property  where propertyId IN($idsStr)";
		$rsSource=$os->mq($bulkQuery);
		while($record=$os->mfa( $rsSource))
		{ 
		$propertyArray[$record['propertyId']]=$record['houseNO'] . " ".$record['RoadName']. " ".$record['postcode'];
		}
	  
	  
	  
	  
 
 }
 
 
   

# 999 end
$resource=$os->pagingQuery($listingQuery,50,false,true);
	$rsRecords=$resource['resource'];
 
?>
<div class="listingRecords">
<div class="pagingLinkCss"> <? echo $resource['links']; ?> </div>

<table  border="0" cellspacing="2" cellpadding="2" class="noBorder"  >
							<tr class="borderTitle" >
						
	                            <td >#</td>
								
								

  <td ><b>Month</b></td>  
  <td ><b>Year</b></td>  
  <td ><b>Rent Amount</b></td>  
  <td ><b>Arrears</b></td>  
  <td ><b>Payble  <br />Amount</b></td>  
  <td ><b>Received  <br />Amount</b></td>  
  <td ><b>Due  <br />Amount</b></td>  
  <td ><b>Due Date</b></td>  
  <td ><b>Status</b></td>  
 <td ><b>Tenant</b></td>  
 <td ><b>Property</b></td>  
  
  <td ><b>Note</b></td>  
  
																
								<td >Action </td>
 
								
							</tr>
						   
							
							<?php
								  
						 $i=$os->slNo();
							while($record=$os->mfa( $rsRecords)){ 
							    
								 $ref=$os->getIdsByAgreemenRefeId($record['agreementReffId']);
							
						
						$billStatus='#DEFEDF';
						if($record['paymentStatus']=='Pending')
						{
						  $billStatus='#FDD9E2';
						}
						
							 ?>
							<tr onclick="WT_rentbillGetById('<? echo $record['rentbillId'];?>')" >
							<td><?php echo $i; ?>     </td>
								
								

  <td><?php echo  
	$os->rentMonth[$record['rentMonth']]; ?></td> 
  <td><?php echo  
	$os->rentYear[$record['rentYear']]; ?></td> 
	<td><?php echo $record['rentAmount']?> </td>  
  <td><?php echo $record['rentArrears']?> </td>  
  <td><?php echo $record['paybleAmount']?> </td>  
  <td><?php echo $record['receivedAmount']?> </td>  
  <td><?php echo $record['dueAmount']?> </td>  
  <td><?php echo $os->showDate($record['dueDate']);?> </td>  
   <td style="background-color:<? echo $billStatus  ?>"><?php echo  
	$os->rentPaymentStatus[$record['paymentStatus']]; ?></td> 
    <td><?php echo $tenantsArray[$ref['memberIdTenant']]?> </td>  
  <td><?php echo $propertyArray[$ref['propertyId']]?> </td>  
  
  
   
 
 
 
  <td><?php echo $record['note']?> </td>  
  
								<td><span style="cursor:pointer;" class="editAjax" >Edit</span>    </td>
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

if($_GET['WT_rentbillEditAndSave']=='OK')
{
		$rentbillId=varG('rentbillId');
		
		
 $dataToSave['rentAmount']=varG('rentAmount');  
 $dataToSave['rentMonth']=varG('rentMonth'); 
 $dataToSave['rentYear']=varG('rentYear'); 
 $dataToSave['rentArrears']=varG('rentArrears'); 
 $dataToSave['paybleAmount']=varG('paybleAmount'); 
 $dataToSave['receivedAmount']=varG('receivedAmount'); 
 $dataToSave['dueAmount']=varG('dueAmount'); 
 $dataToSave['dueDate']=$os->saveDate(varG('dueDate')); 
 $dataToSave['dated']=$os->saveDate(varG('dated')); 
 $dataToSave['paymentStatus']=varG('paymentStatus'); 
 $dataToSave['note']=varG('note'); 
       
		
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
		if($rentbillId < 1){
		
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		$rentbillIdV=$os->save('rentbill',$dataToSave,'rentbillId',$rentbillId);	
		
		if($dataToSave['paymentStatus']=='Add To Next'){
		$os->arrearsToNextMonth($dataToSave['rentMonth'],$dataToSave['rentYear'],$dataToSave['dueAmount'],$rentbillIdV);
		}
		
		if($rentbillIdV>0 )
		{
		if($rentbillId>0 ){ $mgs= " Data updated Successfully";}
		if($rentbillId<1 ){ $mgs= " Data Added Successfully";}
		
		$mgs=$rentbillIdV."#-#".$mgs;
		}else
		{
		$mgs="Error#-#Problem Saving Data.";
		
		}
		echo $mgs;		
 
exit();
	
}

if($_GET['WT_rentbillGetById']=='OK')
{
		$rentbillId=$_GET['rentbillId'];
		
		if($rentbillId>0)	
		{
		$wheres=" where rentbillId='$rentbillId'";
		}
	    $dataQuery=" select * from rentbill  $wheres ";
		$rsResults=$os->mq($dataQuery);
		$record=$os->mfa( $rsResults);
		
		 
		
 $record['rentAmount']=stripslashes($record['rentAmount']);
 $record['rentMonth']=stripslashes($record['rentMonth']);
 $record['rentYear']=stripslashes($record['rentYear']);
 $record['rentArrears']=stripslashes($record['rentArrears']);
 $record['paybleAmount']=stripslashes($record['paybleAmount']);
 $record['receivedAmount']=stripslashes($record['receivedAmount']);
 $record['dueAmount']=stripslashes($record['dueAmount']);
 $record['dueDate']=$os->showDate($record['dueDate']); 
 $record['dated']=$os->showDate($record['dated']); 
 $record['paymentStatus']=stripslashes($record['paymentStatus']);
 $record['note']=stripslashes($record['note']);

		
		echo  json_encode($record);	 
 
exit();
	
}


if($_GET['WT_rentbillDeleteRowById']=='OK')
{ 

$rentbillId=$_GET['rentbillId'];
 if($rentbillId>0){
 $updateQuery="delete from rentbill where rentbillId='$rentbillId'";
 $os->mq($updateQuery);
    echo 'Record Deleted Successfully';
 }
 exit();
}
