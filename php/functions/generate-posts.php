<?php
/**
 * File: generate-posts.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

// $serializedObject, $threadFile -- variables from thread file

// Getting Forum object data
$data = file_get_contents($serializedObject);
$forumObject = unserialize($data);

// Getting the name of the file
$threadList = $forumObject->getThreadArray();
$ourThread = null;

// Find the given thread object given its name
for ($i = 0; $i < count($threadList); $i++){
    $testThread = $threadList[$i];
    if ($testThread->getPathToThreadFile() == $threadFile){
        $ourThread = $threadList[$i];
        break;
    }
}

// Getting the post array from the thread object
$postList = $ourThread->getPostArray();

// Displaying the first post (Which is created by the creator of the thread)
echo'
<div class="row well-message">
    <div class="col-lg-3 messageSideBar">
        <div class="">
            <h4 class="text-primary">'.$postList[0]->getAuthor().'</h4>
            <form action="../../../postcreation.php" method="get">
                <input type="hidden" id="dataDir" name="dataDir" value="' .$_SERVER['DOCUMENT_ROOT'].'/forum/data/'.$threadFile.'"/>
                <button style="float: right;" type="submit" class="btn btn-primary btn-xs">Reply</button>
            </form>
        </div>
        <p style="padding-top: 25px">This is a user selected message!</p>
    </div>
    
    <div class="col-lg-9 messageMessageBar">
        <h3 class="text-primary text-center">'.$ourThread->getTitle().'</h3>
        <p style="padding-top: 25px">'.$postList[0]->getContent().'</p>
    </div>
</div>';

// Iterate threw all posts and echo it in an HTML format,
// the first post is excluded because the thread title and
// button is added to that post
for ($j = 1; $j < count($postList); $j++){
    echo'
    <div class="row well-message">
        <div class="col-lg-3 messageSideBar">
            <div>
                <h4 class="text-primary">'.$postList[$j]->getAuthor().'</h4>
            </div>
            <p style="padding-top: 25px">This is a user selected message!</p>
        </div>
        
        <div class="col-lg-9">
            <p style="padding-top: 25px">'.$postList[$j]->getContent().'</p>
        </div>
    </div>';
}