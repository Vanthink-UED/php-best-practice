<?php 
$arr_data = file('file.php');
$str_data = implode(' ',$arr_data);
$hl_data = highlight_string($str_data);
//echo $hl_data;

echo '<hr/>';

$all_str = '';
foreach($arr_data as $k => $v){
    $all_str .= "$k  ".$v;
}
$hl2_data = highlight_string($all_str,true);
echo $hl2_data;


?>
