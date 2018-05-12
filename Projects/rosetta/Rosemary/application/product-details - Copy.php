<?php
global $pageVar;
$seoId = '';
if (isset ( $pageVar ['segment'] [2] )) {
	$seoId = $pageVar ['segment'] [2];
}
$pDtls = $os->getMe ( "SELECT * FROM product WHERE seoid='$seoId'" );
?>
<?php

if (is_array ( $pDtls ) && count ( $pDtls ) > 0) {
	$pDtls = $pDtls [0];
	$productId = $pDtls ['productId'];
	$os->addProductView ( $productId ); // # update product view
	$noImg = $site ['themePath'] . 'images/no_image_product.png';
	$img = '';
	$imgTitle = '';
	$imgA = $os->getMe ( "SELECT title,image FROM image WHERE imageType='Product' AND imageTypeId=$productId AND active=1 ORDER BY featured DESC LIMIT 3" );
	?>
<?php

	if (is_array ( $imgA ) && count ( $imgA ) > 0) {
		
		?>
<link rel="stylesheet"
	href="<?php echo $site['themePath'];?>css/multizoom.css"
	type="text/css" />
<script type="text/javascript"
	src="<?php echo $site['themePath'];?>js/1.8.min.js"></script>
<script type="text/javascript"
	src="<?php echo $site['themePath'];?>js/multizoom.js">
// Featured Image Zoomer (w/ optional multizoom and adjustable power)- By Dynamic Drive DHTML code library (www.dynamicdrive.com)
// Multi-Zoom code (c)2012 John Davenport Scheuer
// as first seen in http://www.dynamicdrive.com/forums/
// username: jscheuer1 - This Notice Must Remain for Legal Use
// Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
</script>
<script type="text/javascript">

jQuery(document).ready(function($){
	
	$('#multizoom1').addimagezoom({ // multi-zoom: options same as for previous Featured Image Zoomer's addimagezoom unless noted as '- new'
		descArea: '#description', // description selector (optional - but required if descriptions are used) - new
		speed: 1500, // duration of fade in for new zoomable images (in milliseconds, optional) - new
		descpos: true, // if set to true - description position follows image position at a set distance, defaults to false (optional) - new
		imagevertcenter: true, // zoomable image centers vertically in its container (optional) - new
		magvertcenter: true, // magnified area centers vertically in relation to the zoomable image (optional) - new
		zoomrange: [3, 10],
		magnifiersize: [500,550],
		magnifierpos: 'right',
		cursorshadecolor: '#fdffd5',
		cursorshade: true,
		loadinggif:'<?php echo $site['themePath'];?>images/spinningred.gif'		
	});
})

</script>

<div class="cart_image">
	<img id="multizoom1" border="0" alt="Image" src=""
		style="width: 170px; height: 240px">
	<div id="description"></div>
	<div class="multizoom1 thumbs">
<?php
		foreach ( $imgA as $img ) {
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
<a href="<?php echo $normalImg;?>" data-lens="false"
			data-large="<?php echo $mainImg;?>"
			data-title="<?php echo $imgTitle;?>"> <img
			src="<?php echo $thumbImg;?>" alt="Img" title="" />
		</a> 
<?php }?>
</div>
<?php if($os->wListExists($productId)){?>
<a href="javascript:void(0)" class="sing"
		style="padding: 0 10px; width: 185px; cursor: default; background: #669999;">Already
		added to wish list</a>
<?php }else{?>
<a href="javascript:void(0)"
		onclick="addToWishList('<?php echo $productId;?>')" class="sing awish"
		style="padding: 0 10px; width: 120px;">Add to wish list</a>
	<div class="clr"></div>
	<div id="wishMsg" style="font-size: 13px;"></div>
<?php }?>
</div>

<?php }else{?>
<div class="cart_image">
	<img border="0" src="<?php echo $noImg;?>" width="168" height="238"
		style="border: 1px solid #E1E1E1;" alt="No Image">
</div>
<?php }?>
<div class="cart_right">
	<h1><?php echo $pDtls['name'];?></h1>
	<div class="clr"></div>
	<h2 style="float: right; color: #10142F; font-size: 16px;">
		<div align="right"><? echo $os->currency?><?php echo $pDtls['ourPrice'];?></div>
		<span>was&nbsp;<del>Rs.<?php echo $pDtls['oldPrice'];?></del></span>
	</h2>
	<div class="clr"></div>
	<a
		href="<?php echo $site['url'];?>shopping-cart/<?php echo $productId;?>"
		class="sing" style="padding: 0 10px; float: right;">Add to Cart</a>
	<div class="clr"></div>

<?php echo stripslashes($pDtls['fullDescription']);?>

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
</script>
<?php }else{?>
<div class="no_product">No description avaliable..</div>
<?php }?>
