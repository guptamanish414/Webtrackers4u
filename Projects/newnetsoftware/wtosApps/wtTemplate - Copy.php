<?php 
include('wtCommon.php');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="language" content="en-uk, english">
<meta name="DC.description" content="">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
 
 <link rel="shortcut icon"  href="ios.ico"  /> 
 <img src="" />
<title> <?php echo $os->getSettings('siteTitle');?>  <?php echo $os->wtospage['metaTitle'];?>  <?php echo $os->wtospage['heading'];?> </title>
<meta name="keywords" content="<?php echo $os->getSettings('metaKey');?> <?php echo $os->wtospage['metaTag'];?>   ">
<meta name="description" content="<?php echo $os->getSettings('metaDescription');?> <?php echo $os->wtospage['metaDescription'];?> ">


<script type="text/javascript" src="<? echo $site['url-library']?>wtos-1.1.js"></script>

<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/global.css" />

<?php echo $os->getSettings('Styles'); ?>
</head>
<body style="padding-top:20px;">

<img src="" />
 
   <?   include($site['application'].$content); ?>
    
   <div style="position:fixed; top:0px; left:0px;color:#FFFFFF; background-color:#0069D2; padding:4px; "><?   include('wtNav.php'); ?></div>
   <div style="color:#FFFFFF; background-color:#FF0000; padding:10px; font-size:16px;">
   <?
      echo 'Total No of Query = '.$os->queryCount.'<br>';
   
    ?>
	</div>
 
</body>

</html>