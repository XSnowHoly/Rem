<?php 

//彻底删除商品

define('ACC', true);
require('../include/init.php');

if (!isset($_GET['goods_id'])) {
	echo '商品不存在';
	exit();
}

$goods_id = $_GET['goods_id'] + 0;

$goods = new GoodsModel();

switch ($_GET['act']) {
	case 'delet':
		if ($goodsdelet = $goods->delete($goods_id)) {
			echo '商品删除成功';
		}else{
			echo '商品删除失败';
		}
		break;
	
	case 'restroe':
		if ($goodsrestore = $goods->restore($goods_id)) {
			echo '商品还原成功';
		}else{
			echo '商品还原失败';
		}
		break;
}


		

?>