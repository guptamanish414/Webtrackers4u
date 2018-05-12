<?
 global $seoLink;
$proQueryS=" select * from property where active=1   ";
$prorsS=$os->mq($proQueryS);

 ?>

<script type="text/javascript" src="<? echo $site['themePath']?>js/jquery.slides.min.js"></script>
<aside class="rightblock">
                	<div class="box_block1">
                    	<h4>Our properties </h4>
                        <div class="block">
                        	<!--<article></article>-->
                            <div class="slider1">
                            	<div class="imageslider">
                                    <div id="slides">
									<?
						while($pro=$os->mfa($prorsS))
{


                 $propertyId=$pro['propertyId'];
				 $pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId'   order by priority asc ,propertyImageId desc ");

?>
									
                                      <a href="<? echo $site['url'] ?>property/<? echo $pro['seoId'] ?>">
									  <strong><? echo $pro['title'] ?>    </strong>
									  <img src="<? echo $site['url'] ?>application/imageThumb.php?image=<? echo  $site['root'].$pImage[0]['image'] ?>&newwidth=179&newheight=128" />
									  <!--<img src="<?php echo $site['url']?><?php echo $pImage['0']['image']?>" />-->
									  <span>&pound; <?php echo number_format($pro['price'])?>  <?php echo $pro['priceUnit']?></span>
									  </a>
									  <? 
}
 ?>
                                      
                                    </div>
                                    <script>
										$(function() {
										  $('#slides').slidesjs();
										});
									  </script>
                                      <!--<div class="price">£550 /pw</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="box_block2">
                        <div><img src="<? echo $site['themePath']?>images/b_iconpix.jpg" border="0" usemap="#Map" />
<map name="Map"><area shape="rect" coords="4,3,227,41" href="<? echo $seoLink->l('register-with-us') ?>"><area shape="rect" coords="17,114,49,147" href="#" ><area shape="rect" coords="96,113,130,145" href="#" ><area shape="rect" coords="179,113,212,145" href="#"  target="_blank"></map></div>
                        
                        
                       
                    </div>
					
					
                    
                </aside>