<?php
/**
 * File: list-threads.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

/**
 * @param $forumObject - given forum object
 * @return string - to be printed
 */
function list_threads($forumObject){
    $threadArray = $forumObject->getThreadArray();
    $contents = "";
    for ($i = 0; $i < count($threadArray); $i++){
        $contents .= '<p>'.$threadArray[$i]->getTitle().'</p>';
    }
    return $contents;
}