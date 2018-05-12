<?php

$footerMenu=$os->get_pagecontent("active=1 and parentPage=0 and onBottom='1' $andLangId "," priority asc ",'',' seoId ,	externalLink, title  , pagecontentId , openNewTab');

$footerMenuSub=$os->get_pagecontent("active=1 and parentPage>0 and onBottom='1' $andLangId "," priority asc ",'',' seoId ,	externalLink, title  , pagecontentId , openNewTab');

?>

<div class="footerEnvelop">



        		<div class="footerPanel">

                        <ul>

                           <li class="quickLinks1">

                             <h4>Quick Links</h4>

                                <ul>

                	<!-- <div class="footerEnhancedPacket"> -->

					<?php

						if(is_array($footerMenu)){

						foreach($footerMenu as $fm){

						$fSeoL=($fm['externalLink']=='')?$seoLink->l($fm['seoId']):$fSeoL=$fm['externalLink'];

						$_fTer=($fm['openNewTab']<1)?'':'target="_blank"';

					?>

                    <?php

					$showMP = 0;$showUP = 0;

					if($fm['seoId']=='my-profile'){

						$showMP=1;

						if($os->isLogin()){$showMP=0;}	

					}

					if($fm['seoId']=='upload-resume'){

						$showUP=1;

						if($os->isLogin() && $os->loginTypeID=='jobseekerId'){$showUP=0;}	

					}

					//echo "$showMP $showUP";

					if($showMP==0 && $showUP==0){

				?>

                                 

					<li><a  title="<?php echo $fm['title'];?>" <?php echo $_fTer;?> href="<?php echo $fSeoL;?>"><?php echo $fm['title'] ?></a></li>

                                      

                  <?php }?>  

                    

					<?php

						}

						}

					?> 

					

					<?php

						if(is_array($footerMenuSub)){

						foreach($footerMenuSub as $fms){

						$fSeoLSub=($fms['externalLink']=='')?$seoLink->l($fms['seoId']):$fSeoLSub=$fms['externalLink'];

						$_fTerSub=($fms['openNewTab']<1)?'':'target="_blank"';

					?>

					<a  title="<?php echo $fms['title'];?>" <?php echo $_fTerSub;?> href="<?php echo $fSeoLSub;?>"><?php echo $fms['title'] ?></a>

					<?php

						}

						}

					?>

                                        

                                      <!-- <li><a href="<?php echo $site['url'];?>faqs">FAQ</a></li> -->



                                      <li><a href="<?php echo $site['url'];?>terms-and-conditions">Terms and Conditions</a></li>

                                      <li><a href="<?php echo $site['url'];?>privacy-policy">Privacy Policy</a></li>

                                </ul>

                        </li>

                        <li class="followUs">

                        	<h4>Follow Us</h4>

                            <ul>

                              <li class="facebook"><span></span><a class="socialFB" href="">Facebook</a></li>

                              <li class="linkedin"><span></span><a class="socialLinkedIn" href="">Linkedin</a></li>

                              <!-- <li class="twitter"><span></span><a class="socialTwitter" href="#">Twitter</a></li>

                              <li class="googleplus"><span></span><a class="socialLinkedIn" href="#">Google Plus</a></li>

                              <li class="youtube"><span></span><a class="socialLinkedIn" href="#">You Tube</a></li> -->



                            </ul>

                        </li> 

                        <li class="getInTouch">

                        	<h4>Get in Touch</h4>

                                <ul>

                                  <li><span>Email:</span><a href="mailto:jobs@doublecheckjobs.com
">jobs@doublecheckjobs.com
</a></li>

                                  <!--<li><span>Phone:</span><span> 020 3772 7214</span></li>-->

                                  <li><span>Head Office:</span><span>Double Check Security Group Ltd<br />The Lansdowne Building<br />2 Lansdowne Road<br />Barking Essex<br />Croydon<br/>CR9 2ER</span></li>                            











                              </ul>

                        </li>                       

                    </ul>

                   <!-- </div>

                	<div class="footerBasicPacket">

                    	<ul class="socialMediaPacket">

                        	<li><a class="socialLinkedIn" href="#"> at Linkedin</a></li>

                        	<li><a class="socialTwitter" href="#"> at Twitter</a></li>

                        	<li><a class="socialFB" href=""> at Facebook</a></li>                                               

                        </ul> 

                        

                        <!-- <ul class="footerMenuPanel">

                        	<li><a href="<?php echo $site['url'];?>faqs">FAQ &nbsp;&nbsp;.</a></li>

                        	<li><a href="<?php echo $site['url'];?>terms-and-conditions">Terms and Conditions &nbsp;&nbsp;.</a></li>

                            <li><a href="<?php echo $site['url'];?>privacy-policy">Privacy Policy</a></li>

                        </ul> -->

                        

                       

                    </div>

                </div>

        	</div>

<?php

/*if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']))

{

 include("ie_detector.php"); 

} 

*/



 

if(preg_match('/(?i)msie /',$_SERVER['HTTP_USER_AGENT'])){ include("ie_detector.php"); } 

?> 





  

 