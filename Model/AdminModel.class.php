<?php 

defined('ACC')||eixt('Acc Deined');

class AdminModel extends Model {
	protected $table = 'admin';
	protected $pk = 'user_id';
	protected $fileds = array('user_id','username','password');


	protected $_valid = array(
							array('username',1,'用户名不能为空','require'),
							array('username',0,'用户名必须在4~16字符内','length','4,16'),
							array('passwd',1,'passwd不能为空','require'));

	protected function encPasswd($p){

		return md5($p);

	}

	/*
	根据用户名查询用户信息
	*/
	public function checkUser($username,$password){
		$sql = "select password from "  . $this->table . " where username='" . $username  . "'";
			
		$row = $this->db->getOne($sql);

		if (empty($row)) {
			return false;
		}
		if ($row != $this->encPasswd($password)) {
			return false;
		}
		return true;
		
	}

}



 ?>