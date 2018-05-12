
<h2>Latest Properties</h2>
<!--<h3 class="titel">Latest Properties</h3>-->
<div id="latest_Pro_slider" class="owl-carousel owl-theme">
<?
	$proLateQuery = "select * from property where featured = 'Recently Added'  limit 4";
	$prors = $os->mq ( $proLateQuery );
	
	while($propLatest = $os->mfa ( $prors )){
		
	$frecentId=$propLatest['propertyId'];
	$frecentImg=$os->get_propertyimage(" active=1 and propertyId='$frecentId' order by priority asc ,propertyImageId desc limit 1 ");
?>
  <div class="item">
    <div class="lates_propertie clearfix">
        <div class="list-property-img">
            <a href="<? echo $site['url'] ?>property/<? echo  $propLatest['seoId'] ?>"><img src="<? echo $site['url'] ?><? echo  $frecentImg[0]['image'] ?>" alt=""></a>
            <div class="pro-stat"><? echo  $propLatest['label'] ?></div>
        </div>
        <div class="list-property-desc">
            <h4><a href="<? echo $site['url'] ?>property/<? echo  $propLatest['seoId'] ?>"><? echo $propLatest['title'] ?> </a></h4>
            <p><? echo  $propLatest['shortDescription'] ?>......</p>
            <div class="pro-btn-box">
                <div class="btn-box black "><? echo $GLOBALS['currency']; ?> <strong><? echo  $propLatest['price'] ?> </strong> <? echo  $propLatest['priceUnit'] ?></div>
                <a href="<? echo $site['url'] ?>property/<? echo  $propLatest['seoId'] ?>" class="btn-box">View Details</a>
            </div>
        </div>
	</div>
  </div>
 <? }?>
</div>
<div class="customNavigation">
      <a class="btn prev"><i class="fa fa-chevron-left"></i></a>
      <a class="btn next"><i class="fa fa-chevron-right"></i></a>
  </div>
        