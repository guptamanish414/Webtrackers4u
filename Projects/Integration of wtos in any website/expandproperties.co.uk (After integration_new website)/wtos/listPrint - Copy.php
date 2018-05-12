<?php
session_start();
include('includes/config.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="<? echo $site['url'] ?>wtos-theme/css/style.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>B&W Administration</title>
 </head>
 <body>
 <? $listPrint=$_SESSION['listPrint'];
    echo $listPrint;
?>
<br />
 <script>
 window.print();
 </script>
 </body>
 
 </html>
