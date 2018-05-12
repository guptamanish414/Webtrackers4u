<div class="basket_page">
    	<div class="">
        	<ul class="basket_steps clearfix">
              <li class="active"><a href="#">View Your Basket</a></li>
              <li class=""><a href="#">Your Details</a></li>
              <li><a href="#">Payment</a></li>
           </ul>
        	<div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<div class="basket_page_left">
                    	<?php include 'cart-product-list.php'; ?>
                    	<div class="cliar"></div>
                            <ul class="basket_page_order v_space20">
                                <li class="clearfix"><span class="text pull-left">Sub Total</span><span class="price pull-right"><strong><? echo $os->currency?><?php echo number_format($grandTotal,2);?></strong></span></li>
                                <li class="clearfix"><span class="text pull-left">Delivery<span title="* For all Orders under Rs 1000, a nominal delivery charge is added per item." style="color: red;"> ?</span></span><span class="price pull-right"><strong><? echo $os->currency?><?php echo number_format($delivaryCharge,2);?></strong></span></li>
                                <li class="clearfix"><span class="text pull-left">Order Total</span><span class="price pull-right"><strong><? echo $os->currency?><?php echo number_format($totalOrder,2);?></strong></span></li>
                            </ul>
                            <div class="cliar"></div>
                            <div class="basket_phone v_space20">
                            	For Sales &amp; Advice Call:<br><span><h3>020 8889 2258</h3></span>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                
                	<div class="basket_page_right">
                    	<div class="panel panel-default">
                        <div class="panel-heading">Your Billing Details</div>
                      <div class="panel-body">
                      <div class="form_section">
						  <p class="clearfix"><label>Name</label><span class="price pull-right"><strong><?php echo $_SESSION ['rosette-Login']['name']; ?></strong></span></p>
						  <p class="clearfix"><label>Contact No.</label><span class="price pull-right"><strong><?php echo $_SESSION ['rosette-Login']['phone']; ?></strong></span></p>
						  <p class="clearfix"><label>Email</label><span class="price pull-right"><strong><?php echo $_SESSION ['rosette-Login']['email']; ?></strong></span></p>
	                      <p class="clearfix"><label>Billing Address</label><span class="price pull-right"><strong><?php echo $_SESSION ['rosette-Login']['address']; ?></strong></span></p>
	                      <p class="clearfix"><span class="text pull-left">Payable Amount</span><span class="price pull-right"><strong><? echo $os->currency?><?php echo number_format($totalOrder,2);?></strong></span></p>
                        
                      </div>
                      </div>
                    </div>
                    </div>
                    
                    
                	<div class="basket_page_right">
                    	<div class="panel panel-default">
                        <div class="panel-heading">Payment Option</div>
                      <div class="panel-body">
                      <div class="form_section">
                      	<form action="<?php echo $site['url'];?>order-submit" id="order-submit" method="post">
                    	<input type="radio" name="pOption" id="cod" checked="checked" value="CashOnDelivery" /> Cash on delivery<br />
                        <input type="radio" name="pOption" id="paypal" value="payPal"/> Pay using PayPal                        
                        
                        <input type="hidden" name="amount" value="<?php echo $grandTotal;?>" />
                        
                         <input type="hidden" name="deliveryCharge" value="<?php echo $delivaryCharge;?>" />
                        
                        <!-- <input type="hidden" name="discountPercent" value="<?php // echo $disper;?>" />
                        <input type="hidden" name="discountAmount" value="<?php // echo $discount;?>" /> -->
                        
                        <input type="hidden" name="grandTotal" value="<?php echo $totalOrder;?>" />
                        
                        <!--<input type="hidden" name="couponCode" value="<?php //echo $cCode;?>" />-->
                        
                        <input type="hidden" name="o_submit" />
                        </form>
						
                        <form	action="https://www.paypal.com/cgi-bin/webscr"	method="post" id="getPaied"	target="_top">										
                            <input	type="hidden"	name="cmd"	value="_xclick">										
                            <input	type="hidden"	name="business"	value="admin@webtrackers.co.in">										
                            <input	type="hidden"	name="lc"	value="UK">										
                            <input	type="hidden"	name="item_name"	value="Total Amount To Pay">										
                            <input	type="hidden"	name="amount"	value="<? echo number_format($totalOrder,2)?>">										
                            <input	type="hidden"	name="currency_code"	value="GBP">										
                            <input	type="hidden"	name="button_subtype"	value="services">										
                            <input	type="hidden"	name="no_note"	value="0">										
                            <input	type="hidden"	name="bn"	value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">										
                           <!-- <input	type="image"	src="https://www.paypalobjects.com/en_GB/i/btn/btn_buynowCC_LG.gif"	border="0"	name="submit"	alt="PayPal	–	The	safer,	easier	way	to	pay	online.">
                            <img	alt=""	border="0"	src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif"	width="1"	height="1">		-->						
                       </form>
                        <a href="javascript:void(0)" onclick="orderConfirm()" class="btn btn-primary">Confirm order</a>
                      </div>
                      </div>
                    </div>
                    </div>
            </div>
           </div>
     </div>
    </div>
    <script>
	
	function orderConfirm()
	{
		//var radioVal = os.getObj('cod').checked;
		if (os.getObj('cod').checked)
		{
			document.getElementById("order-submit").submit();
		}
		if (os.getObj('paypal').checked)
		{
			document.getElementById("getPaied").submit();
		}
	}
	</script>