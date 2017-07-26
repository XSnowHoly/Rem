<?php 
header('Content-type: text/html; charset=utf-8');

define('ACC', true);


require('include/init.php');

$yzm = new ImageTool();

$yzm->captcha();


 ?>