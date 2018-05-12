<?php
	$msg='';
	if($os->isLogin() && isset($_POST['o_submit']) && is_array($_SESSION['imposter-cart']) && count($_SESSION['imposter-cart'])>0){
		$pOption = $_POST['pOption'];
		$saveOrderData = array();
		
		$saveOrderData['orderDate']=$os->convertToDatetime(date('d-m-Y'));
		$saveOrderData['orderCode']=$os->genOrderCode();
		$saveOrderData['customerId']=$os->userDetails['customerId'];
		$saveOrderData['payment']=$pOption;
		$saveOrderData['status']='New Order';
		$saveOrderData['paymentStatus']='Pending';
		
		$saveOrderData['amount']= $_POST['amount'];
		
		$saveOrderData['deliveryCharge']= $_POST['deliveryCharge'];
		
		$saveOrderData['discountPercent']= $_POST['discountPercent'];
		$saveOrderData['discountAmount']= $_POST['discountAmount'];
		$saveOrderData['totalAmount']= $_POST['grandTotal'];
		
		$saveOrderData['couponCode']= $_POST['couponCode'];
		
		$saveOrderData['addedDate']=$os->now();
		$saveOrderData['modifyDate']=$os->now();
		
		$orderId=$os->save('orders',$saveOrderData,'','');
		
		if($orderId>0){
			$total = 0;
			foreach($_SESSION['imposter-cart'] as $key => $value) {
				
				$productId=$_SESSION['imposter-cart'][$key]['id'];
				$product = $os->getMe("SELECT productId,name,code,seoId,ourPrice,status FROM product WHERE productId=$productId");
				$product = $product[0];
				
				$total = $product['ourPrice']*$_SESSION['imposter-cart'][$key]['quantity'];
				
				$saveOrderDtlsData = array();
				$saveOrderDtlsData['orderId']=$orderId;
				$saveOrderDtlsData['productId']=$productId;
				$saveOrderDtlsData['quantity']=$_SESSION['imposter-cart'][$key]['quantity'];
				$saveOrderDtlsData['ourPrice']=$product['ourPrice'];
				$saveOrderDtlsData['amount']=$total;
				$saveOrderDtlsData['totalAmount']=$total;
				
				$saveOrderDtlsData['addedDate']=$os->now();
				$saveOrderDtlsData['modifyDate']=$os->now();
				
				$orderdetailsId=$os->save('orderdetails',$saveOrderDtlsData,'','');
			}
			$adminEmail=$os->getSettings('email'); # get admin email id from settings
			$emailId=$os->userDetails['email'];
			$emailSub = 'admin@webtrackers.co.in: New order placed.';
			$emailFromName = 'admin@webtrackers.co.in';
			$os->startOB();
			?>
            <div style="padding:10px; font-family:Arial, Helvetica, sans-serif;">	
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
        	<td width="10%"><img src="<?php echo $site['themePath'];?>images/accept-icon.png" alt="" border="0" /></td>
            <td width="70%">
            	<div style="font-weight:bold; color:#66AC2D;">
                	Congratulations! You have placed order successfully.
                </div>
                <div style="font-size:12px; color:#525252;">Your purchase is complete and you will get a confirmation email shortly.</div>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
        	<td colspan="2">
            	<div style="font-weight:bold; padding-top:10px; color:#333; font-size:14px;">Your Order No : <?php echo $saveOrderData['orderCode'];?></div>
                <div style="font-size:12px; color:#666;">Order placed on : <?php echo $os->now();?></div>
            </td>
             <td>&nbsp;</td>
        </tr>
    </table>
    
  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:5px; border-top:1px solid #999;border-right:1px solid #999; font-size:12px; color:#202020;">
    	<tr style="font-weight:bold; font-size:13px; background:#EBEBEB; color:#666; text-align:center;">
        	<td height="35" width="5%" style="border-left:1px solid #999;border-bottom:1px solid #999;">S.no</td>
            <td width="45%" style="border-left:1px solid #999;border-bottom:1px solid #999;">Product Name</td>
            <td style="border-left:1px solid #999;border-bottom:1px solid #999;">Unit Price</td>
            <td style="border-left:1px solid #999;border-bottom:1px solid #999;">Quantity</td>
            <td style="border-left:1px solid #999;border-bottom:1px solid #999;">Price</td>
        </tr>
        <?php
			$total = 0;
			$cnt=0;
        	foreach($_SESSION['imposter-cart'] as $key => $value) {
			$cnt++;
				$productId=$_SESSION['imposter-cart'][$key]['id'];
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
				
				$total = $product['ourPrice']*$_SESSION['imposter-cart'][$key]['quantity'];
		?>
        <tr>
        	<td height="30" style="border-left:1px solid #999;border-bottom:1px solid #999;"><?php echo $cnt;?></td>
            <td style="border-left:1px solid #999;border-bottom:1px solid #999; text-align:left; padding-left:5px;">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" >
            <tr>
            	<td width="45"><img src="<?php echo $img;?>" title="<?php echo $imgTitle;?>" alt="Img" border="0" width="35" height="50" /></td>
                <td style="text-align:left;"><?php echo $product['name'];?></td>
                </tr>
               </table> 
            </td>
            <td style="border-left:1px solid #999;border-bottom:1px solid #999; text-align:center;"><?php echo $product['ourPrice'];?></td>
            <td style="border-left:1px solid #999;border-bottom:1px solid #999; text-align:center;"><?php echo $_SESSION['imposter-cart'][$key]['quantity'];?></td>
            <td style="border-left:1px solid #999;border-bottom:1px solid #999; text-align:right; padding-right:5px;"><?php echo number_format($total,2);?></td>
        </tr>
        
        <?php }?>
        
        <tr>
        	<td colspan="3" rowspan="4" valign="top" style="border-left:1px solid #999;border-bottom:1px solid #999;">
            <div style="padding:5px;">
            	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td width="48%" valign="top">
                        	<div style="font-weight:bold;">Customer Information</div>
                            <div style="color:#3F3F3F;"><?php echo $os->userDetails['name'];?></div>
                           <div style="color:#3F3F3F;">Email: <?php echo $os->userDetails['email'];?></div>
                           <div style="color:#3F3F3F;">Mobile: <?php echo $os->userDetails['phone'];?></div>
                        </td>
                        <td width="2%"></td>
                        <td width="48%" valign="top">
                        	<div style="font-weight:bold;">Shipping Information</div>
                             <div style="color:#3F3F3F;"><?php echo $os->userDetails['name'];?></div>
                              <div style="color:#3F3F3F;"><?php echo nl2br($os->userDetails['address']);?></div>
                        </td>
                    </tr>
                </table>
            </div>    
            </td>
            <td align="center" style="border-left:1px solid #999;border-bottom:1px solid #999; height:25px;"><b>Sub Total</b></td>
            <td style="text-align:right; padding-right:5px;border-left:1px solid #999;border-bottom:1px solid #999;""><?php echo number_format($saveOrderData['amount'],2);?></td>
        </tr>
         <tr>
        	
            <td align="center" style="border-left:1px solid #999;border-bottom:1px solid #999;height:25px;"><b>Discount</b></td>
            <td style="text-align:right; padding-right:5px;border-left:1px solid #999;border-bottom:1px solid #999;""><?php echo number_format($saveOrderData['discountAmount'],2);?></td>
        </tr>
         <tr>
        	
             <td align="center" style="border-left:1px solid #999;border-bottom:1px solid #999;height:25px;"><b>Delivery Charge</b></td>
            <td style="text-align:right; padding-right:5px;border-left:1px solid #999;border-bottom:1px solid #999;""><?php echo number_format($saveOrderData['deliveryCharge'],2);?></td>
        </tr>
        
         <tr>
        	
             <td align="center" style="border-left:1px solid #999;border-bottom:1px solid #999;height:25px;"><b>Total Amount</b></td>
            <td style="text-align:right; padding-right:5px;border-left:1px solid #999;border-bottom:1px solid #999;""><b><?php echo number_format($saveOrderData['totalAmount'],2);?></b></td>
        </tr>
        
    </table>
</div>
            <?php
			$emailBody=$os->getOB();			
			if($adminEmail!='' && $emailId!=''){
				$emailSubAdmin='New Order Amount: R.S - '.number_format($saveOrderData['totalAmount']).' Date: '.date('d-m-Y');
				$os->emailSend($adminEmail,$emailId,$emailFromName,$emailSubAdmin,$emailBody);
				$os->emailSend($emailId,$adminEmail,$emailFromName,$emailSub,$emailBody);
				$msg=$emailBody;
				unset($_SESSION['imposter-cart']);
				unset($_SESSION['Imposter_Coupon']);		
			}			
		}
		else{$msg='<div style="padding:10px;color:#F00; font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Something wrong. please try again.</div>';}
		
		
	}
	echo $msg.'<div><a style="color: #A4A4A4;font-size: 12px;font-weight: normal;text-decoration: none;" href="'.$site['url'].'">&#8592 Return To Shop</a></div>';	
?>