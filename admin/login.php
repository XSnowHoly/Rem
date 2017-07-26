<?php 
header('Content-Type: text/html; charset=utf-8');
define('ACC', true);
require('../include/init.php');
if (!isset($_POST) || empty($_POST)) {
	header('location:index.php');
}


if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
	$u= $_POST['username'];
	$p= $_POST['password'];

	//检测合法性
	$user = new AdminModel();
	
	//核对用户名，密码
	if($user->checkUser($u,$p)){
		$_SESSION['admin'] = $u;
		include(ROOT . 'view/admin/templates/index.html');
		exit();
	}else{
		echo "<script language='javascript'>alert('用户名或密码不正确！');history.back();</script>";
		exit();
	}
} else {
	include(ROOT . 'view/admin/templates/index.html');
}

	


	// include(ROOT . 'view/front/msg.html');
	// exit();

// include(ROOT . 'view/front/denglu.html');






 ?>