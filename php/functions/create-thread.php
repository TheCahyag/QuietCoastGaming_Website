<?php
/**
 * File: create-thread.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

// Forum Objects
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Forum.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Thread.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Post.php");

// Name function
//include($_SERVER['DOCUMENT_ROOT'] . "/php/getNameForFile.php");

// _GET: name, content, author, dataDir
$name = $_GET['name'];
$content = $_GET['content'];
$author = $_GET['author'];

// Get Forum object
$array = explode("/", $_GET['dataDir']);
$forumFile = $array[sizeof($array) - 1];
$data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/".$forumFile);
$forumObject = unserialize($data);

// Name of the forum
$nameWithoutExtension = pathinfo($forumObject->getFileName(), PATHINFO_FILENAME);

// Name of the thread
$threadID = $forumObject->peekAtNextThreadID();
$threadFileName = $threadID.nameMe($name, ".php");


// Dir of the thread file
$dir = '../../forum/data/'.$nameWithoutExtension.'/'.$threadFileName;

// Gathering data for the thread
$dataForThread = array();
array_push($dataForThread, $name);
array_push($dataForThread, $author);
array_push($dataForThread, date("D M j G:i:s"));
array_push($dataForThread, $content);
array_push($dataForThread, $dir);

// Post and Thread are created by the Forum object with the createThread() method
$forumObject->createThread($dataForThread);

// Re-serialize the changed Forum object
$serialFile = fopen($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/".$nameWithoutExtension, 'w');
fwrite($serialFile, serialize($forumObject));
fclose($serialFile);

// Creating and writing to the thread file
$threadFile = fopen($dir, 'w');

// Web page HTML stuff
$content = '
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ($_SERVER[\'DOCUMENT_ROOT\'].\'/php/head.php\') ?>
</head>
<body>
<!-- Sidebar -->
<?php include ($_SERVER[\'DOCUMENT_ROOT\'].\'/php/menu.php\') ?>

<!-- Main content -->
<?php $serializedObject = $_SERVER[\'DOCUMENT_ROOT\']."/forum/data/serialized_forum_objects/'.$nameWithoutExtension.'";
    $threadFile = \''.$dir.'\';
    include ($_SERVER[\'DOCUMENT_ROOT\']."/php/forum/Forum.php");
    include ($_SERVER[\'DOCUMENT_ROOT\']."/php/forum/Thread.php");
    include ($_SERVER[\'DOCUMENT_ROOT\']."/php/forum/Post.php");
?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row well">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <?php include ($_SERVER[\'DOCUMENT_ROOT\']."/php/functions/generate-posts.php"); ?>
            </div>
            <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
</body>
</html>';

fwrite($threadFile, $content);
fclose($threadFile);

// Redirect todo
echo '<script>t1 = window.setTimeout(function(){ window.location = "http://quietcoastgaming.com/forum.php"; },1);</script>';
