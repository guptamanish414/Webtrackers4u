<?php



$msgEnquery='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	

	

	if (empty($_POST["fullname"])) {

	$msgEnquery = "Name is required";

	} else {

	$name = test_input($_POST["fullname"]);

	}

	

	if (empty($_POST["email"])) {

	$msgEnquery = "Email is required";

	} else {

	$email = test_input($_POST["email"]);

	}

	

	if (empty($_POST["mobile"])) {

	$msgEnquery = "Message is required";

	} else {

	$mobile = test_input($_POST["mobile"]);

	}

	if (empty($_POST["details"])) {

	$msgEnquery = "Message is required";

	} else {

	$message = test_input($_POST["details"]);

	}

  

$msgEnquery=' Sorry your message failed  please try agin';

if($_POST['fullname']!='' && $_POST['email']!='')

		{

			

			

			# save to data base  888

			

			$dataToSave['name']=$name;

			$dataToSave['email']=$email; 

			$dataToSave['mobile']=$mobile; 

			$dataToSave['details']=$message; 

			$dataToSave['addedDate']=date('Y-m-d h:i:s');

			$os->save('contactus',$dataToSave,$primeryField,$rowId);		

				# save to data base  888 end	

			$os->startOB();

			?>



<table width="400" border="0" cellpadding="5" cellspacing="2" >

  <tr>

    <td style="background:#ffffff; color:#666666; font-size:15px; font-weight:bold;">&nbsp; <? echo $_POST['fullname']?> Contacting  <? echo $site['url']; ?>  </td>

  </tr>

  <tr>

    <td>  Name: <strong><? echo $_POST['fullname']?></strong> <br /><br />

 

			Email : <? echo $_POST['email']?> <br /><br />

			

			Mobile no : <? echo $_POST['mobile']?> <br /><br />

			Query : <? echo $_POST['details']?> <br /><br />

			 

      &nbsp;</td>

  </tr>

  

</table>

<?

			

		 

		    $body=$os->getOB();

			$os->emailSend($os->getSettings('email'),$_POST['email'],$_POST['fullname'],$_POST['fullname'].'  Contacting You ',$body);

		    $msgEnquery=' Message sent successfully . Thanks for your time  ';

		}





}







?>  

  <div class="section partners_section">

    	<h2 class="heading_center">Valuable Real Estate Tools & Info!<span>With all the powerful features we have developed, WP Residence would make one of the best buys you have ever made. We know you will love this as much as we do!<span></span></span></h2>

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

    

  <div class="section footer_section">

    	<div class="container">

        	<div class="row">

            	<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

                	<h4>QUICK LINKS</h4>

                    <ul class="nav-bottom">

                        <li><a href="<? echo $site['url']; ?>aboutUs"><i class="fa fa-angle-double-right"></i> About Us </a></li>

                        <li><a href="<? echo $site['url']; ?>service"> <i class="fa fa-angle-double-right"></i> Service</a></li>

                        

                    </ul>

                    <ul class="nav-bottom">

                        <li><a href="https://www.facebook.com/maestates/" target="_blank"><i class="fa fa-facebook-square"></i> Facebook</a></li>

                        <li><a href="#"><i class="fa fa-twitter-square" target="_blank"></i> Twitter</a></li>

                        <li><a href="https://plus.google.com/u/0/114849670290638539672/posts"><i class="fa fa-google-plus-square" target="_blank"></i> Google+</a></li>

                    </ul>

                </div>

                

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                	<h4>SEND US MESSAGE</h4>

                    <form  method="post">

                    	<div class="form-group col-md-6">

                           <input id="name" name="fullname" class="form-control " placeholder="Name" type="text">

                           <span class="error"> <?php echo $nameErr;?></span>

                       </div>

                       <div class="form-group col-md-6">

                          <input id="email" name="email" class="form-control " placeholder="Email" type="email">

                          <span class="error"> <?php echo $nameErr;?></span>

                       </div>

                       <div class="form-group col-md-12">

                          <input id="phone" name="mobile" class="form-control " placeholder="Phone" type="text">

                          <span class="error"> <?php echo $nameErr;?></span>

                       </div>

                       <div class="form-group col-md-12">

                           <textarea cols="6" rows="1" id="comments" name="comments" class="form-control " placeholder="details"></textarea>

                           <span class="error"> <?php echo $nameErr;?></span>

                    </div>

                    <div class="text-center"><input id="submit" name="submit" class="button Submit" value="Submit Now !" type="submit"></div>

                    </form>

                    

                </div>

                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">

                	<h4>CONTACT US</h4>

                    <p><i class="fa fa-home"></i>		47, London Road,SW17 9JR</p>

                    <p><i class="fa fa-mobile"></i> 	020 3632 7395 </p>

                    <p><i class="fa fa-clock-o"></i>	10 am - 7 pm Mon - Sat</p>

                    <p><i class="fa fa-envelope"></i>	info@maestates.net</p>

                    

                    

                </div>

            </div>

        </div>

        <div class="footer_buttom">

        	<div class="container">

            	<div class="row">

                	<p>© All Rights Reserved | Powered By <a href="http://webhouse4u.co.uk/" target="_blank">webhouse4u</a></p>

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

   <script>

//		$(document).ready(function() {

//		  $("#latest_Pro_slider").owlCarousel({

//			  navigation : true, // Show next and prev buttons

//			  slideSpeed : 300,

//			  pagination :false,

//			  singleItem:true,

//			  });

//			  // Custom Navigation Events

//			  $(".next").click(function(){

//				owl.trigger('owl.next');

//			  })

//			  $(".prev").click(function(){

//				owl.trigger('owl.prev');

//			  })

//         });

     </script>

    <script>

		$(document).ready(function() {

		  var owl = $("#latest_Pro_slider");

			  owl.owlCarousel({

			  navigation : false, // Show next and prev buttons

		      slideSpeed : 300,

		      pagination :false,

			  singleItem:true,

			  });

			  //Custom Navigation Events

		  $(".next").click(function(){

			owl.trigger('owl.next');

		  })

			  $(".prev").click(function(){

			owl.trigger('owl.prev');

			  })

         });

    </script>

     <script>

		$(document).ready(function() {

		  var owl = $("#latest_Pro_slider2");

			  owl.owlCarousel({

			  navigation : false, // Show next and prev buttons

		      slideSpeed : 300,

		      pagination :false,

			  singleItem:true,

			  });

			  //Custom Navigation Events

		  $(".next2").click(function(){

			owl.trigger('owl.next');

		  })

			  $(".prev2").click(function(){

			owl.trigger('owl.prev');

			  })

         });

    </script>

    

    

</body>

</html>



