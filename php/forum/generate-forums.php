<?php
/**
 * File: generate-forums.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Iterates threw the forums under 'forum/pages' and will display those forums on forum.php to
 * serve as an access point for people trying to get to the various forum pages
 */

echo '<table class="table table-hover">';
echo '<thead><tr><th>Forum</th><th>Threads</th><th>Posts</th><th>Lastest</th></tr></thead>';
echo '<tbody>';
foreach(file('forum/data/FORUM_DATA.txt') as $line) {
    $newLine = explode("|", $line);
    $forumURL = "forum/pages/".$newLine[1];
    echo '<tr><th><a href="'.$forumURL.'">'.$newLine[0].'</a></th><th>20</th><th>45</th><th>yesterday</th></tr>';
}
echo '</tbody></table>';
