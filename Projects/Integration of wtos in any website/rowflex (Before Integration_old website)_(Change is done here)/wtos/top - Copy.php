<?
session_start();
include('coomon.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $site['siteTitle'];?></title>
<meta name="description" content="description">
<meta name="keywords" content="keywords1 , keywords2">
<script>
var themepath='<?php echo $themepath ?>';
</script>
<? 

$pagevar[myJs][]=$site['url'].'js/basic.function.js';
$pagevar[myJs][]=$site['url'].'js/common.js';
//$pagevar[myJs][]=$site['url'].'js/jquery-1.2.2.pack.js';

$pagevar[myCss][]=$site['themePath'].'css/style.css';
 


?>
<?   echo   $os->addCss($pagevar[myCss]); ?>
<?   echo  $os->addJs($pagevar[myJs]); ?>
	<script src="<?php echo $site['url']?>js/datepkr/jquery-1.7.2.js"></script>
	<link rel="stylesheet" href="<?php echo $site['url']?>wtos-theme/css/jquery.autocomplete.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $site['url']?>js/jquery.autocomplete.js"></script>
	
	<link rel="stylesheet" href="<?php echo $site['url']?>wtos-theme/css/datepkr/jquery-ui.css">
	<script src="<?php echo $site['url']?>js/datepkr/jquery.ui.core.js"></script>
	<script src="<?php echo $site['url']?>js/datepkr/jquery.ui.datepicker.js"></script>
</head>
<body>
<?php  
$classL='loginboxS';
if($os->isLogin()){ 
$classL='loginboxSL';

}

function navSelectedHeader($nav)
{
global $pageVar;

 echo ($pageVar[segment][1]==$nav)?'class="selected"':'';

}


$os->validateWtos();

?>
<div class="main">
	<div class="wrapper">
		<div class="header">
		</div>
		<div class="curvebox">
			<div class="headerimage" style="display:none;">
			
			
			 
 <style>
	.tlinkCss{ 
	text-decoration:none; 
	 margin:0px 0px 0px 0px; border:1px solid #004262; background:#FFFFFF; 
	border-top:none;
	border-left:none;
	height:15px; width:auto; padding:1px 2px 1px 20px; 
	-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;
	 
	font-weight:normal;
	font-size:11px;
    opacity:0.8;filter:alpha(opacity=80);
}
 
.tlinkCss:hover{ opacity:1;filter:alpha(opacity=100); }
.logout{background:#FFFFFF url(<?php echo $site['url'] ?>image/logout.png) no-repeat; background-position: 0px 0px, center; }
.changepass{background:#FFFFFF url(<?php echo $site['url'] ?>image/changePAss.png) no-repeat;background-position: 0px 0px, center;  } 
.settings{background:#FFFFFF url(<?php echo $site['url'] ?>image/settings.png) no-repeat;background-position: 0px 0px, center; } 
.admin{background:#FFFFFF url(<?php echo $site['url'] ?>image/admin.png) no-repeat;background-position: 0px 0px, center;}
.refresh{background:#FFFFFF url(<?php echo $site['url'] ?>image/refresh.png) no-repeat;background-position: 0px 0px, center; }
.download{background:#FFFFFF url(<?php echo $site['url'] ?>image/download.png) no-repeat;background-position: 0px 0px, center; }
.add{background:#FFFF33 url(<?php echo $site['url'] ?>image/add.png) no-repeat;background-position: 0px 0px, center; text-decoration:none; color:#FF0000;  font-weight:bold; }
.searches{background:#FFFFFF url(<?php echo $site['url'] ?>image/search.png) no-repeat;background-position: 0px 0px, center; }
.reset{background:#FFFFFF url(<?php echo $site['url'] ?>image/reset.png) no-repeat;background-position: 0px 0px, center; }
 </style>


<?  if($isneeded){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a   href="<?php echo $site['url']?>/dashBoard.php"><img src="<?php echo $site['url'] ?>image/loginlogo.png" alt=""  height="30"  style="margin:0 0 0 0px; border:none;"/></a></td>
    <td  align="center"><span class="style2" style="width:350px;"><strong> <? echo $site['siteHeading']; ?> </strong></span></td>
     
    <td   align="left">Welcome <span class="style2"><strong><?php echo $os->userDetails['name']; ?></strong></span>
	
	&nbsp; <a href="javascript:void(0)" class="style2" style="text-decoration:none"><? echo date('d-M-Y'); ?> </a> 
	
	</td>
    <td align="right" >
	
	&nbsp; <a class="tlinkCss refresh" href=""   style="text-decoration:none"> Refresh </a> &nbsp;
	
	
	
	<?php if($os->isLogin()){ ?>  <a class="tlinkCss changepass" href="<? $seoLink->getLink('changepwd',true); ?>" style="text-decoration:none;">Change Password</a> <?php }?>
	<a  class="tlinkCss settings"  href="<? $seoLink->l('settings',true); ?>" > Settings</a> 
	<a  class="tlinkCss admin"  href="<? $seoLink->l('admin',true); ?>" >Admin</a>  
	<?php if($os->isLogin()){ ?><a class="tlinkCss logout" href="?logout=logout" style="text-decoration:none; color:#FF0000">Logout</a> <?php }?>
	</td>
  </tr>
</table>

<? } ?>

<?php

ob_start(); 
$recordPerPage= $os->recordPerPageDD();
$recordPerPageDDS=ob_get_clean();

?><script>
function dateCalander(){
	$( ".dtpk" ).datepicker({
	dateFormat: 'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	yearRange: 'c-50:c+10'
	});
}
</script>
</div>
			<div class="buttons-section">
				<a href="#" class="home">Home</a>
			
						
							
				
				
				<div class="clear"></div>
			</div>
		
