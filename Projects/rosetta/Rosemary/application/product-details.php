<?php
global $pageVar;
$seoId = '';
if (isset ( $pageVar ['segment'] [2] )) {
	$seoId = $pageVar ['segment'] [2];
}
$pDtls = $os->getMe ( "SELECT * FROM product WHERE seoid='$seoId'" );
$productId = 'dgsd';


?>




<div class="prodect_details">
	
		<div class="row">
        
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<div class="images_vew">
                 <?php
					if (is_array ( $pDtls ) && count ( $pDtls ) > 0) {
						$pDtls = $pDtls [0];
						$productId = $pDtls ['productId'];
						$os->addProductView ( $productId ); // # update product view
						$noImg = $site ['themePath'] . 'images/no_image_product.png';
						$img = '';
						$imgTitle = '';
						$imgA = $os->getMe ( "SELECT title,image FROM image WHERE imageType='Product' AND imageTypeId=$productId AND active=1 ORDER BY featured DESC" );
						
							
						
						?>
					<?php
						
						if (is_array ( $imgA ) && count ( $imgA ) > 0) {
							
					?>
                	<div class="preview col">
                    <div class="app-figure" id="zoom-fig">
                    
                   
       						 <div class="selectors"> 
                   <? foreach ( $imgA as $img ) { 
				   			$imgName = str_replace ( 'wtos-images/product/', '', $img ['image'] );
							$mainImg = $site ['url'] . $img ['image'];
							$normalImg = '';
							$thumbImg = '';
							$imgTitle = '';
							$imgTitle = $img ['title'];
							$imgTitle = ($imgTitle != '') ? $img ['title'] : $pDtls ['name'];
							
							if (file_exists ( $site ['imgPath'] . 'wtos-images/product/thumb_180x254/' . $imgName )) {
								$normalImg = $site ['url'] . 'wtos-images/product/thumb_180x254/' . $imgName;
							}
							if (file_exists ( $site ['imgPath'] . 'wtos-images/product/thumb_59x50/' . $imgName )) {
								$thumbImg = $site ['url'] . 'wtos-images/product/thumb_59x50/' . $imgName;
								
							}
				   
				   ?>
       						
                     
    					
                               <a  data-zoom-id="Zoom-1" href="<? echo $mainImg?>"
                                    data-image="<? echo $mainImg?>">
                                    <img src="<? echo $thumbImg ;?>"/>
                                </a>
                                 
                                <?php  } ?>
                                
       						 </div>
                             <a id="Zoom-1" class="MagicZoom" title="" href="<? echo $mainImg?>">
            				<img src="<? echo $mainImg?>" alt=""/>
        					</a>
                       </div>
                       
                   </div>
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				<div class="contain_wrapper">
					<h3 class="headline">
						<?php echo $pDtls['name'];?>
					</h3>
					<p class="description"><?php echo $pDtls['code'];?></p>
					<p class="price">Now <? echo $os->currency?> <?php echo $pDtls['ourPrice'];?></p>
                    <p>
					<? if($pDtls['oldPrice'] != '0.00'){ 
                        $youSaved = $pDtls['oldPrice'] - $pDtls['ourPrice'];
                        $youSaved = number_format($youSaved,2);
                        $saveInPe = ($youSaved /$pDtls['oldPrice'])*100 ;
                        $saveInPe = number_format($saveInPe,2);
                    ?>
                        
                    <h6>RRP:<? echo $os->currency?><?php echo $pDtls['oldPrice'];?></h6>
                    <h5>You Save <? echo $os->currency?><?php echo $youSaved ;?> (<?php echo $saveInPe?>%)</h5>
                    <? }?>
                    </p>
					<p>
					<div class="quantity">
						<p class="pdp-label">Quantity:</p>
						<input type="number" class="input-text qty text" title="Qty"
							value="1" name="quantity" min="1" step="1" id="quantity">
					</div>
					<div class="size">
                    <? 
						
						 
						 $pFeat = array();
					 	$featIdsA = $os->getMe ( "SELECT productfeatureId FROM productfeaturemap WHERE productId IN($productId)" );
						foreach($featIdsA as $pFeatIds) 
								{
									$pFeat[]=$pFeatIds['productfeatureId'];
									
								}
						
							 //_d($pFeat);
							 	 $featIn="   IN ('".implode("','",$pFeat)."');";
								$pCat=array();

								$catIdsA = $os->getMe ( "SELECT productcategoryId FROM productcategorymap WHERE productId IN($productId)" );
								foreach($catIdsA as $catId) 
								{
									$pCat[]=$catId['productcategoryId'];
								}
								 
								
							 	$catIn="   IN ('".implode("','",$pCat)."');";
								
								
								$features = $os->getMe ( "SELECT group_concat(featureIds) gcf FROM productcategory WHERE productcategoryId $catIn " );
								$features =$features[0]['gcf'];
								$features=str_replace(',,,',',',$features);
								$features="0".$features."0";
								
								
								$PId = $os->getMe ( "SELECT group_concat(productfeatureId) gcfp FROM productfeature WHERE productfeatureId IN($features) AND title LIKE '%Size%' " );
								$parId =$PId[0]['gcfp'];
								
								// _d($PId);
								 // echo $features;
								 $featTitle = $os->getMe ( "SELECT title FROM productfeature WHERE parentId = $parId AND  productfeatureId $featIn " );
								  
								// _d($pFeat);
								// _d($PId);
								 // exit();
								
								//$catIdsA = $os->getMe ( "SELECT group_concat(featureIds) FROM productcategory WHERE productcategoryId $catIn " );
								 
								
							 
								//$title = array(); 
								
					?>
                    
						<p class="pdp-label">Size:</p>
						<select name="size" id="size">
							<option value="">Select Size</option>
                            
                            <?php
                            	foreach($featTitle as $fTitle) 
								{
									
								//$os->optionsHTML ( $pageData ['parentId'], 'productcategoryId', 'title', 'productcategory' );
							?>
                            
                            <option value="<? echo $fTitle['title'] ?>"><? echo $fTitle['title'] ?></option>
                            <? } ?>
						</select>
					</div>
					</p>   
                       <?php
				
				if ($os->wListExists ( $productId )) {
					
					?>
                        <?php }else  {?>
                        <p>
						<a onClick="addToCart('<?php echo $productId;?>')"
							href="javascript:void(0)"
							class="btn btn-primary">Add to Basket</a>

					</p>      
                        
                        <?php  }?>
                        

					<!--<div class="entry-sharebar">
									<ul class="entry-share-links clearfix">
										<li class="shareon-facebook">
											<a href="#" rel="0" target="_blank">
												<img src="http://www.vandelaydesign.com/wp-content/themes/vd/assets/graphics/facebook-icon.svg">
												<span class="share-count">675</span>
											</a>
										</li>
										<li class="shareon-twitter">
											<a href="#" rel="0" target="_blank">
												<img src="http://www.vandelaydesign.com/wp-content/themes/vd/assets/graphics/twitter-icon.svg">
												<span class="share-count">899</span>
											</a>
										</li>
										<li class="shareon-google-plus">
											<a href="#" rel="0" target="_blank">
												<img src="http://www.vandelaydesign.com/wp-content/themes/vd/assets/graphics/google-plus-icon.svg">
												<span class="share-count">177</span>
											</a>
										</li>
									</ul>
								</div>-->
					 <?php  }?>
            
					<div class="accordion_info">
						<div class="panel-group" id="accordion2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion"
											href="#collapse1">Product Details</a>
									</h4>
								</div>
								<div id="collapse1" class="panel-collapse collapse">
									<div class="panel-body"><?php echo $pDtls['fullDescription'];?></div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion"
											href="#collapse2">Delivery & Returns</a>
									</h4>
								</div>
								<div id="collapse2" class="panel-collapse collapse in">
									<div class="panel-body">
                                    	<h5>Delivery Policy</h5>
                                    	 <table style="width:100%" class="table table-sm">
                                          <tr>
                                            <th>Services</th>
                                            <th>Standard Delivery Cost</th>
                                            <th>Estimated delivery no. of working days</th>
                                          </tr>
                                          <tr>
                                            <td>All Over India</td>
                                            <td>Free*</td>
                                            <td>3-7 working days</td>
                                          </tr>
                                          
                                          
                                        </table> 
                                    </div>
								</div>
							</div>
 							<div class="panel panel-default"> 
 								<div class="panel-heading"> 
 									<h4 class="panel-title"> 
 										<a data-toggle="collapse" data-parent="#accordion" 
 											href="#collapse3">Payment & Security</a> 
 									</h4> 
 								</div> 
 								<div id="collapse3" class="panel-collapse collapse in"> 
 									<div class="panel-body">To make a purchase on Rosette you will firstly need to register as a user. When registering you will need to provide a fully operational and valid email address to enable us to keep you up to date with the status of your order and send you your sales receipt.<ul class="payments">
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
To provide a secure online shopping environment your card details will be encrypted to minimise the possibility of a third party accessing your card details through the Internet.

When entering into the payment page you will be taken via a secure and encrypted connection to our Sage Pay secure payment site.  The yellow padlock (Depending on the internet browser (and the version of the browser) you are using, the location of the padlock will vary.  It can normally be found in the bottom right hand corner of the screen, at the top of the screen next to (or inside) the address bar or at the very top right hand corner of the screen) will indicate that the server is secure and encrypted via SSL ensuring your transaction is as safe as possible.   The Secure Socket layers (SSL) encrypt the data that you send, and incorporate a mechanism for detecting any alteration in transit, so that eavesdropping on or tampering with web traffic is almost impossible. This is essential for safely transmitting highly confidential information such as credit card numbers. The authentication process uses cryptography to verify that a trusted independent third party, or certificate authority, such as Verified by Visa has registered and identified the server.</div> 
 								</div> 
 							</div> 
						</div>
					</div>
					 <?php  } else {?>
					<div class="">No description avaliable..</div>
					<?php  }?>
					<div class="clear"></div>
				</div>
			</div>
                
           
				
					
			

		
	</div>

	<script>
	
	function setWishListMsg(msg){
		
		os.setHtml('wishMsg','');
		//alert(msg);return false;
		switch(msg){
			case '0':
			os.setHtml('wishMsg','<font style="color:#F00;">This is not a valid product</font>');
			break;
			case '1':
			os.setHtml('wishMsg','<font style="color:#F00;">Please login to add</font>');
			break;
			case '2':
			os.setHtml('wishMsg','<font style="color:#F00;">Already added into wishlist</font>');
			break;
			case '3':
			os.setHtml('wishMsg','<font style="color:#F00;">Something wrong please try again</font>');
			break;
			case '4':
			os.setHtml('wishMsg','<font style="color:#008000;">Successfully added to wishlist</font>');
			break;
			default:
			//code to be executed if n is different from case 1 and 2
		}
	}
	
	function addToWishList(productId){
		if(productId>0){
			var url = '<?php echo $site['url'];?>application/ajxSysytem.php?addToWishList=yes'+'&productId='+productId;
			os.animateMe.div='wishMsg';						
			os.animateMe.html='<img src="<?php echo $site['themePath'];?>images/ajax-loader.gif" alt="" border="0" /> Working....';
			os.setAjaxFunc('setWishListMsg',url);
		}
	}
	
	function addToCart(pId)
	{
		
		var size = $('#size').val();
		var quantity = $('#quantity').val();
		if (!size) {
			alert("Select Size");
		
		}else{
			var url=pId+'_'+quantity+'_'+size;
			window.location = '<?php  echo $site['url'];?>shopping-cart/'+url;
		}
	}
</script>
</div>