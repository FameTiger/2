<?php

require '../vendor//autoload.php';
$select = new Components\Orm\Select;
foreach($select->from('user')->columns(['ID', 'name'])->joinTable('permission','userpermission', ['ID'=>'userID'])->execute() as $row){
	var_export($row);
}
$router = new Core\Router;
$router->run();

