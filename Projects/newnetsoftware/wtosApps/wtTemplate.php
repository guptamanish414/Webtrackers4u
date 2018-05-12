<?php 
include('wtCommon.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $os->getSettings('siteTitle');?>  <?php echo $os->wtospage['metaTitle'];?>  <?php echo $os->wtospage['heading'];?> </title>
	<meta name="keywords" content="<?php echo $os->getSettings('metaKey');?> <?php echo $os->wtospage['metaTag'];?>   ">
	<meta name="description" content="<?php echo $os->getSettings('metaDescription');?> <?php echo $os->wtospage['metaDescription'];?> ">


	<script type="text/javascript" src="<? echo $site['url-library']?>wtos-1.1.js"></script>
    
    <link rel="icon" type="image/png" href="#"/>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="<? echo $site['themePath']?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<? echo $site['themePath']?>css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<? echo $site['themePath']?>css/style.css" rel="stylesheet" type="text/css">
    <link href="<? echo $site['themePath']?>css/responsive.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="<? echo $site['themePath']?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="197">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logo" href="<? echo $site['url']?>#page-top"><img src="<? echo $site['themePath']?>images/logo.png" alt="" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden"><a href="#page-top"></a></li>
                    <li class="page-scroll"><a href="<? echo $site['url']?>#page_1">About Us</a></li>
                    <li class="page-scroll"><a href="<? echo $site['url']?>#page_2">Prices</a></li>
                    <li class="page-scroll"><a href="<? echo $site['url']?>#page_3">Portfolio</a></li>
                    <li class="page-scroll"><a href="<? echo $site['url']?>#page_4">Press Release</a></li>
                    <li class="page-scroll"><a href="<? echo $site['url']?>#page_5">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
  <?   include($site['application'].$content); ?>
    
    <!--footer part-->
    <div class="footer">
        <!--<div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                        <h4>Estate agent software</h4>
                        <ul class="nav-bottom">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Rezi</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> New Net Software PM</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> New Net SoftwareOne</a></li>
                        </ul>
                   </div>
                   <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                        <h4>Services</h4>
                        <ul class="nav-bottom">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Portals & Marketing</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> New Net Software Legal</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Marketplace</a></li>
                        </ul>
                   </div>
                   <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                        <h4>Support</h4>
                        <ul class="nav-bottom">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Training</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Our support</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Support centre</a></li>
                        </ul>
                   </div>
                   <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                        <h4>Company</h4>
                        <ul class="nav-bottom">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> About us</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Our commitment</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Our customers</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Partners</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Our journey</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Working for us</a></li>
                        </ul>
                   </div>
                   <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                        <h4>News</h4>
                        <ul class="nav-bottom">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Our blog</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Testimonials</a></li>
                        </ul>
                   </div>
                   <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                        <h4>Contact</h4>
                        <ul class="nav-bottom">
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Contact us</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Book a demo</a></li>
                            <li><a href="#"> <i class="fa fa-angle-double-right"></i> Get Support</a></li>
                        </ul>
                   </div>
                </div>
            </div>
        </div>-->
        <div class="container">
             <div class="text-center footer_buttom">© 2016 Newnet Software. All Rights Reserved | Powered By 
              <a href="#" target="_blank"> Newnet Software</a> |
              <a href="http://newnetsoftware.co.uk/inner2.html" target="" style="color:#FFFFFF;"> Terms & Conditions </a>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="<? echo $site['themePath']?>js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<? echo $site['themePath']?>js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<? echo $site['themePath']?>js/owl.carousel.min.js"></script>

    <!-- Custom Theme JavaScript -->
   <script src="<? echo $site['themePath']?>js/freelancer.js"></script>
   <? 
    

  if ( !isset($pageVar ['segment'] [1]) or $pageVar ['segment'] [1] == 'home') {
      ?>

   <script type="text/javascript" charset="utf-8" src="<? echo $site['themePath']?>js/jquery.tubular.js"></script>

      <?  } ?>  

    <script type="text/javascript" charset="utf-8" src="<? echo $site['themePath']?>js/mission-control.js"></script>
   
   <script type="text/javascript">
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
		  itemsMobile : [400,1] // itemsMobile disabled - inherit from itemsTablet option
	  });
	  
	   
    });
  </script>

  <script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:190,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; var refferer = (document.referrer) ? encodeURIComponent(document.referrer) : ''; var location  = (document.location) ? encodeURIComponent(document.location) : ''; po.src = 'https://newnet.livehelperchat.com/chat/getstatus/(click)/internal/(position)/bottom_right/(check_operator_messages)/true/(top)/350/(units)/pixels/(leaveamessage)/true?r='+refferer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })(); </script>
    
</body>

</html>
