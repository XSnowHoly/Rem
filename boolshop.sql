-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-26 11:54:54
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `boolshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(12) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`) VALUES
(0, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) NOT NULL DEFAULT '',
  `intro` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `intro`, `parent_id`) VALUES
(16, '长袖T恤/衬衫', '长袖T恤/衬衫', 13),
(15, '短袖T恤/衬衫', '短袖T恤/衬衫', 13),
(14, '卫衣/针织衫', '卫衣/针织衫', 13),
(17, '鞋帽', '鞋帽', 0),
(18, '鞋子', '鞋子', 17),
(13, '动漫服装', '动漫服装', 0),
(19, '帽子', '帽子', 17),
(20, '背包/钱包', '背包/钱包', 0),
(21, '背包', '背包', 20),
(22, '钱包', '钱包', 20);

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_sn` char(15) NOT NULL DEFAULT '',
  `cat_id` smallint(6) NOT NULL DEFAULT '0',
  `brand_id` smallint(6) NOT NULL DEFAULT '0',
  `goods_name` varchar(60) NOT NULL DEFAULT '',
  `shop_price` decimal(9,2) NOT NULL DEFAULT '0.00',
  `market_price` decimal(9,2) NOT NULL DEFAULT '0.00',
  `goods_number` smallint(6) NOT NULL DEFAULT '1',
  `click_count` mediumint(9) NOT NULL DEFAULT '0',
  `goods_weight` decimal(6,3) NOT NULL DEFAULT '0.000',
  `goods_brief` varchar(100) NOT NULL DEFAULT '',
  `goods_desc` text NOT NULL,
  `thumb_img` varchar(50) NOT NULL DEFAULT '',
  `goods_img` varchar(50) NOT NULL DEFAULT '',
  `ori_img` varchar(50) NOT NULL DEFAULT '',
  `is_on_sale` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `is_best` tinyint(4) NOT NULL DEFAULT '0',
  `is_new` tinyint(4) NOT NULL DEFAULT '0',
  `is_hot` tinyint(4) NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`goods_id`),
  UNIQUE KEY `goods_sn` (`goods_sn`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goods_id`, `goods_sn`, `cat_id`, `brand_id`, `goods_name`, `shop_price`, `market_price`, `goods_number`, `click_count`, `goods_weight`, `goods_brief`, `goods_desc`, `thumb_img`, `goods_img`, `ori_img`, `is_on_sale`, `is_delete`, `is_best`, `is_new`, `is_hot`, `add_time`, `last_update`) VALUES
