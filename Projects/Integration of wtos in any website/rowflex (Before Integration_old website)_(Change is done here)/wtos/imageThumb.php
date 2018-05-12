<?php

$image=$_GET['image'];
$newwidth=$_GET['newwidth'];
$newheight=$_GET['newheight'];
// File and new size
$filename = $image;
$percent = 0.5;
list($width, $height, $type) = getimagesize($filename); // $type  3==png 2==jpg
 
 
// Content type
header('Content-Type: image/jpeg');

// Get new sizes

//$newwidth = $width * $percent;
//$newheight = $height * $percent;

//$newwidth=300; $newheight=200;
// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);

if($type==1){$source = imagecreatefromgif($filename); }
if($type==2){$source = imagecreatefromjpeg($filename); }
if($type==3){$source = imagecreatefrompng($filename); }


// Resize

 
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Output
imagejpeg($thumb,NULL, 100);
?> 