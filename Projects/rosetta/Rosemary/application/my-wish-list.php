<div style="margin-top:10px;">
<?php if($os->isLogin()){?>
	<?php
		$customerId = $os->userDetails['customerId'];
		$pIds='';
    	$pIdsA = $os->getMe("SELECT GROUP_CONCAT(productId) as pIds FROM wishlist WHERE customerId=$customerId");
		if(is_array($pIdsA)){$pIds = $pIdsA[0]['pIds'];}
		
		$wishWhr = '';
		if($pIds!=''){$wishWhr="AND productId IN($pIds)";}else{$wishWhr="AND productId =''";}
		$q="SELECT productId,ourPrice,name,seoId FROM product WHERE productId>0 AND active='Active' $wishWhr LIMIT 0,12";
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
<a href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>"><img height="240" width="170" border="0" alt="Image" title="<?php echo $imgTitle;?>" src="<?php echo $img;?>" /></a>
<div class="price"><h5><? echo $os->currency?><?php echo $row['ourPrice'];?></h5></div> 
<a href="<?php echo $site['url'];?>shopping-cart/<?php echo $row['productId'];?>"><div class="addToCart"></div></a>
<div class="clr"></div>
<h3><a href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>" title="<?php echo $row['name'];?> view details"><?php echo $row['name'];?></a></h3>
</div>
<?php }?>
<?php }else{?>
<div class="pleaseLogin">Please log in</div>
<?php }?>
</div>