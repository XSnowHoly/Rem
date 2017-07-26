<?php 	

define('ACC', true);
require('../include/init.php');
/*
file cateaddAct.php
作用 接收cateadd.php表单页面发送来的数据
并调用model,把数据库入库
*/

//第一步，接收数据
// print_r($_POST);

//第二步,检验数据
$data = array();
if(!isset($_POST['cat_name'])){
	exit('栏目名不能为空');
}
$data['cat_name'] = $_POST['cat_name'];
if(!isset($_POST['parent_id'])){
	exit('父栏目不能为空');
}
$data['parent_id'] = $_POST['parent_id'];
if(!isset($_POST['intro'])){
	exit('栏目简介不能为空');
}
$data['intro'] = $_POST['intro'];

//第二步 ,实例化model
//并调用model相关方法 

$cat = new CatModel();
if($cat->add($data)){
	echo '栏目添加成功';
	exit;
}else{
	echo '栏目添加失败';
}


 ?>