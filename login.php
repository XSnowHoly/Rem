<?php 

/*
用户登录页面
*/
define('ACC', true);
require('./include/init.php');

if (isset($_POST['act'])) {
	// 这说明点击了登录按钮过来的
	// 收用户名/ 密码，验证...

	$u= $_POST['username'];
	$p= $_POST['passwd'];

	//检测合法性
	$user = new UserModel();

	if (!isset($u) || empty($p)) {
		$msg = '用户名或密码不能为空';
		include(ROOT . 'view/front/msg.html');
		exit();
	}


	
	//核对用户名，密码
	$row = $user->checkUser($u,$p);
	if(!$user->checkUser($u,$p)){
		$msg = '用户名或密码不正确';
	}else{
		$msg = '登录成功！';
		$_SESSION = $row;

		if(isset($_POST['remember'])) {
			setcookie('remuser',$u,time()+14*24*3600);
		} else {
			setcookie('remuser',$u,time()-1);
		}
	}

	include(ROOT . 'view/front/msg.html');
	exit();
}

include(ROOT . 'view/front/denglu.html');



 ?>