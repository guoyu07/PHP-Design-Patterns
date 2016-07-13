<?php

require 'Db.php';

$db = Db::getInstance();

$sql = "SELECT * FROM `stu` where id = :id";
$res = $db->queryOne($sql,array(':id'=>'50'));

var_dump($res);