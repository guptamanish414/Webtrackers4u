<div style="margin-top:10px;">
<style>
	
	.os_tbl{ font-size:13px; border-top:1px solid #CCC;border-right:1px solid #CCC;}
	.os_tbl td{ padding:2px; border-left:1px solid #CCC;border-bottom:1px solid #CCC; text-align:center; height:20px;}
</style>
<?php if($os->isLogin()){?>
<?php
	$customerId = $os->userDetails['customerId'];
	$q="SELECT * FROM orders WHERE customerId=$customerId";
	$rs=$os->mq($q);
?>
<?php
	$i=0;
	while($row=$os->mfa($rs)){
	$orderId = 	$row['orderId'];
	$i++;
?>
<div style="margin-top:5px; background:#FFF; font-family:Arial, Helvetica, sans-serif; font-size:13px; padding:5px;">
	<div style="font-size:16px; font-weight:bold; color:#007BB7;  margin-bottom:5px;">Order details</div>
	<div style="margin-bottom:5px;">Date: <?php echo $os->viewDate($row['orderDate']);?></div>
    <div style="margin-bottom:5px;">Order Code: <?php echo $row['orderCode'];?></div>
    <div style="margin-bottom:5px;">Order Status: <?php echo $row['status'];?></div>
    <div style="font-size:16px; font-weight:bold; color:#007BB7; margin-bottom:5px;">Product details</div>
    <?php
    	$oDtls=$os->getMe("SELECT * FROM orderdetails WHERE orderId=$orderId");
		if(is_array($oDtls) && count($oDtls)>0){		
	?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="os_tbl">
        <tr>
        	<td>&nbsp;</td>
        	<td>Product</td>
       	 	<td>Unit Price</td>
        	<td>Qty</td>
        	<td>Price</td>
        </tr>
     
    <?php 
	foreach($oDtls as $v){
		$productId=$v['productId'];	
		$product = $os->getMe("SELECT productId,name,code,seoId,ourPrice,status FROM product WHERE productId=$productId");
				$product = $product[0];
				
				$noImg = $site['url'].'wtos-images/product/thumb_59x50/no_image_product.png';
				$img='';$imgTitle='';$imgName='';
				$imgA = $os->getMe("SELECT title,image FROM image WHERE imageType='Product' AND imageTypeId=$productId AND featured='Yes' AND active=1 LIMIT 1");
				if(is_array($imgA) && count($imgA)>0){$imgA=$imgA[0];$imgName = str_replace('wtos-images/product/','',$imgA['image']);$imgTitle=$imgA['title'];}
				if($imgName!='' && file_exists($site['imgPath'].'wtos-images/product/thumb_59x50/'.$imgName)){
				$img=$site['url'].'wtos-images/product/thumb_59x50/'.$imgName;
				}
				
				$imgTitle=($imgTitle!='')?$imgTitle:$product['name'];
				$img=($img!='')?$img:$noImg;	
	?>
        <tr>
        	<td><img src="<?php echo $img;?>" title="<?php echo $imgTitle;?>" alt="Img" border="0" width="35" height="50" /></td>
            <td><?php echo $product['name'];?></td>
            <td><?php echo $v['ourPrice'];?></td>
            <td><?php echo $v['quantity'];?></td>
            <td style="text-align:right; padding-right:5px;"><?php echo $v['totalAmount'];?></td>
        </tr>
    <?php }?>
    <tr>
    	<td colspan="3">&nbsp;</td>
        <td style="text-align:right; padding-right:5px;"><b>Sub Total</b></td>
        <td style="text-align:right; padding-right:5px;"><?php echo number_format($row['amount'],2);?></td>
    </tr>
     <tr>
    	<td colspan="3">&nbsp;</td>
        <td style="text-align:right; padding-right:5px;"><b>Discount</b></td>
        <td style="text-align:right; padding-right:5px;"><?php echo number_format($row['discountAmount'],2);?></td>
    </tr>
     <tr>
    	<td colspan="3">&nbsp;</td>
        <td style="text-align:right; padding-right:5px;"><b>Delivery Charge</b></td>
        <td style="text-align:right; padding-right:5px;"><?php echo number_format($row['deliveryCharge'],2);?></td>
    </tr>
     <tr>
    	<td colspan="3">&nbsp;</td>
        <td style="text-align:right; padding-right:5px;"><b>Total Amount</b></td>
        <td style="text-align:right; padding-right:5px;"><b><?php echo number_format($row['totalAmount'],2);?></b></td>
    </tr>
    </table>
    <?php }?>
</div>

<?php }?>	

<?php }else{?>
<div class="pleaseLogin">Please log in</div>
<?php }?>
</div>