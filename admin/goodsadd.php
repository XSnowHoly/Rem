<?php

define('ACC',true);
require('../include/init.php');


$cat = new CatModel();
$catlist = $cat->select();
$catlist = $cat->getCatTree($catlist);

include(ROOT . 'view/admin/templates/goodsadd.html');







?>