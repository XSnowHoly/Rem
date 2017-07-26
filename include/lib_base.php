<?php


/*
=======笔记部分=======
   递归对数组进行转义

*/
defined('ACC')|| exit('ACC Denied');

function _addslashes($arr){
	foreach ($arr as $k => $v) {
		if (is_string($v)) {
			$arr[$k] = addslashes($v);
		}elseif (is_array($v)) { //判断如果是数组再调用自身
			$arr[$k] = _addslashes($v);
		}
	}
	
	return $arr;
}




?>