<?
session_start();
ob_start();
include('Rosemary/includes/config.php');
include('Rosemary/application/coomon.php');
ob_end_clean(); 
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="rosettamcdermott.com,Dark Chocolate,Rosemary McDermott ,high street fashion,style for women">
    <meta name="description" content="Rosette by Rosemary McDermott Rose, came into being as a high street fashion wear brand for women. The brand designs contemporary clothes to suit

the free spirited style for women of all ages. The products reflect THE WOMAN in all its creation. Rosette aspires to incorporate different

cultures, colors and looks that are boundless to a particular person or place.
Dark Chocolate is about a journey of an absolute straight woman who turns to a lesbian relationship for solace and peace of mind. No matter what

type of relationship you are in, there are rules, but rules in a lesbian relationship are something that a lot of people don't understand.">
    <meta name="author" content="Rosemary McDermott Rose">

    <title>rosettamcdermott.com - Rosette by Rosemary McDermott Rose, came into being as a high street fashion wear brand for women.</title>
    
    <link rel="icon" type="image/png" href="Rosemary/wtos-theme/images/fav.png"/>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="css/freelancer.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logo" href="#page-top"><img src="images/rosettamcdermott_logo.png" alt="rosettamcdermott_logo" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <!--<li class="page-scroll">
                        <a href="#event">Event</a>
                    </li>-->
                    <li class="page-scroll">
                        <a href="#dark_chocolate">Dark Chocolate</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#rosette">Rosette</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#author">Author</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#feedback">Feedback</a>
                    </li>
                     <li class="page-scroll">
                        <a href="#Contacts">Contacts</a>
                    </li>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- banner -->
    <div class="banner">
    <div id="myCarouse" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">

            <li data-target="#myCarouse" data-slide-to="0" class="active"></li>

            <li data-target="#myCarouse" data-slide-to="1"></li>

            <li data-target="#myCarouse" data-slide-to="2"></li>

        </ol>   

        <!-- Wrapper for carousel items -->

        <div class="carousel-inner">
        
            <? $qu = "select title,image  from banner where type = 'MainPage' AND status = 'Active' ORDER BY type ASC ";
				//$homeBanRs = $os->mq( $qu );
				//$homeBanImg = $os->mfa($homeBanRs);
				//print_r($homeBanImg);
			$re = $os->getMe($qu);
			$counter = 0;
			foreach($re as $value){
				//_d($value);
				
			?>
			<? if($counter ==  0){ ?>
			<div class="item active">
				<img src="Rosemary/<?  echo $value['image']?>"	alt="<?  echo $value['title']?>" />
			</div>
			<? }else{?>
			
			<div class="item">
				<img src="Rosemary/<?  echo $value['image']?>"	alt="<?  echo $value['title']?>" />
			</div>
                            
            <? } $counter ++ ; }?>
            

        </div>

        <!-- Carousel controls -->
        <!--<a class="carousel-control left" href="#myCarouse" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>

        <a class="carousel-control right" href="#myCarouse" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>-->
    </div>
    </div>
    
    <div class="socel_icon_bar">
    	<div class="container">
        	<div class="row">
            	<a href="https://www.facebook.com/Dark-Chocolate-by-Rosetta-662809193861110/" target="_blank"><img src="images/facebook.png" alt=""/></a>
                <a href="https://plus.google.com/104175317113986354910/posts" target="_blank"><img  src="images/google.png" alt=""/></a>
                <a href="https://twitter.com/dermott3mc" target="_blank"><img src="images/twitter.png" alt=""/></a>
                <a href="https://www.instagram.com/rosettemcdermott/" target="_blank"><img src="images/instagram.png" alt=""/></a>
                <a href="http://iconosquare.com/rosettemcdermott" target="_blank"><img  src="images/iconosquare.png" alt=""/></a>
            </div>
        </div>
    </div>
    
    
    <? $allEvents=$os->getMe("SELECT * FROM events WHERE eventId>0 LIMIT 3");
		//_d($allEvents);
		if($allEvents){
	 ?>
<div class="row">
      <h1>Events</h1>
       <div id="event" class="section section_1 event">
    	<div class="container">
                <? foreach($allEvents as $event){
					
					//_d($event);
				?>
                
                <div class="col-md-4">
                	<div class="block_contain">
                	<img src="<? echo $site['url']."/".$event['image'];?>"/>
                    <h3><? echo $event['title'];?></h3>
                    <p><? echo substr($event['details'],0,85).'.....';?></p>
                    <a href="<? echo $site['url']?>events" class="button buy_now">Read More</a>
                    </div>
                </div>
                <? }?>
            </div>
 		</div>
    </div>

 <? 	} ?>
 
        	
        
        
        
 <? $allProducts=$os->getMe("SELECT * FROM product  LIMIT 3");
		//_d($allProducts);
		
		if($allProducts){ ?>
        
    <div id="rosette" class="section section_2 rosette">
    	<div class="container">
        	<div class="row">
            	<h1>Rosette</h1>
                
                <div id="rosette_slide" class="owl-carousel owl-theme">
                	
                    <? foreach($allProducts as $products){
						$productId = $products['productId'];
						$featuredProduct = "SELECT title,image FROM image WHERE imageTypeId= $productId AND featured='Yes' AND active='1' ORDER BY image DESC LIMIT 4 ";
				$bbRs = $os->mq( $featuredProduct );
				$productImg = $os->mfa($bbRs);
				$img = $productImg['image'];
						
						
						?>
                    	
                
                	<div class="item">
                    	
                    	<div class="block_contain">
                        <img src="<? echo $site['url'] . $img;?>" alt="rosettamcdermott_rosette_1"/>
                        <p><? echo substr($products['shortDescription'],0,200)?>... </p>
                        <a href="<?php echo $site['url'];?>product-details/<?php echo $products['seoId'];?>" class="button buy_now">Buy Now</a>
                      </div>
                    </div>
                    
                    <? }?>
                    
    
                </div>
            </div>
        </div>
    </div>
    
 <? 	} ?>
    
    <div id="dark_chocolate" class="section section_1 dark_chocolate">
    	<div class="container">
        	<div class="row">
            	<h1>Dark Chocolate</h1>
                
                <div id="dark_chocolate_slide" class="owl-carousel owl-theme">
                	<div class="item">
                    	<div class="block_contain">
                            <img src="images/rosettamcdermott_dark_ chocolate1.jpg" alt="rosettamcdermott_dark_ chocolate1"/>
                            <p>Dark Chocolate is about a journey of an absolute straight woman who turns to a lesbian relationship for solace and peace of mind. No matter what type of relationship you are in, there are rules, but rules in a lesbian relationship are something that ... </p>
                            <a href="https://notionpress.com/store/addtocart/1260" class="button buy_now">Buy Now</a> <a href="https://notionpress.com/store/addtocart/1260" class="button button_outline">Read Sample</a>
                       </div>
                    </div>
                    <div class="item">
                  	<div class="block_contain">
                	<img src="images/rosettamcdermott_dark_ chocolate2.jpg" alt="rosettamcdermott_dark_ chocolate2"/>
                    <p>Previously, there were heavy discussions on Section 377. Sheeba did freak out, but she stood by her partner at all times and made her comfortable with who she was.

