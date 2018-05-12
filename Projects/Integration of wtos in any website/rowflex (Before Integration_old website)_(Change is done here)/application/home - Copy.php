<? 

	$os->wtosHome =$os->get_pagecontent("active=1 and pagecontentId='".$os->getSettings('homePageId')."'" );

	$os->wtospage=$os->wtosHome[0];

	$pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));

	$pageBody=$os->replaceWtBox($pageBody);

	echo stripslashes($os->wtospage['pageCss']);

	

?>



<div class="banner">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Carousel indicators -->

        <ol class="carousel-indicators">



            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>



            <li data-target="#myCarousel" data-slide-to="1"></li>



            <li data-target="#myCarousel" data-slide-to="2"></li>



        </ol>   



        <!-- Wrapper for carousel items -->



        <div class="carousel-inner">

            <div class="item active">

                <img src="<?php echo $site['themePath']?>images/slider1.jpg" alt="First Slide">

            </div>



            <div class="item">

                <img src="<?php echo $site['themePath']?>images/slider2.jpg" alt="Second Slide">

            </div>



            <div class="item">

                <img src="<?php echo $site['themePath']?>images/slider3.jpg" alt="Third Slide">

            </div>

            <div class="item">

                <img src="<?php echo $site['themePath']?>images/slider4.jpg" alt="Third Slide">

            </div>

            <div class="item">

                <img src="<?php echo $site['themePath']?>images/slider5.jpg" alt="Third Slide">

            </div>

            <div class="item">

                <img src="<?php echo $site['themePath']?>images/slider6.jpg" alt="Third Slide">

            </div>

        </div>



        <!-- Carousel controls -->

        <a class="carousel-control left" href="#myCarousel" data-slide="prev">

            <i class="fa fa-angle-left"></i>

        </a>



        <a class="carousel-control right" href="#myCarousel" data-slide="next">

            <i class="fa fa-angle-right"></i>

        </a>

    </div>

    </div>

    

<div class="services_section">

    	<div class="container">

        	<div class="row">

            	<? $os->echoWtBox('sellingYourHome') ?>

                    

                <? $os->echoWtBox('lifeInNewYourk') ?>



                <? $os->echoWtBox('buyingHome') ?>

            

            </div>

        </div>

    </div>

    

<div class="section welcome_section">

    	<div class="container">

        	<div class="row">

            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

                	<div class="block" data-move-y="200px" data-move-x="-200px">

                    	<article>

						<h2><? echo $os->wtospage['heading'] ?></h2>

						<? echo $pageBody; ?>

						<a href="<? echo $site['url']."aboutUs"; ?>" class="button">Read More</a>

					</article>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                	<!--<div class="about_image">

                    	<img src="images/about.png"/>

                    </div>-->

                    <div class="block" data-move-y="200px" data-move-x="100px">

                    	<div class="search_box">

                    	<? include('rightCol.php');?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

 

<div class="section property-items">

    	<h2 class="heading_center">MA Estates Property Selection<span> Trust to protect your home and maximize your investment<span></span></span></h2>

    	<div class="container">

        	<div class="row">

            

            <?

			$featProduct = array();

			$proQuery = "select * from property where featured = 'Featured Rentals' or featured = 'Featured Sales' or featured = 'Recently Added' and active='1' limit 4";

			$prors = $os->mq ( $proQuery );

			while($prop = $os->mfa ( $prors )){

				$frecentId=$prop['propertyId'];

				 $frecentImg=$os->get_propertyimage(" active=1 and propertyId='$frecentId' order by priority asc ,propertyImageId desc limit 1 ");

            ?>

             	<div class="col-md-6">

<div class="block" data-rotate-y="270deg" data-move-x="-150%">

	<article class="property-item clearfix">

	<h4><a href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>"><? echo $prop['title'] ?></a></h4>



	<figure>

		<a href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>">

			<img src="<? echo $site['url'] ?><? echo  $frecentImg[0]['image'] ?>" alt="<? echo $prop['title'] ?>" title="<? echo $prop['title'] ?>" 

			class="img-thumbnail"> 

            <? if ($pro['label'] != ''){?>

			<span class="box-type"><span class="text"><? echo  $prop['label'] ?></span></span>

             <? }?>

			  </a>

	</figure>



	<div class="detail">

		<h5 class="price"><? echo $GLOBALS['currency']; ?><strong><?php echo  number_format( $prop['price'])?></strong> <?php echo $prop['priceUnit']?></strong></h5>

		<p><? echo substr($prop['fullDescription'], 0, 100);?>...</p>

		<a class="more-details" href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>">More Details 

		<i class="fa fa-angle-double-right"></i></a>

	</div>



	<div class="property-meta">

	<span><img src="<?php echo $site['themePath']?>images/icon-bed.png" alt=""/> <? echo  $prop['bed'] ?>&nbsp;Bedrooms</span>

	<span><img src="<?php echo $site['themePath']?>images/icon-bath.png" alt=""/> <? echo  $prop['bath'] ?>&nbsp;Bathrooms</span>

	<span><img src="<?php echo $site['themePath']?>images/Sofa.png" alt=""/> <? echo  $prop['reception'] ?>&nbsp;Reception</span>

		

		

	</div>

</article>

</div>

</div>

                

                

             <?  }?>

            </div>

        </div>

    </div>

    