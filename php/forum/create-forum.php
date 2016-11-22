<?php
/**
 * File: create-forum.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

// Changes unwanted chars to '_' or '-' for the file that will be created

$fileName = str_replace(" ", "_", $_GET['name']);
$fileName = str_replace(".", "-", $fileName);
$fileName = str_replace(":", "_", $fileName);
$fileName = str_replace("/", "_", $fileName);
$fileName = str_replace("\\", "_", $fileName);
$fileName = str_replace("*", "_", $fileName);
$fileName = str_replace("<", "_", $fileName);
$fileName = str_replace(">", "_", $fileName);
echo $fileName."</br>";

// Getting data

$forumName = $_GET['name'];
echo $forumName."</br>";

// Make a directory that will contain the threads associated with the forum

mkdir('../../forum/data/'.$fileName);


// Open file we will be writing to
$dir = '../../forum/pages/'.$fileName.'.php';
echo $dir."</br>";

$forumFile = fopen($dir, 'w');

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
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row well">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">';

$content .= '<h3 class="text-primary text-center">'.$_GET["name"].'</h3>
             <table class="table table-hover">
             <thead><tr><th>Forum</th><th>Threads</th><th>Posts</th><th>Lastest</th></tr></thead>
             <tbody>';
foreach (scandir("../../forum/data/serialized_forum_objects") as $forumFile){
    $readFile = fopen("../../forum/data/serialized_forum_objects/".$forumFile, 'r');
    $forumObject = unserialize(fgets($readFile));
    $name = $forumObject->getPathFromRoot().$forumObject->getFileName();
    $threads = $forumObject->countThreadCount();
    $posts = $forumObject->countPostCount();
    $threadArray = $forumObject->getThreadArray();
    $postArray = $threadArray[0]->getPostArray();
    $latest = $postArray[0]->getDate();
    $forumURL = $forumObject->getPathFromRoot().$fileName.'php';
    $content .= '<tr><th><a href="'.$forumURL.'">'.$name.'</a></th><th>'
        .$threads.'</th><th>'.$posts.'</th><th>'.$latest.'</th></tr>';
}



$content .= '</tbody></table>
</div>
<div class="col-lg-4"></div>
</div>
</div>
</div>
</body>
</html>
';


fwrite($forumFile, $content);
fclose($forumFile);