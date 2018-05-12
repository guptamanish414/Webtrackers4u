<?php

session_start();

include('coomon.php');



?>



<!DOCTYPE html>

<html lang="en">

<head>

<title><?php echo $site['siteTitle'];?><?php echo $os->getSettings('siteTitle');?><?php echo $os->wtospage['heading'];?></title>

<link rel="shortcut icon" href="<?php   echo $site['shortcut icon'];?>" />

<meta charset="utf-8">

<meta name="keywords" content="<?php echo $site['keywords'];?> <?php echo $os->getSettings('metaKey');?> <?php echo $os->wtospage['metaTag'];?>   ">

<meta name="description" content="<?php echo $site['description'];?> <?php echo $os->getSettings('metaDescription');?> <?php echo $os->wtospage['metaDescription'];?> ">



<script src="<?php echo $site['url']?>js/basic.function.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo $site['themePath']?>css/reset.css" type="text/css" media="all">

<link rel="stylesheet" href="<?php echo $site['themePath']?>css/font-awesome.min.css"  type="text/css" media="all">

<link rel="stylesheet" href="<?php echo $site['themePath']?>css/bootstrap.min.css" type="text/css" media="all">

<link rel="stylesheet" href="<?php echo $site['themePath']?>css/owl.carousel.css" type="text/css" media="all">

<link rel="stylesheet" href="<?php echo $site['themePath']?>css/style.css" type="text/css" media="all">

<link rel="stylesheet" href="<?php echo $site['themePath']?>css/responsive.css" type="text/css" media="all">



<script type="text/javascript" src="<?php echo $site['themePath']?>js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo $site['themePath']?>js/bootstrap.min.js" ></script>

<script type="text/javascript" src="<?php echo $site['themePath']?>js/owl.carousel.min.js"></script>

<script type="text/javascript" src="<?php echo $site['themePath']?>js/jquery.smoove.js"></script>

<script type="text/javascript" src="<?php echo $site['themePath']?>js/script.js"></script>

   

<!--[if lt IE 9]>

<script src="js/html5.js"></script>

<style type="text/css">.bg{behavior:url("js/PIE.htc");}</style>

<![endif]-->



</head>

<body>

<? // include ('wtcookie.php'); ?>

	<header>

    	<div class="container">

        	<div class="row">

            	<a href="<? echo $site['url']; ?>" class="logo"></a>

                <ul class="soc_ico">

                    <li><a href="https://www.facebook.com/maestates/" target="_blank"><img src="<?php echo $site['themePath']?>images/facebook.png" title="facebook" alt=""></a></li>

                    <li><a href="#" target="_blank"><img src="<?php echo $site['themePath']?>images/twitter.png" title="twitter" alt=""></a></li>

                    <li><a href="https://plus.google.com/u/0/114849670290638539672/posts" target="_blank"><img src="<?php echo $site['themePath']?>images/google.png" title="google pluse" alt=""></a></li>

                </ul>

                <div class="infoTopWrap">

                    <div class="location">

                        <span class="info_icon icon-house"><i class="fa fa-home"></i></span>

                        <span class="contact_info_location">

                            <b>47, London Road,</b>

                            <br>SW17 9JR

                        </span>

                    </div>

                    <div class="location">

                        <span class="info_icon icon-house"><i class="fa fa-clock-o"></i></span>

                        <span class="contact_info_location">

                            <b>Mon-Sat</b>

                            <br>10:00 am to 07:00 pm

                        </span>

                    </div>

                    <div class="location">

                        <span class="info_icon icon-house"><i class="fa fa-envelope"></i></span>

                        <span class="contact_info_location">

                            <b>E-mail:</b>

                            <br>info@maestates.net

                        </span>

                    </div>

                    

				</div>

            </div>

        </div>

    </header>

    <div class="menu_wrapper clearfix" data-spy="affix" data-offset-top="100">

    	<div class="container">

        	<div class="row">

            	<a href="#" class="menu_toggle"><i class="fa fa-bars"></i></a>

            	<div class="right_text"><span class="icon"><img src="<?php echo $site['themePath']?>images/call.png" alt=""/>

                <span class="text">Call our helpline:</span> 020 3632 7395

                </span>

                </div>

            	<? include('wtNav.php'); ?>

            </div>

        </div>

    </div>