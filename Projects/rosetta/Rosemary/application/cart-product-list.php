<?php
session_start ();

global $pageVar, $os;
$pDetails = $pageVar ['segment'] [2];

if ($pDetails != '') {
	$pDetailsA = explode ( '_', $pDetails );
	//_d($pDetailsA);
}
 $productId = $pDetailsA[0];
 $quant = $pDetailsA[1];
 $size = $pDetailsA[2];

$validProduct = '';
if ($productId > 0) {
	$productId = mysql_real_escape_string ( $productId );
	$validProduct = $os->getMe ( "SELECT productId FROM product WHERE productId=$productId AND active='Active'" );
}
$requestId = $productId;

if ($requestId && is_array ( $validProduct )) {
	$la_cartArray = array (
			"id" => $requestId,
			"quantity" => $quant ,
			"size" => $size 
	);
	$flag = 0;
	if (is_array ( $_SESSION ['rosette-cart'] ) && count ( $_SESSION ['rosette-cart'] ) > 0) {
		foreach ( $_SESSION ['rosette-cart'] as $key => $val ) {
			if ($_SESSION ['rosette-cart'] [$key] ['id'] == $requestId) {
				$keyInitial = $key;
				$flag = 1;
			}
		}
	}
	
	if ($flag == 0) {
		$_SESSION ['rosette-cart'] [] = $la_cartArray;
	} else {
		$_SESSION ['rosette-cart'] [$keyInitial] ['quantity'] ++;
	}
	?>
<script>window.location='<?php echo  $site['url'] ?>shopping-cart';</script>
<?php
}

if ($_GET ['quantity'] > 0) {
	$pid = $_GET ['pid'];
	$_SESSION ['rosette-cart'] [$pid] ['quantity'] = $_GET ['quantity'];
	//$lastItemId =end($_SESSION ['rosette-cart']);
	//$_SESSION ['rosette-cart'] [$lastItemId] ['totalOrder'] = $_GET ['totalOrder'];
}

if ($_GET ['delid'] != '') {
	unset ( $_SESSION ['rosette-cart'] [$_GET ['delid']] );
	$_SESSION ['rosette-cart'] = array_values ( $_SESSION ['rosette-cart'] );
	?>
<script> window.location='<?php echo $site['url'];?>shopping-cart';</script>
<?
}
?>


<div class="basket_page_left">
	<h3>Shopping Cart</h3>
	<div class="basket_page_box">
					<?php
					if (is_array ( $_SESSION ['rosette-cart'] ) && count ( $_SESSION ['rosette-cart'] ) > 0) {
						$grandTotal = 0;
						$total = 0;
						$totQty = 0;
						$pCats = '';
					?>
						<ul class="basket_page_box">
			<li class=" list heading clearfix"><span class="prodect">Product:</span><span
				class="quantity">Quantity:</span> <span class="price">Price:</span></li>
								<?php
						foreach ( $_SESSION ['rosette-cart'] as $key => $value ) {
							$productId = $_SESSION ['rosette-cart'] [$key] ['id'];
							$product = $os->getMe ( "SELECT productId,name,code,seoId,ourPrice,status FROM product WHERE productId=$productId" );
							$product = $product [0];
							$pCats .= $productId . ',';
							
							$noImg = $site ['url'] . 'wtos-images/product/thumb_59x50/no_image_product.png';
							$img = '';
							$imgTitle = '';
							$imgName = '';
							$imgA = $os->getMe ( "SELECT title,image FROM image WHERE imageType='Product' AND imageTypeId=$productId AND featured='Yes' AND active=1 LIMIT 1" );
							if (is_array ( $imgA ) && count ( $imgA ) > 0) {
								$imgA = $imgA [0];
								$imgName = str_replace ( 'wtos-images/product/', '', $imgA ['image'] );
								$imgTitle = $imgA ['title'];
							}
							if ($imgName != '' && file_exists ( $site ['imgPath'] . 'wtos-images/product/thumb_59x50/' . $imgName )) {
								$img = $site ['url'] . 'wtos-images/product/thumb_59x50/' . $imgName;
							}
							
							$imgTitle = ($imgTitle != '') ? $imgTitle : $product ['name'];
							$img = ($img != '') ? $img : $noImg;
							
							$total = $product ['ourPrice'] * $_SESSION ['rosette-cart'] [$key] ['quantity'];
							$totQty += $_SESSION ['rosette-cart'] [$key] ['quantity'];
							$grandTotal += $total;
							// logic added later
							if ($grandTotal < 1000) {
								//$delivaryCharge = $grandTotal * .02;
							} else {
								$delivaryCharge = 0;
							}
							$totalOrder = $grandTotal + $delivaryCharge;
							
							$_SESSION ['rosette-cart'] [$key] ['totalOrder'] = $totalOrder;
							//_d($_SESSION ['rosette-cart']);
							//_d($_SERVER['PHP_SELF']);
							?>
							<li class="list clearfix">
				<div class="prodect">
					<div class="imges">
						<img src="<?php echo $img;?>" width="40px" height="40px"
							title="<?php echo $imgTitle;?>" />
					</div>
					<div class="prodect_titel">
						<a href="#"><?php echo $product['name'];?></a><br /> Size: <?php echo $_SESSION['rosette-cart'][$key]['size'];?>
					</div>
				</div>
				<div class="quantity">
					<input size="2" id="txtquantity<?php echo $key ?>" name="quantity"
						value="<?php echo $_SESSION['rosette-cart'][$key]['quantity'];?>"
						maxlength="2" type="text" class="quantity_input"> <a href="#"
						class="update_quantity"
						onclick="updateQuantity(txtquantity<?php echo $key ?>.value,'<?php echo $key ;?>')">

						<img src="<?php echo $site['themePath'];?>images/icon_refresh.gif" />

					</a>
				</div>
				<div class="price">
					<span><? echo $os->currency?><?php echo $product['ourPrice'];?></span> <span class="close"
						onClick="delP('<?php echo $key ;?>')"><i class="fa fa-trash-o"> </i></span>
				</div>
			</li>
							<?php
						}
						if ($pCats != '') {
							$pCats = substr ( $pCats, 0, - 1 );
						}
						
						?>
							
						</ul>

		<p class="clearfix" style="margin-top: 10px">
			<a href="<?php echo $site['url'];?>" class="btn btn-primary">&#8592
				Continue Shopping</a>
		</p>
						
						<?php }else{?>
						<div class="cliar"></div>
		<div class="line"></div>
		<div class="">
			<h5>
				Your cart is empty.please add atleast 1 product<br />
			</h5>
			<div class="cliar"></div>
			<span style="margin-top: 10px" class="clearfix"><a
				class="btn btn-primary" href="<?php echo $site['url'];?>">&#8592
					Return To Shop</a></span>

		</div>
						<?php }?>
					</div>


</div>


<script type="text/javascript">
	function pageRefresh(data){		
		window.location="<?php echo $site['url'];?>shopping-cart";
	}
	
	function updateQuantity(str,pid){		
		var url = '<?php echo $site['url'];?>application/shopping-cart.php?quantity='+str+'&pid='+pid;
		//alert(url);
		os.setAjaxFunc('pageRefresh',url);
	}
	
	function delP(k){	
		
		var p=confirm('Are you sure you want to delete?');		
			if(p){				
				var url = '<?php echo $site['url'];?>application/shopping-cart.php?delid='+k;
				os.setAjaxFunc('pageRefresh',url);				
			}
			
	}
	if(os.getVal('cCode')!=''){
		checkCoupon('<?php echo $totQty;?>','<?php echo $pCats;?>',0);		
	}
</script>