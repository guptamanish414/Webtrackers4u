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
<?   echo   $os->addCss($pagevar[myCss]); ?>
<?   echo  $os->addJs($pagevar[myJs]); ?>



<style type="text/css">
<!--
.style2 {color: #FFFFFF}
.style4 {
	color: #CCFF66;
	font-weight: bold;
}
-->
</style>
</head>
<style type="text/css">

.lg_bg {
background-color:#79D1D9;
width:500px;
border:#E3F8F9 10px solid;
}
.adm
{
font-size:24px; font-weight:bold;
color:#218085;
}

/*
.lg_bg {
background-color:#F7D2CE;
width:500px;
border:#FF0000 8px solid;
}

*/

</style>
</head>
<body style="background-color:#333333;">
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



?>
<?php

ob_start(); 
$recordPerPage= $os->recordPerPageDD();
$recordPerPageDDS=ob_get_clean();

?>
