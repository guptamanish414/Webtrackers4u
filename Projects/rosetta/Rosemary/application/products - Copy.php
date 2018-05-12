<div style="margin-top:10px;">
<!--<div class="bNavDiv">
<?php echo $os->bNavigation();?>
</div>-->

<?php
global $pageVar,$keywordWhr;

$catWhr = '';
$feaWhr = '';

if(isset($pageVar['segment'][2]) && $pageVar['segment'][2]!='' && $pageVar['segment'][2]!='All'){
	if(strpos($pageVar['segment'][2],'Serach_Keyword=')!==false){}else{
	$cat=$pageVar['segment'][2];
	$cat = explode('+',$cat);$cat = implode('\',\'',$cat);
	$catIdsA = $os->getMe("SELECT GROUP_CONCAT(productcategoryId) AS catIds FROM productcategory WHERE title IN('$cat')");
	$catIds='';$pIds='';
	if(is_array($catIdsA)){$catIds = $catIdsA[0]['catIds'];}
	if($catIds!=''){		
		$pIdsA = $os->getMe("SELECT GROUP_CONCAT(productId) AS pIds FROM productcategorymap WHERE productcategoryId IN($catIds)");
		if(is_array($pIdsA)){$pIds = $pIdsA[0]['pIds'];}
		
	}
	if($pIds!=''){$catWhr = "AND productId IN($pIds)";}else{$catWhr = "AND productId<0";}
	}
	
}

if(isset($pageVar['segment'][3]) && $pageVar['segment'][3]!=''){
	
	$fea=$pageVar['segment'][3];
	$fea = explode('+',$fea);$fea = implode('\',\'',$fea);
	$feaIdsA = $os->getMe("SELECT GROUP_CONCAT(productfeatureId) AS feaIds FROM productfeature WHERE title IN('$fea')");
	$feaIds='';$pIds='';
	if(is_array($feaIdsA)){$feaIds = $feaIdsA[0]['feaIds'];}
	if($feaIds!=''){		
		$pIdsA = $os->getMe("SELECT GROUP_CONCAT(productId) AS pIds FROM productfeaturemap WHERE productfeatureId IN($feaIds)");
		if(is_array($pIdsA)){$pIds = $pIdsA[0]['pIds'];}
		
	}
	if($pIds!=''){$feaWhr = "AND productId IN($pIds)";}else{$feaWhr = "AND productId<0";}
}

$q="SELECT productId,ourPrice,name,seoId FROM product WHERE productId>0 $catWhr $feaWhr $keywordWhr AND active='Active' ORDER BY orders ASC,productId DESC";
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
<div class="price"><h5>Rs.<?php echo $row['ourPrice'];?></h5></div> 
<a href="<?php echo $site['url'];?>shopping-cart/<?php echo $row['productId'];?>"><div class="addToCart"></div></a>
<div class="clr"></div>
<h3><a href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>" title="<?php echo $row['name'];?> view details"><?php echo $row['name'];?></a></h3>
</div>
<?php }?>
<?php if($i==0){?>
<div class="no_product">No item available</div>
<?php }?>
</div>