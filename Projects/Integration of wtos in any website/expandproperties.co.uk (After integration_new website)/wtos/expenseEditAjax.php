<? 
session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();


if($_GET['WT_expenseListing']=='OK')
{
    

    $f_dated_s= $os->setNget('f_dated_s',$primeryTable);
	$t_dated_s= $os->setNget('t_dated_s',$primeryTable);
   $anddated=$os->DateQ('dated_s',$f_dated_s,$t_dated_s,$sTime='00:00:00',$eTime='59:59:59');
$andexpenseToA=  $os->andField('expenseTo_s','expenseTo',$primeryTable,'%');
   $expenseTo_s=$andexpenseToA['value']; $andexpenseTo=$andexpenseToA['andField'];	 
$andcategoryA=  $os->andField('category_s','category',$primeryTable,'%');
   $category_s=$andcategoryA['value']; $andcategory=$andcategoryA['andField'];	 
$andpaymentStatusA=  $os->andField('paymentStatus_s','paymentStatus',$primeryTable,'%');
   $paymentStatus_s=$andpaymentStatusA['value']; $andpaymentStatus=$andpaymentStatusA['andField'];	 
$andnoteA=  $os->andField('note_s','note',$primeryTable,'%');
   $note_s=$andnoteA['value']; $andnote=$andnoteA['andField'];	 

   
	$searchKey=$_GET['searchKey'];
	if($searchKey!=''){
	$where ="and ( dated like '%$searchKey%' Or expenseTo like '%$searchKey%' Or category like '%$searchKey%' Or paymentStatus like '%$searchKey%' Or note like '%$searchKey%' )";
	}
	$listingQuery=" select * from expense where expenseId>0   $where   $anddated  $anddated  $andexpenseTo  $andexpenseTo  $andcategory  $andcategory  $andpaymentStatus  $andpaymentStatus  $andnote  $andnote     order by expenseId desc";
	
	 
	// $rsRecords=$os->mq($listingQuery);
	$resource=$os->pagingQuery($listingQuery,25,false,true);
	$rsRecords=$resource['resource'];
	
	$rsRecordsCount=mysql_num_rows($rsRecords);


 
?>
<div class="listingRecords">
<div class="pagingLinkCss"> <? echo $resource['links']; ?> </div>

<table  border="0" cellspacing="2" cellpadding="2" class="noBorder"  >
							<tr class="borderTitle" >
						
	                            <td >#</td>
								
								
<td ><b>Date</b></td>  
  <td ><b>Title</b></td>  
  <td ><b>Amount</b></td>  
  <td ><b>Expense To</b></td>  
  <td ><b>Category</b></td>  
  <td ><b>Payment <br />Status</b></td>  
  <td ><b>Note</b></td>  
  
																
								<td >Action </td>
 
								
							</tr>
							
							
							
							<?php
								  
						 $i=$os->slNo();
							while($record=$os->mfa( $rsRecords)){ 
							    
								
							
						
							 ?>
							<tr onclick="WT_expenseGetById('<? echo $record['expenseId'];?>')">
							<td><?php echo $i; ?>     </td>
								
								
<td><?php echo $os->showDate($record['dated']);?> </td>  
  <td><?php echo $record['title']?> </td>  
  <td><?php echo $record['amount']?> </td>  
  <td><?php echo $record['expenseTo']?> </td>  
  <td><?php echo  
	$os->expCategory[$record['category']]; ?></td> 
  <td><?php echo  
	$os->exppaymentStatus[$record['paymentStatus']]; ?></td> 
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

if($_GET['WT_expenseEditAndSave']=='OK')
{
		$expenseId=varG('expenseId');
		
		
 $dataToSave['dated']=$os->saveDate(varG('dated')); 
 $dataToSave['title']=varG('title'); 
 $dataToSave['amount']=varG('amount'); 
 $dataToSave['expenseTo']=varG('expenseTo'); 
 $dataToSave['category']=varG('category'); 
 $dataToSave['paymentStatus']=varG('paymentStatus'); 
 $dataToSave['note']=varG('note'); 

		
		
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
		if($expenseId < 1){
		
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		$expenseIdV=$os->save('expense',$dataToSave,'expenseId',$expenseId);	
		
		if($expenseIdV>0 )
		{
		if($expenseId>0 ){ $mgs= " Data updated Successfully";}
		if($expenseId<1 ){ $mgs= " Data Added Successfully";}
		
		$mgs=$expenseIdV."#-#".$mgs;
		}else
		{
		$mgs="Error#-#Problem Saving Data.";
		
		}
		echo $mgs;		
 
exit();
	
}

if($_GET['WT_expenseGetById']=='OK')
{
		$expenseId=$_GET['expenseId'];
		
		if($expenseId>0)	
		{
		$wheres=" where expenseId='$expenseId'";
		}
	    $dataQuery=" select * from expense  $wheres ";
		$rsResults=$os->mq($dataQuery);
		$record=$os->mfa( $rsResults);
		
		 
		
 $record['dated']=$os->showDate($record['dated']); 
 $record['title']=stripslashes($record['title']);
 $record['amount']=stripslashes($record['amount']);
 $record['expenseTo']=stripslashes($record['expenseTo']);
 $record['category']=stripslashes($record['category']);
 $record['paymentStatus']=stripslashes($record['paymentStatus']);
 $record['note']=stripslashes($record['note']);

		
		echo  json_encode($record);	 
 
exit();
	
}


if($_GET['WT_expenseDeleteRowById']=='OK')
{ 

$expenseId=$_GET['expenseId'];
 if($expenseId>0){
 $updateQuery="delete from expense where expenseId='$expenseId'";
 $os->mq($updateQuery);
    echo 'Record Deleted Successfully';
 }
 exit();
}
