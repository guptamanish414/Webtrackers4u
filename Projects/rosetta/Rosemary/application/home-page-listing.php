<div class="pHead">
<h1>posters and art prints</h1>
<a href="<?php echo $site['url'];?>Products/Posters"><img src="<?php echo $site['themePath'];?>images/VIEW.png" style="float:right; margin-top:10px; margin-right:10px;" /></a></div>
<div class="clr"></div>
<?php
	#Poster and art Prints	
	$productIdsA = $os->getMe("SELECT GROUP_CONCAT(productId) AS productIds FROM productcategorymap WHERE productcategoryId IN(SELECT productcategoryId FROM productcategory WHERE title='Posters')");
	
	$productIds='';
	if(is_array($productIdsA)){$productIds = $productIdsA[0]['productIds'];}
	if($productIds!=''){$whr = "AND productId IN($productIds)";}else{$whr = "AND productId=''";}
	
	$q = "SELECT productId,ourPrice,name,seoId FROM product WHERE productId>0 $whr AND active ='Active' ORDER BY orders ASC,productId DESC LIMIT 0,8";
	$rs = $os->mq($q);
?>
<?php
	$i=0;
	while($row=$os->mfa($rs)){
	$i++;
	
	$productId = $row['productId'];
	$noImg = $site['themePath'].'images/no_image_product.png';
	$img='';$imgTitle='';
	$imgA = $os->getMe("SELECT title,image FROM image WHERE imageType='Product' AND imageTypeId=$productId AND featured='Yes' AND active=1 LIMIT 1");
	if(is_array($imgA) && count($imgA)>0){$imgA=$imgA[0];$img=$site['url'].$imgA['image'];$imgTitle=$imgA['title'];}
	$imgTitle=($imgTitle!='')?$imgTitle:$row['name'];
	$img=($img!='')?$img:$noImg;
?>
<div class="image_box">
<a href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>"><img border="0" alt="Image" title="<?php echo $imgTitle;?>" src="<?php echo $img;?>" height="240" width="170" /></a>
<div class="price"><h5><?php echo $os->currency.$row['ourPrice'];?></h5></div> 
<a href="<?php echo $site['url'];?>shopping-cart/<?php echo $row['productId'];?>"><div class="addToCart"></div></a>
<div class="clr"></div>
<h3><a href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>"><?php echo $row['name'];?></a></h3>
</div>
<?php }?>

<?php if($i==0){?>
<div class="no_product">No posters available</div>
<?php }?>


<div class="pHead">
<h1>T-Shirts</h1>
<a href="<?php echo $site['url'];?>Products/T Shirts"><img src="<?php echo $site['themePath'];?>images/VIEW.png" style="float:right; margin-top:10px; margin-right:10px;" /></a></div>
<?php
	#T-Shirts	
	$productIdsA = $os->getMe("SELECT GROUP_CONCAT(productId) AS productIds FROM productcategorymap WHERE productcategoryId IN(SELECT productcategoryId FROM productcategory WHERE title='T Shirts')");
	
	$productIds='';
	if(is_array($productIdsA)){$productIds = $productIdsA[0]['productIds'];}
	if($productIds!=''){$whr = "AND productId IN($productIds)";}else{$whr = "AND productId=''";}
	
	$q = "SELECT productId,ourPrice,name,seoId FROM product WHERE productId>0 $whr AND active ='Active' ORDER BY orders ASC,productId DESC LIMIT 0,8";
	$rs = $os->mq($q);
?>

<?php
	$i=0;
	while($row=$os->mfa($rs)){
	$i++;
	$productId = $row['productId'];
	$noImg = $site['themePath'].'images/no_image_product.png';
	$img='';$imgTitle='';
	$imgA = $os->getMe("SELECT title,image FROM image WHERE imageType='Product' AND imageTypeId=$productId AND featured='Yes' AND active=1 LIMIT 1");
	if(is_array($imgA) && count($imgA)>0){$imgA=$imgA[0];$img=$site['url'].$imgA['image'];$imgTitle=$imgA['title'];}
	$imgTitle=($imgTitle!='')?$imgTitle:$row['name'];
	$img=($img!='')?$img:$noImg;
?>
<div class="image_box">
<a href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>"><img border="0" alt="Image" title="<?php echo $imgTitle;?>" src="<?php echo $img;?>" height="240" width="170" /></a>
<div class="price"><h5>Rs.<?php $os->currency.echo $row['ourPrice'];?></h5></div> 
<a href="<?php echo $site['url'];?>shopping-cart/<?php echo $row['productId'];?>"><div class="addToCart"></div></a>
<div class="clr"></div>
<h3><a href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>"><?php echo $row['name'];?></a></h3>
</div>
<?php }?>

<?php if($i==0){?>
<div class="no_product">No t-shirts available</div>
<?php }?>

<div class="pHead">
<h1>canvas and art prints</h1>
<a href="#"><img src="<?php echo $site['themePath'];?>images/VIEW.png" style="float:right; margin-top:10px; margin-right:10px;" /></a></div> 

<div class="image_box">
<img src="<?php echo $site['themePath'];?>images/9.jpg" />
<div class="price"><h5><? echo $os->currency?>250.00</h5></div> 
<a href="<?php echo $site['url'];?>shopping-cart"><div class="addToCart"></div></a>
<div class="clr"></div>
<h3><a href="<?php echo $site['url'];?>product-details">Image Title | Desk</a></h3>
</div>