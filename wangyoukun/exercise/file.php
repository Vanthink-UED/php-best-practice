<?php 
$handle = fopen('index.php','x');
fwrite($handle,'str');
fclose($handle);
?>
