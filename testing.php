<?php
$string1 = "@yoho<br>";
$string2 = "hello poop:";


$string3 = substr_replace($string2, $string1, 0);
$string3 = $string1.$string2;
echo $string3;

