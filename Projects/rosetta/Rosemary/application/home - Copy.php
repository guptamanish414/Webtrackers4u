<div class="main">
			<?php
                #Body Banner
                $bbQ = "SELECT title,image,link FROM banner WHERE type='Body' AND status='Active' ORDER BY RAND() LIMIT 1";
                $bbRs = $os->mq($bbQ);
                $bodyBanner=$os->mfa($bbRs);
            ?>
            <?php if(is_array($bodyBanner)){?>
                <div class="banner">
                <a target="_blank" href="<?php echo $bodyBanner['link'];?>" title="<?php echo $bodyBanner['title'];?>"><img src="<?php echo $site['url'].$bodyBanner['image'];?>" width="741" height="266" /></a>
                </div>
              <?php }?>  
        	<!--<div class="banner">
            
            	<a href="#"><img src="<?php echo $site['themePath'];?>images/banner.jpg" /></a>
            </div>-->
        <?php include('home-page-listing.php');?>
        </div>