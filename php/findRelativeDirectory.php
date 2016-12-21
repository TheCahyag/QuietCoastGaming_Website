<?php
/**
 * File: findRelativeDirectory.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Given a current working directory, this function will find how many '../'
 * to add to a directory to link to the root directory of the project. This is
 * needed because it is needed to link to the style.css file from different
 * level directories. A file in forum/data/Minecraft and a file in forum/pages
 * both need to link to css/style.css, but would require different relative
 * directories. For what ever reason using a directory of '/css/style.css'
 * doesn't work and the starting '/' doesn't link to the root directory. So the
 * need for this function has arisen.
 */

/* Tests */
//$dir = 'C:\Users\brand\Dropbox\College\Programming\Websites\QuietCoastGaming_Website\forum\pages';
//$dir = getcwd();
//echo "This is the cwd: ".$dir."<br>";
/* End Tests */

/**
 * levelsToRoot is specific to the QuietCoastGaming website and doesn't work in a generic sense
 * @param String - the directory
 * @return String - the number of '../' needed to link to the root of the directory
 *                  if the relative directory could not be found or is currently in
 *                  the root directory "" will be returned
 */
function levelsToRoot($dir){
    $tokens = explode("\\", $dir);
    $lookFor = "QuietCoastGaming_Website";
    $index = -1;

    // Iterate through all elements of $tokens to find the root
    // directory indicated by the string 'QuietCoastGaming_Website'
    for ($i = 0; $i < count($tokens); $i++){
        if ($tokens[$i] == $lookFor){
            $index = ++$i;
            break; // Breaks for loop once it finds what it's looking for
        }
    }
    $result = "";
    if ($index != -1){
        $numOfJumps = count($tokens) - $index;

        for ($j = $numOfJumps; $j > 0; $j--){
            $result .= "../";
        }
    }
    return $result;
}