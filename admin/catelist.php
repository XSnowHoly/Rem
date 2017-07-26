<?php 


define('ACC', true);
require('../include/init.php');

//调用model
$cat = new CatModel();
$catelist = $cat->select();

$catelist = $cat->getCatTree($catelist,0);

// print_r($catelist);


include(ROOT . 'view/admin/templates/catelist.html');





 ?>