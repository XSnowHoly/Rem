<?php 


define('ACC', true);
require('../include/init.php');

/*
思路
接收goods_id
实例化goodsModel
调用find方法
展示商品信息
*/

$goods_id = $_GET['goods_id'] + 0;


$goods = new GoodsModel();
$goodsOne = $goods->find($goods_id);

print_r($goodsOne);

// $g =  $goods->find($goods_id);

// if(empty($g)){
// 	echo '商品不存在';
// }
// print_r($g);

 ?>