<?php

include ("Forum.php");
include ("Post.php");
include ("Thread.php");

// Create forum and add thread to it

$forum = new Forum("Life is Feudal");
$dataFor_threadAndPost = array("What is your favorite color?", "TheCahyag",
    "Today", "My favorite color is blue\n and now I want to know what your favorite color is");

// Test forum methods

$forum->createThread($dataFor_threadAndPost);

$threadCount = $forum->countThreadCount();
$postCount = $forum->countPostCount();

echo "Threads: ".$threadCount." (Should be 1)</br>";
echo "Posts: ".$postCount." (Should be 1)</br>";

$threadArray = $forum->getThreadArray();

$nameOfThread = $threadArray[0]->getTitle();
$postCount2 = $threadArray[0]->getPostCount();

echo "Name of Thread: ".$nameOfThread." (Should be What is your favorite color?)</br>";
echo "Posts: ".$postCount2." (Should be 1)</br>";

echo $_SERVER['DOCUMENT_ROOT'].'\css\style.css';

$dir = '../../forum/data/serialized_forum_objects/object';
$file = fopen($dir, 'w');

fwrite($file, serialize($forum));

fclose($file);