(47, 'LM2016101366528', 16, 0, '绝对萌域 黑岩射手周边宽松纯棉圆领套头长袖动漫T恤运动长裤子 ', '106.00', '128.00', 56, 0, '1.000', '', '', 'data/images/201610/13/thumb_7uzy1s.jpg', 'data/images/201610/13/goods_7uzy1s.jpg', 'data/images/201610/13/7uzy1s.jpg', 1, 0, 0, 0, 0, 1476341958, 0),
(45, 'LM2016101380055', 21, 0, '绝对萌域舰队collection北方栖姬动漫游戏周边男女休闲斜挎单肩包 ', '98.00', '126.00', 33, 0, '3.000', '', '', 'data/images/201610/13/thumb_6mn49z.jpg', 'data/images/201610/13/goods_6mn49z.jpg', 'data/images/201610/13/6mn49z.jpg', 1, 0, 0, 1, 0, 1476341531, 0),
(46, 'LM2016101371090', 14, 0, '绝对萌域 舰队舰娘北方酱栖姬动漫周边纯棉服装连帽卫衣外套秋装', '168.00', '266.00', 65, 0, '2.000', '', '', 'data/images/201610/13/thumb_nesby0.jpg', 'data/images/201610/13/goods_nesby0.jpg', 'data/images/201610/13/nesby0.jpg', 1, 0, 0, 1, 0, 1476341772, 0),
(44, 'LM2016101366204', 21, 0, '绝对萌域 ToLOVE金色暗影伊芙动漫周边学生休闲帆布书包双肩背包 ', '148.00', '168.00', 56, 0, '3.000', '', '', 'data/images/201610/13/thumb_safugw.jpg', 'data/images/201610/13/goods_safugw.jpg', 'data/images/201610/13/safugw.jpg', 1, 0, 0, 1, 0, 1476341428, 0),
(42, 'LM2016101390145', 18, 0, '干物妹小埋公仔猫咪动漫周边居家可爱毛绒娃娃棉拖鞋子暖冬包邮 ', '39.00', '68.00', 66, 0, '1.000', '', '', 'data/images/201610/13/thumb_hk8db3.jpg', 'data/images/201610/13/goods_hk8db3.jpg', 'data/images/201610/13/hk8db3.jpg', 1, 0, 0, 1, 0, 1476340558, 0),
(43, 'LM2016101380658', 19, 0, '绝对萌域 舰队collection舰娘北方栖姬动漫周边帽子女男鸭舌帽潮 ', '29.00', '39.00', 66, 0, '1.000', '', '', 'data/images/201610/13/thumb_kpn8md.jpg', 'data/images/201610/13/goods_kpn8md.jpg', 'data/images/201610/13/kpn8md.jpg', 1, 0, 0, 1, 0, 1476340692, 0),
(41, 'LM2016101325414', 18, 0, '绝对萌域无头骑士异闻录动漫周边男女魔术贴皮面高帮帆布鞋鞋子潮 ', '349.00', '399.00', 56, 0, '1.000', '', '', 'data/images/201610/13/thumb_7pz3r1.jpg', 'data/images/201610/13/goods_7pz3r1.jpg', 'data/images/201610/13/7pz3r1.jpg', 1, 0, 0, 1, 0, 1476340369, 0),
(40, 'LM2016101337275', 18, 0, '绝对萌域 弹丸论破黑白熊动漫周边居家男女毛绒娃娃棉拖鞋子冬季 ', '71.00', '89.00', 68, 0, '1.000', '', '', 'data/images/201610/13/thumb_cgie8v.jpg', 'data/images/201610/13/goods_cgie8v.jpg', 'data/images/201610/13/cgie8v.jpg', 1, 0, 0, 1, 0, 1476340279, 0),
(39, 'LM2016101365509', 0, 0, '绝对萌域 舰队collection舰娘岛风连装炮酱动漫周边包跟棉拖鞋子', '71.00', '89.00', 66, 0, '1.000', '', '', 'data/images/201610/13/thumb_0a934t.jpg', 'data/images/201610/13/goods_0a934t.jpg', 'data/images/201610/13/0a934t.jpg', 1, 0, 0, 0, 0, 1476340207, 0),
(38, 'LM2016101343299', 18, 0, '舰队Collection 北方酱栖姬cos板鞋 萌娘帆布鞋动漫周边 鞋子男女', '129.00', '138.00', 66, 0, '1.000', '', '', 'data/images/201610/13/thumb_n0trew.jpg', 'data/images/201610/13/goods_n0trew.jpg', 'data/images/201610/13/n0trew.jpg', 1, 0, 0, 0, 0, 1476339962, 0),
(36, 'LM2016101226299', 15, 0, '绝对萌域舰队Collection北方栖姬周边穹妹cos男女运动动漫t恤短袖', '88.00', '99.00', 99, 0, '1.000', '', '', 'data/images/201610/12/thumb_e1p58c.jpg', 'data/images/201610/12/goods_e1p58c.jpg', 'data/images/201610/12/e1p58c.jpg', 1, 0, 0, 1, 0, 1476278305, 0),
(35, 'LM2016101286043', 15, 0, '绝对萌域 我的世界爬行者苦力怕游戏周边女男纯棉短袖圆领动漫T恤', '88.00', '99.00', 98, 0, '1.000', '', '', 'data/images/201610/12/thumb_68sage.jpg', 'data/images/201610/12/goods_68sage.jpg', 'data/images/201610/12/68sage.jpg', 1, 0, 0, 1, 0, 1476278276, 0),
(37, 'LM2016101228443', 15, 0, '绝对萌域 从零开始的异世界生活艾米莉娅周边女男运动短袖动漫T恤', '86.00', '99.00', 66, 0, '1.000', '', '', 'data/images/201610/12/thumb_1s6kve.jpg', 'data/images/201610/12/goods_1s6kve.jpg', 'data/images/201610/12/1s6kve.jpg', 1, 0, 0, 0, 0, 1476278414, 0),
(33, 'LM2016101274098', 15, 0, '绝对萌域 fate无限剑制周边男女通用运动休闲短袖圆领黑动漫T恤夏', '62.00', '88.00', 77, 0, '1.000', '', '', 'data/images/201610/12/thumb_1gmi9v.jpg', 'data/images/201610/12/goods_1gmi9v.jpg', 'data/images/201610/12/1gmi9v.jpg', 1, 0, 0, 0, 0, 1476278205, 0),
(31, 'LM2016101211738', 14, 0, '绝对萌域Fate命运之夜saber动漫周边男女纯棉套头针织衫毛衣秋装 ', '158.00', '189.00', 66, 0, '2.000', '', '', 'data/images/201610/12/thumb_yc1j59.jpg', 'data/images/201610/12/goods_yc1j59.jpg', 'data/images/201610/12/yc1j59.jpg', 1, 0, 0, 1, 0, 1476277303, 0),
(30, 'LM2016101266981', 14, 0, '绝对萌域 舰队北方酱舰娘栖姬动漫周边男女纯棉连帽卫衣外套秋装 ', '179.00', '233.00', 66, 0, '2.000', '', '', 'data/images/201610/12/thumb_jdychs.jpg', 'data/images/201610/12/goods_jdychs.jpg', 'data/images/201610/12/jdychs.jpg', 1, 0, 0, 1, 0, 1476277159, 0),
(29, 'LM2016101294825', 14, 0, '绝对萌域无头骑士异闻录折原临也cosplay外套男女动漫卫衣周边服 ', '179.00', '298.00', 88, 0, '1.000', '', '', 'data/images/201610/12/thumb_32fa0m.jpg', 'data/images/201610/12/goods_32fa0m.jpg', 'data/images/201610/12/32fa0m.jpg', 1, 0, 0, 1, 0, 1476277027, 0),
(27, 'LM2016101254579', 14, 0, '脸贴吧表情卫衣斜眼恶搞靠枕动漫连帽外套', '128.00', '288.00', 88, 0, '1.000', '', '', 'data/images/201610/12/thumb_ea19zs.jpg', 'data/images/201610/12/goods_ea19zs.jpg', 'data/images/201610/12/ea19zs.jpg', 1, 0, 0, 1, 0, 1476276766, 0),
(28, 'LM2016101268544', 14, 0, '宅漫！暗杀教室周边 杀老师领带COS长袖外套 动漫卫衣', '86.00', '126.00', 88, 0, '1.000', '', '', 'data/images/201610/12/thumb_0hckys.jpg', 'data/images/201610/12/goods_0hckys.jpg', 'data/images/201610/12/0hckys.jpg', 1, 0, 1, 0, 0, 1476276839, 0),
(48, 'LM2016101333203', 16, 0, '绝对萌域 舰队Collection舰娘夕立周边男女纯棉假两件长袖动漫T恤', '128.00', '268.00', 56, 0, '1.000', '', '', 'data/images/201610/13/thumb_ug315s.jpg', 'data/images/201610/13/goods_ug315s.jpg', 'data/images/201610/13/ug315s.jpg', 1, 0, 0, 0, 0, 1476342085, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ordergoods`
--

CREATE TABLE IF NOT EXISTS `ordergoods` (
  `og_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `order_sn` char(15) NOT NULL DEFAULT '',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(60) NOT NULL DEFAULT '',
  `goods_number` smallint(6) NOT NULL DEFAULT '1',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`og_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ordergoods`
--

INSERT INTO `ordergoods` (`og_id`, `order_id`, `order_sn`, `goods_id`, `goods_name`, `goods_number`, `shop_price`, `subtotal`) VALUES
(4, 10, 'OI2016101776556', 35, '', 1, '88.00', '88.00'),
(3, 10, 'OI2016101776556', 46, '', 1, '168.00', '168.00');

-- --------------------------------------------------------

--
-- 表的结构 `orderinfo`
--

CREATE TABLE IF NOT EXISTS `orderinfo` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` char(15) NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL DEFAULT '',
  `zone` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(30) NOT NULL DEFAULT '',
  `zipcode` char(6) NOT NULL DEFAULT '',
  `reciver` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `tel` varchar(20) NOT NULL DEFAULT '',
  `mobile` char(11) NOT NULL DEFAULT '',
  `building` varchar(30) NOT NULL DEFAULT '',
  `best_time` varchar(10) NOT NULL DEFAULT '',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pay` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `orderinfo`
--

INSERT INTO `orderinfo` (`order_id`, `order_sn`, `user_id`, `username`, `zone`, `address`, `zipcode`, `reciver`, `email`, `tel`, `mobile`, `building`, `best_time`, `add_time`, `order_amount`, `pay`) VALUES
(10, 'OI2016101776556', 5, 'bibisse', '天神高中', '天神高中13区', '512266', '易端天', '449959@qq.com', '12264446', '133556789', '天神堂', '8:00', 1476673848, '256.00', 4);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `passwd` char(32) NOT NULL DEFAULT '',
  `regtime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastlogin` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `passwd`, `regtime`, `lastlogin`) VALUES
(7, '小学生', 'xues@163.com', 'f379eaf3c831b04de153469d1bec345e', 1476674326, 0),
(5, 'bibisse', '495904127@qq.com', '45f8efba6fc7d629f597ed064ed01cd3', 1474770572, 0),
(6, 'bibisse2', 'bibisse@163.com', 'a11bac7cc13c582e8186241070f2bf3c', 1476349202, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
