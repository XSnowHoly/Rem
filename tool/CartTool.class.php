<?php 

defined('ACC') || exit('ACC Denied');
/*
购物车类
1：你无论在本网站刷新了多少次页面，或者新增加了多少个商品，
都要求你查看购物车时，看到的都是一个一样的结果

即：你打开A商品刷新，B商品刷新，首页，看到的购物车应该是一样的

或者说:整站范围内，购物车---是全局有效的！

解决：把购物车的信息放在数据库，也可以放在session/cookie里

2:既然是全局有效，暗示，购物车实例只能有1个！
不能说在3个页面，买了3个商品，就形成了3个购物车实例，这显然不可合理
解决：单例模式

技术选型：session+单例

功能分析：

判断某个商品是否存在
添加商品
删除商品
修改商品数量

某商品数量+1
某商品数量-1

查询购物车的商品种类
查询购物车的商品数量
查询购物车里的商品总金额
返回购物车里的所有商品

清空购物车
*/

class CartTool {
	private static $ins = null;
	private $items = array();

	final protected function __construct(){
	}

	final protected function __clone(){

	}

	//获取实例
	protected static function getIns(){
		if (!(self::$ins instanceof self)) {
			self::$ins = new self();
		}

		return self::$ins;
	}

	// 把购物车单例对象放到session里
	public static function getCart(){
		if(!isset($_SESSION['cart']) || !($_SESSION['cart'] instanceof self)){
			$_SESSION['cart'] = self::getIns();
		}

		return $_SESSION['cart'];
	}

	/* 添加商品
		param int $id 商品主键
		param string $name 商品名称
		param float $price 商品价格
		param int $num 购买数量
	*/
	public function addItem($id,$name,$price,$num=1){

		if ($this->hasItem($id)) {	// 如果该商品已经存在，则直接加其数量
			$this->incNum($id,$num);
			return;
		}


		$items = array();
		$items['name'] = $name;
		$items['price'] = $price;
		$items['num'] = $num;

		$this->items[$id] = $items;
	}

	/*
	商品数量+1
	*/
	public function incNum($id,$num=1){
		if ($this->hasItem($id)) {
			$this->items[$id]['num'] += $num;
		}
	}
	/*
	商品数量-1
	*/
	public function decNum($id,$num=1){
		if ($this->hasItem($id)) {
			$this->items[$id]['num'] -= $num;
		}

		// 如果减少后，数量为0 ，则把商品从购物车删除
		if ($this->items[$id]['num']) {
			$this->delItem($id);
		}
	}

	/*
		修改购物车中的商品数量
		param int $id 商品主键
		param int $num 某个商品修改后的数量，即直接把某商品数量改为$num
	*/
	public function modNum($id,$num=1){
		if (!$this->hasItem($id)) {
				return false;
		}
		$this->items[$id]['num'] = $num;
	}


	/*	
		判断某商品是否存在

	*/
	public function hasItem($id){
		return array_key_exists($id,$this->items);
	}

	/*
		删除商品
	*/
	public function delItem($id){
		unset($this->items[$id]);
	}

	/*
		查询购物车中商品的种类
	*/
	public function getCnt(){
		return count($this->items);
	}

	/*
	 	查询购物车中的商品数量
	*/
	 public function getNum(){
	 	if ($this->getCnt() == 0) {
	 		return 0;
	 	}
	 	$sum = 0;

	 	foreach ($this->items as $item) {
	 		$sum += $item['num'];
	 	}
	 	return $sum;
	 }	

	/*
		查询购物车中商品的总金额
	*/
	public function getPrice(){
		if ($this->getCnt() == 0) {
			return 0;
		}

		$price = 0.0;

		foreach ($this->items as $item) {
			$price += $item['num'] * $item['price'];
		}
		return $price;
	}

	/*
		返回购物车中的所有商品
	*/
	public function all(){
		return $this->items;
	}

	/*
		清空购物车
	*/
	public function clear(){
		$this->items = array();
	}


 
}



// $cart = CartTool::getCart();

// if (!isset($_GET['test'])) {
// 	$_GET['test'] = '';
// }

// if ($_GET['test'] == 'add') {
// 	$cart->addItem(1,'老王',234,1);
// 	echo 'add ok';
// } else if ($_GET['test'] == 'clear') {
// 	$cart->clear();
// }else if ($_GET['test'] == 'show') {
// 	print_r($cart->all());
// 	echo '<br/>';
// 	echo '共',$cart->getCnt(),'种商品';
// 	echo '共',$cart->getNum(),'个';
// 	echo '共',$cart->getPirce(),'元';
// }else{
// 	print_r($cart);
// }


 ?>