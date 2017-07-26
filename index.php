<?php 
header('Content-type: text/html; charset=utf-8');

define('ACC', true);


require('include/init.php');

// 取出5条新品
$goods = new GoodsModel();
$newlist = $goods->getNew(5);

// 取出指定栏目商品

// $cat_id = 4;
// print_r($goods->catGoods($cat_id));exit();
// 新品栏目商品
$female_id = 13;
$felist = $goods->catGoods($female_id);

// 热卖栏目商品
$mangoods_id = 17;
$mlist = $goods->catGoods($mangoods_id);


include(ROOT  . 'view/front/index.html');



 ?>