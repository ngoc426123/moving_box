<?php
session_start(); 
$text = mt_rand(10000,99999); 
$_SESSION["ttcapt"] = $text; 
$height = 40; 
$width = 54; 
$tt_image = imagecreate($width, $height); 
$blue = imagecolorallocate($tt_image, 0, 0, 0); 
$white = imagecolorallocate($tt_image, 255, 255, 255); 
$font_size = 5; 
imagestring($tt_image, $font_size, 5, 10, $text, $white);
/* Avoid Caching */
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header( "Content-type: image/png" );
imagepng($tt_image);
imagedestroy($tt_image );
?>