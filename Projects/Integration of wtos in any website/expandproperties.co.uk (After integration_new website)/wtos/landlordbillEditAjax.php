<? 
session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();


if($_GET['WT_landlordbillListing']=='OK')
{
    
$andrentMonthA=  $os->andField('rentMonth_s','rentMonth',$primeryTable,'=');
   $rentMonth_s=$andrentMonthA['value']; $andrentMonth=$andrentMonthA['andField'];	 
$andrentYearA=  $os->andField('rentYear_s','rentYear',$primeryTable,'=');
   $rentYear_s=$andrentYearA['value']; $andrentYear=$andrentYearA['andField'];	 

    $f_dated_s= $os->setNget('f_dated_s',$primeryTable);
	$t_dated_s= $os->setNget('t_dated_s',$primeryTable);
   $anddated=$os->DateQ('dated',$f_dated_s,$t_dated_s,$sTime='00:00:00',$eTime='59:59:59');
$andnoteA=  $os->andField('note_s','note',$primeryTable,'%');
   $note_s=$andnoteA['value']; $andnote=$andnoteA['andField'];	 

   
	$searchKey=$_GET['searchKey'];
	if($searchKey!=''){
	$where ="and ( rentMonth like '%$searchKey%' Or rentYear like '%$searchKey%' Ordated like '%$searchKey%' Or note like '%$searchKey%' )";
	}
  $listingQuery=" select * from landlordbill where landlordbillId>0   $where     $anddated  $andnote      $andrentMonth   $andrentYear    order by landlordbillId desc";
	
	 
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
								
								
<td ><b>Date</b></td>  
 <td ><b>Month</b></td>  
  <td ><b>Year</b></td>  
  <td ><b>Rent <br /> Amount</b></td>  
  <td ><b>Commission</b></td>  
  <td ><b>Payble  <br /> Amount</b></td>  
  <td ><b>Paid  <br /> Amount</b></td>  
  <td ><b>Status</b></td>  
 <td ><b>Tenant</b></td>  
 <td ><b>Landlord</b></td>  
  <td ><b>Note</b></td>  
  
																
								<td >Action </td>
 
								
							</tr>
							
							
							
							<?php
								  
						 $i=$os->slNo();
							while($record=$os->mfa( $rsRecords)){ 
							    
								 $ref=$os->getIdsByAgreemenRefeId($record['agreementReffId']);
							
						
							 ?>
							<tr onclick="WT_landlordbillGetById('<? echo $record['landlordbillId'];?>')">
							<td><?php echo $i; ?>     </td>
								
								
<td><?php echo $os->showDate($record['dated']);?> </td>  
  <td><?php echo  
	$os->rentMonth[$record['rentMonth']]; ?></td> 
  <td><?php echo  
	$os->rentYear[$record['rentYear']]; ?></td> 
  <td><?php echo $record['rentAmountLandlord']?> </td>  
  <td><?php echo $record['commission']?> </td>  
  <td><?php echo $record['paybleAmount']?> </td>  
  <td><?php echo $record['paidAmount']?> </td>  
  <td><?php echo  
	$os->landlordpaymentStatus[$record['paymentStatus']]; ?></td> 
	
	<td><?php echo $tenantsArray[$ref['memberIdTenant']]?> </td>  
  <td><?php echo $landlordArray[$ref['memberIdLandlord']]?> </td>  
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

if($_GET['WT_landlordbillEditAndSave']=='OK')
{
		$landlordbillId=varG('landlordbillId');
		
		
 $dataToSave['dated']=$os->saveDate(varG('dated')); 
 $dataToSave['rentAmountLandlord']=varG('rentAmountLandlord'); 
 $dataToSave['commission']=varG('commission'); 
 $dataToSave['paybleAmount']=varG('paybleAmount'); 
 $dataToSave['paidAmount']=varG('paidAmount'); 
 $dataToSave['paymentStatus']=varG('paymentStatus'); 
 $dataToSave['note']=varG('note'); 

		
		
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
		if($landlordbillId < 1){
		
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		$landlordbillIdV=$os->save('landlordbill',$dataToSave,'landlordbillId',$landlordbillId);	
		
		if($landlordbillIdV>0 )
		{
		if($landlordbillId>0 ){ $mgs= " Data updated Successfully";}
		if($landlordbillId<1 ){ $mgs= " Data Added Successfully";}
		
		$mgs=$landlordbillIdV."#-#".$mgs;
		}else
		{
		$mgs="Error#-#Problem Saving Data.";
		
		}
		echo $mgs;		
 
exit();
	
}

if($_GET['WT_landlordbillGetById']=='OK')
{
		$landlordbillId=$_GET['landlordbillId'];
		
		if($landlordbillId>0)	
		{
		$wheres=" where landlordbillId='$landlordbillId'";
		}
	    $dataQuery=" select * from landlordbill  $wheres ";
		$rsResults=$os->mq($dataQuery);
		$record=$os->mfa( $rsResults);
		
		 
		
 $record['dated']=$os->showDate($record['dated']); 
 $record['rentAmountLandlord']=stripslashes($record['rentAmountLandlord']);
 $record['commission']=stripslashes($record['commission']);
 $record['paybleAmount']=stripslashes($record['paybleAmount']);
 $record['paidAmount']=stripslashes($record['paidAmount']);
 $record['paymentStatus']=stripslashes($record['paymentStatus']);
 $record['note']=stripslashes($record['note']);

		
		echo  json_encode($record);	 
 
exit();
	
}


if($_GET['WT_landlordbillDeleteRowById']=='OK')
{ 

$landlordbillId=$_GET['landlordbillId'];
 if($landlordbillId>0){
 $updateQuery="delete from landlordbill where landlordbillId='$landlordbillId'";
 $os->mq($updateQuery);
    echo 'Record Deleted Successfully';
 }
 exit();
}
