<?php
session_start();
include('coomon.php');
include('title.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo $site['shortcut icon'];?>"/>
<link rel="stylesheet" href="<?php echo $site['themePath'];?>css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $site['themePath'];?>css/menu.css" type="text/css" />


<script type="text/javascript" src="<?php echo $site['url'];?>js/basic.function.js"></script>
<script type="text/javascript" src="<?php echo $site['url'];?>js/common.js"></script>
<script type="text/javascript" src="<?php echo $site['url'];?>js/newfunction.js"></script>

<script src="<?php echo $site['url'];?>/wtos/js/datepkr/jquery-1.7.2.js"></script>

<script>
	function checkCouponMsg(msg){
		//alert(msg);return false;
		os.setHtml('couMsg','');os.setVal('cCode_top','');
		switch(msg){
			case '0':
			os.setHtml('couMsg','<font style="color:#008000;">Coupon successfully applied.</font>');
			os.setVal('cCode_top',os.getVal('cCode'));
			break;
			case '1':
			os.setHtml('couMsg','<font style="color:#F00;">This is not a valid coupon.</font>');
			break;
			case '2':
			os.setHtml('couMsg','<font style="color:#F00;">This coupon is not for this category.</font>');
			break;
			case '3':
			os.setHtml('couMsg','<font style="color:#F00;">Number of product not matched with the coupon.</font>');
			break;			
			default:
			//code to be executed if n is different from case 1 and 2
		}		
	}
	
	function checkCouponMsgTop(msg){
		if(msg==1){window.location='<?php echo $site['url'];?>Products';}else{alert('This is not a valid coupon');}
	}
	
	function checkCoupon(pCount,pIds,top){		
		if(top==0){
			cCode = os.getVal('cCode');	
			if (chkEmpty(cCode)) {os.setHtml('couMsg','<font style="color:#F00;">Please enter correct coupon code.</font>');os.getObj('cCode').focus();}else{
				var url = '<?php echo $site['url'];?>application/ajxSysytem.php?checkCoupon=ok&cCode='+cCode+'&pCount='+pCount+'&pIds='+pIds;
				//alert(url);			
				os.animateMe.div='couMsg';						
				os.animateMe.html='<img src="<?php echo $site['themePath'];?>images/ajax-loader.gif" alt="" border="0" /> Working....';			
				os.setAjaxFunc('checkCouponMsg',url);
				
			}
		}
		
		if(top==1){
			cCode = os.getVal('cCode_top');	
			if (chkEmpty(cCode)) {alert('Please enter correct coupon code.');os.getObj('cCode_top').focus();}else{
				var url = '<?php echo $site['url'];?>application/ajxSysytem.php?checkCouponTop=ok&cCode='+cCode;
				os.setAjaxFunc('checkCouponMsgTop',url);
			}
		}
	}
</script>

<title><?php echo $pageTitle;?></title>
<!--[if IE 6]>
<style>
body {behavior: url("<?php echo $site['url'];?>csshover3.htc");}
#menu li .drop {background:url("<?php echo $site['themePath'];?>images/drop.gif") no-repeat right 8px; 
</style>
<![endif]-->
</head>

<body>
<?php
	$os->mq("SET SESSION group_concat_max_len = 999999999"); // important ...Mrinal...
	#Top Banner
	$tbQ = "SELECT title,image,link FROM banner WHERE type='Header' AND status='Active' ORDER BY RAND() LIMIT 1";
	$tbRs = $os->mq($tbQ);
	$topBanner=$os->mfa($tbRs);
?>
<div class="wraper">
	<div class="header">
    	<div class="top">
            <div class="offerBar">
            <a href="#"><img src="<?php echo $site['themePath'];?>images/offer.png" style="float:left; margin-right:5px; margin-top:8px;" /></a>
            	<h1><a href="#">Buy 2 tshirts and&nbsp;&nbsp;<span>Get 1 tshirt free only at</span>&nbsp;&nbsp;<b>admin@webtrackers.co.in</b></a></h1>
                <div id="coupon">
				<?php				
					$couponCode='';$couponMsg='';
					if(isset($_SESSION['Imposter_Coupon'])){
					$couponCode=$_SESSION['Imposter_Coupon']['code'];
					$couponMsg='';
					}
                ?>
                	<p>Use coupon code:</p>
                    <input name="" type="text" class="code" id="cCode_top" value="<?php echo $couponCode;?>" placeholder="FREE" />
                    <a href="javascript:void(0)" onclick="checkCoupon('','',1);"><img src="<?php echo $site['themePath'];?>images/go.gif" style="margin-left:15px; margin-bottom:-3px;"/></a>
                </div>
            </div>
            <?php
				$myOrdersLink=$site['url'].'login/ref-url=my-orders';				
				if($os->isLogin()){$myOrdersLink=$site['url'].'my-orders';}
			?>
            <div class="offerBar order">
            	<h1>need help? <a href="<?php echo $site['url'];?>contact">contact us</a> / <a href="<?php echo $myOrdersLink;?>">my orders</a> <span>free shipping & returns</span>
                <div class="right">
                <?php if(!$os->isLogin()){?>
                <div>
                sing up and get 25% off coupon &#9658;&nbsp;&nbsp;&nbsp;<a href="<?php echo $site['url'];?>login">login</a> / <a href="<?php echo $site['url'];?>sign-up">sing up</a>
                </div>
                <?php }else{?>
                <div>
               Welcome &nbsp;<font style="color:#007CF9;"><?php echo $os->userDetails['name'];?></font> &nbsp;&nbsp; &#9658;&nbsp;&nbsp;
               <a style="color:#FF3C3C;" href="<?php echo $site['url'];?>index.php?logout=logout">logout</a>
                </div>
                <?php }?>
                </div>
                </h1>
                
            </div>
            
            <div class="add">
            	<!--<a href="<?php echo $site['url'];?>"><div class="logo"></div></a>-->
                <a href="<?php echo $site['url'];?>"><img src="<?php echo $site['themePath'];?>images/logo.png"/></a>
                <div class="ads">
                <div class="social">
                    	<a href="#"><img src="<?php echo $site['themePath'];?>images/icon/1.png" /></a>
                        <a href="#"><img src="<?php echo $site['themePath'];?>images/icon/2.png" /></a>
                        <a href="#"><img src="<?php echo $site['themePath'];?>images/icon/3.png" /></a>
                        <a href="#"><img src="<?php echo $site['themePath'];?>images/icon/4.png" /></a>
                        <a href="#"><img src="<?php echo $site['themePath'];?>images/icon/5.png" /></a>
                    </div>
                <div class="SmallAd">
                 <?php if(is_array($topBanner)){?>                    
                        <a target="_blank" href="<?php echo $topBanner['link'];?>" title="<?php echo $topBanner['title'];?>"><img src="<?php echo $site['url'].$topBanner['image'];?>" width="625" height="64" /></a>
                   <?php }?>         
                    </div> 
                
                <h1>Rosette search engine</h1>
                <div class="clr"></div>
                <div class="srchEngn Engn">
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
                        <input value="<?php echo $kWord;?>" name="" id="srchKeyword" type="text" placeholder="TYPE THE PRODUCT OR DESCRIPTION YOU ARE LOOKING FOR" class="srchEngn" />
                        <?php if($kWord==''){?>
                        <span><a href="javascript:void(0)" title="Search" onclick="keywordSearch()"><img src="<?php echo $site['themePath'];?>images/srch.png" /></a></span>
                        <?php }else{?>
                        <span><a href="javascript:void(0)" title="Reset" onclick="resetKeywordSearch()"><img src="<?php echo $site['themePath'];?>images/delete.png" /></a></span>
                        <?php }?>
                        <div id="serachMsg" style="color:#FF2424;"></div>
                        <script>
                        	function keywordSearch(){
								if(os.getVal('srchKeyword')!=''){
									os.setHtml('serachMsg','');
									var kwrd = os.getVal('srchKeyword');
									//kwrd = encodeURIComponent(kwrd);
									var sUrl='<?php echo $site['url'];?>Products/Serach_Keyword='+kwrd;									
									window.location=sUrl;
								}
								else{
									os.setHtml('serachMsg','Please enter something to search');
								}	
							}
							
							function resetKeywordSearch(){
								os.setVal('srchKeyword','');
								window.location='<?php echo $site['url'];?>Products';
							}
                        </script>
                    </div>
                <div class="xtra">
                <?php
                	$myPosterLink='';
					$myWishlistLink=$site['url'].'login/ref-url=my-wish-list';
					$loginText='login';
					if($os->isLogin()){$myWishlistLink=$site['url'].'my-wish-list';$loginText='';}
				?>
                        <ul>
                            <li><a href="<?php echo $site['url'];?>recently-viewed">recently<br />viewed</a></li>
                            <li><a href="#">my posters<br /><font>login</font></a></li>
                            <li><a href="<?php echo $myWishlistLink;?>">my wishlist<br /><font><?php echo $loginText;?></font></a></li>
                            <li><a href="<?php echo $site['url'];?>shopping-cart">my bag<br /><font><?php if(!is_array($_SESSION['imposter-cart']) || (is_array($_SESSION['imposter-cart']) && count($_SESSION['imposter-cart'])<1)){echo 'empty';}?></font></a></li>
                        </ul>
                        
                        <div class="bag">
                        	<p><?php if(is_array($_SESSION['imposter-cart'])){echo count($_SESSION['imposter-cart']);}else{echo 0;}?></p>
                        </div>
                    </div>                    
                </div>
                
            
            </div>
        </div>
        
        <?php include('menu.php');?>
    </div>
    
    <div class="content">
    <?php include('leftCol.php');?>