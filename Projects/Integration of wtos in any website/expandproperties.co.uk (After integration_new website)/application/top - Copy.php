<?php
session_start();
include('coomon.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $site['siteTitle'];?> | <?php echo $os->getSettings('siteTitle');?> | <?php echo $os->wtospage['heading'];?></title>
<link rel="shortcut icon" href="<?php   echo $site['shortcut icon'];?>" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="keywords" content="<?php echo $site['keywords'];?> <?php echo $os->getSettings('metaKey');?> <?php echo $os->wtospage['metaTag'];?>   ">

<meta name="description" content="<?php echo $site['description'];?> <?php echo $os->getSettings('metaDescription');?> <?php echo $os->wtospage['metaDescription'];?> ">

<script src="<?php echo $site['url']?>js/basic.function.js" type="text/javascript"></script>
<script src="<?php echo $site['url']?>js/common.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo $site['themePath']?>css/font-awesome.min.css"  type="text/css">
<link rel="stylesheet" href="<?php echo $site['themePath']?>css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo $site['themePath']?>css/owl.carousel.css">
<link href="<?php echo $site['themePath']?>css/sumoselect.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo $site['themePath']?>css/style.css" type="text/css">
<link rel="stylesheet" href="<?php echo $site['themePath']?>css/responsive.css" type="text/css">

<script src="<?php echo $site['themePath']?>js/jquery.min.js"></script>
<script src="<?php echo $site['themePath']?>js/bootstrap.min.js" ></script>
<script src="<?php echo $site['themePath']?>js/owl.carousel.min.js"></script>
<!--<script s<?php echo $site['themePath']?>rc="js/jquery.smoove.js"></script>-->
<script src="<?php echo $site['themePath']?>js/jquery.sumoselect.js"></script>
<script src="<?php echo $site['themePath']?>js/script.js"></script>
   
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<style type="text/css">.bg{behavior:url("js/PIE.htc");}</style>
<![endif]-->

</head>
<body>

    <header>
        <div class="header_top">
                <div class="container">
                    <div class="left_site">
                        <a href="<? echo $site['url']; ?>" class="logo"><img src="<?php echo $site['themePath']?>images/logo.png" alt="logo"/></a>
                        <div class="logo_text">
                            <div class="block">
                                <h1>ROWFLEX PROPERTY SERVICES</h1>
                                <h2>Sales,Lettings & Property Management</h2>
                            </div>
                        </div>
                    </div>
                    <div class="right_site">
                         <ul class="soc_ico">
                            <li><a target="_blank" href="https://www.facebook.com/RowflexPropertiesServices/"><img src="<?php echo $site['themePath']?>images/facebook.png"></a></li>
                            <li><a target="_blank" href="https://twitter.com/ROWFLEXPROPERTY"><img src="<?php echo $site['themePath']?>images/twitter.png"></a></li>
                            <li><a target="_blank" href="#"><img src="<?php echo $site['themePath']?>images/google.png"></a></li>
                         </ul>
                         <ul class="contact_info">
                            <li><img src="<?php echo $site['themePath']?>images/call_2.png"/> <h3><? echo $site['homeContact'];?></h3></li>
                            <li><img src="<?php echo $site['themePath']?>images/call_1.png"/> <h3><? echo $site['mobileContact'];?></h3></li>
                            <li><img src="<?php echo $site['themePath']?>images/mail.png"/> <h3><? echo $site['contactEmail'];?></h3></li>
                         </ul>
                    </div>
                </div>
            </div>
        
        <div class="menu_bar">
            <div class="container">
                <a class="toggleMenu" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <? include('wtNav.php'); ?>
                
            </div>
        </div>    
    </header>

