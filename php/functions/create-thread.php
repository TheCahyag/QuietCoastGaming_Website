<?php
/**
 * File: create-thread.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Forum.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Thread.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Post.php");

// _GET: name, content, author, dataDir
$name = $_GET['name'];
$content = $_GET['content'];
$author = $_GET['author'];

// Get Forum object
$array = explode("/", $_GET['dataDir']);
$forumFile = $array[sizeof($array) - 1];
$data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/".$forumFile);
$forumObject = unserialize($data);

// Gathering data for the thread
$dataForThread = array();
array_push($dataForThread, $name);
array_push($dataForThread, $author);
array_push($dataForThread, date("D M j G:i:s"));
array_push($dataForThread, $content);
array_push($dataForThread, $_SERVER['DOCUMENT_ROOT'].'/forum/data');

// Post and Thread are created by the Forum object with the createThread() method
$forumObject->createThread($dataForThread);

// Redirect
echo '<script>t1 = window.setTimeout(function(){ window.location = "http://quietcoastgaming.com/forum.php"; },1);</script>';
