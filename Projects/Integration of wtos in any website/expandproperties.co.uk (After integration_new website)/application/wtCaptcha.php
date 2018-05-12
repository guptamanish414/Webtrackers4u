<?php
session_start();
$code=rand(1000,9999);
$_SESSION["wt-captcha"]=$code;
$im = imagecreatetruecolor(45, 15);
$bg = imagecolorallocate($im, 153, 0, 0); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 0, 0,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>