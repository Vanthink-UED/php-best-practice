<?php

$timestamp = time();
echo date("F jS, Y", $timestamp); // November 7th, 2006

echo "<hr/>";
echo date();
$timestamp = strtotime("May 31st 1984");
$weekday = date("l", $timestamp);
echo $weekday; // Thursday

echo "<hr/>";

$timestamp = strtotime("May");
$days = date("t", $timestamp);
echo $days; // 31



?>

