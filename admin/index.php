<?php 


define('ACC', true);
require('../include/init.php');

if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])){
	include(ROOT . 'view/admin/templates/login.html');
	exit();
} else {
	include(ROOT . 'view/admin/templates/index.html');
}







 ?>