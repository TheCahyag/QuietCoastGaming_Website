<?php
/**
 * File: generate-threads.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

// $myData is a variable that contains the directory to the file that
// contains the serialized forum data
$dir = $myData;
$data = file_get_contents($dir);
$forumObject = unserialize($data);

$threadArray = $forumObject->getThreadArray();
if (count($threadArray) > 0){
    foreach ($threadArray as $thread){
        $threadName = $thread->getTitle();
        $threadURL = $thread->getPathToThreadFile();
        $posts = $thread->getPostCount();
        $mostRecentPost = $thread->getMostRecentPost();
        $latest = $mostRecentPost->getDate();
        echo '<tr><th><a href="'.$threadURL.'">'.$threadName.'</a></th><th>'.$posts.'</th><th>'.$latest.'</th></tr>';
    }
} else {
    echo 'There are no threads right now, start one by clicking the button in the corner.';
}