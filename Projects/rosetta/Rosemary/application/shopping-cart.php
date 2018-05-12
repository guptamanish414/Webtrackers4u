

<div class="basket_page">
	<div class="">
		<ul class="basket_steps clearfix">
			<li class="active"><a href="#">View Your Basket</a></li>
			<li><a href="#">Your Details</a></li>
			<li><a href="#">Payment</a></li>
		</ul>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
				<?php include 'cart-product-list.php'; ?>	
							
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="basket_page_right">
					<div class="panel panel-default">
						<div class="panel-heading">Order details</div>
						<div class="panel-body">
							
							<ul class="basket_page_order ">
								<li class="clearfix"><span class="text pull-left">Sub Total</span><span
									class="price pull-right"><? echo $os->currency?><?php echo number_format($grandTotal,2);?></span></li>
									
								<li class="clearfix"  ><span class="text pull-left">Delivery <span title="* For all Orders under Rs 1000, a nominal delivery charge is added per item." style="color: red;"> ?</span> </span><span 
									class="price pull-right"><? echo $os->currency?><?php echo number_format($delivaryCharge,2);?></span></li>
									
								<li class="clearfix"><span class="text pull-left">Order Total</span><span
									class="price pull-right"><? echo $os->currency?><?php echo number_format($totalOrder,2);?></span></li>
									
								<p class="v_space20">By clicking the button above to proceed to
									payment, you confirm that you have read, understood and accept
									our Terms & Conditions</p>
							</ul>
							<div class="cliar"></div>
							<?php if (is_array ( $_SESSION ['rosette-cart'] ) && count ( $_SESSION ['rosette-cart'] ) > 0) {?>
							<p class="clearfix">
							<?php 
								$checkoutLink=$site['url'].'login/ref-url=shopping-cart';
								if($os->isLogin()){$checkoutLink=$site['url'].'order-summary';}
							?> 
								<a href="<?php echo $checkoutLink;?>"
									class="btn btn-primary">Pay With Card</a>
							</p>
							<?php }else {?>
							<p class="clearfix">
								<a href="#"
									class="btn btn-primary">Pay With Card</a>
							</p>
							<?php } ?>
							
							<ul class="payments">
								<li><img
									src="<?php echo $site['themePath'];?>images/payment-american-express.jpg"
									alt="payment"></li>
								<li><img
									src="<?php echo $site['themePath'];?>images/payment-discover.jpg"
									alt="payment"></li>
								<li><img
									src="<?php echo $site['themePath'];?>images/payment-visa.jpg"
									alt="payment"></li>
								<li><img
									src="<?php echo $site['themePath'];?>images/payment-american-express.jpg"
									alt="payment"></li>
								<li><img
									src="<?php echo $site['themePath'];?>images/payment-paypal.jpg"
									alt="payment"></li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




