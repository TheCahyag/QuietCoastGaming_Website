<?php
/**
 * File: hash_generate.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Copy pasta from http://stackoverflow.com/a/22977885
 */

$user = "Username"; // please replace with your user
$pass = "techn0wiz"; // please replace with your passwd
// two ; was missing

$useroptions = ['cost' => 8,];
$userhash    = password_hash($user, PASSWORD_BCRYPT, $useroptions);
$pwoptions   = ['cost' => 8,];
$passhash    = password_hash($pass, PASSWORD_BCRYPT, $pwoptions);

echo $userhash;
echo "<br />";
echo $passhash;