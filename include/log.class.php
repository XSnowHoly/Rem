<?php

/*
file log.class.php
作用:记录信息到日志

思路:给定内容,写入文件(fopen,fwrite..)
如果文件>1M ,重新写一份

传给我一个内容
    判断当前日志的大小
    	如果>1M,备份
    	否则，写入
*/
defined('ACC')|| exit('ACC Denied');

class log{

	const LOGFILE = 'curr.log'; // 建一个常量，代表日志文件的名称

	//写日志
	public static function write($cont){
		$cont .="\r\n";
		//判断是否备份
		$log = self::isBak();//计算出日志文件的地址 

		$fh = fopen($log,'ab');

		fwrite($fh, $cont);
		fclose($fh);
	}
	//备份日志
	public static function bak(){
		//就是把原来的日志，改个名，储存起来
		//改成 年-月-日.bak这种形式

		$log = ROOT . 'data/log/' . self::LOGFILE;
		$bak = ROOT . 'data/log/' . date('ymd') . mt_rand(1000,9999) . 'bak';
		return rename($log, $bak);
	}

	//读取并判断日志的大小，
	public static function isBak(){
		$log = ROOT . 'data/log/' . self::LOGFILE;

		if(!file_exists($log)){//如果文件不存在，则创建该文件
			touch($log);
			return $log;
		}
		//要是存在，则判断大小
		clearstatcache(true,$log);
		$size = filesize($log);
		if ($size <= 1024 * 1024) { //大于1M
			return $log;
		}
		// 走到这一行，说明>1M
		if(!self::Bak()){
			return $log;
		}else{
			touch($log);
			return $log;
		}


	}
}



?>
