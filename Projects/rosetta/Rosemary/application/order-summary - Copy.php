<div style="padding-top:10px;">
<?php if($os->isLogin() && is_array($_SESSION['imposter-cart']) && count($_SESSION['imposter-cart'])>0){$cD = $os->userDetails;$cId=$cD['customerId'];?>
<style>
	.os_head{ font-size:18px; color:#007CF9; font-family: 'BebasNeueRegular';}
	.os_cdtls b{ color:#666;}
	.os_tbl{ font-size:14px; border-top:1px solid #CCC;border-right:1px solid #CCC;}
	.os_tbl td{ padding:2px; border-left:1px solid #CCC;border-bottom:1px solid #CCC; text-align:center;}
</style>
<div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    	<td width="40%" valign="top">
        	<div class="os_head">Customer Details</div>
           
            <div class="os_cdtls" style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">
            	<b>Name:</b> <?php echo $cD['name'];?><br />
                <b>Phone:</b> <?php echo $cD['phone'];?><br />
                 <b>Email:</b> <?php echo $cD['email'];?><br />
                <b>Shipping Address:</b><br />
                <div style="text-align:justify;">
               <?php echo stripslashes(nl2br($cD['shippingAddress']));?>
                </div>
            </div>
        </td>
        <td>&nbsp;</td>
   		<td width="58%" valign="top">
        	<div class="os_head">Order Details</div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="os_tbl">
            <tr>
            <td>&nbsp;</td>
            <td>Product</td>
            <td>Unit Price</td>
            <td>Qty</td>
            <td>Price</td>
            </tr>
            <?php
				$grandTotal = 0;$total = 0;	$deliveryCharge=0;
				
				foreach($_SESSION['imposter-cart'] as $key => $value) {
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
				$grandTotal+=$total;
			?>

            <tr>
            <td><img src="<?php echo $img;?>" title="<?php echo $imgTitle;?>" alt="Img" border="0" width="35" height="50" /></td>
         	<td><a class="scpname"><?php echo $product['name'];?></a></td>
			<td><? echo $os->currency?><?php echo $product['ourPrice'];?></td>
			<td><?php echo $_SESSION['imposter-cart'][$key]['quantity'];?></td>
			<td>Rs.<?php echo number_format($total,2);?></td>
            </tr>
          
            <?php }?>
            
            <?php
				$cCode='';
				$discount=0;$disper=0;
				$cText='';$totAmnt=$grandTotal;
            	if(is_array($_SESSION['Imposter_Coupon']) && count($_SESSION['Imposter_Coupon'])>0){
					$cCode=	$_SESSION['Imposter_Coupon']['code'];		
				if($_SESSION['Imposter_Coupon']['couponType']=='Percentage'){
					$discount = $totAmnt*$_SESSION['Imposter_Coupon']['discount']/100;
					$cText='Coupon code:  <font style="color:#0080FF;">'.$_SESSION['Imposter_Coupon']['code'].' </font> ,'.$_SESSION['Imposter_Coupon']['discount'].'% discount';
					$disper=$_SESSION['Imposter_Coupon']['discount'];
				}
				else{
					$discount = $_SESSION['Imposter_Coupon']['discount'];
					$cText='Coupon code: <font style="color:#0080FF;">'.$_SESSION['Imposter_Coupon']['code'].' </font> , Rs. '.$_SESSION['Imposter_Coupon']['discount'].'discount';
				}
				$grandTotal = $grandTotal-$discount;
				
			?>
            <tr>
            <td colspan="3">
            	<?php echo $cText;?>
            </td>
            <td style="text-align:right; padding-right:5px;"><b>Discount</b></td> 
            <td>Rs.<?php echo number_format($discount,2);?></td>            	
            </tr>
            
            <?php }?>
            
            <tr>            
            <td colspan="4" height="30" style="text-align:right; padding-right:5px;"><b>Total</b></td>           
            <td>Rs.<?php echo number_format($grandTotal,2);?></td>
            
            </tr>
            
            </table>
         
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td width="50%">
                	<div>
                    	<div class="os_head">Payment Option</div>
                        <form action="<?php echo $site['url'];?>order-submit" id="order-submit" method="post">
                    	<input type="radio" name="pOption" checked="checked" value="Cash on delivery" /> Cash on delivery<br />
                        <input type="radio" name="pOption" value="Other"/> Other                        
                        
                        <input type="hidden" name="amount" value="<?php echo $totAmnt;?>" />
                        
                         <input type="hidden" name="deliveryCharge" value="<?php echo $deliveryCharge;?>" />
                        
                        <input type="hidden" name="discountPercent" value="<?php echo $disper;?>" />
                        <input type="hidden" name="discountAmount" value="<?php echo $discount;?>" />
                        
                        <input type="hidden" name="grandTotal" value="<?php echo $grandTotal;?>" />
                        
                        <input type="hidden" name="couponCode" value="<?php echo $cCode;?>" />
                        
                        <input type="hidden" name="o_submit" />
                        </form>
                    </div>
                </td>
                <td>
                	 <div align="right">
                     	<a href="javascript:void(0)" onclick="formSubmit('order-submit');" class="remove">Confirm order</a>
                     </div>
                </td>
                </tr>
                </table>


        </td>
    </tr>
    </table>
    </div>
<?php }?>
</div>