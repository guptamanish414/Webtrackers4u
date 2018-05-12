<?php

	include("../includes/config.php");
	include('../application/coomon.php');
	$slider['url'] = $site['url'].'wt-slider/';	
	$sliderPath = $slider['url'].'nivo-slider/';
	
	
	$sliderImages = $os->get_sliderImage(" sliderImageId>0 ORDER BY title ASC LIMIT 0,10");//Limit 5
	$appearance = $os->get_appearance(" sliderName='nivoSlider.php' AND active=1 LIMIT 0,1");
	
	
	$sliderWidth = 1079;
	$sliderHeight = 600;
	$sliderEffect = 'random';
	$sliderInterval = 2000;
	$sliderAutoplay=0;
	
	
	if(is_array($appearance) && count($appearance)>0){
		$appearance = $appearance[0];
		if($appearance['sliderWidth']>0){$sliderWidth = $appearance['sliderWidth'];}
		if($appearance['sliderHeight']>0){$sliderHeight = $appearance['sliderHeight'];}
		if($appearance['sliderEffect']!=''){$sliderEffect = $appearance['sliderEffect'];}
		if($appearance['sliderInterval']>0){$sliderInterval = $appearance['sliderInterval'];}
		$sliderAutoplay = $appearance['sliderAutoplay'];
	}
	
	
	$sliderAutoplay = ($sliderAutoplay==1)?'false':'true';
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
<head>
    <title>Nivo Slider Testing</title>
	
    <link rel="stylesheet" href="<?php echo $sliderPath;?>themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $sliderPath;?>themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $sliderPath;?>themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $sliderPath;?>themes/bar/bar.css" type="text/css" media="screen" />
	
	
    <link rel="stylesheet" href="<?php echo $sliderPath;?>css/nivo-slider.css" type="text/css" media="screen" />
	
	
</head>
<body>

	
    <!--<div id="wrapper">
       

        <div class="slider-wrapper theme-default">
		
            <div id="slider" class="nivoSlider">
                <img src="<?php echo $sliderPath;?>images/toystory.jpg" data-thumb="<?php echo $sliderPath;?>images/toystory.jpg" alt="" />
                <a href="http://dev7studios.com"><img src="<?php echo $sliderPath;?>images/up.jpg" data-thumb="images/up.jpg" alt="" title="This is an example of a caption" /></a>
                <img src="<?php echo $sliderPath;?>images/walle.jpg" data-thumb="<?php echo $sliderPath;?>images/walle.jpg" alt="" data-transition="slideInLeft" />
                <img src="<?php echo $sliderPath;?>images/nemo.jpg" data-thumb="images/nemo.jpg" alt="" title="#htmlcaption" />
            </div>
			
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="http://www.google.co.in">Google</a>. 
            </div>
        </div>
		

    </div>-->
	
	<?php if((is_array($sliderImages) && count($sliderImages)>0) && (is_array($appearance) && count($appearance)>0)){ ?>
	
	<div id="wrapper">
    <div class="slider-wrapper theme-default" style="width:<?php echo $sliderWidth;?>px; height:<?php echo $sliderHeight;?>px;">
            <div id="slider" class="nivoSlider" style="width:<?php echo $sliderWidth;?>px; height:<?php echo $sliderHeight;?>px;">
			<?php foreach($sliderImages as $v){?>			                
                <img src="<?php echo $site['url'];?><?php echo $v['image'];?>" data-thumb="<?php echo $site['url'];?><?php echo $v['image'];?>" alt="<?php echo $v['title'];?>" title="<?php echo $v['title'];?>"/>				
			<?php }?>	
            </div>       	
	</div>
	</div>
	
	
	<?php }?>	
	
    <script type="text/javascript" src="<?php echo $sliderPath;?>js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="<?php echo $sliderPath;?>js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider(defaults = {
								effect: '<?php echo $sliderEffect;?>',
								slices: 15,
								boxCols: 8,
								boxRows: 4,
								animSpeed: 500,
								pauseTime: <?php echo $sliderInterval;?>,
								startSlide: 0,
								directionNav: true,
								controlNav: true,
								controlNavThumbs: false,
								pauseOnHover: true,
								manualAdvance: <?php echo $sliderAutoplay;?>,
								prevText: 'Prev',
								nextText: 'Next',
								randomStart: false,
								beforeChange: function(){},
								afterChange: function(){},
								slideshowEnd: function(){},
								lastSlide: function(){},
								afterLoad: function(){}
							});
	
    });
    </script>
	
	
</body>
</html>