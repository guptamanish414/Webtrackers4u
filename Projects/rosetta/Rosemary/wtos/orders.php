<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='ordersEdit';
$listPAGE='orders';
$primeryTable='orders';
$primeryField='orderId';
$listHeader='Order List ';

 
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
		
		
 $dataToSave['orderCode']=varP('orderCode'); 
 $dataToSave['customerId']=varP('customerId'); 
 $dataToSave['status']=varP('status');
 
 $dataToSave['paymentStatus']=varP('paymentStatus'); 
 
 $dataToSave['note']=varP('note'); 
 $dataToSave['deliveryCharge']=varP('deliveryCharge'); 
 $dataToSave['deliveryDate']=$os->saveDate(varP('deliveryDate')); 
 $dataToSave['orderDate']=$os->saveDate(varP('orderDate')); 
 $dataToSave['amount']=varP('amount'); 
 $dataToSave['discountPercent']=varP('discountPercent'); 
 $dataToSave['discountAmount']=varP('discountAmount'); 
 $dataToSave['totalAmount']=varP('totalAmount'); 

		 
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

 
$andorderCodeA=  $os->andField('orderCode','orderCode',$primeryTable,'=');
   $orderCode=$andorderCodeA['value']; $andorderCode=$andorderCodeA['andField'];	 
$andcustomerIdA=  $os->andField('customerId','customerId',$primeryTable,'=');
   $customerId=$andcustomerIdA['value']; $andcustomerId=$andcustomerIdA['andField'];	 
$andnoteA=  $os->andField('note','note',$primeryTable,'%');
   $note=$andnoteA['value']; $andnote=$andnoteA['andField'];	 

    $f_orderDate= $os->setNget('f_orderDate',$primeryTable);
	$t_orderDate= $os->setNget('t_orderDate',$primeryTable);
   $andorderDate=$os->DateQ('orderDate',$f_orderDate,$t_orderDate,$sTime='00:00:00',$eTime='59:59:59');
   
   $andstatusA=  $os->andField('status','status',$primeryTable,'=');
  $status=$andstatusA['value']; $andstatus=$andstatusA['andField'];	
  
  
  $andpaymentStatusA=  $os->andField('paymentStatus','paymentStatus',$primeryTable,'=');
  $paymentStatus=$andpaymentStatusA['value']; $andpaymentStatus=$andpaymentStatusA['andField'];	
  
  
   
   $customerName = varG('customerName');
   $cNameWhr='';
   
   if($customerName!=''){
	   $cIds='';	   
	   $cIdsA = $os->getMe("SELECT GROUP_CONCAT(customerId) AS cIds FROM customer WHERE name LIKE '%$customerName%'");
	   if(is_array($cIdsA) && count($cIdsA)>0){$cIds=$cIdsA[0]['cIds'];}
	   if($cIds!=''){$cNameWhr=" AND customerId IN($cIds)";}else{$cNameWhr=" AND customerId<0";}
   }
   
$listingQuery=" select * from $primeryTable where $primeryField>0   $andorderCode  $andcustomerId  $andnote  $andorderDate $andstatus $andpaymentStatus  $cNameWhr  $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......

