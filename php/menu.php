<?php
/*
 * File: menu.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Description: Generates the menu bar located on the left.
 */

$toRootDir = levelsToRoot(getcwd());

echo '<div id="sidebar-wrapper">';
echo '<ul class="sidebar-nav">';
//echo '<li><a href="/index.php"><img src="/images/emblem_24x24.png"></a></li>';
echo '<li><a href="'.$toRootDir.'index.php">Home</a></li>';
echo '<li><a href="'.$toRootDir.'LiF.php">Life is Feudal</a></li>';
echo '<li><ul><li><a href="'.$toRootDir.'LiF_Rules.php">Rules</a></li></ul></li>';
echo '<li><a href="'.$toRootDir.'forum.php">Forum</a></li>';
echo '<li><a href="'.$toRootDir.'about.php">About</a></li>';
echo '</ul>';
echo '</div>';
?>
