<?php 
define('ACC', true);
require('../include/init.php');

$order = new OLModel();
$orderlist = $order->select();

// print_r($orderlist);


include(ROOT . 'view/admin/templates/orderlist.html');

 ?>