In India, people cannot voice about getting a divorce or getting into a gay ...
</p>
<a href="https://notionpress.com/store/addtocart/1260" class="button buy_now">Buy Now</a> <a href="https://notionpress.com/store/addtocart/1260" class="button button_outline">Read Sample</a>
                    </div>
                   </div>
                    <div class="item">
                  	<div class="block_contain">
                	<img src="images/rosettamcdermott_dark_ chocolate3.jpg" alt="rosettamcdermott_dark_ chocolate3"/>
                    <p>She has tried all the bad and good stuff in life. She knows what to choose and what to disregard—a strong woman in a not-so-strong body.
Sheeba's relationship with her partner is not about sex but about finding a soulmate, a friend and a lover.
</p>
                    
                    <a href="https://notionpress.com/store/addtocart/1260" class="button buy_now">Buy Now</a> <a href="https://notionpress.com/store/addtocart/1260" class="button button_outline">Read Sample</a>
                    </div>
                   </div>
               </div>
           </div>
        </div>   
    </div>   
    
    
    
    
    <div id="author" class="section section_3 author">
    	<div class="container">
        	<div class="row">
            	<h1>Author</h1>
                <div class="row">
                	<div class="col-md-2 col-sm-3">
                    	<div class="left_image">
                        	<img src="images/rosettamcdermott_author_1.jpg" class="img-circle" alt="rosettamcdermott_author_1"/>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-9">
                    	<div class="right_text">
                        	<h3>Rosemary McDermott</h3>
                        <p>Rosemary McDermott was born in the year 1979 in Orissa, brought up in a convent educated boarding school.
