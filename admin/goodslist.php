<?php 

define('ACC', true);
require('../include/init.php');

/*
实例化GoodsModel
调用select 方法
循环显示在view上
*/

$goods = new GoodsModel();
$page = isset($_GET['page'])?$_GET['page']+0:1;
if ($page< 1) {
	$page = 1;
}

$total = $goods->GoodsCount();

$perpage = 10;
if ($page > ceil($total/$perpage)) {
	$page = 1;
}
$offset = ($page-1)*$perpage;

$pagetool = new PageTool($total,$page,$perpage);
$pagecode = $pagetool->show();


$goodslist = $goods->PageGoods($offset,$perpage);


$cat = new CatModel();
$catlist = $cat->select();
$catlist = $cat->getCatTree($catlist);

include(ROOT. 'view/admin/templates/goodslist.html');






 ?>