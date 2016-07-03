<?php
$arrFile = file('index.php');
echo "<table border='1'>";
foreach ($arrFile as $key => $value) {

    if(trim($value) != '<?php' && trim($value) != '?>'){
        $string = highlight_string('<?php '.$value, true);
        // 替换首次出现位置
        $pos = strpos($string, '&lt;?php&nbsp;');
        $string = substr_replace($string, '', $pos, strlen('&lt;?php&nbsp;'));
    }else{
        $string = highlight_string($value, true);
    } 
 
    echo '<tr><td bgcolor="#999">'.($key + 1).'</td><td>'.$string.'</td></tr>';

}

echo "</table>";

//or
highlight_file('index.php');
//.....
?>