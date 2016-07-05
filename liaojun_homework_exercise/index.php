<?php
date_default_timezone_set('PRC');

$str = <<<EOD
<style>
strong{ color:red; }
        
        tr { color:blue;}
</style>
EOD;
echo $str;
$q = isset($_GET['q'])?$_GET['q']:'';
$article = <<<EOD
<h2>Euro 2016: Which England players should follow Roy Hodgson out?<h2>
England's players left their Chantilly base on Tuesday after the humiliating Euro 2016 exit to Iceland with the inquest under way into yet another dismal failure at a major tournament.
<p>Manager Roy Hodgson resigned minutes after the 2-1 last-16 loss and was very reluctantly undergoing his final media duties in charge of England as the embarrassed squad prepared to depart France.
How many of those players will be key figures in the 2018 World Cup qualifying campaign after this sporting "Brexit"?  
</p>  
    
EOD;


echo "<h1>搜索高亮</h1>";

$position = strpos($article, $q);
$lenght = strlen($q);
if(!$position&&$position!=0){
    echo $article;
}else{
    $code = substr_replace($article, "<strong>$q</strong>", $position, $lenght);
    echo $code;
}


//以上是超找第一个符合条件的代码



echo "<h1>代码高亮作业</h1>";

//代码高亮的代码

$files = "./index.php";
//获取高亮的代码带有html标签的字符串
$hfile = highlight_file($files,true);

//分解成每一行的数组
$hfile = explode('<br />', $hfile);

// 更具数组输出带有格式的代码
foreach ($hfile as $k => $v){
    echo $k+1 ."&nbsp;&nbsp; ";
    echo $v;
    echo "<br/>";
}


echo "<h1>日历作业</h1>";
if(isset($_GET['month'])){
  $month = $_GET['month'];
}

    // 只需要知道年月就可以了
//     $month = '';
    if (empty($month) || ! isset($month)) {
        $month = date("Y M");
    }
    
    echo $month;
    
    $month = strtotime($month) + 1;
    // 获取这个月的第一天是周几
    $firstday = date('w', $month);

    // echo $firstday;
    // 算出这个月共有多少天
    $days = date('t', $month);
    
  
    
   echo "<table border='1px' cellspacing='1px' cellpadding='1px'>";
   echo "<tr><td>周一</td><td>周二</td><td>周三</td><td>周四</td><td>周五</td><td>周六</td><td style='color:red'>周日</td></tr>";
   for ($i = 1; $i<=35;$i++){
       if($i < $firstday + $days){
           if($i < $firstday){
               if($i%7 == 1){
                   echo "<tr><td></td>";
               }elseif($i%7 == 0){
                   echo "<td></td></tr>";
               }else{
                   echo "<td></td>";
               }
           }else{
               $da = $i - $firstday + 1;
               if($i%7 == 1){
                   echo "<tr><td>$da</td>";
               }elseif($i%7 == 0){
                   echo "<td style='color:red'>$da</td></tr>";
               }else{
                   echo "<td>$da</td>";
               }
           }
       }else{
           if($i%7 == 1){
               echo "<tr><td></td>";
           }elseif($i%7 == 0){
               echo "<td></td></tr>";
           }else{
               echo "<td></td>";
           }
       }
   }


?>