She is a fashion designer and the founder of Rosette, its a small boutique run by her in her Kolkata, under the label of Rosette. She designs Western and Indian clothes
She is also the author of Dark Chocolate which has been published this year 2016.
</p>
                        </div>
                    	
                    </div>
                </div>
            </div>
        </div>
      </div>
      
    <div id="feedback" class="section section_4 feedback">
    	<div class="container">
        	<div class="row">
            	<h1>Feedback</h1>
                <div class="row">
                
                	<div id="feedback_slide" class="owl-carousel owl-theme">
                    	<div class="item">
                        	<div class="feedback_box">
                        	<img src="images/rosettamcdermott_feedback_1.jpg" alt="rosettamcdermott_feedback_1"/>
                            <h3>Ruth White</h3>
                            <h4>SBIHM, SALTLAKE</h4>
                            <p>Received a personalised copy frm d author.. Enjoyed reading this book!! I suggest u all to get a copy!!</p>
                            <div class="time">Jan 26, 2016 4:51am</div>
                        </div>
                        </div>
                        <div class="item">
                        	<div class="feedback_box">
                        	<img src="images/rosettamcdermott_feedback_2.jpg" alt="rosettamcdermott_feedback_2"/>
                            <h3>Annah V Devraj</h3>
                            <h4>Loreto College, Kolkata</h4>
                            <p>Reading a bk n knwin d story is jst sumthng dt everyone does bt knwin a person n readin d story is an ... </p>
                            <div class="time">Jan 26, 2016 4:51am</div>
                        </div>
                        </div>
                        <div class="item">
                        	<div class="feedback_box">
                        	<img src="images/rosettamcdermott_feedback_3.jpg" alt="rosettamcdermott_feedback_3"/>
                            <h3>Moumita Koyal</h3>
                            <h4>SBIHM, SALTLAKE</h4>
                            <p>Quiet an insightful story. A story of a woman who survives all odds. Kudos to the survivor. True as a Rose.</p>
                            <div class="time">Jan 26, 2016 4:51am</div>
                        </div>
                        </div>
                        <div class="item">
                        	<div class="feedback_box">
                        	<img src="images/rosettamcdermott_feedback_4.jpg" alt="rosettamcdermott_feedback_4"/>
                            <h3>Nancy Dupratt</h3>
                            <p>I got the book signed by the author herself.Fantastic book! Must read you wont regret it !!!</p>
                            <div class="time">Jan 26, 2016 9:31pm</div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="Contacts" class="section section_5 Contacts">
    	<div class="container">
        	<div class="row">
            	<h1>Contact</h1>
                <div class="col-md-8 col-sm-8">
                	<div class="row">
                    	<div class="col-md-8 col-sm-6 col-xs-12">
                        	<div class="map">
                        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:250px;width:450px;'><div id='gmap_canvas' style='height:300px;width:450px;'></div><div><small><a href="http://embedgooglemaps.com">									embed google maps							</a></small></div><div><small><a href="https://disclaimergenerator.net">disclaimer generator</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(22.5289715,88.36968760000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(22.5289715,88.36968760000002)});infowindow = new google.maps.InfoWindow({content:'<strong>Rosetta McDermott</strong><br>68 Bondel Road, Kolkata 700019<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                            
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                        	<div class="contact_info">
                            	<h2>Address</h2>
                            <address>
                               68 Bondel Road<br/>
                                Kolkata 700019<br/>
                                Mobile: 8420867149<br/>
                                Office: 033 60064823<br/>
                                Business hours 10 am – 10pm<br/>
                                Book appointment on 033 60064823
                            </address>
                            <ul class="sosel_icon">
                                <li><a href="https://www.facebook.com/Dark-Chocolate-by-Rosetta-662809193861110/" target="_blank"><img src="images/facebook.png" alt=""/></a></li>
                                <li><a href="https://twitter.com/dermott3mc" target="_blank"><img src="images/twitter.png" alt=""></a></li>
                                 <li><a href="https://plus.google.com/104175317113986354910/posts" target="_blank"><img  src="images/google.png" alt=""/></a></li>
                                 <li><a href="https://www.instagram.com/rosettemcdermott/" target="_blank"><img  src="images/instagram.png" alt=""/> </a></li>
                                 <li><a href="http://iconosquare.com/rosettemcdermott" target="_blank"><img  src="images/iconosquare.png" alt=""/></a></li>
                            </ul>
                            
                            </div>
                        </div>
                    
                    </div>
                	
                </div>
                <div class="col-md-4 col-sm-4">
                <? $allPhotos=$os->getMe("SELECT name,title,galleryCatagoryId FROM photogallery ORDER BY RAND() LIMIT 6")?>
                	<div class="gallery">
                    	<h2>Images</h2>
                        <? if($allPhotos){ ?>
                         <ul class="gallery_images">
                         
                         	<? foreach($allPhotos as $photos){ ?>
                            
                        	<li><a href="<? echo $site['url'].'Gallery/'.$photos['galleryCatagoryId'];?>"><img src="<? echo $site['url'].'/wtos-images/'.$photos['name']?>" alt="<? echo $photos['title']?>"/></a></li>
                            
                            <? }?>
                            
                        </ul>
                        <? }else{?>
                        <ul class="gallery_images">
                        	<li><a href="<? echo $site['url'].'/Gallery';?>"><img src="images/rosettamcdermott_gallery_1.jpg" alt="rosettamcdermott_gallery_1"/></a></li>
                            <li><a href="<? echo $site['url'].'/Gallery';?>"><img src="images/rosettamcdermott_gallery_2.jpg" alt="rosettamcdermott_gallery_2"/></a></li>
                            <li><a href="<? echo $site['url'].'/Gallery';?>"><img src="images/rosettamcdermott_gallery_3.jpg" alt="rosettamcdermott_gallery_4"/></a></li>
                            <li><a href="<? echo $site['url'].'/Gallery';?>"><img src="images/rosettamcdermott_gallery_4.jpg" alt="rosettamcdermott_gallery_6"/></a></li>
                            <li><a href="<? echo $site['url'].'/Gallery';?>"><img src="images/rosettamcdermott_gallery_5.jpg" alt="rosettamcdermott_gallery_5"/></a></li>
                            <li><a href="<? echo $site['url'].'/Gallery';?>"><img src="images/rosettamcdermott_gallery_6.jpg" alt="rosettamcdermott_gallery_6"/></a></li>
                        </ul>
                        
                        <? } ?>
                    </div>
                	
                
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
    	<div class="container">
        	<div class="row">
            	<div>© 2016 Rosetta McDermott. All Rights Reserved | Powered By <a href="http://webtrackers.co.in/" target="_blank">webtrackers.co.in</a></div>
            
            </div>
        </div>
    </div>
   
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <!--<script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>-->
    <script src="js/owl.carousel.min.js"></script>

    <!-- Custom Theme JavaScript -->
   <script src="js/freelancer.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
	 var owl = $("#dark_chocolate_slide");
 
	  owl.owlCarousel({
		  items : 3, //10 items above 1000px browser width
		  itemsDesktop : [1000,3], //5 items between 1000px and 901px
		  itemsDesktopSmall : [991,2], // betweem 900px and 601px
		  itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
	  });
   });
    </script>
    <script type="text/javascript">
	$(document).ready(function() {
	 var owl = $("#rosette_slide");
 
	  owl.owlCarousel({
		  items : 3, //10 items above 1000px browser width
		  itemsDesktop : [1000,3], //5 items between 1000px and 901px
		  itemsDesktopSmall : [991,2], // betweem 900px and 601px
		  itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
	  });
   });
    </script>
    <script type="text/javascript">
	$(document).ready(function() {
	 var owl = $("#feedback_slide");
 
	  owl.owlCarousel({
		  items : 4, //10 items above 1000px browser width
		  itemsDesktop : [1000,4], //5 items between 1000px and 901px
		  itemsDesktopSmall : [991,3], // betweem 900px and 601px
		  itemsTablet: [600,2], //2 items between 600 and 0
		  itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
	  });
   });
   
   function loadEvent()
   {
	   var url = "Rosemary/application/ajxSysytem.php?eventShow=OK" ;
	   
	   os.setAjaxHtml('eventsHtml',url)
   }
 //  loadEvent();
    </script>
</body>

</html>
