<?php
/**
 * File: generate-forums.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Iterates threw the forums under 'forum/pages' and will display those forums on forum.php to
 * serve as an access point for people trying to get to the various forum pages
 */

// Forum objects
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Forum.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Thread.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Post.php");

// HTML Tags
echo '<table class="table table-hover">';
echo '<thead><tr><th>Forum</th><th>Threads</th><th>Posts</th><th>Lastest</th></tr></thead>';
echo '<tbody>';

// Forum files that contain the serialized data
$dirArray = scandir($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects");
unset($dirArray[0], $dirArray[1]); // Remove '.' and '..' from the array

// Go through each forum file, un-serialize, and get data
// about the forums to display on a web page
foreach ($dirArray as $forumFile){

    $readFile = fopen($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/".$forumFile, 'r');
    $data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/".$forumFile);
    $forumObject = unserialize($data);
    $name = $forumObject->getName();
    $threads = $forumObject->countThreadCount();
    $posts = $forumObject->countPostCount();
    $threadArray = $forumObject->getThreadArray();
    if (count($threadArray) > 0){
        if ($threadArray[0]->getPostArray() != null){
            $postArray = $threadArray[0]->getPostArray();
            $latest = $postArray[0]->getDate();
        } else { $latest = "N-A"; }
    } else { $latest = "N/A"; }
    $nameWithoutExtension = pathinfo($forumObject->getFileName(), PATHINFO_FILENAME);
    $forumURL = $forumObject->getPathFromRoot().$nameWithoutExtension.'.php';
    echo '<tr><th><a href="'.$forumURL.'">'.$name.'</a></th><th>'.$threads.'</th><th>'.$posts.'</th><th>'.$latest.'</th></tr>';
}
echo '</tbody></table>'; // Other HTML tags
