<?
include($site['root-wtos'].'wtosCommon.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include('wtosHeader.php'); ?>
<link rel="stylesheet" href="<?php echo $site['url-wtos']?>/css/datepkr/jquery-ui.css">
<script src="<?php echo $site['url-wtos']?>js/datepkr/jquery-1.7.2.js"></script>
<script src="<?php echo $site['url-wtos']?>js/datepkr/jquery.ui.core.js"></script>
<script src="<?php echo $site['url-wtos']?>js/datepkr/jquery.ui.datepicker.js"></script>

</head>
<body>
 <div id="div_busy" style="position:fixed; top:0px; left:45%;"></div>
<?php $os->validateWtos(); ?>

<? ?>
<div class="btnStyle"> <? include('osLinks.php') ?>	</div>


<div class="sidebar sidebar-left" style="display:none;"> <!-- animated slider -->
	<div class="block">
<?php if($os->isLogin()){ ?><a class="tlinkCss logout" href="?logout=logout" style="text-decoration:none; color:#FF0000">Logout</a> <?php }?>
	</div>
    <div class="toggler">
		<img src="images/arrow.png"/> 
    </div>
</div>