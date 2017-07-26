<?php 

define('ACC', true);

require('../include/init.php');

$user = new UserModel();

$userlist = $user->getUser();


include(ROOT . 'view/admin/templates/userlist.html');


 ?>