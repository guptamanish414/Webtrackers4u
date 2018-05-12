

 <div class="section partners_section">
        <h2 class="heading_center">Rowflex Partners <span>All you need to do is very simple .Just join us.<span></span></span></h2>
        <div class="container">
            <div class="row">
                <div id="owl-partners" class="owl-carousel owl-theme">
                  <div class="item"><a href="#"><img class="img-responsive" src="<?php echo $site['themePath']?>images/Partners1.jpg" alt=""></a></div>
                  <div class="item"><a href="#"><img class="img-responsive" src="<?php echo $site['themePath']?>images/Partners2.jpg" alt=""></a></div>
                  <div class="item"><a href="https://www.gumtree.com/" target="_blank"><img class="img-responsive" src="<?php echo $site['themePath']?>images/Partners3.jpg" alt=""></a></div>
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
          <div class="row">
              <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                  <h3>Quick Links:</h3>
                    <ul class="bottom-link">
                        <li><a href="<? echo $site['url']?>home"><i class="fa fa-angle-double-right"></i> Home</a></li>
                        <li><a href="<? echo $site['url']?>Sales"><i class="fa fa-angle-double-right"></i> Sales</a></li>
                        <li><a href="<? echo $site['url']?>Lettings"><i class="fa fa-angle-double-right"></i> Lettings </a></li>
                        <li><a href="<? echo $site['url']?>holidayLets"><i class="fa fa-angle-double-right"></i> Holiday Lets</a></li>
                        <li><a href="<? echo $site['url']?>mortgages"><i class="fa fa-angle-double-right"></i> Mortgages</a></li>
                        <li><a href="<? echo $site['url']?>Guaranteed-Rent"><i class="fa fa-angle-double-right"></i> Guaranteed Rent</a></li>
                        <li><a href="<? echo $site['url']?>developments"><i class="fa fa-angle-double-right"></i> Developments</a></li>
                        <li><a href="<? echo $site['url']?>Contact"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                        <li><a href="<? echo $site['url']?>properties"><i class="fa fa-angle-double-right"></i> Properties</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                  <h3>Road Map:</h3>
                    <div class="map">
                      <div style="width: 100%"><iframe width="100%" height="216" src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=216&amp;hl=en&amp;q=333%20Barking%20Road%2C%20East%20Ham%20London.%20Post%20Code%3A%20E6%201LA+(Rowflex)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/de/erstellen-sie-eine-google-map/">generieren Google Maps iframe</a> by <a href="http://www.mapsdirections.info/de/">Rowflex Google Map</a></iframe></div><br />
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                  <h3>Contact Info:</h3>
                    <ul class="address">
                      <li><img src="<?php echo $site['themePath']?>images/call_2_b.png"/>0208 472 5579</li>
                      <li><img src="<?php echo $site['themePath']?>images/call_1_b.png"/>07507659389</li>
                      <li><img src="<?php echo $site['themePath']?>images/mail_b.png"/>info@rowflex.co.uk</li>
                      <li><i class="fa fa-clock-o"></i> Mon-Fri 9:30 am to 6:00 pm <br>Sat 10:00 am to 4:30 pm</li>
                       
                        <p>Address: 333 Barking Road, East Ham London.Post Code: E6 1LA</p>
                    
                    </ul>
                    <ul class="socel_icon">
                        <li><a href="https://www.facebook.com/RowflexPropertiesServices/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="https://twitter.com/ROWFLEXPROPERTY" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="footer_buttom">
          <div class="container">
              <div class="row">
                  <p>© 2016 Rowflex. All Rights Reserved | Powered By <a href="#">Webhouse4u</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <span class="back-to-top" style="display: inline;" onclick="$('html,body').animate({scrollTop:0},'slow');return false;"><i class="fa fa-arrow-up"></i><span>Up</span></span>
    
    
    <script>

    $( ".menu_toggle" ).click(function() {

      $( ".menu" ).slideToggle( "slow" );

    });

  </script>

    

    <script>

    $(document).ready(function($) {

      $("#owl-example1").owlCarousel();

    });

    </script>

  
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
    
    var owl = $("#latest_Pro_slider3");
        owl.owlCarousel({
        navigation : false, // Show next and prev buttons
          slideSpeed : 300,
          pagination :false,
        singleItem:true,
        });
        //Custom Navigation Events
      $(".next3").click(function(){
      owl.trigger('owl.next');
      })
        $(".prev3").click(function(){
      owl.trigger('owl.prev');
        })
});
  </script>
  <script>
    $(document).ready(function() {

      var sync1 = $("#sync1");
      var sync2 = $("#sync2");

      sync1.owlCarousel({
        singleItem : true,
        slideSpeed : 1000,
        navigation: true,
        pagination:false,
        afterAction : syncPosition,
        responsiveRefreshRate : 200,
      });

      sync2.owlCarousel({
        items : 4,
        itemsDesktop      : [1199,4],
        itemsDesktopSmall     : [979,4],
        itemsTablet       : [768,4],
        itemsMobile       : [479,4],
        pagination:false,
        responsiveRefreshRate : 100,
        afterInit : function(el){
          el.find(".owl-item").eq(0).addClass("synced");
        }
      });

      function syncPosition(el){
        var current = this.currentItem;
        $("#sync2")
          .find(".owl-item")
          .removeClass("synced")
          .eq(current)
          .addClass("synced")
        if($("#sync2").data("owlCarousel") !== undefined){
          center(current)
        }

      }

      $("#sync2").on("click", ".owl-item", function(e){
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo",number);
      });

      function center(number){
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;

        var num = number;
        var found = false;
        for(var i in sync2visible){
          if(num === sync2visible[i]){
            var found = true;
          }
        }

        if(found===false){
          if(num>sync2visible[sync2visible.length-1]){
            sync2.trigger("owl.goTo", num - sync2visible.length+2)
          }else{
            if(num - 1 === -1){
              num = 0;
            }
            sync2.trigger("owl.goTo", num);
          }
        } else if(num === sync2visible[sync2visible.length-1]){
          sync2.trigger("owl.goTo", sync2visible[1])
        } else if(num === sync2visible[0]){
          sync2.trigger("owl.goTo", num-1)
        }
      }

    });
    </script>


  
</body>
</html>




