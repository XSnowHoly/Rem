<?php 
class OLModel extends Model{
	protected $table = 'orderinfo';

	/*
		你给我一个关键数组，键->表中的列,
		值-->表中的值
		add()函数自动插入该行数据

	*/
	// public function add($data){
	// 	return $this->db->autoExecute($this->table,$data);
	// }

	//获取本表下面所有数据
	public function select(){
		$sql = 'select order_id,order_sn,username,address,reciver,tel,add_time,order_amount from '. $this->table;
		return $this->db->getAll($sql);
	}

	// 根据主键 取出一行数据
	public function find($order_id){
		$sql = 'select * from '. $this->table .' where order_id=' . $order_id;
		return $this->db->getRow($sql);
	}

	/*
		getCatTree
		pram: int $id
		return $id栏目子孙树
	*/

	// 删除栏目
	public function delete($order_id=0){
		$sql = 'delete from '. $this->table . ' where order_id=' . $order_id;
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	//
	public function update($data,$order_id=0){
		$this->db->autoExecute($this->table,$data,'update',' where order_id=' . $order_id);
		return $this->db->affected_rows();	
	}

}


 ?>