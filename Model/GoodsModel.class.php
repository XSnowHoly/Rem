<?php 

defined('ACC') || exit('ACC Denied');
	
	

class GoodsModel extends Model{

	protected $table = 'goods';
	protected $pk = 'goods_id';
	protected $fileds = array('goods_id','goods_sn','cat_id','brand_id','goods_name','shop_price','market_price','goods_number','click_count','goods_weight','goods_brief','goods_desc','thumb_img','goods_img','ori_img','is_on_sale','is_delete','is_best','is_new','is_hot','add_time','last_update');
	protected $_auto = array(
							array('is_hot','value',0),
							array('is_new','value',0),
							array('is_best','value',0),
							array('add_time','function','time')
							);

	protected $_valid = array(
						array('goods_name',1,'必须有商品名','require'),
						array('cat_id',1,'栏目id必须是整型值','number'),
						array('is_new',0,'in_new只能是0或1','in','0,1'),
						array('goods_brief',2,'商品简介只能在10到100字符','length','10,100')
		);

/*
		作用：把商品放到回收站，即is_delete字段置为1
		parm int id
		return bool
	*/
	public function trach($id){
		return $this->update(array('is_delete'=>1),$id);

	}

	/*
		作用：把商品从回收站还原到商品列表 即使 is_delete字段置为0
		parm int id
		return bool
	*/
	public function restore($id){
		return $this->update(array('is_delete'=>0),$id);
	}

	public function getGoods(){
		$sql = 'select * from goods where is_delete=0';
		return $this->db->getAll($sql);
	}

	public function getTrach(){
		$sql = 'select * from goods where is_delete=1';
		return $this->db->getAll($sql);

	}

	//  创建商品货号
	public function createSn(){
		$sn = 'LM' . date('Ymd') . mt_rand(10000,99999); //生成货号

		$sql = 'select count(*) from ' . $this->table . " where goods_sn='" . $sn . "'";

		return $this->db->getOne($sql)?$this->createSn():$sn;

	}

	/*
		取出指定条数的新品
	*/
	
	public function getNew($n=5){
		$sql = 'select goods_id,goods_name,shop_price,market_price,thumb_img from ' . 
		$this->table . ' where is_new=1 limit 5'; // order by add_time

		return $this->db->getAll($sql);

	}

	public function getHot($n=5){
		$sql = 'select goods_id,goods_name,shop_price,market_price,thumb_img from ' . 
		$this->table . ' where is_hot=1 limit 5'; // order by add_time

		return $this->db->getAll($sql);

	}

	/*
	  	取出指定栏目的商品

		根据$cat_id 找子孙树
	*/
	 public function catGoods($cat_id,$offset=0,$limit=5){
	 	$category = new CatModel();
	 	$cats = $category->select(); // 取出所有的栏目
	 	$sons = $category->getCatTree($cats,$cat_id); // 取出给定栏目的子孙栏目

	 	$sub = array($cat_id);

	 	if (!empty($sons)) { // 没有子孙栏目
	 		foreach ($sons as $v) {
	 			$sub[] = $v['cat_id'];
	 		}
	 	}

	 	$in = implode(',', $sub);

	 	$sql = 'select goods_id,goods_name,shop_price,market_price,thumb_img from ' . 
		$this->table . ' where cat_id in (' . $in . ') order by add_time limit ' . $offset . ',' . $limit;

		return $this->db->getAll($sql);

	 }


	 public function catGoodsCount($cat_id){
	 	$category = new CatModel();
	 	$cats = $category->select(); // 取出所有的栏目
	 	$sons = $category->getCatTree($cats,$cat_id); // 取出给定栏目的子孙栏目

	 	$sub = array($cat_id);

	 	if (!empty($sons)) { // 没有子孙栏目
	 		foreach ($sons as $v) {
	 			$sub[] = $v['cat_id'];
	 		}
	 	}

	 	$in = implode(',', $sub);

	 	$sql = 'select count(*) from goods where cat_id in (' . $in .')';
	 	return $this->db->getOne($sql);
	 }

	 /*
		取出所有商品的数量
	 */
	 public function GoodsCount(){
	 	$sql = 'select count(*) from goods';

	 	return $this->db->getOne($sql);
	 }

	 /*
		取出当前页的商品
	 */
	 public function PageGoods($offset=0,$limit=5){
	 	$sql = 'select * from ' . $this->table . ' order by add_time limit ' . $offset . ',' . $limit;

	 	return $this->db->getAll($sql);
	 }



	 /*
		获取购物车中商品的详细信息
		params array $items 购物车中的商品数组
		return 商品数组的详细信息
	 */
		public function getCartGoods($items){
			foreach ($items as $k=>$v) {	 // 循环购物车中的商品，每循环一个查询一次详细信息
				$sql = 'select goods_id,goods_name,thumb_img,shop_price,market_price from ' 
				. $this->table . ' where goods_id =' . $k; 
				$row = $this->db->getRow($sql);

				$items[$k]['thumb_img'] = $row['thumb_img'];
				$items[$k]['market_price'] = $row['market_price'];
				$items[$k]['goods_id'] = $row['goods_id'];
			}

			return $items;
				
			
		}


}
	
	
	


 ?>