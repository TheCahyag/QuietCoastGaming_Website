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
foreach (scandir("forum/data/serialized_forum_objects") as $forumFile){
    $readFile = fopen("forum/data/serialized_forum_objects/".$forumFile, 'r');
    $forumObject = unserialize(fgets($readFile));
    echo $forumObject->getFileName();
//
//    $name = $forumObject->getPathFromRoot().$forumObject->getFileName();
//    $threads = $forumObject->countThreadCount();
//    $posts = $forumObject->countPostCount();
//    $threadArray = $forumObject->getThreadArray();
//    $postArray = $threadArray[0]->getPostArray();
//    $latest = $postArray[0]->getDate();
//    $forumURL = $forumObject->getPathFromRoot().$fileName.'php';
//    $content .= '<tr><th><a href="'.$forumURL.'">'.$name.'</a></th><th>'
//        .$threads.'</th><th>'.$posts.'</th><th>'.$latest.'</th></tr>';
}
echo '</tbody></table>';
