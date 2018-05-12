<?php
session_start();
include('coomon.php');
include('title.php');
//_d($_SESSION['rosette-cart']);
//_d($_SESSION);
?>

<?php
    ## Keyword Search Start
    $keywordWhr='';
    $kWord='';
    if(isset($pageVar['segment'][1]) && $pageVar['segment'][1]=='Products'){
    if(isset($pageVar['segment'][2]) && $pageVar['segment'][2]!=''){    
        if($pageVar['segment'][2]!='All' && strpos($pageVar['segment'][2],'Serach_Keyword=')!==false){
            $kWord=str_replace('Serach_Keyword=','',$pageVar['segment'][2]);
            $kWord = mysql_real_escape_string($kWord);
            $keywordWhr="AND (name LIKE '%$kWord%' OR ourPrice LIKE '%$kWord%' OR fullDescription LIKE '%$kWord%' OR shortDescription LIKE '%$kWord%')";
        }
    }                   
    }
    ## Keyword Search End
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $site['keywords'];?> <?php echo $os->getSettings('metaKey');?> <?php echo $os->wtospage['metaTag'];?>   ">
	<meta name="description" content="<?php echo $site['description'];?> <?php echo $os->getSettings('metaDescription');?> <?php echo $os->wtospage['metaDescription'];?> ">
    <meta name="author" content="">
    <title>Online Shopping | <?php echo $os->getSettings('siteTitle');?>  <?php echo $os->wtospage['heading'];?> <?php echo $os->wtospage['metaTitle'];?></title>
    
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $site['themePath'];?>css/bootstrap.min.css" rel="stylesheet" type='text/css'>

    <!-- Custom CSS -->
    <link href="<?php echo $site['themePath'];?>css/modern-business.css" rel="stylesheet" type='text/css'>

    <!-- Custom Fonts -->
    <link href="<?php echo $site['themePath'];?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <link rel="stylesheet" href="<?php echo $site['themePath'];?>css/jquery.mCustomScrollbar.css" type="text/css">
   <link rel="stylesheet" href="<?php echo $site['themePath'];?>css/style.css" type="text/css">
   <link rel="stylesheet" href="<?php echo $site['themePath'];?>css/rasponsive.css" type="text/css">
   <link rel="stylesheet" href="<?php echo $site['themePath'];?>css/magiczoom.css" rel="stylesheet" type="text/css" />
   
   <meta name="keywords" content="<?php echo $site['keywords'];?> <?php echo $os->getSettings('metaKey');?> <?php echo $os->wtospage['metaTag'];?>   ">
<meta name="description" content="<?php echo $site['description'];?> <?php echo $os->getSettings('metaDescription');?> <?php echo $os->wtospage['metaDescription'];?> ">
<link rel="shortcut icon" href="<?php echo $site['shortcut icon'];?>" />


</head>

<body>
	<div class="header">
    	<div class="top">
    	<?php
				$myOrdersLink=$site['url'].'login/ref-url=my-orders';				
				if($os->isLogin()){$myOrdersLink=$site['url'].'my-orders';}
			?>
        	<div class="container">
            	<div class="row">
            	<?php if(!$os->isLogin()){?>
	            	<div class="top-bar clearfix">
			            <h2>Your Account 
			                <div class="acc-drop">
			                    <a href="<?php echo $seoLink->l('login');?>">Login</a>
			                    <a href="<?php echo $seoLink->l('sign-up');?>">Register</a>
			                    <a href="<?php echo $seoLink->l('');?>">My Account</a>
			                </div>
			                
			            </h2>
	        		</div>
	        		<?php }else{?>
	        		
	        		<div class="top-bar clearfix">
			            <h2>Welcome <?php echo $os->userDetails['name'];?> 
			                <div class="acc-drop">
			                    <a href="<?php echo $site['url'];?>index.php?logout=logout">Logout</a>
			                    <a href="<?php echo $seoLink->l('sign-up');?>">Register</a>
			                    <a href="<?php echo $seoLink->l('');?>">My Account</a>
			                </div>
			                
			            </h2>
	        		</div>
                
                <?php }?>
       			</div>
            </div>
        </div>
        <div class="container">
        	<div class="mid-nav clearfix">
            <div class="logo">
              <a href="<?php echo $seoLink->l();?>"> <img src="<?php echo $site['themePath'];?>images/rosette.png" alt=""><!--<i class="fa fa-shopping-cart"></i> rosette--></a>
            </div>	
            <div class="logo-right clearfix">
                <div class="call-us">
                    <h2>Call Us On<br><span>033 60064823</span></h2>																													
                </div>
                <div class="cart">
                    <h2>Shopping Cart</h2>
                    <h3>Items <?php if(!empty($_SESSION['rosette-cart'])) {echo " ".count($_SESSION['rosette-cart']);}else{echo "0"; }?><span style="margin-left: 3px;"><?php if(!empty($_SESSION['rosette-cart'])){echo $os->currency ." "; echo number_format($_SESSION['rosette-cart'][(count($_SESSION['rosette-cart'])-1)]['totalOrder'],2);}
					else{echo $os->currency."0.00"; } ?></span></h3>	`
                    <a href="<?php echo $seoLink->l('shopping-cart');?>">Checkout</a>
                </div>
            </div>
        </div>
        </div>
        <div class="nav_menu">
        	<? include('wtNav.php'); ?>
        </div>
        <div class="nav-btm clearfix">
        	<div class="container">
            	<?php include ('topLinkingPage.php'); ?>  
            </div>
        </div>
    </div>