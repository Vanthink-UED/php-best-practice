<?php 
error_reporting(0);

$year =  $_GET['y'];
$year = intval($year);
if(empty($year)){
	$year = date('Y');
}

$month = $_GET['m'];
$month = intval($month);
if(empty($month)){
	$month = date('m');
}


//最终输出的数组
$out = array("日","一","二","三","四","五","六");



$begin = $year."-".$month."-"."1";
$bday  = date('w',$begin);


for($i=0;$i<=$bday;$i++){
	$out[] = " ";
}

$t = date('t',$begin);

for($j=0;$j<$t;$j++){
	$out[] = $j+1;
}

?>

<table border="1" cellspacing="0">
<tr>
<?php   foreach($out as $key=>$val){  ?>
<td>
<?php echo $val; ?>
</td>
<?php 	if($key % 7 == 6){  ?>
</tr><tr>
<?php   }}    ?>
</table>

<div style="text-align:center;font-size:20px;">
	通过参数调用即可:年份为y，月份为m，默认为当月
</div>
































