<?php 

defined('ACC')||eixt('Acc Deined');

class OGModel extends Model {
	protected $table = 'ordergoods';
	protected $pk = 'og_id';


	// 把订单的商品写入ordergoods表
	public function addOG($data){
		if($this->add($data)){
			// 减少库存
			$sql = 'update goods set goods_number = goods_number - '. $data['goods_number'] . ' where goods_id = ' . $data['goods_id'];

			return $this->db->query($sql);	
		}
		
		return false;

	}


}




 ?>