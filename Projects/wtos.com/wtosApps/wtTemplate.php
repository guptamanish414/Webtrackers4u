<?php 
include('wtCommon.php');

?>

<!DOCTYPE html>
<html>
<head>
<title> <?php echo $os->getSettings('siteTitle');?>  <?php echo $os->wtospage['metaTitle'];?>  <?php echo $os->wtospage['heading'];?> </title>

<meta name="keywords" content="<?php echo $os->getSettings('metaKey');?> <?php echo $os->wtospage['metaTag'];?>   ">
<meta name="description" content="<?php echo $os->getSettings('metaDescription');?> <?php echo $os->wtospage['metaDescription'];?> ">
<script type="text/javascript" src="<? echo $site['url-library']?>wtos-1.1.js"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/animate.css">
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/slick.css">
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/theme.css">
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/style.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
<?php echo $os->getSettings('Styles'); ?>
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="header_top">
          <div class="header_top_left">
             
          </div>
          <div class="header_top_right">
            <form action="#" class="search_form">
              <input type="text" placeholder="Text to Search">
              <input type="submit" value="">
            </form>
          </div>
        </div>
        <div class="header_bottom">
          <div class="header_bottom_left"><a class="logo" href="index.html">mag<strong>Express</strong> <span>A Pro Magazine Template</span></a></div>
          <div class="header_bottom_right"><a href="#"><img src="<? echo $site['themePath']?>images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <? include('wtNav.php'); ?>
        </div>
      </div>
    </nav>
  </div>
  
  
  
 <!-------------------- content--->
 <section id="mainContent">
   <?   include($site['application'].$content); ?>
    </section>
 <!-------------------- content--->
  
  
   
</div>
<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Flicker Images</h2>
            <ul class="flicker_nav">
              <li><a href="#"><img src="<? echo $site['themePath']?>images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="<? echo $site['themePath']?>images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="<? echo $site['themePath']?>images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="<? echo $site['themePath']?>images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="<? echo $site['themePath']?>images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="<? echo $site['themePath']?>images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="<? echo $site['themePath']?>images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="<? echo $site['themePath']?>images/75x75.jpg" alt=""></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInDown">
            <h2>Labels</h2>
            <ul class="labels_nav">
              <li><a href="#">Gallery</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Games</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">Slider</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInRight">
            <h2>About Us</h2>
            <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec laoreet orci, eget ullamcorper quam. Phasellus lorem neque, </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_left">
            <p>Copyright &copy; 2045 <a href="index.html">magExpress</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_right">
            <p>Developed BY Wpfreeware</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="<? echo $site['themePath']?>js/jquery.min.js"></script> 
<script src="<? echo $site['themePath']?>js/bootstrap.min.js"></script> 
<script src="<? echo $site['themePath']?>js/wow.min.js"></script> 
<script src="<? echo $site['themePath']?>js/slick.min.js"></script> 
<script src="<? echo $site['themePath']?>js/custom.js"></script>
</body>
</html>
