<?php
session_start();
header("Content-type: image/png");
$code = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 4);
$_SESSION['captcha_code'] = $code;
$img = imagecreatetruecolor(80, 35);
$bg = imagecolorallocate($img, 26, 54, 93); // 藏蓝背景
imagefill($img, 0, 0, $bg);
$white = imagecolorallocate($img, 255, 255, 255);
imagestring($img, 5, 20, 10, $code, $white);
imagepng($img);
imagedestroy($img);
?>
