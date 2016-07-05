<?php
$file = file('writeSecureScripts.html');
$lines = count($file);
$alt = '';
for ($i=0; $i<$lines; $i++) {
  $alt = ($alt == 'even') ? 'odd' : 'even';
  echo '<div class="' . $alt . '">';
  echo $i . ': ' . htmlspecialchars($file[$i]);
  echo "</div>\n";
}
?>