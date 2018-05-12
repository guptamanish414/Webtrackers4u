<? session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();

if($_GET['appointmentReport']=='OK')
{
//$fromDate1=$_GET['fromDate1'];
//$toDate1=$_GET['toDate1'];
$fromDate1= $os->setNget('fromDate1',$primeryTable);
$toDate1= $os->setNget('toDate1',$primeryTable);
$andappoDate=$os->DateQ('appoDate',$fromDate1,$toDate1,$sTime='00:00:00',$eTime='59:59:59');
 $wheres =" and  appoDate!='0000-00-00 00:00:00'  $andappoDate and duration>0 and  appoStatus!='Cancelled' ";

$listingQuery=" select  DATE_FORMAT(appoDate, '%d-%m-%Y') appoD,  appoType ,count(*) appoC from appo where  memberId>0      group by appoD, appoType ";
$rsmember=$os->mq($listingQuery);
$appoReport=array();
 while($record=$os->mfa( $rsmember))
 {
 
     if($record['appoD']!='' && $record['appoType']!=''){
      $appoReport[$record['appoD']][$record['appoType']]=$record['appoC'];    
	  }
 }
 


function wtDateInterval($fromDate1,$toDate1)  ///  dd-mm-yyyy format
{

global $os;


$begin = new DateTime( $os->saveDate($fromDate1 ));
$end = new DateTime( $os->saveDate($toDate1 ) );
$end = $end->modify( '+1 day' );

$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);

return $daterange;
//foreach($daterange as $date){   echo $date->format("d-m-Y") . "<br>";}


}


$daterange =wtDateInterval($fromDate1,$toDate1) ;
?>
<table class="reportAppo" cellpadding="0" cellspacing="0">
<tr>
 <td>Date</td>
 <?  
  foreach($os->appoType as $atypeK=>$aType)
  {
  ?>
  <td> <? echo  $aType;?></td>
  <? 
  }
 
  ?>
 
 </tr>
<? 
foreach($daterange as $date)
{ 
 $datesK =$date->format("d-m-Y");
 ?>
 <tr>
 <td> <? echo  $datesK;?></td>
 <?  
  foreach($os->appoType as $atypeK=>$aType)
  {
  ?>
  <td style="font-weight:bold;"> <? echo  $appoReport[$datesK][$atypeK]?></td>
  <? 
  }
 
  ?>
   
 
 </tr>
  <? 

 
 
 
 
 }

?>
</table>

<? 

exit(); 
}


if($_GET['propertyViewingReport']=='OK')
{
 

 $wheres ="  and duration>0 and  appoStatus!='Cancelled' ";

 $listingQuery=" select  propertyId , appoType ,count(*) appoC from appo where  memberId>0 and propertyId>0   $wheres      group by propertyId, appoType ";
$rsmember=$os->mq($listingQuery);
$appoReport=array();
 while($record=$os->mfa( $rsmember))
 {
 
     if($record['propertyId']!='' && $record['appoType']!=''){
      $appoReport[$record['propertyId']][$record['appoType']]=$record['appoC'];    
	  }
 }
 
 
$listingQuery=" select  propertyId, title,propCode   from property where  propertyId>0 order by title ";
$rsprop=$os->mq($listingQuery);
 
?>
<table class="reportAppo" cellpadding="0" cellspacing="0">
<tr>
<td>Code</td>
 <td>Property</td>
 <?  
  foreach($os->appoType as $atypeK=>$aType)
  {
  ?>
  <td> <? echo  $aType;?></td>
  <? 
  }
 
  ?>
 
 </tr>
<? 
while($property=$os->mfa($rsprop))
{ 
 $propertyK =$property['propertyId'];
 ?>
 <tr>
  <td> <? echo  $property['propCode'];?></td>
 <td> <a href="javascript:void(0)" onclick="detailsAppoByproperty('<? echo  $property['propertyId'];?>')" ><? echo  $property['title'];?> </a></td>
 <?  
  foreach($os->appoType as $atypeK=>$aType)
  {
  ?>
  <td style="font-weight:bold;"> <? echo  $appoReport[$propertyK][$atypeK]?></td>
  <? 
  }
 
  ?>
   
 
 </tr>
  <? 

 
 
 
 
 }

?>
</table>

<? 

exit(); 
}

 





