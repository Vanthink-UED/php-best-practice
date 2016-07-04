<?php 
$cont = highlight_file('file.php',true);
$arr  = explode('<br />', $cont);
?>
<table>
<?php foreach($arr as $key=>$val) { ?>
<tr>
<td><?php   echo $key+1; ?></td>
<td><?php   echo $val; ?></td>
</tr>
<?php } ?>
</table>

