<? 
    session_start();
    
	$os->wtosHome =$os->get_pagecontent("active=1 and pagecontentId='".$os->getSettings('homePageId')."'" );

	$os->wtospage=$os->wtosHome[0];

	$pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));

	$pageBody=$os->replaceWtBox($pageBody);

	echo stripslashes($os->wtospage['pageCss']);

	

?>


<div class="banner_wrapper">
        <div class="banner">
            <img src="<?php echo $site['themePath']?>images/banner_2.png"/>
        </div>
 </div>
    
<div class="services_top">
        <div class="container">
            <div class="row">
                <div id="feature_slide" class="owl-carousel owl-theme">
                    <div class="item top_box">
                            <? $os->echoWtBox('holidayLets') ?>
                    </div>
                    <div class="item top_box">
                        <? $os->echoWtBox('morgagesBox') ?>
                    </div>
                    <div class="item top_box">
                       <? $os->echoWtBox('landlordBox') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="section welcome_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 left_site">
                    <div class="block shadow_1">
                        <article>
                        <h2><? echo $os->wtospage['heading'] ?></h2>

                        <? echo $pageBody; ?>

                        </article>
                    <ul class="image-grupe clearfix">
                        <li><img src="<?php echo $site['themePath']?>images/Services_1.png"/></li>
                        <li><img src="<?php echo $site['themePath']?>images/Services_2.png"/></li>
                        <li><img src="<?php echo $site['themePath']?>images/Services_3.png"/></li>
                    </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 right_site">

                        <? include('rightCol.php') ?>
                </div>
            </div>
        </div>
</div>
    
<div class="section property-items">
        <h2 class="heading_center">Rowflex Most Popular Properties<span> All You need to do is very simple. Just join us<span></span></span></h2>
        <div class="container">
            <div class="row property-item-block">

             <?

            $featProduct = array();

            $proQuery = "select * from property where featured = 'Featured Rentals' or featured = 'Featured Sales' or featured = 'Recently Added' and active='1' limit 4";

            $prors = $os->mq ( $proQuery );

            while($prop = $os->mfa ( $prors )){

                $frecentId=$prop['propertyId'];

                $frecentImg=$os->get_propertyimage(" active=1 and propertyId='$frecentId' order by priority asc ,propertyImageId desc limit 1 ");

            ?>

                <div class="col-md-6 col-sm-6 col-xs-6 box">
                    <div class="block shadow_1">
                        <article class="property-item shadow_1  clearfix">
                            <div class="top_block clearfix">
                                <h3><a href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>"> <? echo $prop['title'] ?></a></h3>
                                <figure>
                                    <a href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>">
                                        <img src="<? echo $site['url'] ?><? echo  $frecentImg[0]['image'] ?>" alt="<? echo $prop['title'] ?>" title="<? echo $prop['title'] ?>" class="image">
                                         
                                         <? if ($pro['label'] != ''){?>

                                        <span class="box-type"><span class="text"><?  echo  $prop['label'] ?></span></span>

                                         <? }?>
                                    </a>
                                </figure>
        
                                <div class="detail">
                                    <h5 class="price"><? echo $GLOBALS['currency']; ?><strong><?php echo  number_format( $prop['price'])?></strong> <?php echo $prop['priceUnit']?></strong> <!--<small> - Villa</small> --></h5>
                                    <p class="text_des"><? echo substr($prop['fullDescription'], 0, 100);?>...</p>
                                    <a class="more-details" href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>">More Details <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                           <ul class="property-meta clearfix">
                            
                            <li><img src="<?php echo $site['themePath']?>images/icon-bed.png"> <span><? echo  $prop['bed'] ?>&nbsp;Bedrooms</span></li>
                            <li><img src="<?php echo $site['themePath']?>images/icon-bath.png"> <span><? echo  $prop['bath'] ?>&nbsp;Bathrooms</span></li>
                             <li><img src="<?php echo $site['themePath']?>images/icon-recept.png"> <span><? echo  $prop['sofa'] ?>&nbsp;Reception</span></li>
                        </ul>
                      </article>
                    </div>
                </div>



          <?  }?>


             </div>
         </div>
    </div>
    
    