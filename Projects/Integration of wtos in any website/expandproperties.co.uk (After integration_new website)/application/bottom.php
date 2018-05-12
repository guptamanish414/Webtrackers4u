 <div class="section partners_section">
    	<h2 class="heading_center">Expand properties Partners<span> You need to do is very simple. Just join us<span></span></span></h2>
    	<div class="container">
        	<div class="row">
            	<div id="owl-partners" class="owl-carousel owl-theme">
                  <div class="item"><a href="#"><img class="img-responsive" src="<?php echo $site['themePath']?>images/Partners1.jpg" alt=""></a></div>
                  <div class="item"><a href="#"><img class="img-responsive" src="<?php echo $site['themePath']?>images/Partners2.jpg" alt=""></a></div>
                  <div class="item"><a href="#"><img class="img-responsive" src="<?php echo $site['themePath']?>images/Partners3.jpg" alt=""></a></div>
                  <div class="item"><a href="#"><img class="img-responsive" src="<?php echo $site['themePath']?>images/Partners4.jpg" alt=""></a></div>
                  <div class="item"><a href="#"><img class="img-responsive" src="<?php echo $site['themePath']?>images/Partners5.jpg" alt=""></a></div>
                  <div class="item"><a href="#"><img class="img-responsive" src="<?php echo $site['themePath']?>images/Partners6.jpg" alt=""></a></div>
              </div>
            </div>
        </div>
    </div>
    
    <div class="footer_section">
    	<div class="footer_top"> 
        	<div class="container">
            <div class="row quick_assist">
            	<div class="col-md-2"><h4>quick assist</h4></div>
                <div class="col-md-4">
                	<input value="E-MAIL ADDRESS" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'E-MAIL ADDRESS';}" type="text" class="text"/>
                </div>
                <div class="col-md-4">
                	<input value="PHONE NUMBER" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'PHONE NUMBER';}" type="text" class="text"/>
                </div>
                <div class="col-md-2">
                	<input type="submit" value="SUBMIT" class="submit"/>
                </div>
            </div>
        	<div class="row">
            	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                	<h3>Quick Links:</h3>
                    <ul class="bottom-link">
                        <li><a href="<? echo $site['url']?>home"><i class="fa fa-angle-double-right"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Landlord</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Tenants </a></li>
                        <li><a href="<? echo $site['url']?>mortgages"><i class="fa fa-angle-double-right"></i> Mortgage</a></li>
                        <li><a href="<? echo $site['url']?>Lettings"><i class="fa fa-angle-double-right"></i> Letting</a></li>
                        <li><a href="<? echo $site['url']?>Sales"><i class="fa fa-angle-double-right"></i> Sales</a></li>
                        <li><a href="<? echo $site['url']?>Guaranteed-Rent"><i class="fa fa-angle-double-right"></i> Rent Guarantee</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Tenant application</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                	<h3>Road Map:</h3>
                    <div class="map">
                        <div style="width: 100%"><iframe width="100%" height="216" src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=216&amp;hl=en&amp;q=333%20Barking%20Road%2C%20East%20Ham%20London.%20Post%20Code%3A%20E6%201LA+(Rowflex)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/de/erstellen-sie-eine-google-map/">generieren Google Maps iframe</a> by <a href="http://www.mapsdirections.info/de/">Expand Property Google Map</a></iframe></div><br />
                    
                    </div>
                    
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                	<h3>Contact Info:</h3>
                    <ul class="address">
                    	<li><img src="<?php echo $site['themePath']?>images/call_2_b.png"/>0123456789</li>
                        <li><img src="<?php echo $site['themePath']?>images/call_1_b.png"/>0203 441 5434</li>
                        <li><img src="<?php echo $site['themePath']?>images/mail_b.png"/>info@expandproperties.co.uk</li>
                        <!--<li><i class="fa fa-clock-o"></i> Mon-Sat 8:00 am to 8:00 pm</li>-->
                        <p>Address: Expand Properties, Challenge House 616 Mitcham Road Croydon Surrey CR0 2AA
</p>
                    
                    </ul>
                    <ul class="socel_icon">
                        <li><a href="https://www.facebook.com/expandproperties/"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="https://twitter.com/ex_properties/"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="footer_buttom">
        	<div class="container">
            	<div class="row">
                	<p>© 2016 expandproperties. All Rights Reserved | Powered By <a href="#">Webhouse4u</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <span class="back-to-top" style="display: inline;" onClick="$('html,body').animate({scrollTop:0},'slow');return false;"><i class="fa fa-arrow-up"></i><span>Up</span></span>
    
    
    <script>
     // Only enable if the document has a long scroll bar
		// Note the window height + offset
		if ( ($(window).height() + 100) < $(document).height() ) {
			$('.back-to-top').removeClass('hidden').affix({
				// how far to scroll down before link "slides" into view
				offset: {top:100}
			});
		}
    </script>
    <script>$('.block').smoove({offset:'40%'});</script>
    <script>
  	$(document).ready(function() {
	  $("#owl-partners").owlCarousel({
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
		  items : 4,
		  itemsDesktop : [1199,4],
		  itemsDesktopSmall : [979,4],
		  itemsTablet: [600,2],
		  itemsMobile : false
	   });
	   
	    var owl = $("#feature_slide");
	  owl.owlCarousel({
		  items : 3, //10 items above 1000px browser width
		  itemsDesktop : [1000,3], //5 items between 1000px and 901px
		  itemsDesktopSmall : [991,2], // betweem 900px and 601px
		  itemsMobile : [480,1] // itemsMobile disabled - inherit from itemsTablet option
	  });
	  
	   var owl = $("#testimonials_slider");
			  owl.owlCarousel({
			  navigation : false, // Show next and prev but	tons
		      slideSpeed : 300,
		      pagination :false,
			  singleItem:true,
			  });
			  //Custom Navigation Events
		  $(".next4").click(function(){
			owl.trigger('owl.next');
		  })
			  $(".prev4").click(function(){
			owl.trigger('owl.prev');
			  })
});
  </script>
</body>
</html>
