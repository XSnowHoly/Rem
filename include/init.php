<?php
/* file init.php
 作用：框架初始化
*/
defined('ACC')|| exit('ACC Denied');
// 初始化当前的绝对路径
//换成正斜线是因为 win/linux都支持正斜线,而linux不支持反斜线 
define('ROOT',dirname(dirname(str_replace('\\','/',__FILE__))).'/') ;
//设置报错级别
define('DEBUG', true);
if (DEBUG){
	error_reporting(E_ALL);
}else{
	error_reporting(0);
}


//引入类文件
// require(ROOT.'include/db.class.php');
// require(ROOT.'include/mysql.class.php');
// require(ROOT.'Model/Model.class.php');
// require(ROOT.'Model/TestModel.class.php');
// require(ROOT.'include/conf.class.php');
// require(ROOT.'include/log.class.php');
require(ROOT.'include/lib_base.php');

function __autoload($class){
	// var_dump(strtolower(substr($class,-5) == 'model');
	$pos = stripos($class, 'Model');
	if($pos !== false) {
		require(ROOT . 'Model/' . $class . '.class.php');
	}else if(strtolower(substr($class,-4)) == 'tool'){
		require(ROOT . 'tool/' . $class . '.class.php');
	}else{
		require(ROOT . 'include/' . $class . '.class.php');
	}
}


//过滤参数,用递归方式过滤$_GET,$_POST,$_COOKIE,暂时不会
$_GET = _addslashes($_GET);
$_POST = _addslashes($_POST);
$_COOKIE = _addslashes($_COOKIE);

//开启session
session_start();





?>