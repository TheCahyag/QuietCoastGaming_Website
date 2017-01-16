<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/php/head.php') ?>
</head>
<body>
<!-- Sidebar -->
<?php include ($_SERVER['DOCUMENT_ROOT'].'/php/menu.php') ?>

<!-- Main content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row well">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <?php
                // Forum objects
                include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Forum.php");
                include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Thread.php");
                include($_SERVER['DOCUMENT_ROOT'] . "/php/forum/Post.php");

                // GET: dataDir, postIndex
                $dataDir = $_GET['dataDir'];
                $postIndex = $_GET['postIndex'];

                $breakup = explode("/", $dataDir);
                $size = count($breakup);
                $forumName = $breakup[$size - 2];
                $threadFilename = $breakup[$size - 1];

                // Un-serialize objects
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
                $replyingTo = "null"; // Author of the post the user is replying to
                $ourPost = null;
                if ($ourThread == null){
                    echo 'ERROR: COULD NOT FIND THREAD (postcreation.php:42)<br>';
                    echo 'Go back to the thread/post you were replying to and re-reply. If this continues see site administrator.';
                } else {
                    $postArray = $ourThread->getPostArray(); // Post array for the given thread
                    $ourPost = $postArray[$postIndex];
                    $replyingTo = $ourPost->getAuthor();
                }
                ?>
                <h4 class="text-primary text-center">Replying to: <?php echo '@'.$replyingTo ?></h4>
                <h5 class="text-primary">Thread Name: <?php echo $ourThread->getTitle() ?></h5>
                <p><b><u>Post: </u></b><?php echo $ourPost->getContent()?></p>
                <br><br>
                <form action="php/functions/create-post.php" method="get">
                    <label for="content">Content: </label>
                    <textarea rows="14" class="form-control" id="content" name="content"></textarea>
                    <div class="col-lg-3">
                        <label for="author">In game name:</label>
                        <input type="text" class="form-control" id="author" name="author"/>
                    </div>
                    <div class="col-lg-9"></div>
                    <input type="hidden" id="dataDir" name="dataDir" value="<?php echo $forumName.'/'.$threadFilename ?>">
                    <input type="hidden" id="replyTo" name="replyTo" value="<?php echo $replyingTo ?>">
                    <div class="text-center" style="padding-top: 10px">
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
</body>
</html>