if($_GET['applicantByBudgetReport']=='OK')
{
$fromBudget=$_GET['fromBudget'];
$toBudget=$_GET['toBudget'];

if($fromBudget>0){ $andMinBudget=" and minBudget>$fromBudget ";}
if($toBudget>0){ $andMaxBudget=" and maxBudget>$toBudget "; $andMaxBudget='';}

 $wheres=" where status!='OTS'  $andMinBudget  $andMaxBudget " ;
 
$listingQuery=" select * from member  $wheres order by code , lastName";
$rsmember=$os->mq($listingQuery);
 $rsmemberCount=mysql_num_rows($rsmember);


?>
<table  border="0" cellspacing="1" cellpadding="1" class=""  >
							<tr class="borderTitle" >
						
								
	<td ><b>Code</b></td>  							
<td ><b>Title</b></td>  
  <td ><b>Surname</b></td>  
  <td ><b>Initial</b></td>  
  <td ><b>Address</b></td>  
   <td ><b>Mobile</b></td>  
    <td ><b>Budget</b></td>  
 
								
							</tr>
							
							
							
							<?php
							  
						 
							while($record=$os->mfa( $rsmember)){ 
							    
								
								
							
							 ?>
							
							
							
							<tr  >
							
		 <td><?php echo $record['code']?> </td>  						
								
 <td><?php echo $record['title']?> </td>  
   <td><?php echo $record['lastName']?> </td> 
  <td><?php echo $record['firstName']?> </td>  
 
  <td><?php echo $record['address']?> </td>  
  <td><?php echo $record['mobile']?> </td>  
    <td>From <b><?php echo $record['minBudget']?></b>    &nbsp; To <b><?php echo $record['maxBudget']?></b> </td>  
  
							 	
					
                        
                     
														
					</tr>
				 
                          <? } ?>  
						
						</table> 
		
		
		
<?php 

exit();
}
 




if($_GET['detailsAppoByproperty']=='OK')
{
 $propertyId=$_GET['propertyId'];
 
 if((int)$propertyId<1){ exit(0);}
 
  $propDetails=$os->get_property(" propertyId='$propertyId' "); 
  $propDetails=$propDetails[0];
   
 $wheres ="  and a.duration>0 and  a.appoStatus!='Cancelled' and  a.propertyId='$propertyId' and a.appoType!='' ";

$listingQuery=" select a.appoType ,a.appoTime ,a.appoDate, m.firstName  ,m.lastName  ,m.address   from appo a , member m  where  a.memberId>0 and a.propertyId>0   $wheres and  a.memberId=m.memberId  ";
$rsmember=$os->mq($listingQuery);
$appoReport=array();
 
	 $rsmemberCount=mysql_num_rows($rsmember);  
?>
<div style="font-size:24px; color:#B0B000"> Code:  <? echo $propDetails['propCode'];  ?>  </div> 
<div style="font-size:18px;">  <? echo $propDetails['title'];  ?>  </div>
<div style="font-size:12px;">  <? echo $propDetails['RoadName'];  ?>  <? echo $propDetails['houseNO'];  ?> </div>
 
<br />
<? if( $rsmemberCount>0){ ?>

<table cellspacing="2" cellpadding="2" >
<tr>  <td ><b>Type</b> </td>   <td ><b> Date</b>  </td>  <td ><b>Time </b> </td> <td ><b>First Name </b> </td><td ><b>Last Name</b>  </td><td ><b>Address </b> </td> </tr>
<?
 while($record=$os->mfa( $rsmember))
 {
  
?>
<tr>  <td ><? echo $record['appoType'];  ?> </td>  <td > <? echo $os->showDate($record['appoDate']);  ?></td>   <td > <? echo $record['appoTime'];  ?> </td>
 <td > <? echo $record['firstName'];  ?> </td> <td > <? echo $record['lastName'];  ?> </td> <td > <? echo $record['address'];  ?> </td>
  </tr>
<?
} 
 ?>
 </table>
 

 <? 
 }else
 {
  
  ?>
  
  <div style="color:#FF0000; padding-top:20px;"> No records found </div>
  
  <? 
 
 }
 
exit(); 
}

