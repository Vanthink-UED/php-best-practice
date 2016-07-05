<?php
$str = <<<EOD
<style>
.strong{ color:red; }    
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
// your code
//全部替换
$str_hl_article = str_ireplace($q,"<span class='strong'>$q</span>",$article);
echo $str_hl_article;
echo '<hr/>';

//只替换第一个
$int_pos_word_head = stripos($article,$q);
$str_hl_line_article = substr_replace($article,"<span class='strong'>$q</span>",$int_pos_word_head,strlen($q));
echo  $str_hl_line_article;

?>
