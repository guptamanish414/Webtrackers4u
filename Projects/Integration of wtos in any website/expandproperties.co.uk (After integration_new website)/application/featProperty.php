<h2>Featured Properties</h2>
<div class="right_site_box">

    <div id="latest_Pro_slider3" class="owl-carousel owl-theme">
      <?

  

  $proQuery = "select * from property where featured = 'Featured Rentals' or featured = 'Featured Sales' or featured = 'Recently Added' limit 4";

  $prors = $os->mq ( $proQuery );

  

  

  

  while($prop = $os->mfa ( $prors )){

    

    $frecentId=$prop['propertyId'];

     $frecentImg=$os->get_propertyimage(" active=1 and propertyId='$frecentId' order by priority asc ,propertyImageId desc limit 1 ");

     

?>


      <div class="item">
            <div class="lates_propertie clearfix">
                <div class="list-property-img">
                    <a href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>"><img src="<? echo $site['url'] ?><? echo  $frecentImg[0]['image'] ?>" alt=""></a>
                    <div class="pro-stat"><? echo  $prop['label'] ?></div>
                </div>
                <div class="list-property-desc">
                    <h4><a href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>">  <? echo $prop['title'] ?> </a></h4>
                    <p><? echo  $prop['shortDescription'] ?>......</p>
                    <div class="pro-btn-box">
                        <div class="btn-box black "><? echo $GLOBALS['currency']; ?> <strong><? echo  $prop['price'] ?> </strong> <? echo  $prop['priceUnit'] ?></div>
                        <a href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>" class="btn-box">View Details</a>
                    </div>
                </div>
            </div>
      </div>



 <?  } ?>

    
    </div>

    <div class="customNavigation">
          <a class="btn prev3"><i class="fa fa-chevron-left"></i></a>
          <a class="btn next3"><i class="fa fa-chevron-right"></i></a>
    </div>
</div>