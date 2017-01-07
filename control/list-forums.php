<?php
/**
 * File: list-forums.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

// Forum objects
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Forum.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Thread.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Post.php");
include($_SERVER['DOCUMENT_ROOT'] . "/control/list-threads.php");

// Get forum objects
$forumArray = array();
$dir = $_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects";

$serializedList = array_diff(scandir($dir), array('.', '..'));

// Get each object from a serialized file and add it to the forumArray array
// When removing . and .. it doesn't shift everything to the front, therefore
// it is needed to start at the index 2 and extend the reach by 2 to access
// all the forum elements
for ($i = 2; $i < count($serializedList) + 2; $i++){
    $path = $_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/".$serializedList[$i];
    $data = file_get_contents($path);
    $forumObject = unserialize($data);
    array_push($forumArray, $forumObject);
}

// Go threw each forum object and echo it to the control panel, additionally it
// will have delete, move up and move down buttons
for ($j = 0; $j < count($forumArray); $j++){
    $forumName = $forumArray[$j]->getName();
    echo '<a href="#forum'.$j.'" class="btn btn-info btn-sm" data-toggle="collapse"><h5 class="text-primary">'.$forumName.'</h5></button><br>
          <div id="forum'.$j.'" class="collapse">'.list_threads($forumArray[$j]).'</div>
    ';

}
