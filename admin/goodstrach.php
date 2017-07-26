<?php 


define('ACC', true);
require('../include/init.php');

$cat = new CatModel();
$catlist = $cat->select();
$catlist = $cat->getCatTree($catlist);


/*
接收 goods_id
调用trach 方法
*/

if (isset($_GET['act']) && $_GET['act']=='show') {
	// 这个部分是打印所有的回收商品
	$goods = new GoodsModel();
	$goodslist = $goods->getTrach();

	include(ROOT . 'view/admin/templates/goodstrach.html');
}else{

	$goods_id = $_GET['goods_id'] + 0;

	$goods = new GoodsModel();

	if ($goods->trach($goods_id)) {
		echo '加入回收站成功';
	}else{
		echo '加入回收站失败';
	}

}


 ?>