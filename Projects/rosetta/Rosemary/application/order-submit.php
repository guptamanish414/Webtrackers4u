<?php
	$msg='';
	if($os->isLogin() && isset($_POST['o_submit']) && is_array($_SESSION['rosette-cart']) && count($_SESSION['rosette-cart'])>0){
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
		
		//$saveOrderData['discountPercent']= $_POST['discountPercent'];
		//$saveOrderData['discountAmount']= $_POST['discountAmount'];
		$saveOrderData['totalAmount']= $_POST['grandTotal'];
		
		//$saveOrderData['couponCode']= $_POST['couponCode'];
		
		$saveOrderData['addedDate']=$os->now();
		$saveOrderData['modifyDate']=$os->now();
		
		$orderId=$os->save('orders',$saveOrderData,'','');
		
		if($orderId>0){
			$total = 0;
			foreach($_SESSION['rosette-cart'] as $key => $value) {
				
				$productId=$_SESSION['rosette-cart'][$key]['id'];
				$product = $os->getMe("SELECT productId,name,code,seoId,ourPrice,status FROM product WHERE productId=$productId");
				$product = $product[0];
				
				$total = $product['ourPrice']*$_SESSION['rosette-cart'][$key]['quantity'];
				
				$saveOrderDtlsData = array();
				$saveOrderDtlsData['orderId']=$orderId;
				$saveOrderDtlsData['productId']=$productId;
				$saveOrderDtlsData['quantity']=$_SESSION['rosette-cart'][$key]['quantity'];
				$saveOrderDtlsData['ourPrice']=$product['ourPrice'];
				$saveOrderDtlsData['amount']=$total;
				$saveOrderDtlsData['totalAmount']=$total;
				
				$saveOrderDtlsData['addedDate']=$os->now();
				$saveOrderDtlsData['modifyDate']=$os->now();
				
				$orderdetailsId=$os->save('orderdetails',$saveOrderDtlsData,'','');
			}
			$adminEmail=$os->getSettings('email'); # get admin email id from settings
			$emailId=$os->userDetails['email'];
			$emailSub = 'rosette: New order placed.';
			$emailFromName = 'rosette';
			$os->startOB();
			?>
           
            
            <div class="oder_submit">
            	 <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="20%"><img src="<?php echo $site['themePath'];?>images/success.png" alt="" border="0" /></td>
                    <td width="80%" align="center">
                        <h2 class="success_text">Congratulations! You have placed order successfully.</h2>
                        <h5 class="sub_tex">Your purchase is complete and you will get a confirmation email shortly.</h5>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4 class="oder_no">Your Order No : <?php echo $saveOrderData['orderCode'];?></h4>
                        <p>Order placed on : <?php echo $os->now();?></p>
                    </td>
                     <td>&nbsp;</td>
                </tr>
              </table>
              	
                <div class="table-responsive">
                	<table class="table table-bordered">
                    <tr>
                        <th height="35" width="5%" >S.no</td>
                        <th width="45%" >Product Name</td>
                        <th>Unit Price</td>
                        <th >Quantity</td>
                        <th>Price</td>
                    </tr>
                <?php
                    $total = 0;
                    $cnt=0;
                    foreach($_SESSION['rosette-cart'] as $key => $value) {
                    $cnt++;
                        $productId=$_SESSION['rosette-cart'][$key]['id'];
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
                        
                        $total = $product['ourPrice']*$_SESSION['rosette-cart'][$key]['quantity'];
                ?>
                <tr>
                    <td height="30" ><?php echo $cnt;?></td>
                    <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                    <tr>
                        <td width="45"><img src="<?php echo $img;?>" title="<?php echo $imgTitle;?>" alt="Img" border="0" width="35" height="50" /></td>
                        <td style="text-align:left;"><?php echo $product['name'];?></td>
                        </tr>
                       </table> 
                    </td>
                    <td ><? echo $os->currency?><?php echo $product['ourPrice'];?></td>
                    <td><?php echo $_SESSION['rosette-cart'][$key]['quantity'];?></td>
                    <td ><? echo $os->currency?><?php echo number_format($total,2);?></td>
                </tr>
                
                <?php }?>
                
                <tr>
                    <td colspan="3" rowspan="4" valign="top" >
                    <div style="padding:5px;">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="48%" valign="top">
                                    <h4>Customer Information</h4>
                                    <p><?php echo $os->userDetails['name'];?></p>
                                   <p>Email: <?php echo $os->userDetails['email'];?></p>
                                   <p>Mobile: <?php echo $os->userDetails['phone'];?></p>
                                </td>
                                <td width="2%"></td>
                                <td width="48%" valign="top">
                                    <h4>Shipping Information</h4>
                                     <p><?php echo $os->userDetails['name'];?></p>
                                     <p><?php echo nl2br($os->userDetails['address']);?></p>
                                </td>
                            </tr>
                        </table>
                    </div>    
                    </td>
                    <td align="center"><b>Sub Total</b></td>
                    <td><? echo $os->currency?><?php echo number_format($saveOrderData['amount'],2);?></td>
                </tr>
                 <tr>
                    
                    <td align="center"><b>Discount</b></td>
                    <td ><? echo $os->currency?><?php echo number_format($saveOrderData['discountAmount'],2);?></td>
                </tr>
                 <tr>
                    
                     <td align="center"><b>Delivery Charge</b></td>
                    <td><? echo $os->currency?><?php echo number_format($saveOrderData['deliveryCharge'],2);?></td>
                </tr>
                
                 <tr>
                    
                     <td align="center" ><b>Total Amount</b></td>
                    <td><b><? echo $os->currency?><?php echo number_format($saveOrderData['totalAmount'],2);?></b></td>
                </tr>
            </table>
                </div>
            </div>
            <?php
			$emailBody=$os->getOB();			
			if($adminEmail!='' && $emailId!=''){
				$emailSubAdmin='New Order Amount: R.S - '.$os->currency.number_format($saveOrderData['totalAmount']).' Date: '.date('d-m-Y');
				$os->emailSend($adminEmail,$emailId,$emailFromName,$emailSubAdmin,$emailBody);
				$os->emailSend($emailId,$adminEmail,$emailFromName,$emailSub,$emailBody);
				$msg=$emailBody;
				unset($_SESSION['rosette-cart']);
				unset($_SESSION['rosette_Coupon']);		
			}			
		}
		else{$msg='<div style="padding:10px;color:#F00; font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Something wrong. please try again.</div>';}
		
		
	}
	echo $msg.'<div><a class="btn btn-primary" href="'.$site['url'].'">&#8592 Return To Shop</a></div>';	
?>
<p></p>