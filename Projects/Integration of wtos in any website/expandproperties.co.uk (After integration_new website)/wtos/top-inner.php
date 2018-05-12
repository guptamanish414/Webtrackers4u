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
