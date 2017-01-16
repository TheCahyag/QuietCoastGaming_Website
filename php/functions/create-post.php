<?php
/**
 * File: create-post.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Called by postcreation.php. The following script detects what thread
 * is being replied to and adds the post to the given thread.
 */

// Forum Objects
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Forum.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Thread.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Post.php");

// GET: content, author, dataDir
$content = $_GET['content'];
$author = $_GET['author'];
$dataDir = $_GET['dataDir'];

$breakup = explode("/", $dataDir); // Format: forumname/threadfile.php
$forumName = $breakup[0];
$threadFilename = $breakup[1];

// Un-serializing objects
// Forum
$data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/".$forumName);
$forum = unserialize($data);
// Thread
$threadObjectArray = $forum->getThreadArray();
$referenceID = substr($threadFilename, 0, 3);
$ourThread = null;

// Finds the thread object with the given id
foreach ($threadObjectArray as $thread){
    $threadID = $thread->getThreadID();
    if ($threadID == $referenceID){
        $ourThread = $thread;
        break;
    }
}

// Creates post
$modifiedContent = '@'.$_GET['replyTo'].'<br>'.$content;
$newPost = new Post($author, $modifiedContent, date("D M j G:i:s"));

// Adds post to the given thread
$ourThread->addPost($newPost);

$serialFile = fopen($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/".$forumName, 'w');
fwrite($serialFile, serialize($forum));
fclose($serialFile);

// Redirect todo
echo '<script>t1 = window.setTimeout(function(){ window.location = "http://quietcoastgaming.com/forum.php"; },1);</script>';