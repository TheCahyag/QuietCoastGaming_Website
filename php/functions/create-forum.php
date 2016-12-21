<?php
/**
 * File: create-forum.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

// Forum objects
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Forum.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Thread.php");
include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Post.php");


// Changes unwanted chars to '_' or '-' for the file that will be created
$fileName = str_replace(" ", "_", $_GET['name']);
$fileName = str_replace(".", "-", $fileName);
$fileName = str_replace(":", "_", $fileName);
$fileName = str_replace("/", "_", $fileName);
$fileName = str_replace("\\", "_", $fileName);
$fileName = str_replace("*", "_", $fileName);
$fileName = str_replace("<", "_", $fileName);
$fileName = str_replace(">", "_", $fileName);

// Getting data
$forumName = $_GET['name'];

// Create the Forum object and serialize it to a file
$forum = new Forum($forumName);
$nameWithoutExtension = pathinfo($forum->getFileName(), PATHINFO_FILENAME);
$serialFile = fopen($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/".$nameWithoutExtension, 'w');
fwrite($serialFile, serialize($forum));
fclose($serialFile);

// Make a directory that will contain the threads associated with the forum
$folderPath = $_SERVER['DOCUMENT_ROOT'].'/forum/data/'.$fileName;
if (!is_dir($folderPath)){
    mkdir($folderPath);
}

// Open file we will be writing to
$dir = $_SERVER['DOCUMENT_ROOT'].'/forum/pages/'.$fileName.'.php';

$forumFile = fopen($dir, 'w');

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
<?php $myData = $_SERVER[\'DOCUMENT_ROOT\']."/forum/data/serialized_forum_objects/'.$nameWithoutExtension.'";
    include ($_SERVER[\'DOCUMENT_ROOT\']."/php/forum/Forum.php");
    include ($_SERVER[\'DOCUMENT_ROOT\']."/php/forum/Thread.php");
    include ($_SERVER[\'DOCUMENT_ROOT\']."/php/forum/Post.php");
?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row well">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
            <h3 class="text-primary text-center">'.$_GET["name"]. '</h3>
            <form action="../../threadcreation.php" method="get">
                <input type="hidden" id="dataDir" name="dataDir" value="' .$_SERVER['DOCUMENT_ROOT'].'/forum/data/'.$fileName.'"/>
                <button style="float: right" type="submit" class="btn btn-primary btn-xs">Create Thread!</button>
            </form>
            <table class="table table-hover">
            <thead><tr><th>Thread</th><th>Posts</th><th>Latest</th></tr></thead>
            <tbody>
            <?php include ($_SERVER[\'DOCUMENT_ROOT\']."/php/functions/generate-threads.php") ?>
            </tbody></table>
            </div>
            <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
</body>
</html>';

fwrite($forumFile, $content);
fclose($forumFile);

// Redirect todo
echo '<script>t1 = window.setTimeout(function(){ window.location = "http://quietcoastgaming.com/forum.php"; },1);</script>';
