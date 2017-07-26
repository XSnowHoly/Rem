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
$data['parent_id'] = $_POST['parent_id'] + 0;
if(!isset($_POST['intro'])){
	exit('栏目简介不能为空');
}
$data['intro'] = $_POST['intro'];

$cat_id = $_POST['cat_id'] + 0;

/*
一个栏目A，不能修改为A的子孙栏目子栏目
思考：如果B是A的后代，则A不能成为B的子栏目
反之，B是A的后代，则A是B的祖先

因此，我们为A设定一个新的父栏目时，设为N
我们可以先查N的 家谱树，N的家谱树里，如果有A
则子孙差辈了

*/

//第二步 ,实例化model
//并调用model相关方法 

$cat = new CatModel();

// 查找新父栏目的家谱树
$tree = $cat->getTree($data['parent_id']);
// print_r($tree);
// 判断新父栏目是否在家谱树中
foreach ($tree as $v) {
	if ($v['cat_id']==$cat_id || $v['parent_id']==$cat_id) {
		echo '父栏目选择错误！';
		exit();
	}
}

if($cat->update($data,$cat_id)){
	echo '修改成功';
}else{
	echo '修改失败';
}

 ?>