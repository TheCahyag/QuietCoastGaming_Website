<?php
/**
 * File: constants.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Holds information that will be accessed by
 * multiple files in different locations
 */

$debug = True;

if ($debug){
    $pathTo_WebsiteDir = "C:\\Users\\brand\\Dropbox\\College\\Programming\\Websites\\QuietCoastGaming_Website";
} else {
    $pathTo_WebsiteDir = "C:\\Website\\QuietCoastGaming_Website";
}

/**
 * generate-forums.php
 */
$pathTo_ForumPages = $pathTo_WebsiteDir."\\forum\\pages";

