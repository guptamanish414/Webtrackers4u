<?php
session_start();
include('../includes/config.php');
include('coomon.php');

?>
<?php if($os->isLogin()){$dealerId=$os->userDetails['customerId'];?>
<style>
	.s_iframe_tbl{ font-family:Arial, Helvetica, sans-serif; font-size:12px; border-top:1px solid #CCCCCC;border-right:1px solid #CCCCCC;}
	.s_iframe_tbl td{ height:20px; padding:2px;border-left:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC; text-align:center;}
</style>
<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="s_iframe_tbl">
  <tr style="background:#414141; color:#FFFFFF; font-weight:bold;">
    <td>Sl.</td>
    <td>Order Code</td>
    <td>Date</td>
	<td>Customer</td>
    <td>Product</td>
	<td>Price</td>
	<td>Qty</td>	
    <td>Total</td>
    <td>Status</td>
	<td>Payment</td>
  </tr>
  <?php
	$s_orderCode=varG('s_orderCode');
	$s_form=varG('s_form');
	$s_to=varG('s_to');
	$s_status=varG('s_status');
	$s_payment=varG('s_payment');
	$s_product=varG('s_product');		
  	
	
	$s_paymentWhr='';
	if($s_payment!=''){
		$s_paymentIds=$os->getMe("SELECT GROUP_CONCAT(orderId) AS s_paymentIds FROM orders WHERE paymentStatus='$s_payment'");
		if(is_array($s_paymentIds) && count($s_paymentIds)>0){$s_paymentIds=$s_paymentIds[0]['s_paymentIds'];}
  		if($s_paymentIds!=''){$s_paymentWhr=" AND orderId IN($s_paymentIds)";}else{$s_paymentWhr=" AND orderId=0";}
	}
	
	#
	$s_statusWhr='';
	if($s_status!=''){
		$s_statusIds=$os->getMe("SELECT GROUP_CONCAT(orderId) AS s_statusIds FROM orders WHERE status='$s_status'");
		if(is_array($s_statusIds) && count($s_statusIds)>0){$s_statusIds=$s_statusIds[0]['s_statusIds'];}
  		if($s_statusIds!=''){$s_statusWhr=" AND orderId IN($s_statusIds)";}else{$s_statusWhr=" AND orderId=0";}
	}
	
	
	#
	$s_orderCodeWhr='';
	if($s_orderCode!=''){
		$s_orderCodeIds=$os->getMe("SELECT GROUP_CONCAT(orderId) AS s_orderCodeIds FROM orders WHERE orderCode='$s_orderCode'");
		if(is_array($s_orderCodeIds) && count($s_orderCodeIds)>0){$s_orderCodeIds=$s_orderCodeIds[0]['s_orderCodeIds'];}
  		if($s_orderCodeIds!=''){$s_orderCodeWhr=" AND orderId IN($s_orderCodeIds)";}else{$s_orderCodeWhr=" AND orderId=0";}
	}
	
	
	#
	$s_productWhr='';
	if($s_product!=''){$s_productWhr="AND productId=$s_product";}
	
	$s_dateWhr='';
	if($s_form!='' || $s_to!=''){
		$andodate=$os->DateQ('orderDate',$s_form,$s_to,$sTime='00:00:00',$eTime='59:59:59');
		$s_dateIds=$os->getMe("SELECT GROUP_CONCAT(orderId) AS s_dateIds FROM orders WHERE orderId>0 $andodate");
		if(is_array($s_dateIds) && count($s_dateIds)>0){$s_dateIds=$s_dateIds[0]['s_dateIds'];}
  		if($s_dateIds!=''){$s_dateWhr=" AND orderId IN($s_dateIds)";}else{$s_dateWhr=" AND orderId=0";}
	}
	
	
  
  ####################################################################################################################################################################
	  $dPWhr='';
	  $pids=$os->getMe("SELECT GROUP_CONCAT(productId) AS pids FROM product WHERE dealerId=$dealerId");
	  if(is_array($pids) && count($pids)>0){$pids=$pids[0]['pids'];}
	  if($pids!=''){$dPWhr=" AND productId IN($pids)";}else{$dPWhr=" AND productId=0";}
  
  $q="SELECT * FROM orderdetails WHERE orderdetailsId>0 $dPWhr $s_productWhr $s_paymentWhr $s_statusWhr $s_orderCodeWhr $s_dateWhr ORDER BY orderId DESC"; 
  $rs = $os->mq($q);
  $i=0;
  while($row=$os->mfa($rs)){
   $i++;
   $orderId = $row['orderId'];
   $odtls=$os->getMe("SELECT * FROM orders WHERE orderId=$orderId");
   if(is_array($odtls)){
   	$customerId = $odtls[0]['customerId'];
	$cDtls=$os->getMe("SELECT * FROM customer WHERE customerId=$customerId");
   }
   $productId=$row['productId'];
   $pDtls=$os->getMe("SELECT name FROM product WHERE productId=$productId");
  ?>
  <tr>
    <td><?php echo $i;?>&nbsp;</td>
    <td><?php if(is_array($odtls)){echo $odtls[0]['orderCode'];}?>&nbsp;</td>
    <td><?php if(is_array($odtls)){echo $os->viewDate($odtls[0]['orderDate']);}?>&nbsp;</td>
	 <td><?php if(is_array($cDtls)){echo $cDtls[0]['name'];}?>&nbsp;</td>
    <td><?php if(is_array($pDtls)){echo $pDtls[0]['name'];}?>&nbsp;</td>
	 <td><?php echo $row['ourPrice'];?>&nbsp;</td>
    <td><?php echo $row['quantity'];?>&nbsp;</td>
    <td><?php echo $row['totalAmount'];?>&nbsp;</td>
    <td><?php if(is_array($odtls)){echo $odtls[0]['status'];}?>&nbsp;</td>
	 <td><?php if(is_array($odtls)){echo $odtls[0]['paymentStatus'];}?>&nbsp;</td>
  </tr>
  <?php }?>
</table>

</div>
<?php }?>