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

background-color:#E5E5E5;
width:500px;
border:#858585 1px solid;
border-left:none;
border-top:none;
-moz-border-radius:5px; 
-webkit-border-radius:5px;
border-radius:5px;
color:#FFFFFF;


}
.lg_bg table
{
/* border:2px solid #6B6B6B; */

width:100%;
-moz-border-radius:5px; 
-webkit-border-radius:5px;
border-radius:5px;
}
.textbox{

border:#999999 1px solid;
border-left:none;
border-top:none;
-moz-border-radius:3px; 
-webkit-border-radius:3px;
border-radius:3px;
background-color:#F8F8F8;

}
.textbox:hover{
background-color:#FFFFFF;
border:#999999 1px solid;
border-right:none;
border-bottom:none;
-moz-border-radius:3px; 
-webkit-border-radius:3px;
border-radius:3px;

}

.lg_bg table table
{
 border:none;
}
.adm
{
font-size:24px; font-weight:900;
color:#4B4B4B;
font-family:Verdana, Arial, Helvetica, sans-serif;




}
.ok{
border:2px solid #2D2D2D;
background:#4D4D4D;
width:40px;
-moz-border-radius:3px; 
-webkit-border-radius:3px;
border-radius:3px;
padding-left:7px;
border-left:none;
border-top:none;
}
.ok:hover{
border:2px solid #2D2D2D;
border-bottom:none;
border-right:none;
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
<body style="background-color:#FFFFFF;">
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
