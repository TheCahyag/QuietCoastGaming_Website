<?php
/**
 * File: head.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Description: Adds various links to libraries sets up some default
 * stuff as well as the favicon. This is added to every page.
 */

include ($_SERVER['DOCUMENT_ROOT']."/php/findRelativeDirectory.php");

$toRootDir = levelsToRoot(getcwd());

/**
 * This is added to all HTML pages to easily add information that would be
 * included in the <head> part of the document.
 */
echo '<meta charset="UTF-8">'."\n";
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">'."\n";
echo '<meta name="viewport" content="width=device-width, initial-scale=1">'."\n";
echo '<meta name="author" content="Brandon Bires-Navel">'."\n";
echo '<title>QCG Gaming</title>'."\n";
//echo '<link rel="icon" href="/images/emblem_24x24.png">'."\n"; todo

echo '<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>';



//echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">'."\n";
//echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>'."\n";
//echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>'."\n";
echo '<link href="'.$toRootDir.'css/style.css" type="text/css" rel="stylesheet">'."\n";