$orderStatusColors =  array('New Order'=>'BBE9FF','Processing'=>'FFFFC6','Delivered'=>'9BFF9B','Not Delivered'=>'FF8282','Cancelled'=>'FF8282','Returned'=>'FF8282');
$orderPymntStatusColors = array('Received'=>'9BFF9B','Pending'=>'FF8282','Refunded'=>'FFFFC6');

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
	<style>
		.scrHeading{ float:left; width:100px; margin:5px 0px 0px 0px; padding:5px 0px 0px 0px; height:20px;}
		
		.scrField{float:left; width:130px; margin:5px 0px 0px 0px; padding:0px 0px 0px 0px; height:25px;}
		
		.scrButtonDiv{ float:left;padding-top:10px}
		
		.SelectBox{ width:102px;}
		
	</style>
    
    <div class="scrHeading">Order Code:</div>
	<div class="scrField"><input type="text" name="orderCode" id="orderCode" value="<?php echo $orderCode?>" style="width:100px;" />&nbsp;</div>
    
     <div class="scrHeading">Customer:</div>
	<div class="scrField">
    <select name="customerId" id="customerId" class="SelectBox" ><option value="">All</option>
	<?php $os->optionsHTML($customerId,'customerId','name','customer','','name ASC','');?>
    </select>&nbsp;
    </div>
    
    <div class="scrHeading">Note:</div>
	<div class="scrField"><input type="text" name="note" id="note" value="<?php echo $note?>" style="width:100px;" />&nbsp;</div>
    
     <div class="scrHeading">From Date:</div>
	<div class="scrField"><input class="dtpk" type="text" name="f_orderDate" id="f_orderDate" value="<?php echo $f_orderDate?>" style="width:100px;" />&nbsp;</div>
    
    <div class="scrHeading">To Date:</div>
	<div class="scrField"><input class="dtpk" type="text" name="t_orderDate" id="t_orderDate" value="<?php echo $t_orderDate?>" style="width:100px;" />&nbsp;</div>
    
    <div class="scrHeading">Status:</div>
	<div class="scrField">
     <select id="status"  name="status" class="SelectBox">	
		<option value="">All</option>									
		<?php $os->onlyOption($os->orderStatus,$status);?>
	</select>
    </div>

    <div class="scrHeading">Payment Status:</div>
	<div class="scrField">
     <select id="paymentStatus"  name="paymentStatus" class="SelectBox">	
		<option value="">All</option>									
		<?php $os->onlyOption($os->paymentStatus_order,$paymentStatus);?>
	</select>
    </div>
    
     <div class="scrHeading">Customer Name:</div>
	<div class="scrField"><input type="text" name="customerName" id="customerName" value="<?php echo $customerName?>" style="width:100px;" />&nbsp;</div>
      
    <div class="scrButtonDiv">	
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>&nbsp;
	<a class="searchReset" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	</div>

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
								
								
<td ><b>Order </b></td>  
  <td style="width:300px;" ><b>Customer</b></td>  
 
 
  <td ><b>Amount</b></td> 
    
  
  <td ><b>Discount</b></td>  
  <td ><b>Total<br />Amount</b></td> 
  <td ><b>Note</b></td>  
   <td ><b>Delivery<br />Date</b></td>  
  <td ><b>Status</b></td>
   <td ><b>Payment<br />Status</b></td>    
								
								 
								
                                
								
								
								<td >Action </td>
								
							</tr>
							
							
							
							
							
							<?php
							 $c=1;
							 $i=$os->slNo();
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
								$cId=$record['customerId'];
								$cDtls = $os->getMe("SELECT name,phone,email,shippingAddress FROM customer WHERE customerId=$cId");
							 ?>
							
							<tr class="border" id="selected<?php echo $c;?>" onclick="trSelected('<?php echo $c;?>','<?php echo  count($records);?>');"   onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								
								
<td>
<b>Date: <?php echo $os->viewDate($record['orderDate']);?> </b><br />

Code: <?php echo $record['orderCode']?> &nbsp;</td>  
  <td style="text-align:left;">
  <?php if(is_array($cDtls) && count($cDtls)>0){$cDtls=$cDtls[0];?>
  <b><?php echo $cDtls['name'];?></b>
  <div style="font-size:10px; color:#383838;">
  	 M: <?php echo $cDtls['phone'];?> &nbsp;E: <?php echo $cDtls['email'];?> <br />
        Ship Address: <?php echo  str_replace(array('\n',"\n"),', ',$cDtls['shippingAddress']);?> 
  </div>
   <?php }?>
  </td> 
  
 
 
 
 
  <td><?php echo $record['amount']?> </td> 
  <!-- <td><?php  echo $record['deliveryCharge']?> </td>-->
  <td> <b> <?php echo $record['discountAmount']?></b><br />
  	<?php if($record['discountPercent']>0); ?>
	<span style="font-size:10px; font-style:italic; color:#737373;">  
	<? 	{echo '@'.$record['discountPercent'].'%';}?> <br /> <font style="color:#E800E8"> <?php echo $record['couponCode']?></font>
	</span>
   </td>  
  <td style="text-align:right"> <b><?php echo $record['totalAmount']?> </b>&nbsp;</td>  
   <td><?php echo $record['note']?> </td>  
  <td><?php echo $os->viewDate($record['deliveryDate']);?> </td>
	 <td><?php $os->changeStatusDD($os->orderStatus,$record['status'],'orders','status','orderId',$DivIds['EDITID'],$orderStatusColors); ?></td> 						 	
<td><?php $os->changeStatusDD($os->paymentStatus_order,$record['paymentStatus'],'orders','paymentStatus','orderId',$DivIds['EDITID'],$orderPymntStatusColors); ?></td>   						
						  <td class="actionLink" style="width:105px;">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
<a class="viewButton" href="javascript:void(0)" onclick="popUpWindow('orderdetails.php?hideTopLeft=1&orderId=<?php echo  $DivIds['EDITID'];?>', 50, 50, 750, 250)">Dtls</a>
						
						
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
	 
	   
 var orderCodeV= os.getVal('orderCode'); 
 var customerIdV= os.getVal('customerId'); 
 var noteV= os.getVal('note'); 
 var f_orderDateV= os.getVal('f_orderDate'); 
 var t_orderDateV= os.getVal('t_orderDate'); 
  var statusV= os.getVal('status');
  
  
   var paymentStatus= os.getVal('paymentStatus');
    var customerName= os.getVal('customerName');
  
       
  
   
window.location='<?php echo $listPAGEUrl; ?>orderCode='+orderCodeV +'&customerId='+customerIdV +'&note='+noteV +'&f_orderDate='+f_orderDateV +'&t_orderDate='+t_orderDateV +'&status='+statusV+'&paymentStatus='+paymentStatus+'&customerName='+customerName+'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>orderCode=&customerId=&note=&f_orderDate=&t_orderDate=&status=&paymentStatus=&customerName=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>