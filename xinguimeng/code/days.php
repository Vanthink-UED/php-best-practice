<?php 
$yer  = '2016';
$month = '6';
$str  = $year.'-'.$month.'-'.'1';
//$str  = '2016-6-20';
$time = strtotime($str);
$days = date('t');
var_dump($days);



