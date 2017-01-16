<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/php/head.php') ?>
</head>
<body>
<!-- Sidebar -->
<?php include ($_SERVER['DOCUMENT_ROOT'].'/php/menu.php') ?>

<!-- Main content -->
<?php $myData = $_SERVER['DOCUMENT_ROOT']."/forum/data/serialized_forum_objects/Life_is_Feudal";
    include ($_SERVER['DOCUMENT_ROOT']."/php/forum/Forum.php");
    include ($_SERVER['DOCUMENT_ROOT']."/php/forum/Thread.php");
    include ($_SERVER['DOCUMENT_ROOT']."/php/forum/Post.php");
?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row well">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
            <h3 class="text-primary text-center">Life is Feudal</h3>
            <form action="../../threadcreation.php" method="get">
                <input type="hidden" id="dataDir" name="dataDir" value="C:/Users/MOUTH Box/Dropbox/College/Programming/Websites/QuietCoastGaming_Website/forum/data/Life_is_Feudal"/>
                <button style="float: right" type="submit" class="btn btn-primary btn-xs">Create Thread!</button>
            </form>
            <table class="table table-hover">
            <thead><tr><th>Thread</th><th>Posts</th><th>Latest</th></tr></thead>
            <tbody>
            <?php include ($_SERVER['DOCUMENT_ROOT']."/php/functions/generate-threads.php") ?>
            </tbody></table>
            </div>
            <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
</body>
</html>