if($_GET['searchApplicant']=='OK')
{
$fromBudget=$_GET['fromBudget'];
$status=$_GET['status'];
$bed=$_GET['bed'];
$memberType=$_GET['memberType'];

 

if($fromBudget>0){ $andMinBudget=" and minBudget>$fromBudget ";}
if($toBudget>0){ $andMaxBudget=" and maxBudget>$toBudget "; }

if(trim($status)!=''){ $andstatus=" and status='$status' ";}
if(trim($bed)!=''){ 

if((int)$bed>0){
$andbed=" and bed='$bed'  ";
}else
{
   $andbed=" and requirements like '%$bed%'";

}


}
 if(trim($memberType)!=''){ $andmemberType=" and memberType='$memberType' ";}
 $wheres=" where memberId>0  $andstatus  $andbed  $andmemberType" ;
 
   $listingQuery=" select * from member  $wheres order by code , lastName";
$rsmember=$os->mq($listingQuery);
 $rsmemberCount=mysql_num_rows($rsmember);


?>
<table  border="0" cellspacing="1" cellpadding="1" class="borderTitleTable"  >
							<tr class="borderTitle" >
						
								
	<td ><b>Code</b></td>  				
	<td ><b>Registration</b></td>  							
     <td ><b>Title</b></td>  
     <td ><b>Surname</b></td>  
     <td ><b>Initial</b></td>  
     <td ><b>Address</b></td>  
     <td ><b>Mobile</b></td> 
	 <td ><b>Property <br /> required date</b></td> 
	 <td ><b>status</b></td> 
	  <td ><b>Budget</b></td> 
	 <td ><b>Area</b></td> 
	 <td ><b>Ad+Ch</b></td> 
	 <td ><b>Pets</b></td> 
	 <td ><b>Occupation</b></td> 
	  <td ><b>Ref</b></td> 
    
	 <td ><b>Req. Bed</b></td>  
  

								
							</tr>
							
							
							
							<?php
							  
						 
							while($record=$os->mfa( $rsmember)){ 
							    
								
								
							
							 ?>
							
							
							
							<tr  >
							
		 <td><?php echo $record['code']?> </td>  						
		 <td><?php echo $os->showDate($record['registerDate']);?> </td>  										
 <td><?php echo $record['title']?> </td>  
   <td><?php echo $record['lastName']?> </td>  
  <td><?php echo $record['firstName']?> </td>  
 
  <td><?php echo $record['address']?> </td>  
  <td><?php echo $record['mobile']?> </td>  
  
   <td><?php echo $os->showDate($record['propertyReqDate']);?> </td>  
    <td><?php echo $record['workingStatus']?> </td>  
	 
	  <td><?php echo $record['minBudget']?> to <?php echo $record['maxBudget']?> </td>  
	 <td><?php echo $record['townCity']?> </td>  
	  <td> <?php echo $record['adult']?> + <?php echo $record['child']?> </td>  
	   <td><?php echo $record['pets']?> </td>  
	    <td><?php echo $record['occupation']?> </td>  
		 <td><?php echo $record['reference']?> </td>  
  
    
	 
  <td><?php echo $record['bed']?> </td>  
    
  
							 	
					
                        
                     
														
					</tr>
				 
                          <? } ?>  
						
						</table> 
		
		
		
<?php 

exit();
}
 

 
if($_GET['searchRent']=='OK')
{
$rentMonth=$_GET['rentMonth'];
$rentYear=$_GET['rentYear'];
 



if($rentMonth>0){ $andrentMonth=" and rentMonth=$rentMonth ";}
if($rentYear>0){ $andrentYear=" and rentYear=$rentYear "; }
 
 
 $wheres=" where rentbillId>0  $andrentMonth  $andrentYear " ;
 
 $listingQuery=" select * from rentbill  $wheres order by dueDate asc";
$rsmember=$os->mq($listingQuery);
 $rsmemberCount=mysql_num_rows($rsmember);


?>
<table  border="0" cellspacing="1" cellpadding="1" class="borderTitleTable"  >
							<tr class="borderTitle" >
						 						

								
	<td ><b>Due date</b></td>  				
	<td ><b>Tenant name</b></td>  							
<td ><b>Property</b></td>  
  <td ><b>Rent amount</b></td>  
  <td ><b>Due amount</b></td>  
  <td ><b>payment <br /> Status</b></td>  
  <td ><b>note</b></td>  
    
     
 
								
							</tr>
							
							
							
							<?php
							  
						 
							while($record=$os->mfa( $rsmember)){ 
							    
								
								$agreementReffId=$record['agreementReffId'];
								$ids=$os->getIdsByAgreemenRefeId($agreementReffId);
	  		
			
			$memberId=$ids['memberIdTenant'];
			$rec=$os->get_member(" memberId=$memberId ");
			$memberTenant=$rec[0];
			 
			
			$propertyId=$ids['propertyId'];
			$rec=$os->get_property(" propertyId=$propertyId ");
			$property=$rec[0];
			 
					$billStatus='#DEFEDF';
						if($record['paymentStatus']=='Pending')
						{
						  $billStatus='#FDD9E2';
						}		
							 ?>
							
							   
							
							<tr  >
							
		 <td><?php echo $os->showDate($record['dueDate']);?> </td>  
		  <td><?php echo $memberTenant['firstName']?>  <?php echo $memberTenant['lastName']?> </td>   						
		 <td><?php echo $property['houseNO']?> <?php echo $property['RoadName']?> <?php echo $property['townCity']?></td>  								

   <td><?php echo $record['rentAmount']?> </td> 
   
    <td><?php echo $record['dueAmount']?> </td> 
   
  <td style="background-color:<? echo $billStatus  ?>"><?php echo $record['paymentStatus']?> </td>  
 
  <td><?php echo $record['note']?> </td>  
     
														
					</tr>
				 
                          <? } ?>  
						
						</table> 
		
		
		
<?php 

exit();
}
 
