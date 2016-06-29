<?php

    //error_reporting(E_ALL);
    require_once 'strip_quotes.php';
    require_once 'Validate.php';

    $who = 'Tony';
    $ironman = "Ironman is $who";
    echo $ironman;

    $arr = array(
        "first_name" => "Stark",
        "last_name" => 'Tony'
    );
    echo "<br/>";

    echo "Ironman is {$arr['first_name']}  {$arr['last_name']}";
    
    echo '<br/>';
    
    $ironman .= '& camptain';

    echo '<a href="demo.php/' . rawurlencode($ironman) .'">' . htmlentities($ironman) . '</a>';

    $submit_data = 'Hi!Tony?➥ I\'m Hulk.➥ Are u kindding me?➥ I am not kindding';

    echo "<br/>";
    echo nl2br($submit_data);
    
    echo "<hr/>"; 

    $html = '<p class="MsoNormal"><span lang="EN-US">One:<strong>This is old;</strong></span><br></p><p class="MsoNormal"><span lang="EN-US">Two: <i>this is new content</i></span><br></p>';

    echo $html; 

    echo strip_tags($html);

    echo "<hr/>";

    echo strip_tags($html,"<p>");

    echo "<hr/>";

    $str2 = <<<EOD
I am Ironman.You do not need to change it;
    Hey Captain!
    Hey little guy.
EOD;
    $word = 'Captain';
    echo str_replace($word,'<i>Captain Amercian</i>',$str2);
echo "<hr/>";
    
    printf("%s cost %'.4d","Apple",2.11212);
    

?>