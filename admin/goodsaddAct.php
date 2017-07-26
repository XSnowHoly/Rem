<?php 

define('ACC', true);
require('../include/init.php');

 // print_r($_POST);

/*
[MAX_FILE_SIZE] => 2097152
    [goods_name] => 小学生
    [goods_sn] => 11223
    [cat_id] => 6
    [shop_price] => 399
    [goods_desc] => 小学生好的
    [goods_weight] => 200
    [weight_unit] => 1
    [goods_number] => 999
    [is_best] => 1
    [is_hot] => 1
    [is_on_sale] => 1
    [keywords] => 
    [goods_brief] => 
    [seller_note] => 
    [goods_id] => 0
    [act] => insert
*/
$data = array();

// if (!isset($_POST['goods_name'])) {
// 	echo '商品名不能为空';
// 	exit();
// }
// $data['goods_name'] = trim($_POST['goods_name']);
// $data['goods_sn'] = trim($_POST['goods_sn']);
// $data['cat_id'] = $_POST['cat_id'] + 0;
// $data['shop_price'] = $_POST['shop_price'] + 0;
// $data['market_price'] = $_POST['market_price'];
// $data['goods_desc'] = $_POST['goods_desc'];
// $data['goods_weight'] = $_POST['goods_weight'] * $_POST['weight_unit'];
// $data['goods_number'] = $_POST['goods_number'] + 0;
// $data['is_best'] = isset($_POST['is_best'])?1:0;
// $data['is_hot'] = isset($_POST['is_hot'])?1:0;
// $data['is_on_sale'] = isset($_POST['is_on_sale'])?1:0;
// // $data['keywords'] = trim($_POST['keywords']);
// $data['goods_brief'] = trim($_POST['goods_brief']);

// $data['add_time'] = time();
// print_r($_POST);
$_POST['goods_weight'] *= $_POST['weight_unit'];

$goods = new GoodsModel();

$data = array();
$data = $goods->_facade($_POST);  // 自动过滤

 // print_r($data);
// print_r($data);
$data = $goods->_autoFill($data); // 自动填充

// 自动商品货号
if (empty($data['goods_sn'])) {
    $data['goods_sn'] = $goods->createSn();
}

// print_r($data);
if (!$goods->_validate($data)) {
    echo '没通过检验';
    print_r($goods->getErr());
    exit();
}

// 上传图片
$uptool = new UpTool();
$ori_img = $uptool->up('ori_img');

if ($ori_img) {
    $data['ori_img'] = $ori_img;
}

// 如果$ori_img上传成功，再次生成中等大小缩略图 300*400

// 再次生成浏览时用缩略图
// 根据原始地址 定 缩略地址
// 例: aa.jpeg --> goods_aa.jpeg

    $ori_img = ROOT . $ori_img; // 加上绝对路径
    $goods_img = dirname($ori_img) . '/goods_' . basename($ori_img);



    if(ImageTool::thumb($ori_img,$goods_img,300,400)){
        $data['goods_img'] = str_replace(ROOT, '',$goods_img);
    }

// 再次生成浏览时用缩略图 160*220
// 定好缩略图地址 
// aa.jpeg --> thumb_aa.jpeg
    $thumb_img = dirname($ori_img) . '/thumb_' . basename($ori_img);



    if(ImageTool::thumb($ori_img,$thumb_img,160,220)){
        $data['thumb_img'] = str_replace( ROOT, '',$thumb_img);
    }




if ($goods->add($data)) {
	echo '商品发布成功';
}else{
	echo '商品发布失败';
}

 ?>