if($_GET['searchLandlord']=='OK')
{
 
$status=$_GET['status'];
 
 

if(trim($status)!=''){ $andstatus=" and status='$status' ";}
 
 
 $wheres=" where memberId>0  $andstatus  " ;
 
 $listingQuery=" select * from member  $wheres order by code , lastName";
$rsmember=$os->mq($listingQuery);
 $rsmemberCount=mysql_num_rows($rsmember);


?>
<table  border="0" cellspacing="1" cellpadding="1" class="borderTitleTable"  >
							<tr class="borderTitle" >
						
								
<td ><b>Code</b></td>  				
<td ><b>Registration</b></td>  							
<td ><b>Title</b></td>  
<td ><b>Surname</b></td>  
<td ><b>Initial</b></td>  
<td ><b>Mobile</b></td>  
<td ><b>Property <br />available date</b></td>  
<td ><b>Address</b></td>  
<td ><b>Sharing</b></td>  
<td ><b>Area</b></td>  
<td ><b>Furnished</b></td>  
<td ><b>Bed</b></td>  
<td ><b>Ref</b></td>  
<td ><b>Bank details</b></td>  
<td ><b>Keys available</b></td>  
<td ><b>Facility</b></td>  

 
								
							</tr>
							
							
							
							<?php
							  
						 
							while($record=$os->mfa( $rsmember)){ 
							    
								$memberId=$record['memberId'];
							 
							 if($memberId>0){
								$propA=$os->get_property(" memberId='$memberId' ");
								$prop=$propA[0];
								}
							
							 ?>
							
							
							
							<tr  >
							
		 <td><?php echo $record['code']?> </td>  						
		 <td><?php echo $os->showDate($record['registerDate']);?> </td>  										
  <td><?php echo $record['title']?> </td>  
   <td><?php echo $record['lastName']?> </td> 
  <td><?php echo $record['firstName']?> </td>  
   <td><?php echo $record['mobile']?> </td>  
   
   
	<td><?php echo $os->showDate($prop['propertyAvlDate']);?> </td>  
	<td><?php echo $prop['houseNO']?> <?php echo $prop['RoadName']?></td>  
	<td><?php echo $prop['sharing']?> </td>  
	<td>  <?php echo $prop['townCity']?> </td>   
	<td><?php echo $prop['furnished']?> </td>  
	<td><?php echo $prop['bed']?> </td>  
	<td><?php echo $prop['reference']?> </td>  
	<td><?php echo $record['bankName']?> <b><?php echo $record['bankAcNo']?></b> <?php echo $record['bankDetails']?> [<b><?php echo $record['sortcode']?></b>]</td>    
	<td><?php echo $prop['availableKeys']?> </td>  
	<td><?php echo $prop['facility']?> </td>  
	 
  
    								
   				
 						
 
   

 
							 	
					
                        
                     
														
					</tr>
				 
                          <? } ?>  
						
						</table> 
		
		
		
<?php 

exit();
}
   
 





