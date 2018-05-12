 <? 
    session_start();
    
	$os->wtosHome =$os->get_pagecontent("active=1 and pagecontentId='".$os->getSettings('homePageId')."'" );

	$os->wtospage=$os->wtosHome[0];

	$pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));

	$pageBody=$os->replaceWtBox($pageBody);

	echo stripslashes($os->wtospage['pageCss']);

	

?>

    <div class="section welcome_section">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 right_site">
                    <div class="block">
                    	<h2 class="heading">Expand Propety <span>Search.</span></h2>
                    	<div class="search_box">
                        <form>
                        	<div class="form-group">
                                <label class="label-text">Select Property Type</label>
                                <select class="SlectBox">
                                    <option disabled="disabled" selected="selected">Select Property Type</option>
                                     <!--placeholder-->
                                    <option value="one">Letting</option>
                                    <option value="tow">Sales</option>
                                </select>
                           </div>
                            <div class="form-group">
                                <label class="label-text">Select City</label>
                                <select class="SlectBox">
                                    <option disabled="disabled" selected="selected">Select Location</option>
                                     <!--placeholder-->
                                    <option value="one">1</option>
                                </select>
                           </div>
                            <div class="form-group">
                                <label class="label-text">Minimum Price(pcm)</label>
                                <select class="SlectBox">
                                    <option disabled="disabled" selected="selected">From</option>
                                     <!--placeholder-->
                                    <option value="one">1</option>
                                </select>
                           </div>
                            <div class="form-group">
                                <label class="label-text">Maximum Price(pcm)</label>
                                <select class="SlectBox">
                                    <option disabled="disabled" selected="selected">To</option>
                                     <!--placeholder-->
                                    <option value="one">1</option>
                                </select>
                           </div>
                            <div class="form-group">
                                <label class="label-text">Select Property Purpose</label>
                                <select class="SlectBox">
                                    <option disabled="disabled" selected="selected">Property Purpose</option>
                                     <!--placeholder-->
                                    <option value="one">Residential</option>
                                    <option value="tow">Commercial</option>
                                </select>
                           </div>
                           <a href="#" class="button">Search</a>
                        </form>
                        <script type="text/javascript">
						 $(document).ready(function () {
						 window.asd = $('.SlectBox').SumoSelect();
					     });
		               </script>
                    </div>
                    </div>
                </div>
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 left_site">
                	<div class="block">
                    	<h2 class="heading"><? echo $os->wtospage['heading'] ?></h2>
                    	<article>
                            <p>
							 <? echo $pageBody; ?>
							
							
                            
							
							
							
							</p>
					</article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="featur_property">
    	<div class="container">
        	<div class="row row_m">
			
			
            
				
				
			
			<?

            $featProduct = array();

            $proQuery = "select * from property where featured = 'Featured Rentals' or featured = 'Featured Sales' or featured = 'Recently Added' and active='1' limit 1";

            $prors = $os->mq ( $proQuery );

            while($prop = $os->mfa ( $prors )){

                $frecentId=$prop['propertyId'];

                $frecentImg=$os->get_propertyimage(" active=1 and propertyId='$frecentId' order by priority asc ,propertyImageId desc limit 1 ");

            ?>
				
                
      	<div class="col-md-6 col-sm-6 col-xs-6 box box_b">
                	<div class="pgl-property featured-item">
                        <div class="property-thumb-info">
                            <div class="property-thumb-info-image">
                            	<a href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>"><img alt="<? echo $prop['title'] ?>" class="img-responsive" src="<? echo $site['url'] ?><? echo  $frecentImg[0]['image'] ?>" title="<? echo $prop['title'] ?>" /></a>
                            </div>
                            <div class="property-thumb-info-content">
                            	<h3 class="price"><? echo $GLOBALS['currency']; ?><?php echo  number_format( $prop['price'])?> <?php echo $prop['priceUnit']?></h3>
                                <h3 class="h_text"><?  echo  $prop['label'] ?> &nbsp;</h3>
                                <p class="p_text"><img src="<?php echo $site['themePath']?>images/icon-bed.png"> <? echo  $prop['bed'] ?> Bedroom</p>
                            </div>
                        </div>
					</div>
                </div>
				
				<?  }?>
			
				
				             <?

            $featProduct = array();

            $proQuery = "select * from property where featured = 'Featured Rentals' or featured = 'Featured Sales' or featured = 'Recently Added' and active='1' limit 4";

            $prors = $os->mq ( $proQuery );

            while($prop = $os->mfa ( $prors )){

                $frecentId=$prop['propertyId'];

                $frecentImg=$os->get_propertyimage(" active=1 and propertyId='$frecentId' order by priority asc ,propertyImageId desc limit 1 ");

            ?>
				
                <div class="col-xs-6 col-md-3 col-sm-3 box box_s box_m">
                	<div class="pgl-property featured-item">
                        <div class="property-thumb-info">
                            <div class="property-thumb-info-image">
                            	<a href="<? echo $site['url'] ?>property/<? echo  $prop['seoId'] ?>"><img alt="<? echo $prop['title'] ?>" class="img-responsive" src="<? echo $site['url'] ?><? echo  $frecentImg[0]['image'] ?>"  title="<? echo $prop['title'] ?>"></a>
                            </div>
                            <div class="property-thumb-info-content">
                            	<h3 class="price"><? echo $GLOBALS['currency']; ?><?php echo  number_format( $prop['price'])?> <?php echo $prop['priceUnit']?></h3>
                                <h3 class="h_text"><?  echo  $prop['label'] ?> &nbsp;</h3>
                                <p class="p_text"><img src="<?php echo $site['themePath']?>images/icon-bed.png"> <? echo  $prop['bed'] ?> Bedroom</p>
                            </div>
                        </div>
					</div>
                </div>
      
				
				<?  }?>
				
            </div>
        </div>
    </div>
    
    <div class="testimonials_wrapper">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 left">
                	<h2 class="heading">Clients <span>Testimonials</span></h2>
                    <div id="testimonials_slider" class="owl-carousel owl-theme">
                    	<div class="item">
                        	<div class="testimonal_block">
                                <div class="left">
                                    <div class="image"><img src="<?php echo $site['themePath']?>images/testimonal_image_1.png" class="img-thumbnail img-circle"/></div>
                                </div>
                                <div class="right">
                                    <div class="quot quot_left"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
                                    <p class="block_text">
                                        Good, honest letting agency that listens to my needs and only sends me tenants matching my requirements
                                    </p>
                                    <div class="quot quot_right"><i class="fa fa-quote-right" aria-hidden="true"></i></div>
                                    <h3><span>J. Graham</span> - West Croydon</h3>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                        	<div class="testimonal_block">
                                <div class="left">
                                    <div class="image"><img src="<?php echo $site['themePath']?>images/testimonal_image_1.png" class="img-thumbnail img-circle"/></div>
                                </div>
                                <div class="right">
                                    <div class="quot quot_left"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
                                    <p class="block_text">
                                        Expand was recommended to me through a friend and haven't had the need for another agency since. 5 stars!
                                    </p>
                                    <div class="quot quot_right"><i class="fa fa-quote-right" aria-hidden="true"></i></div>
                                    <h3><span>K. Caan</span> - Mitcham</h3>
                                </div>
                            </div>
                        </div>
                   </div>
                   	<div class="customNavigation testimonials_nav">
                      <a class="btn prev4"><i class="fa fa-chevron-left"></i></a>
                      <a class="btn next4"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 right">
                	<h2 class="heading">Welcome to <span>Our Agency</span></h2>
                    <h4>Expand finds tenants for offices and residential properties in South London</h4>
                    <p>
                    Expand strives to combine integrity with experience and expertise so we are able to offer a professional and personal service to both our Landlords and Tenants. Expand agency offers: <br/><br/> 
                    
                    Apartments and modern properties
                    Free advice and information on areas and local facilities
                    No obligation valuations
                    Full management
                    Full property maintenance service</p>
                
                </div>
            </div>
        </div>
    </div>
	