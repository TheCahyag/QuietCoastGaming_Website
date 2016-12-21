<?php
/**
 * File: testForumQueries.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

// Get Forum object
$data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/Minecraft");
echo $data;
$forumObject = unserialize($data);

$title = "Thread Title";
$author = "TheCahyag";
$date = "Monday Dec 18";
$content = "Hi, I'm from planet minecraft. Can I have op";
$dirToData = "/forum/Minecraft/tomake.php";

$dataForThread = array($title, $author, $date, $content, $dirToData);

$forumObject->createThread($dataForThread);