if($_GET['inoutBalanceReport']=='OK')
{

//Full texts 	paymentsId 	dated 	title 	amount 	mode 	details 	linkedIdFields 	linkedIdValue 	direction 	note 	
$primeryTable='payment';
//$fromDate1=$_GET['fromDate1'];
//$toDate1=$_GET['toDate1'];
$fromDate1= $os->setNget('fromDate1',$primeryTable);
$toDate1= $os->setNget('toDate1',$primeryTable);
//$andappoDate=$os->DateQ('dated',$fromDate1,$toDate1,$sTime='00:00:00',$eTime='59:59:59');
//echo $andappoDate;
/* 
$listingQuery=" select  DATE_FORMAT(appoDate, '%d-%m-%Y') dated from  payments where linkedIdValue>0 $andappoDate and direction!='' ";
$payments=$os->mq($listingQuery);
while($record=$os->mfa( $payments))
 {
  _d($record);
     
 }
 */
 $listingQuery=" select  * from  payments where linkedIdValue>0 $andappoDate and direction!='' ";
$payments=$os->mq($listingQuery);
while($record=$os->mfa( $payments))
 {
 
  
   $datedShow=$os->showDate($record['dated']);   
   
   $recordsBydate[$datedShow][]  =$record;  
     
 }
 
// DATE_FORMAT(appoDate, '%d-%m-%Y') appoD,

function wtDateInterval($fromDate1,$toDate1)  ///  dd-mm-yyyy format
{

global $os;


$begin = new DateTime( $os->saveDate($fromDate1 ));
$end = new DateTime( $os->saveDate($toDate1 ) );
$end = $end->modify( '+1 day' );

$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);

return $daterange;
//foreach($daterange as $date){   echo $date->format("d-m-Y") . "<br>";}


}


$daterange =wtDateInterval($fromDate1,$toDate1) ;
?>
<table class="borderTitleTable" cellpadding="0" cellspacing="0">
<tr>
 <td>Date</td>
   <td style="color:#009900;">IN</td>
   <td style="color:#FF3300;">OUT</td>
 
 </tr>
<? 

$totalIN=0;
$totalOUT=0;

foreach($daterange as $date)
{ 
 $datesK =$date->format("d-m-Y");
 $record=$recordsBydate[$datesK];
 
 ?>
 <tr>
 <td> <? echo  $datesK;?> </td>
  <td> <? if(is_array( $record)){ ?>
  <table border="0" cellspacing="1">
  <? 
  foreach($record as $rec)
{ 
if($rec['direction']=='IN'){

$totalIN +=$rec['amount'];
?>
<tr>
<td><? echo $rec['title'] ?></td>
<td><? echo $rec['amount'] ?></td>
</tr>
<?
 
  }}
  ?>
  </table>
  <? 
  
  
  }
  
  
  ?> </td> 
  <td> <? if(is_array( $record)){ ?>
  <table border="0" cellspacing="1">
  <? 
  foreach($record as $rec)
{ 
if($rec['direction']=='OUT'){
$totalOUT +=$rec['amount'];
?>
<tr>
<td><? echo $rec['title'] ?></td>
<td><? echo $rec['amount'] ?></td>
</tr>
<?
 
  }}
  ?>
  </table>
  <? 
  
  
  }
  
  
  ?> </td> 
 </tr>
  <? 
 
 
 
 
 
 }

?>

<tr>
 <td>Total</td>
   <td style="font-size:18px; color:#009900; font-weight:bold; text-align:right;"><? echo $totalIN; ?></td>
   <td style="font-size:18px; color:#FF3300; font-weight:bold; text-align:right;"><? echo $totalOUT; ?></td>
 
 </tr>
</table>
<? 

exit(); 
}



